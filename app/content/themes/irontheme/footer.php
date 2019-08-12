  </div><!-- /.content -->

  <footer class="footer">
    <div class="container">

    </div>
  </footer><!-- #colophon -->

</div><!-- /.wrapper -->

<?php $popups = get_popups(-1);
if ($popups->have_posts()):
  while ($popups->have_posts()): $popups->the_post();?>
    <div class="modal" id="<?php echo get_post_field('post_name'); ?>">
      <button type="button" class="modal__close <?php echo get_post_field('post_name'); ?>_close"></button>
      <h3 class="modal__title"><?php the_title(); ?></h3>

      <div class="modal__content">
        <?php the_content(); ?>
      </div>

    </div>
<?php endwhile; wp_reset_postdata();
endif; ?>

<?php wp_footer(); ?>

</body>
</html>
