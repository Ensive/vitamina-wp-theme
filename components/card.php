<article id="project-<?php the_ID(); ?>" class="project__item js-project-card">
  <header>
    <a href="<?php the_permalink() ?>" class="project__link"></a>
    <h2 class="project__title"><?php get_the_title(); ?></h2>
  </header>

  <p class="project__intro"><?php the_content(); ?></p>

  <div class="project__figure">
    <figure class="project__photo">
      <?php the_post_thumbnail( 'small' ); ?>
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

  <footer class="project__meta">
    <a href="#" class="project__meta-tag">#magna</a>
    <a href="#" class="project__meta-tag">#aliqua</a>
    <a href="#" class="project__meta-tag">#enim</a>
    <a href="#" class="project__meta-tag">#minim</a>
    <a href="#" class="project__meta-tag">#veniam</a>
  </footer>

  <button class="project__btn"></button>

</article>
