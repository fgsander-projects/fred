<?php
$the_categories = wp_kses_post($instance['categories']);
$post_title = wp_kses_post($instance['title']);
$title_position = wp_kses_post($instance['title_position']);
$color = esc_attr($instance['custom_color']);
$excerpt_length = wp_kses_post($instance['excerpt_length']);
$numberPosts = (!empty($instance['number_of_posts']))? $instance['number_of_posts'] : 4 ;
$read_more_text = wp_kses_post($instance['read_more_text']);
$carousel_auto = wp_kses_post($instance['listing_layout']['carousel_auto']);
$carousel_nav = (!empty($instance['listing_layout']['carousel_nav']))? 'yes' : 'no' ;
$carousel_pagi = (!empty($instance['listing_layout']['carousel_pagi']))? 'yes' : 'no' ;
$grid_column = (!empty($instance['listing_layout']['grid_column']))? $instance['listing_layout']['grid_column'] : 4 ;
$eventtype = (!empty($instance['event_type']))? $instance['event_type'] : 'future' ;
$event_order = (!empty($instance['event_order']))? $instance['event_order'] : 'asc' ;

?>
<?php
	if ($grid_column == 4){
		$column = 3;
	} elseif ($grid_column == 3){
		$column = 4;
	} elseif ($grid_column == 6){
		$column = 2;
	} else {
		$column = 3;	
	}
?>
<?php
$paged = (get_query_var('paged'))?get_query_var('paged'):1;
$events = imic_recur_events($eventtype, "", $the_categories,"", "");
if($eventtype=="future")
{
	if($event_order == 'asc'){
		ksort($events);
	} else {
		krsort($events);
	}
	$label = __('Upcoming', 'vestige');
}
else
{
	if($event_order == 'asc'){
		krsort($events);
	} else {
		ksort($events);
	}
	$label = __('Past', 'vestige');
}
if(!empty($instance['title'])){ ?>
<div class="text-align-<?php echo esc_attr($title_position); ?>"><h3 class="widget-title" <?php if(!empty($instance['custom_color'])){ ?>style="color:<?php echo esc_attr($color); ?>"<?php } ?>><?php echo esc_attr($post_title); ?></h3></div>
<?php } ?>

<?php if(!empty($instance['listing_layout']['carousel_mode'])){ ?>
<div class="carousel-wrapper events-grid">
    <div class="row">
        <ul class="owl-carousel carousel-fw" data-columns="<?php echo esc_attr($column); ?>" data-autoplay="<?php echo esc_attr($carousel_auto); ?>" data-pagination="<?php echo esc_attr($carousel_pagi); ?>" data-arrows="<?php echo esc_attr($carousel_nav); ?>" data-single-item="no" data-items-desktop="<?php echo esc_attr($column); ?>" data-items-desktop-small="2" data-items-tablet="2" data-items-mobile="1" <?php if ( is_rtl() ) { ?>data-rtl="rtl"<?php } else { ?> data-rtl="ltr" <?php } ?>>
<?php } else { ?>
<div class="row">
	<ul class="isotope-grid isotope events-grid events-iso-grid" data-sort-id="grid">
<?php } ?>
<?php 
$i = 1;
foreach($events as $key=>$value)
{
	$current_events = $paged*$numberPosts;
	$start_page = ($paged!=1)?$paged-1:0;
	$start_page = $start_page*$numberPosts;
	if($i>$start_page&&$i<=$current_events)
	{
	$time_formate = imic_get_event_time_format($value, $key, "grid");
	$time_formate = ($time_formate!='')?$time_formate:__('All Day', 'vestige');
	$event_url = imic_query_arg(date_i18n('Y-m-d', $key), $value);
	$registration = get_post_meta($value, 'imic_event_registration', true);
	$custom_registration = get_post_meta($value, 'imic_custom_event_registration', true);
	$custom_registration_target = get_post_meta($value, 'imic_custom_event_registration_target', true);
	if($custom_registration_target == 1){
		$target = '_blank';
	} else {
		$target = '';
	}
?>
 <?php if(!empty($instance['listing_layout']['carousel_mode'])){ ?>
 <li class="item">
 <?php } else { ?>
 
 <li <?php post_class('col-md-'.$grid_column.' col-sm-6 grid-item'); ?>><?php } ?>
		<?php if(!empty($instance['listing_layout']['carousel_mode'])){ ?><div class="grid-item format-standard"><?php } else { ?><div class="format-standard"><?php } ?>
        <?php
		if(has_post_thumbnail($value))
		{ ?>
        <a href="<?php echo esc_url($event_url); ?>" class="media-box grid-featured-img"><?php echo get_the_post_thumbnail($value, 'imic_600x400'); ?></a>
        <?php } ?>
        <div class="grid-item-content">
            <div class="event-time">
                <span class="date"><?php echo esc_attr(date_i18n('d', $key)); ?></span>
                <span class="month"><?php echo esc_attr(date_i18n('M, y', $key)); ?></span>
            </div>
            <span class="label label-success"><?php echo esc_attr($label); ?></span>
            <h3><a href="<?php echo esc_url($event_url); ?>"><?php echo get_the_title($value); ?></a></h3>
            <?php if(!empty($instance['show_post_meta'])){ ?><div class="meta-data grid-item-meta alt">
                <?php echo get_the_term_list( $value, 'venue', '<div><i class="fa fa-map-marker"></i> ', ', ','</div>' ); ?>
                <div><?php echo esc_attr($time_formate); ?></div>
            </div><?php }
			if($excerpt_length!='')
			{
				echo '<p>'.imic_get_post_content($value, '', $excerpt_length).'</p>';
			} ?>
            <div class="post-actions">
            <?php
			if($registration==1)
			{ ?>
				<?php if($custom_registration != ''){ ?>
					<a href="<?php echo esc_url($custom_registration); ?>" class="btn btn-primary" target="<?php echo esc_attr($target); ?>"><?php esc_html_e('Book Online','vestige'); ?></a>
				<?php } else { ?>
					<a href="<?php echo esc_url(add_query_arg('reg', '1', $event_url)); ?>" class="btn btn-primary"><?php esc_html_e('Book Online','vestige'); ?></a>
				<?php } ?>
                <?php
			}
			?>
                <?php if($read_more_text!=""){ ?><a href="<?php echo esc_url($event_url); ?>" class="btn btn-default"><?php echo  esc_attr($read_more_text); ?></a><?php } ?>
            </div>
        </div>
    </li>
<?php }
$i++;
if($i>$current_events)
{
	break;
}
}
if(!empty($instance['listing_layout']['carousel_mode'])){ ?>
		</ul>
	</div>              
</div>                  
<?php } else { ?>
	</ul>
 </div>
 <?php } ?>
<?php if(!empty($instance['show_pagination'])){ ?>
<?php wp_link_pages( array(
	  'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'vestige' ) . '</span>',
	  'after'       => '</div>',
	  'link_before' => '<span>',
	  'link_after'  => '</span>',
  ) ); ?>
<!-- Pagination -->
<?php if(function_exists('imic_pagination')) 
{ 
$pages_total = count($events)/$numberPosts;
$pages_total = ceil($pages_total);
imic_pagination($pages_total, $numberPosts, $paged); 
} 
else 
{ 
next_posts_link( 'Older Entries');
previous_posts_link( 'Newer Entries' ); 
}  ?>
<?php } ?>