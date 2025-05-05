<?php
/**
 * The template part for displaying no content
 *
 * @package Parachall
 */

?>

<section class="no-results not-found card">
    <div class="card-body text-center py-5">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e('Nothing Found', 'parachall'); ?></h1>
        </header>

        <div class="page-content">
            <?php if (is_home() && current_user_can('publish_posts')) : ?>
                <p class="lead">
                    <?php
                    printf(
                        esc_html__('Ready to publish your first post? %s.', 'parachall'),
                        '<a href="' . esc_url(admin_url('post-new.php')) . '">' . esc_html__('Get started here', 'parachall') . '</a>'
                    );
                    ?>
                </p>
            <?php elseif (is_search()) : ?>
                <div class="alert alert-warning">
                    <?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'parachall'); ?>
                </div>
                <?php get_search_form(); ?>
            <?php else : ?>
                <p class="lead"><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'parachall'); ?></p>
                <?php get_search_form(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>