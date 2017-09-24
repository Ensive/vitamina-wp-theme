<?php

class Custom_Post_Type {
  public $post_type_name;
  public $post_type_args;
  public $post_type_labels;
  private $prefix = 'vi_';

  public function __construct( $name, $args = array(), $labels = array() ) {
    $this->post_type_name   = $this->snakify( $name );
    $this->post_type_args   = $args;
    $this->post_type_labels = $labels;

    if ( ! post_type_exists( $this->post_type_name ) ) {
      add_action( 'init', array( $this, 'register_cpt' ) );
    }

    $this->save();
  }

  public function register_cpt() {
    $name   = $this->beautify( $this->post_type_name );
    $plural = $this->pluralize( $name );

    $labels = array_merge(
      array(
        'name'               => _x( $plural, 'post type general name' ),
        'singular_name'      => _x( $name, 'post type singular name' ),
        'menu_name'          => _x( $plural, 'admin menu' ),
        'add_new'            => _x( 'Add New', strtolower( $name ) ),
        'add_new_item'       => __( 'Add New ' . $name ),
        'edit_item'          => __( 'Edit ' . $name ),
        'new_item'           => __( 'New ' . $name ),
        'all_items'          => __( 'All ' . $plural ),
        'view_item'          => __( 'View ' . $name ),
        'search_items'       => __( 'Search ' . $plural ),
        'not_found'          => __( 'No ' . strtolower( $plural ) . ' found' ),
        'not_found_in_trash' => __( 'No ' . strtolower( $plural ) . ' found in Trash' ),
        'parent_item_colon'  => ''
      ),

      // Given labels
      $this->post_type_labels
    );

    $args = array_merge(
      array(
        'label'             => $plural,
        'labels'            => $labels,
        'public'            => true,
        'show_ui'           => true,
        'supports'          => array( 'title', 'editor' ),
        'show_in_nav_menus' => true,
        '_builtin'          => false
      ),

      // Given args
      $this->post_type_args
    );

    register_post_type( $this->post_type_name, $args );
  }

  public function add_taxonomy( $name, $args = array(), $labels = array() ) {
    if ( ! empty( $name ) ) {
      $post_type_name = $this->post_type_name;

      $taxonomy_name   = $this->snakify( $name );
      $taxonomy_labels = $labels;
      $taxonomy_args   = $args;

      if ( ! taxonomy_exists( $taxonomy_name ) ) {
        $name   = $this->beautify( $name );
        $plural = $this->pluralize( $name );

        $labels = array_merge(
          array(
            'name'              => _x( $plural, 'taxonomy general name' ),
            'singular_name'     => _x( $name, 'taxonomy singular name' ),
            'search_items'      => __( 'Search ' . $plural ),
            'all_items'         => __( 'All ' . $plural ),
            'parent_item'       => __( 'Parent ' . $name ),
            'parent_item_colon' => __( 'Parent ' . $name . ':' ),
            'edit_item'         => __( 'Edit ' . $name ),
            'update_item'       => __( 'Update ' . $name ),
            'add_new_item'      => __( 'Add New ' . $name ),
            'new_item_name'     => __( 'New ' . $name . ' Name' ),
            'menu_name'         => __( $name )
          ),

          // Given labels
          $taxonomy_labels
        );

        $args = array_merge(
          array(
            'label'             => $plural,
            'labels'            => $labels,
            'public'            => true,
            'show_ui'           => true,
            'show_in_nav_menus' => true,
            '_builtin'          => false,
          ),

          // Given args
          $taxonomy_args
        );

        add_action( 'init', function () use ( $taxonomy_name, $post_type_name, $args ) {
          register_taxonomy( $taxonomy_name, $post_type_name, $args );
        } );

      } else {
        add_action( 'init', function () use ( $taxonomy_name, $post_type_name ) {
          register_taxonomy_for_object_type( $taxonomy_name, $post_type_name );
        } );
      }
    }
  }

  public function add_meta_box( $title, $fields = array(), $context = 'normal', $priority = 'default' ) {
    if ( empty( $title ) ) {
      return;
    }

    $post_type_name = $this->post_type_name;

    // meta variables
    $box_id       = $this->prefix . $this->snakify( $title );
    $box_title    = $this->beautify( $title );
    $box_context  = $context;
    $box_priority = $priority;

    // make the fields global
    global $custom_fields;
    $custom_fields[ $title ] = $fields;

    add_action( 'admin_init', function () use ( $box_id, $box_title, $post_type_name, $box_context, $box_priority, $fields ) {
      add_meta_box(
        $box_id,
        $box_title,
        function ( $post, $data ) {
          global $post;

          wp_nonce_field( plugin_basename( __FILE__ ), 'custom_post_type' );

          // Get all inputs from $data
          $custom_fields = $data['args'][0];

          // Get the saved values
          $meta = get_post_custom( $post->ID );

          // Check the array and loop through it
          if ( ! empty( $custom_fields ) ) {

            // Loop through custom fields specified when creating meta box
            foreach ( $custom_fields as $label => $type ) {
              $field_id_name = $this->get_field_id_name( $data['id'], $label );
              echo $this->get_field_markup( $field_id_name, $label, $meta );
            }
          }
        },
        $post_type_name,
        $box_context,
        $box_priority,
        array( $fields )
      );
    } );
  }

  private function save() {
    $post_type_name = $this->post_type_name;

    add_action( 'save_post', function () use ( $post_type_name ) {
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
      }

      if ( $this->has_value_in_post() || ! $this->has_valid_nonce() ) {
        return;
      }

      global $post;

      if ( isset( $_POST ) && isset( $post->ID ) && get_post_type( $post->ID ) == $post_type_name ) {
        global $custom_fields;

        foreach ( $custom_fields as $title => $fields ) {
          foreach ( $fields as $label => $type ) {
            $field_id_name = $this->get_field_id_name( $title, $label );
            update_post_meta( $post->ID, $field_id_name, $_POST['custom_meta'][ $field_id_name ] );
          }
        }
      }

    } );
  }

  private function has_valid_nonce() {
    return wp_verify_nonce( $_POST['custom_post_type'], plugin_basename( __FILE__ ) );
  }

  private function has_value_in_post() {
    return ! isset( $_POST['custom_post_type'] );
  }

  private function get_field_markup( $name, $label, $meta ) {
    $value = empty( $meta[ $name ][0] ) ? '' : $meta[ $name ][0];

    return '<label for="' . $name . '">' . $label . '</label><input type="text" name="custom_meta[' . $name . ']" id="' . $name . '" value="' . $value . '" />';
  }

  private function get_field_id_name( $id, $label ) {
    return $this->snakify( $id ) . '_' . $this->snakify( $label );
  }

  private function beautify( $string ) {
    return ucwords( str_replace( '_', ' ', $string ) );
  }

  private function snakify( $string ) {
    return strtolower( str_replace( ' ', '_', $string ) );
  }

  private function pluralize( $string ) {
    $last = $string[ strlen( $string ) - 1 ];

    if ( $last == 'y' ) {
      $cut    = substr( $string, 0, - 1 );
      $plural = $cut . 'ies';
    } else {
      $plural = $string . 's';
    }

    return $plural;
  }
}
