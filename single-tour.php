<?php
/*
  WP Post Template: Шаблон экскурсионного тура
 */
?>

<?php get_header("booking"); 

$banner = wp_get_attachment_image_src( carbon_get_the_post_meta('otel_banner'), 'full')[0];
if(empty($banner)) {
	$banner = get_template_directory_uri() . '/images/mir/contact.jpg';
}?>

<script>
	
</script>

	<section class="booking-title-wrapper" style="background-image: url(<?php echo $banner?>);">
		<div class="container-booking">
			<h1 class="booking-title"><?php the_title();?></h1>
		</div>
	</section>
	<!-- <div style = "height:<?php echo get_post_meta( $post->ID, "banerSize", true)?>!important;" class = "line banerLine banerLineInPage">
		<div class = "allB">
			<div style = "height:<?php echo get_post_meta( $post->ID, "banerSize", true)?>!important; display:block; background: url(<?php bloginfo('template_url');?>/images/b/<?php echo get_post_meta( $post->ID, "banerName", true)?>) repeat scroll center center; background-size: cover;" class = "b">
				<div class = "centerInLine">
					
				</div>
			</div>
			
			
			<div class = "firstM">
				1 место</br>
				"Независимый рейтинг 2015г."
			</div>
			
		</div>
	</div> -->
	
	<div class = "line PageContent singleTourPage singleTourPage <?php echo get_post_meta( $post->ID, "bacground", true)?>">
		<div class = "centerInLine">
				<div class="breadcrumb">
					<?php
					if(function_exists('bcn_display'))
					{
						bcn_display();
					}
					?>
				</div>
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h1><?php the_title();?></h1>
					
					<div class = "tourInfoInPage">
						<span class = "info"><i class="fas fa-map-marker"></i> <?php  echo get_post_meta(get_the_ID(), "where", true); ?></span>
						<span class = "info"><i class="far fa-clock"></i> <?php  echo get_post_meta(get_the_ID(), "day_count", true); ?></span>
						<span class = "info"><i class="far fa-money-bill-alt"></i> <?php  
							
							if (empty(get_post_meta(get_the_ID(), "new_price", true)))
							
								echo get_post_meta(get_the_ID(), "price", true);
							else 
							{
								echo "<span class = 'oldPriceInPage'>".get_post_meta(get_the_ID(), "price", true)."</span>";
								echo get_post_meta(get_the_ID(), "new_price", true);
							
							}
							?> руб.</span>
						<?php if (!empty(get_post_meta(get_the_ID(), "tur_date", true))):?>
							<span class = "info"><i class="far fa-calendar-alt"></i> <?php  echo get_post_meta(get_the_ID(), "tur_date", true); ?></span>
						<?php endif;?>
					</div>
					
					<div class = "panelInstrument">
								<div onclick = "window.print()" class = "bluebtn printRn">Отправить на печать</div>
								<div onclick = " yaCounter29416892.reachGoal('openAutobTur'); jQuery('#zayavTurMoreModal').arcticmodal(); jQuery('#zayavTurMoreModal .tkName').html('<?php echo htmlspecialchars ($post->post_title); ?>'); jQuery('.formImg').attr('src', '<?php bloginfo("template_url")?>/images/turPoezd.jpg');" class = "bluebtn zaprosNaTurMore">Отправить запрос</div>
								
								
							</div>
					
					<?php the_excerpt();?>
					<?php the_content();?>

					<? get_template_part("template-parts/excurs-help-banner")?>
					
				<?php endwhile;?>
				<?php endif; ?>
		</div>
	</div>
	
	
<?php get_footer(); ?>