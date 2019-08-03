<?php
class Vestige_Core_Features
{
    public function __construct()
    {
        if (current_user_can('edit_posts') && current_user_can('edit_pages')) {
            add_filter('mce_external_plugins', array($this, 'imic_add_tinymce_plugin'));
            add_filter('mce_buttons', array($this, 'imic_register_shortcode_button'));
        }
    }

    public function imic_register_shortcode_button($button)
    {
        array_push($button, 'separator', 'imicframework_shortcodes');
        return $button;
    }

    public function imic_add_tinymce_plugin($plugins)
    {
        $plugins['imicframework_shortcodes'] = VESTIGE_CORE__PLUGIN_URL . 'shortcodes/imic-shortcodes/tinymce.editor.plugin.js';
        return $plugins;
    }
}
function vestige_core_initialize_features()
{
    new Vestige_Core_Features;
}
add_action('init', 'vestige_core_initialize_features');
//Remove Redux Framework Notices
function imic_remove_redux_notices()
{ // Be sure to rename this function to something more unique
    if (class_exists('ReduxFrameworkPlugin')) {
        remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2);
    }
    if (class_exists('ReduxFrameworkPlugin')) {
        remove_action('admin_notices', array(ReduxFrameworkPlugin::get_instance(), 'admin_notices'));
    }
}
add_action('init', 'imic_remove_redux_notices');

if (is_admin()) {
    $plugin = 'wordpress-seo/wp-seo.php';
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
    if (!is_plugin_active($plugin)) {
        $taxonomy = 'venue';
        add_action("{$taxonomy}_edit_form_fields", 'add_form_fields_venue', 10, 2);
        remove_filter('pre_term_description', 'wp_filter_kses');
        remove_filter('term_description', 'wp_kses_data');
        $taxonomy = 'artwork-artists';
        add_action("{$taxonomy}_edit_form_fields", 'add_form_fields_artist', 10, 2);
    }
}

if (!function_exists('imic_validate_payment')) {
    function imic_validate_payment($tx)
    {
        // Init cURL
        $request = curl_init();
        global $imic_options;
        $paypal_payment = $imic_options['paypal_site'];
        $paypal_payment = ($paypal_payment == "1") ? "https://www.paypal.com/cgi-bin/webscr" : "https://www.sandbox.paypal.com/cgi-bin/webscr";
        // Set request options
        curl_setopt_array($request, array(
            CURLOPT_URL => $paypal_payment,
            CURLOPT_POST => TRUE,
            CURLOPT_POSTFIELDS => http_build_query(array(
                'cmd' => '_notify-synch',
                'tx' => $tx,
                'at' => $imic_options['paypal_token'],
            )),
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HEADER => FALSE,
            // CURLOPT_SSL_VERIFYPEER => TRUE,
            // CURLOPT_CAINFO => 'cacert.pem',
        ));
        // Execute request and get response and status code
        $response = curl_exec($request);
        $status   = curl_getinfo($request, CURLINFO_HTTP_CODE);

        // Close connection
        curl_close($request);
        // Remove SUCCESS part (7 characters long)
        $response = substr($response, 7);

        // URL decode
        $response = urldecode($response);
        // Turn into associative array
        preg_match_all('/^([^=\s]++)=(.*+)/m', $response, $m, PREG_PATTERN_ORDER);
        $response = array_combine($m[1], $m[2]);

        // Fix character encoding if different from UTF-8 (in my case)
        if (isset($response['charset']) and strtoupper($response['charset']) !== 'UTF-8') {
            foreach ($response as $key => &$value) {
                $value = mb_convert_encoding($value, 'UTF-8', $response['charset']);
            }
            $response['charset_original'] = $response['charset'];
            $response['charset'] = 'UTF-8';
        }
        // Sort on keys for readability (handy when debugging)
        ksort($response);
        return $response;
    }
}
if (class_exists('Woocommerce')) {
    // Remove Woocommerce redirect setup page
    if (!function_exists('remove_class_filters')) {
        function remove_class_filters($tag, $class, $method)
        {
            $filters = $GLOBALS['wp_filter'][$tag];
            if (empty($filters)) {
                return;
            }
            foreach ($filters as $priority => $filter) {
                foreach ($filter as $identifier => $function) {
                    if (is_array($function) and is_a($function['function'][0], $class) and $method === $function['function'][1]) {
                        remove_filter(
                            $tag,
                            array($function['function'][0], $method),
                            $priority
                        );
                    }
                }
            }
        }
    }
    add_action('admin_init', 'disable_shop_redirect', 0);
    function disable_shop_redirect()
    {
        remove_class_filters(
            'admin_init',
            'WC_Admin',
            'admin_redirects'
        );
    }
}

