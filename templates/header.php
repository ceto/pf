<input type="checkbox" id="nav-toggle">
<header class="navbar"  role="banner">
  <div class="wrapper wrapper--wide">
    <a class="navbar__brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <nav class="navbar__nav" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar__ul']);
      endif;
      ?>
    </nav>
    <label class="nav-toggle" for="nav-toggle"><i class="ion ion-navicon"></i>MENU</label>
  </div>
</header>