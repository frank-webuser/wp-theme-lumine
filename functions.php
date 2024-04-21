<?php
function lumine_custom_logo_setup() {
	$defaults = array(
		'height'               => 80,
		'width'                => 80,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'lumine_custom_logo_setup' );

function lumine_register_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu', 'lumine' )
        )
    );
}
add_action( 'init', 'lumine_register_menus' );

require_once 'includes/sidebars.php';
require_once 'includes/customizer.php';
require_once 'includes/style.php';

add_theme_support( 'html5', array(
    'comment-list', 
    'comment-form',
    'search-form',
    'gallery',
    'caption',
) );

add_theme_support( 'post-thumbnails' );

/* $args = array(
    'default-color' => 'fafafa',
);
add_theme_support( 'custom-background', $args ); */

add_theme_support( "title-tag" );
add_theme_support( 'automatic-feed-links' );

function lumine_register_files() {
	wp_register_script( 'lumine-menu', get_template_directory_uri() . '/menu.js', array('jquery') );
	wp_localize_script( 'lumine-menu', 'wordpress_data', array(
		'dir' => get_template_directory_uri()
	) );
	wp_enqueue_script( 'lumine-menu' );
	wp_enqueue_script( 'comment-reply' );

	wp_enqueue_style( 'lumine-style-colors', get_template_directory_uri() . '/css/colors.css' );
	wp_enqueue_style( 'lumine-style-mobile', get_template_directory_uri() . '/css/style_mobile.css' );
	wp_enqueue_style( 'lumine-icons', get_template_directory_uri() . '/css/remixicon/remixicon.css' );

	if( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
		// Load comment-reply.js (into footer)
		wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
	}

}
add_action( 'wp_enqueue_scripts', 'lumine_register_files' );

/* add_filter( 'comment_form_defaults', 'lumine_tinymce_comment' );
function lumine_tinymce_comment ( $args ) {
    ob_start();
    wp_editor( '', 'comment', array('tinymce') );
    $args['comment_field'] = ob_get_clean();
    return $args;
} */

load_theme_textdomain( 'lumine', get_template_directory() . '/languages' );
?> 
