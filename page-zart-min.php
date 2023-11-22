<?php
/*
Template Name: Страница зарубежные туры по минимальной цене
*/				
?>

<?php get_header(); ?>
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
	
	<div class = "line PageContent singlePage">
		<div class = "centerInLine">
			<div class="breadcrumb">
				<?php
				if(function_exists('bcn_display'))
				{
					bcn_display();
				}
				?>
			</div>
			
			<script type="text/javascript">

			</script>
			
			<div class = "content ">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h1><?php the_title();?></h1>
					<?php the_content();?>
					

					
					<div class = "zakladkiBlk">
						
							
						
						<script type="text/javascript" src="//tourvisor.ru/module/init.js"></script>

						<div id = "z2" class = "zakladka">
<div class="tv-search-form tv-moduleid-178484"></div>
<script type="text/javascript" src="//tourvisor.ru/module/init.js"></script>
				
			<div class="tv-min-price tv-moduleid-951079"></div>
						
				</div>

					</div>
				<?php endwhile;?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<?php include 'review.php';?>
<?php get_footer(); ?>