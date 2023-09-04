<?php
    // Template Name: About Page
?>
<?php $td = get_template_directory_uri(); ?>
<?php get_header(); ?>

<?php 
	global $page_title_h1;
	$page_title_h1 = true;
	get_template_part( 'template-parts/top-inner' ); 
?>

<section class="slider-top">
	<div class="bg">
		<?php if(get_field('video')) : ?>
			<video video autoplay muted playsinline loop src="<?=get_field('video')['url']?>"></video>
		<?php else : ?>
		
		<div class="swiper-container slider-main">
			<div class="swiper-wrapper">
				<?php 
					$items = get_field('images-slider');
					foreach($items as $f):
				?>
					<div class="swiper-slide">
						<img src="<?=$f["url"]?>" alt="<?=$f["alt"]?>" title="<?=$f["title"]?>">
						<div class="text-after">
							<p><?=$f["description"]?></p>
						</div>
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
		<?php endif; ?>
	</div>


	<div class="arrow-down">
		<img src="<?=$td?>/images/icons/arrow-down.png">

		<div class="line"></div>
	</div>
</section>
<div class="space-after-slider"></div>

<section class="info cols-2">
	<div class="section-inner">
		<div class="content">
			<?php 
				the_content();
			?>
		</div>
	</div>
</section>

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