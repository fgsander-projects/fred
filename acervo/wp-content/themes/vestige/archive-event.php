<?php
get_header();
$imic_options = get_option('imic_options');
imic_sidebar_position_module();
$this_term = get_query_var('term');
$banner_image = (isset($imic_options['header_image'])) ? esc_url($imic_options['header_image']['url']) : '';
?>
<div class="hero-area">
	<div class="page-header <?php if (!empty($banner_image)) { ?>parallax<?php } ?> clearfix" style="background-image:<?php if (!empty($banner_image)) { ?>url(<?php echo esc_url($banner_image); ?>);<?php } ?> background-color:#dabc74; height:260px;">
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
					$events = imic_recur_events("future", "", $this_term, "");
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
								$event_url = imic_query_arg(date_i18n('Y-m-d', $key), $value);
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
									<div class="pull-right" style="max-width:100px">
										<a href="<?php echo esc_url($event_url); ?>" class="btn btn-default"><?php esc_html_e('Details', 'vestige'); ?></a>
										<?php
										if ($registration == 1) {
											if ($custom_registration != '') { ?>
												<a href="<?php echo esc_url($custom_registration); ?>" class="basic-link" target="<?php echo esc_attr($target); ?>"><?php esc_html_e('Book Online', 'vestige'); ?></a>
											<?php } else { ?>
												<a href="<?php echo esc_url(add_query_arg('reg', '1', $event_url)); ?>" class="basic-link"><?php esc_html_e('Book Online', 'vestige'); ?></a>
											<?php }
									}
									echo '</div>';
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
										?>
								</li>
							<?php }
						$i++;
						if ($i > $current_events) {
							break;
						}
					}
					if (have_posts()) : while (have_posts()) : the_post();

						endwhile;
					endif; ?>
					</ul>
					<!-- Pagination -->
					<?php if (function_exists('imic_pagination_event')) {
						imic_pagination_event(count($events), $numberPosts, $paged, get_post_type_archive_link('event'));
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