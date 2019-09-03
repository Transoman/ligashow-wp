<section class="s-similar-portfolio">
	<div class="container">
		<div class="section-header">
			<h2 class="section-title"><?php the_sub_field('title'); ?></h2>
		</div>
	</div>

	<?php $slider_settings = get_sub_field('slider_settings');
  if (have_rows('list')): ?>
    <div class="slider-wrap">
			<div class="slider-container">
				<div class="similar-portfolio-slider swiper-container"
					<?php echo $slider_settings['speed'] ? ' data-speed="'.$slider_settings['speed'].'"' : 'data-speed="300"'?>
					<?php echo $slider_settings['autoplay'] ? ' data-autoplay="true"' : ''; ?>>
					<div class="swiper-wrapper">
						<?php while (have_rows('list')): the_row(); ?>
							<div class="similar-portfolio-slider__item swiper-slide">
								<?php if (get_sub_field('video')): ?>
									<div class="video">
										<a href="<?php echo esc_url(get_sub_field('video')); ?>" class="video__link">
											<?php if (get_field('video_poster')) {
												echo wp_get_attachment_image( get_field('video_poster'), 'similar-portfolio-slider', '', array('class' => 'video__media') );
											} ?>
                    </a>
										<button type="button" aria-label="Запустить видео" class="video__button"></button>
                    <?php echo wpautop(get_sub_field('text_for_video')); ?>
									</div>
								<?php else: ?>
                  <a href="<?php echo wp_get_attachment_image_url(get_sub_field('img'), 'full'); ?>" data-fancybox="group">
									  <?php echo wp_get_attachment_image(get_sub_field('img'), 'similar-portfolio-slider'); ?>
                  </a>
								<?php endif; ?>
							</div>
						<?php endwhile; ?>
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
		<?php endif; ?>

</section>