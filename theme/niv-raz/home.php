<?php $td = get_template_directory_uri(); ?>
<?php get_header(); ?>

<?php
	$id = get_option( 'page_for_posts' );
	setup_postdata($id);
	global $post;
	$post = get_post($id);
?>

<?php 
	global $page_title_h1;
	$page_title_h1 = true;
	get_template_part( 'template-parts/top-inner' ); 
?>

<section class="architects">
	<div class="section-inner">
		<p class="section-title"><?=$post->post_title?></p>

		<div class="boxes">
			<?php
				$args = array(
					'post_type'             => 'post',
					'posts_per_page'        => -1,
					'post_status'           => 'publish',
					'ignore_sticky_posts'   => 1,
				);
			
				$items = get_posts($args);
				foreach($items as $item) {
					template_post_box($item->ID);
				}
			?>
		</div>
	</div>
</section>

<?php get_footer(); ?>