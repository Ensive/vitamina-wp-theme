<div class="project__item-wrapper js-project-card">
<article id="project-<?php the_ID(); ?>" class="project__item">
  <header>
    <a href="<?php the_permalink() ?>" class="project__link">
      <h2 class="project__title js-project-title"><?php the_title(); ?></h2>
    </a>
  </header>

  <p class="project__intro js-project-excerpt"><?php echo get_the_excerpt(); ?></p>

  <div class="project__figure">
    <figure class="project__photo">
      <?php if ( has_post_thumbnail() ) : ?>
        <?php the_post_thumbnail(); ?>
      <?php else : ?>
        <img src="<?php echo IMAGES . 'project-image.jpg' ?>" alt=""/>
      <?php endif; ?>
    </figure>

    <div class="project__actions">
      <a href="<?php the_permalink(); ?>" class="project__read-more js-read-more">
        <?php _e( 'read more', TEXT_DOMAIN ); ?>
      </a>
      <div class="project__social">
        <!-- TODO: provide social media links -->
        <a href="#" class="project__social-share icon-facebook-squared"></a>
        <a href="#" class="project__social-share icon-twitter"></a>
      </div>
    </div>
  </div>

  <div class="js-project-extra-content u-hidden">
    <h2 class="project__title"><?php the_title(); ?></h2>
    <!-- text mod-regular -->
    <!--<p class="project__intro"></p>-->
    <div class="project__extra-content text mod-regular">
      <?php

      // meta
      $vi_client_name = get_post_meta( get_the_ID(), 'vi_client_name', true );
      $vi_period_from = get_post_meta( get_the_ID(), 'vi_period_from', true );
      $vi_period_to = get_post_meta( get_the_ID(), 'vi_period_to', true );
      $vi_area_square_meters = get_post_meta( get_the_ID(), 'vi_area_square_meters', true );

      // taxonomy
      $vi_status = strip_tags( get_the_term_list( get_the_ID(), 'status' ) );

      ?>

      <?php if ( ! empty( $vi_client_name ) ) { ?>
        <p>
          <b><?php _e( 'Client:', TEXT_DOMAIN ); ?></b>
          <?php echo $vi_client_name; ?>
        </p>
      <?php } ?>

      <?php if ( ! empty( $vi_period_from ) ) { ?>
        <p>
          <b><?php _e( 'Period:', TEXT_DOMAIN ); ?></b>
          <?php echo $vi_period_from . ' - ' . $vi_period_to ?>
        </p>
      <?php } ?>

      <?php if ( ! empty( $vi_status ) ) { ?>
        <p>
          <b><?php _e( 'Status:', TEXT_DOMAIN ); ?></b>
          <?php echo $vi_status; ?>
        </p>
      <?php } ?>

      <?php if ( ! empty( $vi_area_square_meters ) ) { ?>
        <p>
          <b><?php _e( 'Area:', TEXT_DOMAIN ); ?></b>
          <?php echo $vi_area_square_meters; ?>
        </p>
      <?php } ?>

      <?php the_content(); ?>

      <button>Download file</button>
    </div>
    <br />
  </div>

  <footer class="project__meta js-project-tags">
    <!-- TODO: how to render tags in a custom way -->
    <?php the_tags( '', '' ); ?>
    <!--<a href="#" class="project__meta-tag">#magna</a>
    <a href="#" class="project__meta-tag">#aliqua</a>
    <a href="#" class="project__meta-tag">#enim</a>
    <a href="#" class="project__meta-tag">#minim</a>
    <a href="#" class="project__meta-tag">#veniam</a>-->
  </footer>

  <button class="project__btn"></button>

</article>
</div>
