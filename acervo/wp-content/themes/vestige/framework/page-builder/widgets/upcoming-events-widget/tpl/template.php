<?php
$the_categories = wp_kses_post($instance['categories']);
$post_title = wp_kses_post($instance['title']);
$title_position = wp_kses_post($instance['title_position']);
$color = esc_attr($instance['custom_color']);
$numberPosts = (!empty($instance['number_of_posts']))? $instance['number_of_posts'] : 4 ;
$eventtype = (!empty($instance['event_type']))? $instance['event_type'] : 'future' ;
?>
<?php 
$events = imic_recur_events($eventtype, "", $the_categories,"", "");
if($eventtype=="future")
{
	ksort($events);
}
else
{
	krsort($events);
} ?>
<!-- Widget Special Events -->
<div class="widget widget_special_events">
<?php
if(!empty($instance['title'])){ ?>
<div class="text-align-<?php echo esc_attr($title_position); ?>"><h3 class="widget-title" <?php if(!empty($instance['custom_color'])){ ?>style="color:<?php echo ''.$color; ?>"<?php } ?>><?php echo esc_attr($post_title); ?></h3></div>
<?php } ?>
<div class="widget_special_events_in">
<?php 
$start = 1;
foreach($events as $key=>$value)
{
	$time_formate = imic_get_event_time_format($value, $key);
	$time_formate = ($time_formate!='')?$time_formate:__('All Day', 'vestige');
	$event_url = imic_query_arg(date_i18n('Y-m-d', $key), $value);
	if($start==1)
	{ ?>
	<div class="event-item format-standard">
    <?php
		if(has_post_thumbnail($value))
		{ ?>
        <a href="<?php echo esc_url($event_url); ?>" class="media-box event-featured-img"><?php echo get_the_post_thumbnail($value, 'imic_600x400'); ?></a>
  	<?php } ?>
        <div class="meta-data alt">
            <div><?php echo esc_attr(imic_get_event_date_format($value, $key)); ?></div>
            <div><?php echo get_the_term_list( $value, 'venue', '', ', ' ); ?></div>
        </div>
        <h3 class="post-title"><a href="<?php echo esc_url($event_url); ?>"><?php echo esc_attr(get_the_title($value)); ?></a></h3>
        <a href="<?php echo esc_url($event_url); ?>" class="basic-link"><?php _e('View details', 'vestige'); ?></a>
    </div>
    <?php }
	else
	{ ?>
    <div class="event-item format-standard">
        <div class="meta-data alt">
            <div><?php echo esc_attr(imic_get_event_date_format($value, $key)); ?></div>
            <?php echo get_the_term_list( $value, 'venue', '<div>', ', ', '</div>' ); ?>
        </div>
        <h3 class="post-title"><a href="<?php echo esc_url($event_url); ?>"><?php echo esc_attr(get_the_title($value)); ?></a></h3>
        <a href="<?php echo esc_url($event_url); ?>" class="basic-link"><?php _e('View details', 'vestige'); ?></a>
    </div>
<?php 
	}
	if($start>=$numberPosts)
	{
		break;
	}
	$start++;
} ?>
	</div>
</div> 