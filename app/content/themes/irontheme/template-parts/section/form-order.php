<section class="form-order<?php echo get_sub_field('filter_off') ? '' : ' form-order--filter'; ?>">
	<div class="container">
		<h2 class="section-title"><?php the_sub_field('title'); ?></h2>

		<?php $posts = get_sub_field('form');
		if( $posts ):
			foreach( $posts as $p ):
				$cf7_id= $p->ID; ?>
				<div class="form-order__wrap">
					<?php echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' ); ?>
				</div>
			<?php endforeach;
		endif; ?>

		<?php echo wp_get_attachment_image(get_sub_field('img'), 'full', '', array('class' => 'form-order__img')); ?>
	</div>
</section>