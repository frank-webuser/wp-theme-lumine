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
            <object title="<?php esc_attr_e( 'Category logo', 'lumine' ) ?>" data="<?php echo esc_url( get_template_directory_uri() ) ?>/assets/categories.svg"></object>
        </div>
        <div class="post-category"><?php esc_html_e( 'Catergory:', 'lumine' ) ?></div>
        <div class="post-category"><?php single_cat_title(); ?></div>
    </div>

    <?php get_template_part( 'loop' ); ?>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

</body>
</html>