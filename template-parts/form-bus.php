<div class="forms-bus">
	<form id = "bus_arenda" action="" class="contacts-form-tour contacts-form-tour__bus newstyle-control">
		<h2 class="forms-bus__title"><?php the_title();?></h2> 
		<p class="forms-bus__subtitle">
			Предоставляем в аренду автобусы на любые мероприятия, <br> 
			мы имеем все разрешающие документы и лицензии на пассажирские перевозки
		</p>
		<div class="contacts-form-tour__wrap headen_form_blk">
			<div class="contacts-form-tour__inputs contacts-form-tour__inputs_bus">
				<input type="hidden" name = "form_name" data-valuem = "Название формы" value = "Аренда автобусов в Курске">
				<input type="hidden" name = "page_lnk" data-valuem = "Адрес страницы" value = "<? echo (is_home())?"https://www.mirturizma46.ru/":get_the_permalink()?>">
				<input required type="tel" name="tel" data-valuem = "Телефон" placeholder="Телефон*">
				<input required type="number" name="mest" data-valuem = "Количество мест" placeholder="Количество мест*">
				<input required type="text" name="date" data-valuem = "Дата подачи" placeholder="Дата подачи*">
			</div>
		</div>

		<div class = "SendetMsg" style = "display:none"> 
			Ваше сообщение успешно отправлено.
		</div>

		<p class="forms-bus__subtitle">
			Заполняя данную форму вы соглашаетесь с <a href = "<?echo get_the_permalink(1312); ?>">политикой конфиденциальности</a>
		</p>
		<button type = "submit" class="newButton new_send_btn" 
				data-formmsg = "<?php the_title();?>"
				data-formid = "bus_arenda" data-formmsg="Аренда автобусов в Курске"
				>Отправить заявку</button>
	</form>
</div>