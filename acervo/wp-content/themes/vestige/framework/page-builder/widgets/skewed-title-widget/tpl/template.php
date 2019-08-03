<?php
$title = wp_kses_post($instance['title']);
$bg = esc_attr($instance['title_bg']);
$color = esc_attr($instance['title_color']) ?>
<div class="skewed-title-bar">
    <div class="container">
        <h4 style="background:<?php echo ''.$bg; ?>; color:<?php echo ''.$color; ?>;">
            <span><?php echo esc_attr($title); ?></span>
        </h4>
    </div>
</div>