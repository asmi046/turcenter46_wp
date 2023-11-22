<div style="display: none;">
		<div class="box-modal" id="add-number-modal">
			<div class="box-modal_close arcticmodal-close">закрыть</div>
			<h2>Выберите гостиницу и тип номера</h2>
			<div class="choice-wrapper">
				<div class="choice-wrapper__hotel">
					<div class="hotel-number__item hotel-number__item-modal">
						<div class="hotel-number__item-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/images/mir/hotel.png);"></div>
						<div class="hotel-number__item-content">
							<div class="hotel-number__item-title">Гостевой дом "Асият"</div>
							<div class="hotel-number__item-descr">2-х местный номер Комфорт</div>
						</div>
					</div>
					<div class="hotel-number__item hotel-number__item-modal">
						<div class="hotel-number__item-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/images/mir/hotel.png);"></div>
						<div class="hotel-number__item-content">
							<div class="hotel-number__item-title">Гостевой дом "Асият"</div>
							<div class="hotel-number__item-descr">2-х местный номер Комфорт</div>
						</div>
					</div>
					<div class="hotel-number__item hotel-number__item-modal">
						<div class="hotel-number__item-photo" style="background-image: url(<?php echo get_template_directory_uri();?>/images/mir/hotel.png);"></div>
						<div class="hotel-number__item-content">
							<div class="hotel-number__item-title">Гостевой дом "Асият"</div>
							<div class="hotel-number__item-descr">2-х местный номер Комфорт</div>
						</div>
					</div>
				</div>
				<div class="choice-wrapper__number">
					<div class="choice-wrapper__item">
						<span class="qty-number">2-х Местный номер с удобствами</span>
						<span class="choice-wrapper__price">2500 руб.</span>
					</div>
					<div class="choice-wrapper__item">
						<span class="qty-number">2-х Местный номер с удобствами</span>
						<span class="choice-wrapper__price">2500 руб.</span>
					</div>
				</div>
			</div>
			<div class="btn-wrap">
				<a href="#" class="add-number-link" id = "add-number-btn"  >Добавить выбранные номеа</a>
			</div>
		</div>
</div>



<div style="display: none;">
		<div class="box-modal" id="info-msg-modal">
			<div class="box-modal_close arcticmodal-close">закрыть</div>
			
			<div class = "messageInfo" id = "msgSelectMesto">
					<h2>Пожалуйста выберите места</h2>
					<img  loading="lazy" src = "<?php echo get_template_directory_uri();?>/images/img-msg/select-mesto.jpg">
			</div>
			
			<div class = "messageInfo" id = "msgSelectPunkt">
					<h2>Пожалуйста выберите населенный пункт </h2>
					<img  loading="lazy" src = "<?php echo get_template_directory_uri();?>/images/img-msg/select-punkt.jpg">
			</div>
			
			<div class = "messageInfo" id = "msgSelectPrice">
					<h2>Вы выбрали проезд а одну сторону</h2>
					<p style = "text-align:center;" class = "message"></p>
					<img  loading="lazy" src = "<?php echo get_template_directory_uri();?>/images/img-msg/select-price.jpg">
			</div>
			
			<div class = "messageInfo" id = "msgSelectZerror">
					<h2>При заполнении допущены ошибки</h2>
					<img  loading="lazy" src = "<?php echo get_template_directory_uri();?>/images/img-msg/select-zap.jpg">
			</div>
			
			<div style = "border:none;" class = "messageInfo messageInfo_noborder" id = "msgSelectDataSave">
					<h2>Данные успешно сохранены</h2>
					<img  loading="lazy" src = "<?php echo get_template_directory_uri();?>/images/img-msg/compleet.svg">
			</div>
			
			<div style = "border:none;" class = "messageInfo messageInfo_noborder" id = "msgBronChengeSend">
					<h2>Запрос на изменение данных отправлен</h2>
					<img  loading="lazy" src = "<?php echo get_template_directory_uri();?>/images/img-msg/compleet.svg">
			</div>
			
			
			
			<div style = "border:none;" class = "messageInfo messageInfo_noborder" id = "msgBronOk">
					<h2>Ваши места забронированы</h2>
					<p style = "text-align:center;" class = "message"></p>
					<img  loading="lazy" src = "<?php echo get_template_directory_uri();?>/images/img-msg/compleet.svg">
					<a href = "<?php echo get_the_permalink(3222); ?>" class="pay-booking">Оплатить</a>
			</div>
			
			<div style = "border:none;" class = "messageInfo messageInfo_noborder" id = "msgSendMail">
					<h2>Ваше сообщение отправлено</h2>
					<img  loading="lazy" src = "<?php echo get_template_directory_uri();?>/images/img-msg/sent.svg">
			</div>
			
			<div style = "border:none;" class = "messageInfo messageInfo_noborder" id = "msgPayOk">
					<h2>Ваше заказ успешно оплачен</h2>
					<p style = "text-align:center;" class = "message">Мы свяжемся с Вами в ближайшее время!</p>
					<img  loading="lazy" src = "<?php echo get_template_directory_uri();?>/images/like.svg">
			</div>
			
			<div style = "border:none;" class = "messageInfo messageInfo_noborder" id = "msgPayFail">
					<h2>Во время оплаты произошла ошибка...</h2>
					<p style = "text-align:center;" class = "message">Попробуйте позднее!</p>
					<img  loading="lazy" src = "<?php echo get_template_directory_uri();?>/images/stop.svg">
			</div>
			
			
		</div>
