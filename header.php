<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-flex no-svg">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="description" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--vitaminaro app-->

  <title><?php wp_title(); ?></title>

  <!--<link rel="apple-touch-icon" href="apple-touch-icon.png">-->
  <!-- TODO: Place favicon.ico in the root directory -->
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />

  <!--<link rel="stylesheet" href="styles/main.css">-->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
  your browser</a> to improve your experience.</p>
<![endif]-->

<header class="header u-hidden">
  <form action="#" class="search-form">
    <button class="search__submit" type="submit"></button>
    <input class="search__input" type="search" placeholder=""/>
    <!-- auto complete -->
  </form>
</header>
