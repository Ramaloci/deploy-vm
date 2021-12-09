<?php
function add_theme_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('hamburgers', get_template_directory_uri() . '/css/hamburgers.css');
    wp_enqueue_script('script', get_template_directory_uri() . '/js/hamburger.js', array(), null, true);
}

function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

function register_my_menus()
{
    register_nav_menus(
        array(
            'main-menu' => __('Main Menu'),
            'extra-menu' => __('Extra Menu')
        )
    );
}

add_action('init', 'register_my_menus');
add_action('wp_enqueue_scripts', 'add_theme_scripts');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_filter('upload_mimes', 'cc_mime_types');
