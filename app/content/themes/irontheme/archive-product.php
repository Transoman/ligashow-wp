<?php get_header();

if (is_tax()) {
	$object = get_queried_object();
}
elseif (is_archive()) {
	$object = get_queried_object()->name;
}
global $wp_query;
?>

	<section class="product bg-gray">
		<div class="container">

			<div class="product__wrap">
				<div class="product__left">
					<?php get_sidebar('product'); ?>
				</div>

				<div class="product__right">
					<?php if (have_posts()): ?>
						<div class="product-list" id="response">
							<?php while (have_posts()): the_post(); ?>
								<div class="product-list__item">
									<?php get_template_part('template-parts/product', 'card'); ?>
								</div>
							<?php endwhile; wp_reset_postdata(); ?>
							<?php if ( $wp_query->max_num_pages > 1 ) : ?>
                <script>
                    var true_posts = '<?php echo serialize($wp_query->query_vars); ?>';
                    var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                    var max_pages = '<?php echo $wp_query->max_num_pages; ?>';
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
get_footer();