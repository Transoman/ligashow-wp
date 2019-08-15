<?php $title = get_sub_field('title'); ?>

<?php if (have_rows('list')): ?>
	<section class="s-calculate-order" id="calculate-order">
		<div class="container">
			<div class="calculate-order">
				<div class="calculate-order__left">
					<h2 class="section-title"><?php echo $title; ?></h2>

					<ul class="calculate-order-list calculate-order__list">
						<?php $i = 0; while (have_rows('list')): the_row(); ?>
							<li class="calculate-order-list__item<?php echo $i == 0 ? ' active' : ''; $i++; ?>">
								<?php the_sub_field('title'); ?>
							</li>
						<?php endwhile; ?>
					</ul>

				</div>

				<div class="calculate-order__right">
					<?php $i = 0; while (have_rows('list')): the_row(); ?>
						<div class="calculate-order__item<?php echo $i == 0 ? ' active' : ''; ?>">
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
									<div class="calculate-order__row calculate-order__row--bars calculate-order__row--align-center">
										<div class="switch-wrap">
											<input class="switch" id="bar<?php echo $i;?>" type="checkbox"><label for="bar<?php echo $i; ?>">&nbsp;</label>
											<span class="calculate-order__switch-val">
                        <span class="calculate-order__switch-val-on">нужна</span>
                        <span class="calculate-order__switch-val-off">не нужна</span>
                      </span>
										</div>
									</div>
								</div>

							</div>

							<div class="calculate-order__bottom">
								<div class="calculate-order__total">
									<span class="calculate-order__total-label">Стоимость</span>
									<p class="calculate-order__total-price"><span>0</span> <sup>₽</sup></p>
                  <?php if (have_rows('prices')): ?>
                  <script>
                    var prices = 'prices' + <?php echo $i++; ?>;
                    window[prices] = {
                    <?php $j = 0; while (have_rows('prices')): the_row(); ?>
                      <?php echo $j.': { person_from: '.get_sub_field('person_from') . ','; ?>
                      <?php echo 'person_to: '.get_sub_field('person_to') . ','; ?>
                      <?php echo 'price: '.get_sub_field('price') . '},'; $j++; ?>
                    <?php endwhile; ?>
                    };
                    </script>
                  <?php endif; ?>
								</div>

								<?php if (get_sub_field('type') == 'link' && get_sub_field('link')): ?>
									<a href="<?php echo esc_url(get_sub_field('link')); ?>" class="btn"><?php the_sub_field('btn_text'); ?></a>
								<?php elseif (get_sub_field('type') == 'popup' && get_sub_field('popup')): ?>
									<a href="#" class="btn <?php echo get_sub_field('popup')[0]->post_name; ?>_open" data-popup-name="<?php echo get_sub_field('popup')[0]->post_name; ?>"><?php the_sub_field('btn_text'); ?></a>
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