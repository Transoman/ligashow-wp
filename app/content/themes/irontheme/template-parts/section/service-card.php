<section class="single-content">
	<div class="container">

		<div class="single-content__left">
			<h2 class="single-title"><?php the_sub_field('title'); ?></h2>

			<div class="single-content__media">
				<?php if (get_sub_field('video')): ?>
					<div class="video">
						<a href="<?php echo esc_url(get_sub_field('video')); ?>" class="video__link"></a>
						<button type="button" aria-label="Запустить видео" class="video__button"></button>
					</div>
				<?php else:
					echo wp_get_attachment_image(get_sub_field('img'), 'single');
				endif; ?>
			</div>

		</div>

		<div class="single-content__right">
			<?php if (get_sub_field('descr')): ?>
				<?php if (get_sub_field('text_on_descr')): ?>
					<p class="single-content__label"><?php the_sub_field('text_on_descr'); ?></p>
				<?php endif; ?>
				<div class="single-content__summary">
					<div class="single-content__summary-wrap">
						<?php the_sub_field('descr'); ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="single-content__bottom">
				<?php if (get_sub_field('price')): ?>
					<div class="single-content__price-wrap">
						<?php if (get_sub_field('text_on_price')): ?>
							<span><?php the_sub_field('text_on_price'); ?></span>
						<?php endif; ?>
						<p class="single-content__price">от <?php echo number_format( get_sub_field('price'), 0, '', ' ' ); ?> руб</p>
					</div>
				<?php endif; ?>

				<?php if (get_sub_field('type') == 'link' && get_sub_field('link')): ?>
					<a href="<?php echo esc_url(get_sub_field('link')); ?>" class="btn"><?php the_sub_field('btn_text'); ?></a>
				<?php elseif (get_sub_field('type') == 'popup' && get_sub_field('popup')): ?>
					<a href="#" class="btn <?php echo get_sub_field('popup')[0]->post_name; ?>_open"><?php the_sub_field('btn_text'); ?></a>
				<?php endif; ?>
			</div>

		</div>

	</div>
</section>