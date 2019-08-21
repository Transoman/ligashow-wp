<?php
$object = null;

if (is_archive()) {
	$object = get_queried_object()->name;
}

if ( have_rows('layouts', $object) ):

	while ( have_rows('layouts', $object) ) : the_row();

		if ( get_row_layout() == 'hero_slider' ): ?>

			<?php get_template_part('template-parts/section/hero', 'slider'); ?>

		<?php elseif ( get_row_layout() == 'calculate_order' ): ?>

			<?php get_template_part('template-parts/section/calculate', 'order'); ?>

		<?php elseif ( get_row_layout() == 'completed_project' ): ?>

			<?php get_template_part('template-parts/section/completed', 'project'); ?>

		<?php elseif ( get_row_layout() == 'services' ): ?>

			<?php get_template_part('template-parts/section/services'); ?>

		<?php elseif ( get_row_layout() == 'banner' ): ?>

			<?php get_template_part('template-parts/section/banner'); ?>

		<?php elseif ( get_row_layout() == 'banner_2' ): ?>

			<?php get_template_part('template-parts/section/banner-2'); ?>

		<?php elseif ( get_row_layout() == 'banner_3' ): ?>

			<?php get_template_part('template-parts/section/banner-3'); ?>

		<?php elseif ( get_row_layout() == 'services_from_category' ): ?>

			<?php get_template_part('template-parts/section/services-from', 'category'); ?>

		<?php elseif ( get_row_layout() == 'services_from_category_tabs' ): ?>

			<?php get_template_part('template-parts/section/services-from', 'category-tabs'); ?>

		<?php elseif ( get_row_layout() == 'popular_order' ): ?>

			<?php get_template_part('template-parts/section/popular', 'order'); ?>

		<?php elseif ( get_row_layout() == 'partners' ): ?>

			<?php get_template_part('template-parts/section/partners'); ?>

		<?php elseif ( get_row_layout() == 'about' ): ?>

			<?php get_template_part('template-parts/section/about'); ?>

		<?php elseif ( get_row_layout() == 'project' ): ?>

			<?php get_template_part('template-parts/section/project'); ?>

		<?php elseif ( get_row_layout() == 'similar_services' ): ?>

			<?php get_template_part('template-parts/section/similar', 'services'); ?>

    <?php elseif ( get_row_layout() == 'advantages' ): ?>

			<?php get_template_part('template-parts/section/advantages'); ?>

		<?php elseif ( get_row_layout() == 'slider_portfolio' ): ?>

			<?php get_template_part('template-parts/section/slider', 'portfolio'); ?>

		<?php elseif ( get_row_layout() == 'slider_similar_portfolio' ): ?>

			<?php get_template_part('template-parts/section/slider', 'similar-portfolio'); ?>

		<?php elseif ( get_row_layout() == 'form_order' ): ?>

			<?php get_template_part('template-parts/section/form', 'order'); ?>

		<?php elseif ( get_row_layout() == 'team' ): ?>

			<?php get_template_part('template-parts/section/team'); ?>

		<?php elseif ( get_row_layout() == 'contact' ): ?>

			<section class="contact">
				<div class="container">
					<div class="contact__left">
						<div class="contact__row">
							<div class="contact__col">
								<?php if (get_field('phone', $GLOBALS['region_id'])): ?>
									<a href="tel:<?php echo preg_replace('![^0-9/+]+!', '', get_field('phone', $GLOBALS['region_id'])); ?>" class="contact__phone"><?php the_field('phone', $GLOBALS['region_id']); ?></a>
                  <br>
								<?php endif; ?>

								<?php if (get_field('email', $GLOBALS['region_id'])): ?>
									<a href="mailto:<?php the_field('email', $GLOBALS['region_id']); ?>" class="contact__email"><?php the_field('email', $GLOBALS['region_id']); ?></a>
								<?php endif; ?>

								<?php if (get_field('schedule', $GLOBALS['region_id'])): ?>
									<p class="contact__label">Режим работы:</p>
								<?php the_field('schedule', $GLOBALS['region_id']); ?>
								<?php endif; ?>
							</div>

							<div class="contact__col">
                <?php echo do_shortcode(get_sub_field('icon')); ?>

								<?php if (get_field('address', $GLOBALS['region_id'])): ?>
									<p class="contact__label contact__label--bd">Мы находимся</p>
									<?php the_field('address', $GLOBALS['region_id']); ?>
								<?php endif; ?>
							</div>
						</div>
					</div>

					<div class="contact__right">
						<?php if ( get_field('map', $GLOBALS['region_id']) == 'yandex' && get_field('yandex_map', $GLOBALS['region_id']) ): ?>
              <div class="contact__map" id="contact-map">
								<?php the_yandex_map('yandex_map', $GLOBALS['region_id'], null, get_field('mark', $GLOBALS['region_id'])); ?>
              </div>
						<?php elseif ( get_field('map', $GLOBALS['region_id']) == 'google' && get_field('google_map', $GLOBALS['region_id']) ): ?>
              <div class="contact__map" id="contact-map"></div>
              <script>
                  function initMap() {

										<?php $location = get_field('google_map', $GLOBALS['region_id']); ?>

                      var uluru = {lat: <?php echo $location['lat']; ?>, lng: <?php echo $location['lng']; ?>};
                      var map = new google.maps.Map(document.getElementById('contact-map'), {
                          zoom: 14,
                          center: uluru
                      });

                      var image = '<?php the_field('mark', $GLOBALS['region_id']); ?>';
                      var marker = new google.maps.Marker({
                          position: uluru,
                          map: map,
                          icon: image
                      });
                  }
              </script>
              <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php the_field('google_api_key', 'option'); ?>&callback=initMap"></script>

						<?php endif; ?>
          </div>
				</div>
			</section>

		<?php endif;

	endwhile;

else :

	// no layouts found

endif;

?>