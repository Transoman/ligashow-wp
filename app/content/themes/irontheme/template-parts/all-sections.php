<?php
$object = null;

if (is_tax()) {
	$object = get_queried_object();
}
elseif (is_archive()) {
	$object = get_queried_object()->name;
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

		<?php elseif ( get_row_layout() == 'banner_3' ): ?>

			<?php get_template_part('template-parts/section/banner-3'); ?>

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

			<?php get_template_part('template-parts/section/similar', 'services'); ?>

    <?php elseif ( get_row_layout() == 'advantages' ): ?>

			<?php get_template_part('template-parts/section/advantages'); ?>

		<?php elseif ( get_row_layout() == 'slider_portfolio' ): ?>

			<?php get_template_part('template-parts/section/slider', 'portfolio'); ?>

		<?php elseif ( get_row_layout() == 'slider_similar_portfolio' ): ?>

			<?php get_template_part('template-parts/section/slider', 'similar-portfolio'); ?>

		<?php elseif ( get_row_layout() == 'form_order' ): ?>

			<?php get_template_part('template-parts/section/form', 'order'); ?>

		<?php elseif ( get_row_layout() == 'team' ): ?>

			<?php get_template_part('template-parts/section/team'); ?>

		<?php elseif ( get_row_layout() == 'contact' ): ?>

			<?php get_template_part('template-parts/section/contact'); ?>

		<?php elseif ( get_row_layout() == 'text_block_with_btn' ): ?>

      <section class="text-block-btn">
        <div class="container">
          <h2 class="section-title"><?php the_sub_field('title')?></h2>

          <div class="text-block-btn__row">
            <div class="text-block-btn__content">
              <?php the_sub_field('text'); ?>
            </div>

	          <?php if (get_sub_field('type') == 'link' && get_sub_field('link')): ?>
              <a href="<?php echo esc_url(get_sub_field('link')); ?>" class="btn"><?php the_sub_field('btn_text'); ?></a>
	          <?php elseif (get_sub_field('type') == 'popup' && get_sub_field('popup')): ?>
              <a href="#" class="btn <?php echo get_sub_field('popup')[0]->post_name; ?>_open"><?php the_sub_field('btn_text'); ?></a>
	          <?php endif; ?>
          </div>

        </div>
      </section>

		<?php endif;

	endwhile;

else :

	// no layouts found

endif;

?>