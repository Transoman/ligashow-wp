<div class="banner-3">
	<div class="container">
		<div class="banner-3__content">
			<h2 class="banner-3__title"><?php the_sub_field('title'); ?></h2>

			<?php if (get_sub_field('type') == 'link' && get_sub_field('link')): ?>
				<a href="<?php echo esc_url(get_sub_field('link')); ?>" class="btn"><?php the_sub_field('btn_text'); ?></a>
			<?php elseif (get_sub_field('type') == 'popup' && get_sub_field('popup')): ?>
				<a href="#" class="btn <?php echo get_sub_field('popup')[0]->post_name; ?>_open" data-popup-name="<?php echo get_sub_field('popup')[0]->post_name; ?>"><?php the_sub_field('btn_text'); ?></a>
			<?php endif; ?>

		</div>

		<?php echo wp_get_attachment_image(get_sub_field('img'), 'full', '', array('class' => 'banner-3__img')); ?>

	</div>
</div>