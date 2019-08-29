<section class="s-similar-portfolio">
	<div class="container">
		<div class="section-header">
			<h2 class="section-title"><?php the_sub_field('title'); ?></h2>
		</div>
	</div>

	<?php $cat = get_sub_field('cat');
	if ($cat):
		$slider_settings = get_sub_field('slider_settings');

		$args = array(
			'post_type' => 'portfolio',
			'post_status' => 'publish',
			'posts_per_page' => $slider_settings['count_slide'],
			'order' => 'DESC',
			'orderby' => 'id',
			'tax_query' => array(
				array(
					'taxonomy' => 'portfolio_cat',
					'field' => 'term_id',
					'terms' => $cat
				)
			),
			'meta_query' => array(
				array(
					'key' => 'important',
					'value' => 1
				)
			)
		);
		$portfolio_items = new WP_Query($args);
		if ($portfolio_items->have_posts()): ?>
    <div class="slider-wrap">
			<div class="slider-container">
				<div class="similar-portfolio-slider swiper-container"
					<?php echo $slider_settings['speed'] ? ' data-speed="'.$slider_settings['speed'].'"' : 'data-speed="300"'?>
					<?php echo $slider_settings['autoplay'] ? ' data-autoplay="true"' : ''; ?>>
					<div class="swiper-wrapper">
						<?php while ($portfolio_items->have_posts()): $portfolio_items->the_post(); ?>
							<div class="similar-portfolio-slider__item swiper-slide">
								<?php if (get_field('video')): ?>
									<div class="video">
										<a href="<?php echo esc_url(get_field('video')); ?>" class="video__link"></a>
										<button type="button" aria-label="Запустить видео" class="video__button"></button>
										<p><?php the_title(); ?></p>
									</div>
								<?php else: ?>
                  <a href="<?php the_post_thumbnail_url('full'); ?>" data-fancybox="group">
									  <?php the_post_thumbnail('similar-portfolio-slider'); ?>
                  </a>
								<?php endif; ?>
							</div>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>

			<div class="container">
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
    </div>
		<?php endif;
	endif; ?>

</section>