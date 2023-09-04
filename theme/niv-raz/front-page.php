<?php
    // Template Name: Home Page
?>

<?php $td = get_template_directory_uri(); ?>
<?php get_header(); ?>

<section class="slider-top">
	<div class="bg">
		<div class="swiper-container slider-main">
			<div class="swiper-wrapper">
				<?php 
					$items = get_field('section-hero')['slider'];
					foreach($items as $f):
				?>
					<div class="swiper-slide">
						<img src="<?=$f["url"]?>" alt="<?=$f["alt"]?>" title="<?=$f["title"]?>">
					</div>
				<?php endforeach; ?>
			</div>
			<div class="panel">
				<div class="pagination"></div>
				<div class="nav">
					<div class="arrow right">
						<img src="<?=$td?>/images/icons/arrow-right.png">
					</div>
					<div class="arrow left">
						<img src="<?=$td?>/images/icons/arrow-left.png">
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<div class="image-slider">
		<?php $f = get_field('section-hero')['image-on-slider']; ?> 
		<img src="<?=$f["url"]?>" alt="<?=$f["alt"]?>" title="<?=$f["title"]?>">
	</div>

	<div class="arrow-down">
		<img src="<?=$td?>/images/icons/arrow-down.png">
		<div class="line"></div>
	</div>
</section>

<div class="panel-links">
	<div class="section-inner">
		<div class="links">
			<p class="text">לקבלת הצעה</p>
			<a href="#" class="link">
				<img src="<?=$td?>/images/icons/envelope.png">
			</a>
			<a href="#" class="link">
				<img src="<?=$td?>/images/icons/service.png">
			</a>
		</div>
	</div>
</div>

<section class="projects">
	<div class="section-inner">
		<div class="title-image">
			<img src="<?=$td?>/images/index/title-projects.png">
		</div>
		<div class="centered">
			<a href="<?=get_permalink(11);?>" class="button-regular"><< לכל הפרוייקטים</a>
		</div>

		<div class="boxes">
			<?php 
				$items = get_field('section-projects')['projects'];
				foreach($items as $item) {
					template_project_box($item);		
				}
			?>
		</div>
	</div>
</section>

<section class="info">
	<div class="section-inner">
		<p class="title-regular centered"><?=get_field('section-about')['title']?></p>
		<div class="content narrow centered about">
			<?=get_field('section-about')['text']?>
		</div>
	</div>
</section>

<?php 
	$i=0;
	$items = get_field('section-content');
	foreach($items as $item):
	$i++;
?>
<section class="brand <?php if($i==1) echo "first" ?>">
	<div class="section-inner">
		<div class="parts">
			<div class="part part-text">
				<div class="logo">
					<?php $f = $item['logo']; ?> 
					<img src="<?=$f["url"]?>" alt="<?=$f["alt"]?>" title="<?=$f["title"]?>">
				</div>
				<div class="content">
					<?=$item['text']?>
				</div>

				<a href="<?=$item['url']?>" class="button-link">
					<img src="<?=$td?>/images/icons/link-arrow.png">
				</a>
			</div>
			<div class="part part-image">
				<div class="image">
					<?php $f = $item['image-main']; ?> 
					<img src="<?=$f["url"]?>" alt="<?=$f["alt"]?>" title="<?=$f["title"]?>">
				</div>
			</div>
		</div>
	</div>
</section>
<?php endforeach; ?>


<script>
	$(document).ready(function ($) {
		var mySwiper = new Swiper('.slider-main', {
			slidesPerView: 5,
			spaceBetween: 50,
			loop: true,
			effect: 'fade',
			fadeEffect: {
				crossFade: true
			},
			autoplay: {
				delay: 3000,
				disableOnInteraction: false,
			},
			speed: 1000,
			navigation: {
				nextEl: '.arrow.right',
				prevEl: '.arrow.left',
			},
			pagination: {
				el: '.pagination',
				type: 'bullets',
				clickable: true,
			},
			breakpoints: {
				0: {
					spaceBetween: 35,
				},
				1360: {
					spaceBetween: 55,
				},
			}
		});
	});
</script>

<?php get_footer(); ?>