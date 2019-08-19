<section class="s-advantages">
	<div class="container">
		<div class="section-header">
			<h2 class="section-title"><?php the_sub_field('title'); ?></h2>
		</div>
	</div>

	<div class="advantages">
		<div class="container">

			<div class="advantages__block">
				<?php if (get_sub_field('icon')): ?>
					<div class="advantages__block-icon">
						<?php echo do_shortcode(get_sub_field('icon')); ?>
					</div>
				<?php endif; ?>
				<div class="advantages__block-descr">
					<?php the_sub_field('text'); ?>
				</div>
			</div>

			<?php if (have_rows('list')): ?>
				<div class="advantages-list">
					<?php while (have_rows('list')): the_row(); ?>
						<div class="advantages-list__item">
							<div class="advantages-list__head">
								<span class="advantages-list__title"><?php the_sub_field('title'); ?></span>
								<?php the_sub_field('descr'); ?>
							</div>
							<div class="advantages-list__body"></div>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

		</div>
	</div>

</section>