<div class="portfolio-slider-card-full">
	<div class="portfolio-slider-card-full__top">
		<div class="portfolio-slider-card-full__img">
      <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('portfolio_cat'); ?></a>
    </div>
		<div class="portfolio-slider-card-full__top-right">
			<span class="portfolio-slider-card-full__date"><?php the_field('date'); ?></span>
			<h3 class="portfolio-slider-card-full__title">
        <a href="<?php the_permalink(); ?>"><?php echo wp_trim_words(get_the_title(), 8); ?></a>
      </h3>
		</div>
	</div>

	<div class="portfolio-slider-card-full__bottom">

		<div class="ribbon-number portfolio-slider-card-full__ribbon-number">
			<div class="ribbon-number__wrap">
				<span class="ribbon-number__top-line"></span>
				<b><?php if (get_field('completed_project')) {
						the_field('completed_project');
					}
					else {

						$terms = get_the_terms(get_the_ID(), 'portfolio_cat');

						$args = array(
							'post_type' => 'portfolio',
							'posts_per_page' => -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'portfolio_cat',
									'field' => 'term_id',
									'terms' => $terms[0]->term_id
								)
							)
						);

						$query = new WP_Query($args);

						if ($query->post_count) {
							echo $query->post_count;
						}
						else {
							echo '0';
						}
					} ?></b>
				<span>реализовано <br>подобных <br>проектов</span>
			</div>
		</div>

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