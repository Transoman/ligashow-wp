<section class="s-our-project">
  <div class="container">

    <div class="section-header">
      <h2 class="section-title"><?php the_sub_field('title'); ?></h2>
    </div>

		<?php $projects = get_any_post( 'project', 4 );
		if ($projects->have_posts()): ?>
      <div class="project">
				<?php while ($projects->have_posts()): $projects->the_post(); ?>
          <div class="project__item" data-id="<?php echo get_post_field('post_name'); ?>">
            <div class="project__inner">
							<?php echo wp_get_attachment_image(get_field('logo'), 'medium', '', array('class' => 'project__logo')); ?>
              <div class="project__body">
								<?php the_post_thumbnail('project'); ?>
                <span class="project__title"><?php the_title(); ?></span>
              </div>
            </div>
          </div>
				<?php endwhile; wp_reset_postdata(); ?>
      </div>

	    <?php while ($projects->have_posts()): $projects->the_post(); ?>
        <div class="project__content text-block-btn" id="<?php echo get_post_field('post_name'); ?>">
        <h2 class="section-title"><?php the_title(); ?></h2>

        <div class="text-block-btn__row">
          <div class="text-block-btn__content">
						<?php the_content(); ?>
          </div>

          <a href="<?php echo esc_url(get_field('link')); ?>" class="btn" target="_blank">Перейти на сайт</a>
        </div>
      </div>
			<?php endwhile; wp_reset_postdata(); ?>

		<?php endif; ?>

  </div>
</section>