<?php
/*** Widget code for Selected Post ***/
class vestige_upcoming_events extends WP_Widget
{
	// constructor
	public function __construct()
	{
		$widget_ops = array('description' => esc_html__('Display latest events.', 'vestige-core'));
		parent::__construct(false, $name = esc_html__('Upcoming Events', 'vestige-core'), $widget_ops);
	}
	// widget form creation
	function form($instance)
	{
		// Check values
		if ($instance) {
			$title = esc_attr($instance['title']);
			$number = esc_attr($instance['number']);
		} else {
			$title = '';
			$number = '';
		}
		?>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php _e('Title', 'vestige-core'); ?></label>
		<input class="spTitle" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
	</p>
	<p>
		<label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number of events to show', 'vestige-core'); ?></label>
		<input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
	</p>
<?php
}
// update widget
function update($new_instance, $old_instance)
{
	$instance = $old_instance;
	// Fields
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['number'] = strip_tags($new_instance['number']);

	return $instance;
}
// display widget
function widget($args, $instance)
{
	extract($args);
	// these are the widget options
	$post_title = apply_filters('widget_title', $instance['title']);
	$number = apply_filters('widget_number', $instance['number']);

	$numberPost = (!empty($number)) ? $number : 3;

	echo '' . $args['before_widget'];

	if (!empty($instance['title'])) {
		echo '' . $args['before_title'];
		echo apply_filters('widget_title', $instance['title'], $instance, $this->id_base);
		echo '' . $args['after_title'];
	}
	$events = imic_recur_events("future", "", "", "", "");
	ksort($events);
	if (!empty($events)) {
		echo '<ul>';
		$start = 1;
		foreach ($events as $key => $value) {
			$event_url = imic_query_arg(date_i18n('Y-m-d', $key), $value);
			$time_formate = imic_get_event_time_format($value, $key);
			$time_formate = ($time_formate != '') ? $time_formate : esc_html__('All Day', 'vestige-core');
			echo '<li>
               	<a href="' . esc_url($event_url) . '">' . get_the_title($value) . '</a>
             	<span class="meta-data"><i class="fa fa-calendar"></i> ' . esc_attr(date_i18n('l', $key)) . '(' . esc_attr(imic_get_event_date_format($value, $key)) . '), ' . esc_attr($time_formate) . '</span>
              	</li>';
			if ($start >= $number) {
				break;
			}
			$start++;
		}
		echo '</ul>';
	}
	echo '' . $args['after_widget'];
}
}
// register widget
add_action('widgets_init', function () {
	register_widget('vestige_upcoming_events');
});
?>