<!-- Арктик модал -->

<!-- Окно Туры за границу на главной -->
<div style="display: none;">
<div class="box-modal box-modal-new box-modal-new__cust" id="zayavTurModal">
  <div class="box-modal_close box-modal_close_new arcticmodal-close"></div>
  <img src="<?php bloginfo("template_url")?>/images/zturimg.jpg" loading="lazy" />
  <div class="formArctikBlk mod-zagr-tur">
    <h2>Оставить заявку на подбор тура: <span id="tkName" class='tkName'></span></h2>
    <p>Наши специалисты свяжутся с Вами в течение 15 минут</p>

    <form id="tury_za_granitsu_na_glavnoy">
      <div class="SendetMsg" style="display:none"> 
        Ваше сообщение успешно отправлено.
      </div>
      <div class="headen_form_blk">
				<input type="hidden" name = "form_name" data-valuem = "Название формы" value = "Туры за границу на главной">
				<input type="hidden" name = "page_lnk" data-valuem = "Адрес страницы" value = "<? echo (is_home())?"https://www.turcentr46.ru/":get_the_permalink()?>">
        <input required type="text" name = "name_tury_za_granitsu" data-valuem = "Имя" placeholder="Имя*">
        <input required type="text" name = "tel_tury_za_granitsu" data-valuem = "Телефон" placeholder="Телефон*" class="phoneMasc"><br />
      </div>
      <div class="callback-note mod-zagr-tur__note">Нажимая на кнопку "Отправить", вы соглашаетесь с <a class="tdu"
          href="<?php echo get_permalink(1312);?>">условиями обработки персональных данных</a>.</div>
      <input onclick="yaCounter29416892.reachGoal('doZ');" type="button" class="new_send_btn newButton" value="Отправить" data-formid = "tury_za_granitsu_na_glavnoy">
    </form>

  </div>
</div>
</div>
<!-- =================================================================================================================================== -->

<!-- Окно - Заявка на школьный тур -->
	<div style="display: none;">
	  <div class="box-modal box-modal-new" id="school-tour-modals"> 
	    <div class="box-modal_close box-modal_close_new arcticmodal-close"></div>
	    <img src="<?php bloginfo("template_url")?>/images/scooll-modal.jpg" loading="lazy" />
	    <div class="windows_form">
	      <h2>Бронирование автобуса</h2>
	      <p class="subtitle"></p> 
	      <form id="school_tour_form">
	        <div class="headen_form_blk">
						<input type="hidden" name = "form_name" data-valuem = "Название формы" value = "Заявка на школьный тур">
						<input type="hidden" name = "page_lnk" data-valuem = "Адрес страницы" value = "<? echo (is_home())?"https://www.turcentr46.ru/":get_the_permalink()?>">
	          <input type="tel" name="tel" required data-valuem = "Телефон*" placeholder="Телефон*">
	          <input type="number" name="mest" required data-valuem = "Количество мест*" placeholder="Количество мест*">
	          <input type="text" name="date" data-valuem = "Дата экскурсии" placeholder="Дата экскурсии">
	        </div>

	        <div class="SendetMsg" style="display:none">
	          Ваше сообщение успешно отправлено.
	        </div>

	        <p class="win-forms-policy">
	          Заполняя данную форму вы соглашаетесь с <a href="<?echo get_the_permalink(1312); ?>">политикой
	            конфиденциальности</a>
	        </p>

	        <button type="submit" class="newButton new_send_btn" data-formmsg="Заявка на школьный тур"
	          data-formid="school_tour_form">Отправить заявку</button>
	      </form>
	    </div>
	  </div>
	</div>
<!-- ======================================================== -->

