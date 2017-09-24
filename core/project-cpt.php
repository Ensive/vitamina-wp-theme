<?php

function vi_setup_project_post_type() {
  $project = new Custom_Post_Type( 'Project' );

  // project taxonomies
  $project->add_taxonomy( 'post_tag' );
  $project->add_taxonomy( 'category' );

  // project meta boxes
//  $project->add_meta_box('Period');
}

vi_setup_project_post_type();
