<?php
$content = wp_kses_post($instance['content']);
$close = esc_attr($instance['close']);
$type = (!empty($instance['type']))? $instance['type'] : 'standard' ;
$animation = (!empty($instance['animation']))? $instance['animation'] : 'fadeIn' ;
$color = esc_attr($instance['custom_color']);
$bcolor = esc_attr($instance['custom_bcolor']);
$tcolor = esc_attr($instance['custom_tcolor']);
echo '<div data-appear-animation="'.esc_attr($animation).'"><div class="alert alert-'.$type.' fade in" style="background-color:'.$color.'; color:'.$tcolor.' border-color:'.$bcolor.'">';
if($close!="")
{
	echo '<a class="close" style="color:'.$tcolor.'" data-dismiss="alert" href="#">&times;</a>';
}
echo ''.$content;
echo '</div></div>';