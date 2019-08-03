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
$pageSidebarOpt = (isset($imic_options['pages_sidebar'])) ? $imic_options['pages_sidebar'] : '';
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
?>
<!-- Start Body Content -->
<div class="main" role="main">
	<div id="content" class="content full">
		<div class="container">
			<div class="row">
				<div class="col-md-<?php echo esc_attr($class); ?> gallery-grid" id="content-col">
					<?php if (have_posts()) : while (have_posts()) : the_post();
							$post_format_temp = get_post_format();
							$post_format = !empty($post_format_temp) ? $post_format_temp : 'image';
							?>
							<div class="format-<?php echo esc_attr($post_format); ?>">
								<?php switch (get_post_format()) {
									case 'image': ?>

									<?php if ('' != get_the_post_thumbnail()) {
										$image_id = get_post_thumbnail_id(get_the_ID());
										$image = wp_get_attachment_image_src($image_id, 'full', '');
										if (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 0) {
											$Lightbox_init = '<a href="' . esc_url($image[0]) . '" data-rel="prettyPhoto" class="media-box">';
										} elseif (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 1) {
											$Lightbox_init = '<a href="' . esc_url($image[0]) . '" title="' . get_the_title() . '" class="media-box magnific-image">';
										}
										?>
										<?php echo '' . $Lightbox_init; ?>
										<?php the_post_thumbnail('800x600'); ?>
										</a><?php } ?>

									<?php
									break;
								case 'gallery': ?>

									<?php $image_data =  get_post_meta(get_the_ID(), 'imic_gallery_images', false);
									if (count($image_data) > 0) {
										echo '<div class="row isotope-grid">';
										foreach ($image_data as $custom_gallery_images) {
											$large_src = wp_get_attachment_image_src($custom_gallery_images, 'full');
											$size = '800x600';
											if (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 0) {
												$Lightbox_init = '<a href="' . esc_url($large_src[0]) . '" data-rel="prettyPhoto[gallery]" class="media-box">';
											} elseif (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 1) {
												$Lightbox_init = '<a href="' . esc_url($large_src[0]) . '" title="' . get_the_title() . '" class="media-box magnific-gallery-image">';
											}
											echo '<div class="col-md-4 col-sm-6 grid-item format-image">' . $Lightbox_init;
											echo wp_get_attachment_image($custom_gallery_images, $size);
											echo '</a></div>';
										}
										echo '</div>';
									} ?>

									<?php break;
								case 'link':
									$link_url = get_post_meta(get_the_ID(), 'imic_gallery_link_url', true);
									if (!empty($link_url)) {
										echo '<a href="' . $link_url . '" target="_blank" class="media-box">';
										the_post_thumbnail('800x600');
										echo '</a>';
									}
									break;
								case 'video':
									$video_url = get_post_meta(get_the_ID(), 'imic_gallery_video_url', true);
									if (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 0) {
										$Lightbox_init = '<a href="' . esc_url($video_url) . '" data-rel="prettyPhoto" class="media-box">';
									} elseif (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 1) {
										$Lightbox_init = '<a href="' . esc_url($video_url) . '" title="' . get_the_title() . '" class="media-box magnific-video">';
									}
									if (!empty($video_url)) {
										echo '' . $Lightbox_init;
										the_post_thumbnail('800x600');
										echo '</a>';
									}
									break;
								default:
									if (!empty($thumb_id)) {
										$large_src_i = wp_get_attachment_image_src($thumb_id, 'full');
										if (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 0) {
											$Lightbox_init = '<a href="' . esc_url($large_src_i[0]) . '" data-rel="prettyPhoto" class="media-box">';
										} elseif (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 1) {
											$Lightbox_init = '<a href="' . esc_url($large_src_i[0]) . '" title="' . get_the_title() . '" class="media-box magnific-image">';
										}
										echo '' . $Lightbox_init;
										the_post_thumbnail('800x600');
										echo '</a>';
									}
									break;
							}
						endwhile; ?>
						</div>
					<?php endif; ?>
					<?php if (isset($imic_options['switch_sharing']) && $imic_options['switch_sharing'] == 1 && $imic_options['share_post_types']['7'] == '1') { ?>
						<?php imic_share_buttons(); ?>
					<?php } ?>
				</div>
				<?php if (is_active_sidebar($pageSidebar)) { ?>
					<!-- Sidebar -->
					<div class="sidebar col-md-<?php echo esc_attr($sidebar_column); ?>" id="sidebar-col">
						<?php dynamic_sidebar($pageSidebar); ?>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>
	<?php get_footer(); ?>