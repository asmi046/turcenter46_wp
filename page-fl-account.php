<?php

/*
* Template Name: Бронь ФЛ - Аккаунт
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

<section class = "login-section">
	<div class="container-booking" id = "container-login-section" >
		<form class = "newstyle-control" id = "flKabinetForm" action="">
			<input id = "userid" type = "hidden" value = "<?php echo $rez[0]->id; ?>">			
			<input id = "username" type="text" placeholder="Имя*" name="name" value = "<?php echo $rez[0]->name; ?>">
			<input id = "userphone" type="tel" placeholder="Телефон" name="phone"  value = "<?php echo $rez[0]->phone; ?>" disabled>
			<input id = "useremail" type="email" placeholder="Email" name="mail"  value = "<?php echo $rez[0]->mail; ?>" >
			<input id = "userpass" type="password" placeholder="Пароль" name="pass"  value = "">
			<input id = "userpass1" type="password" placeholder="Пароль еще раз" name="pass1"  value = "">
			
			<div class="policy-wrap">
				<input type="checkbox" checked="checked" id="policy" name="policy" >
				<label for="policy">Согласен на обработку персональных данных</label>
			</div>
			
			<div class = "newButton" id = "saveUserData">Сохранить</div>
		</form>
	</div>
</section>

	<?php } ?>
<?php get_footer();?>