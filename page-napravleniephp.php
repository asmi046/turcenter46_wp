<?php
/*
Template Name: Автобусные туры - направления
*/
?>

<?php get_header("napravlenie"); ?>
	<div class = "line banerLine banerLineInPage">
		<div class = "allB">
			<div style = "display:block; background: url(<?php bloginfo('template_url');?>/images/b/<?php echo get_post_meta( $post->ID, "banerName", true)?>);" class = "b">
				<div class = "centerInLine">
					<div class = "banerText">
						<h1>
							Автобусные туры: <?php echo $post->post_title;?>
						</h1>
					</div>
					
				</div>
			</div>
			
			
			<div class = "firstM">
				1 место</br>
				"Независимый рейтинг 2015г."
			</div>
			
		</div>
	</div>
	
	<div class = "line PageContent">
		<div class = "centerInLine">
				<div class="breadcrumb">
					<?php
					if(function_exists('bcn_display'))
					{
						bcn_display();
					}
					?>
				</div>
			
			<div class = "aboutRegion">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php the_content();?>
				<?php endwhile;?>
				<?php endif; ?>
			</div>
		
			
			<div class = "tourInputBlk tourInputBlkMr">
				<?php
					$args = array(
						'sort_order'   => 'ASC',
						'sort_column'  => 'post_title',
						'hierarchical' => 0,
						'child_of'     => $post->ID,
						
						'post_type'    => 'page',
						'post_status'  => 'publish',
					); 
					
					$pages = get_pages($args);
					foreach($pages as $post){ 
						
						echo "<div class = 'turInCatBlk'>";						
							echo '<a  href = "'.get_the_permalink($post->ID).'">';
								echo "<div class = 'turThumb'>";
									echo get_the_post_thumbnail( $post->ID, "turImg", array("alt" => $post->post_title, "title" => $post->post_title));
								echo "</div>";
							echo '</a>';
							
							echo "<div class = 'text'>";
								echo '<a href = "'.get_the_permalink($post->ID).'">';
									echo "<h2>".$post->post_title."</h2>";
								echo '</a>';
								
								echo "<div class = 'ex'>";
									echo $post->post_excerpt;
								echo "</div>";
								
								echo '<a class = "turnavi" href = "'.get_the_permalink($post->ID).'">Подробнее</a>';
								
							echo "</div>";
						
						echo "</div>";
					}  
				?>
			</div>
			
		</div>
	</div>
	
	
<?php get_footer(); ?>