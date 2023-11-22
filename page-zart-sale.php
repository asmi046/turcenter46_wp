<?php
/*
Template Name: Страница зарубежные туры распродажа
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
						<div id = "z3" class = "zakladka">
							<script type="text/javascript" src="//tourvisor.ru/module/ts_sale_module.js" charset="utf-8"></script>
							<DIV id="ts_sale_result" align=center></DIV>
							<script type="text/javascript">
							 TS_Sale_Module({ columns: "6", rows: "4", stars: "0", rating: "0", city: "1", countries: "" });
							</script>
						</div>
						
						
					</div>
				<?php endwhile;?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<?php include 'review.php';?>
<?php get_footer(); ?>