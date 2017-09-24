<?php

class VI_Setup_Project_Post_Type {
  public $cpt;
  private static $instance;

  public static function __init() {
    if ( null === self::$instance ) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  private function __construct() {
    $this->cpt = $this->create_project_post_type();
    $this->add_project_taxonomies();
    $this->add_project_meta_boxes();
  }

  private function create_project_post_type() {
    return new VI_Custom_Post_Type(
      'Project',
      array(
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-clipboard'
      ) );
  }

  private function add_project_taxonomies() {
    $this->cpt->add_taxonomy( 'post_tag' );
    $this->cpt->add_taxonomy( 'category' );
    $this->cpt->add_taxonomy(
      'status',
      array(
        'hierarchical'      => false,
        'show_in_nav_menus' => false,
        'show_in_menu'      => false,
        'show_in_rest'      => true,
        'description'       => __( 'Status represents current project status', TEXT_DOMAIN )
      ),
      array(
        'name'              => _x( 'Status', 'taxonomy general name', TEXT_DOMAIN ),
        'search_items'      => __( 'Search Status', TEXT_DOMAIN ),
        'parent_item'       => null,
        'parent_item_colon' => null
      )
    );
  }

  // project meta boxes
  private function add_project_meta_boxes() {
    $this->cpt->add_meta_box( 'Period', array( 'From' => 'text', 'To' => 'text' ), 'side' );
  }
}

VI_Setup_Project_Post_Type::__init();
