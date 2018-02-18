<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-flex no-svg">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

  <!-- fav & app icons -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri() . '/apple-touch-icon.png' ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri() . '/favicon-32x32.png' ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri() . '/favicon-16x16.png' ?>">
  <link rel="manifest" href="<?php echo get_stylesheet_directory_uri() . '/manifest.json' ?>">
  <link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri() . '/safari-pinned-tab.svg' ?>" color="#696969">
  <meta name="apple-mobile-web-app-title" content="Vitamin A.">
  <meta name="application-name" content="Vitamin A.">
  <meta name="theme-color" content="#eee8cb">

  <!--[if IE]>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" async></script>
  <![endif]-->

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
  your browser</a> to improve your experience.</p>
<![endif]-->

<header class="header">
  <form action="#" class="search-form">
    <button class="search__submit" type="submit">
      <i class="icon-search"></i>
    </button>
    <!-- TODO: auto complete -->
    <input class="search__input" type="search" placeholder="Search..." />
  </form>
</header>
