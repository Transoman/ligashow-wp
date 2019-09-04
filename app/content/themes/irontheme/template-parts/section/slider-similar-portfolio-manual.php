<section class="s-similar-portfolio bg-gray">
	<div class="container">
		<div class="section-header">
			<h2 class="section-title"><?php the_sub_field('title'); ?></h2>
		</div>
	</div>

	<?php $slider_settings = get_sub_field('slider_settings');

		if (have_rows('list')): ?>
			<div class="portfolio-slider-wrap">
				<div class="slider-container">
					<div class="portfolio-slider swiper-container">
						<div class="swiper-wrapper">
							<?php while (have_rows('list')): the_row(); ?>
								<div class="portfolio-slider__item swiper-slide">
									<div class="portfolio-slider-card">
										<span class="portfolio-slider-card__date"><?php the_sub_field('date'); ?></span>

										<div class="portfolio-slider-card__img">
											<?php echo wp_get_attachment_image(get_sub_field('img'), 'portfolio_cat'); ?>
										</div>

										<h3 class="portfolio-slider-card__title"><?php the_sub_field('title'); ?></h3>
									</div>

									<div class="portfolio-slider-card-full">
										<div class="portfolio-slider-card-full__top">
											<div class="portfolio-slider-card-full__img">
                        <a href="<?php echo esc_url(get_sub_field('link')); ?>"><?php echo wp_get_attachment_image(get_sub_field('img'), 'portfolio_cat'); ?></a>
                      </div>
											<div class="portfolio-slider-card-full__top-right">
												<span class="portfolio-slider-card-full__date"><?php the_sub_field('date'); ?></span>
												<h3 class="portfolio-slider-card-full__title">
                          <a href="<?php echo esc_url(get_sub_field('link')); ?>"><?php echo wp_trim_words(get_sub_field('title'), 8); ?></a>
                        </h3>
											</div>
										</div>

										<div class="portfolio-slider-card-full__bottom">
											<?php if (get_sub_field('services')): ?>
                        <?php if (get_sub_field('subtitle')): ?>
												  <p class="portfolio-slider-card-full__label"><?php the_sub_field('subtitle'); ?></p>
                        <?php endif; ?>
												<ul class="portfolio-slider-card-full__list">
													<?php
													$terms_title = [];
													foreach (get_sub_field('services') as $item) {
														$terms_title[] = $item->post_title;
													}

													sort($terms_title, SORT_STRING );

													$i = 1;
													foreach ($terms_title as $item):
														if ($i++ < 5) :?>
															<li><?php echo $item; ?></li>
														<?php endif;
													endforeach;
													unset($terms_title);?>
												</ul>
											<?php endif; ?>

                      <?php if (get_sub_field('link')): ?>
                        <div class="text-right">
                          <a href="<?php echo esc_url(get_sub_field('link')); ?>" class="portfolio-slider-card-full__link">подробнее</a>
                        </div>
                      <?php endif; ?>

										</div>

									</div>

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