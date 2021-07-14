<?php 

function u8_sirius_setup() {
    add_theme_support( 'custom-logo' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 300, 300 );

    register_sidebar(
		array(
			'name'          => 'right-sidebar',
			'id'            => 'right-area',
			'description'   => esc_html__( 'Вывод виджетов в правой колонке', '' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);
}

add_action( 'after_setup_theme', 'u8_sirius_setup' );
 
function u8_sirius_scripts() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_script('font-awesome', 'https://kit.fontawesome.com/81a8242a38.js');
    wp_enqueue_style( 'main_style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'u8_sirius_scripts' );