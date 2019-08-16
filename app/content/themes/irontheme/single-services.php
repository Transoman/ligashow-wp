<?php
get_header(); ?>

<section class="single-content">
	<div class="container">

		<div class="single-content__left">
			<h1 class="single-title"><?php the_title(); ?></h1>

			<div class="single-content__media">
				<?php if (get_field('video')): ?>
					<div class="video">
						<a href="<?php echo esc_url(get_field('video')); ?>" class="video__link"></a>
						<button type="button" aria-label="Запустить видео" class="video__button"></button>
					</div>
				<?php else:
					the_post_thumbnail('single');
				endif; ?>
			</div>

		</div>

		<div class="single-content__right">
			<?php if (get_the_content()): ?>
				<p class="single-content__label">Что входит</p>
				<div class="single-content__summary">
					<div class="single-content__summary-wrap">
						<?php the_content(); ?>
					</div>
				</div>
			<?php endif; ?>

			<div class="single-content__bottom">
				<?php if (get_field('price')): ?>
					<div class="single-content__price-wrap">
						<?php if (get_field('text_on_price')): ?>
							<span><?php the_field('text_on_price'); ?></span>
						<?php endif; ?>
						<p class="single-content__price">от <?php echo number_format( get_field('price'), 0, '', ' ' ); ?> руб</p>
					</div>
				<?php endif; ?>

				<?php if (get_field('type') == 'link' && get_field('link')): ?>
					<a href="<?php echo esc_url(get_field('link')); ?>" class="btn"><?php the_field('btn_text'); ?></a>
				<?php elseif (get_field('type') == 'popup' && get_field('popup')): ?>
					<a href="#" class="btn <?php echo get_field('popup')[0]->post_name; ?>_open"><?php the_field('btn_text'); ?></a>
				<?php endif; ?>
			</div>

		</div>

	</div>
</section>



<?php get_template_part( 'template-parts/all', 'sections' );

get_footer();