<?php
get_header();
$imic_options = get_option('imic_options');
imic_sidebar_position_module();
if (is_home()) {
	$id = get_option('page_for_posts');
} else {
	$id = get_the_ID();
}
$page_header = get_post_meta($id, 'imic_pages_Choose_slider_display', true);
if ($page_header == 3) {
	get_template_part('pages', 'flex');
} elseif ($page_header == 4) {
	get_template_part('pages', 'nivo');
} elseif ($page_header == 5) {
	get_template_part('pages', 'revolution');
} else {
	get_template_part('pages', 'banner');
}
$pageSidebarGet = get_post_meta(get_the_ID(), 'imic_select_sidebar_from_list', true);
$pageSidebarStrictNo = get_post_meta(get_the_ID(), 'imic_strict_no_sidebar', true);
$pageSidebarOpt = (isset($imic_options['team_sidebar'])) ? $imic_options['team_sidebar'] : '';
if ($pageSidebarGet != '') {
	$pageSidebar = $pageSidebarGet;
} elseif ($pageSidebarOpt != '') {
	$pageSidebar = $pageSidebarOpt;
} else {
	$pageSidebar = '';
}
if ($pageSidebarStrictNo == 1) {
	$pageSidebar = '';
}
$sidebar_column = get_post_meta(get_the_ID(), 'imic_sidebar_columns_layout', true);
$post_author_id = get_post_field('post_author', get_the_ID());
if (!empty($pageSidebar) && is_active_sidebar($pageSidebar)) {
	$left_col = 12 - $sidebar_column;
	$class = $left_col;
} else {
	$class = 12;
}
$post_author_id = get_post_field('post_author', get_the_ID());
?>
<!-- Start Body Content -->
<div class="main" role="main">
	<div id="content" class="content full">
		<div class="container">
			<div class="row">
				<div class="col-md-<?php echo esc_attr($class); ?>" id="content-col">
					<article class="single-team">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<?php
								$staff_position = get_post_meta(get_the_ID(), 'imic_staff_position', true);
								$social = imic_social_staff_icon();
								?>
								<?php if (has_post_thumbnail()) { ?>
									<div class="featured-image"><?php the_post_thumbnail('imic_600x400'); ?></div>
								<?php } ?>
								<div class="spacer-30"></div>
								<div class="single-post-header clearfix">
									<h1 class="short"><?php the_title(); ?></h1>
									<span class="meta-data accent-color"><?php echo '' . $staff_position; ?></span>
									<?php echo '' . $social; ?>
								</div>


								<div class="post-content">
									<?php the_content(); ?>
								</div>
								<div class="spacer-40"></div>
								<div class="meta-data alt">
									<div><?php $terms = get_terms("team-category");
											$count = count($terms);
											if ($count > 0) { ?><i class="fa fa-archive"></i>
											<?php foreach ($terms as $term) {
												echo esc_attr($term->name);
											}
										} ?></div>
								</div>
							<?php
						endwhile;
					endif; ?>
						<?php if (isset($imic_options['switch_sharing']) && $imic_options['switch_sharing'] == 1 && $imic_options['share_post_types']['5'] == '1') { ?>
							<?php imic_share_buttons(); ?>
						<?php } ?>
					</article>
				</div>
				<?php if (!empty($pageSidebar) && is_active_sidebar($pageSidebar)) { ?>
					<!-- Sidebar -->
					<div class="sidebar col-md-<?php echo esc_attr($sidebar_column); ?>" id="sidebar-col">
						<?php dynamic_sidebar($pageSidebar); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<!-- End Body Content -->
<?php get_footer(); ?>