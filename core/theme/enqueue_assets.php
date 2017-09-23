<?php

class Theme_Assets {
  public function __construct() {
    add_action( 'wp_enqueue_scripts', array( $this, 'include_js' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'include_css' ) );
  }

  public function include_css() {
    wp_enqueue_style(
      'css-main',
      get_stylesheet_directory_uri() . '/style.min.css',
      null,
      time()
    );
  }

  public function include_js() {
    wp_enqueue_script(
      'js-vitamina-vendors',
      get_stylesheet_directory_uri() . '/assets/scripts/vendors.min.js',
      [],
      time(),
      true
    );

    wp_enqueue_script(
      'js-vitamina-theme',
      get_stylesheet_directory_uri() . '/assets/scripts/main.min.js',
      [ 'js-vitamina-vendors' ],
      time(),
      true
    );
  }
}

new Theme_Assets();

?>
