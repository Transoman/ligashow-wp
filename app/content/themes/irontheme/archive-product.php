<?php get_header();

if (is_tax()) {
	$object = get_queried_object();
}
elseif (is_archive()) {
	$object = get_queried_object()->name;
} ?>

	<section class="product bg-gray">
		<div class="container">

			<div class="product__wrap">
				<div class="product__left">
					<?php get_sidebar('product'); ?>
				</div>

				<div class="product__right">
					<?php if (have_posts()): ?>
						<div class="product-list">
							<?php while (have_posts()): the_post(); ?>
								<div class="product-list__item">
									<?php get_template_part('template-parts/product', 'card'); ?>
								</div>
							<?php endwhile; wp_reset_postdata(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</section>

<?php get_template_part( 'template-parts/all', 'sections' );
get_footer();