<section class="s-popular-order bg-gray">
	<div class="container">

		<div class="section-header">
			<h2 class="section-title"><?php the_sub_field('title'); ?></h2>
		</div>
	</div>

	<?php if (have_rows('list')): ?>

    <div class="slider-wrap">
      <div class="slider-container">
        <div class="popular-order-slider swiper-container">
          <div class="swiper-wrapper">
            <?php while (have_rows('list')): the_row(); ?>
              <div class="popular-order-slider__item swiper-slide">
                <div class="popular-order-slider__head" style="background-image: url(<?php the_sub_field('img'); ?>)">
                  <span class="popular-order-slider__head-label">Стоимость</span>
                  <p class="popular-order-slider__head-price"><?php echo number_format( get_sub_field('price'), 0, '', ' ' ); ?> <sup>₽</sup></p>
                </div>

                <div class="popular-order-slider__body">
                  <?php the_sub_field('text'); ?>
                  <a href="#" class="btn <?php echo get_sub_field('popup')[0]->post_name; ?>_open" data-popup-name="<?php echo get_sub_field('popup')[0]->post_name; ?>">Заказать сейчас</a>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="slider-controls">
          <div class="swiper-pagination"></div>
          <div class="slider-controls__btns">
            <div class="swiper-button-prev">
              <?php ith_the_icon('arrow-left'); ?>
            </div>
            <div class="swiper-button-next">
              <?php ith_the_icon('arrow-right'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>

	<?php endif; ?>
</section>