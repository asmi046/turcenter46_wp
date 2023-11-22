	<?php
/*
Template Name: Вход для турагентств - бронь номеров
*/				
 get_header(); ?>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.maskedinput.js"></script>
	<script type="text/javascript">
		
		function changeDoc(elem) {
			if (jQuery(elem).val() == "Паспорт")
				jQuery(elem).siblings(".pasportnum").mask("99 99 999999");
			else
			jQuery(elem).siblings(".pasportnum").unmask();;
		}
		
		jQuery(function($){
			$(".formphone").mask("+9 (999) 999-9999");
			$(".pasportnum").mask("99 99 999999");
		});		

		
		jQuery(document).ready(function() { 
			jQuery("#mestCount").change(function() {
				
				jQuery(".mestogroup").hide();
				
				var count = jQuery(this).val();
				console.log("11"+count);
				switch(count) {
					case "1": 
						jQuery("#mesto1").show();
					break;
					
					case "2": 
						jQuery("#mesto1").show();
						jQuery("#mesto2").show();
					break;
					
					case "3": 
						jQuery("#mesto1").show();
						jQuery("#mesto2").show();
						jQuery("#mesto3").show();
					break;
					
					case "4": 
						jQuery("#mesto1").show();
						jQuery("#mesto2").show();
						jQuery("#mesto3").show();
						jQuery("#mesto4").show();
					break;
				}
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
					<?php
						$hotelID = $_REQUEST["hotel"];
						global $wpdb;
						$hotel = $wpdb->get_results("SELECT * FROM `mt_br_hotel` WHERE `ID` = ".$hotelID);
					?>
					
						
					
				
					<div id = "taColBig" class = "taCol">
						<div class = "hotelInBron">
							<?php echo get_the_post_thumbnail($hotel[0]->information); ?>
							<h2><?php echo get_the_title($hotel[0]->information); ?></h2>
							<div class = "hotelInBronText">
								<span><?php echo get_the_excerpt($hotel[0]->information); ?></span><br />
								<a target = "_blank" href = "<?php echo get_the_permalink($hotel[0]->information);?>"><span class = 'bronirovanie'>Информация об отеле</span></a>
							</div>
						</div>
						<?php
							if (isset($_REQUEST["zayavkaBr"])) {
								$errors = "";
								//okMsg
								if ($_REQUEST["mestCount"] >= 1){
									if (empty($_REQUEST["F1"])) $errors .= "<div class = 'errMsg '>Фамилия для отдыхающего №1 не заполнеа.</div>";
									if (empty($_REQUEST["I1"])) $errors .= "<div class = 'errMsg '>Имя для отдыхающего №1 не заполнеа.</div>";
									if (empty($_REQUEST["O1"])) $errors .= "<div class = 'errMsg '>Отчество для отдыхающего №1 не заполнеа.</div>";
									if (empty($_REQUEST["pasportnum1"])) $errors .= "<div class = 'errMsg '>Номер документа для отдыхающего №1 не заполнеа.</div>";
								}
								
								if ($_REQUEST["mestCount"] >= 2){
									if (empty($_REQUEST["F2"])) $errors .= "<div class = 'errMsg '>Фамилия для отдыхающего №2 не заполнеа.</div>";
									if (empty($_REQUEST["I2"])) $errors .= "<div class = 'errMsg '>Имя для отдыхающего №2 не заполнеа.</div>";
									if (empty($_REQUEST["O2"])) $errors .= "<div class = 'errMsg '>Отчество для отдыхающего №2 не заполнеа.</div>";
									if (empty($_REQUEST["pasportnum2"])) $errors .= "<div class = 'errMsg '>Номер документа для отдыхающего №2 не заполнеа.</div>";
								}
								
								if ($_REQUEST["mestCount"] >= 3){
									if (empty($_REQUEST["F3"])) $errors .= "<div class = 'errMsg '>Фамилия для отдыхающего №3 не заполнеа.</div>";
									if (empty($_REQUEST["I3"])) $errors .= "<div class = 'errMsg '>Имя для отдыхающего №3 не заполнеа.</div>";
									if (empty($_REQUEST["O3"])) $errors .= "<div class = 'errMsg '>Отчество для отдыхающего №3 не заполнеа.</div>";
									if (empty($_REQUEST["pasportnum3"])) $errors .= "<div class = 'errMsg '>Номер документа для отдыхающего №3 не заполнеа.</div>";
								}
								
								if ($_REQUEST["mestCount"] >= 4){
									if (empty($_REQUEST["F4"])) $errors .= "<div class = 'errMsg '>Фамилия для отдыхающего №4 не заполнеа.</div>";
									if (empty($_REQUEST["I4"])) $errors .= "<div class = 'errMsg '>Имя для отдыхающего №4 не заполнеа.</div>";
									if (empty($_REQUEST["O4"])) $errors .= "<div class = 'errMsg '>Отчество для отдыхающего №4 не заполнеа.</div>";
									if (empty($_REQUEST["pasportnum4"])) $errors .= "<div class = 'errMsg '>Номер документа для отдыхающего №4 не заполнеа.</div>";
								}
								
								$otdPers = "";
								
								if ($_REQUEST["mestCount"] >= 1){
									$otdPers .= "<h2>Отдыхающий №1:</h2>".
									"<strong>Ф. И. О.:</strong> ".$_REQUEST["F1"]." ".$_REQUEST["I1"]." ".$_REQUEST["O1"]."<br/>".
									"<strong>Документ:</strong> ".$_REQUEST["doctype1"]." <strong>№:</strong> ".$_REQUEST["pasportnum1"]."<br/>".
									"<strong>Тел:</strong> ".$_REQUEST["phone1"]."<br/>"."<br/>";
								}
								
								if ($_REQUEST["mestCount"] >= 2){
									$otdPers .= "<h2>Отдыхающий №2:</h2>".
									"<strong>Ф. И. О.:</strong> ".$_REQUEST["F2"]." ".$_REQUEST["I2"]." ".$_REQUEST["O2"]."<br/>".
									"<strong>Документ:</strong> ".$_REQUEST["doctype2"]." <strong>№:</strong> ".$_REQUEST["pasportnum2"]."<br/>".
									"<strong>Тел:</strong> ".$_REQUEST["phone2"]."<br/>"."<br/>";
								}
								
								if ($_REQUEST["mestCount"] >= 3){
									$otdPers .= "<h2>Отдыхающий №3:</h2>".
									"<strong>Ф. И. О.:</strong> ".$_REQUEST["F3"]." ".$_REQUEST["I3"]." ".$_REQUEST["O3"]."<br/>".
									"<strong>Документ:</strong> ".$_REQUEST["doctype3"]." <strong>№:</strong> ".$_REQUEST["pasportnum3"]."<br/>".
									"<strong>Тел:</strong> ".$_REQUEST["phone3"]."<br/>"."<br/>";
								}
								
								if ($_REQUEST["mestCount"] >= 4){
									$otdPers .= "<h2>Отдыхающий №4:</h2>".
									"<strong>Ф. И. О.:</strong> ".$_REQUEST["F4"]." ".$_REQUEST["I4"]." ".$_REQUEST["O4"]."<br/>".
									"<strong>Документ:</strong> ".$_REQUEST["doctype4"]." <strong>№:</strong> ".$_REQUEST["pasportnum4"]."<br/>".
									"<strong>Тел:</strong> ".$_REQUEST["phone4"]."<br/>"."<br/>";
								}
								
								if (empty($errors)){
									$message = "<h1>Запрос на размещение в отеле:</h1>".
									"<strong>Запрос от турагентства:</strong> ".$_COOKIE['taRegName']."<br/>".
									"<strong>Отель:</strong> ".get_the_title($hotel[0]->information)."<br/>".
									"<strong>Количество мест:</strong> ".$_REQUEST["mestCount"]."<br/>".
									$otdPers.
									"<strong>Коментарий:</strong> ".$_REQUEST["coment"]."<br/>";
															
									$headers = array(
										'From: Мир Туризма <noreply@mirturizma46.ru>',
										'content-type: text/html'
									);

									$r = wp_mail( array("asmi046@gmail.com","litvinov-pa@yandex.ru", "mirturizma-kursk2@yandex.ru"), "Запрос на размещение в отеле", $message, $headers );
									
									if (!$r)
										$errors .= "<div class = 'errMsg '>Техническая ошибка попробуйье позднее.</div>";
									else  $errors .= "<div class = 'errMsg okMsg'>Заявка успешна сформирована. Ожидайте подтверждения.</div>";
								}
							}
						?>
						
						<div class = "errMssages">
							<?php echo $errors; ?>
						</div>
						
					</div>
					
					<div id = "taCol3" class = "taCol">
					
					<h2 id = "mestoHead">Запрос на проживание</h2>
					<form class="taMestoRezervForm" name="taMestoRezervForm" action="" method="post">
						<select name = "mestCount" id = "mestCount">
							<option value="" disabled=""  <?php if (empty($_REQUEST["mestCount"])) echo "selected" ?> >Выберите колличество мест</option>
							<option <?php if ($_REQUEST["mestCount"] == 1) echo "selected" ?> value = "1">1</option>
							<option <?php if ($_REQUEST["mestCount"] == 2) echo "selected" ?> value = "2">2</option>
							<option <?php if ($_REQUEST["mestCount"] == 3) echo "selected" ?> value = "3">3</option>
							<option <?php if ($_REQUEST["mestCount"] == 4) echo "selected" ?> value = "4">4</option>
						</select>
						
						<div style = "<?php if ($_REQUEST["mestCount"] < 1) echo "display:none;" ?>" id = "mesto1"  class = "mestogroup">
							<h2>Место №1</h2>
							<input id="F1" name="F1" value="<?php echo $_REQUEST["F1"]; ?>" placeholder="Фамилия*" type="text"><br />
							<input id="I1" name="I1" value="<?php echo $_REQUEST["I1"]; ?>" placeholder="Имя*" type="text"><br />
							<input id="O1" name="O1" value="<?php echo $_REQUEST["O1"]; ?>" placeholder="Отчество*" type="text"><br />
							<select class="doctype1" name="doctype1" onchange = "changeDoc(this)" >
								<option value = "Паспорт">Паспорт</option>
								<option value = "Свидетельство о рождении">Свидетельство о рождении</option>
							</select>
							<input class="pasportnum" id="pasportnum1" name="pasportnum1" value="" placeholder="Номер документа*" type="text"><br />
							<input class="formphone" id="phone1" name="phone1" value="" placeholder="Контактный телефон" type="text"><br />
						</div>
						
						<div style = "<?php if ($_REQUEST["mestCount"] < 2) echo "display:none;" ?>" id = "mesto2" class = "mestogroup">
							<h2>Место №2</h2>
							<input id="F2" name="F2" value="<?php echo $_REQUEST["F2"]; ?>" placeholder="Фамилия*" type="text"><br />
							<input id="I2" name="I2" value="<?php echo $_REQUEST["I2"]; ?>" placeholder="Имя*" type="text"><br />
							<input id="O2" name="O2" value="<?php echo $_REQUEST["O2"]; ?>" placeholder="Отчество*" type="text"><br />
							<select class="doctype2" name="doctype2" onchange = "changeDoc(this)" >
								<option value = "Паспорт">Паспорт</option>
								<option value = "Свидетельство о рождении">Свидетельство о рождении</option>
							</select>
							<input class="pasportnum" id="pasportnum2" name="pasportnum2" value="" placeholder="Номер документа*" type="text"><br />
							<input class="formphone" id="phone2" name="phone2" value="" placeholder="Контактный телефон" type="text"><br />
						</div>
						
						<div style = "<?php if ($_REQUEST["mestCount"] < 3) echo "display:none;" ?>" id = "mesto3"  class = "mestogroup">
							<h2>Место №3</h2>
							<input id="F3" name="F3" value="<?php echo $_REQUEST["F3"]; ?>" placeholder="Фамилия*" type="text"><br />
							<input id="I3" name="I3" value="<?php echo $_REQUEST["I3"]; ?>" placeholder="Имя*" type="text"><br />
							<input id="O3" name="O3" value="<?php echo $_REQUEST["O3"]; ?>" placeholder="Отчество*" type="text"><br />
							<select class="doctype3" name="doctype3" onchange = "changeDoc(this)" >
								<option value = "Паспорт">Паспорт</option>
								<option value = "Свидетельство о рождении">Свидетельство о рождении</option>
							</select>
							<input class="pasportnum" id="pasportnum3" name="pasportnum3" value="" placeholder="Номер документа*" type="text"><br />
							<input class="formphone" id="phone3" name="phone3" value="" placeholder="Контактный телефон" type="text"><br />
						</div>
						
						<div style = "<?php if ($_REQUEST["mestCount"] < 4) echo "display:none;" ?>" id = "mesto4"  class = "mestogroup">
							<h2>Место №4</h2>
							<input id="F4" name="F4" value="<?php echo $_REQUEST["F4"]; ?>" placeholder="Фамилия*" type="text"><br />
							<input id="I4" name="I4" value="<?php echo $_REQUEST["I4"]; ?>" placeholder="Имя*" type="text"><br />
							<input id="O4" name="O4" value="<?php echo $_REQUEST["F4"]; ?>" placeholder="Отчество*" type="text"><br />
							<select class="doctype4" name="doctype4" onchange = "changeDoc(this)" >
								<option value = "Паспорт">Паспорт</option>
								<option value = "Свидетельство о рождении">Свидетельство о рождении</option>
							</select>
							<input class="pasportnum" id="pasportnum4" name="pasportnum4" value="" placeholder="Номер документа*" type="text"><br />
							<input class="formphone" id="phone4" name="phone4" value="" placeholder="Контактный телефон" type="text"><br />
						</div>
						
						<textarea id="coment" name="coment" placeholder = "Комментарий к запросу" ></textarea>
						<i class="fa fas fa-spinner fa-pulse fa-3x fa-fw"></i>
						<input style = "height: 30px;" type = "submit" class = "btn" name = "zayavkaBr" value = "Заказать"> 
					</form>
				
					</div>
				<?php endif;?>
			<?php endwhile;?>
			<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>