</div>

<!-- <div style="display: none;">
		<div class="box-modal" id="new_obr_zv">
			<div class="box-modal_close arcticmodal-close">закрыть</div>
			<h2>Обратный звонок</h2>

			<form class = "newstyle-control .universalForm" id = "obrZvForm" action="">
			
				<input class = "username" type="text" placeholder="Имя*" name="name" value = "">
				<input class = "userphone" type="tel" placeholder="Телефон" name="phone"  value = "">
				
				<div class="policy-wrap">
					<input type="checkbox" checked="checked" id="policy" name="policy" >
					<label for="policy">Согласен на обработку персональных данных</label>
				</div>
			
				<div class = "newButton universalSendElem" id = "obrZvElem">Отправить</div>
			</form>
		</div>
</div> -->

<div style="display: none;">
		<div class="box-modal" id="school-tour-modal">
			<img  loading="lazy" class = "formImg" src = "<?php bloginfo("template_url")?>/images/zTur.jpg" />
			<div class="box-modal_close arcticmodal-close">закрыть</div>
			<div class="formArctikBlk">
				<h2>Заказать тур</h2>

				<form class = "newstyle-control universalForm newstyle-control question-modal__form" id = "school-tour-form" action="">
				
					<input class = "" type="hidden" name="tour" value = "<?php the_title();?>">
					<input class = "username" type="text" placeholder="Имя*" name="name" value = "">
					<input class = "userphone" type="tel" placeholder="Телефон" name="phone"  value = "">
					
					<div class="policy-wrap">
						<input type="checkbox" checked="checked" id="policy" name="policy" >
						<label for="policy">Согласен на обработку персональных данных</label>
					</div>
				
					<div class = "newButton universalSendElem" id = "school-tour-submit">Отправить</div>
				</form>
			</div>
		</div>
</div>

<div style="display: none;">
		<div class="box-modal" id="chengeBronWin">
			<div class="box-modal_close arcticmodal-close">закрыть</div>
			<h2>Запрос на изменение брони</h2>

			<form class = "newstyle-control .universalForm" id = "formChengeBron" action="">
				<strong>Бронь:</strong>  <span class = "form_bron"></span></br>
				<strong>Места:</strong>  <span class = "form_mesta"></span></br>
				<strong>ID рейса:</strong>  <span class = "form_reisid"></span></br>
				<strong>Дата:</strong>  <span class = "form_data"></span></br>
				<strong>Пункт назначения:</strong>  <span class = "form_punkt"></span></br>
				
				<textarea class = "chengeDescription" name = "chengeDescription" id = "chengeDescription" placeholder = "Что нужно изменть в брони" ></textarea>
			
				<div class = "newButton universalSendElem" id = "formChengeBronBtn">Отправить</div>
			</form>
		</div>
</div>

<div style="display: none;">
		<div class="box-modal" id="search-modal">
			<div class="box-modal_close arcticmodal-close"></div>
			<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
				<input type="text" value="<?php echo get_search_query() ?>" placeholder="Что будем искать" name="s" id="s" />
				<input type="submit" id="searchsubmit" value="" />
			</form>
		</div>
</div>