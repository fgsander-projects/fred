<?php
/** Add additional Field to "Add New Category" Form **/
function imic_venue_taxonomy_url_field_add( $taxonomy ) {
?>
<div class="form-field">
    <label for="venue_taxonomy_url"><?php _e('Venue Details page custom URL','vestige'); ?></label>
    <textarea name="cat_meta[VenueURL]" type="text" value=""></textarea>
    <p class="description"><?php _e('Enter a custom URL for this venue, your venue will be linked to that URL then instead of venue taxonomy page.','vestige'); ?></p>
</div>
<?php
}
add_action('venue_add_url_form_fields', 'imic_venue_taxonomy_url_field_add', 10 );
/** Add New Field To Category **/
function imic_venue_extra_category_fields1( $tag ) {
    $t_id = $tag->term_id;
    $cat_meta = get_option( "category_$t_id" );
?>
<tr class="form-field">
    <th scope="row" valign="top"><label for="custom-url"><?php esc_html_e('Venue URL','vestige'); ?></label></th>
    <td>
        
            <textarea type="text" name="cat_meta[VenueURL]"><?php echo (isset($cat_meta['VenueURL']))?$cat_meta['VenueURL']:''; ?></textarea>
       
            <br />
        <span class="description"></span>
            <br />
        </td>
</tr>
<?php
}
add_action('venue_edit_url_form_fields','imic_venue_extra_category_fields1');
/** Save Category Meta **/
function imic_save_venue_extra_category_fields1( $term_id ) {
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
add_action ('edited_venue', 'imic_save_venue_extra_category_fields1');
add_action('created_venue', 'imic_save_venue_extra_category_fields1', 11, 1);