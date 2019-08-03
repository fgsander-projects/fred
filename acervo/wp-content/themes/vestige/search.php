<?php get_header();
$imic_options = get_option('imic_options');
imic_sidebar_position_module();
$event_image = (isset($imic_options['header_image'])) ? $imic_options['header_image']['url'] : '';
$pageSidebar = (isset($imic_options['search_sidebar'])) ? $imic_options['search_sidebar'] : '';
if (!empty($pageSidebar) && is_active_sidebar($pageSidebar)) {
    $class = 8;
} else {
    $class = 12;
}
?>
<div class="page-header parallax clearfix" style="background-image:url(<?php echo esc_url($event_image); ?>);">
    <div class="title-subtitle-holder">
        <div class="title-subtitle-holder-inner">
            <h2><?php printf(esc_html__('Search Results for: %s', 'vestige'), get_search_query()); ?></h2>
        </div>
    </div>
</div>
<!-- End Page Header --><?php if (function_exists('bcn_display')) { ?>
    <!-- Breadcrumbs -->
    <div class="lgray-bg breadcrumb-cont">
        <div class="container">

            <ol class="breadcrumb">
                <?php bcn_display(); ?>
            </ol>

        </div>
    </div>
<?php } ?>
<!-- Start Body Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <div class="col-md-<?php echo esc_attr($class); ?>" id="content-col">
                    <div class="posts-listing">
                        <?php if (have_posts()) : while (have_posts()) : the_post();
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
                                <?php endwhile;
                        else : ?>
                                <!-- List Item -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3><?php esc_html_e('No Posts to display', 'vestige'); ?></h3>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Pagination -->
                        <?php if (function_exists('imic_pagination')) {
                            imic_pagination();
                        } ?>
                    </div>
                    <?php if (is_active_sidebar($pageSidebar)) { ?>
                        <!-- Sidebar -->
                        <div class="col-md-4 sidebar" id="sidebar-col">
                            <?php dynamic_sidebar($pageSidebar); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Body Content -->
<?php get_footer(); ?>