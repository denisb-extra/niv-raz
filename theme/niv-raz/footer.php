<?php $td = get_template_directory_uri(); ?>

<?php if(get_cur_template() != "tmp-contact.php") : ?>
<?php endif; ?>



<footer>
	<div class="section-inner">
		<?php if(get_cur_template() == "tmp-en.php") : ?>
		<div class="cols en">
			<div class="col">
				<div class="social">
					<?php 
						$items = get_field('footer')['social'];
						foreach($items as $item):
					?>
						<a href="<?=$item['url']?>" class="icon" target="_blank">
							<?php $f = $item['icon']; ?> 
							<img src="<?=$f["url"]?>" alt="<?=$f["alt"]?>" title="<?=$f["title"]?>">
						</a>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col">
				<div class="offices">
					<div class="icon">
						<img src="<?=$td?>/images/icons/footer/house.svg">
					</div>
					<?php 
						$items = get_field('footer')['offices'];
						foreach($items as $item):
					?>
						<div class="item">
							<?=$item['address']?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col">
				<div class="contacts">
					<div class="icon">
						<img src="<?=$td?>/images/icons/footer/message.svg">
					</div>
					<?php 
						$items = get_field('footer')['contacts'];
						foreach($items as $item):
					?>
						<div class="item">
							<?=$item['text']?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php else : ?>
		<div class="cols">
			<div class="col">
				<div class="social">
					<?php 
						$items = get_field('footer', 'options')['social'];
						foreach($items as $item):
					?>
						<a href="<?=$item['url']?>" class="icon" target="_blank">
							<?php $f = $item['icon']; ?> 
							<img src="<?=$f["url"]?>" alt="<?=$f["alt"]?>" title="<?=$f["title"]?>">
						</a>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col">
				<div class="offices">
					<div class="icon">
						<img src="<?=$td?>/images/icons/footer/house.svg">
					</div>
					<?php 
						$items = get_field('footer', 'options')['offices'];
						foreach($items as $item):
					?>
						<div class="item">
							<?=$item['address']?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col">
				<div class="contacts">
					<div class="icon">
						<img src="<?=$td?>/images/icons/footer/message.svg">
					</div>
					<?php 
						$items = get_field('footer', 'options')['contacts'];
						foreach($items as $item):
					?>
						<div class="item">
							<?=$item['text']?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<?php if(get_field('footer', 'options')['whatsapp']) : ?>
			<div class="col">
				<div class="social">
					<a href="<?=get_field('footer', 'options')['whatsapp']?>" class="icon">
						<img src="<?=$td?>/images/icons/footer/wa.png">
					</a>
				</div>
			</div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<?php
			$args = array(
				'theme_location'  => 'footer-menu',
				'container_class' => 'menu-cont',
				'menu_class'      => 'menu',
			);
			wp_nav_menu( $args );
		?>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>