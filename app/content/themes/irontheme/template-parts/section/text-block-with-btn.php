<section class="text-block-btn">
	<div class="container">
		<h2 class="section-title"><?php the_sub_field('title')?></h2>

		<div class="text-block-btn__row">
			<div class="text-block-btn__content">
				<?php the_sub_field('text'); ?>
			</div>

			<?php if (get_sub_field('type') == 'link' && get_sub_field('link')): ?>
				<a href="<?php echo esc_url(get_sub_field('link')); ?>" class="btn"><?php the_sub_field('btn_text'); ?></a>
			<?php elseif (get_sub_field('type') == 'popup' && get_sub_field('popup')): ?>
				<a href="#" class="btn <?php echo get_sub_field('popup')[0]->post_name; ?>_open"><?php the_sub_field('btn_text'); ?></a>
			<?php endif; ?>
		</div>

	</div>
</section>