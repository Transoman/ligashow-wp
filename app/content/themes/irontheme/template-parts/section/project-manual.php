<section class="s-our-project">
	<div class="container">

		<div class="section-header">
			<h2 class="section-title"><?php the_sub_field('title'); ?></h2>
		</div>

		<?php if (have_rows('list')): ?>
			<div class="project">
				<?php $i = 0; while (have_rows('list')): the_row(); ?>
        <div class="project__item<?php echo $i == 0 ? ' is-active' : ''; ?>" data-id="project-<?php echo $i++; ?>">
						<div class="project__inner">
							<?php echo wp_get_attachment_image(get_sub_field('logo'), 'medium', '', array('class' => 'project__logo')); ?>
							<div class="project__body">
								<?php echo wp_get_attachment_image(get_sub_field('img'), 'project'); ?>
								<span class="project__title"><?php the_sub_field('title'); ?></span>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>

			<?php $i = 0; while (have_rows('list')): the_row(); ?>
        <div class="project__content text-block-btn" id="project-<?php echo $i; ?>"<?php echo $i++ == 0 ? ' style="display: block;"' : ''; ?>>
          <h2 class="section-title"><?php the_sub_field('title'); ?></h2>

          <div class="text-block-btn__row">
            <div class="text-block-btn__content">
	            <?php the_sub_field('descr'); ?>
            </div>

            <a href="<?php echo esc_url(get_sub_field('link')); ?>" class="btn" target="_blank">Перейти на сайт</a>
          </div>
        </div>
			<?php endwhile; ?>

		<?php endif; ?>

	</div>
</section>