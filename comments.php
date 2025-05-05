<?php
/**
 * Comments template with Bootstrap
 * @package Parachall
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area my-5">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title mb-4">
            <?php
            $comment_count = get_comments_number();
            if ('1' === $comment_count) {
                printf(
                    esc_html__('One Comment', 'parachall'),
                    '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf(
                    esc_html(_nx('%1$s Comment', '%1$s Comments', $comment_count, 'comments title', 'parachall')),
                    number_format_i18n($comment_count),
                    '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
        </h2>

        <ol class="comment-list list-unstyled">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 60,
                'callback'    => 'parachall_bootstrap_comment',
            ));
            ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="comment-navigation" aria-label="<?php esc_attr_e('Comments Navigation', 'parachall'); ?>">
                <ul class="pagination">
                    <li class="page-item">
                        <?php previous_comments_link(esc_html__('&larr; Older Comments', 'parachall')); ?>
                    </li>
                    <li class="page-item">
                        <?php next_comments_link(esc_html__('Newer Comments &rarr;', 'parachall')); ?>
                    </li>
                </ul>
            </nav>
        <?php endif; ?>

    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <div class="alert alert-warning no-comments">
            <?php esc_html_e('Comments are closed.', 'parachall'); ?>
        </div>
    <?php endif; ?>

    <?php
    comment_form(array(
        'class_submit'  => 'btn btn-primary',
        'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title mt-4">',
        'title_reply_after'  => '</h3>',
        'comment_field' => '<div class="form-group mb-3">
            <label for="comment" class="form-label">' . esc_html__('Comment', 'parachall') . '</label>
            <textarea id="comment" name="comment" class="form-control" rows="5" required></textarea>
        </div>',
        'fields' => array(
            'author' => '<div class="form-group mb-3">
                <label for="author" class="form-label">' . esc_html__('Name', 'parachall') . '</label>
                <input id="author" name="author" type="text" class="form-control" required>
            </div>',
            'email'  => '<div class="form-group mb-3">
                <label for="email" class="form-label">' . esc_html__('Email', 'parachall') . '</label>
                <input id="email" name="email" type="email" class="form-control" required>
            </div>',
            'url'    => '<div class="form-group mb-3">
                <label for="url" class="form-label">' . esc_html__('Website', 'parachall') . '</label>
                <input id="url" name="url" type="url" class="form-control">
            </div>',
        ),
    ));
    ?>
</div>

<?php
// Custom comment callback function with Bootstrap styling
function parachall_bootstrap_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
    
    <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media mb-4'); ?>>
        <?php if ('0' != $comment->comment_approved) : ?>
            <div class="comment-avatar me-3">
                <?php echo get_avatar($comment, $args['avatar_size'], '', '', ['class' => 'rounded-circle']); ?>
            </div>
        <?php endif; ?>
        
        <div class="media-body">
            <div class="comment-meta">
                <h5 class="mt-0 mb-1">
                    <?php printf('%s', get_comment_author_link()); ?>
                </h5>
                <small class="text-muted">
                    <time datetime="<?php comment_time('c'); ?>">
                        <?php printf('%1$s at %2$s', get_comment_date(), get_comment_time()); ?>
                    </time>
                </small>
                <?php edit_comment_link(esc_html__('Edit', 'parachall'), '<small class="edit-link ms-2">', '</small>'); ?>
            </div>
            
            <div class="comment-content mt-2">
                <?php comment_text(); ?>
            </div>
            
            <div class="reply mt-2">
                <?php
                comment_reply_link(array_merge($args, [
                    'depth'     => $depth,
                    'max_depth' => $args['max_depth'],
                    'before'    => '<div class="reply-link">',
                    'after'     => '</div>',
                    'reply_text' => esc_html__('Reply', 'parachall'),
                    'class'     => 'btn btn-sm btn-outline-secondary'
                ]));
                ?>
            </div>
        </div>
    </li>
<?php }