<?php

class Theme_Cleanup {
  public function __construct() {
    add_action( 'get_header', array( $this, 'filter_head' ) );
    add_filter( 'the_generator', array( $this, 'remove_wp_version') );

    // remove emojicons
    add_action( 'init', array( $this, 'disable_wp_emojicons' ) );
    add_filter( 'tiny_mce_plugins', array( $this, 'disable_emojicons_tinymce' ) );

    add_action( 'wp_footer', array( $this, 'deregister_script' ) );
  }

  public function filter_head() {
    remove_action( 'wp_head', '_admin_bar_bump_cb' );
    remove_action( 'wp_head', 'wp_generator' );
  }

  public function remove_wp_version() {
    return '';
  }

  public function disable_wp_emojicons() {
    // all actions related to emojis
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  }

  // filter to remove TinyMCE emojis
  public function disable_emojicons_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
      return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
      return array();
    }
  }

  public function deregister_script() {
    wp_deregister_script( 'wp-embed' );
  }
}

new Theme_Cleanup();

?>
