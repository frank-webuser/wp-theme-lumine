<?php get_sidebar( 'before-content' ); ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class( 'panel' ); ?>>
            <?php if( has_post_thumbnail() ): ?>
                <a class="post-thumbnail-link" title="<?php echo esc_attr__('Thumbnail for: ', 'lumine') . esc_attr(get_the_title()); ?>" href="<?php echo get_post_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail' ); ?></a>
            <?php endif; ?>
            <div class="post-data <?php if( has_post_thumbnail() ) { echo 'post-has-thumbnail'; } ?>">
                <h1 class="post-title">
                    <a class="post-title-link" href="<?php echo get_post_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h1>
                <div class="post-author"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta( 'display_name' );?></a>&nbsp;发布于<?php the_time( 'o年n月j日' ); ?></div>
                <div class="post-meta">
                    <div class="post-content"><a class="post-title-link" href="<?php echo get_post_permalink(); ?>"><?php the_excerpt(); ?></a></div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
    <br/>
    <?php the_posts_pagination();
else:
    echo '<div class="post-content">' . esc_html__( 'Sorry, no posts matched your criteria.', 'lumine' ) . '</div>';
endif;
?>