<section class="s-about bg-gray">
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

		<div class="about">
			<?php $about_left = get_sub_field('left_col');
			if (count($about_left)): ?>
				<div class="about__col about__col--left">
					<h2><?php echo $about_left['title']; ?></h2>
					<div class="about__content">
						<?php echo $about_left['text']; ?>
					</div>
				</div>
			<?php endif; ?>

			<?php $about_right= get_sub_field('right_col');
			if (count($about_right)): ?>
				<div class="about__col about__col--right">
					<?php echo wp_get_attachment_image($about_right['logo'], 'large'); ?>
					<div class="about__content">
						<?php echo $about_right['text']; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>