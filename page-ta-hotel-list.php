<?php
/*
Template Name: Вход для турагентств - администратор - Бронь отелей
*/				
get_header(); ?>

<script>
	jQuery(document).ready(function() { 
		jQuery(".clientData").click(function(){
			console.log("22");
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
						<select class="napravlenie" name="napravlenie" onchange="this.form.submit();">
									<option value="" disabled selected>Выберите направление</option>
									<?php 

										global $wpdb;
										$rezQ = $wpdb->get_results("SELECT * FROM `mt_br_napr` ORDER BY `order`", ARRAY_A);
										
										
										for ($i = 0; $i < count($rezQ); $i++) {
											echo "<option ".(($rezQ[$i]["ID"] === $_REQUEST["napravlenie"])?"selected":'')." value = '".$rezQ[$i]["ID"]."'>".$rezQ[$i]["start"]." - ".$rezQ[$i]["end"]."</option>";
											
										}
										
									?>
									<option value = "%">Все направления</option>
						</select>
						
						<select class="start_to_date" name="start_to_date" onchange="this.form.submit();">
									<option value="" disabled selected>Выберите дату выезда</option>
									<?php 
										global $wpdb;
										$turType = !empty($_REQUEST["napravlenie"])?$_REQUEST["napravlenie"]:"%";
										$rezQ = $wpdb->get_results("SELECT * FROM `mt_br_reis`  WHERE `turtype` LIKE '".$turType."' ORDER BY `start_to_date`", ARRAY_A);
										
										
										for ($i = 0; $i < count($rezQ); $i++) {
											echo "<option ".(($rezQ[$i]["ID"] === $_REQUEST["start_to_date"])?"selected":'')." value = '".$rezQ[$i]["ID"]."'>".$rezQ[$i]["start_to_date"]."</option>";
											
										}
									?>
									<option value = "%">Все даты</option>
						</select>


						<a target="_blank" href = "<?php bloginfo("template_url");?>/doc-hotel.php?napravlenie=<?php echo $_REQUEST["napravlenie"];?>&reisid=<?php echo $_REQUEST["start_to_date"];?>&treis=t" class = "ressadkaImport" title = "Сохранить в Excel из Курска" ><i class="fas fa-bus"></i></a>
					</form>
					<div class = "raspisanie adminBronTable">
						
							
							<?php
							
								$orderDir = !empty($_REQUEST["odir"])?$_REQUEST["odir"]:"ASC";
								if ($orderDir === "ASC") $orderDir = "DESC"; else $orderDir = "ASC";
								
								$orderBy = !empty($_REQUEST["order"])?$_REQUEST["order"]:"reisID";
								$directID = !empty($_REQUEST["napravlenie"])?$_REQUEST["napravlenie"]:"%";
								$reisID = !empty($_REQUEST["start_to_date"])?$_REQUEST["start_to_date"]:"%";
								$agent = !empty($_REQUEST["agent"])?$_REQUEST["agent"]:"%";
								$reis = $wpdb->get_results("SELECT `mt_br_mesto`.*, `mt_br_user`.`naim`, `mt_br_user`.`phone` AS `agentPhone`, `mt_br_napr`.`prompunkts` AS `naprPunct`, ".
								" `mt_br_napr`.`start` AS `naprStart`, ".
								" `mt_br_napr`.`end` AS `naprEnd`, ".
								" `mt_br_reis`.`start_to_date` AS `dViezd`, ".
								" `mt_br_reis`.`start_out_date` AS `dViezdOb`, ".
								" `mt_br_reis`.`prib_out_date` AS `dPrib`, ".
								" `mt_br_reis`.`prib_to_date` AS `dPribOb` ".
								" FROM `mt_br_mesto` ".
								"LEFT JOIN `mt_br_user` ON (`mt_br_mesto`.`agentmail` = `mt_br_user`.`mail`) ".
								"LEFT JOIN `mt_br_napr` ON (`mt_br_mesto`.`directID` = `mt_br_napr`.`ID`) ".
								"LEFT JOIN `mt_br_reis` ON (`mt_br_mesto`.`reisID` = `mt_br_reis`.`ID`) ".
								"WHERE `mt_br_mesto`.`directID` like '".$directID ."' AND `mt_br_mesto`.`reisID` like '".$reisID."' AND `mt_br_mesto`.`agentmail` like '".$agent."'  GROUP BY `registrid` ".$orderDir);
							?>
							
							
						
							<?php
								$i = 0;
								foreach($reis as $r) {
										if ($r->hotelName === 'Без размещения') continue;
							?>
								<div id = "admBronBlk<?php echo $r->ID; ?>" class = "admBronBlk admBronBlkHotel" style = "<?php if ($i%2 == 0) echo "background-color:lightgray" ?>" >
									
									<div class = "hotelline hotelline_all">
											<span class = "registrid"><?php echo $r->registrid; ?></span>
											<span class = "registrdata">Забронировано: <?php echo $r->dataBron; ?></span>
											<span class = "agentsnvo">Агент: <?php echo $r->naim; ?></span>
											<span class = "managet">Менеджер: <?php echo $r->managername; ?></span>
									</div>
									
									<?php
										//echo "SELECT * FROM `mt_br_mesto` WHERE `registrid` = '".$r->registrid."'";
										$reisInner = $wpdb->get_results("SELECT * FROM `mt_br_mesto` WHERE `registrid` = '".$r->registrid."'");
										foreach($reisInner as $rIner) {
											if (($rIner->mestoID[0] === 't')&&(count($reisInner)>1)) continue;
									?>
										<div class = "hotelline">
											<span class = "fio"><?php echo $rIner->F." ".$rIner->I." ".$rIner->O; ?></span>
											<span class = "dataR"><?php echo $rIner->dataRod; ?></span>
											<span class = "phone"><?php echo $rIner->phone; ?></span>
											<span class = "punkt"><?php echo $rIner->punkt; ?></span>
											<span class = "hotel"><?php echo $rIner->hotelName; ?></span>
											<span class = "comment"><?php echo $rIner->coment; ?></span>
											
										</div>
									<?php
										
										}
									?>
									

								</div>
								
							<?php
									$i++;
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