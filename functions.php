<?php

define( 'TEXT_DOMAIN', 'vitamina' );
define( 'TEMP_PATH', get_bloginfo( 'stylesheet_directory' ) );
define( 'IMAGES', TEMP_PATH . '/assets/images/' );

// Theme setup (including assets, cleanup, add core features)
include( 'core/theme/theme-assets.php' );
include( 'core/theme/theme-cleanup.php' );
include( 'core/theme/theme-support.php' );

// PHP helper classes
include( 'core/custom_post_type.php' );

// Project custom post type
include( 'core/project-cpt.php' );
