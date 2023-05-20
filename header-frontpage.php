<?php
/**
 * The header for our theme
 *
 * This is the template that displays all the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Heartland_Hits
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text"
       href="#primary"><?php esc_html_e('Skip to content', 'heartland-hits'); ?></a>

    <header id="masthead" class="site-header">
        <div class="header-elements">
            <div class="container">
                <div class="row align-items-center min-vw-90">
                    <div class="col-md-2 mt-1 mb-1 brand-logo">
                        <?php the_custom_logo(); ?>
                    </div>

                    <div class="col-md-4 ml-0 brand-title">
                        <?php
                        if (is_front_page() && is_home()) :
                            ?>
                            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                      rel="home"><?php bloginfo('name'); ?></a></h1>
                        <?php
                        else :
                            ?>
                            <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                     rel="home"><?php bloginfo('name'); ?></a></p>
                        <?php
                        endif;
                        $heartland_hits_description = get_bloginfo('description', 'display');
                        if ($heartland_hits_description || is_customize_preview()) :
                            ?>
                            <p class="site-description"><?php echo $heartland_hits_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6 ml-auto left-header-column">
                        <button type="button" class="btn btn-danger login-btn btn-rounded" onClick="location.href='<?php echo esc_url(get_theme_mod('login_button_link')); ?>'">Login</button>
                        <button type="button" class="btn btn-danger btn-rounded" onClick="location.href='<?php echo esc_url(get_theme_mod('signup_button_link')); ?>'">Sign Up</button>
                    </div>

                </div>
                <div class="row">
                    <nav id="site-navigation" class="main-navigation">
                        <button class="menu-toggle" aria-controls="primary-menu"
                                aria-expanded="false"><span class="material-symbols-outlined">menu</span>
                            <?php esc_html_e('Menu', 'heartland-hits'); ?></button>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_id' => 'primary-menu',
                            )
                        );
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>