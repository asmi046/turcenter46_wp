<?php
/*
Template Name: Вход для турагентств - администратор - просмотр брони
*/				
get_header(); ?>

<script>
	jQuery(document).ready(function() { 
		jQuery(".clientData").click(function(){
			
			jQuery('#admBronBlkForm'+jQuery(this).data("fildid")).toggle();
			
			jQuery('.admBronBlk').css("background-color","lightgray");
			jQuery('.admBronBlk[data-bronid = "'+jQuery(this).data("bronid")+'"]').css("background-color","#f7941d");
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
			
			<?php 
				
				function dellMesto($reisID, $mestoID, $agentmail) {
    global $wpdb;
	
	$rowM = $wpdb->get_row('SELECT `mt_br_mesto`.*,`mt_br_user`.`naim` ,`mt_br_reis`.`start_to_date` FROM `mt_br_mesto` LEFT JOIN `mt_br_user` ON `mt_br_user`.`mail` = `mt_br_mesto`.`agentmail` LEFT JOIN `mt_br_reis` ON `mt_br_reis`.`ID` = `mt_br_mesto`.`reisID` WHERE `reisID` = '.$reisID.' AND `mestoID` = "'.$mestoID.'" AND `agentmail` = "'.$agentmail.'"');
	$infoM = 
		"Клиент: ".$rowM->F." ".$rowM->I." ".$rowM->O."<br/>".
		"Документ: ".$rowM->doctype."<br/>".
		"Номер документа: ".$rowM->pasportnum."<br/>".
		"Телефон: ".$rowM->phone."<br/>".
		"Место прибывания: ".$rowM->punkt."<br/>".
		"Место отправления: ".$rowM->mestoPos."<br/>".
		"Место прибытия: ".$rowM->mestoPrib."<br/>".
		"Коментарий: ".$rowM->coment."<br/>".
		"ID места: ".$rowM->mestoID."<br/>";
	

	$wpdb->insert("mt_br_log",
	array(
		"type" => "Удаление места",
		"agentname" =>  $rowM->naim,
		"agentmail" => $rowM->agentmail,
		"reis" => $rowM->reisID,
		"mesto" => $rowM->mestoNum,
		"reisdata" => $rowM->start_to_date,
		"direct" => $rowM->direct,
		"mestoID" => $rowM->ID,
		"info" => $infoM
	),
	array("%s", "%s", "%s", "%d", "%d", "%s", "%s", "%s", "%s")
	);

	
	
	$flg = $wpdb->delete("mt_br_mesto", 
		array(
			"reisID" => $reisID,
			"mestoID" => $mestoID,
			"agentmail" => $agentmail
			),
		array('%d', '%s', '%s')
	);
	
	echo $flg?"Запись удалена|1|".$rezervid:"Запись не удалена попробуйте еще раз|0|";

}
				
				
				global $wpdb;
				if (isset($_REQUEST["admUpdElem"])) {
					$insertarr = array(
					"F" => $_REQUEST["F"], 
					"I" => $_REQUEST["I"], 
					"O" => $_REQUEST["O"], 
					"dataRod" => $_REQUEST["dataRod"], 
					"pasportnum" => $_REQUEST["pasportnum"], 
					"phone" => $_REQUEST["phone"], 
					"punkt" => $_REQUEST["punkt"], 
					"coment" => $_REQUEST["coment"], 
					"doctype" => $_REQUEST["doctype"],
					"mestoPos" => $_REQUEST["mestoPos"],
					);
					
					if (!empty($_REQUEST["razmesheniehotel"]))
						$insertarr["hotelName"] = $_REQUEST["razmesheniehotel"];
					
					$flg = $wpdb->update("mt_br_mesto",
					$insertarr,
					array("ID" => $_REQUEST["mainID"]),
					array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'),
					array('%d')
					);
				}
				
				if (isset($_REQUEST["admDelElem"])) {
						/*
						global $wpdb;
						
							
						
						$flg = $wpdb->delete("mt_br_mesto", 
							array("ID" => $_REQUEST["mainID"]),
							array('%d')
						);
						*/
						dellMesto($_REQUEST["reisID"], $_REQUEST["mestoID"], $_REQUEST["agentmail"]);
				}
				
				if (isset($_REQUEST["admUpdPred"])) {
					$flg = $wpdb->update("mt_br_mesto",
						array("fullprice" => $_REQUEST["fullPrice"], "predoplata" => $_REQUEST["insPrice"]),
						array("registrid" => $_REQUEST["registrid"]),
						array('%f', '%f'),
						array('%s')
					);
						
				}
				

				// $fileVgr = "doc-to-reis.php";
				// $fileVgr2 = "doc-to-reis2.php";

				// $reisInfo

				// // if (($_REQUEST["napravlenie"] == 5)||($_REQUEST["napravlenie"] == 1)) {
				// if (($_REQUEST["napravlenie"] == 1 && $reisinfo[0]->bus_type === "bus18") || ($_REQUEST["napravlenie"] == 3)) {
				// 	$fileVgr = "doc-to-reis-18.php";
				// 	$fileVgr2 = "doc-to-reis2-18.php";
				// }
			?>
			
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
									<option value = "">Все направления</option>
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
									<option value = "">Все даты</option>
						</select>
						
						<select  style = "width:200px;     margin-right: 5px;" class="agent" name="agent" onchange="this.form.submit();">
									<option value="" disabled selected>Выберите агента</option>
									<?php 
										
										$rezQ = $wpdb->get_results("SELECT * FROM `mt_br_user`", ARRAY_A);
										
										
										for ($i = 0; $i < count($rezQ); $i++) {
											echo "<option ".(($rezQ[$i]["mail"] === $_REQUEST["agent"])?"selected":'')." value = '".$rezQ[$i]["mail"]."'>".$rezQ[$i]["naim"]."</option>";
											
										}
									?>
									<option value = "">Все агенты</option>
						</select>
						
						<?php if (!empty($_REQUEST["napravlenie"]) && !empty($_REQUEST["start_to_date"])): ?>
							<select  class="reisnumber" name="reisnumber" onchange="this.form.submit();">
								<?php
									$reisinfo = $wpdb->get_results("SELECT * FROM `mt_br_reis`  WHERE `ID` = ".$_REQUEST["start_to_date"]);
									$reisinfoObr = $wpdb->get_results("SELECT * FROM `mt_br_reis`  WHERE `start_out_date` = '".$reisinfo[0]->prib_to_date."'");
								$ii = 1;	
								foreach ($reisinfoObr as $r1) {
										echo "<option ".(($r1->ID === $_REQUEST["reisnumber"])?"selected":'')." value = '".$r1->ID."'>Рейс №".$ii."</option>";
									$ii++;	
								}
								?>
							</select>

							<?
							
								$fileVgr = "doc-to-reis.php";
								$fileVgr2 = "doc-to-reis2.php";

								if (($_REQUEST["napravlenie"] == 1 && $reisinfo[0]->bus_type === "bus18") || ($_REQUEST["napravlenie"] == 3)) {
									$fileVgr = "doc-to-reis-18.php";
									$fileVgr2 = "doc-to-reis2-18.php";
								}
							
							?>
							
							<a target="_blank" href = "<?php bloginfo("template_url");?>/<? echo $fileVgr; ?>?napravlenie=<?php echo $_REQUEST["napravlenie"];?>&reisid=<?php echo $_REQUEST["start_to_date"];?>&treis=t" class = "ressadkaImport" title = "Сохранить в Excel из Курска" ><i class="upr_button fa-bus-g1"></i></a>
							<?php if ($ii > 2) {?>
								<a target="_blank" href = "<?php bloginfo("template_url");?>/<? echo $fileVgr2; ?>?napravlenie=<?php echo $_REQUEST["napravlenie"];?>&reisid=<?php echo $_REQUEST["start_to_date"];?>&treis=o&orid=<?php echo $_REQUEST["reisnumber"];?>" class = "ressadkaImport ressadkaImportObr" title = "Сохранить в Excel в Курск" ><i class="upr_button fa-bus-r"></i></a>
							<?php } else {?>
								<a target="_blank" href = "<?php bloginfo("template_url");?>/<? echo $fileVgr2; ?>?napravlenie=<?php echo $_REQUEST["napravlenie"];?>&reisid=<?php echo $_REQUEST["start_to_date"];?>&treis=o" class = "ressadkaImport ressadkaImportObr" title = "Сохранить в Excel в Курск" ><i class="upr_button fa-bus-r"></i></a>
							<?php }?>
						<?php endif; ?>
						<a target="_blank" href = "<?php bloginfo("template_url");?>/<? echo $fileVgr; ?>?napravlenie=<?php echo $_REQUEST["napravlenie"];?>&reisid=<?php echo $_REQUEST["start_to_date"];?>&treis=o" class = "ressadkaImport" title = "Сохранить в Excel в Курск (Крайний)" ><i class="upr_button fa-bus"></i></a>
						<a target="_blank" href = "<?php bloginfo("template_url");?>/reportadm.php?napravlenie=<?php echo $_REQUEST["napravlenie"];?>&start_to_date=<?php echo $_REQUEST["start_to_date"];?>&agent=<?php echo $_REQUEST["agent"];?>&treis=o&orid=" class = "excelImport" title = "Сохранить в Excel" ><i class="upr_button fa-table"></i></a>
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
								"WHERE `mt_br_mesto`.`directID` like '".$directID ."' AND `mt_br_mesto`.`reisID` like '".$reisID."' AND `mt_br_mesto`.`agentmail` like '".$agent."' ORDER BY `".$orderBy."` ".$orderDir);
							?>
							
							<div id = "admBronBlk<?php echo $r->ID; ?>" class = "admBronBlk" data-bronid = "<?php echo $r->registrid; ?>">
									<span class = "reis">Номер рейса</span>
									<span class = "direct">Направление</span>
									<span class = "mestoNum"><?php if ($orderDir === "ASC") echo "&#9650;"; if ($orderDir === "DESC") echo "&#9660;";?><a href = "<?php echo get_the_permalink($wp_query->get_queried_object_id());?>?napravlenie=<?php echo $directID; ?>&start_to_date=<?php echo $reisID; ?>&agent=<?php echo $agent; ?>&order=mestoNum&odir=<?php echo $orderDir;?>">Номер места</a></span>
									<span class = "dBron"><?php if ($orderDir === "ASC") echo "&#9650;"; if ($orderDir === "DESC") echo "&#9660;";?><a href = "<?php echo get_the_permalink($wp_query->get_queried_object_id());?>?napravlenie=<?php echo $directID; ?>&start_to_date=<?php echo $reisID; ?>&agent=<?php echo $agent; ?>&order=dataBron&odir=<?php echo $orderDir;?>">Дата бронирования</a></span>
									<span class = "dViezd"><?php if ($orderDir === "ASC") echo "&#9650;"; if ($orderDir === "DESC") echo "&#9660;";?><a href = "<?php echo get_the_permalink($wp_query->get_queried_object_id());?>?napravlenie=<?php echo $directID; ?>&start_to_date=<?php echo $reisID; ?>&agent=<?php echo $agent; ?>&order=dViezd&odir=<?php echo $orderDir;?>">Дата выезда</a></span>
									<span class = "dPrib">Дата прибытия</span>
									<span class = "agent"><?php if ($orderDir === "ASC") echo "&#9650;"; if ($orderDir === "DESC") echo "&#9660;";?><a href = "<?php echo get_the_permalink($wp_query->get_queried_object_id());?>?napravlenie=<?php echo $directID; ?>&start_to_date=<?php echo $reisID; ?>&agent=<?php echo $agent; ?>&order=naim&odir=<?php echo $orderDir;?>">Агент</a></span>
									<span class = "agentPhone">Телефон Агента</span>
									
									<div class = 'upr'>Управление</div>
							</div>
						
							<?php
								
								foreach($reis as $r) {
							?>
								<div id = "admBronBlk<?php echo $r->ID; ?>" class = "admBronBlk" data-bronid = "<?php echo $r->registrid; ?>">
									<span class = "reis"><?php echo $r->reisID; ?></span>
									<span class = "direct"><?php echo $r->direct; ?></span>
									<span class = "mestoNum"><?php echo $r->mestoNum; ?></span>
									<span class = "dBron"><?php echo date("d.m.Y", strtotime($r->dataBron)); ?></span>
									<?php if ($r->mestoID[0] === 't'): ?>
										<span class = "dViezd"><?php echo date("d.m.Y", strtotime($r->dViezd)); ?></span>
										<span class = "dPrib"><?php echo date("d.m.Y", strtotime($r->dPribOb)); ?></span>
									<?php else: ?>
										<span class = "dViezd"><?php echo date("d.m.Y", strtotime($r->dViezdOb)); ?></span>
										<span class = "dPrib"><?php echo date("d.m.Y", strtotime($r->dPrib)); ?></span>
									<?php endif; ?>
									
									<span class = "agent"><?php echo empty($r->naim)?"":$r->naim; ?></span>
									<span class = "agentPhone"><?php echo empty($r->agentPhone)?"":$r->agentPhone; ?></span>
									
									<div class = 'upr'>
										<!--<i id = "clientData" class='fas fa-id-card clientData' data-fildid = "<?php //echo $r->ID; ?>" title = 'Данные клиента'></i> -->
										<img style = "height:30px;" src = "<?php bloginfo("template_url");?>/images/icon/customer.svg" class = "clientData" data-bronid = "<?php echo $r->registrid; ?>" data-fildid = "<?php echo $r->ID; ?>" title = 'Данные клиента' />
									</div>
								</div>
								
								<div style = "display:none;" id = "admBronBlkForm<?php echo $r->ID; ?>" class = "admBronBlkForm">
									<form class="taMestoRezervForm" name="taMestoRezervForm" action="" method="post">
										<input class = "reisID" name="reisID" value="<?php echo $r->reisID; ?>" type="hidden">
										<input class = "mestoID" name="mestoID" value="<?php echo $r->mestoID; ?>" type="hidden">
										<input class = "agentmail" name="agentmail" value="<?php echo $r->agentmail; ?>" type="hidden">
										<input class = "mestoNum" name="mestoNum" value="<?php echo $r->mestoNum; ?>" type="hidden">
										<input class = "direct" name="direct" value="<?php echo $r->direct; ?>" type="hidden">
										<input class = "mainID" name="mainID" value="<?php echo $r->ID; ?>" type="hidden">
										
										<input class = "registrid" name="registrid" value="<?php echo $r->registrid; ?>" type="hidden">

										<div style = "margin-bottom: 10px;" class = "razmInForm">
											<strong>Размещение: </strong> <span class = "rfHotelName"><?php echo (empty($r->hotelName))?"Без размещения":$r->hotelName;?></span>
											
											<select style = "margin-top:10px;" id = "razmesheniehotel" class="razmesheniehotel" name="razmesheniehotel">
												<option value="" disabled selected>Выберите другой вариант размещения</option>
												<?php
												$hotel = $wpdb->get_results("SELECT * FROM `mt_br_hotel` WHERE `geo` LIKE '".$r->punkt."'");
												foreach($hotel as $h) {
													$titlestr = get_the_title($h->information);
												?>
													<option value='<?php echo $titlestr; ?>'><?php echo $titlestr; ?></option>												
												<?php
													}
												?>
											</select>
											
										</div>
										
										<div style = "margin-bottom: 10px;" class = "razmInForm">
											
												<input value = "<?php echo $r->fullprice; ?>" name = "fullPrice" id = "fullPrice" type = "text" placeholder = "Полная цена брони">
												<input value = "<?php echo $r->predoplata; ?>" name = "insPrice" id = "insPrice" type = "text" placeholder = "Внесено средств">
												
												<input class="btn" type="submit" name="admUpdPred" value="Внести предоплату">
										</div>
										
										<input class="F" name="F" value="<?php echo $r->F; ?>" placeholder="Фамилия" type="text"><br />
										<input class="I" name="I" value="<?php echo $r->I; ?>" placeholder="Имя" type="text"><br />
										<input class="O" name="O" value="<?php echo $r->O; ?>" placeholder="Отчество" type="text"><br />
										<input class="dataRod" name="dataRod" value="<?php echo $r->dataRod; ?>" placeholder="Дата рождения" type="text"><br />
										<select class="doctype" name="doctype" onchange = "changeDoc(this)" >
											<option <?php echo (($r->doctype === "Паспорт")?"selected":''); ?> value = "Паспорт">Паспорт</option>
											<option <?php echo (($r->doctype === "Свидетельство о рождении")?"selected":''); ?> value = "Свидетельство о рождении">Свидетельство о рождении</option>
										</select>
										<input class="pasportnum" name="pasportnum" value="<?php echo $r->pasportnum; ?>" placeholder="Номер документа" type="text"><br />
										<input class="phone1" name="phone" value="<?php echo $r->phone; ?>" placeholder="Контактный телефон" type="text"><br />
										
										<select style = "display:none;" class="punkt" name="punkt">
											<option value="" disabled selected>Выберите пункт прибывания</option>
											<?php
												$puncts = explode(";", $r->naprPunct);
												
												echo "<option ".(($r->naprStart === $r->punkt)?"selected":'')." value = '".$r->naprStart."'>".$r->naprStart."</option>";
												for ($i = 0; $i < count($puncts); $i++) {
													echo "<option ".(($puncts[$i] === $r->punkt)?"selected":'')." value = '".$puncts[$i]."'>".$puncts[$i]."</option>";
												}
												echo "<option ".(($r->naprEnd === $r->punkt)?"selected":'')." value = '".$r->naprEnd."'>".$r->naprEnd."</option>";
											?>
										</select>
										
										<select id = "mestoOtpr" class="mestoOtpr" name="mestoOtpr">
											<?php
												switch ($r->directID) {
													case 1: 
														if ($r->mestoID[0] === 't')
															include("posadkapuncts/punktsNapr1t-otpr.php");
														else include("posadkapuncts/punktsNapr1o-otpr.php");
													break;
													
													case 2: 
														if ($r->mestoID[0] === 't')
															include("posadkapuncts/punktsNapr2t-otpr.php");
														else include("posadkapuncts/punktsNapr2o-otpr.php");
													break;
													
													case 3: 
														if ($r->mestoID[0] === 't')
															include("posadkapuncts/punktsNapr3t-otpr.php");
														else include("posadkapuncts/punktsNapr3o-otpr.php");
													break;
												}
											?>
										</select>
										
										<select id = "mestoPrib" class="mestoPrib" name="mestoPrib">
											<?php
												
												switch ($r->directID) {
													case 1: 
														if ($r->mestoID[0] === 't')
															include("posadkapuncts/punktsNapr1t-prib.php");
														else include("posadkapuncts/punktsNapr1o-prib.php");
													break;
													
													case 2: 
														if ($r->mestoID[0] === 't')
															include("posadkapuncts/punktsNapr2t-prib.php");
														else include("posadkapuncts/punktsNapr2o-prib.php");
													break;
													
													case 3: 
														if ($r->mestoID[0] === 't')
															include("posadkapuncts/punktsNapr3t-prib.php");
														else include("posadkapuncts/punktsNapr3o-prib.php");
													break;
												}
											?>
										</select>
										
										<textarea class="coment" name="coment"><?php echo $r->coment; ?></textarea>
										

										<!--
										<select class = "managerSelect">
											<option selected disabled value = "">Выберите менеджера</option> 
											<option value = "Владимир">Владимир</option> 
											<option value = "Олег">Олег</option>
											<option value = "Аня">Аня</option>
											<option value = "Оксана">Оксана</option>
											<option value = "Наталья">Наталья</option>
											<option value = "Елена Владимировна">Елена Владимировна</option>
											<option value = "Павел Алексеевич">Павел Алексеевич</option>
										</select>
										-->

										<input class = "btn" type = "submit" name = "admUpdElem" value = "Сохранить">
										<input class = "btn" type = "submit" name = "admDelElem" value = "Удалить"><br/>
					
									</form>
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