<?php
get_header(); ?>

	<section class="single-portfolio-content">
		<div class="container">

			<div class="single-portfolio-content__left">
				<h1 class="single-title"><?php the_title(); ?></h1>

				<div class="single-portfolio-content__info">
					<?php if (get_field('date')): ?>
						<span class="single-portfolio-content__date"><?php the_field('date'); ?></span>
					<?php endif; ?>

					<?php if (get_field('place')): ?>
						<span class="single-portfolio-content__place">
							<?php ith_the_icon('navigation'); ?>
							<?php the_field('place'); ?>
						</span>
					<?php endif; ?>
				</div>

				<div class="single-portfolio-content__media">
          <?php if ($gallery = get_field('gallery')): ?>
            <div class="single-portfolio-slider swiper-container">
              <div class="swiper-wrapper">
                <?php if (get_the_post_thumbnail(get_the_ID())): ?>
                  <div class="single-portfolio-slider__item swiper-slide">
                    <a href="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" data-fancybox="group">
                      <?php the_post_thumbnail('single-portfolio'); ?>
                    </a>
                  </div>
                <?php endif; ?>
                <?php foreach ($gallery as $item): ?>
                  <div class="single-portfolio-slider__item swiper-slide">
                    <a href="<?php echo wp_get_attachment_image_url($item, 'full'); ?>" data-fancybox="group">
                      <?php echo wp_get_attachment_image($item, 'single-portfolio'); ?>
                    </a>
                  </div>
                <?php endforeach; ?>
	              <?php if (get_field('video')): ?>
                  <div class="single-portfolio-slider__item swiper-slide">
                    <div class="video">
                      <a href="<?php echo esc_url(get_field('video')); ?>" class="video__link">
	                      <?php if (get_field('video_poster')) {
		                      echo wp_get_attachment_image( get_field('video_poster'), 'single-portfolio', '', array('class' => 'video__media') );
	                      } ?>
                      </a>
                      <button type="button" aria-label="Запустить видео" class="video__button"></button>
                    </div>
                  </div>
	              <?php endif; ?>
              </div>
            </div>

            <div class="single-portfolio-content__media-bottom">
              <div class="single-portfolio-thumb-slider swiper-container">
                <div class="swiper-wrapper">
                  <?php if (get_the_post_thumbnail(get_the_ID())): ?>
                    <div class="single-portfolio-thumb-slider__item swiper-slide">
                      <?php the_post_thumbnail('medium'); ?>
                    </div>
                  <?php endif; ?>
                  <?php foreach ($gallery as $item): ?>
                    <div class="single-portfolio-thumb-slider__item swiper-slide">
                      <?php echo wp_get_attachment_image($item, 'medium'); ?>
                    </div>
                  <?php endforeach; ?>
                  <?php if (get_field('video')): ?>
                    <div class="single-portfolio-thumb-slider__item swiper-slide">
                      <div class="video video--dummy">
                        <a href="<?php echo esc_url(get_field('video')); ?>" class="video__link">
	                        <?php if (get_field('video_poster')) {
		                        echo wp_get_attachment_image( get_field('video_poster'), 'medium', '', array('class' => 'video__media') );
	                        } ?>
                        </a>
                        <button type="button" aria-label="Запустить видео" class="video__button"></button>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

              <div class="slider-controls">
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

					<?php elseif (get_field('video')): ?>
						<div class="video">
							<a href="<?php echo esc_url(get_field('video')); ?>" class="video__link">
								<?php if (get_field('video_poster')) {
									echo wp_get_attachment_image( get_field('video_poster'), 'single-portfolio', '', array('class' => 'video__media') );
								} ?>
              </a>
							<button type="button" aria-label="Запустить видео" class="video__button"></button>
						</div>
					<?php else: ?>
            <a href="<?php the_post_thumbnail_url('full'); ?>" data-fancybox>
						  <?php the_post_thumbnail('single-portfolio'); ?>
            </a>
					<?php endif; ?>
				</div>

			</div>

			<div class="single-portfolio-content__right">

        <div class="single-portfolio-content__summary">
          <p class="single-portfolio-content__label">Услуги на <br>мероприятии</p>

          <div class="ribbon-number single-portfolio-content__ribbon-number">
            <div class="ribbon-number__wrap">
              <b><?php if (get_field('completed_project')) {
                the_field('completed_project');
              }
              else {

                $terms = get_the_terms(get_the_ID(), 'portfolio_cat');

                $args = array(
                  'post_type' => 'portfolio',
                  'posts_per_page' => -1,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'portfolio_cat',
                      'field' => 'term_id',
                      'terms' => $terms[0]->term_id
                    )
                  )
                );

                $query = new WP_Query($args);

                if ($query->post_count) {
                  echo $query->post_count;
                }
                else {
                  echo '0';
                }
              } ?></b>
              <span>реализовано <br>подобных <br>проектов</span>
            </div>
          </div>

          <?php if (get_field('services')): ?>
            <?php $terms_ids = [];
            foreach (get_field('services') as $item): ?>
              <?php $terms_ids[] = $item->post_title; ?>
            <?php endforeach; ?>
            <ul>
              <?php sort($terms_ids, SORT_STRING );
              foreach ($terms_ids as $item): ?>
                <li><?php echo $item; ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>

        </div>

				<?php if (get_the_content()): ?>
          <div class="single-portfolio-content__text"><?php the_content(); ?></div>
				<?php endif; ?>

        <?php if ( (get_field('type') == 'link' && get_field('link')) || (get_field('type') == 'popup' && get_field('popup')) ): ?>
          <div class="single-portfolio-content__bottom">
            <?php if (get_field('type') == 'link' && get_field('link')): ?>
              <a href="<?php echo esc_url(get_field('link')); ?>" class="btn"><?php the_field('btn_text'); ?></a>
            <?php elseif (get_field('type') == 'popup' && get_field('popup')): ?>
              <a href="#" class="btn <?php echo get_field('popup')[0]->post_name; ?>_open"><?php the_field('btn_text'); ?></a>
            <?php endif; ?>
          </div>
        <?php endif; ?>

			</div>

		</div>
	</section>

<?php get_template_part( 'template-parts/all', 'sections' );

get_footer();