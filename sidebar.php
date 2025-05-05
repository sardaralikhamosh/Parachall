<aside id="secondary" class="widget-area">
    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <?php dynamic_sidebar('sidebar-1'); ?>
    <?php else : ?>
        <div class="card widget widget_search mb-4">
            <div class="card-body">
                <h2 class="widget-title h5"><?php esc_html_e('Search', 'parachall'); ?></h2>
                <?php get_search_form(); ?>
            </div>
        </div>
        
        <div class="card widget widget_recent_entries mb-4">
            <div class="card-body">
                <h2 class="widget-title h5"><?php esc_html_e('Recent Posts', 'parachall'); ?></h2>
                <ul class="list-unstyled">
                    <?php
                    wp_get_archives(array(
                        'type' => 'postbypost',
                        'limit' => 5,
                        'format' => 'html',
                        'before' => '<li class="mb-2">',
                        'after' => '</li>'
                    ));
                    ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</aside>