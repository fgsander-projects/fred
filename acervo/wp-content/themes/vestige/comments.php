<?php
if (post_password_required()) {
    ?>
    <p class="nocomments"><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'vestige') ?></p>
    <?php
    return;
}
/* ----------------------------------------------------------------------------------- */
/* 	Display the comments + Pings
      /*----------------------------------------------------------------------------------- */
if (have_comments()) : // if there are comments 
    ?>
    <section class="post-comments">
        <div id="comments" class="clearfix">
            <h3 class="widgettitle"><?php comments_number(esc_html__('No Comments', 'vestige'), esc_html__('Comment(1)', 'vestige'), esc_html__('Comments(%)', 'vestige')); ?></h3>
            <ol class="comments">
                <?php wp_list_comments('avatar_size=51&callback=vestige_list_comment'); ?>
            </ol>
            <?php paginate_comments_links(); ?>
        </div>
    </section>
<?php endif; ?>
<?php
function vestige_list_comment($comment, $args, $depth)
{
    if ('div' === $args['style']) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    } ?>
    <<?php echo esc_attr($tag); ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?> id="comment-<?php comment_ID() ?>">
        <?php
        if ('div' != $args['style']) { ?>
            <div id="div-comment-<?php comment_ID() ?>" class="post-comment-block">
            <?php
        } ?>
            <div class="img-thumbnail">
                <?php
                if ($args['avatar_size'] != 0) {
                    echo get_avatar($comment, $args['avatar_size']);
                }
                ?>
            </div>
            <?php
            $myclass = 'icon-share-alt';
            echo preg_replace(
                '/comment-reply-link/',
                'comment-reply-link btn btn-primary btn-xs pull-right ' . $myclass,
                get_comment_reply_link(array_merge($args, array(
                    'add_below' => $add_below,
                    'depth' => $depth,
                    'max_depth' => $args['max_depth']
                ))),
                1
            );

            /*comment_reply_link(
                array_merge(
                    $args,
                    array(
                        'add_below' => $add_below,
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth']
                    )
                )
            );*/ ?>
            <?php
            printf(__('<h5>%s says:</h5>', 'vestige'), get_comment_author_link());
            if ($comment->comment_approved == '0') { ?>
                <em class="comment-awaiting-moderation">
                    <?php _e('Your comment is awaiting moderation.', 'vestige'); ?></em><br />
            <?php
        } ?>
            <span class="meta-data">
                <?php
                /* translators: 1: date, 2: time */
                printf(
                    __('%1$s at %2$s', 'vestige'),
                    get_comment_date(),
                    get_comment_time()
                ); ?>
                <?php

                ?>
            </span>

            <?php comment_text(); ?>


            <?php
            if ('div' != $args['style']) : ?>
            </div>
        <?php
    endif;
}
/* ----------------------------------------------------------------------------------- */
/* 	Comment Form
  /*----------------------------------------------------------------------------------- */
function vestige_comment_form_before()
{
    echo '<div id="respond-wrap" class="clearfix">
           <section class="post-comment-form">
            <div class="clearfix">';
}
add_action('comment_form_before', 'vestige_comment_form_before');

function vestige_comment_form_after()
{
    echo '</div></section></div>';
}
add_action('comment_form_after', 'vestige_comment_form_after');
function vestige_move_comment_fields($fields)
{
    $comment_field = $fields['comment'];
    unset($fields['comment']);
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter('comment_form_fields', 'vestige_move_comment_fields');
add_filter('comment_form_defaults', 'vestige_comment_form');
function vestige_comment_form($form_options)
{
    $commenter = wp_get_current_commenter();
    $req = get_option('require_name_email');
    $aria_req = ($req ? " aria-required='true'" : '');
    // Fields Array
    $fields = array(
        'author' => '<div class="row">
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-4">
                                        <input type="text" class="form-control input-lg" name="author" id="author" value="" size="22" tabindex="1" placeholder="' . esc_html__('Your name', 'vestige') . '">
                                    </div>',
        'email' => '<div class="col-md-4 col-sm-4">
                                        <input type="email" class="form-control input-lg" name="email" id="email" value="" size="22" tabindex="2" placeholder="' . esc_html__('Your email', 'vestige') . '">
                                    </div>',
        'url' => '<div class="col-md-4 col-sm-4">
                                        <input type="url" class="form-control input-lg" name="url" id="url" value="" size="22" tabindex="3" placeholder="' . esc_html__('Website (optional)', 'vestige') . '"></div>
                                </div>
                            </div>',
    );
    // Form Options Array
    $form_options = array(
        // Include Fields Array
        'fields' => apply_filters('comment_form_default_fields', $fields),
        // Template Options
        'comment_field' =>
        '<div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <textarea name="comment" class="form-control input-lg" id="comment-textarea" cols="8" rows="4"  tabindex="4" placeholder="' . esc_html__('Your comment', 'vestige') . '" ></textarea>
                                </div>
                            </div>
                        </div>',
        'must_log_in' => '',
        'logged_in_as' =>
        '',
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        'submit_field' => '<div class="row"><div class="form-group"><div class="col-md-12">%1$s %2$s</div></div></div>',
        'class_submit' => 'btn btn-primary btn-lg',
        // Rest of Options
        'id_form' => 'form-comment',
        'id_submit' => 'comment-submit',
        'title_reply' => '
                <h3>' . esc_html__('Post a comment', 'vestige'),
        'title_reply_after' => '</h3>',
        'title_reply_to' => esc_html__('Leave a Reply to %s', 'vestige'),
        'cancel_reply_link' => esc_html__('Cancel reply', 'vestige'),
        'label_submit' => esc_html__('Submit your comment', 'vestige'),
    );
    return $form_options;
}
comment_form();
