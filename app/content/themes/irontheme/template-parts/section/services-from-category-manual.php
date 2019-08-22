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

		<?php if (have_rows('list')): ?>

			<div class="services-sub-cat-list">
				<?php while (have_rows('list')): the_row(); ?>
					<a href="<?php echo esc_url(get_sub_field('link')); ?>" class="services-sub-cat-list__item">
						<?php echo do_shortcode(get_sub_field('icon')); ?>
						<?php the_sub_field('title'); ?>
					</a>
				<?php endwhile; ?>
			</div>

		<?php endif; ?>

	</div>
</section>