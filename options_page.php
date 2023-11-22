<?php
add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );
 
function theme_options_init(){
register_setting( 'wpuniq_options', 'wpuniq_theme_options');
}
 
function theme_options_add_page() {
add_theme_page( __( 'Настройки Темы', 'WP-Unique' ), __( 'Настройки Темы', 'WP-Unique' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}
function theme_options_do_page() { global $select_options; if ( ! isset( $_REQUEST['settings-updated'] ) ) $_REQUEST['settings-updated'] = false;
?>
 
<div class="wrap">
<?php screen_icon(); echo "<h2>". __( 'Настройки Темы', 'WP-Unique' ) . "</h2>"; ?>
<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
<div id="message" class="updated">
<p><strong><?php _e( 'Настройки сохранены', 'WP-Unique' ); ?></strong></p>
</div>
<?php endif; ?>
</div>
 
<form method="post" action="options.php">
<?php settings_fields( 'wpuniq_options' ); ?>
<?php $options = get_option( 'wpuniq_theme_options' ); ?>
<table width="600" border="0">

<tr>
<td>Телефон:</td>
<td><input type="text" name="wpuniq_theme_options[phone]" id="wpuniq_theme_options[phone]" value="<?php echo $options["phone"];?>" /></td>
</tr>


<tr>
<td>Телефон для ссылки:</td>
<td><input type="text" name="wpuniq_theme_options[phonelnk]" id="wpuniq_theme_options[phonelnk]" value="<?php echo $options["phonelnk"];?>" /></td>
</tr>


<td>e-mail:</td>
<td><input type="text" name="wpuniq_theme_options[mail]" id="wpuniq_theme_options[mail]" value="<?php echo $options[mail];?>" /></td>
</tr>

<td>Адрес 1:</td>
<td><input type="text" name="wpuniq_theme_options[adres1]" id="wpuniq_theme_options[adres1]" value="<?php echo $options[adres1];?>" /></td>
</tr>

<td>Адрес 2:</td>
<td><input type="text" name="wpuniq_theme_options[adres2]" id="wpuniq_theme_options[adres2]" value="<?php echo $options[adres2];?>" /></td>
</tr>

<td>Время работы (Будние):</td>
<td><input type="text" name="wpuniq_theme_options[timeWorkB]" id="wpuniq_theme_options[timeWorkB]" value="<?php echo $options[timeWorkB];?>" /></td>
</tr>

<td>Время работы (Суббота):</td>
<td><input type="text" name="wpuniq_theme_options[timeWorkS]" id="wpuniq_theme_options[timeWorkS]" value="<?php echo $options[timeWorkS];?>" /></td>
</tr>

<td>Время работы (Воскресение):</td>
<td><input type="text" name="wpuniq_theme_options[timeWorkV]" id="wpuniq_theme_options[timeWorkV]" value="<?php echo $options[timeWorkV];?>" /></td>
</tr>

<tr>
<td colspan="2"></td>
</tr>

</table>
<h2>Настройки банера на главной</h2>
<hr>
<h3>Банер 1:</h3>
<table style = "width:70%;">
	<tr>
		<td>Изображение</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner1img]" id="wpuniq_theme_options[baner1img]" value="<?php echo $options[baner1img];?>" /></td>
	</tr>
	
	<tr>
		<td>Текст</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner1text]" id="wpuniq_theme_options[baner1text]" value="<?php echo $options[baner1text];?>" /></br></td>
	</tr>
	
	<tr>
		<td>Ссылка</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner1lnk]" id="wpuniq_theme_options[baner1lnk]" value="<?php echo $options[baner1lnk];?>" /></br></td>
	</tr>
	
	<tr>
		<td>Рамка</td>
		<td>
			<select name="wpuniq_theme_options[baner1border]" id="wpuniq_theme_options[baner1border]">
				<option <?php if ((strcmp($options[baner1border], "no") == 0) || empty($options[baner1border]) ) echo "selected"; ?> value = "no">Круг</option>
				<option <?php if (strcmp($options[baner1border], "yes") == 0) echo "selected"; ?> value = "yes">Квадрат</option>
			</select>
		</td>	
	</tr>
