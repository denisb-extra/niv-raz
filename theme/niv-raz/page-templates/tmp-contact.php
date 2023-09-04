<?php
    // Template Name: Contact Page
?>
<?php $td = get_template_directory_uri(); ?>
<?php get_header(); ?>

<?php 
	global $page_title_h1;
	$page_title_h1 = true;
	get_template_part( 'template-parts/top-inner' ); 
?>

<section class="contact">
	<div class="section-inner narrow">
		<div class="sections">
			<div class="section section-form">
				<div class="title">
					<img src="<?=$td?>/images/inner/contact/c1.png" />
					<span><?=get_field('title')?></span>
				</div>
				<div class="info">
					<p><?=get_field('subtitle')?></p>
				</div>
				<div class="contact">
					<div class="icon">
						<img src="<?=$td?>/images/icons/svg/face.svg" />
					</div>
					<span>טל: <?=get_field('tel')?></span>
				</div>

				<?=do_shortcode('[contact-form-7 id="5" title="טופס יצירת קשר"]');?>
			</div>

			<div class="section section-items">
				<div class="wrapper">
					
					<?php 
						$items = get_field('offices');
						foreach($items as $item):
					?>
						<div class="items">
							<div class="item">
								<div class="icon">
									<img src="<?=$td?>/images/inner/contact/house.svg">
								</div>
								<div class="text">
									<?=$item['address']?>
								</div>
							</div>
							<div class="item">
								<div class="icon">
									<img src="<?=$td?>/images/inner/contact/call.svg">
								</div>
								<div class="text">
									<p>טל: <?=$item['tel']?></p>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
						

					<div class="items">
						<?php if(get_field('conteacts_')['email']) : ?>
						<a class="item" href="mailto:<?=get_field('conteacts_')['email']?>">
							<div class="icon">
								<img src="<?=$td?>/images/icons/envelope.svg">
							</div>
							<p><?=get_field('conteacts_')['email']?></p>
						</a>
						<?php endif; ?>
						<?php if(get_field('conteacts_')['web']) : ?>
						<a class="item" href="<?=get_field('conteacts_')['web']?>">
							<div class="icon">
								<img src="<?=$td?>/images/icons/world.svg">
							</div>
							<p><?=get_field('conteacts_')['web']?></p>
						</a>
						<?php endif; ?>
						<?php if(get_field('conteacts_')['instagram']['text']) : ?>
						<a class="item" href="<?=get_field('conteacts_')['instagram']['url']?>">
							<div class="icon">
								<img src="<?=$td?>/images/icons/footer/inst.svg">
							</div>
							<p><?=get_field('conteacts_')['instagram']['text']?></p>
						</a>
						<?php endif; ?>
						<?php if(get_field('conteacts_')['facebook']['text']) : ?>
						<a class="item" href="<?=get_field('conteacts_')['facebook']['url']?>">
							<div class="icon">
								<img src="<?=$td?>/images/icons/footer/fb.svg">
							</div>
							<p><?=get_field('conteacts_')['facebook']['text']?></p>
						</a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>