<!-- Окно - НУЖНА ПОМОЩЬ В ПОДБОРЕ ШКОЛЬНОГО ТУРА -->
	<div style="display: none;">
	  <div class="box-modal box-modal-new" id="help-school-tour-modals"> 
	    <div class="box-modal_close box-modal_close_new arcticmodal-close"></div>
	    <img src="<?php bloginfo("template_url")?>/images/scooll-modal.jpg" loading="lazy" />
	    <div class="windows_form">
	      <h2>Нужна помощь в подборе школьного тура?</h2>
	      <p class="subtitle">Заполните форму и наши менеджеры свяжутся с Вами и помогут подобрать подходящий вариант</p> 
	      <form id="help_school_tour_form">
	        <div class="headen_form_blk">
						<input type="hidden" name = "form_name" data-valuem = "Название формы" value = "Нужна помощь в подборе школьного тура">
						<input type="hidden" name = "page_lnk" data-valuem = "Адрес страницы" value = "<? echo (is_home())?"https://www.turcentr46.ru/":get_the_permalink()?>">
	          <input type="tel" name="tel" required data-valuem = "Телефон*" placeholder="Телефон*">
	          <input type="number" name="mest" required data-valuem = "Количество мест*" placeholder="Количество мест*">
	          <input type="text" name="date" data-valuem = "Дата экскурсии" placeholder="Дата экскурсии">
	        </div>

	        <div class="SendetMsg" style="display:none">
	          Ваше сообщение успешно отправлено.
	        </div>

	        <p class="win-forms-policy">
	          Заполняя данную форму вы соглашаетесь с <a href="<?echo get_the_permalink(1312); ?>">политикой
	            конфиденциальности</a>
	        </p>

	        <button type="submit" class="newButton new_send_btn" data-formmsg="Нужна помощь в подборе школьного тура"
	          data-formid="help_school_tour_form">Отправить заявку</button>
	      </form>
	    </div>
	  </div>
	</div>
<!-- ====================================================== -->

<!-- Окно - Универсальное-->
	<div style="display: none;">
	  <div class="box-modal box-modal-new" id="universalModal">
	    <div class="box-modal_close box-modal_close_new arcticmodal-close"></div>
	    <img loading="lazy" src="<?php bloginfo("template_url")?>/images/bus-arend-picture.jpg" />
	    <div class="windows_form">
	      <h2>Текст заголовка</h2>
	      <p class="subtitle"></p>
	      <form id="bus_arenda_bus">
	        <div class="headen_form_blk">
						<input type="hidden" name = "form_name" data-valuem = "Название формы" value = "Заявка на аренду автобуса">
						<input type="hidden" name = "page_lnk" data-valuem = "Адрес страницы" value = "<? echo (is_home())?"https://www.turcentr46.ru/":get_the_permalink()?>">
	          <input required type="tel" name="tel" data-valuem = "Телефон" placeholder="Телефон*">
	          <input required type="number" name="mest"data-valuem = "Количество мест" placeholder="Количество мест*">
	          <input required type="text" name="date" data-valuem = "Дата подачи" placeholder="Дата подачи">
	        </div>
	        <div class="SendetMsg" style="display:none">
	          Ваше сообщение успешно отправлено.
	        </div>
	        <p class="win-forms-policy">
	          Заполняя данную форму вы соглашаетесь с <a href="<?echo get_the_permalink(1312); ?>">политикой
	            конфиденциальности</a>
	        </p>
	        <button type="submit" class="newButton new_send_btn"
	          data-formmsg="Заявка на аренду автобуса" data-formid="bus_arenda_bus">Отправить заявку</button>
	      </form>
	    </div>
	  </div>
	</div>
<!-- =================================================================== -->

