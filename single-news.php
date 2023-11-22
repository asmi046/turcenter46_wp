<?php
/*
  WP Post Template: Шаблон новости
 */
?>

<?php get_header("mesto"); ?>

<script>
	
</script>

	<div class = "line banerLine banerLineInPage">
		<div class = "allB">
			<div style = "display:block; background: url(<?php bloginfo('template_url');?>/images/b/news.jpg) repeat scroll center center;" class = "b">
				<div class = "centerInLine">
					
				</div>
			</div>
			
			
			<div class = "firstM">
				1 место</br>
				"Независимый рейтинг 2015г."
			</div>
			
		</div>
	</div>
	
	<div class = "line PageContent singleTourPage singleTourPage">
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
						<?php 
							echo get_the_post_thumbnail( $post->ID, "full", array("alt" => $post->post_title, "title" => $post->post_title, "class" => "newsImg"));
						?>
					<?php the_content();?>
					
				<?php endwhile;?>
				<?php endif; ?>
		</div>
	</div>
	
	
<?php get_footer(); ?>