<?php get_header(); ?>

<div class="container u-clear">

  <?php get_sidebar(); ?>

  <main class="content">
    <div class="projects js-all-cards">

      <?php

      // projects
      $projects_args = array(
        'post_type' => 'project',
        'posts_per_page' => -1,
        'orderby' => 'modified',
        'order' => 'DESC'
      );

      $projects_query = new WP_Query( $projects_args );

      if ( $projects_query->have_posts() ) : while ( $projects_query->have_posts() ) : $projects_query->the_post(); ?>
        <!-- TODO: clean up php tags -->
        <?php get_template_part('components/card'); ?>
      <?php endwhile; wp_reset_postdata(); ?>
      <?php else: ?>
        <p class="projects__none text mod-regular mod-black">
          <?php _e( 'Sorry, there are no projects matched your criteria.', TEXT_DOMAIN ) ?>
        </p>
      <?php endif; ?>

    </div>
  </main>

</div>

<?php get_footer(); ?>
