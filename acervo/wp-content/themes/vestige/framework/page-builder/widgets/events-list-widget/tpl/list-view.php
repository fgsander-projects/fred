<?php
$the_categories = wp_kses_post($instance['categories']);
$post_title = wp_kses_post($instance['title']);
$title_position = wp_kses_post($instance['title_position']);
$color = esc_attr($instance['custom_color']);
$excerpt_length = wp_kses_post($instance['excerpt_length']);
$numberPosts = (!empty($instance['number_of_posts']))? $instance['number_of_posts'] : 4 ;
$read_more_text = wp_kses_post($instance['read_more_text']);
$eventtype = (!empty($instance['event_type']))? $instance['event_type'] : 'future' ;
$event_order = (!empty($instance['event_order']))? $instance['event_order'] : 'asc' ;
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
}
else
{
	if($event_order == 'asc'){
		krsort($events);
	} else {
		ksort($events);
	}
}
if(!empty($instance['title'])){ ?>
<div class="text-align-<?php echo esc_attr($title_position); ?>"><h3 class="widget-title" <?php if(!empty($instance['custom_color'])){ ?>style="color:<?php echo esc_attr($color); ?>"<?php } ?>><?php echo esc_attr($post_title); ?></h3></div>
<?php } ?>
<ul class="events-list">
<?php 
$i = 1;
foreach($events as $key=>$value)
{
	$current_events = $paged*$numberPosts;
	$start_page = ($paged!=1)?$paged-1:0;
	$start_page = $start_page*$numberPosts;
	if($i>$start_page&&$i<=$current_events)
	{
	$time_formate = imic_get_event_time_format($value, $key);
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
	<li class="event-list-item">
    	<div class="pull-right" style="max-width:100px">
            <a href="<?php echo esc_url($event_url); ?>" class="btn btn-default" style="margin-bottom:10px;"><?php _e('Details','vestige'); ?></a>
            <?php if($registration==1)
            { ?>
			<?php if($custom_registration != ''){ ?>
				<a href="<?php echo esc_url($custom_registration); ?>" class="basic-link" target="<?php echo esc_attr($target); ?>"><?php esc_html_e('Book Online','vestige'); ?></a>
			<?php } else { ?>
				<a href="<?php echo esc_url(add_query_arg('reg', '1', $event_url)); ?>" class="basic-link"><?php esc_html_e('Book Online','vestige'); ?></a>
			<?php } ?>
            <?php
            } ?>
        </div>
        <?php
		if(has_post_thumbnail($value))
		{ ?>
        <a href="<?php echo esc_url($event_url); ?>" class="img-thumbnail"><?php echo get_the_post_thumbnail($value, 'imic_600x400'); ?></a>
        <?php } ?>
        <div style="padding-left:130px;">
        <h3><a href="<?php echo esc_url($event_url); ?>"><?php echo get_the_title($value); ?></a></h3>
        <?php if(!empty($instance['show_post_meta'])){ ?>
        <div class="meta-data alt">
            <?php echo get_the_term_list( $value, 'venue', '<div><i class="fa fa-map-marker"></i> ', ', ', '</div>' ); ?>
            <div><i class="fa fa-calendar"></i> <?php echo esc_attr(imic_get_event_date_format($value, $key)); ?></div>
            <div><i class="fa fa-clock-o"></i> <?php echo esc_attr($time_formate); ?></div>
        </div>
        <?php }
		if($excerpt_length!='')
		{
			echo '<p class="event-excerpt">'.imic_get_post_content($value, '', $excerpt_length).'</p>';
		} ?>
        </div>
    </li>
<?php }
$i++;
if($i>$current_events)
{
	break;
}
}
if(!empty($instance['show_pagination'])){ ?>
<?php wp_link_pages( array(
	  'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'vestige' ) . '</span>',
	  'after'       => '</div>',
	  'link_before' => '<span>',
	  'link_after'  => '</span>',
  ) ); ?>
</ul>
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
} ?>
<?php } ?>