<?php
wp_enqueue_script('imic_nivo_slider');
wp_enqueue_style('imic_nivo_default');
wp_enqueue_style('imic_nivo_slider');
global $id;
$imic_options = get_option('imic_options');
$pagination = get_post_meta($id, 'imic_pages_slider_pagination', true);
$autoplay = get_post_meta($id, 'imic_pages_slider_auto_slide', true);
$arrows = get_post_meta($id, 'imic_pages_slider_direction_arrows', true);
$height = get_post_meta($id, 'imic_pages_slider_height', true);
$effects = get_post_meta($id, 'imic_pages_nivo_effects', true);
$slider_height = ($height != '') ? $height : '';
$images = get_post_meta($id, 'imic_pages_slider_image', false);
?>
<div class="hero-area">
    <div class="slider-wrapper theme-default">
        <?php if (!empty($images)) { ?>
            <div class="nivoslider clearfix" data-autoplay="<?php echo esc_attr($autoplay); ?>" data-pagination="<?php echo esc_attr($pagination); ?>" data-arrows="<?php echo esc_attr($arrows); ?>" data-effect="<?php echo esc_attr($effects); ?>" data-thumbs="no" data-slices="15" data-animSpeed="500" data-pauseTime="3000" data-pauseonhover="yes">
                <?php foreach ($images as $image) :
                    $attachment_meta = imic_wp_get_attachment($image);
                    ?>
                    <img src=" <?php echo esc_url($attachment_meta['src']); ?> " alt="Slide" title="<?php echo esc_attr($attachment_meta['caption']); ?>">
                <?php endforeach;
        } ?>
        </div>
    </div>
</div>
<!-- End Page Header -->
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