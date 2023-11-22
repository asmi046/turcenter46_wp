<?php
/*
Template Name: Вход для турагентств - информация об операторе
*/

	if(isset($_POST['taSub'])) 
	{
		$mail=$_POST['taName'];
		$pasword=$_POST['taPass'];
		
		global $wpdb;
		$registred = $wpdb->get_results("SELECT * FROM `mt_br_user` WHERE `mail`='".$mail."' ", ARRAY_A);
		$dostup = -1;
		
		
		if ($registred[0]["pass"] == stripcslashes($pasword))
			$dostup = 0;
		
		if (($dostup == 0)&&($registred[0]["moderate"] != 0))
		{
			$dostup = 1;
			SetCookie('taReg', $registred[0]['mail'], 0, "/", "turcentr46.ru");
			header( 'Refresh: 0; url='.get_permalink());
		}
		
		if ($dostup == 0)
			echo "<div class = 'errMsg'>Вы ввели неверный логин или пароль</div>";
		
	}				
get_header(); ?>

<script>
	jQuery(document).ready(function() { 
		jQuery(".phoneFeeld").mask("+9 (999) 999-9999");
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
						global $wpdb;
						$addRez = true;
						$errors = "";
							
						if(isset($_POST['taSave'])) {
							
							if (strlen($_POST['taPhone'])<17) {
									$errors = "<div class = 'errMsg'>Телефон введен не корректно</div>";
									$addRez = false;
							} 
							else 
							{
								$wpdb->update("mt_br_user",
								array(
									"naim" => $_POST['taOrg'],
									"person" => $_POST['taContactFace'],
									"phone" => $_POST['taPhone'],
								),
								array("mail" => $_COOKIE['taReg'])
								);
								$errors = "<div class = 'errMsg okMsg'>Данные успешно изменены.</div>";
							}
						}
					
						if(isset($_POST['taSavePass'])) {
							if (strcmp($_POST['taPass'],$_POST['taPass2']) == 0)
							{
								$wpdb->update("mt_br_user",
											array("pass" => $_POST['taPass2']),
											array("mail" => $_COOKIE['taReg'])
								);
								$errors = "<div class = 'errMsg okMsg'>Пароль успешно изменен.</div>";
							}	else {
								$errors = "<div class = 'errMsg'>Введенные пароли не совпадают</div>";
								$addRez = false;
							}
							
						}
						
						$tainfo = $wpdb->get_results("SELECT * FROM `mt_br_user` where `mail` = '".$_COOKIE['taReg']."'");
					?>
					
					<div class = "errMssages">
						<?php echo $errors; ?>
					</div>
					
					<form class="taAuthForm taAuthFormReg" name="taAuthFormreg" action="" method="post">
						<input name="taOrg" value="<?php echo $tainfo[0]->naim; ?>" placeholder="Организация" type="text"><br />
						<input name="taContactFace" value="<?php echo $tainfo[0]->person; ?>" placeholder="Контактное лицо" type="text"><br />
						<input name="taMail" disabled value="<?php echo $tainfo[0]->mail; ?>" placeholder="e-mail*" type="text"><br />
						<input class = "phoneFeeld" name="taPhone" value="<?php echo $tainfo[0]->phone; ?>" placeholder="Телефон*" type="text"><br />
						<div class="polici polici2">
							Заполняя данную форму Вы соглашаетесь с <a href="http://www.turcentr46.ru/politika-v-oblasti-obrabotki-personalnyx-dannyx-polzovatelej/">политикой в области обработки персональных данных</a>
						</div>
						<input id="taSub" name="taSave" value="Сохранить изменения" type="submit"> <br/>
						
						<h2>Смена пароля:</h2>
						<input name="taPass" value="" placeholder="Пароль*" type="password"><br />
						<input name="taPass2" value="" placeholder="Повторите пароль*" type="password"><br />
						<input id="taSub" name="taSavePass" value="Изменить пароль" type="submit"> <br/>
					</form>
					
				<?php endif;?>
			<?php endwhile;?>
			<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>