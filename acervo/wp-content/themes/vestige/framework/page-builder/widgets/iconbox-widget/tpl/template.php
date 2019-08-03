<?php
$title = wp_kses_post($instance['title']);
$content = wp_kses_post($instance['content']);
$align = (!empty($instance['align']))? $instance['align'] : 'standard' ;
$type = (!empty($instance['type']))? $instance['type'] : 'default' ;
$style = (!empty($instance['style']))? $instance['style'] : 'standard' ;
$circle = (!empty($instance['circle']))? $instance['circle'] : 'standard' ;
$animation = (!empty($instance['animation']))? $instance['animation'] : 'fadeIn' ;
$color = esc_attr($instance['custom_color']);
$tcolor = esc_attr($instance['custom_tcolor']) ?>


<?php if(!empty($instance['link'])) {?><a href="<?php echo sow_esc_url($instance['link']) ?>" <?php if($instance['link_new_window']) echo 'target="_blank"' ?><?php } else { ?><div<?php } ?> class="icon-box <?php echo ''.$align; ?> <?php echo ''.$type; ?> <?php echo ''.$style; ?> <?php echo ''.$circle; ?>" data-appear-animation="<?php echo ''.$animation; ?>">
    <div class="ibox-icon" <?php if(!empty($color)){ ?>style="background:<?php echo ''.$color; ?>;"<?php } ?>>
        <?php
			if( !empty($instance['icon_image']) ) {
				$attachment = wp_get_attachment_image_src($instance['icon_image']);
				if(!empty($attachment)) {?>
                	<div class="ibox-icon-image"><img src="<?php echo sow_esc_url($attachment[0]); ?>" alt="Icon"></div><?php
				}
			}
			else {
				$icon_styles = array();
				if(!empty($instance['custom_tcolor'])) $icon_styles[] = 'color: '.$instance['custom_tcolor'];
  
				echo siteorigin_widget_get_icon($instance['icon'], $icon_styles);
			}
	 	?>
    </div>
    <?php if(!empty($title)){ ?><h3><?php echo esc_attr($title); ?></h3><?php } ?>
    <?php if(!empty($content)){ ?><p><?php echo ''.$content; ?></p><?php } ?>
<?php if(!empty($instance['link'])) {?></a><?php } else { ?></div><?php } ?>