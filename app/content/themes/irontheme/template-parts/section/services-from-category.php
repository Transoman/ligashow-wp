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

		$services = get_services(-1, $sub_cats);

		if ($services->have_posts()): ?>

			<div class="services-sub-cat-list">
				<?php while ($services->have_posts()): $services->the_post(); ?>
					<a href="<?php the_permalink(); ?>" class="services-sub-cat-list__item">
						<?php echo do_shortcode(get_field('icon')); ?>
						<?php the_title(); ?>
					</a>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>

			<svg style="position: absolute; z-index: -100; height: 1px; width: 1px;">
				<defs>
					<linearGradient id="services-cat-gradient" x1="0" y1="0%" x2="0" y2="100%">
						<stop offset="0%" style="stop-color: #0036ff"></stop>
						<stop offset="100%" style="stop-color: #00a2ff"></stop>
					</linearGradient>
				</defs>
			</svg>

		<?php endif; ?>

	</div>
</section>