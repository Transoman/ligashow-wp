<section class="s-our-project">
	<div class="container">

		<div class="section-header">
			<h2 class="section-title"><?php the_sub_field('title'); ?></h2>
		</div>

		<?php if (have_rows('list')): ?>
			<div class="project">
				<?php while (have_rows('list')): the_row(); ?>
					<a href="<?php echo esc_url(get_sub_field('link')); ?>" class="project__item" target="_blank">
						<div class="project__inner">
							<?php echo wp_get_attachment_image(get_sub_field('logo'), 'medium', '', array('class' => 'project__logo')); ?>
							<div class="project__body">
								<?php echo wp_get_attachment_image(get_sub_field('img'), 'project'); ?>
								<span class="project__title"><?php the_sub_field('title'); ?></span>
							</div>
						</div>
					</a>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

	</div>
</section>