//Add New Custom Menu Option
if (!class_exists('IMIC_Custom_Nav')) {
    class IMIC_Custom_Nav
    {
        public function imic_add_nav_menu_meta_boxes()
        {

            add_meta_box(
                'mega_nav_link',
                esc_html__('Mega Menu', 'vestige'),
                array($this, 'imic_nav_menu_link'),
                'nav-menus',
                'side',
                'low'
            );
        }
        public function imic_nav_menu_link()
        {

            global $_nav_menu_placeholder, $nav_menu_selected_id;
            $_nav_menu_placeholder = 0 > $_nav_menu_placeholder ? $_nav_menu_placeholder - 1 : -1;

            ?>
        <div id="posttype-wl-login" class="posttypediv">
            <div id="tabs-panel-wishlist-login" class="tabs-panel tabs-panel-active">
                <ul id="wishlist-login-checklist" class="categorychecklist form-no-clear">
                    <li>
                        <label class="menu-item-title">
                            <input type="checkbox" class="menu-item-object-id" name="menu-item[<?php echo '' . $_nav_menu_placeholder; ?>][menu-item-object-id]" value="<?php echo '' . $_nav_menu_placeholder; ?>"> <?php esc_html_e('Create Column', 'vestige'); ?>
                        </label>
                        <input type="hidden" class="menu-item-db-id" name="menu-item[<?php echo '' . $_nav_menu_placeholder; ?>][menu-item-db-id]" value="0">
                        <input type="hidden" class="menu-item-object" name="menu-item[<?php echo '' . $_nav_menu_placeholder; ?>][menu-item-object]" value="page">
                        <input type="hidden" class="menu-item-parent-id" name="menu-item[<?php echo '' . $_nav_menu_placeholder; ?>][menu-item-parent-id]" value="0">
                        <input type="hidden" class="menu-item-type" name="menu-item[<?php echo '' . $_nav_menu_placeholder; ?>][menu-item-type]" value="">
                        <input type="hidden" class="menu-item-title" name="menu-item[<?php echo '' . $_nav_menu_placeholder; ?>][menu-item-title]" value="<?php _e('Column', 'vestige'); ?>">
                        <input type="hidden" class="menu-item-classes" name="menu-item[<?php echo '' . $_nav_menu_placeholder; ?>][menu-item-classes]" value="custom_mega_menu">
                    </li>
                </ul>
            </div>
            <p class="button-controls">
                <span class="add-to-menu">
                    <input type="submit" class="button-secondary submit-add-to-menu right" value="<?php esc_html_e('Add to Menu', 'vestige'); ?>" name="add-post-type-menu-item" id="submit-posttype-wl-login">
                    <span class="spinner"></span>
                </span>
            </p>
        </div>
    <?php }
}
}
$custom_nav = new IMIC_Custom_Nav;
add_action('admin_init', array($custom_nav, 'imic_add_nav_menu_meta_boxes'));
require_once VESTIGE_CORE__PLUGIN_PATH . 'shortcodes/shortcodes.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/meta-box/meta-box.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/meta-box-show-hide/meta-box-show-hide.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/meta-box-conditional-logic/meta-box-conditional-logic.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/meta-box-group/meta-box-group.php';
if (!class_exists('ReduxFramework')) {
    include_once VESTIGE_CORE__PLUGIN_PATH . 'imi-admin/theme-options/ReduxCore/framework.php';
}
if (is_admin()) {
    include_once VESTIGE_CORE__PLUGIN_PATH . 'imi-admin/admin.php';
}
//Meta Boxes
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/artist_picture_field.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/exhibition_meta.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/exhibition_tickets_clone_fields.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/extra_category_field.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/registrant_tickets_field.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/taxonomy_banner.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/term_color_picker.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/tickets_clone_fields.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'meta-boxes/venue_address_field.php';
//Widgets
require_once VESTIGE_CORE__PLUGIN_PATH . 'widgets/upcoming_events.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'widgets/selected_post.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'widgets/custom_category.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'widgets/upcoming_exhibitions.php';