<!-- Окно - ЗАЯВКА НА ОБРАТНЫЙ ЗВОНОК -->
	<div style="display: none;">
	  <div class="box-modal box-modal-new" id="new_obr_zv">
	    <div class="box-modal_close box-modal_close_new arcticmodal-close"></div>
	    <img src="<?php bloginfo("template_url")?>/images/recall.jpg" loading="lazy" />
	    <div class="windows_form">
	      <h2>Текст заголовка</h2>
	      <p class="subtitle"></p>
	      <form id="recall_form">
	        <div class="headen_form_blk">
						<input type="hidden" name = "form_name" data-valuem = "Название формы" value = "Заявка на обратный звонок">
						<input type="hidden" name = "page_lnk" data-valuem = "Адрес страницы" value = "<? echo (is_home())?"https://www.turcentr46.ru/":get_the_permalink()?>">
	          <input type="text" name="name" data-valuem = "Имя" placeholder="Имя">
	          <input type="text" name="tel" data-valuem = "Телефон*" required placeholder="Телефон*">  
	        </div>

	        <div class="SendetMsg" style="display:none">
	          Ваше сообщение успешно отправлено.
	        </div>

	        <p class="win-forms-policy">
	          Заполняя данную форму вы соглашаетесь с <a href="<?echo get_the_permalink(1312); ?>">политикой
	            конфиденциальности</a>
	        </p>

	        <button type="submit" class="newButton new_send_btn"
	          data-formmsg="Заявка на обратный звонок" data-formid="recall_form">Отправить заявку</button>
	      </form>
	    </div>
	  </div>
	</div>
<!-- ======================================================= -->

<!-- Окно - Заявка на подбор -->
	<div style="display: none;">
	  <div class="box-modal newstyle-control" id="question-modal">
	    <div class="box-modal_close box-modal_close_new arcticmodal-close"></div>
	    <h2>Заявка на подбор</h2>

	    <form id="zayavka-na-podbor">

	    	<div class="SendetMsg" style="display:none">
	      	Ваше сообщение успешно отправлено.
	    	</div>
				<div class="headen_form_blk question-modal__form">
					<input type="hidden" name = "form_name" data-valuem = "Название формы" value = "Заявка на подбор">
					<input type="hidden" name = "page_lnk" data-valuem = "Адрес страницы" value = "<? echo (is_home())?"https://www.turcentr46.ru/":get_the_permalink()?>">

	      	<input type="hidden" name="page" data-valuem = "Заголовок в форме" value="<?php the_title();?>">
	      	<input required type="text" name="name" data-valuem = "Имя*" placeholder="Имя*">
	      	<input required type="tel" name="tel" data-valuem = "Teлефон*" placeholder="Teлефон*">
	      	<input required type="email" name="email" data-valuem = "Email*" placeholder="Email*">
	      	<input required type="number" name="adults" data-valuem = "Количество взрослых*" placeholder="Количество взрослых*">
	      	<input required type="number" name="children" data-valuem = "Количество детей*" placeholder="Количество детей*">
	      	<input required type="text" name="budget" data-valuem = "Бюджет*" placeholder="Бюджет*">

	      	<label class="container-checkbox policy-wrap">Согласен на обработку персональных данных
	        	<input type="checkbox" checked="checked" id="policy" name="policy">
	        	<span class="checkmark"></span>
	      	</label>

	      	<!-- <div class="newButton new_send_btn" data-formid = "zayavka-na-podbor">Отправить</div> -->
					<button type="button" class="new_send_btn newButton" data-formid = "zayavka-na-podbor" >Отправить</button>
				</div>
	    </form>
	  </div>
	</div>
