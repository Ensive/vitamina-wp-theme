<?php

define( 'TEXT_DOMAIN', 'vitamina' );
define( 'TEMP_PATH', get_bloginfo( 'stylesheet_directory' ) );
define( 'IMAGES', TEMP_PATH . '/assets/images/' );

// include js & css
include( 'core/theme/enqueue_assets.php' );
include( 'core/theme/cleanup.php' );
include( 'core/theme/support.php' );
