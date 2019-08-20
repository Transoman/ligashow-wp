<?php get_header();

$object = get_queried_object()->name;
?>

	<section class="portfolio bg-gray">
		<div class="container">

			<div class="portfolio-filters">
				<div class="portfolio-filters__left">
					<ul class="portfolio-filters-list">
						<li class="is-active">
							<a href="#" class="btn btn--round all">Все</a>
						</li>


					<?php $terms = get_terms(array(
						'taxonomy' => 'portfolio_cat',
						'hide_empty' => false
					));

					if ($terms) {
						foreach ($terms as $term): ?>
						<li>
							<a href="#" class="btn btn--round" data-id="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></a>
						</li>
						<?php endforeach;
					} ?>
					</ul>
				</div>

				<div class="portfolio-filters__right">
					<a href="#" class="btn btn--round portfolio-filters__toggle">Показать все</a>
				</div>
			</div><!-- /.portfolio-filters -->

			<div class="portfolio__row">
				<div class="portfolio__left">
          <h3>Наши услуги</h3>

          <?php $services_terms = get_terms(array(
            'taxonomy' => 'services_cat',
            'hide_empty' => false
          ));

          if ($services_terms): ?>
            <ul class="portfolio__services-list">
              <?php foreach ($services_terms as $term): ?>
                <li>
                  <span><?php echo $term->name; ?></span>
                  <?php

                  $portfolios = get_any_post('portfolio', -1);



                  $args = array(
                    'post_type' => 'services',
                    'posts_per_page' => 7,
                    'tax_query' => array(
                      array(
                        'taxonomy' => 'services_cat',
                        'filed' => 'term_id',
                        'terms' => $term->term_id
                      )
                    )
                  );

                  $services = new WP_Query($args);
                  if ($services->have_posts()): ?>
                  <ul>
                    <?php while ($services->have_posts()): $services->the_post(); ?>
                    <li>
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                    <?php endwhile; wp_reset_postdata(); ?>
                  </ul>
                  <?php endif; ?>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>

					<?php if (get_field('type', $object) == 'link' && get_field('link', $object)): ?>
            <a href="<?php echo esc_url(get_field('link', $object)); ?>" class="btn"><?php the_field('btn_text', $object); ?></a>
					<?php elseif (get_field('type', $object) == 'popup' && get_field('popup', $object)): ?>
            <a href="#" class="btn <?php echo get_field('popup', $object)[0]->post_name; ?>_open"><?php the_field('btn_text', $object); ?></a>
					<?php endif; ?>

				</div>

				<div class="portfolio__right">
					<?php $portfolios = get_any_post('portfolio', -1);
					if ($portfolios->have_posts()): ?>
					<div class="portfolio-list" id="response">
						<?php while ($portfolios->have_posts()): $portfolios->the_post(); ?>
              <div class="portfolio-list__item">
                <div class="portfolio-slider-card-full">
                  <div class="portfolio-slider-card-full__top">
                    <div class="portfolio-slider-card-full__img"><?php the_post_thumbnail('portfolio_cat'); ?></div>
                    <div class="portfolio-slider-card-full__top-right">
                      <span class="portfolio-slider-card-full__date"><?php the_field('date'); ?></span>
                      <h3 class="portfolio-slider-card-full__title"><?php echo wp_trim_words(get_the_title(), 8); ?></h3>
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
              </div>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</section>

<?php get_template_part( 'template-parts/all', 'sections' );
get_footer(); ?>