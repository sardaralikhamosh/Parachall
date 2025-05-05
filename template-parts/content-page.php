<?php
/**
 * The template part for displaying page content
 *
 * @package Parachall
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="card-img-top">
            <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
        </div>
    <?php endif; ?>
    
    <div class="card-body">
        <header class="entry-header">
            <h1 class="card-title entry-title"><?php the_title(); ?></h1>
        </header>

        <div class="entry-content">
            <?php
            the_content();
            
            wp_link_pages([
                'before' => '<div class="page-links mt-4"><span class="page-links-title">' . esc_html__('Pages:', 'parachall') . '</span>',
                'after'  => '</div>',
                'link_before' => '<span class="page-link">',
                'link_after'  => '</span>',
            ]);
            ?>
        </div>

        <footer class="entry-footer mt-4">
            <?php
            edit_post_link(
                sprintf(
                    esc_html__('Edit %s', 'parachall'),
                    '<span class="screen-reader-text">' . get_the_title() . '</span>'
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer>
    </div>
</article>