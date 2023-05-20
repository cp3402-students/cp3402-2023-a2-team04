<?php
/**
 * Heartland Hits functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Heartland_Hits
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function heartland_hits_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Heartland Hits, use a find and replace
		* to change 'heartland-hits' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'heartland-hits', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails (aka Feature Images) on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Header', 'heartland-hits' ),
			'secondary' => esc_html__( 'Footer', 'heartland-hits' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'heartland_hits_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'heartland_hits_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function heartland_hits_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'heartland_hits_content_width', 640 );
}
add_action( 'after_setup_theme', 'heartland_hits_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function heartland_hits_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'heartland-hits' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'heartland-hits' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'heartland_hits_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function heartland_hits_scripts() {

    // Google fonts TODO: Fix up enqueue and remove import statement from _typography variables
//    wp_enqueue_style('heartland-hits-fonts', 'https://fonts.googleapis.com/css2?family=Fuzzy+Bubbles:wght@400;700&family=Kalam:wght@400;700&family=Open+Sans:ital,wght@0,300;0,400;0,700;1,400&family=Raleway:ital,wght@0,300;0,400;0,700;1,400&family=Roboto+Mono:ital,wght@0,400;0,700;1,400&family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400&display=swap');

    // Bootstrap Enqueue
    wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/bootstrap.min.css', array(), null);
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true );

    // Google icons
    wp_enqueue_style('heartland-hits-icons', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200');
    wp_enqueue_style('heartland-hits-social-media-icons', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');

    // Style
	wp_enqueue_style( 'heartland-hits-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'heartland-hits-style', 'rtl', 'replace' );

	wp_enqueue_script( 'heartland-hits-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'heartland_hits_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Any post with the category newsletter will use the single-newsletter.php
function custom_category_template( $template ) {
    if ( is_single() && in_category( 'newsletter' ) ) {
        $new_template = locate_template( array( 'single-newsletter.php' ) );
        if ( !empty( $new_template ) ) {
            return $new_template;
        }
    }
    return $template;
}
add_filter( 'single_template', 'custom_category_template' );

// Allow the theme to use page templates, list any available templates below
function heartland_hits_custom_page_templates( $templates ) {
    // This is where you list the template available
    $templates['single-event.php'] = __( 'Single Event', 'heartland-hits' );
    $templates['page-events.php'] = __( 'All Events', 'heartland-hits' );
    $templates['page-newsletters.php'] = __( 'All Newsletters', 'heartland-hits' );
    return $templates;
}
add_filter( 'theme_page_templates', 'heartland_hits_custom_page_templates' );

// Get the upcoming and past events
function get_upcoming_events() {
    $args = array(
        'post_type' => 'page',
        'posts_per_page' => -1,
        'meta_key' => 'event_date',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'value' => date('Y-m-d'),
                'compare' => '>=',
                'type' => 'DATE'
            )
        )
    );
    $events = new WP_Query($args);
    wp_reset_query();
    return $events;
}

function get_past_events() {
    $args = array(
        'post_type' => 'page',
        'posts_per_page' => -1,
        'meta_key' => 'event_date',
        'orderby' => 'meta_value',
        'order' => 'DESC',
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'value' => date('Y-m-d'),
                'compare' => '<',
                'type' => 'DATE'
            )
        )
    );
    $events = new WP_Query($args);
    wp_reset_query();
    return $events;
}

function heartland_hits_original_date_posted_on() {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
    $date = get_the_date('F Y'); // Format: Month Year

    $time_string = sprintf($time_string,
        esc_attr(get_the_date('c')),
        esc_html($date)
    );

    printf('<p class="posted-on">%s</p>', $time_string);
}

//function heartland_hits_modified_date_posted_on() {
//    $time_string = '<time class="updated" datetime="%1$s">%2$s</time>';
//    $date = get_the_modified_date('F Y'); // Format: Month Year
//
//    $time_string = sprintf($time_string,
//        esc_attr(get_the_modified_date('c')),
//        esc_html($date)
//    );
//
//    printf('<p class="posted-on">%s</p>', $time_string);
//}

// Add to customiser to add links to the social media icons in footer
function register_social_media_settings( $wp_customize ) {
    $wp_customize->add_section( 'social_media_links', array(
        'title'    => __( 'Social Media Links', 'heartland-hits' ),
        'priority' => 90,
    ) );

    $social_media_icons = array(
        'facebook'  => 'Facebook',
        'twitter'   => 'Twitter',
        'youtube'   => 'YouTube',
        'instagram' => 'Instagram',
    );

    foreach ( $social_media_icons as $icon => $label ) {
        $wp_customize->add_setting( 'social_media_' . $icon . '_link', array(
            'sanitize_callback' => 'esc_url_raw',
        ) );

        $wp_customize->add_control( 'social_media_' . $icon . '_link', array(
            'label'    => __( $label . ' Link', 'heartland-hits' ),
            'section'  => 'social_media_links',
            'type'     => 'text',
            'priority' => 10,
        ) );
    }
}
add_action( 'customize_register', 'register_social_media_settings' );

function theme_customizer_register($wp_customize) {
    $wp_customize->add_section('button_settings', array(
        'title' => 'Button Settings',
        'priority' => 30,
    ));

    $wp_customize->add_setting('login_button_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('login_button_link', array(
        'label' => 'Login Button Link',
        'section' => 'button_settings',
        'type' => 'dropdown pages',
    ));

    $wp_customize->add_setting('signup_button_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('signup_button_link', array(
        'label' => 'Signup Button Link',
        'section' => 'button_settings',
        'type' => 'dropdown pages',
    ));
}
add_action('customize_register', 'theme_customizer_register');