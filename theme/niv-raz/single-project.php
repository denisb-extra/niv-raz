<?php $td = get_template_directory_uri(); ?>
<?php get_header(); ?>

<?php 
	global $page_title_h1;
	$page_title_h1 = true;
	get_template_part( 'template-parts/top-inner' ); 
?>

<section class="slider-top">
	<div class="bg">
		<div class="image">
			<?php $f = get_field('main-image'); ?> 
			<img src="<?=$f["url"]?>" alt="<?=$f["alt"]?>" title="<?=$f["title"]?>">
			<div class="text-after">
				<p><?=$f["description"]?></p>
			</div>
		</div>
		
	</div>
	<div class="arrow-down">
		<img src="<?=$td?>/images/icons/arrow-down.png">

		<div class="line"></div>
	</div>

</section>

<div class="space-after-slider"></div>

<section class="project">
	<div class="section-inner">
		<p class="section-title centered"><?=$post->post_title?></p>

		<div class="content narrow centered about">
			<?php 
				the_content();
			?>
			
		</div>

		<div class="panel-project">
			<div class="elements">
				<div class="el caption">
					<p class="">האלמנטים
					בפרוייקט:</p>
				</div>
				<?php 
					$terms = get_the_terms($post, 'project-element');
					foreach($terms as $term):
				?>
					<div class="el" title="<?=$term->name?>">>
						<?php $f = get_field("icon", $term); ?> 
						<img src="<?=$f["url"]?>" alt="<?=$term->name?>" title="<?=$term->name?>">
					</div>
				<?php endforeach; ?>
			</div>

			<div class="info">
				<?php 
					$architect = get_field('architect');
				?>
				
				<p class="line">אדריכלות ועיצוב פנים: <?=$architect->post_title?>
					| <a href="<?=get_permalink($architect);?>">לפרטים נוספים >></a>
				</p>
				<p class="line">צילום: <?=get_field('photographer')?></p>
			</div>
		</div>
	</div>

	<div class="boxes">
		<?php 
			$items = get_field('gallery');
			foreach($items as $f):
		?>
			<a class="box box-project-image" data-fancybox="gallery" href="<?=$f["url"]?>">
				<div class="inner">
					<div class="icon">
						<img src="<?=$td?>/images/icons/project.png">
					</div>
					<img src="<?=$f["sizes"]['thumb-project-gal']?>" alt="<?=$f["alt"]?>" title="<?=$f["title"]?>">
				</div>
			</a>
		<?php endforeach; ?>
	</div>
</section>
	
<?php get_footer(); ?>