<?php

function lumine_apply_colors() {
    $mode = get_theme_mod( 'lumine_color_general_default', 'auto' );
    ?>
    <style>
        <?php if ( $mode != 'dark' ): ?>
        :root {
            --primary-bg: <?php echo get_theme_mod( 'lumine_color_light_bg', '#fffcfc' ); ?>;
            --primary: <?php echo get_theme_mod( 'lumine_color_light_text', '#222222' ); ?>;
            --primary-link: <?php echo get_theme_mod( 'lumine_color_light_navlink', '#2a557a' ); ?>;
            --secondary: <?php echo get_theme_mod( 'lumine_color_light_secondary', '#504b4b' ); ?>;
            --link: <?php echo get_theme_mod( 'lumine_color_light_link', '#2a557a' ); ?>;
            --link-hover-trans: <?php echo get_theme_mod( 'lumine_color_light_linkhovertrans', '#3875aa3f' ); ?>;
            --link-hover: <?php echo get_theme_mod( 'lumine_color_light_linkhover', '#0f192c' ); ?>;
            --link-hover-dbg: <?php echo get_theme_mod( 'lumine_color_light_linkhoverdbg', '#0f192c' ); ?>;
            --dark-primary: <?php echo get_theme_mod( 'lumine_color_light_dprimary', '#ffffff' ); ?>;
            --dark-secondary: <?php echo get_theme_mod( 'lumine_color_light_dprimaryhover', '#ffa775' ); ?>;
            --primary-bg-contrast: <?php echo get_theme_mod( 'lumine_color_light_bgcontrast', '#ffffff' ); ?>;
        }
        <?php endif; ?>

        <?php if ( $mode != 'light' ): ?>
        <?php if ( $mode == 'auto' ): ?>@media (prefers-color-scheme: dark) {<?php endif; ?>
            :root {
                --primary-bg: <?php echo get_theme_mod( 'lumine_color_dark_bg', '#000303' ); ?>;
                --primary: <?php echo get_theme_mod( 'lumine_color_dark_text', '#ffffff' ); ?>;
                --primary-link: <?php echo get_theme_mod( 'lumine_color_dark_navlink', '#4990cf' ); ?>;
                --secondary: <?php echo get_theme_mod( 'lumine_color_dark_secondary', '#a0a0a0' ); ?>;
                --link: <?php echo get_theme_mod( 'lumine_color_dark_link', '#4990cf' ); ?>;
                --link-hover-trans: <?php echo get_theme_mod( 'lumine_color_dark_linkhovertrans', '#649ed17c' ); ?>;
                --link-hover: <?php echo get_theme_mod( 'lumine_color_dark_linkhover', '#ffffff' ); ?>;
                --link-hover-dbg: <?php echo get_theme_mod( 'lumine_color_dark_linkhoverdbg', '#1d76c5' ); ?>;
                --dark-primary: <?php echo get_theme_mod( 'lumine_color_dark_dprimary', '#ffffff' ); ?>;
                --dark-secondary: <?php echo get_theme_mod( 'lumine_color_dark_dprimaryhover', '#ffa775' ); ?>;
                --primary-bg-contrast: <?php echo get_theme_mod( 'lumine_color_dark_bgcontrast', '#000000' ); ?>;
            }
        <?php if ( $mode == 'auto' ): ?>}<?php endif; ?>
        <?php endif; ?>
    </style>
    <?php
}

add_action( 'wp_head', 'lumine_apply_colors' );