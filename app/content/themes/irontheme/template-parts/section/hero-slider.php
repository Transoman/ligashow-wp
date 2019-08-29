<?php $slider_settings = get_sub_field('slider_settings'); ?>

<?php if (have_rows('slider')): ?>
	<div class="hero-slider-wrap">
		<div class="hero-slider swiper-container"<?php echo $slider_settings['speed'] ? ' data-speed="'.$slider_settings['speed'].'"' : 'data-speed="300"'?>>
			<div class="swiper-wrapper">
				<?php while (have_rows('slider')): the_row(); ?>
					<div class="hero-slider__item swiper-slide"<?php echo get_sub_field('bg_img') ? ' style="background-image: url('.get_sub_field('bg_img').')"' : ''; ?>>
						<div class="container">

							<div class="hero-slider__container">
								<div class="hero-slider__left">
									<h1 class="hero-slider__title"><?php the_sub_field('title'); ?></h1>
								</div>

								<div class="hero-slider__right">
									<?php the_sub_field('descr'); ?>
								</div>
							</div><!-- /.hero-slider__container -->

							<?php if (get_sub_field('type') == 'link' && get_sub_field('link')): ?>
								<a href="<?php echo esc_url(get_sub_field('link')); ?>" class="btn"><?php the_sub_field('btn_text'); ?></a>
							<?php elseif (get_sub_field('type') == 'popup' && get_sub_field('popup')): ?>
								<a href="#" class="btn <?php echo get_sub_field('popup')[0]->post_name; ?>_open"><?php the_sub_field('btn_text'); ?></a>
							<?php endif; ?>

						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="swiper-pagination"></div>
		</div>

		<div class="container">
			<div class="hero-thumb-slider swiper-container">
				<div class="swiper-wrapper">
					<?php while (have_rows('slider')): the_row(); ?>
						<div class="hero-thumb-slider__item swiper-slide">
              <div class="slider-progress"></div>
							<span class="hero-thumb-slider__title"><?php the_sub_field('title'); ?></span>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div><!-- /.hero-slider-wrap -->

<?php endif; ?>