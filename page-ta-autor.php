<?php

/*
Template Name: Вход для турагентств - авторизация
*/	

	global $wpdb;
	
	if (isset($_REQUEST['taPasRes'])) {
		$rpRez = $wpdb->get_results("SELECT * FROM `mt_br_user` WHERE `mail`='".$_REQUEST["taMailRes"]."' ", ARRAY_A);
		if (!empty($rpRez))
		{
			$message = "<h1>Ваши учетные данные:</h1>".
						"<strong>Логин (e-mail):</strong> ".$rpRez[0]["mail"]."<br/>".
						"<strong>Пароль:</strong> ".$rpRez[0]['pass']."<br/>";
											
			$headers = array(
						'From: Мир Туризма <noreply@mirturizma46.ru>',
						'content-type: text/html'
			);

			$err = (wp_mail( array($rpRez[0]["mail"]), "Восстановление учетных данных", $message, $headers ))? "<div class = 'errMsg okMsg'>Пароль отправлен Вам на e-mail.</div>":"<div class = 'errMsg'>Сервис временно недоступен попробуйте позднее.</div>";
			
		} else 
			$err = "<div class = 'errMsg'>Пользователь с таким e-mail не найден.</div>";
	}
							
	if(isset($_POST['taSub'])) 
	{
		$mail=$_POST['taName'];
		$pasword=$_POST['taPass'];
		
		
		$registred = $wpdb->get_results("SELECT * FROM `mt_br_user` WHERE `mail`='".$mail."' ", ARRAY_A);
		$dostup = -1;
		
		
		if ($registred[0]["pass"] == stripcslashes($pasword))
			$dostup = 0;
		
		if (($dostup == 0)&&($registred[0]["moderate"] != 0))
		{
			$dostup = 1;
			SetCookie('taReg', $registred[0]['mail'], 0, "/", "mirturizma46.ru");
			$regname = $registred[0]['naim'];
			
			if ($registred[0]["moderate"] == 10)
			{
				SetCookie('taRegAdm', $registred[0]['mail'], 0, "/", "mirturizma46.ru");
				$regname = "Администратор";
			}
			
			SetCookie('taRegName', $regname, 0, "/", "mirturizma46.ru");
			
				$wpdb->insert("mt_br_log",
				array(
					"type" => "Вход клиента",
					"agentname" =>  $regname,
					"agentmail" => $registred[0]['mail'],
					"reis" => 0,
					"mesto" => 0,
					"reisdata" => "",
					"direct" => "",
					"mestoID" => "",
					"info" => "Вход клиента: ".$regname." ".$registred[0]['mail']
				),
				array("%s", "%s", "%s", "%d", "%d", "%s", "%s", "%s", "%s")
				);
			
			
			header( 'Refresh: 0; url='.get_permalink());
		}
		
		if ($dostup == 0)
			$err = "<div class = 'errMsg'>Вы ввели неверный логин или пароль</div>";
		
	}				
get_header(); ?>
	<script>
		
		jQuery(document).ready(function() { 
			jQuery(".resPass").click(function(){ 
				jQuery(".resPassForm").toggle("slide");
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
				<?php include 'autor-steps.php';?>
				<?php echo $err; ?>
			
				<?php if (empty($_COOKIE['taReg'])): ?>	
					<?php the_content();?>
					<form class="taAuthForm taAuthFormBr" name="taAuthForm" action="" method="post">
						<input name="taName" value="" placeholder="e-mail" type="text"><br />
						<input name="taPass" value="" placeholder="Пароль" type="password"><br />
						<input id="taSub" name="taSub" value="Вход" type="submit"> <a href = "<?php echo get_the_permalink(1348);?>" class = "btn btnReg">Регистрация</a><br/>
						<span class = "resPass">Забыли пароль?</span>

						<div class = "resPassForm" style = "display:none;">
							<input name="taMailRes" value="" placeholder="Введите Ваш e-mail" type="text"><br />
							<input id="taPasRes" name="taPasRes" value="Напомнить пароль" type="submit">
						</div>
					</form>
				<?php else: ?>
					
					<?php if (isset($_COOKIE['taRegAdm'])): ?>
						<div class = "admPanelWriper">
							<a href = "<?php echo get_the_permalink(1361); ?>"><i class="fas fa-unlock"></i> Панель администратора сервиса</a>
							<a href = "<?php echo get_the_permalink(1386); ?>"><i class="far fa-list-alt"></i> Лог изменений</a>
							<a href = "<?php echo get_the_permalink(1388); ?>"><i class="fas fa-users"></i> Турагентства</a>
							<a href = "<?php echo get_the_permalink(3121); ?>"><i class="fas fa-users"></i> Выборка по отелям</a>
							<a href = "<?php echo get_the_permalink(7216); ?>"><i class="fas fa-users"></i> Заполняемость</a>
							
						</div>
					<?php endif;?>
					
					<div class = "taMenu" >
						<a href = "<?php echo get_the_permalink(793); ?>">
							<div class = "taMenuElem">
								<img src = "<?php bloginfo("template_url")?>/images/icon/icon-proezd.png" />
								<span>Бронирование:<br/></span>
								<span>✓ ПРОЕЗД<br/></span>
								<span>✓ ПРОЕЗД+ОТЕЛЬ<br/></span>
							</div>
						</a>
						
						<a href = "<?php echo get_the_permalink(805); ?>">
							<div class = "taMenuElem">
								<img src = "<?php bloginfo("template_url")?>/images/icon/icon-hotel.png" />
								<span>Бронирование <br/>отеля</span>
							</div>
						</a>
						
						<a href = "<?php echo get_the_permalink(821); ?>">
							<div class = "taMenuElem">
								<img src = "<?php bloginfo("template_url")?>/images/icon/icon-bron.png" />
								<span>Мои <br/>брони</span>
							</div>
						</a>
						
						<a href = "<?php echo get_the_permalink(1354); ?>">
							<div class = "taMenuElem">
								<img src = "<?php bloginfo("template_url")?>/images/icon/icon-persinfo.png" />
								<span>Личный <br/>кабинет</span>
							</div>
						</a>
						
						<a onclick = "relogin(); return false;"; return false;" href = "<?echo get_permalink(); ?>?relogin=1">
							<div class = "taMenuElem">
								<img src = "<?php bloginfo("template_url")?>/images/icon/icon-exit.png" />
								<span>Выход</span>
							</div>
						</a>
					</div>
					
				<?php endif;?>
			<?php endwhile;?>
			<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>