<?php
$post_title = wp_kses_post($instance['title']);
$includes = wp_kses_post($instance['include']);
$excludes = wp_kses_post($instance['exclude']);
$title_position = wp_kses_post($instance['title_position']);
$color = esc_attr($instance['custom_color']);
$venue_desc = (!empty($instance['excerpt_length']))? $instance['excerpt_length'] : 25 ;
$read_more_text = wp_kses_post($instance['read_more_text']);
$number = (!empty($instance['number_of_posts']))? $instance['number_of_posts'] : 3 ;
$orderby = (!empty($instance['orderby']))? $instance['orderby'] : 'name' ;
$order = (!empty($instance['order']))? $instance['order'] : 'ASC' ;
?>
<?php
if(!empty($instance['title'])){ ?>
<div class="text-align-<?php echo esc_attr($title_position); ?>"><h3 class="widget-title" <?php if(!empty($instance['custom_color'])){ ?>style="color:<?php echo ''.$color; ?>"<?php } ?>><?php echo esc_attr($post_title); ?></h3></div>
<?php } ?>
<?php
$term_list = get_terms( 'venue', array('orderby'=>$orderby,'order'=>$order,'hide_empty'=>0,'number'=>$number,'include'=>$includes,'exclude'=> $excludes));
if(!empty($instance['shuffle'])){ shuffle ($term_list); }
foreach( $term_list as $term ) {
	$term_link = get_term_link($term->slug, 'venue');
	$t_id = $term->term_id; // Get the ID of the term we're editing
	$term_meta = get_option($term->taxonomy . $t_id . "_image_term_id"); // Do the check
	?>
    <!-- List Item -->
    <div class="list-item venue-list-item format-standard">
        <div class="row">
        	<?php if($term_meta != ''){ ?>
            <div class="col-md-5 col-sm-5">
                <a href="<?php echo esc_url($term_link); ?>"><img src="<?php echo esc_url($term_meta); ?>" class="img-thumbnail" alt="Venue"></a>
            </div>
            <?php } ?>
            <div class="<?php if($term_meta != ''){ ?>col-md-7 col-sm-7<?php } else { ?>col-md-12<?php } ?>">
            <h3><a href="<?php echo esc_url($term_link); ?>"><?php echo esc_attr($term->name); ?></a></h3>
            <?php if(!empty($instance['excerpt_length'])){ ?><div class="grid-item-excerpt">
            	<?php $description = wp_trim_words(term_description( $term->term_id, 'venue' ),$venue_desc);
				 ?>
                <p><?php echo esc_attr($description); ?></p>
            </div><?php } ?>
            <?php if($read_more_text!=""){ ?><a href="<?php echo esc_url($term_link); ?>" class="btn btn-primary"><?php echo ''.$read_more_text; ?></a><?php } ?>
            </div>
        </div>
    </div>
    
<?php } ?>