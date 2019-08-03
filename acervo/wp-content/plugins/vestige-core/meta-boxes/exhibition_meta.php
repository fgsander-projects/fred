<?php
//Meta Box for Exihibitions
if (!function_exists('imic_register_meta_box_exhibition')) {
    add_action('admin_init', 'imic_register_meta_box_exhibition');
    function imic_register_meta_box_exhibition() {
        // Check if plugin is activated or included in theme
        if (!class_exists('RW_Meta_Box'))
            return;
        $prefix = 'imic_';
        $meta_box = array(
            'id' => 'template-exhibition1',
            'title' => esc_html__("Select Exhibition Date", 'vestige'),
            'pages' => array('exhibition'),
            'context' => 'normal',
            'fields' => array(
                array(
            'name' => esc_html__('Exhibition Start Date', 'vestige'),
            'id' => $prefix . 'exhibition_start_dt',
            'desc' => esc_html__("Insert date of Exhibition start.", 'vestige'),
            'type' => 'date',
			'js_options' => array(
	              'dateFormat'      => 'yy-mm-dd',
				  'hourMax' => 24,
				  	'timeFormat' => 'hh:mm',
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
        ),
        //Event End Date
        array(
            'name' => esc_html__('Exhibition End Date', 'vestige'),
            'id' => $prefix . 'exhibition_end_dt',
            'desc' => esc_html__("Insert date of Exhibition end", 'vestige'),
            'type' => 'date',
			'js_options' => array(
	              'dateFormat'      => 'yy-mm-dd',
				  'hourMax' => 24,
					'changeMonth'     => true,
					'changeYear'      => true,
					'showButtonPanel' => true,
				),
        ),
            )
        );
        new RW_Meta_Box($meta_box);
    }
}
function imic_exhibition_time_loop()
{
	$time_field = array();
	$start = "00:00";
	$end = "23:45";
	$tStart = strtotime($start);
	$tEnd = strtotime($end);
	$tNow = $tStart;
	while($tNow <= $tEnd)
	{
		$time_field[] = date_i18n("H:i",$tNow);
		$tNow = strtotime('+15 minutes',$tNow);
	}
	return $time_field;
}
	
	add_action( 'admin_init', 'imic_add_fields_clone' );
add_action( 'save_post', 'imic_update_fields_data', 10, 2 );
/**
 * Add custom Meta Box to Posts post type
 */
function imic_add_fields_clone() 
{
    add_meta_box('template-home12',esc_html__('Exhibition Time','vestige'),'imic_feilds_output','exhibition','normal','core');
}
/**
 * Print the Meta Box content
 */
function imic_feilds_output() 
{
    global $post;
	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'featured_block_meta_box', 'featured_block_meta_box_nonce' );
    $feat_data = get_post_meta( $post->ID, 'feat_data', true );
?>
<div id="field_group">
    <div id="field_wrap-new">
    <?php 
    if (!empty( $feat_data ) ) 
    { 
        foreach($feat_data as $key=>$value)
        { 
        ?><div>
          <div class="field_left">
              <label><?php _e('Start Time','vestige'); ?></label>
              <select name="featured[start_time][]">
              <?php
			  foreach(imic_exhibition_time_loop() as $time)
			  {
				$this_time_start = date_i18n('H:i', $key);
				$selected = ($time==$this_time_start)?'selected':'';
				echo '<option '.$selected.' value="'.$time.'">'.$time.'</option>';  
			  }
			  ?>
              </select>
              <label><?php _e('End Time','vestige'); ?></label>
              <select name="featured[end_time][]">
              <?php
			  foreach(imic_exhibition_time_loop() as $time)
			  {
				$this_time_end = date_i18n('H:i', $value);
				$selected = ($time==$this_time_end)?'selected':'';
				echo '<option '.$selected.' value="'.$time.'">'.$time.'</option>';  
			  }
			  ?>
              </select>
          </div>
          <div class="field_right">
            <input class="button" type="button" value="<?php esc_html_e('Remove','vestige'); ?>" onclick="remove_field(this)" />
          </div><hr class=""> </div>
          <div class="clear" /></div>
          
        <?php
        } // endif
    } // endforeach
    ?>
    </div>
    <div style="display:none" id="master-row-new">
    <div>
        <div class="field_left">
                <label><?php esc_html_e('Start Time','vestige'); ?></label>
                <select name="featured[start_time][]">
              <?php
			  foreach(imic_exhibition_time_loop() as $time)
			  {
				echo '<option value="'.$time.'">'.$time.'</option>';  
			  }
			  ?>
              </select>
                <label><?php _e('End Time','vestige'); ?></label>
                <select name="featured[end_time][]">
              <?php
			  foreach(imic_exhibition_time_loop() as $time)
			  {
				echo '<option value="'.$time.'">'.$time.'</option>';  
			  }
			  ?>
              </select>
        </div>
        <div class="field_right"> 
            <input class="button" type="button" value="<?php esc_html_e('Remove','vestige'); ?>" onclick="remove_field(this)" /> 
        </div>
        <hr class="">
        </div>
        <div class="clear"></div>
        
    </div>
    <div id="add_field_row">
      <input class="button" type="button" value="<?php esc_html_e('New Time','vestige'); ?>" onclick="add_field_row_new();" />
    </div>
</div>
  <?php
}
/**
 * Save post action, process fields
 */