<!-- ======================================================= -->


	<div style="display: none;">
	  <div class="box-modal" id="messgeModal">
	    <div class="box-modal_close arcticmodal-close">закрыть</div>
	    <div class="modalline" id="lineIcon">
	    </div>

	    <div class="modalline" id="lineMsg">
	    </div>
	  </div>
	</div>



	<div style="display: none;">
	  <div class="box-modal" id="viza-modal">
	    <img loading="lazy" class="formImg" src="<?php bloginfo("template_url")?>/images/viza-center.jpg" />
	    <div class="box-modal_close arcticmodal-close">закрыть</div>
	    <div class="modalline" id="lineIcon">
	      <h2>Нужна консультация по визе?</h2>
	      <form>
	        <label>Телефон</label>
	        <input type="text" id="phoneV" name="phone">
	        <label>Имя</label>
	        <input type="text" id="nameV" name="name">
	        <div class="sendPhoneV btn" onclick="yaCounter29416892.reachGoal('ZakRecall');">Отправить</div>
	        <span class="phoneSendRez"></span>
	      </form>
	    </div>

	    <div class="modalline" id="lineMsg">
	    </div>
	  </div>
	</div>


	<div style="display: none;">
	  <div class="box-modal" id="formModal">
	    <div class="box-modal_close arcticmodal-close">закрыть</div>
	    <div class="formArctikBlk">
	      <h4>Оставьте заявку и получите приятный сюрприз при покупке тура</h4>
	      <form>
	        <input type="text" name="clname" placeholder="Имя*" id="clname" value="">
	        <input type="text" name="clphone" placeholder="Телефон*" class="phoneMasc" id="clphone" value=""><br />
	        <input onclick="yaCounter29416892.reachGoal('doZ');" type="button" class="btn btnRed" id="azFormSubmit"
	          value="Отправить"> <i class="sendSpiner fa fa-spinner fa-pulse fa-3x fa-fw fa-spinner-form"></i>
	      </form>
	    </div>
	  </div>
	</div>

	<!-- Старое окно на главной туры за границу -->
	<!-- 	<div style="display: none;">
		<div class="box-modal" id="zayavTurModal">
			<img  loading="lazy" class = "formImg" src = "<?php bloginfo("template_url")?>/images/zTur.jpg" />
			<div class="box-modal_close arcticmodal-close">закрыть</div>
			<div class = "formArctikBlk">
				<h4>Оставить заявку на подбор тура в <span class = 'tkName'></span></h4>
				<form>
					<input type = "text" name = "clname" placeholder = "Имя*" id = "clnamezt" value = "" >
					<input type = "text" name = "clphone" placeholder = "Телефон*" class = "phoneMasc" id = "clphonezt"  value = "" ><br/>
					<div class="callback-note">Нажимая на кнопку "Отправить", вы соглашаетесь с <a class="tdu" href="<?php echo get_permalink(1312);?>">условиями обработки персональных данных</a>.</div>
					<input onclick="yaCounter29416892.reachGoal('doZ');" type = "button" class = "btn1 newButton btnRed" id = "azFormSubmitZt"  value = "Отправить"> <i class="sendSpiner fa fa-spinner fa-pulse fa-3x fa-fw fa-spinner-form"></i>
				</form>
			</div>
		</div>
	</div> -->
	<!-- ==================================================================================================================================================== -->

	<!-- Окно Школьные туры - Туры Выходного дня -->
	<div style="display: none;">
	  <div class="box-modal" id="zayavTurMoreModal">
	    <img loading="lazy" class="formImg" src="<?php bloginfo("template_url")?>/images/zTur.jpg" />
	    <div class="box-modal_close arcticmodal-close">закрыть</div>
	    <div class="formArctikBlk">
	      <h4>Консультация по поездке в:<br /> <strong><span class='tkName'></span></strong></h4>
	      <form id="tury-vykhodnogo-dnya">
					<div class="SendetMsg" style="display:none"> 
        		Ваше сообщение успешно отправлено.
      		</div>
					<div class="headen_form_blk">
						<input type="hidden" name = "form_name" data-valuem = "Название формы" value = "Туры Выходного дня">
						<input type="hidden" name = "page_lnk" data-valuem = "Адрес страницы" value = "<? echo (is_home())?"https://www.turcentr46.ru/":get_the_permalink()?>">
	        	<input type="text" required name="clname" data-valuem = "Имя*" placeholder="Имя*">
	        	<input type="text" required name="clphone" data-valuem = "Телефон*" placeholder="Телефон*" class="phoneMasc"><br />
					</div>
	        	<input onclick="yaCounter29416892.reachGoal('duAutobTur');" type="button" class="newButton new_send_btn" value="Отправить" 
						data-formid = "tury-vykhodnogo-dnya">
	        <!-- <i class="sendSpiner fa fa-spinner fa-pulse fa-3x fa-fw fa-spinner-form"></i> -->
	      </form>
	    </div>
	  </div>
	</div>
