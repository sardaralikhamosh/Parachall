<?php
/**
 * The template part for displaying single post content
 *
 * @package Parachall
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card mb-4'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <div class="card-img-top">
            <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
        </div>
    <?php endif; ?>
    
    <div class="card-body">
        <header class="entry-header">
            <h1 class="card-title entry-title"><?php the_title(); ?></h1>
            
            <div class="entry-meta text-muted small mb-3">
                <?php parachall_posted_on(); ?>
                <span class="sep mx-2">|</span>
                <?php parachall_posted_by(); ?>
                <span class="sep mx-2">|</span>
                <?php parachall_comments_link(); ?>
                <?php edit_post_link(
                    sprintf(
                        esc_html__('Edit %s', 'parachall'),
                        '<span class="screen-reader-text">' . get_the_title() . '</span>'
                    ),
                    '<span class="edit-link ms-2">',
                    '</span>'
                ); ?>
            </div>
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

        <footer class="entry-footer mt-4 pt-3 border-top">
            <?php
            // Categories, tags, etc.
            if ('post' === get_post_type()) {
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list(esc_html__(', ', 'parachall'));
                if ($categories_list) {
                    printf(
                        '<span class="cat-links d-block mb-2">' . esc_html__('Posted in %1$s', 'parachall') . '</span>',
                        $categories_list
                    );
                }

                /* translators: used between list items, there is a space after the comma */
                $tags_list = get_the_tag_list('', esc_html__(', ', 'parachall'));
                if ($tags_list) {
                    printf(
                        '<span class="tags-links d-block">' . esc_html__('Tagged %1$s', 'parachall') . '</span>',
                        $tags_list
                    );
                }
            }
            ?>
        </footer>
    </div>
</article>