<?php
get_header();
$imic_options = get_option('imic_options');
imic_sidebar_position_module();
$invalid_name = esc_html__('You must enter your name', 'vestige');
$invalid_email = esc_html__('You must enter your email', 'vestige');
$process = esc_html__('Sending Information to Exhibition Manager...', 'vestige');
$tickets_empty = esc_html__('Please select tickets', 'vestige');
wp_enqueue_script('imic_event_register_validation');
wp_localize_script('imic_event_register_validation', 'event_registration', array('url' => admin_url('admin-ajax.php'), 'name' => $invalid_name, 'emails' => $invalid_email, 'process' => $process, 'tickets' => $tickets_empty));
if (get_query_var('reg') == 1 || get_query_var('reg') == 2 || get_query_var('reg') == 3) {
	wp_enqueue_script('imic_event_pay');
	wp_localize_script('imic_event_pay', 'event_payment', array('name' => get_query_var('reg')));
}
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
$pageSidebarOpt = (isset($imic_options['exhibitions_sidebar'])) ? $imic_options['exhibitions_sidebar'] : '';
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
$start_date = get_post_meta(get_the_ID(), 'imic_exhibition_start_dt', true);
$end_date = get_post_meta(get_the_ID(), 'imic_exhibition_end_dt', true);
$start_date_str = strtotime($start_date);
$end_date_str = strtotime($end_date);
if ($end_date < date_i18n('Y-m-d')) {
	$this_date = $end_date_str;
} else {
	if (get_query_var('exhibition_date')) {
		$this_date = get_query_var('exhibition_date');
	} else {
		$exhibitions = imic_exhibition_schedule();
		ksort($exhibitions);
		foreach ($exhibitions as $key => $value) {
			$exhibition_id = explode("|", $value);
			if ($exhibition_id[0] == get_the_ID()) {
				$this_date = date_i18n('Y-m-d', $exhibition_id[1]);
				break;
			}
		}
	}
}
update_post_meta(get_query_var('registrant'), 'imic_registrant_event_date', get_query_var('exhibition_date'));
$this_date = strtotime($this_date);
$event_url = imic_query_arg_exhibition(date('Y-m-d', $this_date), get_the_ID());
$date_diff = imic_dateDiff(date_i18n('Y-m-d', $start_date_str), date_i18n('Y-m-d', $end_date_str));
$args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all');
$venue_details = wp_get_object_terms(get_the_ID(), 'venue', $args);
$venue_title = $venue_description = $venue_address = $venue_image = $venue_link = '';
if (!empty($venue_details)) {
	$venue_title = $venue_details[0]->name;
	$venue_description = term_description($venue_details[0]->term_id, 'venue');
	$venue_link = get_term_link($venue_details[0]->term_id, 'venue');
	$venue_address = get_option("category_" . $venue_details[0]->term_id);
	$venue_address = $venue_address['VenueAddress'];
}
$event_gallery = get_post_meta(get_the_ID(), 'imic_event_gallery_images', false);
$exhibition_timing = get_post_meta(get_the_ID(), 'feat_data', true);
$timings = $select_time = '';
if (!empty($exhibition_timing)) {
	foreach ($exhibition_timing as $key => $value) {
		$timings .= '<li>' . date_i18n('G:i', $key) . ' - ' . date_i18n('G:i', $value) . '</li>';
		$select_time .= '<label class="exhibition-time toggle-label"><input type="radio" class="form-control exhibition-timings" name="exhibition-time" value="' . esc_attr(date_i18n(get_option('time_format'), $key)) . ' - ' . esc_attr(date_i18n(get_option('time_format'), $value)) . '"> ' . esc_attr(date_i18n(get_option('time_format'), $key)) . ' - ' . esc_attr(date_i18n(get_option('time_format'), $value)) . '</label>';
	}
}
$detail_tab = get_post_meta(get_the_ID(), 'imic_event_details_data', true);
$venue_tab = get_post_meta(get_the_ID(), 'imic_event_venue_data', true);
$gallery_tab = get_post_meta(get_the_ID(), 'imic_event_gallery_data', true);
$tickets_type = get_post_meta(get_the_ID(), 'tickets_type', true);
$form_type = (!empty($tickets_type)) ? 'multi' : '';
//Verify Paypal Payment
$transaction_id = isset($_REQUEST['tx']) ? esc_attr($_REQUEST['tx']) : '';
$st = '';
if ($transaction_id != '') {
	$paypal_details = imic_validate_payment($transaction_id);
	if (!empty($paypal_details)) {
		$st = $paypal_details['payment_status'];
		$payment_gross = $paypal_details['payment_gross'];
		update_post_meta(get_query_var('registrant'), 'imic_registrant_payment_status', $st);
		update_post_meta(get_query_var('registrant'), 'imic_registrant_paid_amount', $payment_gross);
	}
}
$exhibition_view = (isset($imic_options['exhibition_view'])) ? $imic_options['exhibition_view'] : 0;
$post_type_set = ($exhibition_view == 1) ? 'exhibition' : 'event';
?>
<!-- Start Body Content -->
<div class="main" role="main">
	<div id="content" class="content full single-post">
		<div class="container">
			<div class="row">
				<div class="col-md-<?php echo esc_attr($class); ?>" id="content-col">
					<?php while (have_posts()) : the_post(); ?>
						<h1 class="post-title"><?php the_title(); ?></h1>
						<?php if (has_post_thumbnail()) { ?>
							<div class="featured-image"><?php the_post_thumbnail('imic_600x400'); ?></div>
						<?php } ?>
						<div class="post-content">
							<?php the_content(); ?>
						</div>
					<?php endwhile; ?>
					<div class="spacer-20"></div>
					<?php
					if ($detail_tab == 1 || $venue_tab == 1 || $gallery_tab == 1) { ?>
						<div class="tabs exhibition-details ee-details-tab-nav">
							<ul class="nav nav-tabs">
								<?php
								if ($detail_tab == 1) { ?>
									<li> <a data-toggle="tab" href="#detailstab"> <?php esc_html_e('Details', 'vestige'); ?> </a> </li>
								<?php }
							if (($venue_description != '' || $venue_address != '') && ($venue_tab == 1)) { ?>
									<li> <a data-toggle="tab" href="#venuetab"> <?php esc_html_e('Venue', 'vestige'); ?> </a> </li>
								<?php } ?>
								<?php if ((!empty($event_gallery)) && ($gallery_tab == 1)) { ?>
									<li> <a data-toggle="tab" href="#gallerytab"> <?php esc_html_e('Gallery', 'vestige'); ?> </a> </li>
								<?php } ?>
							</ul>
							<div class="tab-content">
								<?php
								if ($detail_tab == 1) { ?>
									<div id="detailstab" class="tab-pane">
										<ul class="angles">
											<?php if ($exhibition_view != 0) {
												if ($date_diff > 0) { ?>
													<li><?php echo esc_attr(date_i18n(get_option('date_format'), $start_date_str));
															echo ' - ' . esc_attr(date_i18n(get_option('date_format'), $end_date_str)); ?></li>
												<?php } else { ?>
													<li><?php echo esc_attr(date_i18n(get_option('date_format'), $end_date_str)); ?></li>
												<?php }
										} else { ?>
												<li><?php echo esc_attr(date_i18n(get_option('date_format'), $this_date)); ?></li>
											<?php } ?>
											<?php echo '' . $timings; ?>
											<?php echo get_the_term_list(get_the_ID(), 'venue', '<li>', ', ', '</li>'); ?>
											<!--<li>$25 (Members Free)</li>-->
										</ul>
										<?php if (isset($imic_options['switch_sharing']) && $imic_options['switch_sharing'] == 1 && $imic_options['share_post_types']['3'] == '1') { ?>
											<?php imic_share_buttons(); ?>
										<?php }
									$custom_registration = get_post_meta(get_the_ID(), 'imic_custom_event_registration', true);
									$custom_registration_target = get_post_meta(get_the_ID(), 'imic_custom_event_registration_target', true);
									if ($custom_registration_target == 1) {
										$target = '_blank';
									} else {
										$target = '';
									}
									if (get_post_meta(get_the_ID(), 'imic_event_registration', true) == 1 && ($end_date >= date_i18n('Y-m-d'))) { ?>
											<div class="post-actions">
												<?php if ($custom_registration != '') { ?>
													<a href="<?php echo esc_url($custom_registration); ?>" class="btn btn-primary" target="<?php echo esc_attr($target); ?>"><?php esc_html_e('Book Online', 'vestige'); ?></a>
												<?php } else { ?>
													<a href="#" data-target="#event_register" data-toggle="modal" class="btn btn-primary"><?php esc_html_e('Book Online', 'vestige'); ?></a>
												<?php } ?>
											</div>
										<?php } ?>
									</div>
								<?php }
							if (($venue_description != '' || $venue_address != '') && ($venue_tab == 1)) { ?>
									<div id="venuetab" class="tab-pane">
										<div class="row">
											<div class="col-md-6 col-sm-6">
												<h3 class="venue-title-reg"><?php echo esc_attr($venue_title); ?></h3>
												<?php echo '' . $venue_description; ?>
												<a href="<?php echo esc_url($venue_link); ?>" class="btn btn-primary"><?php esc_html_e('Learn more', 'vestige'); ?></a>
											</div>
											<div class="col-md-6 col-sm-6">
												<?php echo do_shortcode('[gmap address="' . $venue_address . '"]'); ?>
											</div>
										</div>
									</div>
								<?php }
							if ((!empty($event_gallery)) && ($gallery_tab == 1)) { ?>
									<div id="gallerytab" class="tab-pane">
										<ul class="gallery-grider format-gallery">
											<?php foreach ($event_gallery as $gallery) {
												$image_small = wp_get_attachment_image_src($gallery, 'imic_600x400');
												$image_big = wp_get_attachment_image_src($gallery, 'imic_1000x800');
												$image_title = get_the_title($gallery);
												if (!empty($image_small)) {

													if (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 0) {
														$Lightbox_init = '<a href="' . esc_url($image_big[0]) . '" data-rel="prettyPhoto[gallery]" class="media-box">';
													} elseif (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 1) {
														$Lightbox_init = '<a href="' . esc_url($image_big[0]) . '" title="' . $image_title . '" class="media-box magnific-gallery-image">';
													}
													?>
													<li class="format-image"><?php echo '' . $Lightbox_init; ?><img src="<?php echo esc_url($image_small[0]); ?>" alt="<?php echo esc_attr($image_title); ?>"></a></li>
												<?php }
										} ?>
										</ul>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				</div>
				<?php $exhibition = imic_exhibition_schedule();

				?>
				<?php if (is_active_sidebar($pageSidebar)) { ?>
					<!-- Sidebar -->
					<div class="sidebar col-md-<?php echo esc_attr($sidebar_column); ?>" id="sidebar-col">
						<?php dynamic_sidebar($pageSidebar); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!--Event Registration Popup Start-->
<?php
$custom_modal_header = get_post_meta($id, 'imic_cpopup_header', true);
$custom_modal_body = get_post_meta($id, 'imic_cpopup_body', true);
$custom_modal_footer = get_post_meta($id, 'imic_cpopup_footer', true);
$paypal_payment = (isset($imic_options['paypal_site'])) ? $imic_options['paypal_site'] : '';
$paypal_payment = ($paypal_payment == "1") ? "https://www.paypal.com/cgi-bin/webscr" : "https://www.sandbox.paypal.com/cgi-bin/webscr";
$paypal_src = (!empty($tickets_type)) ? $paypal_payment : '';
$business_email = (isset($imic_options['paypal_email'])) ? $imic_options['paypal_email'] : '';
$paypal_currency = (isset($imic_options['paypal_currency'])) ? $imic_options['paypal_currency'] : 'USD';
wp_localize_script('imic_event_register_validation', 'event_registration_new', array('paypal_src' => $paypal_src, 'reg' => esc_html__('Register', 'vestige'), 'pays' => esc_html__('Proceed to Paypal', 'vestige'), 'formtype' => $form_type));
?>
<div class="modal fade" id="event_register" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="event_registerLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<?php if ($custom_modal_header != '') {
					echo '<h4>' . esc_attr($custom_modal_header) . '</h4>';
				} else { ?>
					<h4 class="modal-title" id="myModalLabel"><?php esc_html_e('Register for Exhibition: ', 'vestige'); ?><span class="accent-color payment-to-cause"><?php echo get_the_title(); ?></span></h4>
				<?php } ?>
			</div>
			<div class="modal-body">
				<?php if ($custom_modal_body != '') {
					echo do_shortcode($custom_modal_body);
				} else { ?>
					<form id="event_register_form" class="" name="" class="" action="<?php echo esc_url($paypal_src); ?>" method="post">
						<div class="row">
							<div class="col-md-6">
								<input type="text" value="" id="username" name="fname" class="form-control" placeholder="<?php esc_html_e('First name', 'vestige'); ?> (Required)">
								<input type="hidden" value="<?php echo esc_attr(get_the_ID()); ?>" id="event_id">
								<input type="hidden" value="<?php echo esc_attr(date_i18n(get_option('date_format'), $this_date)); ?>" id="event_date">
							</div>
							<div class="col-md-6">
								<input id="lastname" type="text" value="" name="lname" class="form-control" placeholder="<?php esc_html_e('Last name', 'vestige'); ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<input type="text" value="" name="email" id="email" class="form-control" placeholder="<?php esc_html_e('Your email', 'vestige'); ?> (Required)">
							</div>
							<div class="col-md-6">
								<input id="phone" type="phone" name="phone" class="form-control" placeholder="<?php esc_html_e('Your phone', 'vestige'); ?>">
								<input type="hidden" value="<?php echo esc_attr($post_type_set); ?>" id="post_type" name="post_type">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<textarea id="address" rows="3" cols="5" class="form-control" placeholder="<?php esc_html_e('Your Address', 'vestige'); ?>"></textarea>
							</div>
							<div class="col-md-6">
								<textarea id="notes" rows="3" cols="5" class="form-control" placeholder="<?php esc_html_e('Additional Notes', 'vestige'); ?>"></textarea>
							</div>
							<div class="col-md-12">
								<?php echo esc_attr__('Choose time: ', 'vestige') . $select_time; ?>
							</div>
							<?php if ($exhibition_view == 1) { ?>
								<div class="col-md-12">
									<?php echo esc_attr__('Choose Date: ', 'vestige'); ?>
									<?php if ($date_diff > 0) { ?>
										<select class="selectpicker" id="exhibition_date" name="exhibition_date">
											<!--<option value="0"><?php esc_html_e('Select Date', 'vestige'); ?></option>-->
											<?php for ($i = 0; $i <= $date_diff; $i++) {
												$date = date_i18n('Y-m-d', strtotime($start_date . ' +' . $i . ' day'));
												if ($date >= date_i18n('Y-m-d')) {
													echo '<option value="' . $date . '">' . $date . '</option>';
												}
											}
											?>
										</select>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
						<?php
						$book_number = 1;
						if (!empty($tickets_type)) {
							echo '<table width="100%" class="table-tickets">';
							echo '<tr class="head-table-tickets">';
							echo '<td>' . esc_attr__('Type', 'vestige') . '</td>';
							echo '<td>' . esc_attr__('Available ', 'vestige') . '</td>';
							echo '<td>' . esc_attr__('Price', 'vestige') . '</td>';
							echo '<td>' . esc_attr__('Quantity', 'vestige') . '</td>';
							echo '<td>' . esc_attr__('Total', 'vestige') . '</td>';
							echo '</tr>';
							foreach ($tickets_type as $tickets) {
								$available_ticket = intval($tickets[1]) - intval($tickets[2]);
								$available_ticket = ($available_ticket >= 0) ? $available_ticket : 0;
								$field_tickets_available = ($available_ticket > 10) ? 10 : $available_ticket;


								echo '<tr>';
								echo '<td>' . $tickets[0] . '</td>';
								echo '<td>' . esc_attr($available_ticket) . '</td>';
								if (is_int($tickets[3])) {
									echo '<td>' . $paypal_currency . ' ' . esc_attr($tickets[3]) . '</td>';
								} elseif ($tickets[3] == '') {
									echo '<td>' . esc_html__('Free', 'vestige') . '</td>';
								} else {
									echo '<td>' . esc_attr($tickets[3]) . '</td>';
								}
								echo '<td>';
								if ($available_ticket > 0) {
									echo '<select data-title="' . $tickets[0] . '" data-price="' . esc_attr($tickets[3]) . '" class="event-tickets selectpicker">';
									for ($x = 0; $x <= $field_tickets_available; $x++) {
										echo '<option value="' . esc_attr($x) . '">' . esc_attr($x) . '</option>';
									}
									echo '</select>';
								} else {
									echo '<label>' . esc_attr_e('All Tickets Booked', 'vestige') . '</label>';
								}
								echo '</td>';
								echo '<td>';
								if ($available_ticket > 0 && $tickets[3] > 0) {
									//Tickets Total Price
									echo '' . esc_attr__('Total: ', 'vestige') . $paypal_currency . ' <span class="total-cost-event"></span></label>';
								}
								echo '</td>';
								echo '</tr>';


								$book_number++;
							}
							echo '<input type="hidden" name="rm" value="2">';
							echo '<input type="hidden" name="amount" value="">';
							echo '<input type="hidden" name="cmd" value="_xclick">';
							echo '<input type="hidden" name="business" value="' . $business_email . '">';
							echo '<input type="hidden" name="currency_code" value="' . $paypal_currency . '">';
							echo '<input type="hidden" name="item_name" value="' . stripslashes(get_the_title(get_the_ID())) . '">';
							echo '<input type="hidden" name="item_number" value="' . get_the_ID() . '">';
							echo '<input type="hidden" name="return" value="' . esc_url($event_url) . '" />';
						}
						echo '</table>';
						?>
						<?php
						wp_nonce_field('ajax-exhibition-nonce', 'security');
						if (empty($tickets_type) || $form_type == 'multi' || $form_type == '') { ?>
							<input id="submit-registration" type="submit" name="donate" class="btn btn-primary btn-lg btn-block" value="<?php esc_html_e('Register', 'vestige'); ?>">
						<?php } elseif ($available_ticket > 0) { ?>
							<input id="submit-registration" type="submit" name="donate" class="btn btn-primary btn-lg btn-block" value="<?php esc_html_e('Proceed to Paypal', 'vestige'); ?>">
						<?php } ?><br />
						<div class="message"></div>
					</form>
				<?php } ?>
			</div>
			<div class="modal-footer">
				<?php if ($custom_modal_footer != '') {
					echo esc_attr($custom_modal_footer);
				} else { ?>
					<p class="small short"><?php esc_html_e('Make sure to copy Registration number after successful submission.', 'vestige'); ?></p>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!--Event Registration Popup End-->
<!--Event Payment Thanks Popup-->
<div class="modal fade" id="event_register_thanks" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="event_register_thanksLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php esc_html_e('Registered Successfully', 'vestige'); ?></h4>
			</div>
			<div class="modal-body">
				<div class="text-align-center error-404">
					<h1 class="huge"><?php esc_html_e('Thanks', 'vestige'); ?></h1>
					<hr class="sm">
					<p><strong><?php esc_html_e('Thank you for payment.', 'vestige'); ?></strong></p>
					<p><?php esc_html_e('Your payment is verified online.', 'vestige');
							echo '<br>';
							esc_html_e('Your payment status showing payment ', 'vestige');
							echo '<strong>' . $st . '</strong>'; ?></p>
				</div>
			</div>
			<div class="modal-footer">
				<a href="" id="find-ticket" class="btn btn-primary btn-lg btn-block"><?php echo esc_attr_e('Find Ticket', 'vestige'); ?></a>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>