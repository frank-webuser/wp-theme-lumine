<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="<?php echo esc_url( get_stylesheet_uri() ); ?>" type="text/css" />
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php
    if ( have_posts() ) { the_post(); };
?>

<?php get_header(); ?>

<div id="main" class="main">
    <?php get_sidebar( 'before-content' ); ?>

    <div class="post-container">

    <?php the_title( '<h1 class="post-title">', '</h1>' ); ?>
    <div class="post-content">
        <?php the_content(); ?>
        <?php wp_link_pages(); ?>
        <?php get_sidebar( 'after-content' ); ?>
    </div>

    </div>

    <?php
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
    ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

</body>
</html>