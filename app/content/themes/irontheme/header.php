<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="format-detection" content="telephone=no">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wrapper">
  <header class="header">
    <div class="container">

      <div class="logo header__logo">
        <?php the_custom_logo(); ?>
      </div>

      <div class="divider"></div>

      <nav class="nav header__nav">
        <button type="button" class="nav__close"></button>
        <?php
        wp_nav_menu( array(
          'theme_location' => 'primary',
          'menu'            => '', 
          'container'       => 'div',
          'container_class' => 'nav__menu-wrap',
          'container_id'    => '',
          'menu_class'      => 'nav-list', 
          'menu_id'         => '',
        ) );
        ?>
      </nav>

      <div class="nav-overlay"></div>

      <?php $regions = get_regions(-1);
      if ($regions->have_posts()): ?>
        <div class="location header__location">

	        <?php $i = 0; while ($regions->have_posts()): $regions->the_post(); ?>

          <?php if ($i == 0): ?>
            <div class="location__head">
              <?php ith_the_icon('navigation', 'location__icon'); ?>
              <span class="location__title">
                <?php $region_id = $_GET['region_id'];
                if ($region_id) {
                  echo get_post($region_id)->post_title;
                }
                else {
                  the_title();
                }
                ?>
              </span>
            </div>
            <div class="location__body">
              <ul class="location__list">
          <?php endif; $i++; ?>
                <li><a href="<?php echo home_url('/') . '?region_id='. get_the_ID(); ?>"><?php the_title(); ?></a></li>
	        <?php endwhile; wp_reset_postdata(); ?>
            </ul>
          </div>

        </div>
      <?php endif; ?>
      
      <div class="phone header__phone">
        <?php
        $callback = get_field('callback', 'option');
        if ($callback['type'] == 'link' && $callback['link']): ?>
          <a href="<?php echo esc_url($callback['link']); ?>" class="phone__callback">
            <img src="<?php echo $callback['icon']; ?>" width="19" alt="">
          </a>
        <?php elseif ($callback['type'] == 'popup' && $callback['popup']): ?>
          <a href="#" class="phone__callback <?php echo $callback['popup'][0]->post_name; ?>_open">
            <img src="<?php echo $callback['icon']; ?>" width="19" alt="">
          </a>
        <?php endif; ?>

        <a href="tel:+78005509193" class="phone__tel">+7 (800) 550-91-93</a>
      </div>

      <button type="button" class="nav-toggle">
        <span class="nav-toggle__line"></span>
      </button>

    </div>
  </header><!-- /.header-->

  <div class="content">