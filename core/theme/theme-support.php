<?php

class Theme_Support {
  public function __construct() {
    add_action( 'after_setup_theme', array( $this, 'handle_images' ) );
  }

  public function handle_images() {
    add_theme_support( 'post-thumbnails' );
    add_filter( 'jpeg_quality', create_function( '', 'return 75;' ) );
    // TODO: check
    // add_filter( 'intermediate_image_sizes_advanced', 'filter_image_sizes' );
  }

  public function filter_image_sizes( $sizes ) {
    unset( $sizes['large'] );

    return $sizes;
  }

  public function handle_menus() {
    // add_theme_support( 'menus' );
  }
}

new Theme_Support();
