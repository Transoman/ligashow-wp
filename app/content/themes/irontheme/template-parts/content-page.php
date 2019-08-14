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

		<?php endif;

	endwhile;

else :

	// no layouts found

endif;

?>