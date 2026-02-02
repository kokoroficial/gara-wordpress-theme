<?php
function gara_enqueue_assets() {
  wp_enqueue_style(
    'gara-style',
    get_stylesheet_uri(),
    [],
    '1.0'
  );
}
add_action('wp_enqueue_scripts', 'gara_enqueue_assets');
function gara_register_products() {
  register_post_type('product', [
    'label' => 'Products',
    'public' => true,
    'supports' => ['title', 'editor', 'thumbnail'],
  ]);
}
add_action('init', 'gara_register_products');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  wp_mail(
    get_option('admin_email'),
    'New inquiry',
    sanitize_text_field($_POST['message'])
  );
}
function gara_register_menus() {
  register_nav_menus([
    'main-menu' => 'Main Menu',
  ]);
}
add_action('init', 'gara_register_menus');
