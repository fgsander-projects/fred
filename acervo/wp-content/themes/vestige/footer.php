<?php
$menu_locations = get_nav_menu_locations();
global $vestige_allowed_tags;
$imic_options = get_option('imic_options');
?>
<?php if (is_active_sidebar('footer-sidebar')) : ?>
	<!-- Start site footer -->
	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<?php dynamic_sidebar('footer-sidebar'); ?>
			</div>
		</div>
	</footer>
<?php endif; ?>
<footer class="site-footer-bottom">
	<div class="container">
		<div class="row">
			<?php
			if (isset($imic_options['footer_copyright_text']) && !empty($imic_options['footer_copyright_text'])) { ?>
				<div class="col-md-6 col-sm-6 copyrights-left">
					<?php echo wp_kses($imic_options['footer_copyright_text'], $vestige_allowed_tags); ?>
				</div>
			<?php } ?>
			<div class="col-md-6 col-sm-6 copyrights-right">
				<ul class="pull-right social-icons-colored">
					<?php
					$socialSites = (isset($imic_options['footer_social_links'])) ? $imic_options['footer_social_links'] : array();
					foreach ($socialSites as $key => $value) {
						$string = substr($key, 3);
						if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
							echo '<li class="' . $string . '"><a href="mailto:' . $value . '"><i class="fa ' . $key . '"></i></a></li>';
						}
						if (filter_var($value, FILTER_VALIDATE_URL)) {
							echo '<li class="' . $string . '"><a href="' . esc_url($value) . '" target="_blank"><i class="fa ' . $key . '"></i></a></li>';
						} elseif ($key == 'fa-skype' && $value != '' && $value != 'Enter Skype ID') {
							echo '<li class="' . $string . '"><a href="skype:' . $value . '?call"><i class="fa ' . $key . '"></i></a></li>';
						}
					}
					?>
				</ul>
			</div>
		</div>
	</div>
</footer>
<!-- End site footer -->
<?php if (isset($imic_options['enable_backtotop']) && $imic_options['enable_backtotop'] == 1) {
	echo '<a id="back-to-top"><i class="fa fa-angle-double-up"></i></a> ';
}
$payment_gross = '';
$registrant_id = get_query_var('registrant');
$imic_reg_user = $imic_reg_id = $imic_exhibition_time = $imic_exhibition_date = $venue_title = '';
if ($registrant_id != '') {
	$transaction_id = isset($_REQUEST['tx']) ? esc_attr($_REQUEST['tx']) : '';
	$payment_gross = isset($_REQUEST['amt']) ? esc_attr($_REQUEST['amt']) : '';

	$imic_reg_user = get_the_title($registrant_id);
	$imic_reg_id = get_post_meta($registrant_id, 'imic_registrant_registration_number', true);
	$imic_exhibition_time = get_post_meta($registrant_id, 'imic_registrant_exhibition_time', true);
	if (get_post_type(get_the_ID()) == "event") {
		$imic_exhibition_time = get_post_meta(get_the_ID(), 'imic_event_start_dt', true);
		$imic_exhibition_time = strtotime($imic_exhibition_time);
		$imic_exhibition_time = date_i18n(get_option('time_format'), $imic_exhibition_time);
	}
	$imic_exhibition_date = get_post_meta($registrant_id, 'imic_registrant_event_date', true);
	$imic_exhibition_date = strtotime($imic_exhibition_date);
	$imic_exhibition_date = date_i18n(get_option('date_format'), $imic_exhibition_date);
} else {
	if (get_post_type(get_the_ID()) == "event") {
		$imic_exhibition_time = get_post_meta(get_the_ID(), 'imic_event_start_dt', true);
		$imic_exhibition_time = strtotime($imic_exhibition_time);
		$imic_exhibition_time = date_i18n(get_option('time_format'), $imic_exhibition_time);
	}
}
$args = array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all');
$venue_details = wp_get_object_terms(get_the_ID(), 'venue', $args);
if (!is_wp_error($venue_details)) {
	$venue_title = (isset($venue_details[0])) ? $venue_details[0]->name : '';
}
$paypal_currency = (isset($imic_options['paypal_currency'])) ? $imic_options['paypal_currency'] : 'USD'; ?>
</div>
<!--Ticket Modal-->
<div class="modal fade" id="ticketModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><?php esc_attr_e('Your ticket for the: ', 'vestige');
																									echo get_the_title(); ?></h4>
			</div>
			<div class="modal-body">
				<!-- Event Register Tickets -->
				<div class="ticket-booking-wrapper">
					<div class="ticket-booking">
						<div class="event-ticket ticket-form">
							<div class="event-ticket-left">
								<div class="ticket-id"><?php echo esc_attr($imic_reg_id); ?></div>
								<div class="ticket-handle"></div>
								<div class="ticket-cuts ticket-cuts-top"></div>
								<div class="ticket-cuts ticket-cuts-bottom"></div>
							</div>
							<div class="event-ticket-right">
								<div class="event-ticket-right-inner">
									<div class="row">
										<div class="col-md-9 col-sm-9">
											<span class="registerant-info">
												<?php echo esc_attr($imic_reg_user); ?>
											</span>
											<span class="meta-data"><?php esc_html_e('Title', 'vestige'); ?></span>
											<h4 id="dy-event-title"><?php echo get_the_title(); ?></h4>
										</div>
										<div class="col-md-3 col-sm-3">
											<span class="ticket-cost"><?php echo esc_attr($paypal_currency) . ' ' . esc_attr($payment_gross); ?></span>
										</div>
									</div>
									<div class="event-ticket-info">
										<div class="row">
											<div class="col">
												<p class="ticket-col" id="dy-event-date"><?php echo esc_attr($imic_exhibition_date); ?></p>
											</div>
											<div class="col">
												<p class="ticket-col event-location" id="dy-event-location"><?php echo esc_attr($venue_title); ?></p>
											</div>
											<div class="col">
												<p id="dy-event-time"><?php echo esc_attr($imic_exhibition_time); ?></p>
											</div>
										</div>
									</div>
									<span class="event-area"></span>
									<div class="row">
										<div class="col-md-12">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default inverted" data-dismiss="modal"><?php esc_attr_e('Close', 'vestige'); ?></button>
				<button type="button" class="btn btn-primary" onClick="window.print()"><?php esc_attr_e('Print', 'vestige'); ?></button>
			</div>
		</div>
	</div>
