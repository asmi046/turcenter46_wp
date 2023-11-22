<?php
/*
Template Name: Шаблон школьного тура
Template Post Type: post
*/
?>

<?php get_header("mesto"); ?>

<script>
	
</script>

	<div style = "height:<?php echo get_post_meta( $post->ID, "banerSize", true)?>!important;" class = "line banerLine banerLineInPage">
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
	</div>
	
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
						<span class = "info"><i class="far fa-money-bill-alt"></i> <?php  echo get_post_meta(get_the_ID(), "price", true); ?> руб.</span>
						<?php if (!empty(get_post_meta(get_the_ID(), "tur_date", true))):?>
							<span class = "info"><i class="far fa-calendar-alt"></i> <?php  echo get_post_meta(get_the_ID(), "tur_date", true); ?></span>
						<?php endif;?>
					</div>
					<?php the_excerpt();?>
					<?php the_content();?>
					
				<?php endwhile;?>
				<?php endif; ?>
		</div>
	</div>
	
	
<?php get_footer(); ?>