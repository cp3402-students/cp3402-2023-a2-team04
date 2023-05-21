<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Heartland_Hits
 */

?>

    <footer id="colophon" class="site-footer">
        <div class="site-info">

            <a href="<?php echo esc_url(get_theme_mod('social_media_facebook_link')); ?>" class="fa fa-facebook"></a>
<!--            <a href="--><?php //echo esc_url(get_theme_mod('social_media_twitter_link')); ?><!--" class="fa fa-twitter"></a>-->
<!--            <a href="--><?php //echo esc_url(get_theme_mod('social_media_youtube_link')); ?><!--" class="fa fa-youtube"></a>-->
<!--            <a href="--><?php //echo esc_url(get_theme_mod('social_media_instagram_link')); ?><!--" class="fa fa-instagram"></a>-->

            <!-- Footer Navigation Menu-->
            <nav class="footer-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'secondary',
                    )
                );
                ?>
            </nav><!-- #site-navigation -->

            <div class="author-theme-footer-info">
            <a href="<?php echo esc_url(__('https://wordpress.org/', 'heartland-hits')); ?>">
                <?php
                /* translators: %s: CMS name, i.e. WordPress. */
                printf(esc_html__('%s', 'heartland-hits'), 'WordPress');
                ?>
            </a>
            <span class="sep"> | </span>
            <?php
            $theme = wp_get_theme();
            $author_uri = $theme->get('AuthorURI');
            $author_name = $theme->get('Author');
            printf(esc_html__('Theme: %1$s by %2$s.', 'heartland-hits'), 'heartland-hits', '<a href="' . esc_url($author_uri) . '">' . esc_html($author_name) . '</a>');
            ?>
            </div>

        </div><!-- .site-info -->
    </footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
