<?php
/*
Template Name: Автобусные туры главная
*/
?>

<?php get_header("turs"); ?>
	<div class = "line banerLine banerLineInPage">
		<div class = "allB">
			<div id = "<?php echo get_post_meta( $post->ID, "banerName", true)?>" class = "b">
				<div class = "centerInLine">
					<div class = "banerText">
						<h1>
							<?php echo $post->post_title;?>
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
		
		
			<div class = "tourNavigationBlk">
			
			
			<h2>Регионы</h2>
				<div id = "naprWriper1" class = "naprWriper">
				<?php
					$noInclude = array();
					$args = array(
						'sort_order'   => 'ASC',
						'sort_column'  => 'post_title',
						'hierarchical' => 1,
						'include'      => array(54,52),
						'child_of'     => 0,
						'number'       => 2,
						'post_type'    => 'page',
						'post_status'  => 'publish',
					); 
					$pages = get_pages($args);
					foreach($pages as $post){ 
						$noInclude[] = $post->ID;
						echo '<a class = "turnavi" href = "'.get_the_permalink($post->ID).'">'.$post->post_title.'</a>';
					}  
				?>
				</div>
			<h2>Направления</h2>
				<div class = "naprWriper">
				<?php
					$args = array(
					
						'hierarchical' => 0,
						'meta_key'     => 'pageType',
						'meta_value'   => 'u2',
						
					); 
					$pages = get_pages($args);
					foreach($pages as $post){ 
						$noInclude[] = $post->ID;
						echo '<a class = "turnavi" href = "'.get_the_permalink($post->ID).'">'.$post->post_title.'</a>';
					}  
				?>
				
				</div>
			</div>
			
			<div class = "tourInputBlk">
				<?php
					$args = array(
						'hierarchical' => 0,
						'child_of'     => 48,
					
						'post_type'    => 'page',
						'post_status'  => 'publish',
					); 
					
					$pages = get_pages($args);
					foreach($pages as $post){ 
						if (in_array($post->ID, $noInclude)) continue;
						
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