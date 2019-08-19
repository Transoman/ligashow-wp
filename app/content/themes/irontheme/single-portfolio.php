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

			<div class="single-portfolio-content__right">

        <div class="single-portfolio-content__summary">
          <p class="single-portfolio-content__label">Услуги на <br>мероприятии</p>

          <div class="single-portfolio-content__similar-project">
            <b>64</b>
            <span>реализовано <br>подобных <br>проектов</span>
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

				<div class="single-portfolio-content__bottom">

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