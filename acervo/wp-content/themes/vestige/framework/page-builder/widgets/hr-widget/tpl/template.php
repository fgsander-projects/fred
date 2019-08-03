<?php
$height = wp_kses_post($instance['height']);
$margint = wp_kses_post($instance['margint']);
$marginb = wp_kses_post($instance['marginb']);
$custom_color = esc_attr($instance['custom_color']);
?>

<hr class="fw" style="height:<?php echo ''.$height; ?>; background:<?php echo ''.$custom_color; ?>; margin-top:<?php echo ''.$margint; ?>; margin-bottom:<?php echo ''.$marginb; ?>">