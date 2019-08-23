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

		<?php if (have_rows('list')): ?>

			<div class="services-tab">
				<div class="services-tab__list-wrap">
					<ul class="services-tab-list services-tab__list">
						<?php $i = 0; while (have_rows('list')): the_row(); ?>
							<li<?php echo $i == 0 ? ' class="active"' : ''; $i++; ?>><?php the_sub_field('title'); ?></li>
						<?php endwhile; ?>
					</ul>
				</div>

				<?php $i = 0; while (have_rows('list')): the_row(); ?>
					<div class="services-tab__item<?php echo $i == 0 ? ' active' : ''; $i++; ?>" data-simplebar data-simplebar-auto-hide="false">
						<?php if (have_rows('inner_list')): ?>
							<div class="services-tab__content">
								<?php while (have_rows('inner_list')): the_row(); ?>
									<div class="services-tab__card">
										<a href="<?php echo esc_url(get_sub_field('link')); ?>" class="services-tab-card">
											<?php if (get_sub_field('icon')): ?>
												<div class="services-tab-card__icon">
													<?php echo do_shortcode(get_sub_field('icon')); ?>
												</div>
											<?php endif; ?>
											<h3 class="services-tab-card__title"><?php the_sub_field('title'); ?></h3>
										</a>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>

			</div>
			<!-- /.services-tab -->
		<?php endif; ?>

	</div>
</section>