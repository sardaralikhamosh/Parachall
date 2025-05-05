<?php
/**
 * Archive template with Bootstrap
 * @package Parachall
 */

get_header(); ?>

<div class="container mt-5">
    <div class="row">
        <main class="col-md-8">
            <header class="page-header mb-4">
                <?php
                the_archive_title('<h1 class="page-title">', '</h1>');
                the_archive_description('<div class="archive-description lead">', '</div>');
                ?>
            </header>

            <?php if (have_posts()) : ?>
                <div class="row">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-md-6 mb-4">
                            <article id="post-<?php the_ID(); ?>" <?php post_class('card h-100'); ?>>
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', ['class' => 'card-img-top']); ?>
                                    </a>
                                <?php endif; ?>
                                
                                <div class="card-body">
                                    <h2 class="card-title h5">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <div class="entry-meta text-muted small mb-2">
                                        <?php parachall_posted_on(); ?>
                                    </div>
                                    <div class="card-text">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary">
                                        <?php esc_html_e('Read More', 'parachall'); ?>
                                    </a>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                </div>

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
                <div class="alert alert-info">
                    <?php esc_html_e('No posts found in this archive.', 'parachall'); ?>
                </div>
            <?php endif; ?>
        </main>

        <aside class="col-md-4">
            <?php get_sidebar(); ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>