<?php
/*
  WP Post Template: Автобусные туры - место
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
		jQuery(".lightbox .img").html(jQuery("#imgblk"+imgIndex).html()+"<span class = 'lbTitle'>"+jQuery("#imgblk"+imgIndex+" img").attr("title")+"</span>");
		jQuery(".galery .bigImg .imgWiev").html(jQuery("#imgblk"+imgIndex).html());
		sizingImg();
	}
	
	function previmgLb() {
		imgIndex--;
		if (imgIndex<0)
			imgIndex = jQuery(".prevyGalery img").length-1;
		jQuery(".lightbox .img").html(jQuery("#imgblk"+imgIndex).html()+"<span class = 'lbTitle'>"+jQuery("#imgblk"+imgIndex+" img").attr("title")+"</span>");
		jQuery(".galery .bigImg .imgWiev").html(jQuery("#imgblk"+imgIndex).html());
		sizingImg();
	}
	
	function sizingImg () {
		var wHeight = jQuery(".lightbox .img").height();
		var iHeight = jQuery(".lightbox .img img").height();
		
		if (iHeight > wHeight ) {
			jQuery(".lightbox .img img").css("max-height", (wHeight-100)+"px");
			jQuery(".lightbox .img img").css("width", "auto");
		}
		
		wHeight = jQuery(".lightbox .img").height();
		iHeight = jQuery(".lightbox .img img").height();
		
		var mTop = (wHeight - iHeight)/2;
		
		jQuery(".lightbox .img img").css("margin-top", mTop+"px");
	}
	
	jQuery(window).resize(function(){
		sizingImg();
	});
	

	jQuery(document).ready(function(event) { 
			jQuery(".prevyGalery .lent").css ("width", jQuery(".prevyGalery img").length*110);
			jQuery(".imgWraper").click(function(){ 
				
				jQuery(".galery .bigImg .imgWiev").html(jQuery(this).html());
				imgIndex = jQuery(this).data("index");
			});
			jQuery(".bigImg .imgWiev").click(function(){ 
				jQuery(".lightbox").show();
				jQuery("body").addClass("fsMode");
				jQuery(".lightbox .img").html(jQuery(this).html()+"<span class = 'lbTitle'>"+jQuery("#imgblk"+imgIndex+" img").attr("title")+"</span>");
				jQuery('.osnNaprFixed').hide();
				sizingImg();
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
			
			

		jQuery('html').keydown(function(eventObject){ //отлавливаем нажатие клавиш
			  if (eventObject.keyCode == 37) { 
					previmgLb();
			  }
			  
			  if (eventObject.keyCode == 39) { 
					neximgLb();
			  }
			  
			  if (eventObject.keyCode == 27) { 
					jQuery(".lightbox").hide();
					jQuery("body").removeClass("fsMode");
			  }
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
							<p>
								<?php
									$cats = get_the_category($post->ID);
									$catsName = $cats[count($cats)-1]->name;
									$curortName = get_post_meta( $post->ID, "curortName", true);
									
									if (!empty($curortName))
										$catsName =  $curortName;
									
									echo "Автобусные туры в ".$catsName;
									//echo get_pages( array("include" => get_ancestors( $post->ID, 'page' )[0] ) )[0]->post_title;
								?>
							</p>
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
								$files = scandir($_SERVER['DOCUMENT_ROOT']."/galery/".get_post_meta($post->ID, "galeryFolder",true), SCANDIR_SORT_DESCENDING);
								$count = 0;
								
								$sortedFiles = array();
								
								foreach($files as $file)
								{
									if ($file == '.' || $file == '..') continue;
									if (is_dir($fullfilename))  continue;
									
									$fileIndex = substr($file, 0, strpos($file,"_"));
									$sortedFiles[$fileIndex] = $file;  
								}
								
								
								//foreach($files as $file)
								for ($i = 1; $i<=count($sortedFiles); $i++)
								{
									if ($sortedFiles[$i] == '.' || $sortedFiles[$i] == '..') continue;
									if (is_dir($fullfilename))  continue;
									$imgSize = getimagesize($_SERVER['DOCUMENT_ROOT']."/galery/".get_post_meta($post->ID, "galeryFolder",true)."/".$sortedFiles[$i]);
									
									$imgName = ""; 
									$imgDerection = "horDir";
									
									$titleImg = str_replace(".jpg", "", str_replace(array("_","-")," ",$sortedFiles[$i]));
									
									$style = 'style = "max-width: '.$imgSize[0].'px"';
									
									if ($imgSize[0]<$imgSize[1]) {
										$imgName = " vertDirection";
										$imgDerection = "verDir";
									}
									
									$inputString .= "<div data-index = '".$count."' id = 'imgblk".$count."'  class = 'imgWraper ".$imgName."'>";
										$inputString .= "<img rel='lightbox' alt = '".$titleImg."' title = '".$titleImg."' ".$style." class = '".$imgDerection."' src = '".get_bloginfo("url")."/galery/".get_post_meta($post->ID, "galeryFolder",true)."/".$sortedFiles[$i]."' />";
									$inputString .= "</div>";
									
									if ($count == 0)
											$firstImg = "<img alt = '".$titleImg."' title = '".$titleImg."' ".$style." class = '".$imgDerection."' src = '".get_bloginfo("url")."/galery/".get_post_meta($post->ID, "galeryFolder",true)."/".$sortedFiles[$i]."' /> <span class = 'lbTitle'>".$titleImg."</span>";
									
									$count++;
								}
						?>
						<div class = "bigImg">
							<div class = "btnStr prevBtn">
								<i class="fas fa-chevron-left"></i>&nbsp;
							</div>
							<div class = "imgWiev">
								<?php echo $firstImg; ?>
							</div>
							<div class = "btnStr nextBtn">
								<i class="fas fa-chevron-right"></i>&nbsp;
							</div>
						</div>
						<div class = "prevyGalery">
							<div class = "btnStr prevBtn">
								<i class="fas fa-chevron-left"></i>&nbsp;
							</div>
							
							<div class = "lent">
								<?php echo $inputString; ?>
							</div>
							
							<div class = "btnStr nextBtn">
								<i class="fas fa-chevron-right"></i>&nbsp;
							</div>
						</div>
					</div>
					
					<div class = "grafic">
					<h2>Цена</h2>
						<div class = "tableWraper">
							<?php 
								echo apply_filters( 'the_content', htmlspecialchars_decode(get_post_meta($post->ID, "html_Price", true)));
							?>
						</div>
					</div>
					<?php if(!wp_is_mobile()):?>
					<div class = "grafic">
						<h2>График заездов</h2>
						<?php 
							echo apply_filters( 'the_content', htmlspecialchars_decode(get_post_meta($post->ID, "Grafik_Zaezdov", true)));
						?>
					</div>
					<?php endif;?>
				</div>
				
					
					
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						
						<div class = "rightStlb">
							<div class = "panelInstrument">
								<div onclick = "window.print()" class = "bluebtn printRn">Отправить на печать</div>
								
								<?php if (isset($_COOKIE['taReg'])){ ?>
									
									<?php 
										$lnkparam = get_post_meta($post->ID, "lnkparam", true);	
										$lnkparamnapr = get_post_meta($post->ID, "lnkparamnapr", true);

										$dopstr = "";	
										if (!empty($lnkparam)) $dopstr = "?napr=".$lnkparamnapr."&punct=".$lnkparam."#step2" 
									?>
											<a class = "bluebtn toLkBtn" href = "<?php echo get_the_permalink(793).$dopstr;?>">Заказать в личном кабинете</a>
										
								<?php } else {?>
									<div onclick = " yaCounter29416892.reachGoal('openAutobTur'); jQuery('#zayavTurMoreModal').arcticmodal(); jQuery('#zayavTurMoreModal .tkName').html('<?php echo htmlspecialchars ($post->post_title); ?>');" class = "bluebtn zaprosNaTurMore">Отправить запрос</div>
								
								<?php } ?>
								
							</div>
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

					<?php if(wp_is_mobile()):?>
					<div class = "grafic">
						<h2>График заездов</h2>
						<?php 
							echo apply_filters( 'the_content', htmlspecialchars_decode(get_post_meta($post->ID, "Grafik_Zaezdov", true)));
						?>
					</div>
					<?php endif;?>
				</div>
			</div>
			
			
			<div class = "otelInfoWriperBottom">
				
			</div>
			
		</div>
	</div>
	
	
<?php get_footer(); ?>