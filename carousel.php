<div class="carousel">

<?php
$recent_posts = wp_get_recent_posts(
    array(
        'numberposts' => 5,
        'post_status' => 'publish'
    )
);
foreach( $recent_posts as $recent_post ) {
    $recent_post_WP_Post = get_post( $recent_post['ID'] );
    $title = get_the_title( $recent_post_WP_Post );
    $excerpt = get_the_excerpt( $recent_post_WP_Post );
    $thumbnail = get_the_post_thumbnail( $recent_post_WP_Post );
    $permalink = get_post_permalink( $recent_post_WP_Post );
    ?>
    <div class="carousel-item">
        <a href="<?php echo $permalink ?>" title="<?php echo $title; ?>"><div class="carousel-thumbnail-shadow"></div></a>
        <div class="carousel-thumbnail"><?php echo $thumbnail; ?></div>
        <div class="carousel-data">
            <h1 class="carousel-title"><a href="<?php echo $permalink ?>"><?php echo $title; ?></a></h1>
            <div class="carousel-excerpt"><a href="<?php echo $permalink ?>"><?php echo $excerpt; ?></a></div>
        </div>
    </div>
    <?php
}
?>

<div class="carousel-indicators">
<?php
$i = 0;
foreach( $recent_posts as $recent_post ) {
    $recent_post_WP_Post = get_post( $recent_post['ID'] );
    $title = get_the_title( $recent_post_WP_Post );
?>
    <button class="carousel-indicator" data-position="<?php echo $i; ?>" title="<?php echo esc_attr__( 'Carousel:', 'lumine' ) . $title; ?>"></button>
<?php
$i++;
}
?>
</div>

<button class="carousel-control-prev" id="carousel-prev">
    <object title="<?php esc_attr_e( 'Previous carousel item', 'lumine' ) ?>" data="<?php echo esc_url( get_template_directory_uri() ) ?>/assets/prev-white.svg"></object>
</button>

<button class="carousel-control-next" id="carousel-next">
    <object title="<?php esc_attr_e( 'Next carousel item', 'lumine' ) ?>" data="<?php echo esc_url( get_template_directory_uri() )  ?>/assets/next-white.svg"></object>
</button>

</div> 
