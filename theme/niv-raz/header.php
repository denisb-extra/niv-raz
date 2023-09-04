<?php $td = get_template_directory_uri(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='shortcut icon' type='image/x-icon' href='<?=$td?>/images/favicon.ico' />

	<script src="<?=$td?>/js/jquery-3.2.0.min.js"></script>
	<script src="<?=$td?>/js/main.js"></script>

	<link rel="stylesheet" href="<?=$td?>/plugins/swiper/swiper.css">
	<script src="<?=$td?>/plugins/swiper/swiper.js"></script> 
	
	<link rel="stylesheet" href="<?=$td?>/plugins/fancybox/jquery.fancybox.css">
	<script src="<?=$td?>/plugins/fancybox/jquery.fancybox.js"></script> 
	
	<script src="<?=$td?>/plugins/scrollreveal/scrollreveal.js"></script> 
	
	<script src="<?=$td?>/plugins/mmenu/jquery-simple-mobilemenu.js"></script>
	<link rel="stylesheet" href="<?=$td?>/plugins/mmenu/styles/jquery-simple-mobilemenu-slide.css">
	
	<link rel="stylesheet" href="<?=$td?>/css/style.css">
	
	<?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>
<header>
	<div class="header-inner section-inner ">
		<div class="part-right">
			<div class="ham-button"></div>
			<div class="lang-select">
				<a href="<?=get_permalink(81);?>" class="item">EN</a>
			</div>
			<?php
				$args = array(
					'theme_location'  => 'top-menu',
					'container_class' => 'menu-cont',
					'menu_class'      => 'main-menu',
				);
				wp_nav_menu( $args );
			?>
		</div>
	
		<div class="part-left">
			<a class="logo" href="<?=get_home_url();?>">
				<?php $f = get_field('header', 'options')['logo']; ?> 
				<img src="<?=$f["url"]?>" alt="<?=$f["alt"]?>" title="<?=$f["title"]?>">
			</a>
		</div>
		<?php
			$args = array(
				'theme_location'  => 'mobile-menu',
				'container_class' => 'mobile-menu-cont',
				'menu_class'      => 'mobile_menu',
			);
			wp_nav_menu( $args );
		?>
	</div>
</header>

<div class="panel-floating">
	<div class="icons">
		<?php 
			$items = get_field('sidebar', 'options')['links-icons'];
			foreach($items as $item):
		?>
			<a class="icon" href="<?=$item["url"];?>">
				<?php $f = $item['icon']; ?> 
				<img src="<?=$f["url"]?>" alt="<?=$f["alt"]?>" title="<?=$f["title"]?>">
			</a>
		<?php endforeach; ?>
	</div>
	<div class="items">
		<?php 
			$i=0;
			$s = sizeof($items);
			$items = get_field('sidebar', 'options')['links-text'];
			foreach($items as $item):
			$i++;
		?>
			<a href="<?=$item["url"];?>" class="item">
				<span><?=$item["text"];?></span>
			</a>
			<?php if($i<$s) : ?>
			<div class="sep">
				<span>---</span>
			</div>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>