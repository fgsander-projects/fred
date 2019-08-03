<?php
$vestige_options = get_option('imic_options');
$the_categories = wp_kses_post($instance['categories']);
$post_title = wp_kses_post($instance['title']);
$exhibition_status = (isset($instance['exhibition_status'])) ? $instance['exhibition_status'] : '';
$title_position = wp_kses_post($instance['title_position']);
$color = esc_attr($instance['custom_color']);
$excerpt_length = wp_kses_post($instance['excerpt_length']);
$numberPosts = (!empty($instance['number_of_posts'])) ? $instance['number_of_posts'] : 4;
$read_more_text = wp_kses_post($instance['read_more_text']);
$carousel_auto = wp_kses_post($instance['listing_layout']['carousel_auto']);
$carousel_nav = (!empty($instance['listing_layout']['carousel_nav'])) ? 'yes' : 'no';
$carousel_pagi = (!empty($instance['listing_layout']['carousel_pagi'])) ? 'yes' : 'no';
$grid_column = (!empty($instance['listing_layout']['grid_column'])) ? $instance['listing_layout']['grid_column'] : 4;
$exhibition_view = (isset($vestige_options['exhibition_view'])) ? $vestige_options['exhibition_view'] : 0;
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
<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if ($exhibition_view == 1) {
	if (!empty($instance['title'])) { ?>
		<div class="text-align-<?php echo esc_attr($title_position); ?>">
			<h3 class="widget-title" <?php if (!empty($instance['custom_color'])) { ?>style="color:<?php echo esc_attr($color); ?>" <?php } ?>><?php echo esc_attr($post_title); ?></h3>
		</div>
	<?php }
if (!empty($instance['listing_layout']['carousel_mode'])) { ?>
		<div class="carousel-wrapper exhibitions-grid">
			<div class="row">
				<ul class="owl-carousel carousel-fw" data-columns="<?php echo esc_attr($column); ?>" data-autoplay="<?php echo esc_attr($carousel_auto); ?>" data-pagination="<?php echo esc_attr($carousel_pagi); ?>" data-arrows="<?php echo esc_attr($carousel_nav); ?>" data-single-item="no" data-items-desktop="<?php echo esc_attr($column); ?>" data-items-desktop-small="2" data-items-tablet="2" data-items-mobile="1" <?php if (is_rtl()) { ?>data-rtl="rtl" <?php } else { ?> data-rtl="ltr" <?php } ?>>
				<?php } else { ?>
					<div class="row">
						<ul class="isotope-grid isotope exhibitions-grid exhibitions-iso-grid" data-sort-id="grid">
						<?php }
					if ($exhibition_status == "past") {
						if ($the_categories != '') {
							$the_categories = explode(',', $the_categories);
							$exhibition_args = array('post_type' => 'exhibition', 'posts_per_page' => $numberPosts, 'paged' => $paged, 'meta_key' => 'imic_exhibition_end_dt', 'orderby' => 'meta_value', 'order' => 'DESC', 'meta_query' => array(array('key' => 'imic_exhibition_end_dt', 'value' => date_i18n('Y-m-d'), 'compare' => '<=')), 'tax_query' => array(array('taxonomy' => 'exhibition-category', 'field' => 'slug', 'terms' => $the_categories)));
						} else {
							$exhibition_args = array('post_type' => 'exhibition', 'posts_per_page' => $numberPosts, 'paged' => $paged, 'meta_key' => 'imic_exhibition_end_dt', 'orderby' => 'meta_value', 'order' => 'DESC', 'meta_query' => array(array('key' => 'imic_exhibition_end_dt', 'value' => date_i18n('Y-m-d'), 'compare' => '<=')));
						}
					} else {
						if ($the_categories != '') {
							$the_categories = explode(',', $the_categories);
							$exhibition_args = array(
								'post_type' => 'exhibition', 'posts_per_page' => $numberPosts, 'paged' => $paged, 'meta_key' => 'imic_exhibition_end_dt',
								'orderby' => 'meta_value', 'order' => 'ASC', 'meta_query' => array(array('key' => 'imic_exhibition_end_dt', 'value' => date_i18n('Y-m-d'), 'compare' => '>=')), 'tax_query' => array(array('taxonomy' => 'exhibition-category', 'field' => 'slug', 'terms' => $the_categories))
							);
						} else {
							$exhibition_args = array(
								'post_type' => 'exhibition', 'posts_per_page' => $numberPosts, 'paged' => $paged, 'meta_key' => 'imic_exhibition_end_dt',
								'orderby' => 'meta_value', 'order' => 'ASC', 'meta_query' => array(array('key' => 'imic_exhibition_end_dt', 'value' => date_i18n('Y-m-d'), 'compare' => '>='))
							);
						}
					}
					$exhibition_listing = new WP_Query($exhibition_args);
					if ($exhibition_listing->have_posts()) : while ($exhibition_listing->have_posts()) : $exhibition_listing->the_post();
							$thumb = 12;
							$exhibition_start_date = get_post_meta(get_the_ID(), 'imic_exhibition_start_dt', true);
							$exhibition_end_date = get_post_meta(get_the_ID(), 'imic_exhibition_end_dt', true);
							$exhibition_start_date_str = strtotime($exhibition_start_date);
							$exhibition_end_date_str = strtotime($exhibition_end_date);
							$date_diff = imic_dateDiff(date_i18n('Y-m-d', $exhibition_start_date_str), date_i18n('Y-m-d', $exhibition_end_date_str));
							$exhibition_timing = get_post_meta(get_the_ID(), 'feat_data', true);
							$registration = get_post_meta(get_the_ID(), 'imic_event_registration', true);
							$custom_registration = get_post_meta(get_the_ID(), 'imic_custom_event_registration', true);
							$custom_registration_target = get_post_meta(get_the_ID(), 'imic_custom_event_registration_target', true);
							if ($custom_registration_target == 1) {
								$target = '_blank';
							} else {
								$target = '';
							}
							if (!empty($instance['listing_layout']['carousel_mode'])) { ?><li class="item"><?php } else { ?>
									<li <?php post_class('col-md-' . $grid_column . ' col-sm-6 grid-item'); ?>><?php } ?>
									<?php if (!empty($instance['listing_layout']['carousel_mode'])) { ?><div class="grid-item format-standard"><?php } else { ?><div class="format-standard"><?php } ?>
											<?php if (has_post_thumbnail()) {
												echo '<a href="' . get_permalink() . '" class="media-box">' . get_the_post_thumbnail(get_the_ID(), 'imic_600x400', array('class' => 'grid-featured-img')) . '<a/>';
											} ?>
											<div class="grid-item-content">
												<?php if (!empty($instance['show_post_meta'])) {
													if (!empty($exhibition_timing)) {
														foreach ($exhibition_timing as $key => $value) { ?>
															<span class="exhibition-time"><?php echo esc_attr(date_i18n(get_option('time_format'), $key)); ?></span>
														<?php }
												} ?>
													<!--<span class="exhibitions-weekday meta-data alt">All days</span>-->
												<?php } ?>
												<h3><a href="<?php the_permalink(); ?>"><?php echo esc_attr(get_the_title(get_the_ID())); ?></a></h3>
												<?php if (!empty($instance['show_post_meta'])) { ?>
													<!--<div class="meta-data grid-item-meta"><i class="fa fa-clock-o"></i> Now Open</div>-->
													<div class="meta-data grid-item-meta alt">
														<?php if ($date_diff > 0) { ?>
															<div><i class="fa fa-clock-o"></i> <?php echo esc_attr(date_i18n(get_option('date_format'), $exhibition_start_date_str));
																								echo ' - ' . esc_attr(date_i18n(get_option('date_format'), $exhibition_end_date_str)); ?></div>
														<?php } else { ?>
															<div><i class="fa fa-clock-o"></i> <?php echo esc_attr(date_i18n(get_option('date_format'), $exhibition_start_date_str)); ?></div>
														<?php } ?>
														<?php echo get_the_term_list(get_the_ID(), 'venue', '<div><i class="fa fa-map-marker"></i> ', ', ', '</div>'); ?>
													</div>
												<?php }
											if ($excerpt_length != '') {
												echo '<p>' . imic_get_post_content(get_the_ID(), '', $excerpt_length) . '</p>';
											}
											?>

												<?php
												if ($registration == 1 || $read_more_text != "") { ?>
													<div class="post-actions">
														<?php
														if ($registration == 1 && $exhibition_status == "future") { ?>
															<?php if ($custom_registration != '') { ?>
																<a href="<?php echo esc_url($custom_registration); ?>" class="btn btn-primary" target="<?php echo esc_attr($target); ?>"><?php esc_html_e('Book Online', 'vestige'); ?></a>
															<?php } else { ?>
																<a href="<?php echo esc_url(add_query_arg('reg', '1', $exhibition_url)); ?>" class="btn btn-primary"><?php esc_html_e('Book Online', 'vestige'); ?></a>
															<?php } ?>
														<?php } ?>
														<?php if ($read_more_text != "") { ?><a href="<?php echo the_permalink(); ?>" class="btn btn-default"><?php echo esc_attr($read_more_text); ?></a><?php } ?>
													</div>
												<?php } ?>
											</div>
								</li>
							<?php
						endwhile;
					endif;
					wp_reset_postdata();
					if (!empty($instance['listing_layout']['carousel_mode'])) { ?>
						</ul>
					</div>
			</div>
		<?php } else { ?>
			</ul>
		</div>
	<?php }
if (!empty($instance['show_pagination'])) {
	imic_pagination($exhibition_listing->max_num_pages, 4, $paged);
}
} else {
	if ($exhibition_status == "past") {
		$exhibitions = imic_exhibition_schedule_past($the_categories, "");
		krsort($exhibitions);
	} else {
		$exhibitions = imic_exhibition_schedule($the_categories, "");
		ksort($exhibitions);
	}
	if (!empty($instance['title'])) { ?>
		<div class="text-align-<?php echo esc_attr($title_position); ?>">
			<h3 class="widget-title" <?php if (!empty($instance['custom_color'])) { ?>style="color:<?php echo esc_attr($color); ?>" <?php } ?>><?php echo esc_attr($post_title); ?></h3>
		</div>
	<?php } ?>

	<?php if (!empty($instance['listing_layout']['carousel_mode'])) { ?>
		<div class="carousel-wrapper exhibitions-grid">
			<div class="row">
				<ul class="owl-carousel carousel-fw" data-columns="<?php echo esc_attr($column); ?>" data-autoplay="<?php echo esc_attr($carousel_auto); ?>" data-pagination="<?php echo esc_attr($carousel_pagi); ?>" data-arrows="<?php echo esc_attr($carousel_nav); ?>" data-single-item="no" data-items-desktop="<?php echo esc_attr($column); ?>" data-items-desktop-small="2" data-items-tablet="2" data-items-mobile="1" <?php if (is_rtl()) { ?>data-rtl="rtl" <?php } else { ?> data-rtl="ltr" <?php } ?>>
				<?php } else { ?>
					<div class="row">
						<ul class="isotope-grid isotope exhibitions-grid" data-sort-id="grid">
						<?php } ?>
						<?php
						$i = 1;
						foreach ($exhibitions as $key => $value) {
							$current_events = $paged * $numberPosts;
							$start_page = ($paged != 1) ? $paged - 1 : 0;
							$start_page = $start_page * $numberPosts;
							if ($i > $start_page && $i <= $current_events) {
								$thumb = 12;
								$exhibition_id = explode("|", $value);
								$exhibition_url = imic_query_arg_exhibition(date_i18n('Y-m-d', $exhibition_id[1]), $exhibition_id[0]);
								$registration = get_post_meta($exhibition_id[0], 'imic_event_registration', true);
								$custom_registration = get_post_meta($exhibition_id[0], 'imic_custom_event_registration', true);
								$custom_registration_target = get_post_meta($exhibition_id[0], 'imic_custom_event_registration_target', true);
								if ($custom_registration_target == 1) {
									$target = '_blank';
								} else {
									$target = '';
								}
								if (!empty($instance['listing_layout']['carousel_mode'])) { ?><li class="item"><?php } else { ?>
									<li <?php post_class('col-md-' . $grid_column . ' col-sm-6 grid-item'); ?>><?php } ?>
									<?php if (!empty($instance['listing_layout']['carousel_mode'])) { ?><div class="grid-item format-standard"><?php } else { ?><div class="format-standard"><?php } ?>
											<?php if (has_post_thumbnail($exhibition_id[0])) {
												echo '<a href="' . esc_url($exhibition_url) . '" class="media-box">' . get_the_post_thumbnail($exhibition_id[0], 'imic_600x400', array('class' => 'grid-featured-img')) . '<a/>';
											} ?>
											<div class="grid-item-content">
												<?php if (!empty($instance['show_post_meta'])) { ?>
													<span class="exhibition-time"><?php echo esc_attr(date_i18n(get_option('time_format'), $exhibition_id[1])); ?></span>
													<!--<span class="exhibitions-weekday meta-data alt">All days</span>-->
												<?php } ?>
												<h3><a href="<?php echo esc_url($exhibition_url); ?>"><?php echo esc_attr(get_the_title($exhibition_id[0])); ?></a></h3>
												<?php if (!empty($instance['show_post_meta'])) { ?>
													<!--<div class="meta-data grid-item-meta"><i class="fa fa-clock-o"></i> Now Open</div>-->
													<div class="meta-data grid-item-meta alt">
														<div><i class="fa fa-clock-o"></i> <?php echo esc_attr(date_i18n(get_option('date_format'), $exhibition_id[1])); ?></div>
														<div><?php echo get_the_term_list($exhibition_id[0], 'venue', '<i class="fa fa-map-marker"></i> ', ', '); ?></div>
													</div>
												<?php }
											if ($excerpt_length != '') {
												echo '<p>' . imic_get_post_content($exhibition_id[0], '', $excerpt_length) . '</p>';
											}
											?>

												<?php
												if ($registration == 1 || $read_more_text != "") { ?>
													<div class="post-actions">
														<?php
														if ($registration == 1 && $exhibition_status == "future") { ?>
															<?php if ($custom_registration != '') { ?>
																<a href="<?php echo esc_url($custom_registration); ?>" class="btn btn-primary" target="<?php echo esc_attr($target); ?>"><?php esc_html_e('Book Online', 'vestige'); ?></a>
															<?php } else { ?>
																<a href="<?php echo esc_url(add_query_arg('reg', '1', $exhibition_url)); ?>" class="btn btn-primary"><?php esc_html_e('Book Online', 'vestige'); ?></a>
															<?php } ?>
														<?php } ?>
														<?php if ($read_more_text != "") { ?><a href="<?php echo esc_url($exhibition_url); ?>" class="btn btn-default"><?php echo esc_attr($read_more_text); ?></a><?php } ?>
													</div>
												<?php } ?>
											</div>
								</li>
							<?php
						}
						$i++;
						if ($i > $current_events) {
							break;
						}
					}
					if (!empty($instance['listing_layout']['carousel_mode'])) { ?>
						</ul>
					</div>
			</div>
		<?php } else { ?>
			</ul>
		</div>
	<?php } ?>
	<?php if (!empty($instance['show_pagination'])) { ?>
		<!-- Pagination -->
		<?php if (function_exists('imic_pagination')) {
			$pages_total = count($exhibitions) / $numberPosts;
			$pages_total = ceil($pages_total);
			imic_pagination($pages_total, $numberPosts, $paged);
		}
	} ?>
<?php } ?>