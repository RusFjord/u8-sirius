<?php 

function u8_sirius_setup() {
    add_theme_support( 'custom-logo' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'u8_sirius_setup' );
 
function u8_sirius_scripts() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'main_style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'u8_sirius_scripts' );