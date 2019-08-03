<?php
get_header();
$imic_options = get_option('imic_options');
imic_sidebar_position_module();
//Template Banner Functionality
$id = get_option('page_for_posts');
if ($id == 0) {
    $pageSidebar = 'post-sidebar';
    $sidebar_column = '4';
} else {
    $pageSidebar = get_post_meta($id, 'imic_select_sidebar_from_list', true);
    $sidebar_column = get_post_meta($id, 'imic_sidebar_columns_layout', true);
}
$page_header = get_post_meta($id, 'imic_pages_Choose_slider_display', true);
if ($page_header == 3) {
    get_template_part('pages', 'flex');
} elseif ($page_header == 4) {
    get_template_part('pages', 'nivo');
} elseif ($page_header == 5) {
    get_template_part('pages', 'revolution');
} elseif ($page_header == 6) {
    get_template_part('pages', 'layer');
} else {
    get_template_part('pages', 'banner');
}
if (!empty($pageSidebar) && is_active_sidebar($pageSidebar)) {
    $left_col = 12 - $sidebar_column;
    $class = $left_col;
} else {
    $class = 12;
}
?>
<!-- Start Body Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <div class="col-md-<?php echo esc_attr($class); ?>" id="content-col">
                    <?php if (have_posts()) : ?>
                        <div class="posts-listing">
                            <?php while (have_posts()) : the_post();
                                $title = get_the_title();
                                ?>
                                <!-- List Item -->
                                <div <?php post_class('list-item blog-list-item format-standard'); ?>>
                                    <div class="row">
                                        <?php if (has_post_thumbnail()) { ?>
                                            <div class="col-md-4 col-sm-4">
                                                <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>"><?php the_post_thumbnail('imic_600x400', array('class' => 'img-thumbnail')); ?></a>
                                            </div>
                                        <?php } ?>
                                        <?php if (has_post_thumbnail()) { ?><div class="col-md-8"><?php } else { ?><div class="col-md-12"><?php } ?>
                                                <h3><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>"><?php echo esc_attr($title); ?></a></h3>
                                                <div class="meta-data alt">
                                                    <div><i class="fa fa-clock-o"></i> <?php echo esc_html(get_the_date()); ?></div>
                                                    <?php if (count(get_the_category())) : ?><div><i class="fa fa-archive"></i> <?php the_category(', '); ?></div><?php endif; ?>
                                                </div>
                                                <?php
                                                echo '<div class="list-item-excerpt">';
                                                echo imic_excerpt(50);
                                                echo '</div>';
                                                ?>
                                                <div class="post-actions">
                                                    <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="btn btn-primary"><?php esc_html_e('Continue reading', 'vestige'); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                                <?php wp_link_pages(array(
                                    'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__('Pages:', 'vestige') . '</span>',
                                    'after'       => '</div>',
                                    'link_before' => '<span>',
                                    'link_after'  => '</span>',
                                )); ?>
                            </div>
                            <!-- Pagination -->
                            <?php if (function_exists('imic_pagination')) {
                                imic_pagination();
                            } else {
                                next_posts_link('Older Entries');
                                previous_posts_link('Newer Entries');
                            } ?>

                        <?php endif; ?>
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
    <!-- End Body Content -->
    <?php get_footer(); ?>