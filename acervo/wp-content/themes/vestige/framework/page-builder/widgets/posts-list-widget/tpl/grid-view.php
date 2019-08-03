<?php
$the_categories = wp_kses_post($instance['categories']);
$post_title = wp_kses_post($instance['title']);
$title_position = wp_kses_post($instance['title_position']);
$color = esc_attr($instance['custom_color']);
$excerpt_length = wp_kses_post($instance['excerpt_length']);
$numberPosts = (!empty($instance['number_of_posts']))? $instance['number_of_posts'] : 4 ;
$read_more_text = wp_kses_post($instance['read_more_text']);
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
<?php $post_args = array ( 'post_type' => 'post', 'category_name' => $the_categories, 'posts_per_page' => $numberPosts, 'paged' => get_query_var('paged') );
$post_listings = new WP_Query($post_args);
if($post_listings->have_posts()) : 
if(!empty($instance['title'])){ ?>
<div class="text-align-<?php echo esc_attr($title_position); ?>"><h3 class="widget-title" <?php if(!empty($instance['custom_color'])){ ?>style="color:<?php echo ''.$color; ?>"<?php } ?>><?php echo esc_attr($post_title); ?></h3></div>
<?php } ?>

<?php if(!empty($instance['listing_layout']['carousel_mode'])){ ?>
<div class="carousel-wrapper venues-grid">
    <div class="row">
        <ul class="owl-carousel carousel-fw" data-columns="<?php echo esc_attr($column); ?>" data-autoplay="<?php echo esc_attr($carousel_auto); ?>" data-pagination="<?php echo esc_attr($carousel_pagi); ?>" data-arrows="<?php echo esc_attr($carousel_nav); ?>" data-single-item="no" data-items-desktop="<?php echo esc_attr($column); ?>" data-items-desktop-small="2" data-items-tablet="2" data-items-mobile="1" <?php if ( is_rtl() ) { ?>data-rtl="rtl"<?php } else { ?> data-rtl="ltr" <?php } ?>>
<?php } else { ?>
<div class="row">
	<ul class="isotope-grid isotope blog-grid" data-sort-id="grid">
<?php } ?>

<?php while($post_listings->have_posts()) : $post_listings->the_post();
	$title = '<h3><a href="'.esc_url(get_permalink(get_the_ID())).'">'.get_the_title().'</a></h3>';
	if ( has_post_thumbnail() ) {
		$image_size = 'imic_600x400';
		$image = get_the_post_thumbnail(get_the_ID(),$image_size,array('class'=>'post-thumb'));
	} ?>
 <?php if(!empty($instance['listing_layout']['carousel_mode'])){ ?><li class="item"><?php } else { ?><li <?php post_class('col-md-'.$grid_column.' col-sm-6 grid-item'); ?>><?php } ?>
		<?php if(!empty($instance['listing_layout']['carousel_mode'])){ ?><div class="grid-item format-standard"><?php } else { ?><div class="format-standard"><?php } ?>
        
            <?php if ( has_post_thumbnail() ) { ?><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="media-box grid-featured-img">
                <?php echo ''.$image; ?>
                <span class="grid-item-date">
                    <span class="grid-item-day"><?php the_time('d'); ?></span>
                    <span class="grid-item-month"><?php the_time('M'); ?></span>
                </span>
            </a><?php } ?>
            <div class="grid-item-content">
                <?php echo ''.$title; ?>
                <?php if($excerpt_length!=""){
					echo '<div class="grid-item-excerpt">';
					echo imic_excerpt($excerpt_length);
					echo '</div>';
				} ?>
                <?php if($read_more_text!=""){ ?><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="pull-right basic-link"><?php echo esc_attr($read_more_text); ?></a><?php } ?>
                <?php if(!empty($instance['show_post_meta'])){ ?>
                <div class="meta-data grid-item-meta">
                    <i class="fa fa-comments-o"></i> <?php comments_popup_link(''.__('0','vestige'), '1', '%', 'comments-link',__('Comments off','vestige')); ?>
                </div>
                <?php } ?>
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
<?php if(!empty($instance['show_pagination'])){ ?>
<?php wp_link_pages( array(
	  'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'vestige' ) . '</span>',
	  'after'       => '</div>',
	  'link_before' => '<span>',
	  'link_after'  => '</span>',
  ) ); ?>
<!-- Pagination -->
<?php if(function_exists('imic_pagination')) { imic_pagination($post_listings->max_num_pages); } else { next_posts_link( 'Older Entries');
previous_posts_link( 'Newer Entries' ); } ?>
<?php } ?>
<?php endif; wp_reset_postdata(); ?>