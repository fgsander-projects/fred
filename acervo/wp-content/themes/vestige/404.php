<?php
header("HTTP/1.1 404 Not Found");
header("Status: 404 Not Found");
get_header();
$imic_options = get_option('imic_options');
$event_image = (isset($imic_options['header_image'])) ? $imic_options['header_image']['url'] : '';
?>
<div class="page-header parallax clearfix" style="background-image:url(<?php echo esc_url($event_image); ?>);">
	<div class="title-subtitle-holder">
		<div class="title-subtitle-holder-inner">
			<h2><?php esc_html_e('404 Error!', 'vestige'); ?></h2>
		</div>
	</div>
</div>
<!-- End Page Header --><?php if (function_exists('bcn_display')) { ?>
	<!-- Breadcrumbs -->
	<div class="lgray-bg breadcrumb-cont">
		<div class="container">

			<ol class="breadcrumb">
				<?php bcn_display(); ?>
			</ol>

		</div>
	</div><?php } ?>
<!-- Start Body Content -->
<div class="main" role="main">
	<div id="content" class="content full">
		<div class="container">
			<div class="text-align-center error-404">
				<h1 class="huge"><?php esc_html_e('404', 'vestige'); ?></h1>
				<hr class="sm">
				<p><strong><?php esc_html_e('Sorry - Page Not Found!', 'vestige'); ?></strong></p>
				<p><?php esc_html_e('The page you are looking for was moved, removed, renamed', 'vestige');
					echo '<br>';
					esc_html_e('or might never existed. You stumbled upon a broken link', 'vestige'); ?></p>
			</div>
		</div>
	</div>
</div>
<!-- End Body Content -->
<?php get_footer(); ?>