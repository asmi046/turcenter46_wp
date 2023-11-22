<?php get_header(); ?>
<script>
	$(document).ready(function() { 
			
	});
			
</script>

	<div class = "line banerLine banerLineInPage">
		<div class = "allB">
			<div style = "display:block; background: url(<?php bloginfo('template_url');?>/images/b/ecskurs.jpg" class = "b">
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
	
	<div class = "line PageContent exkursTur">
		<div class = "centerInLine">
				<div class="breadcrumb">
					<?php
					if(function_exists('bcn_display'))
					{
						bcn_display();
					}
					?>
				</div>
			<h1>Майские туры 2021 из Курска</h1>
						
			<div class = "excursTourBlk">
				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php 
						if (get_post_meta( $post->ID, "outLnk", true) === "proezdMore") continue;
						if (get_post_meta( $post->ID, "outLnk", true) === "turiMore") continue;
						if (get_post_meta( $post->ID, "outLnk", true) === "hnn2018") continue;
					?>
					<?php if (get_post_meta( $post->ID, "clicable", true)!== "0"):?>
						<div class = 'turElem'>
							<a href = '<?php echo get_the_permalink($post->ID); ?>'>	
								<?php include ("tour-elem-content.php");?>
							</a>
						</div>
					<?php else: ?>
						<div class = 'turElem'>
							<?php include ("tour-elem-content.php");?>
						</div>
					<?php endif; ?>
					
					
				<?php endwhile;?>
				<?php endif; ?>
			</div>
			
		<div class = "pageNavi">
			<?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
		</div>
			
		</div>
		
		
	</div>
	
	
<?php get_footer(); ?>