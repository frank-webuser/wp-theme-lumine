<?php
function lumine_register_customizer( $wp_customize ) {

	$wp_customize -> remove_section( 'colors' );

	$wp_customize -> add_panel( 'lumine_colors', Array(
		'title' => __( 'Colors', 'lumine' ),
        'priority' => 40
	) );

    $wp_customize -> add_panel( 'lumine_layouts', Array(
        'title' => __( 'Layouts', 'lumine' ),
        'priority' => 70
    ) );

	/* Register the "Footer" section. */

	$wp_customize -> add_section( 'lumine_footer' , Array(
		'title' => __( 'Footer', 'lumine' ),
		'description' => __( 'You may set how the credit line looks like in your footer.', 'lumine' ),
		'priority' => 105
	) );

    $wp_customize -> add_section( 'lumine_colors_general' , Array(
        'panel' => 'lumine_colors',
		'title' => __( 'General', 'lumine' ),
		'description' => __( 'General color settings for your site.', 'lumine' ),
		'priority' => 20
	) );

    $wp_customize -> add_section( 'lumine_colors_light' , Array(
        'panel' => 'lumine_colors',
		'title' => __( 'Light mode settings', 'lumine' ),
		'description' => __( 'Color settings for your site in light mode.', 'lumine' ),
		'priority' => 40
	) );

    $wp_customize -> add_section( 'lumine_colors_dark' , Array(
        'panel' => 'lumine_colors',
		'title' => __( 'Dark mode settings', 'lumine' ),
		'description' => __( 'Color settings for your site in dark mode.', 'lumine' ),
		'priority' => 60
	) );

    $wp_customize -> add_section( 'lumine_layouts_home' , Array(
        'panel' => 'lumine_layouts',
		'title' => __( 'Home', 'lumine' ),
		'description' => __( 'Configure how your home page looks like. Only take effect when "Custom Page" is set as your home page.', 'lumine' ),
		'priority' => 20
	) );

    $wp_customize -> add_section( 'lumine_layouts_blog' , Array(
        'panel' => 'lumine_layouts',
		'title' => __( 'Blog', 'lumine' ),
		'description' => __( 'Configure how your blog page looks like. This takes precedence if "Custom Page" is not your home page.', 'lumine' ),
		'priority' => 30
	) );

    $wp_customize -> add_section( 'lumine_layouts_post' , Array(
        'panel' => 'lumine_layouts',
		'title' => __( 'Posts', 'lumine' ),
		'description' => __( 'Configure how your individual posts page looks like.', 'lumine' ),
		'priority' => 40
	) );

    $wp_customize -> add_section( 'lumine_layouts_page' , Array(
        'panel' => 'lumine_layouts',
		'title' => __( 'Pages', 'lumine' ),
		'description' => __( 'Configure how your general pages look like.', 'lumine' ),
		'priority' => 50
	) );

    $wp_customize -> add_section( 'lumine_layouts_author' , Array(
        'panel' => 'lumine_layouts',
		'title' => __( 'Author', 'lumine' ),
		'description' => __( 'Configure how your author archive pages look like.', 'lumine' ),
		'priority' => 60
	) );

    $wp_customize -> add_section( 'lumine_layouts_archive' , Array(
        'panel' => 'lumine_layouts',
		'title' => __( 'Archive', 'lumine' ),
		'description' => __( 'Configure how your general archive pages look like.', 'lumine' ),
		'priority' => 70
	) );

	/*
	 * Register the color settings.
	 */

    $wp_customize -> add_setting( 'lumine_color_general_default', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => 'auto'
	) );
	$wp_customize -> add_control( 'lumine_color_general_default', Array(
		'type' => 'radio',
		'label' => __( 'Default Color Scheme', 'lumine' ),
		'description' => __( 'The theme will display a footer if checked.', 'lumine' ),
        'choices' => Array( 
            'auto' => __( "Automatically decides the color scheme based on your vistor's settings." , 'lumine' ),
            'light' => __( "Light mode" , 'lumine' ),
            'dark' => __( "Dark mode" , 'lumine' )
         ),
		'section' => 'lumine_colors_general'
	)  );

    $wp_customize -> add_setting( 'lumine_color_general_control', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => 'yes'
	) );
	$wp_customize -> add_control( 'lumine_color_general_control', Array(
		'type' => 'radio',
		'label' => __( 'Allow users to change color scheme in the frontend?', 'lumine' ),
        'choices' => Array( 
            'yes' => __( "Yes" , 'lumine' ),
            'no' => __( "No" , 'lumine' ),
         ),
		'section' => 'lumine_colors_general'
	)  );

	/* Register light color. */

	$wp_customize -> add_setting( 'lumine_color_light_text', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#222222'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_light_text', Array(
		'label' => __( 'Text Color', 'lumine' ),
		'section' => 'lumine_colors_light',
	) ) );

	$wp_customize -> add_setting( 'lumine_color_light_secondary', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#504b4b'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_light_secondary', Array(
		'label' => __( 'Secondary Text Color', 'lumine' ),
		'section' => 'lumine_colors_light',
	) ) );

    $wp_customize -> add_setting( 'lumine_color_light_bg', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#fffcfc'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_light_bg', Array(
		'label' => __( 'Main Background Color', 'lumine' ),
		'section' => 'lumine_colors_light',
	) ) );

	$wp_customize -> add_setting( 'lumine_color_light_bgcontrast', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#ffffff'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_light_bgcontrast', Array(
		'label' => __( 'Main Background Color with Contrast', 'lumine' ),
		'section' => 'lumine_colors_light',
	) ) );

    $wp_customize -> add_setting( 'lumine_color_light_link', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#2a557a'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_light_link', Array(
		'label' => __( 'Link Color', 'lumine' ),
		'section' => 'lumine_colors_light',
	) ) );

    $wp_customize -> add_setting( 'lumine_color_light_linkhover', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#0f192c'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_light_linkhover', Array(
		'label' => __( 'Link Color when Hovered', 'lumine' ),
		'section' => 'lumine_colors_light',
	) ) );

    $wp_customize -> add_setting( 'lumine_color_light_linkhoverdbg', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#0f192c'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_light_linkhoverdbg', Array(
		'label' => __( 'Button Color when Hovered', 'lumine' ),
		'section' => 'lumine_colors_light',
	) ) );

    $wp_customize -> add_setting( 'lumine_color_light_linkhovertrans', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#3875aa3f'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_light_linkhovertrans', Array(
		'label' => __( 'Pagination background when hovered', 'lumine' ),
        'description' => __( 'Use a transparent value.', 'lumine' ),
		'section' => 'lumine_colors_light',
	) ) );

    $wp_customize -> add_setting( 'lumine_color_light_navlink', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#0f192c'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_light_navlink', Array(
		'label' => __( 'Nav Link Color when Hovered', 'lumine' ),
		'section' => 'lumine_colors_light',
	) ) );

    $wp_customize -> add_setting( 'lumine_color_light_dprimary', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#ffffff'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_light_dprimary', Array(
		'label' => __( 'Text color in dark backgrounds', 'lumine' ),
		'section' => 'lumine_colors_light',
	) ) );

    $wp_customize -> add_setting( 'lumine_color_light_dprimaryhover', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#ffa775'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_light_dprimaryhover', Array(
		'label' => __( 'Link Color when hovered in dark backgrounds', 'lumine' ),
		'section' => 'lumine_colors_light',
	) ) );

    /* Register dark color. */

	$wp_customize -> add_setting( 'lumine_color_dark_text', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#ffffff'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_dark_text', Array(
		'label' => __( 'Text Color', 'lumine' ),
		'section' => 'lumine_colors_dark',
	) ) );

	$wp_customize -> add_setting( 'lumine_color_dark_secondary', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#a0a0a0'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_dark_secondary', Array(
		'label' => __( 'Secondary Text Color', 'lumine' ),
		'section' => 'lumine_colors_dark',
	) ) );

    $wp_customize -> add_setting( 'lumine_color_dark_bg', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#000303'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_dark_bg', Array(
		'label' => __( 'Main Background Color', 'lumine' ),
		'section' => 'lumine_colors_dark',
	) ) );

	$wp_customize -> add_setting( 'lumine_color_light_bgcontrast', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#000000'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_dark_bgcontrast', Array(
		'label' => __( 'Main Background Color with Contrast', 'lumine' ),
		'section' => 'lumine_colors_dark',
	) ) );

    $wp_customize -> add_setting( 'lumine_color_dark_link', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#4990cf'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_dark_link', Array(
		'label' => __( 'Link Color', 'lumine' ),
		'section' => 'lumine_colors_dark',
	) ) );

    $wp_customize -> add_setting( 'lumine_color_dark_linkhover', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#ffffff'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_dark_linkhover', Array(
		'label' => __( 'Link Color when Hovered', 'lumine' ),
		'section' => 'lumine_colors_dark',
	) ) );

	$wp_customize -> add_setting( 'lumine_color_dark_linkhoverdbg', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#1d76c5'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_light_linkhoverdbg', Array(
		'label' => __( 'Button Color when Hovered', 'lumine' ),
		'section' => 'lumine_colors_dark',
	) ) );

    $wp_customize -> add_setting( 'lumine_color_dark_linkhovertrans', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#649ed17c'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_dark_linkhovertrans', Array(
		'label' => __( 'Pagination background when hovered', 'lumine' ),
        'description' => __( 'Use a transparent value.', 'lumine' ),
		'section' => 'lumine_colors_dark',
	) ) );

    $wp_customize -> add_setting( 'lumine_color_dark_navlink', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#4990cf'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_dark_navlink', Array(
		'label' => __( 'Nav Link Color when Hovered', 'lumine' ),
		'section' => 'lumine_colors_dark',
	) ) );

    $wp_customize -> add_setting( 'lumine_color_dark_dprimary', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#ffffff'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_dark_dprimary', Array(
		'label' => __( 'Text color in dark backgrounds', 'lumine' ),
		'section' => 'lumine_colors_dark',
	) ) );

    $wp_customize -> add_setting( 'lumine_color_dark_dprimaryhover', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => '#ffa775'
	) );
	$wp_customize -> add_control( new WP_Customize_Color_Control( $wp_customize, 'lumine_color_dark_dprimaryhover', Array(
		'label' => __( 'Link Color when hovered in dark backgrounds', 'lumine' ),
		'section' => 'lumine_colors_dark',
	) ) );

	/*
	 * Register footer settings.
	 */

	/* Register footer credit display control. */

	$wp_customize -> add_setting( 'lumine_footer_credits_shown', Array(
		'type' => 'theme_mod',
		'capability' => 'edit_theme_options',
        'default' => 'both'
	) );
	$wp_customize -> add_control( 'lumine_footer_credits_shown', Array(
		'type' => 'radio',
		'label' => __( 'Display footer?', 'lumine' ),
		'description' => __( 'The theme will display a footer if checked.', 'lumine' ),
        'choices' => Array( 
            'both' => 'Show both custom credits and Lumine credits.',
            'custom' => 'Show custom credits only.',
            'none' => 'Do not display a credits line.'
         ),
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
