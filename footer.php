        </div><!-- #content -->
        
        <footer id="colophon" class="site-footer bg-dark text-light py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <?php if (has_custom_logo()) : ?>
                            <div class="footer-logo mb-3">
                                <?php the_custom_logo(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="site-info">
                            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
                            <p class="text-muted small">
                                <?php printf(esc_html__('Theme: %1$s by %2$s.', 'parachall'), 'Parachall', '<a href="https://github.com/sardaralikhamosh">Sardar Ali Khamosh</a>'); ?>
                            </p>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <?php if (has_nav_menu('footer')) : ?>
                            <h3 class="h5 mb-3"><?php esc_html_e('Quick Links', 'parachall'); ?></h3>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'menu_class' => 'list-unstyled',
                                'depth' => 1,
                                'container' => false
                            ));
                            ?>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-md-4">
                        <?php if (is_active_sidebar('footer-widgets')) : ?>
                            <?php dynamic_sidebar('footer-widgets'); ?>
                        <?php else : ?>
                            <h3 class="h5 mb-3"><?php esc_html_e('Subscribe', 'parachall'); ?></h3>
                            <p><?php esc_html_e('Stay updated with our latest news and offers.', 'parachall'); ?></p>
                            <?php get_search_form(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </footer>
        
        <?php wp_footer(); ?>
    </body>
</html>