<section class="s-services-sub-cat">
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

		<?php $sub_cats = get_sub_field('cat');

		$services = get_any_post('services', -1, 'services_cat', $sub_cats);

		if ($services->have_posts()): ?>

			<div class="services-sub-cat-list">
				<?php while ($services->have_posts()): $services->the_post(); ?>
					<a href="<?php the_permalink(); ?>" class="services-sub-cat-list__item">
						<?php echo do_shortcode(get_field('icon')); ?>
						<?php the_title(); ?>
					</a>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>

		<?php endif; ?>

	</div>
</section>