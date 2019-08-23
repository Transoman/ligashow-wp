<section class="s-product bg-gray">
	<div class="container">
		<div class="section-header">
			<h2 class="section-title"><?php the_sub_field('title'); ?></h2>

			<?php if (get_sub_field('link_text') && get_sub_field('link_url')): ?>
				<a href="<?php echo esc_url(get_sub_field('link_url')); ?>" class="link-arrow">
					<?php the_sub_field('link_text'); ?>
					<?php ith_the_icon('arrow-right', 'link-arrow__icon'); ?>
				</a>
			<?php endif; ?>
		</div>

		<?php $products = get_sub_field('product_list');
		if ($products): ?>
			<div class="product-list">
				<?php foreach ($products as $post): setup_postdata($post); ?>
					<div class="product-list__item">
						<?php get_template_part('template-parts/product', 'card'); ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</div>
</section>