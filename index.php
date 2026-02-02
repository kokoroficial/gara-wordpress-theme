<?php
get_header();
?>
<section>
  <div class="logo-container">
   <img src="/wp-content/themes/gara-theme/assets/images/logo.svg" alt="Velovita">
  </div>
</section>
<section class="hero">
  <h2>LOVE YOUR LIFE</h2>
  <p>Your journey to better health starts here.</p>
</section>

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

<section id="contact" class="contact">
  <h2>Contact Us</h2>

  <form class="contact-form" method="post">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <textarea name="message" placeholder="Message"></textarea>
    <button type="submit">Send</button>
  </form>
</section>

<?php
get_footer();
