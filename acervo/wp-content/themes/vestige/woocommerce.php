<?php
get_header();
$imic_options = get_option('imic_options');
if (is_product_category()) {
    $pageSidebar = (isset($imic_options['shop_term_sidebar'])) ? $imic_options['shop_term_sidebar'] : '';
    if (!empty($pageSidebar) && is_active_sidebar($pageSidebar)) {
        $class = 9;
    } else {
        $class = 12;
    }
    $sidebar_column = 3;
    global $wp_query;
    $cat = $wp_query->get_queried_object();
    $thumbnail_id = get_woocommerce_term_meta($cat->term_id, 'thumbnail_id', true);
    $image = wp_get_attachment_url($thumbnail_id);
    $banner_image = (isset($imic_options['header_image'])) ? esc_url($imic_options['header_image']['url']) : '';
    $image = ($image) ? $image : $banner_image; ?>
    <div class="hero-area">
        <div class="page-header parallax clearfix" style="background-image:url(<?php echo esc_url($image); ?>)">
            <div>
                <div><span><?php echo esc_attr(single_term_title("", false)); ?></span></div>
            </div>
        </div>
    </div>
    <!-- End Page Header --><?php if (function_exists('bcn_display')) { ?>
        <!-- Breadcrumbs -->
        <div class="notice-bar">
            <div class="container">
                <ol class="breadcrumb">
                    <?php bcn_display(); ?>
                </ol>
            </div>
        </div>
    <?php }
} else {
    if (is_home()) {
        $id = get_option('page_for_posts');
    } else {
        $id = get_the_ID();
    }
    $page_header = get_post_meta($id, 'imic_pages_Choose_slider_display', true);
    if ($page_header == 3) {
        get_template_part('pages', 'flex');
    } elseif ($page_header == 4) {
        get_template_part('pages', 'nivo');
    } elseif ($page_header == 5) {
        get_template_part('pages', 'revolution');
    } else {
        get_template_part('pages', 'banner');
    }
    $pageSidebar = get_post_meta($id, 'imic_select_sidebar_from_list', true);
    $sidebar_column = get_post_meta($id, 'imic_sidebar_columns_layout', true);
    if (!empty($pageSidebar) && is_active_sidebar($pageSidebar)) {
        $left_col = 12 - $sidebar_column;
        $class = $left_col;
    } else {
        $class = 12;
    }
}
?>
<!-- Start Body Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <div class="col-md-<?php echo esc_attr($class); ?>" id="content-col">
                    <?php woocommerce_content();
                    imic_pagination(); ?>
                </div>
                <?php if (is_active_sidebar($pageSidebar)) { ?>
                    <!-- Sidebar -->
                    <div class="sidebar col-md-<?php echo esc_attr($sidebar_column); ?>" id="sidebar-col">
                        <?php dynamic_sidebar($pageSidebar); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>