<!-- ============================================================ -->

	<!-- ОКНО - Задать вопрос по туру -->
	<div style="display: none;">
	  <div class="box-modal box-modal-new box-modal-new__cust" id="zayavTurVuhModal">
	    <div class="box-modal_close box-modal_close_new arcticmodal-close"></div>
	    <img src="<?php bloginfo("template_url")?>/images/sc-tur2.jpg" loading="lazy" />
	    <div class="windows_form">
	      <h2>Текст заголовка</h2>
	      <h3><?php the_title();?></h3>
	      <p class="subtitle"></p>
	      <form id="consult_form">
	        <div class="headen_form_blk">
						<input type="hidden" name = "form_name" data-valuem = "Название формы" value = "Задать вопрос по туру">
						<input type="hidden" name = "page_lnk" data-valuem = "Адрес страницы" value = "<? echo (is_home())?"https://www.turcentr46.ru/":get_the_permalink()?>">
	          <input type="text" name="name" data-valuem = "Имя" placeholder="Имя">
	          <input type="tel" name="tel" data-valuem = "Телефон*" required placeholder="Телефон*">
	        </div>

	        <div class="SendetMsg" style="display:none">
	          Ваше сообщение успешно отправлено.
	        </div>

	        <p class="win-forms-policy">
	          Заполняя данную форму вы соглашаетесь с <a href="<?echo get_the_permalink(1312); ?>">политикой
	            конфиденциальности</a>
	        </p>

	        <button type="submit" class="newButton new_send_btn"
	          data-formmsg="Задать вопрос по туру: <?php the_title();?>" data-formid="consult_form">Отправить
	          заявку</button>
	      </form>
	    </div>
	  </div>
	</div>
<!-- ===================================================== -->


<!-- ОКНО ОПЛАТЫ ЭКСКУРСИОННЫЙ NEW -->
	<script>
function showSuccessfulPurchase(order) {
  var jqXHR = jQuery.post(
    allAjax.ajaxurl, {
      action: 'universalSend',
      nonce: allAjax.nonce,
      tel: jQuery("#pay_form input[name=tel]").val(),
      mest: "1",
      dataPod: "",
      name: jQuery("#pay_form input[name=name]").val(),
      price: order.formattedAmount,
      datar: jQuery("#pay_form input[name=data]").val(),
      docnumber: jQuery("#pay_form input[name=number]").val(),
      formmsg: 'Поступила оплата за тур: ' + jQuery("#payTourModal1 h3").text(),
    }

  );


  jqXHR.done(function(responce) {
    window.location.reload();
  });

  jqXHR.fail(function(responce) {
    alert("Произошла ошибка попробуйте позднее!");
  });
}

function showFailurefulPurchase(order) {
  alert("Оплата не проведена.");
}

function pageTourPay(price, name, phone, turname) {
  let bid = "<?php echo $wp_query->get_queried_object_id()."-".date("is").rand(100,200); ?>";
  ipayCheckout({
      amount: price,
      currency: 'RUB',
      order_number: bid,
      description: 'Оплата брони: ' + bid + ', Тур: ' + turname + ', плательщик: ' + name + ' телефон: ' + phone
    },
    function(order) {
      showSuccessfulPurchase(order)
    },
    function(order) {
      showFailurefulPurchase(order)
    });
}


