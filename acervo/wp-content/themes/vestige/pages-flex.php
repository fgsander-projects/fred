<?php
wp_enqueue_script('imic_jquery_flexslider');
global $id;
$imic_options = get_option('imic_options');
$type = get_post_meta($id, 'imic_pages_Choose_slider_display', true);
$pagination = get_post_meta($id, 'imic_pages_slider_pagination', true);
$autoplay = get_post_meta($id, 'imic_pages_slider_auto_slide', true);
$arrows = get_post_meta($id, 'imic_pages_slider_direction_arrows', true);
$effects = get_post_meta($id, 'imic_pages_slider_effects', true);
if ($type == 1 || $type == 2 || $type == 3) {
    $height = get_post_meta($id, 'imic_pages_slider_height', true);
} else {
    $height = '';
}
$images = get_post_meta($id, 'imic_pages_slider_image', false);
if ($height != '') {
    echo '<style type="text/css">.page-header > div{height:' . $height . 'px;}.hero-area{min-height:' . $height . 'px;}</style>';
}
?>
<div class="hero-area">
    <?php if (!empty($images)) { ?>
        <div class="hero-slider heroflex flexslider clearfix" style="height:<?php echo esc_attr($height) . 'px' ?>;" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-pagination="<?php echo esc_attr($pagination); ?>" data-arrows="<?php echo esc_attr($arrows); ?>" data-style="<?php echo esc_attr($effects); ?>" data-speed="7000" data-pause="yes">
            <ul class="slides">
                <?php foreach ($images as $image) {
                    $image_src = wp_get_attachment_image_src($image, 'full', '', array());
                    $attachment_meta = imic_wp_get_attachment($image);
                    $url = $attachment_meta['url'];
                    $captitle = $attachment_meta['caption'];
                    $captext = $attachment_meta['description']; ?>
                    <li class=" parallax" style="background-image:url(<?php echo esc_url($image_src[0]); ?>); height:<?php echo esc_attr($height) . 'px' ?>;">
                        <?php if (!empty($captitle)) { ?><div class="container">
                                <div class="flex-caption">
                                    <?php if (!empty($captitle)) { ?><h1><?php echo esc_attr($captitle); ?></h1><?php } ?>
                                    <?php if (!empty($captext)) { ?><p><?php echo esc_attr($captext); ?></p><?php } ?>
                                    <?php if (!empty($url)) { ?><a href="<?php echo esc_url($url); ?>" class="btn btn-info"><?php esc_html_e('See details', 'vestige'); ?></a><?php } ?>
                                </div>
                            </div><?php } ?>
                    </li>
                <?php } ?>
            </ul>
        </div><?php } ?>
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