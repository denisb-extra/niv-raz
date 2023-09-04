<?php
    // Template Name: Projects Page
?>

<?php $td = get_template_directory_uri(); ?>
<?php get_header(); ?>


<?php
	$id = 10;
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


<?php 
	$tax_query = array();
	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
	$args = Array(
		'post_type' => 'project',
		'numberposts' => 15,
		'paged' => $paged,
		'fields' => 'ids',
		'no_found_rows' => true,
		'update_post_term_cache' => false,
		'update_post_meta_cache' => false,
		'tax_query' => $tax_query,
	);
	
	$projects = get_posts($args);
	
?>

<div class="big-loader loading"></div>

<section class="projects">
	<div class="section-inner">
		<div class="title-image mobile">
			<img src="<?=$td?>/images/index/title-projects.png">
		</div>
		<div class="button-open-filters">
			<div class="inner">
				<img src="<?=$td?>/images/icons/filter.png">
				<span>סינונן וחיפוש</span>
			</div>
		</div>
		<div class="panel-projects">
			<div class="close">
				<img src="<?=$td?>/images/icons/close-dark.svg">
			</div>
			<div class="cols">
				<div class="col logo">
					<img src="<?=$td?>/images/index/title-projects.png">
				</div>
				<div class="col filters">
					<?php 
						$taxes = array_reverse(get_object_taxonomies('project'));
						foreach($taxes as $tax_slug):
						$tax = get_taxonomy($tax_slug);

						$atts = array(
							'taxonomy' => $tax->name,
							'hide_empty' => false,
							
						);
					
						$terms = get_terms($atts);
						if(!$terms) continue;
						
						if($tax->label == "אלמנטים בפרוייקט") $tax->label = "סינון על פי פריט:";
						if($tax->label == "סוגי פרויקטים") $tax->label = "סינון על פי פרוייקט:";
	
					
					?>
					<div class="parameters-selector tax-select" taxonomy="<?=$tax->name?>">
						<p class="title"><?=$tax->label?></p>
						<div class="items">
							<?php 
								foreach($terms as $term):
								$count = $term->count;
							?>
							<div class="item" term-id="<?=$term->term_id?>">
								<span class="text"><?=$term->name?></span>
								<span class="num">(<?=$count?>)</span>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endforeach; ?>

					<div class="results">
						<div class="inner">
							<div class="tags-wrapper">
								<p class="caption">תוצאות: <span class="result-count"></span></p>
							</div>
						</div>
					</div>
				</div>
				
				<div class="col nav">
					<?php the_posts_pagination(); ?>
				</div>
				
			</div>
		</div>

		<div class="boxes projects">
			<?php
				foreach($projects as $project) {	
					template_project_box($project, true);
				}
			?>
		</div>
	</div>
</section>


<script>
	$(document).ready(function ($) {
		$(".button-open-filters").on("click", function(){
			$(".panel-projects").toggleClass("open");
		});

		$(".panel-projects .close").on("click", function(){
			$(".panel-projects").toggleClass("open");
		});


		
		$(".tax-select .item").on("click", function(){
			$(this).toggleClass('active');
			filterProducts();
			
			buildTagList();
		});

		
		var boxesCount = $(".box-project:visible").length;
		$(".result-count").text(boxesCount);
		
		
		
		$(".search-field input").on("keyup", function(){
			var str = $(this).val();
			if(str.length > 2 || !str) startCounting();
			else stopCounting();
		});
	});
	
	

	
	function buildTagList() {
		$(".tags-wrapper .tag").remove();
		
		$(".tax-select .item.active").each(function(){
			var tag = $('<div class="tag" term-id="' + $(this).attr("term-id") + '"><span>' + $(".text", this).text() + '</span></div>');
			$(".tags-wrapper").append(tag);
		});
		
		$(".tags-wrapper .tag").on("click", function() {
			var tagId = $(this).attr('term-id');
			$(".tax-select .item[term-id='"+tagId+"']").click();
		});
	}
	
	var filtered = false;
	function filterProducts(time = 250) {
		if(!filtered) {
			filtered = true;
			load_all_projects();
			return;
		}
		var str = $(".search-field input").val();

		$(".boxes.projects").animate({'opacity': 0}, time, function(){
			var count = 0;
			$(".boxes.projects .box").each(function(){
				var box = this;
				var id = $(this).attr('product-id');
							
				var visible = true;	
				
				if(str) {
					var projectTitle = $(".line-1", this).text();
					if(!projectTitle.includes(str)) {
						visible = false;
					}
				}
				$(".tax-select").each(function(){
					if(!visible) return false;

					var tax = $(this).attr("taxonomy");
					var activeItems = $(this).find('.item.active');
					
					if(!activeItems.length) {
						return true;
					}

					var taxIsGood = false;
					activeItems.each(function(){
						if(taxIsGood) return false;
						if(!$(box).attr(tax)) {
							visible = false;
							return false;
						}
						var ids = $(box).attr(tax).split(',');
						if(!ids) {
							visible = false;
							return false;
						}
						
						var termId = $(this).attr('term-id');
						
						if(ids.includes(termId)) {
							taxIsGood = true;
							return false;
						}
					});
					
					if(!taxIsGood) visible = false;
				});
				
				if(visible) {
					$(this).show();
					count ++;
				}
				else {
					$(this).hide();
				}
			});
			
			$(".no-products").remove();
			if(count < 1) {
				$(".boxes.projects").append('<p class="no-products">לא נמצאו פרויקטים תואמים לתנאי החיפוש</p>');
			}
	
			$(".boxes.projects").animate({'opacity': 1}, time, function(){
				//hideEmptyTerms();
			});
			
			var boxesCount = $(".box-project:visible").length;
			$(".result-count").text(boxesCount);
		});
	}
	
	<?php 
		$cat_id = '0';
	?>
	
	function load_all_projects() {
		$.ajax({
			type: "POST",
			url: "<?php echo admin_url('admin-ajax.php'); ?>",
			data: {
				action: 'load_projects_by_cat_id',
				cat_id: '<?=$cat_id?>',
			},
			beforeSend: function(){
				$('.big-loader').fadeIn();
			},
			success: function(answer){
				$(".boxes.projects").html(answer);
				$('.big-loader').fadeOut();
				$(".nav-links").hide();
				filterProducts();
				
			},
			complete: function(answer){
				
			},
			eror: function() {console.log("error during ajax request");},
		});
	}
</script>
	
<?php get_footer(); ?>