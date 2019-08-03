<?php
$the_categories = wp_kses_post($instance['categories']);
$post_title = wp_kses_post($instance['title']);
$title_position = wp_kses_post($instance['title_position']);
$color = esc_attr($instance['custom_color']);
$excerpt_length = wp_kses_post($instance['excerpt_length']);
$numberPosts = (!empty($instance['number_of_posts']))? $instance['number_of_posts'] : 4 ;
$read_more_text = wp_kses_post($instance['read_more_text']);
?>
<?php $post_args = array ( 'post_type' => 'post', 'category_name' => $the_categories, 'posts_per_page' => $numberPosts, 'paged' => get_query_var('paged') );
$post_listings = new WP_Query($post_args);
if($post_listings->have_posts()) : 
if(!empty($instance['title'])){ ?>
<div class="text-align-<?php echo esc_attr($title_position); ?>"><h3 class="widget-title" <?php if(!empty($instance['custom_color'])){ ?>style="color:<?php echo ''.$color; ?>"<?php } ?>><?php echo esc_attr($post_title); ?></h3></div>
<?php } ?>
<div class="posts-listing">
<?php while($post_listings->have_posts()) : $post_listings->the_post();
	$title = '<h3><a href="'.esc_url(get_permalink(get_the_ID())).'">'.get_the_title().'</a></h3>';
	if ( has_post_thumbnail() ) {
		$image_size = 'imic_600x400';
		$image = '<div class="post-media">
   		<a href="'.esc_url(get_permalink(get_the_ID())).'" class="img-thumbnail">'.get_the_post_thumbnail(get_the_ID(),$image_size,array('class'=>'post-thumb')).'</a>
  	</div>'; } ?>
	<!-- List Item -->
    <div <?php post_class('list-item blog-list-item format-standard'); ?>>
        <div class="row">
        	<?php if ( has_post_thumbnail() ) { ?>
            <div class="col-md-4 col-sm-4">
                <?php echo ''.$image; ?>
            </div>
            <?php } ?>
            <?php if ( has_post_thumbnail() ) { ?><div class="col-md-8"><?php } else { ?><div class="col-md-12"><?php } ?>
                <?php echo ''.$title; ?>
                <?php if(!empty($instance['show_post_meta'])){ ?><div class="meta-data alt">
                    <div><i class="fa fa-clock-o"></i> <?php echo esc_html(get_the_date()); ?></div>
                    <div><i class="fa fa-archive"></i> <?php the_category(', '); ?></div>
                </div><?php } ?>
                <?php if($excerpt_length!=""){
					echo '<div class="list-item-excerpt">';
					echo imic_excerpt($excerpt_length);
					echo '</div>';
				} ?>
                <?php if($read_more_text!=""){ ?><div class="post-actions">
                    <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>" class="btn btn-primary"><?php echo esc_attr($read_more_text); ?></a>
                </div><?php } ?>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<?php if(!empty($instance['show_pagination'])){ ?>
<?php wp_link_pages( array(
	  'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'vestige' ) . '</span>',
	  'after'       => '</div>',
	  'link_before' => '<span>',
	  'link_after'  => '</span>',
  ) ); ?>
</div>
<!-- Pagination -->
<?php if(function_exists('imic_pagination')) { imic_pagination($post_listings->max_num_pages); } else { next_posts_link( 'Older Entries');
previous_posts_link( 'Newer Entries' ); } ?>
<?php } ?>
</div>
<?php endif; wp_reset_postdata(); ?>