	<div class = "line zayavka">
			<div class = "cta1Wraper">
				<h2>Заказать тур сейчас!</h2>
				<form id = "glavnaya_zakazat_tur_seihas" class = "cta1Form" >
					<input type="hidden" name = "form_name" data-valuem = "Название формы" value = "Форма на главной странице - заказать тур сейчас">
					<input type="hidden" name = "page_lnk" data-valuem = "Адрес страницы" value = "<? echo (is_home())?"https://www.turcentr46.ru/":get_the_permalink()?>">
					<input disabled type = "text" placeholder = "Сообщение отправлено!" class = "phoneMasc SendetMsg" style="display:none"/>
					<input required type = "text" placeholder = "Телефон" class = "phoneMasc headen_form_blk" name = "cta1Name" id = "cta1Name" data-valuem = "Телефон"/>
					<button class = "newButton new_send_btn" id = "sendQBtn" data-formid = "glavnaya_zakazat_tur_seihas">Отправить</button>
				</form>
				
				<div class="polici">
					Заполняя данную форму Вы соглашаетесь с <a href="http://www.turcentr46.ru/politika-v-oblasti-obrabotki-personalnyx-dannyx-polzovatelej/">политикой в области обработки персональных данных</a>
				</div> 
			</div>
	</div>