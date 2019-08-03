<?php

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}
$plugin_data = get_plugins();
$vestige_core_data = (isset($plugin_data['vestige-core/vestige.php'])) ? $plugin_data['vestige-core/vestige.php'] : '';
if ($vestige_core_data) {
	if (isset($vestige_core_data['Version']) && $vestige_core_data['Version'] > 1.4) {
		return;
	}
}
if (class_exists('Vestige_Core_Features')) {
	//return;
}
//if (!class_exists('Vestige_Core_Features')) {
add_action('admin_menu', 'vestige_welcome_page_menu');
add_action('admin_notices', 'vestige_admin_notice');

function vestige_admin_notice()
{
	global $pagenow;
	echo '<div class="error notice" style="height:100px;"><div style="height:40px;"><div id="vestige-admin-notices"><h1>' . esc_html__('Vestige Theme Urgent Message!', 'vestige') . '</h1></div></div><p>' . esc_html__('Please install/update the Vestige core plugin now, its mandatory to keep this plugin always activated to use all features of this theme.', 'vestige') . '</p><a href="' . esc_url(site_url('/wp-admin/themes.php?page=vestige')) . '">' . esc_html__('Install/Update plugin here', 'vestige') . '</a></div>';
}
//}

function vestige_welcome_page_menu()
{
	add_theme_page(
		'Vestige',
		'Vestige',
		'manage_options',
		'vestige',
		'vestige_welcome_page'
	);
}

function vestige_welcome_page()
{
	?>
	<div class="wrap about-wrap imi-admin-wrap">

		<h1><?php echo esc_html__('Thanks for using Vestige Theme', 'vestige'); ?></h1>
		<div class="about-text"><?php echo esc_html__('Vestige', 'vestige') . esc_html__(' is now installed and ready to use! Please install/update and activate the core plugin from below to get all the features of this theme.', 'vestige'); ?></div>
		<div class="wp-badge"></div>

		<div id="imi-dashboard" class="wrap about-wrap">
			<div class="welcome-content imi-clearfix">
				<div id="imi-dashboard" class="wrap about-wrap">
					<div class="welcome-content imi-clearfix extra">
						<div class="imi-row">
							<div class="imi-col-sm-12">

								<div class="imi-plugins imi-theme-browser-wrap">
									<div class="theme-browser rendered">
										<div class="themes">
											<div class="theme ">

												<div class="plugin-requirement plugin-required"><?php esc_html_e('REQUIRED', 'vestige'); ?></div>

												<div class="theme-screenshot">
													<img src="<?php echo esc_url(get_template_directory_uri() . '/framework/tgm/images/plugin-core.png'); ?>" alt="Screen">
												</div>

												<h3 class="theme-name"><?php esc_html_e('Add core features of theme', 'vestige'); ?></h3>
												<?php
												if (!function_exists('is_plugin_inactive')) {
													require_once(ABSPATH . '/wp-admin/includes/plugin.php');
												}

												if (is_plugin_inactive('vestige-core/vestige-core.php')) {
													//plugin is not activated
													$vestige_core_plugin = WP_PLUGIN_DIR . '/vestige-core';
													if (is_file($vestige_core_plugin . '/vestige-core.php')) {
														if (empty($wp_filesystem)) {
															require_once ABSPATH . '/wp-admin/includes/file.php';
															WP_Filesystem();
														}
														global $wp_filesystem;
														if ($wp_filesystem) {
															$wp_filesystem->delete($vestige_core_plugin, true);
														}
													}
												}

												?>
												<div class="theme-actions">
													<div class="row-actions visible">
														<span class="install">
															<?php
															if (is_plugin_inactive('vestige-core/vestige.php')) {
																?>
																<a href="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=tgmpa-install-plugins&amp;plugin=vestige-core&amp;tgmpa-install=install-plugin&amp;tgmpa-nonce=<?php echo esc_attr(wp_create_nonce('tgmpa-install')); ?>" data-plugin-action="install" class="button imi-admin-btn">Activate <span class="screen-reader-text"><?php esc_html_e('Add core features of theme', 'vestige'); ?></span>
																</a>
															<?php
														} else {
															?>
																<a href="<?php echo esc_url(home_url()); ?>/wp-admin/themes.php?page=tgmpa-install-plugins&amp;plugin=vestige-core&amp;tgmpa-update=update-plugin&amp;tgmpa-nonce=<?php echo esc_attr(wp_create_nonce('tgmpa-update')); ?>" data-plugin-action="update" class="button imi-admin-btn">Update <span class="screen-reader-text"><?php esc_html_e('Add core features of theme', 'vestige'); ?></span>
																</a>
															<?php
														}
														?>
														</span>
													</div>
													<button type="button" class="toggle-row">
														<span class="screen-reader-text">Show more details</span>
													</button>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- end wrap -->
<?php
}

