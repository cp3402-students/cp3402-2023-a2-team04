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

            <!-- Footer Navigation Menu-->
            <nav class="footer-navigation">
                <button class="menu-toggle" aria-controls="secondary-menu"
                        aria-expanded="false"><?php esc_html_e('Footer Menu', 'heartland-hits'); ?></button>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'secondary',
                    )
                );
                ?>
            </nav><!-- #site-navigation -->

			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'heartland-hits' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'heartland-hits' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'heartland-hits' ), 'heartland-hits', '<a href="http://underscores.me/">Team 04</a>' );
				?>
		</div><!-- .site-info -->



	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
