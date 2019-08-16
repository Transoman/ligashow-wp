<?php
if ( function_exists('yoast_breadcrumb') ): ?>
<div class="breadcrumb">
	<div class="container">
		<?php
		if (is_archive()) {
			echo '<h1 class="page-title">'.post_type_archive_title('', false).'</h1>';
		}
		elseif (is_single()) {
		  the_title('<h1 class="page-title">', '</h1>');
    }
		?>
		<?php yoast_breadcrumb( '<div class="breadcrumb-list">','</div>' ); ?>
	</div>
</div>
<?php endif;