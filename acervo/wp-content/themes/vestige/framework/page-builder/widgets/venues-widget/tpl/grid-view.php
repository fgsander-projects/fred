<?php
$post_title = (!empty($instance['title']))?$instance['title']:'';
$includes = (!empty($instance['include']))?$instance['include']:'';
$excludes = (!empty($instance['exclude']))?$instance['exclude']:'';
$title_position = (!empty($instance['title_position']))?$instance['title_position']:'';
$color = esc_attr($instance['custom_color']);
$carousel_auto = wp_kses_post($instance['listing_layout']['carousel_auto']);
$carousel_nav = (!empty($instance['listing_layout']['carousel_nav']))? 'yes' : 'no' ;
$carousel_pagi = (!empty($instance['listing_layout']['carousel_pagi']))? 'yes' : 'no' ;
$venue_desc = (!empty($instance['excerpt_length']))? $instance['excerpt_length'] : 25 ;
$number = (!empty($instance['number_of_posts']))? $instance['number_of_posts'] : 3 ;
$orderby = (!empty($instance['orderby']))? $instance['orderby'] : 'name' ;
$order = (!empty($instance['order']))? $instance['order'] : 'ASC' ;
$grid_column = (!empty($instance['listing_layout']['grid_column']))? $instance['listing_layout']['grid_column'] : 4 ;
$read_more_text = wp_kses_post($instance['read_more_text']);
?>
<?php
	if ($grid_column == 4){
		$column = 3;
	} elseif ($grid_column == 3){
		$column = 4;
	} elseif ($grid_column == 6){
		$column = 2;
	} elseif ($grid_column == 12){
		$column = 1;
	} else {
		$column = 3;	
	}
?>
<?php
if(!empty($instance['title'])){ ?>
<div class="text-align-<?php echo esc_attr($title_position); ?>"><h3 class="widget-title" <?php if(!empty($instance['custom_color'])){ ?>style="color:<?php echo ''.$color; ?>"<?php } ?>><?php echo esc_attr($post_title); ?></h3></div>
<?php } ?>
<?php if(!empty($instance['listing_layout']['carousel_mode'])){ ?>
<div class="carousel-wrapper venues-grid">
    <div class="row">
        <ul class="owl-carousel carousel-fw" data-columns="<?php echo esc_attr($column); ?>" data-autoplay="<?php echo esc_attr($carousel_auto); ?>" data-pagination="<?php echo esc_attr($carousel_pagi); ?>" data-arrows="<?php echo esc_attr($carousel_nav); ?>" data-single-item="no" data-items-desktop="<?php echo esc_attr($column); ?>" data-items-desktop-small="2" data-items-tablet="2" data-items-mobile="1" <?php if ( is_rtl() ) { ?>data-rtl="rtl"<?php } else { ?> data-rtl="ltr" <?php } ?>>
<?php } else { ?>
<div class="row">
	<ul class="isotope-grid isotope venues-grid" data-sort-id="grid">
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
    <?php if(!empty($instance['listing_layout']['carousel_mode'])){ ?><li class="item"><?php } else { ?><li class="grid-item col-md-<?php echo esc_attr($grid_column); ?> col-sm-4"><?php } ?>
    	<div class="format-standard">
        <?php if($term_meta != ''){ ?>
    	<a href="<?php echo esc_url($term_link); ?>" class="media-box grid-featured-img"><img src="<?php echo esc_url($term_meta); ?>" class="img-thumbnail" alt="Venue"></a>
        <?php } ?>
        <div class="grid-item-content">
            <h3><a href="<?php echo esc_url($term_link); ?>"><?php echo esc_attr($term->name); ?></a></h3>
            <?php if(!empty($instance['excerpt_length'])){ ?><div class="grid-item-excerpt">
            	<?php $description = wp_trim_words(term_description( $term->term_id, 'venue' ),$venue_desc);
				 ?>
                <p><?php echo esc_attr($description); ?></p>
            </div><?php } ?>
            <?php if($read_more_text!=""){ ?><a href="<?php echo esc_url($term_link); ?>" class="btn btn-primary"><?php echo ''.$read_more_text; ?></a><?php } ?>
        </div>
    </li>
<?php } ?>
<?php if(!empty($instance['listing_layout']['carousel_mode'])){ ?>
		</ul>
	</div>              
</div>                  
<?php } else { ?>
	</ul>
 </div>
 <?php } ?>