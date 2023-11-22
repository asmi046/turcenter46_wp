<?php

/*
* Template Name: Бронь ФЛ - Восстановление пароля
*/
get_header('booking');
?>

<?php
	
	$rez = $wpdb->get_results("SELECT * FROM `mt_br_user_fl` WHERE `phone` = '".$_COOKIE["phone"]."'");
	
	if (strcmp($_COOKIE["identity"], md5($rez[0]->name.$rez[0]->phone."mt2020")) == 0)  
	{
		echo "<script>window.location.href = 'https://www.mirturizma46.ru/bronirovanie-proezda-na-more/';</script>";
	} 
?>

<section class="booking-title-wrapper" style="background-image: url(<?php echo get_template_directory_uri();?>/images/mir/contact.jpg);">
	<div class="container-booking">
		<h1 class="booking-title"><?php the_title();?></h1>
	</div>
</section>

<section class = "login-section">
	<div class="container-booking" id = "container-login-section" >

		<div class="line" id="register-login-modal">
			<div class = "register-login-modal-form">
				<div class="wrapper">

					<div class="tab_item tab_item_2 registerFeild">
						<form class = "newstyle-control pass_rec_form" action="">
						
							<input id = "userphone" type="tel" placeholder="Телефон*" name="phone">
							
							<div class="policy-wrap">
								<input type="checkbox" checked="checked" id="policy" name="policy" >
								<label for="policy">Согласен на обработку персональных данных</label>
							</div>
							
							<div class = "newButton" id = "passRec">Восстановить</div>
						</form>
						
						<span class = "font14">У Вас еще нет аккаунта? <a href = "https://www.mirturizma46.ru/registraciya-v-servise-bronirovaniya">Зарегистрируйтесь в системе бронирования</a></span>
						
					</div>
					
					<div style = "display:none;" class = "trueRegister">
						<h2>Пароль восстановлен</h2>
						В течение 5 минут на Ваш номер телефона поступит сообщение с новым паролем.
						</br>
						<a href = "https://www.mirturizma46.ru/vxod/">Войти в систему бронирования</a>
					</div>
					
					<div style = "display:none;" class = "falseRegister">
						<span class = "msgDell" style = "color:red; font-size:12px;"><br/><br/>Произошла ошибка! Прпробуйте еще раз позднее... </span>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class = "loginBanner">
		
		</div>
		
	</div>
</section>
<?php
get_footer();