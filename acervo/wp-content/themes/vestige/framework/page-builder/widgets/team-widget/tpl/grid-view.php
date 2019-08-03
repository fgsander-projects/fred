<?php
$the_categories = wp_kses_post($instance['categories']);
$post_title = wp_kses_post($instance['title']);
$title_position = wp_kses_post($instance['title_position']);
$color = esc_attr($instance['custom_color']);
$numberPosts = (!empty($instance['number_of_posts']))? $instance['number_of_posts'] : 4 ;
$carousel_auto = wp_kses_post($instance['listing_layout']['carousel_auto']);
$carousel_nav = (!empty($instance['listing_layout']['carousel_nav']))? 'yes' : 'no' ;
$carousel_pagi = (!empty($instance['listing_layout']['carousel_pagi']))? 'yes' : 'no' ;
$grid_column = (!empty($instance['listing_layout']['grid_column']))? $instance['listing_layout']['grid_column'] : 4 ;
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
<?php $team_args = array ( 'post_type' => 'team', 'team-category' => $the_categories, 'posts_per_page' => $numberPosts);
$team_listings = new WP_Query($team_args);
if($team_listings->have_posts()) : 
if(!empty($instance['title'])){ ?>
<div class="text-align-<?php echo esc_attr($title_position); ?>"><h3 class="widget-title" <?php if(!empty($instance['custom_color'])){ ?>style="color:<?php echo ''.$color; ?>"<?php } ?>><?php echo esc_attr($post_title); ?></h3></div>
<?php } ?>

<?php if(!empty($instance['listing_layout']['carousel_mode'])){ ?>
<div class="carousel-wrapper venues-grid">
    <div class="row">
        <ul class="owl-carousel carousel-fw" data-columns="<?php echo esc_attr($column); ?>" data-autoplay="<?php echo esc_attr($carousel_auto); ?>" data-pagination="<?php echo esc_attr($carousel_pagi); ?>" data-arrows="<?php echo esc_attr($carousel_nav); ?>" data-single-item="no" data-items-desktop="<?php echo esc_attr($column); ?>" data-items-desktop-small="2" data-items-tablet="2" data-items-mobile="1" <?php if ( is_rtl() ) { ?>data-rtl="rtl"<?php } else { ?> data-rtl="ltr" <?php } ?>>
<?php } else { ?>
<div class="row">
	<ul class="isotope-grid isotope" data-sort-id="grid">
<?php } ?>


			<?php while($team_listings->have_posts()) : $team_listings->the_post();
			if ( has_post_thumbnail() ) {
				$image_size = 'imic_600x400';
				$image = get_the_post_thumbnail(get_the_ID(),$image_size,array('class'=>'imic_600x400'));
			}
			$staff_position = get_post_meta(get_the_ID(),'imic_staff_position',true);
			$staff_phone = get_post_meta(get_the_ID(),'imic_staff_member_phone',true);
			$social = imic_social_staff_icon();
			?>
            <!-- STAFF ITEM -->
            <?php if(!empty($instance['listing_layout']['carousel_mode'])){ ?><li class="item"><?php } else { ?><li class="grid-item col-md-<?php echo esc_attr($grid_column); ?> col-sm-6"><?php } ?>
                <div class="staff-item format-image">
                    <?php if ( has_post_thumbnail() ) { ?>
                        <?php if(!empty($instance['linked_title'])){ ?><a href="<?php the_permalink(); ?>"><?php } ?><?php echo ''.$image; ?><?php if(!empty($instance['linked_title'])){ ?></a><?php } ?>
                    <?php } ?>
                    <div class="grid-item-content">
                        <h3><?php if(!empty($instance['linked_title'])){ ?><a href="<?php the_permalink(); ?>"><?php } ?><?php the_title(); ?><?php if(!empty($instance['linked_title'])){ ?></a><?php } ?></h3>
                        <?php if($staff_position != '') { ?><span class="meta-data"><?php echo ''.$staff_position; ?></span><?php } ?>
                        <?php echo ''.$social; ?>
                        <?php if($staff_phone != '') { ?><a href="tel:<?php echo ''.$staff_phone; ?>" class="accent-color staff-phone-label"><i class="fa fa-phone"></i> <?php echo ''.$staff_phone; ?></a><?php } ?>
                    </div>
                </div>
            </li>
        
		<?php endwhile; ?>
<?php if(!empty($instance['listing_layout']['carousel_mode'])){ ?>
		</ul>
	</div>              
</div>                  
<?php } else { ?>
	</ul>
 </div>
 <?php } ?>
<?php endif; wp_reset_postdata(); ?>