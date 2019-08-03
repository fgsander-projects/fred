<?php
get_header();
$imic_options = get_option('imic_options');
imic_sidebar_position_module();
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
$pageSidebarGet = get_post_meta(get_the_ID(), 'imic_select_sidebar_from_list', true);
$pageSidebarStrictNo = get_post_meta(get_the_ID(), 'imic_strict_no_sidebar', true);
$pageSidebarOpt = (isset($imic_options['posts_sidebar'])) ? $imic_options['posts_sidebar'] : '';
if ($pageSidebarGet != '') {
    $pageSidebar = $pageSidebarGet;
} elseif ($pageSidebarOpt != '') {
    $pageSidebar = $pageSidebarOpt;
} else {
    $pageSidebar = '';
}
if ($pageSidebarStrictNo == 1) {
    $pageSidebar = '';
}
$sidebar_column = get_post_meta(get_the_ID(), 'imic_sidebar_columns_layout', true);
$post_author_id = get_post_field('post_author', get_the_ID());
if (!empty($pageSidebar) && is_active_sidebar($pageSidebar)) {
    $left_col = 12 - $sidebar_column;
    $class = $left_col;
} else {
    $class = 12;
}
$post_author_id = get_post_field('post_author', get_the_ID());
?>
<!-- Start Body Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <div class="col-md-<?php echo esc_attr($class); ?>" id="content-col">
                    <article class="single-post format-standard">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <div class="single-post-header clearfix">
                                    <h1><?php the_title(); ?></h1>
                                    <div class="meta-data alt">
                                        <div><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></div>
                                        <div><?php if (comments_open()) {
                                                    echo comments_popup_link('<i class="fa fa-comment"></i> ' . esc_html__('No comments yet', 'vestige'), '<i class="fa fa-comment"></i> 1', '<i class="fa fa-comment"></i> %', '', 'comments-link', esc_html__('Comments are off for this post', 'vestige'));
                                                } ?></div>
                                        <?php if (count(get_the_category())) : ?><div><i class="fa fa-archive"></i> <?php the_category(', '); ?></div><?php endif; ?>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <?php the_content();
                                    ?></div>
                                <?php if (has_tag()) {
                                    echo '<div class="post-meta">';
                                    echo '<i class="fa fa-tags"></i> ';
                                    the_tags('', ', ');
                                    echo '</div>';
                                } ?>
                                <!-- About Author -->
                                <?php $post_author_id = get_post_field('post_author', get_the_ID());
                                if (get_the_author_meta('description', $post_author_id) != '') {
                                    ?>
                                    <section class="about-author">
                                        <?php echo get_avatar($post_author_id, 'imic_100x100', 'mm', 'Author', array('class' => 'img-thumbnail')); ?>
                                        <div class="post-author-content">
                                            <h3><?php echo esc_attr(get_the_author_meta('display_name', $post_author_id)); ?> <span class="label label-success"><?php echo esc_attr_e('Author', 'vestige'); ?></span></h3>
                                            <?php echo get_the_author_meta('description', $post_author_id); ?>
                                        </div>
                                    </section>
                                <?php } ?>
                                <!-- Pagination -->
                                <ul class="pager">
                                    <li class="pull-left"><?php echo previous_post_link('%link', esc_html__('&larr; Prev Post', 'vestige')); ?></li>
                                    <li class="pull-right"><?php echo next_post_link('%link', esc_html__('Next Post &rarr;', 'vestige')); ?></a></li>
                                </ul>
                            <?php
                        endwhile;
                    endif; ?>
                        <?php if (isset($imic_options['switch_sharing']) && $imic_options['switch_sharing'] == 1 && $imic_options['share_post_types']['1'] == '1') { ?>
                            <?php imic_share_buttons(); ?>
                        <?php } ?>
                    </article>
                    <!-- Post Comments -->
                    <?php if (comments_open()) {
                        comments_template('', true);
                    } ?>
                </div>
                <?php if (!empty($pageSidebar) && is_active_sidebar($pageSidebar)) { ?>
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