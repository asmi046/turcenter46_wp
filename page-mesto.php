<?php
/*
Template Name: Автобусные туры - место
*/
?>

<?php get_header("mesto"); ?>

<script>
	var imgIndex = 0;
	var LentPosition = 0;
	
	function neximgLb() {
		imgIndex++;
		if (jQuery(".prevyGalery img").length<=imgIndex)
				imgIndex = 0;
		jQuery(".lightbox .img").html(jQuery("#imgblk"+imgIndex).html());
		jQuery(".galery .bigImg .imgWiev").html(jQuery("#imgblk"+imgIndex).html());
	}
	
	function previmgLb() {
		imgIndex--;
		if (imgIndex<0)
			imgIndex = jQuery(".prevyGalery img").length-1;
		jQuery(".lightbox .img").html(jQuery("#imgblk"+imgIndex).html());
		jQuery(".galery .bigImg .imgWiev").html(jQuery("#imgblk"+imgIndex).html());
	}
	

	jQuery(document).ready(function(event) { 
			jQuery(".prevyGalery .lent").css ("width", jQuery(".prevyGalery img").length*110);
			jQuery(".imgWraper").click(function(){ 
				
				jQuery(".galery .bigImg .imgWiev").html(jQuery(this).html());
				imgIndex = jQuery(this).data("index");
			});
			jQuery(".bigImg .imgWiev").click(function(){ 
				jQuery(".lightbox").show();
				jQuery("body").addClass("fsMode");
				jQuery(".lightbox .img").html(jQuery(this).html());
				jQuery('.osnNaprFixed').hide();
			});
			
			jQuery(".lightbox .closeBtn").click(function(){ 
				jQuery(".lightbox").hide();
				jQuery("body").removeClass("fsMode");
			});
			
			jQuery(".lightbox .nextBtn").click(function(){ 
				neximgLb();
			});
			
			jQuery(".lightbox .prevBtn").click(function(){ 
				previmgLb();
			});
			
			jQuery(".bigImg .nextBtn").click(function(){ 
				neximgLb();
			});
			
			jQuery(".bigImg .prevBtn").click(function(){ 
				previmgLb();
			});
			
			jQuery(".prevyGalery .nextBtn").click(function(){ 
				
				LentPosition-=100;
				if (LentPosition<(jQuery(".prevyGalery").width() - jQuery(".prevyGalery .lent").width())) {
					LentPosition+=100;
					return;
				}
				jQuery(".prevyGalery .lent").css("left",LentPosition+"px");
			});
			
			jQuery(".prevyGalery .prevBtn").click(function(){ 
				LentPosition+=100;
				if (LentPosition>0) LentPosition= 0;
				jQuery(".prevyGalery .lent").css("left",LentPosition+"px");
			});
			
	});	
</script>

	<div class = "line banerLine banerLineInPage">
		<div class = "allB">
			<div style = "display:block; background: url(<?php bloginfo('template_url');?>/images/b/<?php echo get_post_meta( $post->ID, "banerName", true)?>);" class = "b">
				<div class = "centerInLine">
					<div class = "banerText">
							<p><?php echo get_pages( array("include" => get_ancestors( $post->ID, 'page' )[0] ) )[0]->post_title;?></p>
					</div>
					
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
		
		<h1><?php echo $post->post_title; ?></h1>
		<div class = "allOtelInfoWriper">	
			<div class = "otelInfoWriper">	
				<div class = "leftStlb">
					<div class = "galery">
						<?php
								$inputString = "";
								$files = scandir($_SERVER['DOCUMENT_ROOT']."/galery/".get_post_meta($post->ID, "galeryFolder",true));
								$count = 0;
								foreach($files as $file)
								{
									 
									if ($file == '.' || $file == '..') continue;
									if (is_dir($fullfilename))  continue;
									$imgSize = getimagesize($_SERVER['DOCUMENT_ROOT']."/galery/".get_post_meta($post->ID, "galeryFolder",true)."/".$file);
									
									$imgName = ""; 
									$imgDerection = "horDir";
									if ($imgSize[0]<$imgSize[1]) {
										$imgName = " vertDirection";
										$imgDerection = "verDir";
									}
									
									$inputString .= "<div data-index = '".$count."' id = 'imgblk".$count."'  class = 'imgWraper ".$imgName."'>";
										$inputString .= "<img rel='lightbox' class = '".$imgDerection."' src = '".get_bloginfo("url")."/galery/".get_post_meta($post->ID, "galeryFolder",true)."/".$file."' />";
									$inputString .= "</div>";
									
									if ($count == 0)
											$firstImg = "<img class = '".$imgDerection."' src = '".get_bloginfo("url")."/galery/".get_post_meta($post->ID, "galeryFolder",true)."/".$file."' />";
									
									$count++;
								}
						?>
						<div class = "bigImg">
							<div class = "btnStr prevBtn">
								<i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;
							</div>
							<div class = "imgWiev">
								<?php echo $firstImg; ?>
							</div>
							<div class = "btnStr nextBtn">
								<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;
							</div>
						</div>
						<div class = "prevyGalery">
							<div class = "btnStr prevBtn">
								<i class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;
							</div>
							
							<div class = "lent">
								<?php echo $inputString; ?>
							</div>
							
							<div class = "btnStr nextBtn">
								<i class="fa fa-chevron-right" aria-hidden="true"></i>&nbsp;
							</div>
						</div>
					</div>
					
					<div class = "grafic">
					<h2>Цена</h2>
						<?php 
							echo apply_filters( 'the_content', htmlspecialchars_decode(get_post_meta($post->ID, "html_Price", true)));
						?>
					</div>
					
					<div class = "grafic">
						<h2>График заездов</h2>
						<?php 
							echo apply_filters( 'the_content', htmlspecialchars_decode(get_post_meta($post->ID, "Grafik_Zaezdov", true)));
						?>
					</div>
					
				</div>
				
					
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
						<div class = "rightStlb">
							<div class = "baseDescr">
								<?php the_content();?>
							</div>
					<?php endwhile;?>
					<?php endif; ?>
					
					<div class = "vprice">
						<h2>В цену входит</h2>
						<?php 
							echo apply_filters( 'the_content', htmlspecialchars_decode(get_post_meta($post->ID, "html_V_Price", true)));
						?>
					</div>
				</div>
			</div>
			
			
			<div class = "otelInfoWriperBottom">
				
			</div>
			
		</div>
	</div>
	
	
<?php get_footer(); ?>