<?php
$the_categories = wp_kses_post($instance['categories']);
$post_title = wp_kses_post($instance['title']);
$title_position = wp_kses_post($instance['title_position']);
$color = esc_attr($instance['custom_color']);
$numberPosts = (!empty($instance['number_of_posts']))? $instance['number_of_posts'] : 4 ;
$carousel_auto = wp_kses_post($instance['carousel_auto']);
$carousel_nav = (!empty($instance['carousel_nav']))? 'yes' : 'no' ;
$carousel_pagi = (!empty($instance['carousel_pagi']))? 'yes' : 'no' ;
$grid_column = (!empty($instance['grid_column']))? $instance['grid_column'] : 4 ;
?>
<?php
	if ($instance['grid_column'] == 4){
		$column = 3;
	} elseif ($instance['grid_column'] == 3){
		$column = 4;
	} elseif ($instance['grid_column'] == 6){
		$column = 2;
	} elseif ($instance['grid_column'] == 12){
		$column = 1;
	} else {
		$column = 3;	
	}
?>
<?php $testimonial_args = array ( 'post_type' => 'testimonial', 'testimonial-category' => $the_categories, 'posts_per_page' => $numberPosts);
$testimonial_listings = new WP_Query($testimonial_args);
if($testimonial_listings->have_posts()) : 
if(!empty($instance['title'])){ ?>
<div class="text-align-<?php echo esc_attr($title_position); ?>"><h3 class="widget-title" <?php if(!empty($instance['custom_color'])){ ?>style="color:<?php echo ''.$color; ?>"<?php } ?>><?php echo esc_attr($post_title); ?></h3></div>
<?php } ?>

<div class="carousel-wrapper">
    <div class="row">
        <ul class="owl-carousel carousel-fw" id="testimonials-slider" data-columns="<?php echo esc_attr($column); ?>" data-autoplay="<?php echo esc_attr($carousel_auto); ?>" data-pagination="<?php echo esc_attr($carousel_pagi); ?>" data-arrows="<?php echo esc_attr($carousel_nav); ?>" data-single-item="no" data-items-desktop="<?php echo esc_attr($column); ?>" data-items-desktop-small="2" data-items-tablet="2" data-items-mobile="1" <?php if ( is_rtl() ) { ?>data-rtl="rtl"<?php } else { ?> data-rtl="ltr" <?php } ?>>


			<?php while($testimonial_listings->have_posts()) : $testimonial_listings->the_post();?>
            <li class="item">
                  <blockquote>
                      <?php the_content(); ?>
                      <cite><?php the_title(); ?></cite>
                  </blockquote>
              </li>
        
		<?php endwhile; ?>

		</ul>
	</div>              
</div>      
<?php endif; wp_reset_postdata(); ?>