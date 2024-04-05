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

<?php get_template_part( 'carousel' ); ?>

<div id="main" class="main">
    <?php get_template_part( 'loop' ); ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

</body>
</html>