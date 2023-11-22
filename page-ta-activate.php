<?php
/*
Template Name: Вход для турагентств - активация пользователя
*/			
?>

<?php get_header(); ?>

<script>
	jQuery(document).ready(function($) { 
		$(".phoneFeeld").mask("+9 (999) 999-9999");
	});
</script>	

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
	
			<div class = "content ">
				
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title();?></h1>
				
					<?php the_content();?>
					
					<?php

					
						if(isset($_REQUEST['mail'])) 
						{
							global $wpdb;
							$r = $wpdb->update("mt_br_user", array("moderate" => 1), array("mail" => $_REQUEST['mail']));	
							if ($r){ 
								$errors = "<div class = 'errMsg okMsg'>Активация пользователя прошла успешно.</div>";
							}
							else {
								$errors = "<div class = 'errMsg'>При активации произошла ошибка.</div>";
							}  
						}
							
					?>
					
					<div class = "errMssages">
						<?php echo $errors; ?>
					</div>

			<?php endwhile;?>
			<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>