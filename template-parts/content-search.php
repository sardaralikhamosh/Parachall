<?php
/**
 * The template part for displaying search results
 *
 * @package Parachall
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card mb-4'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" class="card-img-top">
            <?php the_post_thumbnail('medium', ['class' => 'img-fluid']); ?>
        </a>
    <?php endif; ?>
    
    <div class="card-body">
        <header class="entry-header">
            <h2 class="card-title entry-title h5">
                <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
            </h2>
            
            <?php if ('post' === get_post_type()) : ?>
                <div class="entry-meta text-muted small mb-2">
                    <?php parachall_posted_on(); ?>
                </div>
            <?php endif; ?>
        </header>

        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div>

        <footer class="entry-footer mt-3">
            <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary">
                <?php esc_html_e('Read More', 'parachall'); ?>
                <span class="screen-reader-text"><?php the_title(); ?></span>
            </a>
        </footer>
    </div>
</article>