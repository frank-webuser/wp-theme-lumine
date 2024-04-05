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
    // True WordPress single.php lifehack
    if ( have_posts() ) { the_post(); };
?>

<?php get_header(); ?>

<?php if( has_post_thumbnail() ): ?>
    <div class="post-thumbnail">
    <div class="post-thumbnail-shadow"></div>
    <?php
        the_post_thumbnail( 'full-width' );
        the_title( '<h1 class="post-title post-title-has-thumbnail">', '</h1>' );
    ?>
    <div class="post-author post-author-has-thumbnail"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta( 'display_name' );?></a>&nbsp;发布于<?php the_time( 'o年n月j日' ); ?></div>
</div>
<?php endif; ?>

<div id="main" class="main">
    <?php get_sidebar( 'before-content' ); ?>

    <div class="post-container">

    <?php if ( !has_post_thumbnail() ): the_title( '<h1 class="post-title">', '</h1>' ); ?>
    <div class="post-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta( 'display_name' );?></a>&nbsp;发布于<?php the_time( 'o年n月j日' ); ?></div>
    <?php endif; ?>
    <div class="post-content">
        <?php the_content(); ?>
        <?php get_sidebar( 'after-content' ); ?>
        <?php wp_link_pages(); ?>
    </div>

    </div>

    <div class="post-catergories-container panel">

    <div class="post-categories">
        <div class="post-categories-logo">
            <object title="<?php esc_attr_e( 'Categories logo', 'lumine' ) ?>" data="<?php echo esc_url( get_template_directory_uri() ) ?>/assets/categories.svg"></object>
        </div>
        <div class="post-category"><?php esc_html_e( 'Categories:', 'lumine' ) ?></div>
        <?php
            $categories_wp_terms = get_the_category();
            if ( !$categories_wp_terms ) {
                echo '<div class="post-category">' . esc_html__( 'None', 'lumine' ) . '</div>';
            } else {
                foreach( $categories_wp_terms as $category_wp_terms ) {
                    $category = $category_wp_terms -> to_array();
                    $category_link = get_category_link( $category_wp_terms );
                    echo '<div class="post-category"><a href="' . $category_link . '">' . $category['name'] . '</a></div>';
                }
            }
        ?>
    </div>

    <div class="post-categories post-tags">
        <div class="post-categories-logo post-tags-logo">
            <object title="<?php esc_attr_e( 'Tags logo', 'lumine' ) ?>" data="<?php echo esc_url( get_template_directory_uri() ) ?>/assets/tags.svg"></object>
        </div>
        <div class="post-category post-tag"><?php esc_html_e( 'Tags:', 'lumine' ) ?></div>
        <?php
            $tags_wp_terms = get_the_tags();
            if ( !$tags_wp_terms ) {
                echo '<div class="post-category post-tag">' . esc_html__( 'None', 'lumine' ) . '</div>';
            } else {
                foreach( $tags_wp_terms as $tag_wp_terms ) {
                    $tag = $tag_wp_terms -> to_array();
                    $tag_link = get_tag_link( $tag_wp_terms );
                    echo '<div class="post-category post-tag"><a href="' . $tag_link . '">' . $tag['name'] . '</a></div>';
                }
            }
        ?>
    </div>

    </div>

    <div class="author-container panel">
        <div class="author-meta">
            <div class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?></div>
            <div class="author-detail">
                <div class="author-detail-name"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta( 'display_name' ); ?></a></div>
                <div class="author-detail-description"><?php echo get_the_author_meta( 'user_description' ); ?></div>
            </div>
        </div>
        <?php get_sidebar( 'after-author' ); ?>
    </div>

    <?php if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif; ?>
    <?php if ( !comments_open() ): ?>
        <p class="comments-area panel"><?php _e( 'Comments are closed.', 'lumine' ); ?></p>
    <?php endif; ?>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

</body>
</html>