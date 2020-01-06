<?php get_header(); ?>

<section class="standard index_page">
  <div class="container">
    <h1>
      <?php the_title(); ?>
    </h1>

    <?php
      if ( have_posts() ) {
        while ( have_posts() ) {
          the_post();
          the_content();
        }
      }
    ?>
  </div>
</section>

<?php get_footer(); ?>
