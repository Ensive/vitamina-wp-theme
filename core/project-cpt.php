<?php

include( 'custom_post_type.php' );

$project = new Custom_Post_Type( 'Project' );
$project->add_taxonomy( 'post_tag' );
$project->add_taxonomy( 'category' );
