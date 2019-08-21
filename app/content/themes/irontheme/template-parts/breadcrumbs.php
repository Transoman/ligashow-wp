<?php
$object = null;

if (is_archive()) {
	$object = get_queried_object()->name;
}
$page_settings = get_field('page_settings', $object);

if ( function_exists('yoast_breadcrumb') ): ?>
<div class="breadcrumb<?php echo $page_settings['bg_breadcrumbs'] ? ' bg-gray' : ''; ?>">
	<div class="container">
		<?php
		if (is_archive()) {
			echo '<h1 class="page-title">'.post_type_archive_title('', false).'</h1>';
		}
		elseif (is_single() || is_page()) {
		  the_title('<h1 class="page-title">', '</h1>');
    }
		?>
		<?php yoast_breadcrumb( '<div class="breadcrumb-list">','</div>' ); ?>
	</div>
</div>
<?php endif;