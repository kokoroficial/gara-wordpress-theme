<?php get_header(); ?>

<section class="products">
  <h2>Our Products</h2>

  <?php
  $products = new WP_Query([
    'post_type' => 'product',
    'posts_per_page' => 3
  ]);

  if ($products->have_posts()) :
    while ($products->have_posts()) : $products->the_post();
  ?>
      <article class="product-card">
        <h3><?php the_title(); ?></h3>
        <?php the_content(); ?>
      </article>
  <?php
    endwhile;
    wp_reset_postdata();
  else:
    echo '<p>No products found.</p>';
  endif;
  ?>
</section>


<?php get_footer(); ?>