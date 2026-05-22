<?php
function energoserver_portfolio_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'menu-principal' => 'Menú Principal'
    ));
}
add_action('after_setup_theme', 'energoserver_portfolio_setup');

function energoserver_portfolio_scripts() {
    wp_enqueue_style('estilos-principales', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'energoserver_portfolio_scripts');
?>
