<?php
if ( have_rows('layouts') ):

	while ( have_rows('layouts') ) : the_row();

		if ( get_row_layout() == 'hero_slider' ): ?>

    <?php $slider_settings = get_sub_field('slider_settings'); ?>

    <?php if (have_rows('slider')): ?>
      <div class="hero-slider-wrap">
        <div class="hero-slider swiper-container"<?php echo $slider_settings['speed'] ? ' data-speed="'.$slider_settings['speed'].'"' : 'data-speed="300"'?>>
          <div class="swiper-wrapper">
            <?php while (have_rows('slider')): the_row(); ?>
              <div class="hero-slider__item swiper-slide"<?php echo get_sub_field('bg_img') ? ' style="background-image: url('.get_sub_field('bg_img').')"' : ''; ?>>
                <div class="container">

                  <div class="hero-slider__container">
                    <div class="hero-slider__left">
                      <h1 class="hero-slider__title"><?php the_sub_field('title'); ?></h1>
                    </div>

                    <div class="hero-slider__right">
                      <?php the_sub_field('descr'); ?>
                    </div>
                  </div><!-- /.hero-slider__container -->

                  <?php if (get_sub_field('type') == 'link' && get_sub_field('link')): ?>
                    <a href="<?php echo esc_url(get_sub_field('link')); ?>" class="btn"><?php the_sub_field('btn_text'); ?></a>
                  <?php elseif (get_sub_field('type') == 'popup' && get_sub_field('popup')): ?>
                    <a href="#" class="btn <?php echo get_sub_field('popup')[0]->post_name; ?>_open"><?php the_sub_field('btn_text'); ?></a>
                  <?php endif; ?>

                </div>
              </div>
            <?php endwhile; ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>

        <div class="container">
          <div class="hero-thumb-slider swiper-container">
          <div class="swiper-wrapper">
            <?php while (have_rows('slider')): the_row(); ?>
              <div class="hero-thumb-slider__item swiper-slide">
                <span class="hero-thumb-slider__title"><?php the_sub_field('title'); ?></span>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
        </div>
      </div><!-- /.hero-slider-wrap -->

    <?php endif; ?>

    <?php elseif ( get_row_layout() == 'calculate_order' ): ?>

      <?php $title = get_sub_field('title'); ?>

      <?php if (have_rows('list')): ?>
        <section class="s-calculate-order">
          <div class="container">
            <div class="calculate-order">
              <div class="calculate-order__left">
                <h2 class="section-title"><?php echo $title; ?></h2>

                <ul class="calculate-order-list calculate-order__list">
                  <?php while (have_rows('list')): the_row(); ?>
                    <li class="calculate-order-list__item">
                      <a href="#"><?php the_sub_field('title'); ?></a>
                    </li>
                  <?php endwhile; ?>
                </ul>

              </div>

              <div class="calculate-order__right">
				        <?php while (have_rows('list')): the_row(); ?>
                  <div class="calculate-order__item">
                    <p class="calculate-order__label">Количество гостей</p>

                    <div class="calculate-order__range-wrap">
                      <?php $min_person = get_sub_field('count_person')['min'];
                      $max_person = get_sub_field('count_person')['max']; ?>
                      <div class="calculate-order__range-labels">
                        <span class="calculate-order__range-label"><?php echo $min_person; ?> человек</span>
                        <span class="calculate-order__range-label"><?php echo $max_person; ?> человек</span>
                      </div>
                      <div class="calculate-order__range calculate-order__range--count-person" data-min="<?php echo $min_person; ?>" data-max="<?php echo $max_person; ?>"></div>
                    </div>
                    <p class="calculate-order__current calculate-order__count-person-current">0</p>

                    <div class="calculate-order__row">
                      <div class="calculate-order__col">
                        <p class="calculate-order__label">Время работы</p>
                        <div class="calculate-order__range-wrap">
		                      <?php $min_works = get_sub_field('working')['min'];
		                      $max_works = get_sub_field('working')['max']; ?>
                          <div class="calculate-order__range-labels">
                            <span class="calculate-order__range-label"><?php echo $min_works; ?> часа</span>
                            <span class="calculate-order__range-label"><?php echo $max_works; ?> часов</span>
                          </div>
                          <div class="calculate-order__range calculate-order__range--works" data-min="<?php echo $min_works; ?>" data-max="<?php echo $max_works; ?>"></div>
                        </div>
                        <p class="calculate-order__current calculate-order__works-current">0</p>
                      </div>

                      <div class="calculate-order__col">
                        <p class="calculate-order__label">Нужна ли <br>барная стойка?</p>
                        <div class="calculate-order__row calculate-order__row--align-center">
                          <div class="switch-wrap">
                            <input class="switch" id="bar" type="checkbox"><label for="bar">&nbsp;</label>
                          </div>
                          <a href="#" class="calculate-order__variants">Варианты барных стоек</a>
                        </div>
                      </div>

                    </div>

                    <div class="calculate-order__bottom">
                      <div class="calculate-order__total">
                        <span class="calculate-order__label">Стоимость</span>
                        <p class="calculate-order__total-price">0 <sup>₽</sup></p>
                      </div>

	                    <?php if (get_sub_field('type') == 'link' && get_sub_field('link')): ?>
                        <a href="<?php echo esc_url(get_sub_field('link')); ?>" class="btn"><?php the_sub_field('btn_text'); ?></a>
	                    <?php elseif (get_sub_field('type') == 'popup' && get_sub_field('popup')): ?>
                        <a href="#" class="btn <?php echo get_sub_field('popup')[0]->post_name; ?>_open"><?php the_sub_field('btn_text'); ?></a>
	                    <?php endif; ?>
                      
                    </div>

                  </div>
				        <?php endwhile; ?>
              </div>

            </div>
            <!-- /.calculate-order -->
          </div>
        </section>
      <?php endif; ?>

		<?php endif;

	endwhile;

else :

	// no layouts found

endif;

?>