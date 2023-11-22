<?php

/*
* Template Name: Бронь ФЛ - Бронирование туров на море
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




<div id = "naprp-t-prib-1" style = "display:none;">
	<?php include("posadkapuncts/punktsNapr1t-prib.php"); ?>
</div>


<div id = "naprp-t-prib-2" style = "display:none;">
	<?php include("posadkapuncts/punktsNapr2t-prib.php"); ?>
</div>


<div id = "naprp-t-prib-3" style = "display:none;">
	<?php  include("posadkapuncts/punktsNapr3t-prib.php"); ?>
</div>



<div id = "naprp-t-otpr-1" style = "display:none;">
	<?php include("posadkapuncts/punktsNapr1t-otpr.php"); ?>
</div>

<div id = "naprp-t-otpr-2" style = "display:none;">
	<?php include("posadkapuncts/punktsNapr2t-otpr.php"); ?>
</div>

<div id = "naprp-t-otpr-3" style = "display:none;">
	<?php include("posadkapuncts/punktsNapr3t-otpr.php"); ?>
</div>



<div id = "naprp-o-prib-1" style = "display:none;">
	<?php include("posadkapuncts/punktsNapr1o-prib.php"); ?>
</div>

<div id = "naprp-o-prib-2" style = "display:none;">
	<?php include("posadkapuncts/punktsNapr2o-prib.php"); ?>
</div>

<div id = "naprp-o-prib-3" style = "display:none;">
	<?php include("posadkapuncts/punktsNapr3o-prib.php"); ?>
</div>



<div id = "naprp-o-otpr-1" style = "display:none;">
	<?php  include("posadkapuncts/punktsNapr1o-otpr.php"); ?>
</div>	

<div id = "naprp-o-otpr-2" style = "display:none;">
	<?php include("posadkapuncts/punktsNapr2o-otpr.php"); ?>
</div>	

<div id = "naprp-o-otpr-3" style = "display:none;">
	<?php include("posadkapuncts/punktsNapr3o-otpr.php"); ?>
</div>	

<div class = "phone" style = "display:none;"><?php echo $_COOKIE["phone"]; ?></div>
<div class = "identity" style = "display:none;"><?php echo $_COOKIE["identity"]; ?></div>



<div class = "mobileStep mobileStep-active" data-stepindex = "1">
	<div class = "stepN"><span>1</span></div>
	<div class = "stepTitle">Выбор направления <br/>и рейса</div>
</div>

<section class="booking-search mobile-step-hide" style = "display:block" id="section-step-1" >
	<div class="container-booking">
		<form action="" class="booking-search__form">
			<select name="napravlenie" id="napravlenie_select">
				<option selected disabled>Направление</option>
				<?php 
					global $wpdb;
					
					$rez = $wpdb->get_results("SELECT * FROM `mt_br_napr` ORDER BY `order`");
					
					foreach ($rez as $napr) {
						echo '<option data-naprstart = "'.$napr->start.'" data-naprend = "'.$napr->end.'"  data-prompunkts = "'.$napr->prompunkts.'" value="'.$napr->ID.'">'.$napr->start.' &#8594; '.$napr->end.'</option>';
					}
				?>
				
			</select>
			<select name="reis" id="reis_select">
				<option selected disabled>Рейс</option>
			</select>
			<!-- <div class="booking-search__form-date-wrapper"> -->
				<div class="booking-search__form-text">Даты выбранного рейса</div>
				<div class="booking-search__form-date">
					<div class="form-date date-1">
						<div class="form-date__city">из Курска</div>
						<div id = "start_to_date_msg" class="form-date__date">__.__.<? echo date("Y");?></div>
					</div>
					<div class="date-arrows"></div>
					<div class="form-date date-2">
						<div class="form-date__city">в Курск</div>
						<div id = "start_out_date_msg" class="form-date__date">__.__.<? echo date("Y");?></div>
					</div>
				</div>
				<div class="booking-search__form-price-wrap">
					<div class="form-date__city">Цена выбранных мест включая проживание</div>
					<div class="booking-search__form-price"><span class = "itozSumm">0</span> руб.</div>
				</div>
			<!-- </div> -->
		</form>
	</div>
</section>

<div class = "mobileStep" data-stepindex = "2">
	<div class = "stepN"><span>2</span></div>
	<div class = "stepTitle">Выбор пункта <br/>прибывания</div>
</div>

<section class="destination mobile-step-hide" id="section-step-2">
	<div class = "no-activ-elem"></div>
	
	<div class="container-booking">
		<div class="destination-title">Пункт прибывания</div>
		<div class="destination-point">
			<div class="destination-item">
				<div class="destination-item__circle"></div>
				<div class="destination-item__city">Курск</div>
			</div>
			<div class="destination-item">
				<div class="destination-item__circle"></div>
				<div class="destination-item__city">Витязево</div>
			</div>
			<div class="destination-item">
				<div class="destination-item__circle active"></div>
				<div class="destination-item__city">Анапа</div>
			</div>
			<div class="destination-item">
				<div class="destination-item__circle"></div>
				<div class="destination-item__city">Кабардинка</div>
			</div>
			<div class="destination-item">
				<div class="destination-item__circle"></div>
				<div class="destination-item__city">Геленджик</div>
			</div>
		</div>
	</div>
</section>


<section class="seat-bus line">
<div class = "no-activ-elem"></div>
	<div class="container-booking">
		
		<div class = "mobileStep" data-stepindex = "3">
			<div class = "stepN"><span>3</span></div>
			<div class = "stepTitle">Выбор мест <br/>в автобусе</div>
		</div>
		
		<div class="buss-wrapper mobile-step-hide" id="section-step-3">
			<div class="bus-wrapper">
				<div class="bus-header">
					<div class="form-date">
						<div class="form-date__city">из Курска</div>
						<div class="form-date__date" id = "form-date__date_to">08.06.2020</div>
					</div>
					<div class="bus-from bus-circle"></div>
				</div>
				<div class="bus-driver">Место водителя</div>
				<div class="bus-passengers" id = "bus-passengers_t">
					<div data-naprch = "t" data-meston = "2" class="bus-passengers__item">2</div>
					<div data-naprch = "t" data-meston = "1" class="bus-passengers__item">1</div>
					<div class="bus-passengers__row">Ряд 1</div>
					<div data-naprch = "t" data-meston = "3" class="bus-passengers__item">3</div>
					<div data-naprch = "t" data-meston = "4" class="bus-passengers__item">4</div>
					<div data-naprch = "t" data-meston = "6" class="bus-passengers__item">6</div>
					<div data-naprch = "t" data-meston = "5" class="bus-passengers__item">5</div>
					<div class="bus-passengers__row">Ряд 2</div>
					<div data-naprch = "t" data-meston = "7" class="bus-passengers__item">7</div>
					<div data-naprch = "t" data-meston = "8" class="bus-passengers__item">8</div>
					<div data-naprch = "t" data-meston = "10" class="bus-passengers__item">10</div>
					<div data-naprch = "t" data-meston = "9" class="bus-passengers__item">9</div>
					<div class="bus-passengers__row">Ряд 3</div>
					<div data-naprch = "t" data-meston = "11" class="bus-passengers__item">11</div>
					<div data-naprch = "t" data-meston = "12" class="bus-passengers__item">12</div>
					<div data-naprch = "t" data-meston = "14" class="bus-passengers__item">14</div>
					<div data-naprch = "t" data-meston = "13" class="bus-passengers__item">13</div>
					<div class="bus-passengers__row">Ряд 4</div>
					<div data-naprch = "t" data-meston = "15" class="bus-passengers__item">15</div>
					<div data-naprch = "t" data-meston = "16" class="bus-passengers__item">16</div>
					<div data-naprch = "t" data-meston = "18" class="bus-passengers__item">18</div>
					<div data-naprch = "t" data-meston = "17" class="bus-passengers__item">17</div>
					<div class="bus-passengers__row">Ряд 5</div>
					<div data-naprch = "t" data-meston = "19" class="bus-passengers__item">19</div>
					<div data-naprch = "t" data-meston = "20" class="bus-passengers__item">20</div>
					<div data-naprch = "t" data-meston = "22" class="bus-passengers__item">22</div>
					<div data-naprch = "t" data-meston = "21" class="bus-passengers__item">21</div>
					<div class="bus-passengers__row">Ряд 6</div>
					<div data-naprch = "t" class="bus-passengers__none"></div>
					<div data-naprch = "t" class="bus-passengers__none"></div>
					<div data-naprch = "t" data-meston = "24" class="bus-passengers__item">24</div>
					<div data-naprch = "t" data-meston = "23" class="bus-passengers__item">23</div>
					<div class="bus-passengers__row">Ряд 7</div>
					<div class="bus-passengers__none"></div>
					<div class="bus-passengers__none"></div>
					
					<div data-naprch = "t" data-meston = "28" class="bus-passengers__item">28</div>
					<div data-naprch = "t" data-meston = "27" class="bus-passengers__item">27</div>
					<div class="bus-passengers__row">Ряд 8</div>
					<div data-naprch = "t" data-meston = "25" class="bus-passengers__item">25</div>
					<div data-naprch = "t" data-meston = "26" class="bus-passengers__item">26</div>
					
					
					<div data-naprch = "t" data-meston = "31" class="bus-passengers__item">32</div>
					<div data-naprch = "t" data-meston = "31" class="bus-passengers__item">31</div>
					<div class="bus-passengers__row">Ряд 9</div>
					<div data-naprch = "t" data-meston = "29" class="bus-passengers__item">29</div>
					<div data-naprch = "t" data-meston = "30" class="bus-passengers__item">30</div>
					
					
					<div data-naprch = "t" data-meston = "36" class="bus-passengers__item">36</div>
					<div data-naprch = "t" data-meston = "35" class="bus-passengers__item">35</div>
					<div class="bus-passengers__row">Ряд 10</div>
					<div data-naprch = "t" data-meston = "33" class="bus-passengers__item">33</div>
					<div data-naprch = "t" data-meston = "34" class="bus-passengers__item">34</div>
					
					<div data-naprch = "t" data-meston = "40" class="bus-passengers__item">40</div>
					<div data-naprch = "t" data-meston = "39" class="bus-passengers__item">39</div>
					<div class="bus-passengers__row">Ряд 11</div>
					<div data-naprch = "t" data-meston = "37" class="bus-passengers__item">37</div>
					<div data-naprch = "t" data-meston = "38" class="bus-passengers__item">38</div>
					
					
					
					<div data-naprch = "t" data-meston = "44" class="bus-passengers__item">44</div>
					<div data-naprch = "t" data-meston = "43" class="bus-passengers__item">43</div>
					<div class="bus-passengers__row">Ряд 12</div>
					<div data-naprch = "t" data-meston = "41" class="bus-passengers__item">41</div>
					<div data-naprch = "t" data-meston = "42" class="bus-passengers__item">42</div>
					
					<div data-naprch = "t" data-meston = "49" class="bus-passengers__item">49</div>
					<div data-naprch = "t" data-meston = "48" class="bus-passengers__item">48</div>
					<div data-naprch = "t" data-meston = "47" class="bus-passengers__item">47</div>
					<div data-naprch = "t" data-meston = "46" class="bus-passengers__item">46</div>
					<div data-naprch = "t" data-meston = "45" class="bus-passengers__item">45</div>
				</div>
			</div>
			<div class="bus-wrapper">
				<div class="bus-header">
					<div class="form-date">
						<div class="form-date__city">в Курск</div>
						<div class="form-date__date" id = "form-date__date_out">18.06.2020</div>
					</div>
					<div class="bus-to bus-circle"></div>
				</div>
				<div class="bus-driver">Место водителя</div>
				<div class="bus-passengers" id = "bus-passengers_o">
					<div data-naprch = "o" data-meston = "2" class="bus-passengers__item">2</div>
					<div data-naprch = "o" data-meston = "1" class="bus-passengers__item">1</div>
					<div class="bus-passengers__row">Ряд 1</div>
					<div data-naprch = "o" data-meston = "3" class="bus-passengers__item">3</div>
					<div data-naprch = "o" data-meston = "4" class="bus-passengers__item">4</div>
					<div data-naprch = "o" data-meston = "6" class="bus-passengers__item">6</div>
					<div data-naprch = "o" data-meston = "5" class="bus-passengers__item">5</div>
					<div class="bus-passengers__row">Ряд 2</div>
					<div data-naprch = "o" data-meston = "7" class="bus-passengers__item">7</div>
					<div data-naprch = "o" data-meston = "8" class="bus-passengers__item">8</div>
					<div data-naprch = "o" data-meston = "10" class="bus-passengers__item">10</div>
					<div data-naprch = "o" data-meston = "9" class="bus-passengers__item">9</div>
					<div class="bus-passengers__row">Ряд 3</div>
					<div data-naprch = "o" data-meston = "11" class="bus-passengers__item">11</div>
					<div data-naprch = "o" data-meston = "12" class="bus-passengers__item">12</div>
					<div data-naprch = "o" data-meston = "14" class="bus-passengers__item">14</div>
					<div data-naprch = "o" data-meston = "13" class="bus-passengers__item">13</div>
					<div class="bus-passengers__row">Ряд 4</div>
					<div data-naprch = "o" data-meston = "15" class="bus-passengers__item">15</div>
					<div data-naprch = "o" data-meston = "16" class="bus-passengers__item">16</div>
					<div data-naprch = "o" data-meston = "18" class="bus-passengers__item">18</div>
					<div data-naprch = "o" data-meston = "17" class="bus-passengers__item">17</div>
					<div class="bus-passengers__row">Ряд 5</div>
					<div data-naprch = "o" data-meston = "19" class="bus-passengers__item">19</div>
					<div data-naprch = "o" data-meston = "20" class="bus-passengers__item">20</div>
					<div data-naprch = "o" data-meston = "22" class="bus-passengers__item">22</div>
					<div data-naprch = "o" data-meston = "21" class="bus-passengers__item">21</div>
					<div class="bus-passengers__row">Ряд 6</div>
					<div data-naprch = "o" class="bus-passengers__none"></div>
					<div data-naprch = "o" class="bus-passengers__none"></div>
					<div data-naprch = "o" data-meston = "24" class="bus-passengers__item">24</div>
					<div data-naprch = "o" data-meston = "23" class="bus-passengers__item">23</div>
					<div class="bus-passengers__row">Ряд 7</div>
					<div class="bus-passengers__none"></div>
					<div class="bus-passengers__none"></div>
					
					<div data-naprch = "o" data-meston = "28" class="bus-passengers__item">28</div>
					<div data-naprch = "o" data-meston = "27" class="bus-passengers__item">27</div>
					<div class="bus-passengers__row">Ряд 8</div>
					<div data-naprch = "o" data-meston = "25" class="bus-passengers__item">25</div>
					<div data-naprch = "o" data-meston = "26" class="bus-passengers__item">26</div>
					
					
					
					<div data-naprch = "o" data-meston = "31" class="bus-passengers__item">32</div>
					<div data-naprch = "o" data-meston = "31" class="bus-passengers__item">31</div>
					<div class="bus-passengers__row">Ряд 9</div>
					<div data-naprch = "o" data-meston = "29" class="bus-passengers__item">29</div>
					<div data-naprch = "o" data-meston = "30" class="bus-passengers__item">30</div>
					
					<div data-naprch = "o" data-meston = "36" class="bus-passengers__item">36</div>
					<div data-naprch = "o" data-meston = "35" class="bus-passengers__item">35</div>
					<div class="bus-passengers__row">Ряд 10</div>
					<div data-naprch = "o" data-meston = "33" class="bus-passengers__item">33</div>
					<div data-naprch = "o" data-meston = "34" class="bus-passengers__item">34</div>
					
					<div data-naprch = "o" data-meston = "40" class="bus-passengers__item">40</div>
					<div data-naprch = "o" data-meston = "39" class="bus-passengers__item">39</div>				
					<div class="bus-passengers__row">Ряд 11</div>
					<div data-naprch = "o" data-meston = "37" class="bus-passengers__item">37</div>
					<div data-naprch = "o" data-meston = "38" class="bus-passengers__item">38</div>
					
					<div data-naprch = "o" data-meston = "44" class="bus-passengers__item">44</div>
					<div data-naprch = "o" data-meston = "43" class="bus-passengers__item">43</div>
					<div class="bus-passengers__row">Ряд 12</div>
					<div data-naprch = "o" data-meston = "41" class="bus-passengers__item">41</div>
					<div data-naprch = "o" data-meston = "42" class="bus-passengers__item">42</div>
					
					<div data-naprch = "o" data-meston = "49" class="bus-passengers__item">49</div>
					<div data-naprch = "o" data-meston = "48" class="bus-passengers__item">48</div>
					<div data-naprch = "o" data-meston = "47" class="bus-passengers__item">47</div>
					<div data-naprch = "o" data-meston = "46" class="bus-passengers__item">46</div>
					<div data-naprch = "o" data-meston = "45" class="bus-passengers__item">45</div>
				</div>
			</div>
		</div>
		
		
		<div class = "mobileStep" data-stepindex = "4">
			<div class = "stepN"><span>4</span></div>
			<div class = "stepTitle">Персональные данные <br/>и проживание</div>
		</div>
		
		<div class="bus-places-wrap mobile-step-hide" id="section-step-4">
			<div class="bus-places">
				<div class="selected-places">
					<h3 class="selected-places__title">Выбранные места</h3>
					
					<div class = "workPanel">
					
							<div class="selected-places__item">
								<div class="selected-places__item-head">
									<div class="bus-to bus-circle"></div>
									<div class="form-date">
										<div class="form-date__city">в Курск</div>
										<div class="form-date__date">Место №3</div>
									</div>
								</div>
								<div class="selected-places__item-form">
									<form action="">
										<input type="text" name="lastname" placeholder="Фамилия">
										<input type="text" name="name" placeholder="Имя">
										<input type="text" name="patron" placeholder="Отчество">
										<input type="text" name="born" placeholder="Дата рождения">
										<select name="document" id="">
											<option selected disabled>Тип документа</option>
											<option value="Паспорт">Паспорт</option>
											<option value="Водительское удостоверение">Водительское удостоверение</option>
										</select>
										<input type="text" name="number" placeholder="Номер документа">
										<input type="tel" name="phone" placeholder="Контактный телефон">
										<select name="place-from" class="w-50" id="">
											<option selected disabled>Пункт отправления</option>
											<option value="Курск">Курск</option>
											<option value="Анапа">Анапа</option>
										</select>
										<select name="place-to" class="w-50" id="">
											<option selected disabled>Пункт прибытия</option>
											<option value="Курск">Курск</option>
											<option value="Анапа">Анапа</option>
										</select>
									</form>
								</div>
							</div>
							
							<div class="selected-places__item">
								<div class="selected-places__item-head">
									<div class="bus-from bus-circle"></div>
									<div class="form-date">
										<div class="form-date__city">из Курска</div>
										<div class="form-date__date">Место №3</div>
									</div>
								</div>
								<div class="selected-places__item-form">
									<form action="">
										<input type="text" name="lastname" placeholder="Фамилия">
										<input type="text" name="name" placeholder="Имя">
										<input type="text" name="patron" placeholder="Отчество">
										<input type="text" name="born" placeholder="Дата рождения">
										<select name="document" id="">
											<option selected disabled>Тип документа</option>
											<option value="Паспорт">Паспорт</option>
											<option value="Водительское удостоверение">Водительское удостоверение</option>
										</select>
										<input type="text" name="number" placeholder="Номер документа">
										<input type="tel" name="phone" placeholder="Контактный телефон">
										<select name="place-from" class="w-50" id="">
											<option selected disabled>Пункт отправления</option>
											<option value="Курск">Курск</option>
											<option value="Анапа">Анапа</option>
										</select>
										<select name="place-to" class="w-50" id="">
											<option selected disabled>Пункт прибытия</option>
											<option value="Курск">Курск</option>
											<option value="Анапа">Анапа</option>
										</select>
									</form>
								</div>
							</div>
					</div>
					
					
				</div>
			</div>
			<div class="hotel-number">
				<div class="hotel-number__item">
					<div style = "display:none;" class="hotel-number-close"></div>
					<div class="hotel-number__item-photo" id="hotel-number__item-photo_itog" style="background-image: url(<?php echo get_template_directory_uri();?>/images/hotel-beep.svg); background-color: #ebebeb; background-size: 70%;"></div>
					<div class="hotel-number__item-content">
						<div class="hotel-number__item-title" id = "hotel-number__item-title_itog">Без проживания</div>
						<div class="hotel-number__item-descr" id = "hotel-number__item-descr_itog">Выберите гостиницу</div>
						
						<div class = "number_info" id = "number_info" style = "display:none;"></div>
						<div class = "number_price" id = "number_price" style = "display:none;"></div>
						
					</div>
				</div>
				<div class="add-number">
					<div class="add-number-plus">+</div>
					<div class="">Добавить номер</div>
				</div>
			</div>
			<div class="hotel-btn-wrap">
				<div class="order-place">Оформить места</div>
				<div class="save-place">Сохранить изменения</div>
				<div class="delete-place">Удалить все места</div>
			</div>
		</div>
	</div>
</section>
<div class="clearfix"></div>
	<?php } ?>
<?php get_footer();?>