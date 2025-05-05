<?php
/**
 * Single post template with Bootstrap
 * @package Parachall
 */

get_header(); ?>

<div class="container mt-5">
    <div class="row">
        <main class="col-md-8">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('card mb-4'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="card-img-top">
                            <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="card-body">
                        <header class="entry-header">
                            <h1 class="card-title"><?php the_title(); ?></h1>
                            <div class="entry-meta text-muted mb-3">
                                <?php parachall_posted_on(); ?>
                                <?php parachall_posted_by(); ?>
                            </div>
                        </header>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                        <footer class="entry-footer mt-4">
                            <?php parachall_entry_footer(); ?>
                        </footer>
                    </div>
                </article>

                <nav class="post-navigation mb-5">
                    <div class="d-flex justify-content-between">
                        <div class="pe-3"><?php previous_post_link('%link', '&larr; %title'); ?></div>
                        <div class="ps-3"><?php next_post_link('%link', '%title &rarr;'); ?></div>
                    </div>
                </nav>

                <?php if (comments_open() || get_comments_number()) : ?>
                    <div class="comments-section card">
                        <div class="card-body">
                            <?php comments_template(); ?>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endwhile; ?>
        </main>

        <aside class="col-md-4">
            <?php get_sidebar(); ?>
        </aside>
    </div>
</div>

<?php get_footer(); ?>