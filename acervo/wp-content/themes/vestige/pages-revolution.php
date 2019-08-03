<?php global $id;
$rev_slider = get_post_meta($id, 'imic_pages_select_revolution_from_list', true);
$rev_slider = preg_replace('/\\\\/', '', $rev_slider); ?>
<div class="hero-area">
    <div class="slider-rev-cont">
        <?php echo do_shortcode($rev_slider); ?>
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