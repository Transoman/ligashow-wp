<section class="partners">
	<div class="container">

		<div class="section-header">
			<h2 class="section-title"><?php the_sub_field('title'); ?></h2>
		</div>

		<?php $partners = get_any_post( 'partner', -1 );
		if ($partners->have_posts()): ?>

			<div class="partners-slider swiper-container">
				<div class="swiper-wrapper">
					<?php while ($partners->have_posts()): $partners->the_post(); ?>
						<div class="partners-slider__item swiper-slide">
							<?php the_post_thumbnail('partner'); ?>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>

		<?php endif; ?>

	</div>
</section>