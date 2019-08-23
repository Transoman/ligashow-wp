<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ith
 */

get_header();
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">

      <section class="error-404 not-found">
        <div class="container">
          <div class="text-center">
            <h2 class="section-title">404</h2>
            <h3>Страница не найдена</h3>
            <a href="<?php echo home_url('/')?>">На главную</a>
          </div>
        </div>
      </section><!-- .error-404 -->

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
