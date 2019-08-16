<?php
$object = null;

if (is_archive()) {
	$object = get_queried_object()->name;
}

$page_settings = get_field('page_settings', $object);

if ($page_settings['breadcrumb']) {
	if (!is_home() && !is_front_page()) {
		get_template_part( 'template-parts/breadcrumbs' );
	}
}

if ( have_rows('layouts', $object) ):

	while ( have_rows('layouts', $object) ) : the_row();

		if ( get_row_layout() == 'hero_slider' ): ?>

			<?php get_template_part('template-parts/section/hero', 'slider'); ?>

		<?php elseif ( get_row_layout() == 'calculate_order' ): ?>

			<?php get_template_part('template-parts/section/calculate', 'order'); ?>

		<?php elseif ( get_row_layout() == 'completed_project' ): ?>

			<?php get_template_part('template-parts/section/completed', 'project'); ?>

		<?php elseif ( get_row_layout() == 'services' ): ?>

			<?php get_template_part('template-parts/section/services'); ?>

		<?php elseif ( get_row_layout() == 'banner' ): ?>

			<?php get_template_part('template-parts/section/banner'); ?>

		<?php elseif ( get_row_layout() == 'banner_2' ): ?>

			<?php get_template_part('template-parts/section/banner-2'); ?>

		<?php elseif ( get_row_layout() == 'services_from_category' ): ?>

			<?php get_template_part('template-parts/section/services-from', 'category'); ?>

		<?php elseif ( get_row_layout() == 'services_from_category_tabs' ): ?>

			<?php get_template_part('template-parts/section/services-from', 'category-tabs'); ?>

		<?php elseif ( get_row_layout() == 'popular_order' ): ?>

			<?php get_template_part('template-parts/section/popular', 'order'); ?>

		<?php elseif ( get_row_layout() == 'partners' ): ?>

			<?php get_template_part('template-parts/section/partners'); ?>

		<?php elseif ( get_row_layout() == 'about' ): ?>

			<?php get_template_part('template-parts/section/about'); ?>

		<?php elseif ( get_row_layout() == 'project' ): ?>

			<?php get_template_part('template-parts/section/project'); ?>

		<?php elseif ( get_row_layout() == 'similar_services' ): ?>

      <section class="s-similar-services bg-gray">
        <div class="container">
          <div class="section-header">
            <h2 class="section-title"><?php the_sub_field('title'); ?></h2>
          </div>

          <?php $terms = get_the_terms(get_the_ID(), 'services_cat');
          $term_ids = [];
          if ($terms):
            foreach ($terms as $term) {
              $term_ids[] = $term->term_id;
            }

	          $services = get_any_post('services', -1, 'services_cat', $term_ids);

            if ($services->have_posts()): ?>
            <div class="similar-services-slider swiper-container">
              <div class="swiper-wrapper">
                <?php while ($services->have_posts()): $services->the_post(); ?>
                  <div class="similar-services-slider__item swiper-slide">
                    <a href="<?php the_permalink(); ?>" class="services-sub-cat-card">
                      <?php echo do_shortcode(get_field('icon')); ?>
                      <?php the_title(); ?>
                    </a>
                  </div>
                <?php endwhile; wp_reset_postdata(); ?>
              </div>
            </div>

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
            <?php endif; ?>
          <?php endif; ?>

        </div>
      </section>

		<?php endif;

	endwhile;

else :

	// no layouts found

endif;

?>