<section class="s-services-tab bg-gray">
	<div class="container">

		<div class="section-header">
			<h2 class="section-title"><?php the_sub_field('title'); ?></h2>

			<?php if (get_sub_field('type') == 'link' && get_sub_field('link')): ?>
				<a href="<?php echo esc_url(get_sub_field('link')); ?>" class="link-arrow">
					<?php the_sub_field('btn_text'); ?>
					<?php ith_the_icon('arrow-right', 'link-arrow__icon'); ?>
				</a>
			<?php elseif (get_sub_field('type') == 'popup' && get_sub_field('popup')): ?>
				<a href="#" class="link-arrow <?php echo get_sub_field('popup')[0]->post_name; ?>_open">
					<?php the_sub_field('btn_text'); ?>
					<?php ith_the_icon('arrow-right', 'link-arrow__icon'); ?>
				</a>
			<?php endif; ?>

		</div>

		<?php $sub_cats = get_sub_field('cats');
		if ($sub_cats): ?>

			<div class="services-tab">
				<div class="services-tab__list-wrap">
					<ul class="services-tab-list services-tab__list">
						<?php $i = 0; foreach ($sub_cats as $cat): ?>
							<li<?php echo $i == 0 ? ' class="active"' : ''; $i++; ?>><?php echo $cat->name; ?></li>
						<?php endforeach; ?>
					</ul>
				</div>

				<?php $i = 0; foreach ($sub_cats as $cat): ?>
					<div class="services-tab__item<?php echo $i == 0 ? ' active' : ''; $i++; ?>" data-simplebar data-simplebar-auto-hide="false">
						<?php $services = get_any_post('services', -1, 'services_cat', $cat->term_id);
						if ($services->have_posts()): ?>
							<div class="services-tab__content">
								<?php while ($services->have_posts()): $services->the_post(); ?>
									<div class="services-tab__card">
										<a href="<?php the_permalink(); ?>" class="services-tab-card">
											<?php if (get_field('icon')): ?>
												<div class="services-tab-card__icon">
													<?php echo do_shortcode(get_field('icon')); ?>
												</div>
											<?php endif; ?>
											<h3 class="services-tab-card__title"><?php the_title(); ?></h3>
										</a>
									</div>
								<?php endwhile; wp_reset_postdata(); ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>

				<svg style="position: absolute; z-index: -100; height: 1px; width: 1px;">
					<defs>
						<linearGradient id="services-tab-gradient" x1="0" y1="0%" x2="0" y2="100%">
							<stop offset="0%" style="stop-color: #0036ff"></stop>
							<stop offset="100%" style="stop-color: #00a2ff"></stop>
						</linearGradient>
					</defs>
				</svg>

			</div>
			<!-- /.services-tab -->
		<?php endif; ?>


	</div>
</section>