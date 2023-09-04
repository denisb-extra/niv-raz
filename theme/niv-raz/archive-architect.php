<?php
    // Template Name: Architects Page
?>

<?php $td = get_template_directory_uri(); ?>
<?php get_header(); ?>


<?php
	$id = 13;
	setup_postdata($id);
	global $post;
	$post = get_post($id);
	global $wp_query;
	$wp_query -> queried_object = $post;
?>

<?php 
	global $page_title_h1;
	$page_title_h1 = true;
	get_template_part( 'template-parts/top-inner' ); 
?>

<section class="architects">
	<div class="section-inner">
		<p class="section-title"><?=get_field('title')?></p>

		<div class="boxes">
			<?php 
				$args = Array(
					'post_type' => 'architect',
					'numberposts' => -1,
					'fields' => 'ids',
					'no_found_rows' => true,
					'update_post_term_cache' => false,
					'update_post_meta_cache' => false,
				);
				
				$architects = get_posts($args);
				foreach($architects as $id) {
					template_architect_box($id);
				}
				
			?>
		</div>
	</div>
</section>
<?php get_footer(); ?>