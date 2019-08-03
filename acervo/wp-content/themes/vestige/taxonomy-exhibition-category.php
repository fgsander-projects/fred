<?php
get_header();
$imic_options = get_option('imic_options');
imic_sidebar_position_module();
$this_term = get_query_var('term');
$default_header = (isset($imic_options['header_image'])) ? esc_url($imic_options['header_image']['url']) : '';
$default_archive_header = (isset($imic_options['exhibitions-bg-image'])) ? $imic_options['exhibitions-bg-image']['url'] : '';
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
$pageSidebar = (isset($imic_options['exhibition_term_sidebar'])) ? $imic_options['exhibition_term_sidebar'] : '';
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
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$exhibitions = imic_exhibition_schedule($this_term, "");
					ksort($exhibitions);
					$excerpt_length = '';
					$i = 1;
					$numberPosts = get_option('posts_per_page');
					foreach ($exhibitions as $key => $value) {
						$current_events = $paged * $numberPosts;
						$start_page = ($paged != 1) ? $paged - 1 : 0;
						$start_page = $start_page * $numberPosts;
						if ($i > $start_page && $i <= $current_events) {
							$thumb = 12;
							$exhibition_id = explode("|", $value);
							$exhibition_url = imic_query_arg_exhibition(date('Y-m-d', $exhibition_id[1]), $exhibition_id[0]);
							$registration = get_post_meta($exhibition_id[0], 'imic_event_registration', true);
							$custom_registration = get_post_meta($exhibition_id[0], 'imic_custom_event_registration', true);
							$custom_registration_target = get_post_meta($exhibition_id[0], 'imic_custom_event_registration_target', true);
							if ($custom_registration_target == 1) {
								$target = '_blank';
							} else {
								$target = '';
							} ?>
							<!-- List Item -->
							<div class="list-item exhibition-list-item format-standard">
								<div class="row">
									<?php if (has_post_thumbnail($exhibition_id[0])) {
										$thumb = 8; ?>
										<div class="col-md-4 col-sm-4">
											<a href="<?php echo esc_url($exhibition_url); ?>"><?php echo get_the_post_thumbnail($exhibition_id[0], 'imic_600x400', array('class' => 'img-thumbnail')); ?></a>
										</div>
									<?php } ?>
									<div class="col-md-<?php echo esc_attr($thumb); ?> col-sm-<?php echo esc_attr($thumb); ?>">
										<span class="exhibition-time"><?php echo esc_attr(date_i18n(get_option('time_format'), $exhibition_id[1])); ?></span>
										<!--<span class="exhibitions-weekday meta-data alt">All days</span>-->
										<h3><a href="<?php echo esc_url($exhibition_url); ?>"><?php echo esc_attr(get_the_title($exhibition_id[0])); ?></a></h3>
										<div class="meta-data grid-item-meta"><i class="fa fa-clock-o"></i> <?php echo esc_attr(date_i18n(get_option('date_format'), $exhibition_id[1])); ?></div>
										<div class="meta-data grid-item-meta"><?php echo get_the_term_list($exhibition_id[0], 'venue', '<i class="fa fa-map-marker"></i> ', ', '); ?></div>
										<?php
										if ($excerpt_length != '') {
											echo '<p>' . imic_get_post_content($exhibition_id[0], '', $excerpt_length) . '</p>';
										}
										if ($registration == 1) { ?>
											<div class="post-actions">
												<?php if ($custom_registration != '') { ?>
													<a href="<?php echo esc_url($custom_registration); ?>" class="btn btn-primary" target="<?php echo esc_attr($target); ?>"><?php esc_html_e('Book Online', 'vestige'); ?></a>
												<?php } else { ?>
													<a href="<?php echo esc_url(add_query_arg('reg', '1', $exhibition_url)); ?>" class="btn btn-primary"><?php esc_html_e('Book Online', 'vestige'); ?></a>
													<!--<a href="<?php echo esc_url(add_query_arg('reg', '1', $exhibition_url)); ?>" class="btn btn-default"><?php esc_html_e('Members Free', 'vestige'); ?></a>-->
												<?php } ?>
											</div>
										<?php
									}
									?>
									</div>
								</div>
							</div>
						<?php
					}
					$i++;
					if ($i > $current_events) {
						break;
					}
				}
				?>
					<!-- Pagination -->
					<?php if (function_exists('imic_pagination')) {
						imic_pagination(count($exhibitions), $numberPosts, $paged);
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