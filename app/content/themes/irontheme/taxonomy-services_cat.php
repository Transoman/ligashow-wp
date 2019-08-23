<?php get_header();
if (is_tax()) {
	$object = get_queried_object();
}
elseif (is_archive()) {
	$object = get_queried_object()->name;
}
global $wp_query;
?>

<?php if ( have_posts() ) : ?>

	<section>
		<div class="container">
			<div class="section-header">
				<h2 class="section-title"><?php single_term_title(); ?></h2>
			</div>

			<div class="services-sub-cat-list">
				<?php
				while ( have_posts() ) :
					the_post(); ?>
					<a href="<?php the_permalink(); ?>" class="services-sub-cat-list__item">
						<?php echo do_shortcode(get_field('icon')); ?>
						<?php the_title(); ?>
					</a>
				<?php endwhile; ?>
			</div>

		</div>
	</section>
<?php endif; ?>

<?php get_template_part( 'template-parts/all', 'sections' );
get_footer();