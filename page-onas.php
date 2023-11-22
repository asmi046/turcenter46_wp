<?php
/*
Template Name: О нас
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
	
	<div class = "line PageContent singlePage exkursTur">
		<div class = "centerInLine">
			<div class="breadcrumb">
				<?php
				if(function_exists('bcn_display'))
				{
					bcn_display();
				}
				?>
			</div>
	
			<div class = "content contentAlignAll contentAbout">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h1><?php the_title();?></h1>
					<div style = "float:left;">
						<?php the_content();?>
					</div>			
					<?php include("command.php");?>
					<div class = "onas-bottom-text">
					<?php the_excerpt();?>
					</div>
					
					<div class = "onas-bottom-text reitings">
						<!-- banner turreestr.ru -->
							<a href="http://turreestr.ru/ta/1298" title="Рейтинг турфирм и туроператоров" target="_blank"><img src="http://turreestr.ru/img.php?type=1&id=1298" width="88" height="31" alt="Отзывы о турфирмах и туроператорах" /></a>
						<!-- banner turreestr.ru -->
					</div>
				<?php endwhile;?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>