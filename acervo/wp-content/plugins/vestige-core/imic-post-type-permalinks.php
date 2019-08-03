<?php
/*
 * 	Copyright IMIC 2014 
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
add_action('admin_init', 'imicPermalinkSettingAtStart');
/**
 * Start  permalink settings
 */
function imicPermalinkSettingAtStart() {
// Add a section to the permalinks page
add_settings_section('imic_setting_section',
__("Permalink Setting for custom post type",'framework'),
'setting_section_callback_function',
'permalink'
);
$post_types = get_post_types( array('_builtin' => false), 'names' ); 
foreach ($post_types as $post_type):
if($post_type=='exhibition' || $post_type=='event' || $post_type=='artwork' || $post_type=='team') {
	if(isset($_POST['submit']) and isset($_POST['_wp_http_referer'])){
		if( strpos($_POST['_wp_http_referer'],'options-permalink.php') !== FALSE ) {
			$structure = sanitize_text_field($_POST[$post_type.'_structure']);#get setting
			#default permalink structure
			if( !$structure )
				$structure = $post_type;
				untrailingslashit($structure);
				update_option($post_type.'_structure', $structure );
			}
		}
		add_settings_field($post_type.'_structure',
		$post_type,
		'imicSettingStructureCallback',
		'permalink',
		'imic_setting_section',
		$post_type.'_structure'
	);
	register_setting('permalink',$post_type.'_structure'); }
	endforeach;
}
function setting_section_callback_function() {
?>
	<p><?php _e("Setting permalinks of custom post type.",'vestige-core');?><br />
		<?php _e("If you don't enter permalink structure, permalink is configured as post type",'vestige-core');?>
	</p>
<?php
}
function imicSettingStructureCallback(  $option  ) {
	$post_type = str_replace('_structure',"" ,$option);
	$pt_object = get_post_type_object($post_type);
	$slug = $pt_object->rewrite['slug'];
	$with_front = $pt_object->rewrite['with_front'];
	$value = get_option($option);
	if( !$value )
	$value = $post_type;
	global $wp_rewrite;
	$front = substr( $wp_rewrite->front, 1 );
	if( $front and $with_front ) {
		$slug = $front.$slug;
	}
	if($post_type=='exhibition' || $post_type=='event' || $post_type=='artwork' || $post_type=='team') {
		echo '<p><code>'.home_url().'/</code> <input name="'.$option.'" id="'.$option.'" type="text" class="regular-text code" value="' . $value .'" /></p>';
	}
}
?>