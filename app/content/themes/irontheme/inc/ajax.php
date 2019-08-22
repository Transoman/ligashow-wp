<?php
function filter_portfolio(){
	$paged = $_POST['paged'] ? $_POST['paged'] : 1;

	$args = array(
		'post_type' => 'portfolio',
		'post_status' => 'publish',
		'paged' => $paged
	);

	$args['tax_query'] = array( 'relation'=>'AND' );

	if ( isset( $_POST['ids'] ) && $_POST['ids'] != '' ) {
		$args['tax_query'][] = array(
			'taxonomy' => 'portfolio_cat',
			'field' => 'term_id',
			'terms' => $_POST['ids']
		);
	}

	$query = new WP_Query( $args );
	$max_pages = $query->max_num_pages;

	if( $query->have_posts() ) :

		while( $query->have_posts() ): $query->the_post(); ?>
			<div class="portfolio-list__item">
        <?php get_template_part('template-parts/portfolio', 'card'); ?>
      </div>
		<?php endwhile;
    if ( $query->max_num_pages > 1 ) : ?>
    <script>
        var true_posts = '<?php echo serialize($query->query_vars); ?>';
        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
        var max_pages = '<?php echo $query->max_num_pages; ?>';
    </script>
      <div class="text-center">
        <a href="#" class="btn-load-more load-more">Показать еще</a>
      </div>
	<?php endif;
	else:
		echo '<p>Пока здесь нет информации</p>';
	endif;
	die();
}
add_action('wp_ajax_filter_portfolio', 'filter_portfolio');
add_action('wp_ajax_nopriv_filter_portfolio', 'filter_portfolio');


function load_more_post(){
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1;
	$args['post_status'] = 'publish';

	query_posts( $args );

	if( have_posts() ) :

		while( have_posts() ): the_post(); ?>
			<div class="portfolio-list__item">
        <?php get_template_part('template-parts/portfolio', 'card'); ?>
      </div>
		<?php endwhile;

	endif;
	die();
}
add_action('wp_ajax_load_more_post', 'load_more_post');
add_action('wp_ajax_nopriv_load_more_post', 'load_more_post');