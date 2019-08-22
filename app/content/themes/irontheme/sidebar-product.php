<?php
if (is_tax()) {
	$object = get_queried_object();
}
elseif (is_archive()) {
	$object = get_queried_object()->name;
} ?>

<aside class="sidebar">
	<h3 class="sidebar__title">Каталог</h3>

	<?php $product_terms = get_terms(array(
		'taxonomy' => 'product_cat',
		'hide_empty' => false,
    'parent' => 0
	));

	if ($product_terms): ?>
		<ul class="sidebar-list">
			<?php foreach ($product_terms as $term): ?>
				<li>
					<a href="<?php echo get_term_link($term); ?>"<?php echo $object->term_id == $term->term_id ? ' class="is-active"' : ''; ?>><?php echo $term->name; ?></a>
					<?php if ($object->term_id == $term->term_id || $object->parent == $term->term_id):

						$child_terms = get_terms( [
							'taxonomy' => 'product_cat',
							'hide_empty' => false,
							'parent' => $term->term_id
						] );

						if ($child_terms): ?>
              <ul>
								<?php foreach ($child_terms as $child_term): ?>
                  <li>
                    <a href="<?php echo get_term_link($child_term); ?>"<?php echo $object->term_id == $child_term->term_id ? ' class="is-active"' : ''; ?>><?php echo $child_term->name; ?></a>
                  </li>
								<?php endforeach; ?>
              </ul>
						<?php endif;?>
					<?php endif;?>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<?php if (get_field('type', 'product') == 'link' && get_field('link', 'product')): ?>
		<a href="<?php echo esc_url(get_field('link', 'product')); ?>" class="btn"><?php the_field('btn_text', 'product'); ?></a>
	<?php elseif (get_field('type', 'product') == 'popup' && get_field('popup', 'product')): ?>
		<a href="#" class="btn <?php echo get_field('popup', 'product')[0]->post_name; ?>_open"><?php the_field('btn_text', 'product'); ?></a>
	<?php endif; ?>

</aside>