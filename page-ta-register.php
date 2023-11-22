<?php
/*
Template Name: Вход для турагентств - регистрация
*/			
?>

<?php get_header(); ?>

<script>
	jQuery(document).ready(function() { 
		//jQuery(".phoneFeeld").mask("+9 (999) 999-9999");
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
				
					<?php the_content();?>
					
					<?php
							$captcha_instance = new ReallySimpleCaptcha();
							$addRez = true;
							$errors = "";
					
					if(isset($_POST['taReg'])) 
							{
								$correct = $captcha_instance->check( $_POST['prefix'], $_POST['verText'] );
								if (!$correct)
								{
									$errors = "<div class = 'errMsg'>Не верно введен текст с картинки</div>";
									$addRez = false;
									$captcha_instance->remove( $_POST['prefix']);
								}
								
								$data["moderate"] =  0; 
								$data["naim"] =  $_POST['taOrg']; 
								
								if (strcmp($_POST['taOrg'],"") == 0) {
									$errors = "<div class = 'errMsg'>Поле 'Организация' обязательно для заполнения</div>";
									$addRez = false;
								}
								
								$data["person"] =  $_POST['taContactFace']; 
								
								if (!preg_match("/[0-9a-z_\.\-]+@[0-9a-z_\.\-]+\.[a-z]{2,4}/i", $_POST['taMail'])) {
									$errors = "<div class = 'errMsg'>Поле email заполнено некорректно</div>";
									$addRez = false;
								} else $data["mail"] = $_POST['taMail']; 
									
								if ($_POST['taPass'] != $_POST['taPass2']) {
									$errors = "<div class = 'errMsg'>Введенные пароли не совпадают</div>";
									$addRez = false;
								} else $data["pass"] = $_POST['taPass']; 
								
								if (empty($_POST['taPhone'])) {
									$errors = "<div class = 'errMsg'>Телефон введен не корректно</div>";
									$addRez = false;
								} else 
								$data["phone"] =  $_POST['taPhone']; 
								
								if ($addRez){
										global $wpdb;
										$registred = $wpdb->insert("mt_br_user", $data, array("%d","%s","%s","%s","%s","%s","%d"));

										if ($registred) {
											$errors = "<div class = 'errMsg okMsg'>Регистрация прошла успешно! Наш менеджер свяжется с вами в ближайшее время.</div>";
											$captcha_instance->remove( $_POST['prefix']);
											
											$message = "<h1>Зарегистрирован новый пользователь</h1>".
														"<strong>Организация:</strong> ".$_POST['taOrg']."<br/>".
														"<strong>Контактное лицо:</strong> ".$_POST['taContactFace']."<br/>".
														"<strong>e-mail:</strong> ".$_POST['taMail']."<br/>".
														"<strong>Телефон:</strong> ".$_POST['taPhone']."<br/>".
														"<a href = '".get_bloginfo("url")."/?p=1351&mail=".$_POST['taMail']."'>Активировать</a>";
											
											$headers = array(
												'From: ТурЦентр <noreply@turcentr46.ru>',
												'content-type: text/html'
											);

											wp_mail( array("asmi046@gmail.com","litvinov-pa@yandex.ru"), "Активация пользователя", $message, $headers );
											
										} else {
											$errors = "<div class = 'errMsg'>Пользователь с таким e-mail уже зарегистрирован</div>";
											$addRez = false;
										}
								}
							}
							
					?>
					
					<div class = "errMssages">
						<?php echo $errors; ?>
					</div>
					
					<form class="taAuthForm taAuthFormReg" name="taAuthFormreg" action="" method="post">
						<input name="taOrg" value="" placeholder="Организация*" type="text"><br />
						<input name="taContactFace" value="" placeholder="Контактное лицо" type="text"><br />
						<input name="taMail" value="" placeholder="e-mail*" type="text"><br />
						<input class = "phoneFeeld" name="taPhone" value="" placeholder="Телефон*" type="tel"><br />
						<input name="taPass" value="" placeholder="Пароль*" type="password"><br />
						<input name="taPass2" value="" placeholder="Повторите пароль*" type="password"><br />
						<?php
							
							$captcha_instance->bg = array( 255, 255, 255 );
							$word = $captcha_instance->generate_random_word();
							$prefix = mt_rand();
							$imgname = $captcha_instance->generate_image( $prefix, $word );
						
						?>
					
						<img class = "cimgm" src = "<?php echo get_bloginfo("url")?>/wp-content/plugins/really-simple-captcha/tmp/<?php echo $imgname;?>" /><br />
						<input name="verText" value="" placeholder="Введите текст с картинки*" type="text"><br />
						<input name="prefix" value="<?php echo $prefix; ?>" type="hidden">
						
						<div class="polici polici2">
							Заполняя данную форму Вы соглашаетесь с <a href="http://www.turcentr46.ru/politika-v-oblasti-obrabotki-personalnyx-dannyx-polzovatelej/">политикой в области обработки персональных данных</a>
						</div>
						<input id="taSub" name="taReg" value="Регистрация" type="submit"> <br/>
					</form>
				
			<?php endwhile;?>
			<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>