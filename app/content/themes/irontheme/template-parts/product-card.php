<a href="#" class="product-card product-modal-<?php echo $slug = get_post_field('post_name'); ?>_open">
	<div class="product-card__img">
		<?php the_post_thumbnail('product_cat'); ?>
	</div>
	<span class="product-card__title"><?php the_title(); ?></span>
</a>

<div class="modal product-modal" id="product-modal-<?php echo $slug; ?>">
	<button type="button" class="modal__close product-modal-<?php echo $slug; ?>_close"></button>

	<div class="product-modal__wrap">
		<div class="product-modal__left">
      <h2 class="product-modal__title"><?php the_title(); ?></h2>
			<div class="product-modal__img">
				<?php the_post_thumbnail('product_modal'); ?>
			</div>

			<div class="product-modal__enter-wrap">
				<?php if (get_field('text_enter')): ?>
					<p class="product-modal__enter-label"><?php the_field('text_enter'); ?></p>
				<?php endif; ?>

				<?php if (get_field('cat')): ?>
					<div class="product-modal__enter">
						<?php foreach (get_field('cat') as $item): ?>
							<a href="<?php the_permalink($item->ID); ?>" class="product-modal__enter-item">
								<?php echo do_shortcode(get_field('icon', $item->ID)); ?>
								<?php echo $item->post_title; ?>
							</a>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>

			</div>

		</div>

		<div class="product-modal__right">
			<div class="product-modal__right-wrap">
				<div class="product-modal__cat"><span><?php echo get_the_terms(get_the_ID(), 'product_cat')[0]->name; ?></span></div>
				<h2 class="product-modal__title"><?php the_title(); ?></h2>

				<div class="product-modal__descr">
					<?php the_content(); ?>
				</div>

				<?php if (get_field('compound')): ?>
					<div class="product-modal__compound" data-simplebar data-simplebar-auto-hide="false">
						<h4 class="product-modal__compound-title">Состав</h4>
						<?php the_field('compound'); ?>
					</div>
				<?php endif; ?>

			</div>

      <div class="product-modal__enter-wrap">
				<?php if (get_field('text_enter')): ?>
          <p class="product-modal__enter-label"><?php the_field('text_enter'); ?></p>
				<?php endif; ?>

				<?php if (get_field('cat')): ?>
          <div class="product-modal__enter">
						<?php foreach (get_field('cat') as $item): ?>
              <a href="<?php the_permalink($item->ID); ?>" class="product-modal__enter-item">
								<?php echo do_shortcode(get_field('icon', $item->ID)); ?>
								<?php echo $item->post_title; ?>
              </a>
						<?php endforeach; ?>
          </div>
				<?php endif; ?>

      </div>

			<?php if (get_field('btn_text') && get_field('popup')): ?>
				<a href="#" class="btn <?php echo get_field('popup')[0]->post_name; ?>_open product-modal-<?php echo $slug; ?>_close"><?php the_field('btn_text'); ?></a>
			<?php endif; ?>

		</div>
	</div>
</div>