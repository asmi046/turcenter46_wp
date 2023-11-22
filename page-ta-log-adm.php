<?php
/*
Template Name: Вход для турагентств - администратор - лог изменений
*/				
get_header(); ?>

<script>
	jQuery(document).ready(function() { 
		jQuery(".clientData").click(function(){
			jQuery('#admBronBlkForm'+jQuery(this).data("fildid")).toggle();
		});
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
				
			
				<?php if (!isset($_COOKIE['taReg'])): ?>	
					<?php the_content();?>
					<h2>Данная страница доступна только зарегистрированным пользователям</h2>
				<?php else: ?>
					<form id = "selectFormAdmin" method = "get">
						<select style = "width:200px; margin-right:10px;" class="typeizm" name="typeizm" onchange="this.form.submit();">
									<option value="" disabled selected>Выберите тип изменения</option>
									<?php 
										global $wpdb;
										$rezQ = $wpdb->get_results("SELECT `type` FROM `mt_br_log` GROUP BY `type`", ARRAY_A);
										
										
										for ($i = 0; $i < count($rezQ); $i++) {
											echo "<option ".(($rezQ[$i]["type"] === $_REQUEST["typeizm"])?"selected":'')." value = '".$rezQ[$i]["type"]."'>".$rezQ[$i]["type"]."</option>";
										}
									?>
									<option value = "%">Все типы</option>
						</select>
						
			
						
						<select style = "width:200px; margin-right:10px;" class="agent" name="agent" onchange="this.form.submit();">
									<option value="" disabled selected>Выберите агента</option>
									<?php 
										
										$rezQ = $wpdb->get_results("SELECT * FROM `mt_br_user`", ARRAY_A);
										
										
										for ($i = 0; $i < count($rezQ); $i++) {
											echo "<option ".(($rezQ[$i]["naim"] === $_REQUEST["agent"])?"selected":'')." value = '".$rezQ[$i]["mail"]."'>".$rezQ[$i]["naim"]."</option>";
											
										}
									?>
									<option value = "%">Все агенты</option>
						</select>
						
						
					</form>
					<div class = "raspisanie adminBronTable">
						
							<?php
								$orderDir = !empty($_REQUEST["odir"])?$_REQUEST["odir"]:"ASC";
								if ($orderDir === "ASC") $orderDir = "DESC"; else $orderDir = "ASC";
								
								$orderBy = !empty($_REQUEST["order"])?$_REQUEST["order"]:"data";
								
								$typeizm = !empty($_REQUEST["typeizm"])?$_REQUEST["typeizm"]:"%";
								$agent = !empty($_REQUEST["agent"])?$_REQUEST["agent"]:"%";
								
								$reis = $wpdb->get_results("SELECT * FROM `mt_br_log` WHERE `type` LIKE '".$typeizm."' AND `agentmail` LIKE '".$agent."'  ORDER BY `".$orderBy."` ".$orderDir);
							
								
							?>
						
						
							<div id = "admBronBlk<?php echo $r->id; ?>" class = "admBronBlk">
									<span class = "data"><?php if ($orderDir === "ASC") echo "&#9650;"; if ($orderDir === "DESC") echo "&#9660;";?><a href = "<?php echo get_the_permalink($wp_query->get_queried_object_id());?>?typeizm=<?php echo $typeizm; ?>&agent=<?php echo $agent; ?>&order=data&odir=<?php echo $orderDir;?>">Двта изменения</a></span>
									<span class = "type">Тип изменения</span>
									<span class = "agent">Агент</span>
									<span class = "agentm">Email агента</span>
									<span class = "reis"><?php if ($orderDir === "ASC") echo "&#9650;"; if ($orderDir === "DESC") echo "&#9660;";?><a href = "<?php echo get_the_permalink($wp_query->get_queried_object_id());?>?typeizm=<?php echo $typeizm; ?>&agent=<?php echo $agent; ?>&order=reis&odir=<?php echo $orderDir;?>">Номер рейса</a></span>
									<span class = "mestoa"><?php if ($orderDir === "ASC") echo "&#9650;"; if ($orderDir === "DESC") echo "&#9660;";?><a href = "<?php echo get_the_permalink($wp_query->get_queried_object_id());?>?typeizm=<?php echo $typeizm; ?>&agent=<?php echo $agent; ?>&order=mesto&odir=<?php echo $orderDir;?>">Номер места</a></span>
									<span class = "direct">Направление</span>
									<div class = 'upr'></div>
							</div>
								<?php 
								foreach($reis as $r) {
								?>
								<div id = "admBronBlk<?php echo $r->id; ?>" class = "admBronBlk">
									<span class = "data"><?php echo date("d.m.Y G:i", strtotime($r->data)) ?></span>
									<span class = "type"><?php echo $r->type; ?></span>
									<span class = "agent"><?php echo $r->agentname; ?></span>
									<span class = "agentm"><?php echo $r->agentmail; ?></span>
									<span class = "reis"><?php echo $r->reis; ?></span>
									<span class = "mestoa"><?php echo $r->mesto; ?></span>
									<span class = "direct"><?php echo $r->direct; ?></span>
									<div class = 'upr'>
										<!--<i id = "clientData" class='fas fa-id-card clientData' data-fildid = "<?php //echo $r->id; ?>" title = 'Подробности'></i> -->
										<img style = "height:30px;" src = "<?php bloginfo("template_url");?>/images/icon/customer.svg" class = "clientData" data-fildid = "<?php echo $r->id; ?>" title = 'Данные клиента' />
									</div>
								</div>
								
								<div style = "display:none;" id = "admBronBlkForm<?php echo $r->id; ?>" class = "admBronBlkForm">
									<?php
										echo apply_filters('the_content', $r->info);
									?>
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