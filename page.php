<?php
/**
 * Page template with Bootstrap
 * @package Parachall
 */

get_header(); ?>

<div class="container mt-5">
    <div class="row">
        <main class="col-md-8 mx-auto"> <!-- Centered content for pages -->
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="card-img-top">
                            <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="card-body">
                        <header class="entry-header">
                            <h1 class="card-title"><?php the_title(); ?></h1>
                        </header>

                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>

                        <?php
                        // Page links for paginated posts
                        wp_link_pages(array(
                            'before' => '<div class="page-links mt-4"><span class="page-links-title">' . esc_html__('Pages:', 'parachall') . '</span>',
                            'after'  => '</div>',
                            'link_before' => '<span class="page-link">',
                            'link_after'  => '</span>',
                        ));
                        ?>
                    </div>
                </article>

                <?php if (comments_open() || get_comments_number()) : ?>
                    <div class="comments-section card mt-4">
                        <div class="card-body">
                            <?php comments_template(); ?>
                        </div>
                    </div>
                <?php endif; ?>

            <?php endwhile; ?>
        </main>
    </div>
</div>

<?php get_footer(); ?>