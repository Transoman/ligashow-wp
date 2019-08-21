<section class="team">
	<div class="container">
		<?php if (get_sub_field('title')): ?>
			<div class="section-header">
				<h2 class="section-title"><?php the_sub_field('title'); ?></h2>
			</div>
		<?php endif; ?>

		<?php if (have_rows('list')): ?>
			<div class="team-list">
				<?php while (have_rows('list')): the_row(); ?>
					<div class="team-list__item">
						<div class="team-list__inner">
							<div class="team-list__img">
								<?php echo wp_get_attachment_image(get_sub_field('img'), array(200, 200)); ?>
							</div>
							<p class="team-list__name"><?php the_sub_field('name'); ?></p>
							<p class="team-list__position"><?php the_sub_field('position'); ?></p>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

	</div>
</section>