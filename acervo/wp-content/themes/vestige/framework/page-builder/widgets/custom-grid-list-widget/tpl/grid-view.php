<?php
$imic_options = get_option('imic_options');
$title = wp_kses_post($instance['title']);
$title_position = wp_kses_post($instance['title_position']);
$title_url = sow_esc_url($instance['title_url']);
$stitle = wp_kses_post($instance['stitle']);
$stitle_position = wp_kses_post($instance['stitle_position']);
$stitle_url = sow_esc_url($instance['stitle_url']);
$content = wp_kses_post($instance['item_text']);
$footer = wp_kses_post($instance['item_footer']);
$read_more_text = wp_kses_post($instance['read_more_text']);
$src = wp_get_attachment_image_src($instance['item_image'], $instance['item_size']);
if (!empty($src)) {
	$attr = array(
		'src' => $src[0],
		'width' => $src[1],
		'height' => $src[2],
	);
} else if (!empty($instance['item_image_fallback'])) {
	$attr = array(
		'src' => esc_url($instance['item_image_fallback']),
	);
}
?>
<?php if (!empty($title)) { ?><div class="grid-item spaces-item format-image">
		<div class="grid-item-header">
			<h3 class="short"><?php if (!empty($title_url)) { ?><a href="<?php echo esc_url($title_url); ?>"><?php } ?><?php echo esc_attr($title); ?><?php if (!empty($title_url)) { ?></a><?php } ?></h3>
			<?php if (!empty($stitle)) { ?><h4><?php if (!empty($stitle_url)) { ?><a href="<?php echo esc_url($stitle_url); ?>"><?php } ?><?php echo esc_attr($stitle); ?><?php if (!empty($stitle_url)) { ?></a><?php } ?></h4><?php } ?>
		</div>
		<?php if (!empty($instance['item_image']) || ($instance['item_image_fallback'])) { ?>
			<?php if ($instance['image_lightbox']) {
				if (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 0) {
					$Lightbox_init = '<a href="' . esc_url($src[0]) . '" data-rel="prettyPhoto" class="media-box">';
				} elseif (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 1) {
					$Lightbox_init = '<a href="' . esc_url($src[0]) . '" class="media-box magnific-image">';
				}
				?>

				<?php echo '' . $Lightbox_init; ?><?php } ?>
			<img <?php foreach ($attr as $n => $v) echo '' . $n . '="' . esc_attr($v) . '" ' ?>><?php if ($instance['image_lightbox']) { ?></a><?php } ?>
		<?php } ?>
		<div class="grid-item-content">
			<?php if (!empty($content)) { ?><p>
					<?php echo '' . $content; ?></p>
			<?php } ?>
			<?php if (!empty($title_url)) { ?>
				<?php if (!empty($read_more_text)) { ?><p><a href="<?php echo esc_url($title_url); ?>" class="btn btn-primary">
							<?php echo '' . $read_more_text; ?></a></p><?php } ?>
			<?php } ?>
			<?php if (!empty($footer)) { ?><span class="meta-data">
					<?php echo '' . $footer; ?></span>
			<?php } ?>
		</div>
	</div>
<?php } ?>