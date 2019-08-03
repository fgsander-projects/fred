<?php
/** Add additional Field to "Add New Category" Form **/
function imic_venue_taxonomy_custom_field_add( $taxonomy ) {
?>
<div class="form-field">
    <label for="venue_taxonomy_address"><?php _e('Venue Address','vestige'); ?></label>
    <textarea name="cat_meta[VenueAddress]" type="text" value=""></textarea>
    <p class="description"><?php _e('Enter address for the Venue','vestige'); ?></p>
</div>
<?php
}
add_action('venue_add_form_fields', 'imic_venue_taxonomy_custom_field_add', 10 );
/** Add New Field To Category **/
function imic_venue_extra_category_fields( $tag ) {
    $t_id = $tag->term_id;
    $cat_meta = get_option( "category_$t_id" );
?>
<tr class="form-field">
    <th scope="row" valign="top"><label for="meta-color"><?php esc_html_e('Venue Address','vestige'); ?></label></th>
    <td>
        
            <textarea type="text" name="cat_meta[VenueAddress]"><?php echo (isset($cat_meta['VenueAddress']))?$cat_meta['VenueAddress']:''; ?></textarea>
       
            <br />
        <span class="description"></span>
            <br />
        </td>
</tr>
<?php
}
add_action('venue_edit_form_fields','imic_venue_extra_category_fields');
/** Save Category Meta **/
function imic_save_venue_extra_category_fields( $term_id ) {
    if ( isset( $_POST['cat_meta'] ) ) {
        $t_id = $term_id;
        $cat_meta = get_option( "category_$t_id");
        $cat_keys = array_keys($_POST['cat_meta']);
            foreach ($cat_keys as $key){
            if (isset($_POST['cat_meta'][$key])){
                $cat_meta[$key] = $_POST['cat_meta'][$key];
            }
        }
        //save the option array
        update_option( "category_$t_id", $cat_meta );
    }
}
add_action ('edited_venue', 'imic_save_venue_extra_category_fields');
add_action('created_venue', 'imic_save_venue_extra_category_fields', 11, 1);