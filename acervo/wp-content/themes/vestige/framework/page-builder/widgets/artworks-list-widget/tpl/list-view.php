<?php
$the_categories = wp_kses_post($instance['categories']);
$the_artists = wp_kses_post($instance['artists']);
$post_title = wp_kses_post($instance['title']);
$title_position = wp_kses_post($instance['title_position']);
$color = esc_attr($instance['custom_color']);
$excerpt_length = wp_kses_post($instance['excerpt_length']);
$numberPosts = (!empty($instance['number_of_posts']))? $instance['number_of_posts'] : 4 ;
$read_more_text = wp_kses_post($instance['read_more_text']);
?>
<?php $post_args = array ( 'post_type' => 'artwork', 'artwork-category' => $the_categories, 'artwork-artists' => $the_artists, 'posts_per_page' => $numberPosts, 'paged' => get_query_var('paged') );
$post_listings = new WP_Query($post_args);
if($post_listings->have_posts()) : 
if(!empty($instance['title'])){ ?>
<div class="text-align-<?php echo esc_attr($title_position); ?>"><h3 class="widget-title" <?php if(!empty($instance['custom_color'])){ ?>style="color:<?php echo ''.$color; ?>"<?php } ?>><?php echo esc_attr($post_title); ?></h3></div>
<?php } ?>
<div class="">
<?php while($post_listings->have_posts()) : $post_listings->the_post();
	$title = '<h3 class="short"><a href="'.esc_url(get_permalink(get_the_ID())).'">'.get_the_title().'</a></h3>';
	if ( has_post_thumbnail() ) {
		$image_size = 'imic_600x400';
		$image = '<div class="post-media">
   		<a href="'.esc_url(get_permalink(get_the_ID())).'" class="img-thumbnail">'.get_the_post_thumbnail(get_the_ID(),$image_size,array('class'=>'post-thumb')).'</a>
  	</div>'; } ?>
	<!-- List Item -->
    <div <?php post_class('list-item blog-list-item artwork-list-item format-standard'); ?>>
        <div class="row">
        	<?php if ( has_post_thumbnail() ) { ?>
            <div class="col-md-4 col-sm-4">
                <?php echo ''.$image; ?>
               	<?php if(!empty($instance['show_price'])){
					$artwork_price = get_post_meta(get_the_ID(),'imic_artwork_price',true);
					if($artwork_price != ''){
						echo '<span class="artwork-price">'.$artwork_price.'</span>';
					}
				} ?>
            </div>
            <?php } ?>
            <?php if ( has_post_thumbnail() ) { ?><div class="col-md-8"><?php } else { ?><div class="col-md-12"><?php } ?>
                <?php echo ''.$title; ?>
                <?php $artists= get_the_term_list(get_the_ID(), 'artwork-artists', '', ', ', '');
				if(!empty($artists)){
					echo '<div class="meta-data artists-list">';
					echo esc_attr_e('By ','vestige');
					echo ''.$artists;
					echo '</div>';
				} ?>
               	<?php if(!empty($instance['show_dimension'])){
					$artwork_dimension = get_post_meta(get_the_ID(),'imic_artwork_dimension',true);
					if($artwork_dimension != ''){
						echo '<div class="meta-data">'.esc_attr('Dimensions: ','vestige').$artwork_dimension.'</div>';
					}
				} ?>
                <?php $category= get_the_term_list(get_the_ID(), 'artwork-category', '', ', ', '');
				if(!empty($category)){
					echo '<div class="meta-data">';
					echo '<i class="fa fa-tags"></i> '.$category;
					echo '</div>';
				} ?>
                <?php if($excerpt_length!=""){
					echo '<div class="spacer-10"></div><div class="list-item-excerpt">';
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
<?php endif; wp_reset_postdata(); ?>