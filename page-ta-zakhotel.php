<?php
/*
Template Name: Вход для турагентств - заказ отеля
*/				
get_header(); ?>
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
				
			
				<?php if (!isset($_COOKIE['taReg'])): ?>	
					<?php the_content();?>
					<h2>Данная страница доступна только зарегистрированным пользователям</h2>
				<?php else: ?>
					<div class = "hotelSelect">
						<form>
							<select name = "geo"  onchange="this.form.submit()">
							<option <?php echo (strcmp($_REQUEST["geo"], $ne->geo) == 0)?"selected":"";?> value = "%">Все</option>
							<?php
								global $wpdb;
								$napr = $wpdb->get_results("SELECT DISTINCT `geo` FROM `mt_br_hotel`");
								
								foreach($napr as $ne) {
									
									?>
									<option <?php echo (strcmp($_REQUEST["geo"], $ne->geo) == 0)?"selected":"";?> value = "<?php echo $ne->geo; ?>"><?php echo $ne->geo;?></option>	
									<?php
								}
							?>
							<select>
						</form>
						
					</div>
					<div class = "raspisanie">
						<?php
							$geo = (empty($_REQUEST["geo"]))?"%":$_REQUEST["geo"];
							$hotel = $wpdb->get_results("SELECT * FROM `mt_br_hotel` WHERE `geo` LIKE '".$geo."' GROUP BY `name`");
						
							foreach($hotel as $h) {
							?>
								
									<div class = "hotelInBron">
										<a href = "<?php echo get_permalink(807)?>?hotel=<?php echo $h->ID;?>">
										<?php echo get_the_post_thumbnail($h->information); ?>
										</a>
										<a href = "<?php echo get_permalink(807)?>?hotel=<?php echo $h->ID;?>">
										<h2><?php echo get_the_title($h->information); ?></h2>
										</a>
										<div class = "hotelInBronText">
											<span><?php echo get_the_excerpt($h->information); ?></span><br />
											<a target = "_blank" href = "<?php echo get_the_permalink($h->information);?>"><span class = 'bronirovanie'>Информация об отеле</span></a>
										</div>
									</div>
								
							<?php
							}
						?>
					</div>
				<?php endif;?>
			<?php endwhile;?>
			<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>