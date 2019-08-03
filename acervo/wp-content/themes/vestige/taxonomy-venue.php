<?php
get_header();
$id = get_the_ID();
$imic_options = get_option('imic_options');
$page_header = (isset($imic_options['venue-bg-image'])) ? $imic_options['venue-bg-image']['url'] : '';
imic_sidebar_position_module();
$pageSidebar = (isset($imic_options['venue_sidebar'])) ? $imic_options['venue_sidebar'] : '';
if (!empty($pageSidebar) && is_active_sidebar($pageSidebar)) {
    $class = 8;
} else {
    $class = 12;
}
$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$slug = $term->slug;
$term_link = get_term_link($term->slug, 'venue');
$t_id = $term->term_id; // Get the ID of the term we're editing
$term_meta = get_option($term->taxonomy . $t_id . "_image_term_id"); // Do the check
$term_banner_image = get_option($term->taxonomy . $t_id . "_term_banner");
$banner_image_url = ($term_banner_image != '') ? $term_banner_image : $page_header;
$venue_address = get_option("category_" . $t_id);
$venue_address = $venue_address['VenueAddress'];
?>
<div class="hero-area">
    <div class="page-header <?php if (!empty($banner_image_url)) { ?>parallax<?php } ?> clearfix" style="background-image:<?php if (!empty($banner_image_url)) { ?>url(<?php echo esc_url($banner_image_url); ?>);<?php } ?>">
        <div>
            <div><span><?php _e('Venues', 'vestige'); ?></span></div>
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
                    <?php if ($venue_address != '') { ?>
                        <div class="label label-primary venue-address"><i class="fa fa-map-marker"></i> <?php echo '' . $venue_address; ?></div>
                    <?php } ?>
                    <h1 class="post-title"><?php echo esc_attr($term->name); ?></h1>
                    <div class="featured-image"><img src="<?php echo esc_url($term_meta); ?>" alt="Venue"></div>
                    <div class="post-content">
                        <?php echo do_shortcode(term_description($term->term_id, 'venue')); ?>
                    </div>
                    <hr class="fw">
                    <?php if ($venue_address != '') { ?>
                        <a href="https://www.google.com/maps/dir//<?php echo '' . $venue_address; ?>" class="pull-right basic-link" target="_blank"><?php esc_html_e('Get Directions', 'vestige'); ?></a>
                        <h2><?php esc_html_e('How to reach', 'vestige'); ?></h2>
                        <div class="venue-single-map"><?php echo do_shortcode('[gmap address="' . $venue_address . '"]'); ?></div>
                        <hr class="fw">
                    <?php } ?>
                    <?php $exhibition_arg = array('post_type' => 'exhibition', 'venue' => $slug, 'posts_per_page' => -1);
                    $exhibition_listing = new WP_Query($exhibition_arg);
                    if ($exhibition_listing->have_posts()) : ?>
                        <h2><?php esc_html_e('Venue Exhibitions', 'vestige'); ?></h2>
                        <ul class="carets">
                            <?php while ($exhibition_listing->have_posts()) :     $exhibition_listing->the_post(); ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif;
                wp_reset_postdata(); ?>
                    <?php $event_args = array('post_type' => 'event', 'venue' => $slug, 'posts_per_page' => -1);
                    $event_listings = new WP_Query($event_args);
                    if ($event_listings->have_posts()) : ?>
                        <h2><?php esc_html_e('Venue Events', 'vestige'); ?></h2>
                        <ul class="carets">
                            <?php while ($event_listings->have_posts()) : $event_listings->the_post(); ?>
                                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            <?php endwhile; ?>
                        </ul>
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