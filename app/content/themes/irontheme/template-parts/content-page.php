<?php if (get_the_content()): ?>

<section>
	<div class="container">
		<?php the_content(); ?>
	</div>
</section>

<?php endif; ?>

<?php get_template_part('template-parts/all', 'sections');