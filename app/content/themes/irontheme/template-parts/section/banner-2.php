<div class="banner-2<?php echo get_sub_field('filter_off') ? '' : ' banner-2--filter'; ?>" style="background-image: url(<?php echo wp_get_attachment_image_url(get_sub_field('img'), 'full', ''); ?>);">
	<div class="container">
		<div class="banner-2__content">
			<h2 class="banner-2__title"><?php the_sub_field('title'); ?></h2>
			<?php the_sub_field('text'); ?>
		</div>

		<?php if (get_sub_field('type') == 'link' && get_sub_field('link')): ?>
			<a href="<?php echo esc_url(get_sub_field('link')); ?>" class="btn"><?php the_sub_field('btn_text'); ?></a>
		<?php elseif (get_sub_field('type') == 'popup' && get_sub_field('popup')): ?>
			<a href="#" class="btn <?php echo get_sub_field('popup')[0]->post_name; ?>_open" data-popup-name="<?php echo get_sub_field('popup')[0]->post_name; ?>"><?php the_sub_field('btn_text'); ?></a>
		<?php endif; ?>

	</div>
</div>