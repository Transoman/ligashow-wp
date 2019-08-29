<section class="s-similar-services bg-gray">
	<div class="container">
		<div class="section-header">
			<h2 class="section-title"><?php the_sub_field('title'); ?></h2>
		</div>

		<?php $terms = get_the_terms(get_the_ID(), 'services_cat');
		$term_ids = [];
		if ($terms):
			foreach ($terms as $term) {
				$term_ids[] = $term->term_id;
			}

			$args = array(
				'post_type' => 'services',
				'post_status' => 'publish',
				'posts_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title',
				'post__not_in' => array(get_the_ID()),
				'tax_query' => array(
					array(
						'taxonomy' => 'services_cat',
						'field' => 'term_id',
						'terms' => $term_ids
					)
				)
			);

			$services = new WP_Query($args);

			if ($services->have_posts()): ?>
      <div class="slider-wrap">
				<div class="similar-services-slider swiper-container">
					<div class="swiper-wrapper">
						<?php while ($services->have_posts()): $services->the_post(); ?>
							<div class="similar-services-slider__item swiper-slide">
								<a href="<?php the_permalink(); ?>" class="services-sub-cat-card">
									<?php echo do_shortcode(get_field('icon')); ?>
									<?php the_title(); ?>
								</a>
							</div>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>

				<div class="slider-controls">
					<div class="swiper-pagination"></div>
					<div class="slider-controls__btns">
						<div class="swiper-button-prev">
							<?php ith_the_icon('arrow-left'); ?>
						</div>
						<div class="swiper-button-next">
							<?php ith_the_icon('arrow-right'); ?>
						</div>
					</div>
				</div>
      </div>
			<?php endif; ?>
		<?php endif; ?>

	</div>
</section>