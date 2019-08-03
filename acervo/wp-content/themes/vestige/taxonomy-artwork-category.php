<?php
get_header();
$imic_options = get_option('imic_options');
$default_header = (isset($imic_options['header_image'])) ? esc_url($imic_options['header_image']['url']) : '';
$default_archive_header = (isset($imic_options['artworks-bg-image'])) ? $imic_options['artworks-bg-image']['url'] : '';
if ($default_archive_header != '') {
    $banner_image = $default_archive_header;
} else {
    $banner_image = $default_header;
}
imic_sidebar_position_module();
$pageSidebar = (isset($imic_options['artwork_term_sidebar'])) ? $imic_options['artwork_term_sidebar'] : '';
if (!empty($pageSidebar) && is_active_sidebar($pageSidebar)) {
    $class = 8;
} else {
    $class = 12;
}
$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$slug = $term->slug;
$term_link = get_term_link($term->slug, 'artwork-category');
$t_id = $term->term_id; // Get the ID of the term we're editing
$term_meta = get_option($term->taxonomy . $t_id . "_image_term_id"); // Do the check
$term_banner_image = get_option($term->taxonomy . $t_id . "_term_banner");
$banner_image_url = ($term_banner_image != '') ? $term_banner_image : $banner_image;
?>
<div class="hero-area">
    <div class="page-header <?php if (!empty($banner_image_url)) { ?>parallax<?php } ?> clearfix" style="background-image:<?php if (!empty($banner_image_url)) { ?>url(<?php echo esc_url($banner_image_url); ?>);<?php } ?>">
        <div>
            <div><span><?php echo esc_attr(single_term_title("", false)); ?></span></div>
        </div>
    </div>
</div>
<!-- Notice Bar -->
<div class="notice-bar">
    <div class="container">
        <?php if (function_exists('bcn_display')) { ?>
            <ol class="breadcrumb">
                <?php bcn_display(); ?>
            </ol>
        <?php } ?>
    </div>
</div>
<!-- End Page Header -->
<!-- Start Body Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <div class="col-md-<?php echo esc_attr($class); ?>" id="content-col">

                    <div class="post-content">
                        <?php $term_desc = wp_trim_words(term_description($term->term_id, 'artwork-category'));
                        if ($term_desc != '') {
                            echo '' . $term_desc;
                            echo '<hr class="fw">';
                        }
                        ?>
                    </div>
                    <?php $artworks_arg = array('post_type' => 'artwork', 'artwork-category' => $slug, 'posts_per_page' => -1);
                    $artworks_listings = new WP_Query($artworks_arg);
                    if ($artworks_listings->have_posts()) :
                        ?>
                        <div class="row">
                            <ul class="isotope-grid isotope artworks-grid" data-sort-id="grid">
                                <?php while ($artworks_listings->have_posts()) :     $artworks_listings->the_post();
                                    if (has_post_thumbnail()) {
                                        $image_size = 'imic_600x400';
                                        $image = get_the_post_thumbnail(get_the_ID(), $image_size, array('class' => 'post-thumb'));
                                    }
                                    $title = '<h5 class="short"><a class="accent-color" href="' . esc_url(get_permalink(get_the_ID())) . '">' . get_the_title() . '</a></h5>'; ?>
                                    <li <?php post_class('col-md-4 col-sm-4 grid-item'); ?>>
                                        <div class="format-standard grid-item-content">
                                            <?php if (has_post_thumbnail()) { ?><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="media-box grid-featured-img">
                                                    <?php echo '' . $image; ?>
                                                </a>
                                                <div class="spacer-10"></div><?php } ?>
                                            <?php echo '' . $title; ?>
                                            <?php $artists = get_the_term_list(get_the_ID(), 'artwork-artists', '', ', ', '');
                                            if (!empty($artists)) {
                                                echo '<div class="meta-data artists-list">';
                                                echo esc_attr_e('By ', 'vestige');
                                                echo '' . $artists;
                                                echo '</div>';
                                            } ?>
                                            <?php $category = get_the_term_list(get_the_ID(), 'artwork-category', '', ', ', '');
                                            if (!empty($category)) {
                                                echo '<div class="meta-data">';
                                                echo '' . $category;
                                                echo '</div>';
                                            } ?>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        </div>
                    <?php endif;
                wp_reset_postdata(); ?>
                </div>
                <?php if (is_active_sidebar($pageSidebar)) { ?>
                    <!-- Sidebar -->
                    <div class="sidebar col-md-4" id="sidebar-col">
                        <?php dynamic_sidebar($pageSidebar); ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>