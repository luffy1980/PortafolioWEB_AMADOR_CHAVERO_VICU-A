<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header>
    <div class="logo">EnergoServer</div>

    <nav>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'menu-principal',
            'fallback_cb' => false
        ));
        ?>
    </nav>
</header>
