<?php if ( is_active_sidebar( 'before-content' ) ) : ?>
    <div class="widget-before-content panel">
        <?php dynamic_sidebar( 'before-content' ); ?>
    </div>
<?php endif; ?>