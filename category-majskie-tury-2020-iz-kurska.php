
<?php get_header(); ?>
<script>
	$(document).ready(function() { 
			
	});
			
</script>

	<div class = "line banerLine banerLineInPage">
		<div class = "allB">
			<div style = "display:block; background: url(<?php bloginfo('template_url');?>/images/b/otkritie-fontanov.jpg); background-position:center center; background-size:cover;" class = "b">
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
				
			<?php if ( have_posts() ) : ?>
			<h1><?php echo get_queried_object()->name;?></h1>
			<div class = "excursTourBlk">
				<?php while ( have_posts() ) : the_post(); ?>
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
			</div>
			<?php endif; ?>
			
		<div class = "pageNavi">
			<?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
		</div>
		
		<div class = "aboutCategory aboutCategory-42">
				<?php echo term_description();?>
		</div>
			
		</div>
		
		
		
		
	</div>
	
	
<?php get_footer(); ?>