<?php

/*
* Template Name: Бронь ФЛ - Регистрация в систему бронирования
*/

get_header('booking');
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
						<form class = "newstyle-control" action="">
							<input id = "username" type="text" placeholder="Имя*" name="name">
							<input id = "userphone" type="tel" placeholder="Телефон*" name="phone">
							<input id = "useremail" type="email" placeholder="E-mail" name="email">
							
							<div class="policy-wrap">
								<input type="checkbox" checked="checked" id="policy" name="policy" >
								<label for="policy">Согласен на обработку персональных данных</label>
							</div>
							
							<div class = "newButton" id = "regUser">Регистрация</div>
						</form>
						
						<span class = "font14">У Вас уже есть аккаунт? <a href = "https://www.turcentr46.ru/vxod/">Войдите в систему бронирования</a></span>
					</div>
					
					<div style = "display:none;" class = "trueRegister">
						<h2>Поздравляем</h2>
						Вы успешно зарегистрировались, на указанный Вами номер телефона будет выслан Пароль для доступа к системе бронирования.</br>
						<a href = "https://www.turcentr46.ru/vxod/">Войти в систему бронирования</a>
					</div>
					
					<div style = "display:none;" class = "falseRegister">
						<span class = "msgDell" style = "color:red; font-size:12px;"><br/><br/>При регистрации возникла ошибка возможно пользователь с таким номером телефона уже зарегистрирован.</span>
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