  </div><!-- /.content -->

  <footer class="footer">
    <div class="container">
      <div class="footer__top">
        <div class="footer__col">
          <?php if (get_field('phone', $GLOBALS['region_id'])): ?>
            <a href="tel:<?php echo preg_replace('![^0-9/+]+!', '', get_field('phone', $GLOBALS['region_id'])); ?>" class="footer__phone"><?php the_field('phone', $GLOBALS['region_id']); ?></a>
          <?php endif; ?>
        </div>

	      <?php $regions = get_any_post('region', -1);
	      if ($regions->have_posts()): ?>
        <div class="footer__col">
          <div class="location footer__location">

			      <?php $i = 0; while ($regions->have_posts()): $regions->the_post(); ?>

			      <?php if ($i == 0): ?>
            <div class="location__head">
				      <?php ith_the_icon('navigation', 'location__icon'); ?>
              <span class="location__title">
                <?php
                if ($GLOBALS['region_id']) {
	                echo get_post($GLOBALS['region_id'])->post_title;
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
                <li><a href="<?php echo '?region_id='. get_the_ID(); ?>"><?php the_title(); ?></a></li>
					      <?php endwhile; wp_reset_postdata(); ?>
              </ul>
            </div>

          </div>
        </div>
	      <?php endif; ?>

        <div class="footer__col footer__col--social">
          <?php $socials = get_any_post( 'socials', -1 );
          if ($socials->have_posts()): ?>
            <ul class="socials footer__socials">
              <?php while ($socials->have_posts()): $socials->the_post(); ?>
                <li>
                  <a href="<?php echo esc_url(get_field('link')); ?>" target="_blank" style="fill: <?php the_field('icon_color'); ?>">
                    <?php echo do_shortcode(get_field('icon')); ?>
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
        </div>
        
      </div>

      <div class="footer__middle">
        <?php if (has_nav_menu('footer')) {
	        wp_nav_menu( array(
		        'theme_location'  => 'footer',
		        'menu'            => '',
		        'container'       => '',
		        'container_class' => '',
		        'container_id'    => '',
		        'menu_class'      => 'footer__menu',
	        ) );
        } ?>

        <div class="footer__address">
          <?php the_field('address', $GLOBALS['region_id']); ?>
        </div>

      </div>

      <div class="footer__bottom">
        <?php if (get_field('dev_site', 'option')): ?>
          <p class="footer__dev"><?php the_field('dev_site', 'option'); ?></p>
        <?php endif; ?>
	      <?php if (get_field('copy', 'option')): ?>
          <p class="footer__copy"><?php the_field('copy', 'option'); ?></p>
        <?php endif; ?>
      </div>

    </div>
  </footer><!-- #colophon -->

</div><!-- /.wrapper -->

<?php $popups = get_any_post('popup', -1);
if ($popups->have_posts()):
  while ($popups->have_posts()): $popups->the_post();?>
    <div class="modal<?php echo get_field('css_class') ? ' '.get_field('css_class') : ''; ?>" id="<?php echo get_post_field('post_name'); ?>">
      <button type="button" class="modal__close <?php echo get_post_field('post_name'); ?>_close"></button>
      <?php if (!get_field('hide_title')): ?>
        <h3 class="modal__title"><?php the_title(); ?></h3>
      <?php endif; ?>

      <div class="modal__content">
        <?php the_content(); ?>
      </div>

      <?php if ($forms = get_field('forms')):
        foreach ($forms as $form): ?>
        <script>
            jQuery(document).ready(function($) {
                $('.wpcf7[id*="wpcf7-f<?php echo $form->ID; ?>"]').on('wpcf7:mailsent', function(){
                    var modal = $('.modal');
                    modal.popup("hide");
                    $("#<?php echo get_post_field('post_name'); ?>").popup("show");
                    setTimeout(function(){
                        $(".modal").popup("hide");
                        modal.find('.wpcf7-response-output').hide();
                    }, 4000);
                });
            });
        </script>
      <?php endforeach;
      endif; ?>

    </div>
<?php endwhile; wp_reset_postdata();
endif; ?>

  <svg style="position: absolute; z-index: -100; height: 1px; width: 1px;">
    <defs>
      <linearGradient id="gradient" x1="0" y1="0%" x2="0" y2="100%">
        <stop offset="0%" style="stop-color: #0036ff"></stop>
        <stop offset="100%" style="stop-color: #0072ff"></stop>
      </linearGradient>
    </defs>
  </svg>

<?php wp_footer(); ?>

</body>
</html>