jQuery(document).ready(function($) {
  $('.payTourOpen').click(function(e) {
    e.preventDefault();

    let price = jQuery('#selectwind option:selected').data("price");
    let name = jQuery("#pay_form input[name=name]").val();
    let tel = jQuery("#pay_form input[name=tel]").val();
    let turname = jQuery("#payTourModal1 h3").text();
    console.log(name);
    if (name == "") {
      jQuery("#pay_form input[name=name]").css("border-color", "red");
      return;
    }
    if ((tel == "") || (tel.indexOf("_") > 0)) {
      jQuery("#pay_form input[name=tel]").css("border-color", "red");
      return;
    }


    jQuery("#payTourModal1").arcticmodal("close");
    pageTourPay(price, name, tel, turname);

  });
});
	</script>


	<div style="display: none;">
	  <div class="box-modal box-modal-new box-modal-new__cust" id="payTourModal1">
	    <div class="box-modal_close box-modal_close_new arcticmodal-close"></div>
	    <img src="<?php bloginfo("template_url")?>/images/payTour-img.jpg" loading="lazy" />
	    <div class="windows_form">
	      <h2>Текст заголовка</h2>
	      <h3><?php the_title();?></h3>
	      <p class="subtitle"></p>

	      <form id="pay_form">
					<input type="hidden" name = "form_name" data-valuem = "Название формы" value = "Купить тур Online">
					<input type="hidden" name = "page_lnk" data-valuem = "Адрес страницы" value = "<? echo (is_home())?"https://www.turcentr46.ru/":get_the_permalink()?>">

			<div class="headen_form_blk">
				<select id="selectwind" data-valuem = "Название тура" class="select-window__compl-prc">
				<option selected data-price="<?php echo carbon_get_the_post_meta('price');?>">
					<?php echo carbon_get_the_post_meta('price');?> - <?php the_title();?> руб.
				</option>
				<?php	 $table = carbon_get_post_meta( get_the_ID(), 'complex_price' );
							if ( ! empty( $table ) ): ?>



				<?php foreach ( $table as $tr ): ?>

				<option data-price="<?php echo $tr['comprice'] ?>">
					<?php echo $tr['comprice'] ?> руб.
					<?php echo $tr['clarif'] ?>
				</option>
				<?php endforeach; ?>
				<?php endif; ?>
				</select>


	        
				<input required type="text" data-valuem = "ФИО" name="name" placeholder="*ФИО">
				<input required type="tel" data-valuem = "Телефон" name="tel" placeholder="*Телефон">
				<input required type="text" data-valuem = "Дата рождения" name="data" placeholder="Дата рождения">
				<input required type="text" data-valuem = "Номер документа (паспорт или свидетельство)" name="number" placeholder="Номер документа (паспорт или свидетельство)">
	        </div>


	        <div class="SendetMsg" style="display:none">
	          Ваше сообщение успешно отправлено.
	        </div>

	        <p class="win-forms-policy">
	          Заполняя данную форму вы соглашаетесь с <a href="<?echo get_the_permalink(1312); ?>">политикой
	            конфиденциальности</a>
	        </p>

	        <button type="submit" class="newButton payTourOpen">Оплатить тур</button>
	      </form>
	    </div>
	  </div>
	</div>
	<!-- ========================================================================================================== -->

	<div style="display: none;">
	  <div class="box-modal" id="register-login-modal">
	    <div class="register-login-modal-form">
	      <div class="tabs">
	        <span class="tab">Вход</span>
	        <span class="tab">Регистрация</span>
	      </div>
	      <div class="tab_content">
	        <div class="tab_item">
	          <form action="">
	            <input type="text" placeholder="Логин" name="login">
	            <input type="password" placeholder="Пароль" name="password">
	            <input type="submit" value="Войти">
	          </form>
	        </div>
	        <div class="tab_item">
	          <form action="">
	            <input type="text" placeholder="Имя" name="name">
	            <input type="email" placeholder="E-mail" name="email">
	            <input type="tel" placeholder="Телефон" name="phone">
	            <div class="policy-wrap">
	              <input type="checkbox" checked="checked" id="policy" name="policy">
	              <label for="policy">Согласен на обработку персональных данных</label>
	            </div>
	            <input type="submit" value="Зарегистрироваться">
	          </form>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>

	<?php if (empty($_COOKIE["rbModal"])):?>

	<script>
