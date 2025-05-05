<?php
/**
 * Template functions used throughout the theme
 *
 * @package Parachall
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Adds custom classes to the array of body classes.
 */
function parachall_body_classes($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    // Add class if the front page is the blog index
    if (is_front_page() && is_home()) {
        $classes[] = 'front-page-blog';
    }

    return $classes;
}
add_filter('body_class', 'parachall_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function parachall_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'parachall_pingback_header');

/**
 * Display the breadcrumbs with Bootstrap classes
 */
function parachall_breadcrumbs() {
    if (!is_front_page()) {
        echo '<nav aria-label="breadcrumb" class="breadcrumb-wrapper mb-4">';
        echo '<ol class="breadcrumb">';
        echo '<li class="breadcrumb-item"><a href="' . esc_url(home_url()) . '">' . esc_html__('Home', 'parachall') . '</a></li>';
        
        if (is_category() || is_single()) {
            $categories = get_the_category();
            if ($categories) {
                foreach ($categories as $category) {
                    echo '<li class="breadcrumb-item"><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
                }
            }
            
            if (is_single()) {
                echo '<li class="breadcrumb-item active" aria-current="page">' . esc_html(get_the_title()) . '</li>';
            }
        } elseif (is_page()) {
            echo '<li class="breadcrumb-item active" aria-current="page">' . esc_html(get_the_title()) . '</li>';
        } elseif (is_search()) {
            echo '<li class="breadcrumb-item active" aria-current="page">' . esc_html__('Search Results', 'parachall') . '</li>';
        }
        
        echo '</ol>';
        echo '</nav>';
    }
}

/**
 * Customize the excerpt more text
 */
function parachall_excerpt_more($more) {
    return '... <a class="read-more" href="' . esc_url(get_permalink(get_the_ID())) . '">' . esc_html__('Read More', 'parachall') . '</a>';
}
add_filter('excerpt_more', 'parachall_excerpt_more');

/**
 * Customize the excerpt length
 */
function parachall_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'parachall_excerpt_length');

/**
 * Display the pagination with Bootstrap classes
 */
function parachall_pagination() {
    global $wp_query;
    
    $big = 999999999; // need an unlikely integer
    
    echo paginate_links(array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'prev_text' => __('&laquo; Previous', 'parachall'),
        'next_text' => __('Next &raquo;', 'parachall'),
        'type'      => 'list',
        'before_page_number' => '<span class="page-link">',
        'after_page_number'  => '</span>'
    ));
}

/**
 * Get the copyright text from customizer
 */
function parachall_copyright_text() {
    $copyright = get_theme_mod('parachall_copyright_text', '');
    if ($copyright) {
        echo '<div class="copyright-text">' . wp_kses_post($copyright) . '</div>';
    }
}