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

    <div class="post-categories post-tags">
        <div class="post-categories-logo post-tags-logo">
            <object title="<?php esc_attr_e( 'Tag logo', 'lumine' ) ?>" data="<?php echo esc_url( get_template_directory_uri() ) ?>/assets/tag.svg"></object>
        </div>
        <div class="post-category post-tag"><?php esc_html_e( 'Tag:', 'lumine' ) ?></div>
        <div class="post-category post-tag"><?php single_tag_title(); ?></div>
    </div>

    <?php get_template_part( 'loop' ); ?>
    
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

</body>
</html>