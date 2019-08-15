<?php
if ( have_rows('layouts') ):

	while ( have_rows('layouts') ) : the_row();

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

		<?php elseif ( get_row_layout() == 'services_from_category' ): ?>

			<?php get_template_part('template-parts/section/services-from', 'category'); ?>

		<?php elseif ( get_row_layout() == 'popular_order' ): ?>

			<?php get_template_part('template-parts/section/popular', 'order'); ?>

		<?php elseif ( get_row_layout() == 'partners' ): ?>

			<?php get_template_part('template-parts/section/partners'); ?>

		<?php elseif ( get_row_layout() == 'about' ): ?>

			<?php get_template_part('template-parts/section/about'); ?>

		<?php elseif ( get_row_layout() == 'project' ): ?>

      <section class="s-project">
        <div class="container">

          <div class="section-header">
            <h2 class="section-title"><?php the_sub_field('title'); ?></h2>
          </div>

          <?php $projects = get_any_post( 'project', 4 );
          if ($projects->have_posts()): ?>
            <div class="project">
              <?php while ($projects->have_posts()): $projects->the_post(); ?>
                <a href="<?php echo esc_url(get_field('link')); ?>" class="project__item" target="_blank">
                  <div class="project__inner">
                    <?php echo wp_get_attachment_image(get_field('logo'), 'medium', '', array('class' => 'project__logo')); ?>
                    <div class="project__body">
                      <?php the_post_thumbnail('large'); ?>
                      <span class="project__title"><?php the_title(); ?></span>
                    </div>
                  </div>
                </a>
              <?php endwhile; wp_reset_postdata(); ?>
            </div>
          <?php endif; ?>

        </div>
      </section>

		<?php endif;

	endwhile;

else :

	// no layouts found

endif;

?>