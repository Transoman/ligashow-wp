<section class="s-project bg-gray">
	<div class="container">
		<div class="section-header">
			<h2 class="section-title"><?php the_sub_field('title'); ?></h2>

			<?php if (get_sub_field('link_text') && get_sub_field('link_url')): ?>
				<a href="<?php echo esc_url(get_sub_field('link_url')); ?>" class="link-arrow">
					<?php the_sub_field('link_text'); ?>
					<?php ith_the_icon('arrow-right', 'link-arrow__icon'); ?>
				</a>
			<?php endif; ?>
		</div>
	</div>

	<?php $portfolios = get_portfolios(10);
	if ($portfolios->have_posts()): ?>
		<div class="portfolio-slider-wrap">
			<div class="slider-container">
				<div class="portfolio-slider swiper-container">
					<div class="swiper-wrapper">
						<?php while ($portfolios->have_posts()): $portfolios->the_post(); ?>
							<div class="portfolio-slider__item swiper-slide">
								<div class="portfolio-slider-card">
									<span class="portfolio-slider-card__date"><?php the_field('date'); ?></span>

									<div class="portfolio-slider-card__img">
										<?php the_post_thumbnail('portfolio_cat'); ?>
									</div>

									<h3 class="portfolio-slider-card__title"><?php the_title(); ?></h3>
								</div>

								<div class="portfolio-slider-card-full">
									<div class="portfolio-slider-card-full__top">
										<div class="portfolio-slider-card-full__img"><?php the_post_thumbnail('portfolio_cat'); ?></div>
										<div class="portfolio-slider-card-full__top-right">
											<span class="portfolio-slider-card-full__date"><?php the_field('date'); ?></span>
											<h3 class="portfolio-slider-card-full__title"><?php the_title(); ?></h3>
										</div>
									</div>

									<div class="portfolio-slider-card-full__bottom">
										<p class="portfolio-slider-card-full__label">Услуги на мероприятии</p>
										<ul class="portfolio-slider-card-full__list">
											<li>Аренда кофемашин</li>
											<li>Кофе-брейк меню</li>
											<li>Выездные бариста</li>
											<li>Кофейный бар</li>
										</ul>

										<div class="text-right">
											<a href="<?php the_permalink(); ?>" class="portfolio-slider-card-full__link">подробнее</a>
										</div>

									</div>

								</div>

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
	<?php endif; ?>

</section>