</div>
<!-- End Boxed Body -->
<!-- LIGHTBOX INIT -->
<?php
if (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 0) { ?>
	<script>
		jQuery(document).ready(function() {
			jQuery("a[data-rel^='prettyPhoto'], .gallery .gallery-item a").prettyPhoto({
				opacity: <?php if (isset($imic_options['prettyphoto_opacity']) && $imic_options['prettyphoto_opacity'] != "") {
										echo esc_attr($imic_options['prettyphoto_opacity']);
									} ?>,
				social_tools: "",
				deeplinking: false,
				allow_resize: false,
				<?php if (isset($imic_options['prettyphoto_title']) && $imic_options['prettyphoto_title'] == 0) {
					echo 'show_title:true';
				} else {
					echo 'show_title:false';
				} ?>,
				theme: '<?php if (isset($imic_options['prettyphoto_theme']) && $imic_options['prettyphoto_theme'] != "") {
									echo esc_attr($imic_options['prettyphoto_theme']);
								} ?>',
			});
		});
	</script>
<?php } elseif (isset($imic_options['switch_lightbox']) && $imic_options['switch_lightbox'] == 1) { ?>
	<script>
		jQuery(document).ready(function() {
			jQuery('.format-gallery').magnificPopup({
				delegate: 'a.magnific-gallery-image', // child items selector, by clicking on it popup will open
				type: 'image',
				gallery: {
					enabled: true
				}
				// other options
			});
			jQuery('.magnific-image').magnificPopup({
				type: 'image'
				// other options
			});
			jQuery('.magnific-video').magnificPopup({
				type: 'iframe'
				// other options
			});
			/*jQuery('.sow-image-container a').magnificPopup({
				type: 'image',
				image: {
					titleSrc: function(item) {return item.el.find('img').attr('alt');}
				}
			});*/
			jQuery('.gallery .gallery-item').magnificPopup({
				type: 'image',
				delegate: 'a',
				gallery: {
					enabled: true
				},
				image: {
					titleSrc: function(item) {
						return item.el.find('img').attr('alt');
					}
				}
			});
		});
	</script>
<?php }
?>
<?php wp_footer(); ?>
<?php $SpaceBeforeBody = (isset($imic_options['space-before-body'])) ? $imic_options['space-before-body'] : '';
echo '' . $SpaceBeforeBody;
?>
</body>

</html>