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
                            <p class="site-description"><?php echo $heartland_hits_description; ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6 ml-auto left-header-column">
                        <?php
                        $login_button_link = get_theme_mod('login_button_link');
                        if ($login_button_link) {
                            $login_url = get_permalink($login_button_link);
                            ?>
                            <a href="<?php echo esc_url($login_url); ?>" class="btn btn-danger login-btn btn-rounded">Login</a>
                            <?php
                        }
                        ?>

                        <?php
                        $signup_button_link = get_theme_mod('signup_button_link');
                        if ($signup_button_link) {
                            $signup_url = get_permalink($signup_button_link);
                            ?>
                            <a href="<?php echo esc_url($signup_url); ?>" class="btn btn-danger btn-rounded">Sign Up</a>
                            <?php
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>

        <nav id="site-navigation" class="main-navigation">
            <div class="container d-flex justify-content-center">

                <div class="row">

                    <div class="col-12 d-flex justify-content-center">
                        <button class="menu-toggle" aria-controls="primary-menu"
                                aria-expanded="false">
                            <i class="material-symbols-outlined"></i>
                            <?php esc_html_e('Menu', 'heartland-hits'); ?>
                        </button>
                    </div>

                    <div class="col-12 text-center">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_id' => 'primary-menu',
                            )
                        );
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>