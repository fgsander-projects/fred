<?php
$the_categories = wp_kses_post($instance['categories']);
$post_title = wp_kses_post($instance['title']);
$color = esc_attr($instance['custom_color']);
$numberPosts = (!empty($instance['number_of_days']))? $instance['number_of_days'] : 4 ;
?>
<!-- Widget Special Events -->
<div class="widget">
<?php
$exhibitions = imic_exhibition_schedule($the_categories,"");
ksort($exhibitions);
if(!empty($instance['title'])){ ?>
<h3 class="widget-title" <?php if(!empty($instance['custom_color'])){ ?>style="color:<?php echo ''.$color; ?>"<?php } ?>><?php echo esc_attr($post_title); ?></h3>
<?php }
$start = 1;
$all_dates_array = array();
foreach($exhibitions as $key=>$value) {
$exhibition_id = explode("|", $value);
$exhibition_url = imic_query_arg_exhibition(date_i18n('Y-m-d', $exhibition_id[1]), $exhibition_id[0]);
$exhibition_timing = get_post_meta($exhibition_id[0], 'feat_data', true);
$timings = '';
	$all_dates_add = '';
	foreach($exhibitions as $keys=>$values)
	{
		$all_exhibition = explode("|", $values);
		$all_exhibition_url = imic_query_arg_exhibition(date_i18n('Y-m-d', $all_exhibition[1]), $all_exhibition[0]);
		if(date_i18n('Y-m-d', $exhibition_id[1])!=date_i18n('Y-m-d', $all_exhibition[1]))
		{
			//break;
		}
		elseif(date_i18n('Y-m-d', $exhibition_id[1])==date_i18n('Y-m-d', $all_exhibition[1])&&!in_array(date_i18n('Y-m-d', $exhibition_id[1]), $all_dates_array))
		{
			$all_dates_add = date_i18n('Y-m-d', $all_exhibition[1]);
			$series_date = $all_exhibition[1];
			$timings .= '<li class="venue1">
                    <span class="exhibition-time">'.esc_attr(date_i18n(get_option('time_format'), $keys)).'</span>
                    <div class="exhibition-teaser">
                        <h5 class="post-title"><a href="'.$all_exhibition_url.'">'.get_the_title($all_exhibition[0]).'</a></h5>
                        <div class="meta-data alt">';
												if(date('Y-m-d')==date_i18n('Y-m-d', $key))
												{
                            $timings .= '<div><i class="fa fa-clock-o"></i> '.__('Now Open', 'vestige').'</div>';
												}
                            $timings .= get_the_term_list( $all_exhibition[0], 'venue', '<div><i class="fa fa-map-marker"></i> ', ', ', '</div>' ).'
                        </div>
                    </div>
                </li>';
		}
	}
	if($all_dates_add!='')
	{
		$all_dates_array[] = $all_dates_add;
		$start++;
	}
	if($timings!='')
	{
 ?>
	<div class="exhibitions-timeline">
        <div class="timeline-stamp">
            <div class="timeline-stamp-table">
                <div class="timeline-stamp-tablecell">
                    <div class="timeline-stamp-in">
                        <!--<span class="label label-default">Today</span>-->
                        <span class="timeline-stamp-day"><?php echo esc_attr(date_i18n('d', $series_date)); ?></span>
                        <span class="timeline-stamp-month"><?php echo esc_attr(date_i18n('M, Y', $series_date)); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="timeline-slot">
            <ul class="slot-exhibitions">
                <?php echo ''.$timings; ?>
            </ul>
        </div>
    </div>
<?php
	}
if($start>$numberPosts)
{
	break;
}

}
?>
	</div>