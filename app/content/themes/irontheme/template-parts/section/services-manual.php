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

		<?php if (have_rows('list')): ?>
			<div class="services-cat-list">
				<?php $i = 0; while (have_rows('list')): the_row(); ?>
					<div class="services-cat-list__item<?php echo $i == 0 ? ' is-active' : ''; $i++; ?>">
						<?php if (get_sub_field('img')): ?>
							<div class="services-cat-list__img" style="background-image: url(<?php echo wp_get_attachment_image_url(get_sub_field('img'), 'services_cat'); ?>)"></div>
						<?php endif; ?>

						<?php if (get_sub_field('icon')) {
							echo do_shortcode(get_sub_field('icon'));
						} ?>
						<a href="<?php echo esc_url(get_sub_field('link')); ?>" class="services-cat-list__btn"><?php the_sub_field('title'); ?></a>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

	</div>
</section>