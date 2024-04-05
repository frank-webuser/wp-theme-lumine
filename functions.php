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

add_action( 'widgets_init', 'lumine_register_sidebars' );
function lumine_register_sidebars() {
	register_sidebar(
		array(
			'id'            => 'primary',
			'name'          => __( '主要侧栏', 'lumine' ),
			'before_widget' => '<div id="%1$s" class="sidebar-widget panel %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( '页面顶部', 'lumine' ),
			'id'            => 'after-thumbnail',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( '内容前', 'lumine' ),
			'id'            => 'before-content',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( '内容后', 'lumine' ),
			'id'            => 'after-content',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( '作者信息后', 'lumine' ),
			'id'            => 'after-author',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( '页脚', 'lumine' ),
			'id'            => 'footer',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
};

function lumine_register_customizer( $wp_customize ) {

	$wp_customize -> remove_section( 'colors' );

	$wp_customize -> add_panel( 'lumine_colors', array(
		'title' => __( 'Colors', 'lumine' )
	) );

	/* Register the "Footer" section. */

	$wp_customize -> add_section( 'lumine_footer' , array(
		'title' => __( 'Footer', 'lumine' ),
		'description' => __( 'You may set how the credit line looks like in your footer.', 'lumine' ),
		'priority' => 105
	) );

	/*
	 * Register the color settings.
	 */

	/* Register text color. */

	$wp_customize -> add_setting( 'lumine_text_color', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_text_color', array(
		'label' => __( 'Text Color', 'lumine' ),
		'section' => 'colors',
	) ) );

	/*
	 * Register footer settings.
	 */

	/* Register footer credit display control. */

	$wp_customize -> add_setting( 'lumine_footer_credits_shown', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options'
	) );
	$wp_customize -> add_control( 'lumine_footer_credits_shown', Array(
		'type' => 'checkbox',
		'label' => __( 'Display footer?', 'lumine' ),
		'description' => __( 'The theme will display a footer if checked.', 'lumine' ),
		'section' => 'lumine_footer'
	) );

	/* Register footer text. */

	$wp_customize -> add_setting( 'lumine_footer_credits', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options'
	) );
	$wp_customize -> add_control( new WP_Customize_Code_Editor_Control( $wp_customize, 'lumine_footer_credits', Array(
		'code_type' => 'html',
		'label' => __( 'Footer Text', 'lumine' ),
		'description' => __( 'Set your custom footer text. HTML allowed.', 'lumine' ),
		'section' => 'lumine_footer'
	) ) );
};
add_action('customize_register','lumine_register_customizer');

add_theme_support( 'html5', array(
    'comment-list', 
    'comment-form',
    'search-form',
    'gallery',
    'caption',
) );

add_theme_support( 'post-thumbnails' );

$args = array(
    'default-color' => 'fafafa',
);
add_theme_support( 'custom-background', $args );

add_theme_support( "title-tag" );
add_theme_support( 'automatic-feed-links' );

function lumine_register_files() {
	wp_register_script( 'lumine-menu', get_template_directory_uri() . '/menu.js', array('jquery') );
	wp_localize_script( 'lumine-menu', 'wordpress_data', array(
		'dir' => get_template_directory_uri()
	) );
	wp_enqueue_script( 'lumine-menu' );
	wp_enqueue_script( 'comment-reply' );

	wp_enqueue_style( 'lumine-style-mobile', get_template_directory_uri() . '/style_mobile.css' );

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
