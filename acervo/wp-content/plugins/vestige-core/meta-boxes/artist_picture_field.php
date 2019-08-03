<?php
if (!defined('ABSPATH')){
   exit; }// Exit if accessed directly
   /*
    * Add Image Field to category
    */
if (isset($_REQUEST['taxonomy'])):
$taxonomy = $_REQUEST['taxonomy'];
if($taxonomy=='artwork-artists') {
if(!function_exists('imic_image_artists_tax_custom_fields')):
add_action($taxonomy . '_add_form_fields', 'imic_image_artists_tax_custom_fields', 10, 2);
add_action($taxonomy . '_edit_form_fields', 'imic_image_artists_tax_custom_fields', 10, 2);
function imic_image_artists_tax_custom_fields($tag) {
       global $taxonomy;
       if (is_object($tag)) {
           $t_id = $tag->term_id; // Get the ID of the term we're editing
          $term_meta = get_option($taxonomy . $t_id . "_image_term_id"); // Do the check
       } else {
           $term_meta = '';
       }
       ?>
       <table class="form-table">
           <tbody><tr class="form-field form-required">
                   <th scope="row"><label for="image"><?php esc_html_e('Artist Image', 'vestige') ?></label></th>
                   <td><?php
                       echo '<div><img id ="upload_image_preview" src ="' . $term_meta . '" width ="150px" height ="auto"/></div>';
                       echo '<input id="upload_category_button" type="button" class="button button-primary" value="'.esc_html__('Upload Image', 'vestige').'" /> ';
                      if(isset($_REQUEST['tag_ID'])){
                       echo '<input id="upload_category_button_remove" type="button" class="button button-primary" value="'.esc_html__('Remove Image', 'vestige').'" />';
                      }
                       ?>
                   <p class="description"><?php esc_html_e('Upload an image for the artist .', 'vestige'); ?></p></td>
                 </tr><input type="hidden" id="category_url" name="image_term_id" value="<?php echo esc_url($term_meta); ?>" />
           </tbody>
       </table>              
   <?php
} endif;
if(!function_exists('imic_image_artists_save_taxonomy_custom_fields')):
add_action('created_' . $taxonomy, 'imic_image_artists_save_taxonomy_custom_fields');
add_action('edited_' . $taxonomy, 'imic_image_artists_save_taxonomy_custom_fields', 10, 2);
function imic_image_artists_save_taxonomy_custom_fields($term_id) {
       global $taxonomy;
       $t_id = $term_id;
       if (isset($_POST['image_term_id'])) {
           $term_meta = $_POST['image_term_id'];
           update_option($taxonomy . $t_id . "_image_term_id", $term_meta);
         }
       }
       endif; }
endif;
?>