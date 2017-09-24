<?php

class Theme_Cleanup {
  public function __construct() {
    add_action( 'after_setup_theme', array( $this, 'do_cleanup' ) );

    // remove emojicons
    add_action( 'init', array( $this, 'disable_wp_emojicons' ) );
    add_filter( 'tiny_mce_plugins', array( $this, 'disable_emojicons_tinymce' ) );

    add_action( 'wp_footer', array( $this, 'deregister_script' ) );
  }

  public function do_cleanup() {
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head' );
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10 );

    add_filter( 'the_generator', '__return_false' );
    add_filter( 'show_admin_bar', '__return_false' );

    remove_action('set_comment_cookies', 'wp_set_comment_cookies');
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
