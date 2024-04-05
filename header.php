<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>

<a class="screen-reader-text" href="#main"><?php esc_html_e( 'Skip to main content', 'lumine' ) ?></a>

<div class="nav-bg"></div>

<div id="menu-nav">
    <div class="blog-name">
        <?php
            if ( function_exists( 'the_custom_logo' ) ) {
                if ( has_custom_logo() ) {
                    the_custom_logo();
                };
                echo '<a class="blog-home-link" href="' . home_url() . '"><h1 class="blog-name">' . get_bloginfo('name') . '</h1></a>';
            };
        ?>
    </div>
    <?php
    if ( has_nav_menu( 'header-menu' ) ) {
        wp_nav_menu( array( 'theme_location' => 'header-menu' ) );
    } else {
    ?>
    <div class="menu-none">
    <?php esc_html_e( 'No menus defined.', 'lumine' ); ?>
    </div>
    <?php } ?>
</div>

<?php if ( !has_post_thumbnail() && !is_home() ) { get_sidebar( 'after-thumbnail' ); } ?>

<div class="nav-header">
    <button id="menu-toggle" title="<?php esc_attr_e( 'Toggle menu', 'lumine' ); ?>"><object data="<?php echo esc_url( get_template_directory_uri() ) ?>/assets/menu.svg" title="<?php esc_attr_e( 'Toggle menu icon', 'lumine' ); ?>"></object></button>
    <?php
        if ( function_exists( 'the_custom_logo' ) ) {
            if ( has_custom_logo() ) {
                the_custom_logo();
            };
            echo '<a class="blog-home-link-header" href="' . home_url() . '"><h1 class="blog-name">' . get_bloginfo('name') . '</h1></a>';
        };
    ?>
</div>

<div class="container">
