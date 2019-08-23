<section class="partners">
	<div class="container">

		<div class="section-header">
			<h2 class="section-title"><?php the_sub_field('title'); ?></h2>
		</div>

		<?php if (have_rows('list')): ?>

			<div class="partners-slider swiper-container">
				<div class="swiper-wrapper">
					<?php while (have_rows('list')): the_row(); ?>
						<div class="partners-slider__item swiper-slide">
							<?php echo wp_get_attachment_image(get_sub_field('img'), 'partner'); ?>
						</div>
					<?php endwhile; ?>
				</div>
			</div>

		<?php endif; ?>

	</div>
</section>