class IMI_Admin_Default
{

	public function __construct()
	{


		add_filter('tgmpa_load', array($this, 'tgmpa_load'), 10);
		add_action('wp_ajax_imi_install_plugin', array($this, 'install_plugin'));
		add_action('wp_ajax_imi_activate_plugin', array($this, 'activate_plugin'));
		add_action('wp_ajax_imi_deactivate_plugin', array($this, 'deactivate_plugin'));
		add_action('wp_ajax_imi_update_plugin', array($this, 'update_plugin'));
		add_action('after_switch_theme', array($this, 'after_switch_theme'));
	}

	public function tgmpa_load($load)
	{
		return true;
	}

	public function install_plugin()
	{

		if (current_user_can('manage_options')) {

			check_admin_referer('tgmpa-install', 'tgmpa-nonce');

			global $tgmpa;

			$tgmpa->install_plugins_page();

			$url = wp_nonce_url(
				add_query_arg(
					array(
						'plugin'			=> urlencode($_GET['plugin']),
						'tgmpa-deactivate'	=> 'deactivate-plugin',
					),
					$tgmpa->get_tgmpa_url()
				),
				'tgmpa-deactivate',
				'tgmpa-nonce'
			);

			echo 'imi';
			echo wp_specialchars_decode($url);
		}

		// this is required to terminate immediately and return a proper response
		wp_die();
	}

	public function after_switch_theme()
	{
		if (is_admin() && current_user_can('manage_options') && !class_exists('Vestige_Core_Features')) {
			wp_redirect(admin_url('themes.php?page=vestige'));
		}
	}

	public function activate_plugin()
	{

		if (current_user_can('edit_theme_options')) {

			check_admin_referer('tgmpa-activate', 'tgmpa-nonce');

			global $tgmpa;

			$plugins = $tgmpa->plugins;

			foreach ($plugins as $plugin) {

				if (isset($_GET['plugin']) && $plugin['slug'] === $_GET['plugin']) {

					activate_plugin($plugin['file_path']);

					$url = wp_nonce_url(
						add_query_arg(
							array(
								'plugin'			=> urlencode($_GET['plugin']),
								'tgmpa-deactivate'	=> 'deactivate-plugin',
							),
							$tgmpa->get_tgmpa_url()
						),
						'tgmpa-deactivate',
						'tgmpa-nonce'
					);

					echo wp_specialchars_decode($url);
				}
			} // foreach

		}

		// this is required to terminate immediately and return a proper response
		wp_die();
	}

	public function deactivate_plugin()
	{

		if (current_user_can('edit_theme_options')) {

			check_admin_referer('tgmpa-deactivate', 'tgmpa-nonce');

			global $tgmpa;

			$plugins = $tgmpa->plugins;

			foreach ($plugins as $plugin) {

				if (isset($_GET['plugin']) && $plugin['slug'] === $_GET['plugin']) {

					deactivate_plugins($plugin['file_path']);

					$url = wp_nonce_url(
						add_query_arg(
							array(
								'plugin'			=> urlencode($_GET['plugin']),
								'tgmpa-activate'	=> 'activate-plugin',
							),
							$tgmpa->get_tgmpa_url()
						),
						'tgmpa-activate',
						'tgmpa-nonce'
					);

					echo wp_specialchars_decode($url);
				}
			} // foreach

		}

		// this is required to terminate immediately and return a proper response
		wp_die();
	}

	public function update_plugin()
	{
		if (current_user_can('manage_options')) {
			check_admin_referer('tgmpa-update', 'tgmpa-nonce');
			global $tgmpa;
			$tgmpa->install_plugins_page();

			$url = wp_nonce_url(
				add_query_arg(
					array(
						'plugin'			=> urlencode($_GET['plugin']),
						'tgmpa-deactivate'	=> 'deactivate-plugin',
					),
					$tgmpa->get_tgmpa_url()
				),
				'tgmpa-deactivate',
				'tgmpa-nonce'
			);

			echo 'imi';
			echo wp_specialchars_decode($url);
		}

		// this is required to terminate immediately and return a proper response
		wp_die();
	}
}

new IMI_Admin_Default();
