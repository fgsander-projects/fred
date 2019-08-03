<?php
get_header();
$imic_options = get_option('imic_options');
imic_sidebar_position_module();
$this_term = get_query_var('term');
$default_header = (isset($imic_options['header_image'])) ? esc_url($imic_options['header_image']['url']) : '';
$default_archive_header = (isset($imic_options['events-bg-image'])) ? $imic_options['events-bg-image']['url'] : '';
if ($default_archive_header != '') {
	$banner_image = $default_archive_header;
} else {
	$banner_image = $default_header;
}
$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$t_id = $term->term_id; // Get the ID of the term we're editing
$term_banner_image = get_option($term->taxonomy . $t_id . "_term_banner");
$banner_image_url = ($term_banner_image != '') ? $term_banner_image : $banner_image;
?>
<div class="hero-area">
	<div class="page-header <?php if (!empty($banner_image_url)) { ?>parallax<?php } ?> clearfix" style="background-image:<?php if (!empty($banner_image_url)) { ?>url(<?php echo esc_url($banner_image_url); ?>);<?php } ?>">
		<div>
			<div><span><?php echo esc_attr(single_term_title("", false)); ?></span></div>
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
<?php
$pageSidebar = (isset($imic_options['event_term_sidebar'])) ? $imic_options['event_term_sidebar'] : '';
if (!empty($pageSidebar) && is_active_sidebar($pageSidebar)) {
	$class = 8;
} else {
	$class = 12;
}
$sidebar_column = 4;
?>
<!-- Start Body Content -->
<div class="main" role="main">
	<div id="content" class="content full">
		<div class="container">
			<div class="row">
				<div class="col-md-<?php echo esc_attr($class); ?>" id="content-col">
					<?php
					$paged = (get_query_var('page')) ? get_query_var('page') : 1;
					$events = imic_recur_events("future", "", "", $this_term, "");
					ksort($events);
					$excerpt_length = '';
					?>
					<ul class="events-list">
						<?php
						$i = 1;
						$numberPosts = get_option('posts_per_page');
						foreach ($events as $key => $value) {
							$current_events = $paged * $numberPosts;
							$start_page = ($paged != 1) ? $paged - 1 : 0;
							$start_page = $start_page * $numberPosts;
							if ($i > $start_page && $i <= $current_events) {
								$time_formate = imic_get_event_time_format($value, $key);
								$time_formate = ($time_formate != '') ? $time_formate : esc_html__('All Day', 'vestige');
								$event_url = imic_query_arg(date('Y-m-d', $key), $value);
								$registration = get_post_meta($value, 'imic_event_registration', true);
								$custom_registration = get_post_meta($value, 'imic_custom_event_registration', true);
								$custom_registration_target = get_post_meta($value, 'imic_custom_event_registration_target', true);
								if ($custom_registration_target == 1) {
									$target = '_blank';
								} else {
									$target = '';
								}
								?>
								<li class="event-list-item">
									<a href="<?php echo esc_url($event_url); ?>" class="btn btn-default pull-right"><?php esc_html_e('Details', 'vestige'); ?></a>
									<?php
									if (has_post_thumbnail($value)) { ?>
										<a href="<?php echo esc_url($event_url); ?>" class="img-thumbnail"><?php echo get_the_post_thumbnail($value, ''); ?></a>
									<?php } ?>
									<h3><a href="<?php echo esc_url($event_url); ?>"><?php echo get_the_title($value); ?></a></h3>
									<div class="meta-data alt">
										<div><?php echo get_the_term_list($value, 'venue', '<i class="fa fa-map-marker"></i> ', ', '); ?></div>
										<div><i class="fa fa-calendar"></i> <?php echo esc_attr(imic_get_event_date_format($value, $key)); ?></div>
										<div><i class="fa fa-clock-o"></i> <?php echo esc_attr($time_formate); ?></div>
									</div>
									<?php
									if ($excerpt_length != '') {
										echo '<p>' . imic_get_post_content($value, '', $excerpt_length) . '</p>';
									}
									if ($registration == 1) {
										if ($custom_registration != '') { ?>
											<a href="<?php echo esc_url($custom_registration); ?>" class="basic-link" target="<?php echo esc_attr($target); ?>"><?php esc_html_e('Book Online', 'vestige'); ?></a>
										<?php } else { ?>
											<a href="<?php echo esc_url(add_query_arg('reg', '1', $event_url)); ?>" class="basic-link"><?php esc_html_e('Book Online', 'vestige'); ?></a>
										<?php }
								} ?>
								</li>
							<?php }
						$i++;
						if ($i > $current_events) {
							break;
						}
					} ?>
					</ul>
					<!-- Pagination -->
					<?php if (function_exists('imic_pagination')) {
						$pages_total = count($events) / $numberPosts;
						$pages_total = floor($pages_total);
						$link = get_term_link($term->term_id, 'event-tag');
						imic_pagination_event($pages_total, $numberPosts, $paged, $link);
					} ?>
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
	<?php get_footer(); ?>