jQuery(document).ready(function() {


  jQuery('#rbModal a').click(function() {
    var date = new Date();
    var minutes = 10; // <--- нужное количество минут
    date.setTime(date.getTime() + (minutes * 60 * 1000));

    var cookieOptions = {
      path: '/',
      expires: date
    };
    $.cookie("rbModal", "yes", cookieOptions);

  });

  jQuery('#rbModal').arcticmodal({
    afterClose: function(data, el) {

      var date = new Date();
      var minutes = 10; // <--- нужное количество минут
      date.setTime(date.getTime() + (minutes * 60 * 1000));

      var cookieOptions = {
        path: '/',
        expires: date
      };
      $.cookie("rbModal", "yes", cookieOptions);
    }

  });

  var windelay = 0;
  var wInterval = 12000;

  var wininterval = setInterval(function() {
    windelay += 1000;

    jQuery(".closeTime").html((wInterval - windelay) / 1000);
    if (windelay >= wInterval) {
      jQuery('#rbModal').arcticmodal("close");
      clearInterval(wininterval);
    }




  }, 1000);
});
	</script>
	<?php endif;?>
	<!--
	<div style="display: none;">
		<div class="box-modal" id="rbModal">
			<div class="box-modal_close arcticmodal-close">(<span class = "closeTime"></span>) закрыть</div>
			<img src = "<?php // bloginfo("template_url")?>/images/pupb/4st.jpg">
			<a class = "btn" href = "http://www.turcentr46.ru/4-baltijskie-stolicy-tur-v-pribaltiku-i-skandinaviyu/">Подробнее</a>
		</div>
	</div>
-->

	<script>
jQuery(document).ready(function() {
  setTimeout(function() {
    //	jQuery(".animTrigerMain").addClass("lizgnikAnim");
  }, 21000);



  jQuery(".vidcetClose").click(function() {
    var date = new Date();
    var minutes = 10; // <--- нужное количество минут
    date.setTime(date.getTime() + (minutes * 60 * 1000));

    var cookieOptions = {
      path: '/',
      expires: date
    };
    jQuery.cookie("minibanercl", "yes", cookieOptions);

    jQuery(".lizgnikAnim").css("opacity", "0.0");
    jQuery(".lizgnikAnim").css("left", "-382px");
    jQuery(".lizgnikAnim").hide();
  });


  setTimeout(function() {
    jQuery(".animTrigerMain1").addClass("vizaAnim");
  }, 7000);

  jQuery(".vidcetClose1").click(function() {
    var date = new Date();
    var minutes = 10; // <--- нужное количество минут
    date.setTime(date.getTime() + (minutes * 60 * 1000));

    var cookieOptions = {
      path: '/',
      expires: date
    };
    jQuery.cookie("minibanercl", "yes", cookieOptions);

    jQuery(".vizaAnim").css("opacity", "0.0");
    jQuery(".vizaAnim").css("z-index", "0");
    jQuery(".vizaAnim").css("display", "none");
    jQuery(".vizaAnim").hide();
  });

});
	</script>
	<!--
<div class = "animTrigerMain bus">
	<a href = "https://www.turcentr46.ru/turi-na-more/">
		<img src = "<?php bloginfo("template_url"); ?>/images/bus2.png" />
	</a>
</div>
-->

	<?php if (empty($_COOKIE["minibanercl"])):?>

	<!--
<div class = "animTrigerMain santaClaos">
<a href = "<?php //echo get_the_permalink(386);?>">
	<img src = "<?php //bloginfo("template_url"); ?>/images/sclaos.png" />
	</a>
</div>
-->

	<div class="animTrigerMain lizgnik">
	  <a href="<?php echo get_the_permalink(1216);?>">
	    <img loading="lazy" src="<?php bloginfo("template_url"); ?>/images/lignik.png" />
	  </a>
	  <img loading="lazy" class="vidcetClose" src="<?php bloginfo("template_url"); ?>/images/cancel.svg" />
	</div>


	<?php endif; ?>