</table>

<h3>Банер 2:</h3>
<table style = "width:70%;">
	<tr>
		<td>Изображение</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner2img]" id="wpuniq_theme_options[baner2img]" value="<?php echo $options[baner2img];?>" /></td>
	</tr>
	
	<tr>
		<td>Текст</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner2text]" id="wpuniq_theme_options[baner2text]" value="<?php echo $options[baner2text];?>" /></br></td>
	</tr>
	
	<tr>
		<td>Ссылка</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner2lnk]" id="wpuniq_theme_options[baner2lnk]" value="<?php echo $options[baner2lnk];?>" /></br></td>
	</tr>
	
	<tr>
		<td>Рамка</td>
		<td>
			<select name="wpuniq_theme_options[baner2border]" id="wpuniq_theme_options[baner2border]">
				<option <?php if ((strcmp($options[baner2border], "no") == 0) || empty($options[baner2border]) ) echo "selected"; ?> value = "no">Круг</option>
				<option <?php if (strcmp($options[baner2border], "yes") == 0) echo "selected"; ?> value = "yes">Квадрат</option>
			</select>
		</td>	
	</tr>
	
</table>

<h3>Банер 3:</h3>
<table style = "width:70%;">
	<tr>
		<td>Изображение</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner3img]" id="wpuniq_theme_options[baner3img]" value="<?php echo $options[baner3img];?>" /></td>
	</tr>
	
	<tr>
		<td>Текст</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner3text]" id="wpuniq_theme_options[baner3text]" value="<?php echo $options[baner3text];?>" /></br></td>
	</tr>
	
	<tr>
		<td>Ссылка</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner3lnk]" id="wpuniq_theme_options[baner3lnk]" value="<?php echo $options[baner3lnk];?>" /></br></td>
	</tr>
	
	<tr>
		<td>Рамка</td>
		<td>
			<select name="wpuniq_theme_options[baner3border]" id="wpuniq_theme_options[baner3border]">
				<option <?php if ((strcmp($options[baner3border], "no") == 0) || empty($options[baner3border]) ) echo "selected"; ?> value = "no">Круг</option>
				<option <?php if (strcmp($options[baner3border], "yes") == 0) echo "selected"; ?> value = "yes">Квадрат</option>
			</select>
		</td>	
	</tr>
</table>

<h3>Банер 4:</h3>
<table style = "width:70%;">
	<tr>
		<td>Изображение</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner4img]" id="wpuniq_theme_options[baner4img]" value="<?php echo $options[baner4img];?>" /></td>
	</tr>
	
	<tr>
		<td>Текст</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner4text]" id="wpuniq_theme_options[baner4text]" value="<?php echo $options[baner4text];?>" /></br></td>
	</tr>
	
	<tr>
		<td>Ссылка</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner4lnk]" id="wpuniq_theme_options[baner4lnk]" value="<?php echo $options[baner4lnk];?>" /></br></td>
	</tr>
	
	<tr>
		<td>Рамка</td>
		<td>
			<select name="wpuniq_theme_options[baner4border]" id="wpuniq_theme_options[baner4border]">
				<option <?php if ((strcmp($options[baner4border], "no") == 0) || empty($options[baner4border]) ) echo "selected"; ?> value = "no">Круг</option>
				<option <?php if (strcmp($options[baner4border], "yes") == 0) echo "selected"; ?> value = "yes">Квадрат</option>
			</select>
		</td>	
	</tr>
</table>

<h3>Банер 5:</h3>
<table style = "width:70%;">
	<tr>
		<td>Изображение</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner5img]" id="wpuniq_theme_options[baner5img]" value="<?php echo $options[baner5img];?>" /></td>
	</tr>
	
	<tr>
		<td>Текст</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner5text]" id="wpuniq_theme_options[baner5text]" value="<?php echo $options[baner5text];?>" /></br></td>
	</tr>
	
	<tr>
		<td>Ссылка</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner5lnk]" id="wpuniq_theme_options[baner5lnk]" value="<?php echo $options[baner5lnk];?>" /></br></td>
	</tr>
	
	<tr>
		<td>Рамка</td>
		<td>
			<select name="wpuniq_theme_options[baner5border]" id="wpuniq_theme_options[baner5border]">
				<option <?php if ((strcmp($options[baner5border], "no") == 0) || empty($options[baner5border]) ) echo "selected"; ?> value = "no">Круг</option>
				<option <?php if (strcmp($options[baner5border], "yes") == 0) echo "selected"; ?> value = "yes">Квадрат</option>
			</select>
		</td>	
	</tr>
