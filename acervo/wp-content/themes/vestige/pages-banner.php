<?php
global $id;
$image = $banner_type = '';
$imic_options = get_option('imic_options');
$type = get_post_meta($id, 'imic_pages_Choose_slider_display', true);
if ($type == 1 || $type == 2 || $type == 3) {
	$height = get_post_meta($id, 'imic_pages_slider_height', true);
} else {
	$height = '';
}
if ($height != '') {
	echo '<style type="text/css">.page-header > div{height:' . $height . 'px;}.hero-area{min-height:' . $height . 'px;}</style>';
}
$color = get_post_meta($id, 'imic_pages_banner_color', true);
$color = ($color != '' && $color != '#') ? $color : '';
if ($type == 2) {
	$image = get_post_meta($id, 'imic_header_image', true);
	$image_src = wp_get_attachment_image_src($image, 'full', '', array());
	if (is_array($image_src)) {
		$image = $image_src[0];
	} else {
		$image = (isset($imic_options['header_image'])) ? $imic_options['header_image']['url'] : '';
	}
}
$post_type = get_post_type($id);
$event_archive_title = (isset($imic_options['events_archive_title'])) ? $imic_options['events_archive_title'] : esc_html__('Special Events', 'vestige');
$blog_archive_title = (isset($imic_options['blog_archive_title'])) ? $imic_options['blog_archive_title'] : esc_html__('Blog', 'vestige');
$exhibition_archive_title = (isset($imic_options['exhibitions_archive_title'])) ? $imic_options['exhibitions_archive_title'] : esc_html__('Exhibitions', 'vestige');
$team_archive_title = (isset($imic_options['team_archive_title'])) ? $imic_options['team_archive_title'] : esc_html__('Team', 'vestige');
$artwork_archive_title = (isset($imic_options['artwork_archive_title'])) ? $imic_options['artwork_archive_title'] : esc_html__('Artworks', 'vestige');
$shop_archive_title = (isset($imic_options['shop_archive_title'])) ? $imic_options['shop_archive_title'] : esc_html__('Products', 'vestige');
$title = '';

if (is_home() || is_singular('post')) {
	$blog_id = get_option('page_for_posts');
	if ($blog_id != 0) {
		$title = get_the_title($blog_id);
	} else {
		$title = $blog_archive_title;
	}
} elseif (is_category()) {
	$title = single_cat_title("", false);
} elseif (is_tag()) {
	$title = single_tag_title("", false);
} elseif (is_author()) {
	$title = get_the_author("", false);
} elseif ($post_type == "event") {
	$title = $event_archive_title;
} elseif ($post_type == "exhibition") {
	$title = $exhibition_archive_title;
} elseif ($post_type == "team") {
	$title = $team_archive_title;
} elseif ($post_type == "artwork") {
	$title = $artwork_archive_title;
} elseif ($post_type == "product") {
	$title = $shop_archive_title;
} else {
	$title = get_the_title($id);
}

if (empty($image)) {
	$image = get_the_post_thumbnail_url(get_the_ID());
}
?>

<?php if (is_category()) {
	$banner_image_url = (isset($imic_options['header_image'])) ? esc_url($imic_options['header_image']['url']) : '';
	$category = get_the_category();
	$cat_id = $category[0]->cat_ID;
	$term_banner_image = get_option('category' . $cat_id . "_term_banner");
	$banner_image_url = ($term_banner_image != '') ? $term_banner_image : $banner_image_url;
	?>
	<div class="hero-area">
		<div class="page-header <?php if (!empty($banner_image_url)) { ?>parallax<?php } ?> clearfix" style="background-image:<?php if (!empty($banner_image_url)) { ?>url(<?php echo esc_url($banner_image_url); ?>);<?php } ?>">
			<div>
				<div><span><?php echo esc_attr(single_term_title("", false)); ?></span></div>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="hero-area">
		<?php if ($color != '' && $type == 1) {
			?>
			<div class="page-header <?php if (!empty($image)) { ?>parallax<?php } ?> clearfix" style="background-color:<?php echo '' . $color ?>; background-image:none; height:<?php echo esc_attr($height) . 'px' ?>;">
				<div>
					<div><span><?php echo esc_attr($title); ?></span></div>
				</div>
			<?php
		} else {
			?>
				<div class="page-header <?php if (!empty($image)) { ?>parallax<?php } ?> clearfix" style="background-image:<?php if (!empty($image)) { ?>url(<?php echo esc_url($image); ?>);<?php } ?> background-color:<?php echo '' . $color ?>; height:<?php echo esc_attr($height) . 'px' ?>;">
					<div>
						<div><span><?php echo esc_attr($title); ?></span></div>
					</div>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
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