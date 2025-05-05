<?php
/**
 * Search results template with Bootstrap
 * @package Parachall
 */

get_header(); ?>

<div class="container mt-5">
    <div class="row">
        <main class="col-md-8">
            <header class="page-header mb-4">
                <h1 class="page-title">
                    <?php
                    printf(
                        /* translators: %s: search query. */
                        esc_html__('Search Results for: %s', 'parachall'),
                        '<span class="text-primary">' . get_search_query() . '</span>'
                    );
                    ?>
                </h1>
            </header>

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('card mb-4'); ?>>
                        <div class="card-body">
                            <h2 class="card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="entry-meta text-muted small mb-2">
                                <?php parachall_posted_on(); ?>
                            </div>
                            <div class="card-text">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary mt-2">
                                <?php esc_html_e('Read More', 'parachall'); ?>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>

                <nav class="pagination-nav mt-4">
                    <?php
                    the_posts_pagination(array(
                        'mid_size'  => 2,
                        'prev_text' => __('&larr; Previous', 'parachall'),
                        'next_text' => __('Next &rarr;', 'parachall'),
                        'class'     => 'pagination justify-content-center',
                    ));
                    ?>
                </nav>

            <?php else : ?>
                <div class="alert alert-warning">
                    <?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'parachall'); ?>
                </div>
                <?php get_search_form(); ?>
            <?php endif; ?>
        </main>

        <aside class="col-md-4">
            <?php get_sidebar(); ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>