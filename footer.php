</div>
<footer class="footer-container">
    <?php get_sidebar( 'footer' ); ?>
    <?php if ( get_theme_mod( 'lumine_footer_credits_shown' ) != 'none' ): ?>
        <div class="footer-credits"><?php print_r( get_theme_mod( 'lumine_footer_credits' ) ); ?>
        <?php if ( get_theme_mod( 'lumine_footer_credits_shown' ) == 'both' ): ?>
            Theme <a href="#">Lumine</a>
        <?php endif; ?>
        </div>
    <?php endif; ?>
</footer>
<?php wp_footer(); ?>