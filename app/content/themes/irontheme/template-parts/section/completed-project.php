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

	<?php $args = array(
    'post_type' => 'portfolio',
    'posts_per_page' => 10,
    'post_status' => 'publish',
    'order' => 'ASC',
  );

	if (get_sub_field('show_important')) {
		$args['meta_query'] = array(
			array(
				'key' => 'important',
				'value' => 1
			)
		);
  }

  $portfolios = new WP_Query($args);
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
											<h3 class="portfolio-slider-card-full__title">
                        <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 8); ?></a>
                      </h3>
										</div>
									</div>

									<div class="portfolio-slider-card-full__bottom">
                    <?php if (get_field('services')): ?>
                      <p class="portfolio-slider-card-full__label">Услуги на мероприятии</p>
                      <ul class="portfolio-slider-card-full__list">
                        <?php
                        $terms_title = [];
						            foreach (get_field('services') as $item) {
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