</table>


<h3>Банер 6:</h3>
<table style = "width:70%;">
	<tr>
		<td>Изображение</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner6img]" id="wpuniq_theme_options[baner6img]" value="<?php echo $options[baner6img];?>" /></td>
	</tr>
	
	<tr>
		<td>Текст</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner6text]" id="wpuniq_theme_options[baner6text]" value="<?php echo $options[baner6text];?>" /></br></td>
	</tr>
	
	<tr>
		<td>Ссылка</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner6lnk]" id="wpuniq_theme_options[baner6lnk]" value="<?php echo $options[baner6lnk];?>" /></br></td>
	</tr>
	
	<tr>
		<td>Рамка</td>
		<td>
			<select name="wpuniq_theme_options[baner6border]" id="wpuniq_theme_options[baner6border]">
				<option <?php if ((strcmp($options[baner6border], "no") == 0) || empty($options[baner6border]) ) echo "selected"; ?> value = "no">Круг</option>
				<option <?php if (strcmp($options[baner6border], "yes") == 0) echo "selected"; ?> value = "yes">Квадрат</option>
			</select>
		</td>	
	</tr>
	
</table>

<h3>Банер 7:</h3>
<table style = "width:70%;">
	<tr>
		<td>Изображение</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner7img]" id="wpuniq_theme_options[baner7img]" value="<?php echo $options[baner7img];?>" /></td>
	</tr>
	
	<tr>
		<td>Текст</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner7text]" id="wpuniq_theme_options[baner7text]" value="<?php echo $options[baner7text];?>" /></br></td>
	</tr>
	
	<tr>
		<td>Ссылка</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner7lnk]" id="wpuniq_theme_options[baner7lnk]" value="<?php echo $options[baner7lnk];?>" /></br></td>
	</tr>
	
	<tr>
		<td>Рамка</td>
		<td>
			<select name="wpuniq_theme_options[baner7border]" id="wpuniq_theme_options[baner7border]">
				<option <?php if ((strcmp($options[baner7border], "no") == 0) || empty($options[baner7border]) ) echo "selected"; ?> value = "no">Круг</option>
				<option <?php if (strcmp($options[baner7border], "yes") == 0) echo "selected"; ?> value = "yes">Квадрат</option>
			</select>
		</td>	
	</tr>
</table>

<h3>Банер 8:</h3>
<table style = "width:70%;">
	<tr>
		<td>Изображение</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner8img]" id="wpuniq_theme_options[baner8img]" value="<?php echo $options[baner8img];?>" /></td>
	</tr>
	
	<tr>
		<td>Текст</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner8text]" id="wpuniq_theme_options[baner8text]" value="<?php echo $options[baner8text];?>" /></br></td>
	</tr>
	
	<tr>
		<td>Ссылка</td>
		<td><input size = "100" type="text" name="wpuniq_theme_options[baner8lnk]" id="wpuniq_theme_options[baner8lnk]" value="<?php echo $options[baner8lnk];?>" /></br></td>
	</tr>
	
	<tr>
		<td>Рамка</td>
		<td>
			<select name="wpuniq_theme_options[baner8border]" id="wpuniq_theme_options[baner8border]">
				<option <?php if ((strcmp($options[baner2border], "no") == 0) || empty($options[baner8border]) ) echo "selected"; ?> value = "no">Круг</option>
				<option <?php if (strcmp($options[baner8border], "yes") == 0) echo "selected"; ?> value = "yes">Квадрат</option>
			</select>
		</td>	
	</tr>
</table>

<input type="submit" value="Сохранить" />
</form>
 
<?php
}  
?>