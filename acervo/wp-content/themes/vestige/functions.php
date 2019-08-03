<?php
/* -----------------------------------------------------------------------------------
  Here we have all the custom functions for the theme
  Please be extremely cautious editing this file,
  When things go wrong, they tend to go wrong in a big way.
  You have been warned!
  ----------------------------------------------------------------------------------- */
/*
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link http://codex.wordpress.org/Theme_Development
 * @link http://codex.wordpress.org/Child_Themes
  ----------------------------------------------------------------------------------- */
$imic_options = get_option('imic_options');
define('IMIC_THEME_PATH', get_template_directory_uri());
define('IMIC_FILEPATH', get_template_directory());
$theme_info = wp_get_theme();
define('VESTIGE_THEME_VERSION', (WP_DEBUG) ? time() : $theme_info->get('Version'));
define('VESTIGE_INC_PATH', get_template_directory() . '/framework');



//Remove slider revolution Admin Notice
add_action('admin_init', 'vestige_remove_revslider_notice');
function vestige_remove_revslider_notice()
{
    update_option('revslider-valid-notice', false);
    update_option('revslider-valid', true);
}

/* THEME OPTIONS
================================================== */
require_once VESTIGE_INC_PATH . '/barebones-config.php';
include_once(VESTIGE_INC_PATH . '/includes.php');
/* -------------------------------------------------------------------------------------
  Load Translation Text Domain
  ----------------------------------------------------------------------------------- */
add_action('after_setup_theme', 'imic_theme_setup');
function imic_theme_setup()
{
    load_theme_textdomain('vestige', IMIC_FILEPATH . '/language');
}
/* -------------------------------------------------------------------------------------
  Menu option
  ----------------------------------------------------------------------------------- */
function imic_register_menu()
{
    register_nav_menu('primary-menu', esc_html__('Primary Menu', 'vestige'));
}
add_action('init', 'imic_register_menu');
/* -------------------------------------------------------------------------------------
  Set Max Content Width (use in conjuction with ".entry-content img" css)
  ----------------------------------------------------------------------------------- */
if (!isset($content_width))
    $content_width = 680;
/* -------------------------------------------------------------------------------------
  Configure WP2.9+ Thumbnails & gets the current post type in the WordPress Admin
  ----------------------------------------------------------------------------------- */
if (!function_exists('imic_vestige_feat_supports')) {
    function imic_vestige_feat_supports()
    {
        if (function_exists('add_theme_support')) {
            add_theme_support('post-formats', array(
                'video', 'image', 'gallery', 'link'
            ));
            add_theme_support('post-thumbnails');
            add_theme_support('automatic-feed-links');
            // Enable title tag
            add_theme_support('title-tag');
            set_post_thumbnail_size(958, 9999);
            //Mandatory
            add_image_size('imic_100x100', '100', '100', true);
            add_image_size('imic_600x400', '600', '400', true);
            add_image_size('imic_1000x800', '1000', '800', true);
            add_image_size('imic_210x210', '210', '210', true);
            add_theme_support('woocommerce');
            add_theme_support('wc-product-gallery-zoom');
            add_theme_support('wc-product-gallery-lightbox');
            add_theme_support('wc-product-gallery-slider');
        }
    }
    add_action('after_setup_theme', 'imic_vestige_feat_supports');
}
/* -------------------------------------------------------------------------------------
  Custom Gravatar Support
  ----------------------------------------------------------------------------------- */
if (!function_exists('imic_custom_gravatar')) {
    function imic_custom_gravatar($avatar_defaults)
    {
        $imic_avatar = get_template_directory_uri() . '/assets/images/img_avatar.png';
        $avatar_defaults[$imic_avatar] = 'Custom Gravatar (/assets/images/img_avatar.png)';
        return $avatar_defaults;
    }
    add_filter('avatar_defaults', 'imic_custom_gravatar');
}
/* -------------------------------------------------------------------------------------
  For Paginate
  ----------------------------------------------------------------------------------- */
if (!function_exists('imic_pagination')) {
    function imic_pagination($pages = '', $range = 4, $paged = '')
    {
        $showitems = ($range * 2) + 1;
        if ($paged == '') {
            global $paged;
        }
        if (empty($paged))
            $paged = 1;
        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }
        if (1 != $pages) {
            echo '<ul class="pagination">';
            echo '<li><a href="' . get_pagenum_link(1) . '" title="' . esc_html__('First', 'vestige') . '"><i class="fa fa-chevron-left"></i></a></li>';
            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 3 || $i <= $paged - $range - 3) || $pages <= $showitems)) {
                    echo ($paged == $i) ? "<li class=\"active\"><span>" . $i . "</span></li>" : "<li><a href='" . get_pagenum_link($i) . "' class=\"\">" . $i . "</a></li>";
                }
            }
            echo '<li><a href="' . get_pagenum_link($pages) . '" title="' . esc_html__('Last', 'vestige') . '"><i class="fa fa-chevron-right"></i></a></li>';
            echo '</ul>';
        }
    }
}

