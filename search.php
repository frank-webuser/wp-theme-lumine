<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>" type="text/css" />
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    
<?php get_header(); ?>

<div id="main" class="main">

    <div class="post-categories panel">
        <div class="post-categories-logo">
            <object title="<?php esc_attr_e( 'Search logo', 'lumine' ) ?>" data="<?php echo esc_url( get_template_directory_uri() ) ?>/assets/search.svg"></object>
        </div>
        <div class="post-category"><?php echo esc_html__( 'You searched:&nbsp;', 'lumine' ) . get_search_query(); ?></div>
    </div>

    <?php get_template_part( 'loop' ); ?>
    
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

</body>
</html>