<!DOCTYPE html>
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
    <header id="masthead" class="site-header bg-light">
        <nav class="navbar navbar-expand-lg navbar-light container">
            <div class="site-branding">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <h1><?php bloginfo('name'); ?></h1>
                    </a>
                <?php endif; ?>
            </div>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primary-navbar" aria-controls="primary-navbar" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'parachall'); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="primary-navbar">
                <?php
                wp_nav_menu(array(
                    'theme_location'  => 'primary',
                    'container'       => false,
                    'menu_class'      => 'navbar-nav ms-auto mb-2 mb-lg-0',
                    'fallback_cb'     => '__return_false',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 2,
                    'walker'          => new Bootstrap_5_Walker_Nav_Menu()
                ));
                
                // Add search form if needed
                if (get_theme_mod('display_header_search', true)) {
                    get_search_form();
                }
                ?>
            </div>
        </nav>
    </header>
    
    <div id="content" class="site-content container py-4">