<?php
/**
 * Parachall Theme Functions
 * 
 * @package Parachall
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme setup
 */
function parachall_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails
    add_theme_support('post-thumbnails');
    
    // Add custom image sizes
    add_image_size('parachall-featured', 1200, 800, true);
    add_image_size('parachall-thumbnail', 400, 400, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'parachall'),
        'footer'  => __('Footer Menu', 'parachall')
    ));
    
    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');
    
    // Add support for core custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    
    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');
}
add_action('after_setup_theme', 'parachall_theme_setup');

/**
 * Enqueue scripts and styles
 */
function parachall_enqueue_assets() {
    // Bootstrap CSS
    wp_enqueue_style(
        'bootstrap-css',
        get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css',
        array(),
        '5.3.0'
    );
    
    // Bootstrap JS Bundle (includes Popper)
    wp_enqueue_script(
        'bootstrap-js',
        get_template_directory_uri() . '/bootstrap/js/bootstrap.bundle.min.js',
        array('jquery'),
        '5.3.0',
        true
    );
    
    // Theme main stylesheet
    wp_enqueue_style(
        'parachall-style',
        get_stylesheet_uri(),
        array('bootstrap-css'),
        wp_get_theme()->get('Version')
    );
    
    // Theme main JavaScript
    wp_enqueue_script(
        'parachall-script',
        get_template_directory_uri() . '/js/main.js',
        array('jquery', 'bootstrap-js'),
        wp_get_theme()->get('Version'),
        true
    );
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'parachall_enqueue_assets');

/**
 * Customizer settings
 */
function parachall_customize_register($wp_customize) {
    // Theme Options Section
    $wp_customize->add_section('parachall_theme_options', array(
        'title'    => __('Theme Options', 'parachall'),
        'priority' => 120,
    ));
    
    // Copyright Text Setting
    $wp_customize->add_setting('parachall_copyright_text', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ));
    
    $wp_customize->add_control('parachall_copyright_text', array(
        'label'    => __('Copyright Text', 'parachall'),
        'section'  => 'parachall_theme_options',
        'type'     => 'text',
    ));
    
    // Add more customizer settings as needed
}
add_action('customize_register', 'parachall_customize_register');

/**
 * Post meta helper functions
 */

// Posted on
function parachall_posted_on() {
    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
    
    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date())
    );
    
    echo '<span class="posted-on">' . $time_string . '</span>';
}

// Posted by
function parachall_posted_by() {
    echo '<span class="byline">' . esc_html__('by', 'parachall') . ' <span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span></span>';
}

// Comments link
function parachall_comments_link() {
    if (!post_password_required() && (comments_open() || get_comments_number())) {
        echo '<span class="comments-link">';
        comments_popup_link(
            esc_html__('Leave a comment', 'parachall'),
            esc_html__('1 Comment', 'parachall'),
            esc_html__('% Comments', 'parachall'),
            '',
            esc_html__('Comments closed', 'parachall')
        );
        echo '</span>';
    }
}

/**
 * Bootstrap 5 Nav Walker
 */
class Bootstrap_5_Walker_Nav_Menu extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
        $classes[] = 'nav-item';
        $classes[] = 'nav-item-' . $item->ID;
        if ($depth && $args->walker->has_children) {
            $classes[] = 'dropdown-menu dropdown-menu-end';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args);
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

        $attributes = ! empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= ! empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= ! empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= ! empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        $attributes .= ($args->walker->has_children) ? ' class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"' : ' class="nav-link"';

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

/**
 * Register widget areas
 */
function parachall_widgets_init() {
    // Main Sidebar
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'parachall'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here to appear in your sidebar.', 'parachall'),
        'before_widget' => '<section id="%1$s" class="card widget %2$s mb-4">',
        'after_widget'  => '</section>',
        'before_title'  => '<div class="card-header"><h2 class="widget-title h5">',
        'after_title'   => '</h2></div><div class="card-body">',
    ));
    
    // Footer Widget Area 1
    register_sidebar(array(
        'name'          => esc_html__('Footer Widget Area 1', 'parachall'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Add widgets here to appear in your footer.', 'parachall'),
        'before_widget' => '<section id="%1$s" class="widget %2$s mb-4">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title h5">',
        'after_title'   => '</h3>',
    ));
    
    // Add more widget areas as needed
}
add_action('widgets_init', 'parachall_widgets_init');

/**
 * Implement the Custom Header feature (optional)
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress
 */
require get_template_directory() . '/inc/template-functions.php';