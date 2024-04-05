<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>" type="text/css" />
<?php wp_head(); ?>

</head>

<body>
    
<?php get_header(); ?>

<div id="main" class="main">
    <div class="error-404">
        <h1><?php esc_html_e( '404 Not Found', 'lumine' ) ?></h1>
        <div><?php esc_html_e( 'The page you are looking for cannot be found!', 'lumine' ) ?></div>
        <?php get_search_form(); ?>
    </div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

</body>
</html>