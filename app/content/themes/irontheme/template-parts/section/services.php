<section class="s-services">
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

		<?php $services_cats = get_terms(array(
			'taxonomy' => 'services_cat',
			'hide_empty' => false,
			'orderby' => 'id',
		));
		if ($services_cats): ?>
			<div class="services-cat-list">
				<?php $i = 0; foreach ($services_cats as $cat): ?>
					<div class="services-cat-list__item<?php echo $i == 0 ? ' is-active' : ''; $i++; ?>">
						<?php if (get_field('bg', $cat)): ?>
							<div class="services-cat-list__img" style="background-image: url(<?php echo wp_get_attachment_image_url(get_field('bg', $cat), 'services_cat'); ?>)"></div>
						<?php endif; ?>

						<?php if (get_field('icon', $cat)) {
							echo do_shortcode(get_field('icon', $cat));
						} ?>
						<a href="<?php echo get_term_link($cat); ?>" class="services-cat-list__btn"><?php echo $cat->name; ?></a>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</div>
</section>