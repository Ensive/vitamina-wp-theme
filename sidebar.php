<div class="sidebar">

  <nav class="sidebar__nav">
    <a class="sidebar__link" href="#">#Birou</a>
    <a class="sidebar__link is-active" href="#">#Proiecte</a>
    <a class="sidebar__link is-active" href="#">#Interior</a>
    <a class="sidebar__link is-active" href="#">#Patrimoniu</a>
    <a class="sidebar__link" href="#">#Urbanism</a>
    <a class="sidebar__link" href="#">#Arhitectura</a>
    <a class="sidebar__link" href="#">#Evenimente</a>
    <a class="sidebar__link" href="#">#Parteneri</a>
    <a class="sidebar__link" href="#">#Toate</a>
  </nav>

  <a href="<?php bloginfo('url'); ?>" class="sidebar__logo u-desktop-only" role="banner">
    <img src="<?php echo IMAGES . 'vitamina-logo.jpg' ?>" alt="Vitamina logo" />
  </a>
  <?php if ( is_home() ) { ?>
    <h1 class="u-seo-hidden"><?php bloginfo('name'); ?></h1>
  <?php } ?>
</div>
