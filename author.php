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

<div class="author-container author-page panel">
    <div class="author-meta author-page-meta">
        <div class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?></div>
        <div class="author-detail">
            <div class="author-detail-name"><?php echo get_the_author_meta( 'display_name' ); ?></div>
            <div class="author-detail-description"><?php
                if ( get_the_author_meta( 'user_description' ) ) {
                    echo get_the_author_meta( 'user_description' );
                } else {
                    esc_html_e( 'No user description was provided.', 'lumine' );
                }
            ?></div>
        </div>
    </div>
</div>

<div id="main" class="main">

    <?php get_template_part( 'loop' ); ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

</body>
</html>