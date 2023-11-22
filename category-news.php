
<?php get_header(); ?>
<script>
	$(document).ready(function() { 
			
	});
			
</script>

	<div class = "line banerLine banerLineInPage">
		<div class = "allB">
			<div style = "display:block; background: url(<?php bloginfo('template_url');?>/images/b/news.jpg" class = "b">
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
			<h1>Новости</h1>
						
			<div class = "excursTourBlk">
				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
						<div class = 'turInCatBlk'>						
							<a  href = "<?php echo get_the_permalink(); ?>">
								<div class = 'turThumb'>
									<?php echo get_the_post_thumbnail( $post->ID, "turImg", array("alt" => $post->post_title, "title" => $post->post_title)); ?>
								</div>
							</a>
							
							<div class = 'text'>
								<a href = "<?php echo get_the_permalink(); ?>">
									<h2><?php the_title(); ?></h2>
								</a>
								
								<div class = 'ex'>
									<?php the_excerpt(); ?>
								</div>
								<a class = "turnavi"  href = "<?php echo get_the_permalink(); ?>">Подробнее</a>'
							</div>
						
						</div>
				<?php endwhile;?>
				<?php endif; ?>
			</div>
			
			<div class = "pageNavi">
				<?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
			</div>
			
		</div>
		
		
		
	</div>
	
	
<?php get_footer(); ?>