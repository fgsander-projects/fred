<?php
/*** Widget code for Selected Post ***/
class selected_post extends WP_Widget {
	// constructor
	public function __construct() {
		 $widget_ops = array('description' => esc_html__( 'Display latest and selected post of different post type.','vestige') );
         parent::__construct(false, $name = esc_html__('Selected Post','vestige'), $widget_ops);
	}
	// widget form creation
	function form($instance) {
		// Check values
		if( $instance) {
			 $title = esc_attr($instance['title']);
			 $type = esc_attr($instance['type']);
			 $number = esc_attr($instance['number']);
		} else {
			 $title = '';
			 $type = '';
			 $number = '';
		}
	?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'vestige'); ?></label>
            <input class="spTitle" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('type')); ?>"><?php esc_html_e('Select Post Type', 'vestige'); ?></label>
            <select class="spType" id="<?php echo esc_attr($this->get_field_id('type')); ?>" name="<?php echo esc_attr($this->get_field_name('type')); ?>">
                <?php
                $post_types = get_post_types( array('_builtin' => false), 'names' ); 
                array_unshift($post_types, "post");
                if(($key = array_search('wpcf7_contact_form', $post_types)) !== false){
				unset($post_types[$key]);
				}
                if(!empty($post_types)){
                    foreach ( $post_types as $post_type ) {
                        $activePost = ($type == $post_type)? 'selected' : '';
                       echo '<option value="'. $post_type .'" '.$activePost.'>' . $post_type . '</p>';
                    }
                }else{
                    echo '<option value="no">'.esc_html__('No Post Type Found.','vestige').'</option>';
                }
                ?>
            </select> 
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of posts to show', 'vestige'); ?></label>
            <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p> 
	<?php
	}
	// update widget
	function update($new_instance, $old_instance) {
		  $instance = $old_instance;
		  // Fields
		  $instance['title'] = strip_tags($new_instance['title']);
		  $instance['type'] = strip_tags($new_instance['type']);
		  $instance['number'] = strip_tags($new_instance['number']);
		  
		 return $instance;
	}
	// display widget
	function widget($args, $instance) {
	   extract( $args );
	   // these are the widget options
	   $post_title = apply_filters('widget_title', $instance['title']);
	   $type = apply_filters('widget_type', $instance['type']);
	   $number = apply_filters('widget_number', $instance['number']);
	   
	   $numberPost = (!empty($number))? $number : 3 ;	
	   	   
	   echo ''.$args['before_widget'];
		
		if( !empty($instance['title']) ){
			echo ''.$args['before_title'];
			echo apply_filters('widget_title',$instance['title'], $instance, $this->id_base);
			echo ''.$args['after_title'];
		}
		$args_posts = array('order'=>'DESC', 'post_type' => $type, 'posts_per_page' => $numberPost, 'post_status' => 'publish');
		$posts_listing = new WP_Query( $args_posts );
		if ( $posts_listing->have_posts() ) {
			echo '<ul>';
			 while ( $posts_listing->have_posts() ) {	
				$posts_listing->the_post();
			 	if($type!='event'){
			 		$postDate =  strtotime(get_the_date('Y-m-d', get_the_ID()));
				}else{
					$event_post = get_post_custom(get_the_ID());
					$postDate = strtotime($event_post['imic_event_start_dt'][0]);					
				}
				$postImage = get_the_post_thumbnail( get_the_ID(), 'full', array('class' => "img-thumbnail") );
				echo '<li class="clearfix">
						  <a href="'.esc_url(get_permalink(get_the_ID())).'" class="post-image">';
						  	if ( !empty($postImage)) :
								echo ''.$postImage;
						 	endif;
				echo '	  </a>
						<div class="widget-blog-content"><a href="'.esc_url(get_permalink(get_the_ID())).'">'.get_the_title().'</a>
						<span class="meta-data">'.esc_html__('Posted on ','vestige').esc_attr(get_the_date()).'</span>
						</div>
					</li>';					
					}		
			echo '</ul>';
		}else{
			echo __('No ','vestige').$type.esc_html__(' Found','vestige');		
		}
   			wp_reset_postdata();
	   echo ''.$args['after_widget'];
	}
}
// register widget
add_action( 'widgets_init', function(){
	register_widget( 'selected_post' );
});
?>