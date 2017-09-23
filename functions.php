<?php

define( 'TEXT_DOMAIN', 'vitamina' );
define( 'TEMP_PATH', get_bloginfo( 'stylesheet_directory') );
define( 'IMAGES', TEMP_PATH . '/assets/images/' );

// include js & css
require_once( 'core/theme/enqueue_assets.php' );
require_once( 'core/theme/cleanup.php');
