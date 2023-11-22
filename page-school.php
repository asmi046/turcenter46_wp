<?php
/*
Template Name: Школьные туры
*/
?>

<?php get_header("school"); ?>
<script>
	jQuery(document).ready(function($) { 
			$(".naprWriper .turnavi").click(function(){ 
				$(".turnavi").removeClass("navSelect");
				$(this).addClass("navSelect");
				$(".turnavi"+$(this).data("index")).addClass("navSelect");
				
				$(".schoolTourElems").hide();
				$("#box"+$(this).data("index")).show();
			});
	});
			
</script>

	<div class = "line banerLine banerLineInPage">
		<div class = "allB">
			<div style = "display:block; background: url(<?php bloginfo('template_url');?>/images/b/<?php echo get_post_meta( $post->ID, "banerName", true)?>);" class = "b">
				<div class = "centerInLine">
<!--
					<div class = "banerText">
					
					</div>
					-->
					
				</div>
			</div>
			
			
			<div class = "firstM">
				1 место</br>
				"Независимый рейтинг 2015г."
			</div>
			
		</div>
	</div>
	
	<div class = "line PageContent">
		<div class = "centerInLine">
				<div class="breadcrumb">
					<?php
					if(function_exists('bcn_display'))
					{
						bcn_display();
					}
					?>
				</div>
			<h1>Школьные туры</h1>
			<div class = "aboutRegion">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php the_content();?>
				<?php endwhile;?>
				<?php endif; ?>
			</div>
			
			<div class="naprWriper schoolNavi">
				<div data-index = "0" class="turnavi0 turnavi navSelect">Все</div>
				<div data-index = "1" class="turnavi1 turnavi">Популярные</div>
				<div data-index = "2" class="turnavi2 turnavi">Туры выходного дня</div>
				<div data-index = "3" class="turnavi3 turnavi">Белгород и область</div>
				<div data-index = "4" class="turnavi4 turnavi">Курский край</div>
				<div data-index = "5" class="turnavi5 turnavi">Воронеж и область</div>
				<div data-index = "6" class="turnavi6 turnavi">Орловская область</div>
				<div data-index = "7" class="turnavi7 turnavi">Тульская область</div>
			</div>
			
			<?php
				$schoolTour = array(
					array(5, "Все школьные туры"),
					array(12, "популярные школьные туры"), 
					array(6, "Туры выходного дня"),
					array(8, "Белгородская область"),
					array(7, "Курский край"),
					array(10, "Воронежская область"),
					array(9, "Орловская область"),
					array(11, "Тульская область"),
					
				);
			?>
			
			<?php for ($i = 0; $i < count($schoolTour); $i++): ?>
			
			<div id = "box<?php echo $i; ?>" class = "schoolTourElems">
				<h2><?php echo $schoolTour[$i][1]; ?></h2>
				<?php
					$args = array(
						'numberposts' => -1,
						'category'    => $schoolTour[$i][0],
						'post_type'   => 'post',
						'suppress_filters' => true, 
					);

					$posts = get_posts( $args );

					foreach($posts as $post){ 
					setup_postdata($post);
						echo "<div class = 'schoolTourElem'>";
						//echo carbon_get_post_meta($post->ID,'school_ops_lnk');
							if (empty(carbon_get_post_meta($post->ID,'school_ops_lnk'))){
								echo "<div class = 'turThumb'>";
										echo get_the_post_thumbnail( $post->ID, "turImg", array("alt" => $post->post_title, "title" => $post->post_title));
								echo "</div>";
							} else {
								echo "<a href = '".carbon_get_post_meta($post->ID,'school_ops_lnk')."'>";
									echo "<div class = 'turThumb'>";
										echo get_the_post_thumbnail( $post->ID, "turImg", array("alt" => $post->post_title, "title" => $post->post_title));
									echo "</div>";
								echo "</a>";
							}
							
							if (empty(carbon_get_post_meta($post->ID,'school_ops_lnk'))){
								echo "<div class = 'text'>";
									echo "<h3>".$post->post_title."</h3>";
									echo $post->post_content."<br />";
									echo "<div class = 'price'><div class = 'zag'>Цена: </div>".apply_filters('the_content', get_post_meta($post->ID, "sPrice", true))."</div>";
								echo "</div>";
							} else { 
								
								echo "<div class = 'text'>";
									echo "<a href = '".carbon_get_post_meta($post->ID,'school_ops_lnk')."'>";
										echo "<h3>".$post->post_title."</h3>";
										echo $post->post_content."<br />";
										echo "<div class = 'price'><div class = 'zag'>Цена: </div>".apply_filters('the_content', get_post_meta($post->ID, "sPrice", true))."</div>";
									echo "</a>";
								echo "</div>";
							
							}
						echo "</div>";
					}
				?>
			</div>
			<?php endfor; ?>
			
			
		</div>
	</div>
	
	
<?php get_footer(); ?>