<?php

/*
* Template Name: Бронь ФЛ - Мои брони
*/
get_header('booking');
?>
<section class="booking-title-wrapper" style="background-image: url(<?php echo get_template_directory_uri();?>/images/mir/contact.jpg);">
	<div class="container-booking">
		<h1 class="booking-title"><?php the_title();?></h1>
	</div>
</section>



<?php
	
	$rez = $wpdb->get_results("SELECT * FROM `mt_br_user_fl` WHERE `phone` = '".$_COOKIE["phone"]."'");
	
	if (strcmp($_COOKIE["identity"], md5($rez[0]->name.$rez[0]->phone."mt2020")) != 0)  
	{
		echo "Только для зарегистрированных пользователей!";
	} else {
?>

<?php include ("bron-menu.php");?>

<div class = "phone" style = "display:none;"><?php echo $_COOKIE["phone"]; ?></div>
<div class = "identity" style = "display:none;"><?php echo $_COOKIE["identity"]; ?></div>

<section class = "may-booking-section">
	<div class="container-booking container-new-interface" id = "may-booking-section" >
		
		<?php
			global $wpdb;
			
			$brones = $wpdb->get_results('SELECT * FROM `mt_br_mesto`  WHERE `bronflphone` = "'.$_COOKIE["phone"].'" AND `clientype` = 5 GROUP BY `registrid`');
			
			if (!empty($brones) ) {
			
			foreach ($brones as $bron) {
		?>
			<div class="bus-places bus-places_inpage">
				<div class="selected-places selected-places-bron">
					<div class="selected-places__title">Бронь:  <strong><?php echo $bron->registrid; ?></strong> от <strong><?php echo date("d.m.Y H:i", strtotime($bron->dataBron)); ?></strong> в <strong><?php echo $bron->punkt; ?></strong> Рейс №:<?php echo $bron->reisID;?></div>
					
					<div class="uprPanel">
						<?php if (((int)$bron->fullprice - (int)$bron->predoplata) != 0) { ?>
							<a href = "<?php echo get_the_permalink(3222); ?>/?paybrid=<?php echo $bron->registrid; ?>" data-bronid="<?php echo $bron->registrid; ?>" class="pay-booking-elem">Оплатить</a>
							<div data-bronid="<?php echo $bron->registrid; ?>" class="delete-booking"></div>
						<?php } else { ?>
							<div class = "bronOplahena">Бронь оплачена</div>
						<?php } ?>
						<div data-bronid="<?php echo $bron->registrid; ?>" class="open-booking"></div>
					</div>
					
					
				</div>
				
				<div class = "bron_in_page_info">
					<div class = "bron_in_page_info_mesta">					
						<?php 
							$mesta = $wpdb->get_results('SELECT * FROM `mt_br_mesto`  WHERE `registrid` = "'.$bron->registrid.'" AND `clientype` = 5');
							$mestaText = "";
							foreach ($mesta as $mesto) {
								if ($mesto->mestoID[0] === 't'){	
									$naprCircle = "bus-from"; 
									$naprText = "из Курска"; 
								} else {
									$naprCircle = "bus-to";
									$naprText = "в Курск";
								}
						?>
							<div class = "mesto-in-bron">
								<div class="form-date__date-wrapper">
									<div class="<?php echo $naprCircle; ?> bus-circle"></div>
									<div class="form-date">
										<div class="form-date__city"><?php echo $naprText; ?></div>
										<div class="form-date__date">Место №<?php echo $mesto->mestoNum; $mestaText .= $mesto->mestoNum.', '; ?>  </div>
									</div>	
								</div>
								
								<div class = "pers-info">
									<strong>Ф.И.О.:</strong> <?php echo $mesto->F." ".$mesto->I." ".$mesto->O; ?> </br>
									<strong>Направление:</strong> <?php echo $mesto->direct; ?> <strong>до пункта</strong> <?php echo $bron->punkt; ?> </br>
									<strong>Документ:</strong> <?php echo $mesto->doctype; ?> <strong>№</strong> <?php echo $bron->pasportnum; ?> </br>
									<strong>Телефон:</strong> <?php echo $mesto->phone; ?></br>
									<strong>Место посадки:</strong> <?php echo $mesto->mestoPos; ?></br>
									<strong>Место прибытия:</strong> <?php echo $mesto->mestoPrib; ?></br>
									<strong>Комментарий:</strong> <?php echo $mesto->coment; ?></br>
								</div>
								
							</div>
						<?php
							}
						?>
					</div>
					
					<div class = "bron_in_page_info_hotel">	
						<h2>Проживание</h2>
						<?php
							$hotelinfo = get_hotel_info_r($bron->hotelName);
							/*
							echo "<pre>";
							print_r($hotelinfo);
							echo "</pre>";
							*/
						?>
						<strong>Отель: </strong><?php echo $hotelinfo["hotelName"]?><br/>
						<strong>Номера: </strong><br/>
						<?php 
							foreach ($hotelinfo["hotelnumbers"] as $number)
							{
								echo $number["name"]. " <strong>Количество:</strong> ".$number["count"]."<br/>";
							}
						?>
						
					</div>
					
					<div class = "bron_in_page_info_price">	
						<h2>Проживание</h2>
						
						<strong>Цена:</strong> <?php echo $mesto->fullprice; ?> руб.</br>
						<strong>Предоплата:</strong> <?php echo $mesto->predoplata; ?> руб.</br>
						
					</div>
					
					<div class = "bron_in_page_info_control">	
						<div class = "newButton chengeBron" id = "chengeBron" data-mesta = "<? echo $mestaText; ?>" data-reisid = "<?php echo $bron->reisID." ".$bron->direct;?>" data-bronid = "<?php echo $bron->registrid; ?>" data-reisdata = "<?php echo date("m.d.Y H:i", strtotime($bron->dataBron)); ?>" data-punkt = "<?php echo $bron->punkt; ?>" >Запрос на изменение брони</div>
					</div>
					
					
				</div>
				
			</div>
		<?php
				}
			} else {
			?>
				<h2>Нет актуальной брони</h2>
			<?php
			}
		?>
	</div>
</div>


	<?php } ?>
<?php get_footer();?>