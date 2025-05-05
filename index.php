<?php
/**
 * The main template file with Bootstrap 5 integration
 *
 * @package Parachall
 */

get_header(); ?>

<div class="container mt-4">
    <div class="row">
        <main id="primary" class="col-lg-8">
            <?php if (have_posts()) : ?>
                <header class="page-header mb-4">
                    <?php if (is_home() && ! is_front_page()) : ?>
                        <h1 class="page-title h2"><?php single_post_title(); ?></h1>
                    <?php elseif (is_search()) : ?>
                        <h1 class="page-title h2">
                            <?php
                            printf(
                                /* translators: %s: search query. */
                                esc_html__('Search Results for: %s', 'parachall'),
                                '<span class="text-primary">' . get_search_query() . '</span>'
                            );
                            ?>
                        </h1>
                    <?php else : ?>
                        <h1 class="page-title h2"><?php esc_html_e('Latest Posts', 'parachall'); ?></h1>
                    <?php endif; ?>
                </header>

                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php
                    /* Start the Loop */
                    while (have_posts()) :
                        the_post();
                        ?>
                        <div class="col">
                            <?php get_template_part('template-parts/content', get_post_type()); ?>
                        </div>
                    <?php endwhile; ?>
                </div>

                <div class="mt-5">
                    <?php
                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => sprintf(
                            '<span class="me-2">&larr;</span> %s',
                            esc_html__('Previous', 'parachall')
                        ),
                        'next_text' => sprintf(
                            '%s <span class="ms-2">&rarr;</span>',
                            esc_html__('Next', 'parachall')
                        ),
                        'class'     => 'pagination justify-content-center',
                        'before_page_number' => '<span class="page-link">',
                        'after_page_number'  => '</span>',
                    ));
                    ?>
                </div>

            <?php else : ?>
                <div class="alert alert-info">
                    <?php get_template_part('template-parts/content', 'none'); ?>
                </div>
            <?php endif; ?>
        </main>

        <aside class="col-lg-4">
            <div class="sidebar-wrapper sticky-top pt-3">
                <?php get_sidebar(); ?>
            </div>
        </aside>
    </div>
</div>

<?php
get_footer();