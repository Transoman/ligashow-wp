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


					$portfolios = get_any_post('portfolio', -1);

					$serv_arr = [ array() ];
					$i = 0;

					while ($portfolios->have_posts()) {
						$portfolios->the_post();

						foreach ( get_field( 'services' ) as $item ) {
							$key = array_search( $item->ID, array_column( $serv_arr, 'id' ) );

							if ( $key !== false ) {

								$serv_arr[ $key ]['count'] += 1;
							} else {
								$serv_arr[ $i ]['id']    = $item->ID;
								$serv_arr[ $i ]['count'] = 1;

							}
							$i ++;
						}

					}
					wp_reset_postdata();

					foreach ($serv_arr as $k => $it) {
						$volume[$k] = $it['id'];
						$ed[$k] = $it['count'];
					}

					$count = array_column($serv_arr, 'count');
					array_multisort($count, SORT_DESC, $serv_arr);

					foreach ($serv_arr as $id) {
						$serv_ids[] = $id['id'];
					}

					if ($services_terms): ?>
            <ul class="portfolio__services-list">
							<?php foreach ($services_terms as $term): ?>
                <li>
                  <span><?php echo $term->name; ?></span>
									<?php
									$args = array(
										'post_type' => 'services',
										'posts_per_page' => 7,
										'post__in' => $serv_ids,
										'tax_query' => array(
											array(
												'taxonomy' => 'services_cat',
												'field' => 'term_id',
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
					<?php $portfolios = get_any_post('portfolio');
					if ($portfolios->have_posts()): ?>
            <div class="portfolio-list" id="response">
							<?php while ($portfolios->have_posts()): $portfolios->the_post(); ?>
                <div class="portfolio-list__item">
									<?php get_template_part('template-parts/portfolio', 'card'); ?>
                </div>
							<?php endwhile; wp_reset_postdata(); ?>
							<?php if ( $portfolios->max_num_pages > 1 ) : ?>
                <script>
                    var true_posts = '<?php echo serialize($portfolios->query_vars); ?>';
                    var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                    var max_pages = '<?php echo $portfolios->max_num_pages; ?>';
                </script>
                <div class="text-center">
                  <a href="#" class="btn-load-more load-more">Показать еще</a>
                </div>
							<?php endif; ?>
            </div>
					<?php endif; ?>
        </div>
      </div>

    </div>
  </section>

<?php get_template_part( 'template-parts/all', 'sections' );
get_footer(); ?>