if (!function_exists('imic_pagination_event')) {
    function imic_pagination_event($pages = '', $range = 4, $paged = '', $link = '')
    {
        $showitems = ($range * 2) + 1;
        if ($paged == '') {
            global $paged;
        }
        if (empty($paged))
            $paged = 1;
        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }
        if (1 != $pages) {
            echo '<ul class="pagination">';
            echo '<li><a href="' . add_query_arg('page', 1, $link) . '" title="' . esc_html__('First', 'vestige') . '"><i class="fa fa-chevron-left"></i></a></li>';
            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 3 || $i <= $paged - $range - 3) || $pages <= $showitems)) {
                    echo ($paged == $i) ? "<li class=\"active\"><span>" . $i . "</span></li>" : "<li><a href='" . add_query_arg('page', $i, $link) . "' class=\"\">" . $i . "</a></li>";
                }
            }
            echo '<li><a href="' . add_query_arg('page', $i, $link) . '" title="' . esc_html__('Last', 'vestige') . '"><i class="fa fa-chevron-right"></i></a></li>';
            echo '</ul>';
        }
    }
}
/* -------------------------------------------------------------------------------------
  For Remove Dimensions from thumbnail image
  ----------------------------------------------------------------------------------- */
add_filter('post_thumbnail_html', 'imic_remove_thumbnail_dimensions', 10);
add_filter('image_send_to_editor', 'imic_remove_thumbnail_dimensions', 10);
function imic_remove_thumbnail_dimensions($html)
{
    if (!strpos($html, 'attachment-shop_single')) {
        $html = preg_replace('/(width|height)=\"\d*\"\s/', '', $html);
    }
    return $html;
}
/* -------------------------------------------------------------------------------------
  Excerpt More and  length
  ----------------------------------------------------------------------------------- */
if (!function_exists('imic_custom_read_more')) {
    function imic_custom_read_more()
    {
        return '';
    }
}
if (!function_exists('imic_excerpt')) {
    function imic_excerpt($limit = 50)
    {
        return '<p>' . wp_trim_words(get_the_excerpt(), $limit, imic_custom_read_more()) . '</p>';
    }
}
/* 	Comment Styling
  /*----------------------------------------------------------------------------------- */
if (!function_exists('imic_comment')) {
    function imic_comment($comment, $args, $depth)
    {
        $isByAuthor = false;
        if ($comment->comment_author_email == get_the_author_meta('email')) {
            $isByAuthor = true;
        }
        $GLOBALS['comment'] = $comment;
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div class="post-comment-block">
                <div id="comment-<?php comment_ID(); ?>">
                    <div class="img-thumbnail"><?php echo get_avatar($comment, $size = '80'); ?></div>
                    <?php
                    echo preg_replace('/comment-reply-link/', 'comment-reply-link pull-right btn btn-default btn-xs', get_comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => 'REPLY'))), 1);
                    echo '<h5>' . get_comment_author() . esc_html__(' says', 'vestige') . '</h5>';
                    ?>
                    <span class="meta-data">
                        <?php
                        echo get_comment_date();
                        esc_html_e(' at ', 'vestige');
                        echo get_comment_time();
                        ?>
                    </span>
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em class="moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'vestige') ?></em>
                        <br />
                    <?php endif; ?>
                    <div class="comment-text">
                        <?php comment_text() ?>
                    </div>
                </div>
            </div>
        <?php
    }
}


function add_form_fields_venue($term, $taxonomy)
{
    ?>
        <table class="form-table">
            <tbody>
                <tr valign="top" class="form-field">
                    <th scope="row">
                        <label>Description</label>
                    </th>
                    <td>
                        <?php wp_editor(html_entity_decode($term->description), 'description', array('media_buttons' => true)); ?>
                        <script>
                            jQuery(window).ready(function() {
                                jQuery('label[for=description]').parent().parent().remove();
                            });
                        </script>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php
}

function add_form_fields_artist($term, $taxonomy)
{
    ?>
        <table class="form-table">
            <tbody>
                <tr valign="top" class="form-field">
                    <th scope="row">
                        <label>Description</label>
                    </th>
                    <td>
                        <?php wp_editor(html_entity_decode($term->description), 'description', array('media_buttons' => true)); ?>
                        <script>
                            jQuery(window).ready(function() {
                                jQuery('label[for=description]').parent().parent().remove();
                            });
                        </script>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php
}



// Ajaxify header cart module
add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
    ob_start();
    ?>
        <span class="cart-contents">
            <?php echo WC()->cart->get_cart_contents_count(); ?>
        </span>
        <?php $fragments['span.cart-contents'] = ob_get_clean();
        return $fragments;
    });

    add_filter('woocommerce_add_to_cart_fragments', function ($fragments) {
        ob_start();
        ?>
        <div class="header-quickcart">
            <?php woocommerce_mini_cart(); ?>
        </div>
        <?php $fragments['div.header-quickcart'] = ob_get_clean();
        return $fragments;
    });
    ?>