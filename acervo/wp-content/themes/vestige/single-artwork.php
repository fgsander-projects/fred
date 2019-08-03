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
$pageSidebarOpt = (isset($imic_options['artworks_sidebar'])) ? $imic_options['artworks_sidebar'] : '';
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
if (!empty($pageSidebar) && is_active_sidebar($pageSidebar)) {
    $left_col = 12 - $sidebar_column;
    $class = $left_col;
} else {
    $class = 12;
}
$slug = array();
?>
<!-- Start Body Content -->
<div class="main" role="main">
    <div id="content" class="content full">
        <div class="container">
            <div class="row">
                <div class="col-md-<?php echo esc_attr($class); ?>" id="content-col">
                    <article class="single-artwork-content format-standard">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="single-artwork-images">

                                            <div class="artwork-slider">
                                                <div id="artwork-images" class="flexslider format-gallery">
                                                    <?php
                                                    $featured_image_id = get_post_meta(get_the_ID(), '_thumbnail_id', true);
                                                    $artwork_images = get_post_meta(get_the_ID(), 'imic_artwork_images', false);
                                                    $artwork_images = array_merge(array($featured_image_id), $artwork_images);
                                                    $artwork_images = array_unique($artwork_images); ?>
                                                    <ul class="slides">
                                                        <?php foreach ($artwork_images as $artwork_image) {
                                                            $image = wp_get_attachment_image_src($artwork_image, '1000x800', '');
                                                            $image_full = wp_get_attachment_image_src($artwork_image, 'full', '');
                                                            ?>
                                                            <?php if (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 0) {
                                                                $Lightbox_init = '<li class="format-image"><a class="media-box" href="' . esc_url($image_full[0]) . '" data-rel="prettyPhoto[grouped]">';
                                                            } elseif (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 1) {
                                                                $Lightbox_init = '<li class="format-image"><a href="' . esc_url($image_full[0]) . '" class="magnific-gallery-image media-box">';
                                                            }
                                                            echo '' . $Lightbox_init; ?><img src="<?php echo esc_url($image[0]); ?>" alt="Artwork"></a> </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <?php
                                            if (count($artwork_images) > 1) { ?>
                                                <div class="additional-images">
                                                    <div id="artwork-thumbs" class="flexslider">
                                                        <ul class="slides">
                                                            <?php foreach ($artwork_images as $artwork_image) {
                                                                $image = wp_get_attachment_image_src($artwork_image, '400x400', '');
                                                                $image_full = wp_get_attachment_image_src($artwork_image, 'full', ''); ?>
                                                                <li> <a href="<?php echo esc_url($image_full[0]); ?>"><img src="<?php echo esc_url($image[0]); ?>" alt="Artwork"></a> </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div><?php } ?>
                                        </div>
                                        <div class="clearfix"></div>
                                        <!-- Post Comments -->
                                        <?php if (comments_open()) {
                                            comments_template('', true);
                                        } ?>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <h1 class="short"><?php the_title(); ?></h1>
                                        <?php
                                        $artwork_price = get_post_meta(get_the_ID(), 'imic_artwork_price', true);
                                        if ($artwork_price != '') {
                                            echo '<h3 class="accent-color"><strong>' . $artwork_price . '</strong></h3>';
                                        }
                                        ?>
                                        <?php $artists = get_the_term_list(get_the_ID(), 'artwork-artists', '', ', ', '');
                                        if (!empty($artists)) {
                                            echo '<div class="meta-data artists-list">';
                                            echo esc_attr_e('By ', 'vestige');
                                            echo '' . $artists;
                                            echo '</div>';
                                        } ?>
                                        <?php
                                        $artwork_dimension = get_post_meta(get_the_ID(), 'imic_artwork_dimension', true);
                                        if ($artwork_dimension != '') {
                                            echo '<div class="spacer-10"></div><div class="meta-data">' . esc_attr('Dimensions: ', 'vestige') . $artwork_dimension . '</div>';
                                        }
                                        ?>
                                        <div class="spacer-10"></div>
                                        <?php $category = get_the_term_list(get_the_ID(), 'artwork-category', '', ', ', '');
                                        if (!empty($category)) {
                                            echo '<div class="meta-data">';
                                            echo '' . $category;
                                            echo '</div>';
                                        } ?>
                                        <div class="spacer-20"></div>
                                        <div class="post-content">
                                            <?php the_content();
                                            ?></div>
                                        <?php if (isset($imic_options['switch_sharing']) && $imic_options['switch_sharing'] == 1 && $imic_options['share_post_types']['6'] == '1') { ?>
                                            <?php imic_share_buttons(); ?>
                                        <?php } ?>
                                        <div class="spacer-20"></div>
                                        <?php $tags = get_the_term_list(get_the_ID(), 'artwork-tags', '', ', ', '');
                                        if (!empty($tags)) {
                                            echo '<div class="meta-data"><i class="fa fa-tags"></i> ';
                                            echo '' . $tags;
                                            echo '</div>';
                                        } ?>
                                        <div class="spacer-20"></div>
                                        <?php $terms = get_the_terms($post->ID, 'artwork-artists'); ?>
                                        <!-- Start Accordion -->
                                        <div class="accordion" id="artist-accordion">
                                            <div class="accordion-group panel">
                                                <div class="accordion-heading accordionize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#artist-accordion" href="#oneArea"> <?php esc_attr_e('About the artist', 'vestige'); ?> <i class="fa fa-angle-down"></i> </a> </div>
                                                <div id="oneArea" class="accordion-body collapse">
                                                    <div class="accordion-inner">
                                                        <?php
                                                        if ($terms) {
                                                            foreach ($terms as $term) {
                                                                echo '<h3>' . $term->name . '</h3>';
                                                                echo '' . $term->description . '<br /><br />';
                                                                $slug[] = $term->term_id;
                                                            }
                                                        } ?></div>
                                                </div>
                                            </div>
                                            <div class="accordion-group panel">
                                                <div class="accordion-heading accordionize"> <a class="accordion-toggle active" data-toggle="collapse" data-parent="#artist-accordion" href="#twoArea"> <?php esc_attr_e('More items from artist', 'vestige'); ?> <i class="fa fa-angle-down"></i> </a> </div>
                                                <div id="twoArea" class="accordion-body in collapse">
                                                    <div class="accordion-inner">
                                                        <?php
                                                        $this_post = $post->ID;
                                                        if (!empty($slug)) {
                                                            $artwork_args = array('post_type' => 'artwork', 'tax_query' => array(array('taxonomy' => 'artwork-artists', 'field' => 'term_id', 'terms' => $slug, 'operator' => 'IN')), 'posts_per_page' => 4, 'post__not_in' => array($this_post));
                                                        } else {
                                                            $artwork_args = array('post_type' => 'artworks', 'posts_per_page' => 4, 'post__not_in' => array($this_post));
                                                        }

                                                        $artwork_listings = new WP_Query($artwork_args);
                                                        if ($artwork_listings->have_posts()) :
                                                            echo '<ul class="row more-from-artist">';
                                                            while ($artwork_listings->have_posts()) : $artwork_listings->the_post();

                                                                $title = '<h5 class="short"><a class="accent-color" href="' . esc_url(get_permalink(get_the_ID())) . '">' . get_the_title() . '</a></h5>';
                                                                if (has_post_thumbnail()) {
                                                                    $image_size = 'imic_600x400';
                                                                    $image = get_the_post_thumbnail(get_the_ID(), $image_size, array('class' => 'post-thumb'));
                                                                } ?>
                                                                <li <?php post_class('col-md-6 col-sm-6 grid-item'); ?>>
                                                                    <div class="format-standard">
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
                                                            <?php endwhile;
                                                        echo '</ul>'; ?>
                                                        <?php else : ?>
                                                            <p><?php esc_attr_e('No more work to show', 'vestige'); ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Accordion -->
                                    </div>
                                </div>
                                <!-- Pagination -->
                                <ul class="pager">
                                    <li class="pull-left"><?php echo previous_post_link('%link', esc_html__('&larr; Prev Artwork', 'vestige')); ?></li>
                                    <li class="pull-right"><?php echo next_post_link('%link', esc_html__('Next Artwork &rarr;', 'vestige')); ?></a></li>
                                </ul>
                            <?php
                        endwhile;
                    endif; ?>
                    </article>
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