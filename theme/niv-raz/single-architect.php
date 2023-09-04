<?php $td = get_template_directory_uri(); ?>
<?php get_header(); ?>

<?php 
	global $page_title_h1;
	$page_title_h1 = true;
	get_template_part( 'template-parts/top-inner' ); 
?>

<section class="architect">
	<div class="section-inner">
		<div class="parts">
			<div class="part part-info">
				<div class="inner">
					<div class="part-top">
						<div class="image">
							<?php $f = get_field('images')['image-architect']; ?> 
							<img src="<?=$f["url"]?>" alt="<?=$f["alt"]?>" title="<?=$f["title"]?>">
						</div>
						<div class="image">
							<?php $f = get_field('images')['image-logo']; ?> 
							<img src="<?=$f["url"]?>" alt="<?=$f["alt"]?>" title="<?=$f["title"]?>">
						</div>
					</div>

					<p class="name"><?=$post->post_title?></p>

					<div class="content">
						<?php 
							the_content();
						?>
					</div>
				</div>
			</div>
			<div class="part part-image">
				<div class="image">
					<?php $f = get_field('images')['image-main']; ?> 
					<img src="<?=$f["url"]?>" alt="<?=$f["alt"]?>" title="<?=$f["title"]?>">
				</div>
			</div>
		</div>

		<div class="panel-contacts">
			<div class="decoration">
				<img src="<?=$td?>/images/icons/link-arrow.png">
			</div>
			<?php if(get_field('conteacts')['address']) : ?>
			<div class="item">
				<div class="icon">
					<img src="<?=$td?>/images/icons/footer/house.svg">
				</div>
				<p><?=get_field('conteacts')['address']?></p>
			</div>
			<?php endif; ?>
			<?php if(get_field('conteacts')['tel']) : ?>
			<a class="item" href="tel:<?=get_field('conteacts')['tel']?>">
				<div class="icon">
					<img src="<?=$td?>/images/inner/contact/call.svg">
				</div>
				<p><?=get_field('conteacts')['tel']?></p>
			</a>
			<?php endif; ?>
			<?php if(get_field('conteacts')['email']) : ?>
			<a class="item" href="mailto:<?=get_field('conteacts')['email']?>">
				<div class="icon">
					<img src="<?=$td?>/images/icons/envelope.svg">
				</div>
				<p><?=get_field('conteacts')['email']?></p>
			</a>
			<?php endif; ?>
			<?php if(get_field('conteacts')['web']) : ?>
			<a class="item" href="<?=get_field('conteacts')['web']?>">
				<div class="icon">
					<img src="<?=$td?>/images/icons/world.svg">
				</div>
				<p><?=get_field('conteacts')['web']?></p>
			</a>
			<?php endif; ?>
			<?php if(get_field('conteacts')['instagram']['text']) : ?>
			<a class="item" href="<?=get_field('conteacts')['instagram']['url']?>">
				<div class="icon">
					<img src="<?=$td?>/images/icons/footer/inst.svg">
				</div>
				<p><?=get_field('conteacts')['instagram']['text']?></p>
			</a>
			<?php endif; ?>
			<?php if(get_field('conteacts')['facebook']['text']) : ?>
			<a class="item" href="<?=get_field('conteacts')['facebook']['url']?>">
				<div class="icon">
					<img src="<?=$td?>/images/icons/footer/fb.svg">
				</div>
				<p><?=get_field('conteacts')['facebook']['text']?></p>
			</a>
			<?php endif; ?>
		</div>

	</div>
</section>
	
<?php get_footer(); ?>