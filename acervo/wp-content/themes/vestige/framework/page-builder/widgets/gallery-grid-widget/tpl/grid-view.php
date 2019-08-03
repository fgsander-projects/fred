<?php
$imic_options = get_option('imic_options');
$the_categories = wp_kses_post($instance['categories']);
$post_title = wp_kses_post($instance['title']);
$title_position = wp_kses_post($instance['title_position']);
$color = esc_attr($instance['custom_color']);
$grid_column = (!empty($instance['listing_layout']['grid_column'])) ? $instance['listing_layout']['grid_column'] : 4;
$numberPosts = (!empty($instance['number_of_posts'])) ? $instance['number_of_posts'] : 4;
$carousel_auto = wp_kses_post($instance['listing_layout']['carousel_auto']);
$carousel_nav = (!empty($instance['listing_layout']['carousel_nav'])) ? 'yes' : 'no';
$carousel_pagi = (!empty($instance['listing_layout']['carousel_pagi'])) ? 'yes' : 'no';
?>
<?php
if ($grid_column == 4) {
	$column = 3;
} elseif ($grid_column == 3) {
	$column = 4;
} elseif ($grid_column == 6) {
	$column = 2;
} else {
	$column = 3;
}
?>
<?php $gallery_args = array('post_type' => 'gallery', 'gallery-category' => $the_categories, 'posts_per_page' => $numberPosts, 'paged' => get_query_var('paged'));
$gallery_listings = new WP_Query($gallery_args);
if ($gallery_listings->have_posts()) :
	if (!empty($instance['title'])) { ?>
		<div class="text-align-<?php echo esc_attr($title_position); ?>">
			<h3 class="widget-title" <?php if (!empty($instance['custom_color'])) { ?>style="color:<?php echo esc_attr($color); ?>" <?php } ?>><?php echo esc_attr($post_title); ?></h3>
		</div>
	<?php }
if ($instance['filters']) { ?>
		<ul class="nav nav-pills sort-source" data-sort-id="gallery" data-option-key="filter">
			<?php $gallery_cats = get_terms("gallery-category"); ?>
			<li data-option-value="*" class="active"><a href="#"> <?php _e('Show All', 'vestige'); ?></a></li>
			<?php foreach ($gallery_cats as $gallery_cat) { ?>
				<li data-option-value=".<?php echo esc_attr($gallery_cat->slug); ?>"><a href="#"><?php echo esc_attr($gallery_cat->name); ?></a></li>
			<?php } ?>
		</ul>
		<div class="spacer-40"></div>
	<?php } ?>
	<?php if (!empty($instance['listing_layout']['carousel_mode'])) { ?>
		<div class="carousel-wrapper gallery-grid">
			<div class="row">
				<ul class="owl-carousel carousel-fw" data-columns="<?php echo esc_attr($column); ?>" data-autoplay="<?php echo esc_attr($carousel_auto); ?>" data-pagination="<?php echo esc_attr($carousel_pagi); ?>" data-arrows="<?php echo esc_attr($carousel_nav); ?>" data-single-item="no" data-items-desktop="<?php echo esc_attr($column); ?>" data-items-desktop-small="2" data-items-tablet="2" data-items-mobile="1" <?php if (is_rtl()) { ?>data-rtl="rtl" <?php } else { ?> data-rtl="ltr" <?php } ?>>
				<?php } else { ?>
					<div class="row">
						<ul class="sort-destination isotope gallery-grid" data-sort-id="gallery">
						<?php } ?>
						<?php while ($gallery_listings->have_posts()) : $gallery_listings->the_post();
							$thumb_id = get_post_thumbnail_id(get_the_ID());
							$post_format_temp = get_post_format();
							$post_format = !empty($post_format_temp) ? $post_format_temp : 'image';
							$term_slug = get_the_terms(get_the_ID(), 'gallery-category'); ?>
							<?php if (!empty($instance['listing_layout']['carousel_mode'])) { ?>
								<li class="item">
								<?php } else { ?>
								<li class="grid-item col-md-
																	<?php echo esc_attr($grid_column); ?> col-sm-6 format-
																	<?php echo esc_attr($post_format);
																	if (!empty($term_slug)) {
																		foreach ($term_slug as $term) {
																			echo esc_attr($term->slug) . ' ';
																		}
																	} ?>"><?php } ?>

								<?php switch (get_post_format()) {
									case 'image': ?>

									<?php if ('' != get_the_post_thumbnail()) {
										$image_id = get_post_thumbnail_id(get_the_ID());
										$image = wp_get_attachment_image_src($image_id, 'full', '');
										$image_small = wp_get_attachment_image_src($image_id, '800x600');
										$image_title = get_the_title($image_id);
										if (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 0) {
											$Lightbox_init = '<a href="' . esc_url($image[0]) . '" data-rel="prettyPhoto" class="media-box">';
										} elseif (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 1) {
											$Lightbox_init = '<a href="' . esc_url($image[0]) . '" title="' . $image_title . '" class="media-box magnific-image">';
										}
										?>
										<?php echo '' . $Lightbox_init; ?>
										<img src="<?php echo esc_url($image_small[0]); ?>" alt="<?php echo esc_attr($image_title); ?>">
										</a><?php } ?>

									<?php
									break;
								case 'gallery': ?>

									<?php $image_data =  get_post_meta(get_the_ID(), 'imic_gallery_images', false);
									echo imic_gallery_flexslider(get_the_ID());
									if (count($image_data) > 0) {
										echo '<ul class="slides">';
										foreach ($image_data as $custom_gallery_images) {
											$large_src = wp_get_attachment_image_src($custom_gallery_images, 'full');
											$image_small = wp_get_attachment_image_src($custom_gallery_images, '800x600');
											$image_title = get_the_title($custom_gallery_images);
											if (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 0) {
												$Lightbox_init = '<a href="' . esc_url($large_src[0]) . '" data-rel="prettyPhoto[' . get_the_title() . ']" class="media-box">';
											} elseif (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 1) {
												$Lightbox_init = '<a href="' . esc_url($large_src[0]) . '" title="' . $image_title . '" class="media-box magnific-gallery-image">';
											}
											echo '<li class="item">' . $Lightbox_init;
											echo '<img src="' . esc_url($image_small[0]) . '" alt="' . $image_title . '">';
											echo '</a></li>';
										}
										echo '</ul>';
									}
									echo '</div>'; ?>

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
							} ?>
								<?php if ($instance['show_post_meta']) { ?><h4><?php the_title(); ?></h4><?php } ?>
							</li>
						<?php endwhile; ?>
						<?php if (!empty($instance['listing_layout']['carousel_mode'])) { ?>
						</ul>
					</div>
			</div>
		<?php } else { ?>
			</ul>
		</div>
	<?php } ?>
	<?php if (!empty($instance['show_pagination'])) { ?>
		<?php wp_link_pages(array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'vestige') . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
		)); ?>
		<!-- Pagination -->
		<?php if (function_exists('imic_pagination')) {
			imic_pagination();
		} else {
			next_posts_link('Older Entries');
			previous_posts_link('Newer Entries');
		} ?>
	<?php } ?>
<?php endif;
wp_reset_postdata(); ?>