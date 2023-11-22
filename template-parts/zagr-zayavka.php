<div class = "zagr-zayavka" style="background-image: url(<?php echo get_template_directory_uri();?>/images/zagr-zayavka-bg.jpg);"> 
		<h2>Заказать тур сейчас!</h2>
		<form id = "zakazat_tur_seychas">
			<div class="zagr-zayavka__form">
			<div class = "SendetMsg" style = "display:none"> 
				Ваше сообщение успешно отправлено.
			</div>
			</div>
			<div class="headen_form_blk">
			<div class = "zagr-zayavka__form cta1Form">
				<input type="hidden" name = "form_name" data-valuem = "Название формы" value = "Заказать тур сейчас">
				<input type="hidden" name = "page_lnk" data-valuem = "Адрес страницы" value = "<? echo (is_home())?"https://www.turcentr46.ru/":get_the_permalink()?>">
				<input required type = "text" data-valuem = "Телефон" placeholder = "Телефон" class = "phoneMasc" name = "cta1Name"/>
				<button type="button" class="new_send_btn newButton" data-formid = "zakazat_tur_seychas" data-formmsg="Заказать тур сейчас">Отправить</button>
			</div>
			</div>
		</form>
	<p>Заполняя данную форму Вы соглашаетесь с  
		<a href="http://www.turcentr46.ru/politika-v-oblasti-obrabotki-personalnyx-dannyx-polzovatelej/">
			политикой в области обработки персональных данных 
		</a>
	</p>

</div>     