function imic_update_fields_data( $post_id, $post_object ) 
{
	if ( ! isset( $_POST['featured_block_meta_box_nonce'] ) ) {
		return;
	}
	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['featured_block_meta_box_nonce'], 'featured_block_meta_box' ) ) {
		return;
	}
    // Doing revision, exit earlier **can be removed**
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )  
        return;
    // Doing revision, exit earlier
    if ( 'revision' == $post_object->post_type )
        return;
    // Verify authenticity
	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'exhibition' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}
	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( ! isset( $_POST['featured'] ) ) {
		return;
	}
    if ( $_POST['featured'] ) 
    {
        // Build array for saving post meta
        $feat_data = array();
        for ($i = 0; $i < count( $_POST['featured']['start_time'] ); $i++ ) 
        {
            if ( '00:00' != $_POST['featured']['start_time'][ $i ]&&'00:00' != $_POST['featured']['end_time'][ $i ] ) 
            {
				if($_POST['featured']['end_time'][ $i ]=="00:00")
				{
					$end_time = "00";
				}
				else
				{
					$end_time = $_POST['featured']['end_time'][ $i ];
				}
				if($_POST['featured']['start_time'][ $i ]=="00:00")
				{
					$start_time = "00";
					$end_time = "00";
				}
				else
				{
					$start_time = $_POST['featured']['start_time'][ $i ];
				}
				if($start_time!="00")
				{
					if($end_time!="00")
					{
						$feat_data[strtotime($_POST['featured']['start_time'][ $i ])]  = strtotime($_POST['featured']['end_time'][ $i ]);
					}
					else
					{
						$feat_data[strtotime($_POST['featured']['start_time'][ $i ])]  = "00";
					}
				}
				else
				{
					$feat_data["00"] = "00";
				}
            }
        }
        if ( $feat_data ) 
            update_post_meta( $post_id, 'feat_data', $feat_data );
        else 
            delete_post_meta( $post_id, 'feat_data' );
    } 
    // Nothing received, all fields are empty, delete option
    else 
    {
        delete_post_meta( $post_id, 'feat_data' );
    }
}
function add_admin_scripts( $hook ) {
    global $post;
    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
        if ( 'exhibition' === $post->post_type ) {     
            wp_enqueue_script(  'myscript', IMIC_THEME_PATH.'/assets/js/clone_fields.js' );
			wp_enqueue_style(  'myscript', IMIC_THEME_PATH.'/assets/css/clone_fields.css' );
        }
    }
}
add_action( 'admin_enqueue_scripts', 'add_admin_scripts', 10, 1 );