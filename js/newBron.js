function changeQuotes(text){
	var el = document.createElement("DIV");
	el.innerHTML = text;
	for(var i=0, l=el.childNodes.length; i<l; i++){
		if (el.childNodes[i].hasChildNodes() && el.childNodes.length>1){
			el.childNodes[i].innerHTML = changeQuotes(el.childNodes[i].innerHTML);
		}
		else{
			el.childNodes[i].textContent = el.childNodes[i].textContent.replace(/\x27/g, '\x22').replace(/(\w)\x22(\w)/g, '$1\x27$2').replace(/(^)\x22(\s)/g, '$1»$2').replace(/(^|\s|\()"/g, "$1«").replace(/"(\;|\!|\?|\:|\.|\,|$|\)|\s)/g, "»$1");
		}
	}
	return el.innerHTML;
}

function formatDate(date) {  // Формат двты для вывода

  var dd = date.getDate();
  if (dd < 10) dd = '0' + dd;

  var mm = date.getMonth() + 1;
  if (mm < 10) mm = '0' + mm;

  var yy = date.getFullYear();
  if (yy < 10) yy = '0' + yy;

  return dd + '.' + mm + '.' + yy;
}

function clearBusBord () { //очистка полей по выбору нового рейса
	jQuery(".bus-passengers__item").removeClass("select");
	jQuery(".bus-passengers__item").removeClass("zanyato");
	jQuery(".bus-passengers__item").removeClass("sotrudnik");
	jQuery(".bus-passengers__item").removeClass("zanyatoVami1");	   
}

function mestoColoring(elem) { // ПОдкраска по цвету метса
	
	var mestoSelector = "";
	
	if (elem.mestoID[0] == "t")
		mestoSelector = "#bus-passengers_t";	
	else 
		mestoSelector = "#bus-passengers_o";
					
	var mstatus	= "";

	if (localStorage.getItem('userphone') == elem.bronflphone) 
		mstatus = "zanyatoVami1";
	else 
		mstatus = "zanyato";
					
	jQuery(mestoSelector).children('[data-meston="'+elem.mestoNum+'"]').addClass(mstatus);
	

}

function setWorkPanelType(wptype) { //Тип рабочей панели
	localStorage.setItem("workpaneltype", wptype);
	
	if (wptype == "newBron") {
		jQuery(".order-place").show();
		jQuery(".save-place").hide();
		jQuery(".delete-place").show();
	}
	
	if (wptype == "oldBron") {
		jQuery(".order-place").hide();
		jQuery(".save-place").show();
		jQuery(".delete-place").show();		
	}
}

function delWorkPanelElemen (melem) { //удаление беста с рабочей панели
	jQuery(melem).removeClass("select");
	jQuery(".workPanel #mesto"+jQuery(melem).data("meston")+jQuery(melem).data("naprch")).remove();
	
	var summ = 0;
	if (localStorage.getItem("bronSumm") != null)
		summ = parseInt(localStorage.getItem("bronSumm"));
			
	summ -= parseInt(localStorage.getItem('price'));
	localStorage.setItem('bronSumm', summ);
			
	jQuery(".itozSumm").html(localStorage.getItem('bronSumm'));
	
	if (jQuery(".workPanel .selected-places__item").length == 0 ) {
		localStorage.removeItem("workpaneltype");
		jQuery(".workPanel").html('<span class="tmpMsg">Выберите места на панели слева!</span>');
	}
}


function addToWorkPanel (melem) { //добавление беста на рабочую панель
	jQuery(".workPanel .tmpMsg").remove();
	
	var mestoNum = jQuery(melem).data("meston");
	var mestoNapr = jQuery(melem).data("naprch");
	
	var textNapr = "из Курска";
	var textClass = "bus-from";
	
	if (mestoNapr == "t") {
		textNapr = "из Курска";
		textClass = "bus-from";		
	} else {
		textNapr = "в Курск";
		textClass = "bus-to";	
	}
	
	
	var naprp_t_otpr = jQuery("#naprp-t-otpr-"+localStorage.getItem("naprid")).html();
	var naprp_t_prib = jQuery("#naprp-t-prib-"+localStorage.getItem("naprid")).html();
				
	
	var naprp_o_otpr = jQuery("#naprp-o-otpr-"+localStorage.getItem("naprid")).html();
	var naprp_o_prib = jQuery("#naprp-o-prib-"+localStorage.getItem("naprid")).html();	
	
	
	var mestoString = '<div id = "mesto'+mestoNum+mestoNapr+'" data-meston = "'+mestoNum+'" data-naprch = "'+mestoNapr+'" class="selected-places__item">';
	
						mestoString += '<div class="selected-places__item-head">';
								mestoString += '<div class="form-date__date-wrapper">'
									mestoString += '<div class="'+textClass+' bus-circle"></div>';
									mestoString += '<div class="form-date">';
										mestoString += '<div class="form-date__city">'+textNapr+'</div>';
										mestoString += '<div class="form-date__date">Место №'+mestoNum+'</div>';
									mestoString += '</div>';
								mestoString += '</div>';
									//mestoString += '<div class="selected-places__item-head-close"></div>';
								mestoString += '</div>';
								mestoString += '<div data-meston = "'+mestoNum+'" data-naprch = "'+mestoNapr+'" class="selected-places__item-form">';
									mestoString += '<div class="copypaste-block">';
										mestoString += '<div class="copypaste-block__copy" title="Копировать данные пользователя"></div>';
										mestoString += '<div class="copypaste-block__paste" title="Вставить данные пользователя"></div>';
									mestoString += '</div>';
									mestoString += '<form action="">';
										mestoString += '<input type="text" name="lastname" class = "lastname" placeholder="Фамилия">';
										mestoString += '<input type="text" name="name" class = "name" placeholder="Имя">';
										mestoString += '<input type="text" name="patron" class = "patron"  placeholder="Отчество">';
										mestoString += '<input type="text" name="born" class = "born" placeholder="Дата рождения">';
										mestoString += '<select name="document" class = "document" id="">';
											mestoString += '<option selected disabled>Тип документа</option>';
											mestoString += '<option value="Паспорт">Паспорт</option>';
											mestoString += '<option value="Свидетельство о Р.">Свидетельство о Р.</option>';
										mestoString += '</select>';
										mestoString += '<input type="text" name="number" class = "number" placeholder="Номер документа">';
										mestoString += '<input type="tel" name="phone" class = "phone" placeholder="Контактный телефон">';
										mestoString += '<select name="place-from" class="w-50 place-from" id="">';
											mestoString += '<option selected disabled>Пункт отправления</option>';
											
											if (mestoNapr == "t")
												mestoString += naprp_t_otpr;
											
											if (mestoNapr == "o")
												mestoString += naprp_o_otpr;
											
										mestoString += '</select>';
										mestoString += '<select name="place-to" class="w-50 place-to right" id="">';
											mestoString += '<option selected disabled>Пункт прибытия</option>';
											
											if (mestoNapr == "t")
												mestoString += naprp_t_prib;
											
											if (mestoNapr == "o")
												mestoString += naprp_o_prib;
											
										mestoString += '</select>';
										mestoString += '<textarea class="selected-places__item-comment" name="comment" placeholder="Комментарий"></textarea>';
									mestoString += '</form>';
								mestoString += '</div>';
							mestoString += '</div>';
							
		jQuery(".workPanel").append(mestoString);				
}

function add_hite_list(elem) {
	
	var mestoString = '<div data-hotelid = "'+elem.hotelId+'" data-hotelname = "'+elem.hotelName+'" data-hotelgeo = "'+elem.hotelGeo+'" data-monfName = "'+elem.monfName+'" data-photourl = "'+elem.hotelimg+'" class="hotel-number__item hotel-number__item-modal">';
		
		if (elem.hotelimg == "")
			mestoString += '<div class="hotel-number__item-photo" style="background-image: url(https://www.turcentr46.ru/wp-content/themes/MirTurizma/images/hotel-beep.svg); background-color: #ebebeb; background-size: 70%;"></div>';
		else 
			mestoString += '<div class="hotel-number__item-photo" style="background-image: url('+elem.hotelimg+'); background-color: #777777;"></div>';
		
		mestoString += '<div class="hotel-number__item-content">';
			mestoString += '<div class="hotel-number__item-title">'+elem.hotelName+'</div>';
			mestoString += '<div class="hotel-number__item-descr">';
				mestoString += '<a target="_blank" href = "'+elem.hotellnk+'">Подробнее</a>';
			mestoString += '</div>';
		mestoString += '</div>';
		mestoString += '</div>';

	jQuery(".choice-wrapper__hotel").append(mestoString);	
}

function add_number_list (elem) {
		var realPrice = 0;
		
		var selElemMunf = jQuery(".choice-wrapper__hotel .hotel-number__item_select").data("monfname");
		console.log(selElemMunf);

		if (selElemMunf == "june") realPrice = elem.june;
		if (selElemMunf == "jule") realPrice = elem.jule;
		if (selElemMunf == "august") realPrice = elem.august;
		if (selElemMunf == "september") realPrice = elem.september;
		
		realPrice-= (parseInt(localStorage.getItem("price"))*2);
			
		mestoString = '<div class="choice-wrapper__item" data-price ="'+realPrice+'" data-hotelname = "'+changeQuotes(elem.hotelName)+'" data-numbertype = "'+elem.numberType+'" >';
			
			mestoString += '<span class="qty-selector"> </span>';
			
			mestoString += '<span class="qty-number">';
				mestoString += '<span class="hotel_name">'+elem.hotelName+"</span>";
				mestoString += '<span class="hotel_number_t">'+elem.numberType+"</span>";
			mestoString += '</span>';
			
			mestoString += '<span class="choice-wrapper__price"><span class = "realNumberPrice">'+realPrice+'</span> <br/>руб./ч.</span>';
			
			mestoString += '<span class="choice-wrapper__count">';
				mestoString += '<span>Человек</span>';
				mestoString += '<input type="number" class="piple_count" name="piple_count" value = "1" min="1" max="10">';
			mestoString += '</span>';
			
		mestoString += '</div>';
		
		jQuery(".choice-wrapper__number").append(mestoString);	
}


function checFormNewV (elem){ //Проверка полей одной формы на рабочей панели
			errs = false;
				
				if (jQuery(elem).find("form").children(".lastname").val() == ""){
					errs = true;
					
					jQuery(elem).find("form").children(".lastname").css("background-color","#f9d6c5");
				}
				
				if (jQuery(elem).find("form").children(".name").val() == ""){
					errs = true;
					
					jQuery(elem).find("form").children(".name").css("background-color","#f9d6c5");
				}
				
				if (jQuery(elem).find("form").children(".patron").val() == ""){
					errs = true;
					
					jQuery(elem).find("form").children(".patron").css("background-color","#f9d6c5");
				}
	
				if (jQuery(elem).find("form").children(".number").val() == ""){
					errs = true;
					
					jQuery(elem).find("form").children(".number").css("background-color","#f9d6c5");
				}
				
				if (jQuery(elem).find("form").children(".phone").val() == ""){
					errs = true;
					jQuery(elem).find("form").children(".phone").css("background-color","#f9d6c5");
				}
				
				if (jQuery(elem).find("form").children(".place-from").val() == ""){
					errs = true;
					jQuery(elem).find("form").children(".place-from").css("background-color","#f9d6c5");
				}
				
				if (jQuery(elem).find("form").children(".place-to").val() == ""){
					errs = true;
					jQuery(elem).find("form").children(".place-to").css("background-color","#f9d6c5");
				}
				
				if (errs) jQuery(elem).parent(".selected-places__item").css("background-color","#f9d6c5");
				
				//console.log(jQuery(elem).find("form").children(".lastname"));
				return errs;
				
		}


//--------------------------------

function toStep() {
	mainStep = Number(localStorage.getItem("step"));
	console.log(mainStep);
	jQuery(".stepBoxes").hide();
	jQuery(".step"+mainStep).show();
	
	jQuery(".travel-sea__number-item").removeClass("active");
	jQuery(".stepIndex"+mainStep).addClass("active");
	
	
	if (mainStep == 1) {
		jQuery(".where-block__item").removeClass("active");
		jQuery(".where-block__item[data-punkt='"+localStorage.getItem("punktPrib")+"']").addClass("active");
		return;
	}
	
	if (mainStep == 2) {
		jQuery(".when-item").hide();
		jQuery(".napravlenie"+localStorage.getItem("naprid")).css("display","flex");
		return;
	}
	
	if (mainStep == 3) {
		return;
	}
	
	if (mainStep == 4) {
		return;
	}
	
	if (mainStep == 5) {
		return;
	}
	
}

function stepChec() {
	mainStep = Number(localStorage.getItem("step"));
	
	if (mainStep == 1) {
		if (jQuery(".where-block__item.active").length == 0)
		{
			alert("Выберите пункт назначения!");
			return false;
		}
		else
		{
			return true;
		}
	}
	
	if (mainStep == 2) {
	
		return;
	}
	
	if (mainStep == 3) {
	
		return;
	}
	
	if (mainStep == 4) {
	
		return;
	}
	
	if (mainStep == 5) {
	
		return;
	}
}


jQuery(document).ready(function($) { 
	mainStep = Number(localStorage.getItem("step"));
	
	if (mainStep == undefined) localStorage.setItem("step", 1)
	
	toStep();
	
	//-----Выбираем пункт и id рейса
	jQuery(".where-block__item").click(function(e){
		localStorage.setItem("punktPrib",jQuery(this).data("punkt") );
		localStorage.setItem("start",jQuery(this).data("star") );
		localStorage.setItem("end",jQuery(this).data("end") );
		localStorage.setItem("naprid",jQuery(this).data("naprid") );
	});
	
	jQuery(".prevStep").click(function(e){
		e.preventDefault();		
		mainStep = Number(localStorage.getItem("step"));
		if (mainStep == 1) return;
		
		localStorage.setItem("step",--mainStep);
		toStep();
					
	});
	
	jQuery(".nextStep").click(function(e){
		e.preventDefault();
		mainStep = Number(localStorage.getItem("step"));
		if (mainStep == 5) return;
		if (stepChec()) { 
			localStorage.setItem("step",++mainStep);
			toStep();
		}			
	});
	
	jQuery(".where-block__item").click(function(e){
		 jQuery(".where-block__item").removeClass("active");
		 jQuery(this).addClass("active");
	});
	
	jQuery(".dayButton").click(function(e){
		 jQuery(".dayButton").removeClass("active");
		 jQuery(this).addClass("active");
	});
	
});

//--------------------------------



jQuery(window).scroll(function () { 
	if (jQuery(this).scrollTop() > 120) {
		  jQuery('header').addClass("header-fixed");
		} else {
		  jQuery('header').removeClass("header-fixed");;
		}
});

jQuery(document).ready(function($) { 
	
	localStorage.removeItem("bronSumm");
	localStorage.removeItem("punktPrib");
	localStorage.removeItem("price");
	
	localStorage.setItem('usermail', "asmi046@gmail.com");
	localStorage.setItem('userphone', jQuery(".phone").html());
	
	var inputmask_reg = {"mask":"+7(999)999-99-99"};
	jQuery("#userphone").inputmask(inputmask_reg);
	
	$("#napravlenie_select").change(function() {
		
			var selelement = jQuery(this).find("option:selected");
		
			var puncts = jQuery(selelement).data("prompunkts");
			
			localStorage.setItem('start', jQuery(selelement).data("naprstart"));
			localStorage.setItem('end', jQuery(selelement).data("naprend"));
			localStorage.setItem('prompunkts', puncts);
			
			localStorage.setItem('naprid', jQuery(this).find("option:selected").val());
			localStorage.removeItem('bronSumm');
			
			var pprib = '<div class="destination-item">';
					pprib += '<div class="destination-item__circle"></div>';
					pprib += '<div class="destination-item__city">'+jQuery(selelement).data("naprstart")+'</div>';
				pprib += '</div>';
				
			var punctsArray = puncts.split(";");
			
			for (i = 0; i<punctsArray.length; i++) {
				
				pprib += '<div class="destination-item">';
					pprib += '<div class="destination-item__circle"></div>';
					pprib += '<div class="destination-item__city">'+punctsArray[i]+'</div>';
				pprib += '</div>';

			}
			
			pprib += '<div class="destination-item">';
					pprib += '<div class="destination-item__circle"></div>';
					pprib += '<div class="destination-item__city">'+jQuery(selelement).data("naprend")+'</div>';
			pprib += '</div>';
			
			
			jQuery('.destination .no-activ-elem').hide(); 
			jQuery('.seat-bus .no-activ-elem').show(); 
			
			
		jQuery('.destination-point').html(pprib);	
		
		var  jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'get_reises',		
				nonce: allAjax.nonce,	
				naprid:jQuery(this).val(),	
			}
			
		);
		
		
		jqXHR.done(function (responce) {
			var qrez = JSON.parse(responce);
			
			jQuery("#reis_select .cleared").remove();
			
			for (i =0; i<qrez.length; i++) {
				jQuery("#reis_select").append('<option class = "cleared"'+
											' data-start_to_date = "'+qrez[i].start_to_date+'" '+
											' data-prib_to_date = "'+qrez[i].prib_to_date+'" '+
											' data-start_out_date = "'+qrez[i].start_out_date+'" '+
											' data-prib_out_date = "'+qrez[i].prib_out_date+'" '+
											' data-price = "'+qrez[i].price+'" '+
											
											' data-t1 = "'+qrez[i].t1+'" '+
											' data-t2 = "'+qrez[i].t2+'" '+
											' data-t3 = "'+qrez[i].t3+'" '+
											' data-t4 = "'+qrez[i].t4+'" '+
											
											' value="'+qrez[i].ID+'">Рейс № '+qrez[i].ID+' - '+qrez[i].start_to_date+' </option>');
			}
			
			
			jQuery('#reis_select option').removeAttr("selected");
			jQuery('#reis_select').niceSelect('update');
			jQuery('.destination-point').html(pprib);
		});
		
		jqXHR.fail(function (responce) {
			console.log("ERROR!");
		});
		
		
		
	});
	
	$("#reis_select").change(function() {
		var selelement = jQuery(this).find("option:selected");
		
		localStorage.removeItem('bronSumm');
		
		localStorage.setItem('start_to_date', jQuery(selelement).data("start_to_date"));
		localStorage.setItem('prib_to_date', jQuery(selelement).data("prib_to_date"));
		localStorage.setItem('start_out_date', jQuery(selelement).data("start_out_date"));
		localStorage.setItem('prib_out_date', jQuery(selelement).data("prib_out_date"));
		
		localStorage.setItem('price', jQuery(selelement).data("price"));
		
		localStorage.setItem('t1', jQuery(selelement).data("t1"));
		localStorage.setItem('t2', jQuery(selelement).data("t2"));
		localStorage.setItem('t3', jQuery(selelement).data("t3"));
		localStorage.setItem('t4', jQuery(selelement).data("t4"));
		
		localStorage.setItem('reisid', jQuery(this).find("option:selected").val());
		
		
		
		
		jQuery("#start_to_date_msg").html( formatDate(new Date(jQuery(selelement).data("start_to_date"))));
		jQuery("#start_out_date_msg").html( formatDate(new Date(jQuery(selelement).data("start_out_date"))));
		
		jQuery("#form-date__date_to").html( formatDate(new Date(jQuery(selelement).data("start_to_date"))));
		jQuery("#form-date__date_out").html( formatDate(new Date(jQuery(selelement).data("start_out_date"))));
		
		jQuery(".workPanel").html("<span class = 'tmpMsg'>Выберите места на панели слева!</span>");
		
		var  jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'get_reises_rassadka',		
				nonce: allAjax.nonce,	
				naprid:localStorage.getItem("naprid"),
				reisid:localStorage.getItem("reisid"),	
			}
			
		);
		
		
		jqXHR.done(function (responce) {
			var qrez = JSON.parse(responce);
			
			clearBusBord();
			
			if (localStorage.getItem('t1') == 1) {
				jQuery("#bus-passengers_t").children('[data-meston="1"]').addClass("sotrudnik");
				jQuery("#bus-passengers_o").children('[data-meston="1"]').addClass("sotrudnik");
			}		

			if (localStorage.getItem('t2') == 1) {
				jQuery("#bus-passengers_t").children('[data-meston="2"]').addClass("sotrudnik");
				jQuery("#bus-passengers_o").children('[data-meston="2"]').addClass("sotrudnik");
			}		


			if (localStorage.getItem('t3') == 1) {
				jQuery("#bus-passengers_t").children('[data-meston="3"]').addClass("sotrudnik");
				jQuery("#bus-passengers_o").children('[data-meston="3"]').addClass("sotrudnik");
			}		


			if (localStorage.getItem('t4') == 1) {
				jQuery("#bus-passengers_t").children('[data-meston="4"]').addClass("sotrudnik");
				jQuery("#bus-passengers_o").children('[data-meston="4"]').addClass("sotrudnik");
			}					
			
			for (i =0; i<qrez.length; i++) { 
				mestoColoring(qrez[i]);	
			}
			
			jQuery('.seat-bus .no-activ-elem').hide(); 
			console.log(qrez);
		});
		
		jqXHR.fail(function (responce) {
			console.log("ERROR!");
		});
	});
	
	
	
	jQuery(".destination-point").click(function(){ 
		jQuery(".destination-point").removeClass("destination-point_noselect");
	});
	
	$( ".destination-point" ).on( "click", ".destination-item", function() {
		
		if (jQuery(this).children( ".destination-item__city").html() == "Курск") return;
		
		localStorage.setItem("punktPrib",jQuery(this).children( ".destination-item__city").html() );
		
		console.log(jQuery(this).children( ".destination-item__city").html());
	
		
		jQuery(".destination-item__circle").removeClass("active");
		jQuery(this).children( ".destination-item__circle").addClass("active");
		
	});

	//Копирование введенных пользователем данных из формы Выбранные места
	$('body').on('click', '.copypaste-block__copy', function() {
		var lastname = $(this).parent().next().children('.lastname').val();
		var name = $(this).parent().next().find('.name').val();
		var patron = $(this).parent().next().find('.patron').val();
		var born = $(this).parent().next().find('.born').val();
		var number = $(this).parent().next().find('.number').val();
		var phone = $(this).parent().next().find('.phone').val();
		var comment = $(this).parent().next().find('.selected-places__item-comment').val();

		var copy_string = lastname + '|' + name + '|' + patron + '|' + born + '|' + number + '|' + phone + '|' + comment;
		localStorage.setItem("copy_user", copy_string);
		console.log(copy_string);
	});
	//Вставка скопированных данных
	$('body').on('click', '.copypaste-block__paste', function() {
		var copy_string = localStorage.getItem('copy_user');
		console.log(copy_string);
		if(copy_string != null) {

			var copy_array = copy_string.split('|');
			var lastname = copy_array[0];
			var name = copy_array[1];
			var patron = copy_array[2];
			var born = copy_array[3];
			var number = copy_array[4];
			var phone = copy_array[5];
			var comment = copy_array[6];
			$(this).parent().next().children('.lastname').val(lastname);
			$(this).parent().next().find('.name').val(name);
			$(this).parent().next().find('.patron').val(patron);
			$(this).parent().next().find('.born').val(born);
			$(this).parent().next().find('.number').val(number);
			$(this).parent().next().find('.phone').val(phone);
			$(this).parent().next().find('.selected-places__item-comment').val(comment);			
		}

	});
	
	
	$( ".selected-places" ).on( "click", ".selected-places__item-head", function() { // Добавление на рабочую панель
		jQuery(this).siblings().find("select").niceSelect();
		
		var pp_mask = {"mask":"+9(999)999-99-99"};
		jQuery(this).siblings().find(".phone").inputmask(pp_mask);
		
		var dr_mask = {"mask":"99.99.9999"};
		jQuery(this).siblings().find(".born").inputmask(dr_mask);
		
		console.log(jQuery(this).next().find("select"));
		if($(this).parent().hasClass('active')) {
			$(this).parent().removeClass('active');
		} else {
			$(this).parent().addClass('active');
		}
		$(this).siblings(".selected-places__item-form").slideToggle();
		
	});
	
	/*
	$(".selected-places__item-head").click(function() {
		if($(this).parent().hasClass('active')) {
			$(this).parent().removeClass('active');
		} else {
			$(this).parent().addClass('active');
		}
		$(this).next().slideToggle();
	});
	*/
	
	
	jQuery(".destination-item").click(function(){ 
		 
	}); 

	jQuery('.selected-places__item-head-close').click(function() {
		alert('123');
	});
	
	jQuery(".bus-passengers__item").click(function(){ 
		if (jQuery(this).hasClass("sotrudnik")) return;
		if (jQuery(this).hasClass("zanyato")) return;
		
		if (jQuery(this).hasClass("select")){
				delWorkPanelElemen(this);
				return;
		}
		
		if (jQuery(this).hasClass("zanyatoVami1")) {
			
			if (localStorage.getItem("workpaneltype") == "newBron") {
				alert("Вы выбираете места из другой брони! Для начала нажмите кнопку 'Удалить все места'");
				return;
			}
			
			setWorkPanelType("oldBron");
			
			
		} else {
			
			
			
			if (localStorage.getItem("punktPrib") == null) {
				jQuery(".messageInfo").hide();
				jQuery("#msgSelectPunkt").show();
				jQuery("#info-msg-modal").arcticmodal();
				return;
			}
			
			setWorkPanelType("newBron");
			
			
			addToWorkPanel(this);
			
			var summ = 0;
			if (localStorage.getItem("bronSumm") != null)
				summ = parseInt(localStorage.getItem("bronSumm"));
			
			summ += parseInt(localStorage.getItem('price'));
			localStorage.setItem('bronSumm', summ);
			
			jQuery(".itozSumm").html(localStorage.getItem('bronSumm'));
			
			jQuery(this).addClass("select");
		}
	});	


	jQuery(".order-place").click(function(){  
		
		if ((localStorage.getItem('bronSumm') == null)||(localStorage.getItem('bronSumm') == "0")||(localStorage.getItem('bronSumm') == "NaN")||(isNaN(localStorage.getItem('bronSumm')))) {
			jQuery(".messageInfo").hide();
			jQuery("#msgPayFail .h2").html("При бронировании произошла ошибка. Попробуйте еще раз!");
			jQuery("#msgPayFail").show();
			jQuery("#info-msg-modal").arcticmodal({
				afterClose: function(data, el) {
					window.location.href = "https://www.turcentr46.ru/bronirovanie-proezda-na-more/";
				}
				
			});
			return;
		}
		
		var nt = jQuery('.workPanel .selected-places__item-form[data-naprch=t]').length;
		var no = jQuery('.workPanel .selected-places__item-form[data-naprch=o]').length;
		
		
		priceupp = 0;
		if ((nt == 0)||(no == 0)) {	
			priceupp = ((parseInt(nt)+parseInt(no))*500);
			
			
		}
		
		var allElemObject = new Array();
		var fl_error = true;
		console.log(jQuery('.workPanel .selected-places__item-form'));
			jQuery.each(jQuery('.workPanel .selected-places__item-form'),
											function(i, val) {
							
												
												var oneElemObject = new Object();
												
												errs = checFormNewV(val);
												
												
											
												if (errs) {
													
													allElemObject = null;
													fl_error = false;
													return;
												}
												
												oneElemObject["reisID"] = localStorage.getItem('reisid');
												oneElemObject["mestoNum"] = jQuery(val).data("meston");
												
												var dicect = ""
												if (jQuery(val).data("naprch") == "t") {
													dicect += localStorage.getItem('start')+" - "+localStorage.getItem('end');
												} else {
													dicect += localStorage.getItem('end')+" - "+localStorage.getItem('start');
												}
												
												oneElemObject["direct"] = dicect; 
												oneElemObject["directID"] = localStorage.getItem('naprid'); 
												
												
												oneElemObject["F"] = jQuery(val).find("form").children(".lastname").val();
												oneElemObject["I"] = jQuery(val).find("form").children(".name").val();
												oneElemObject["O"] = jQuery(val).find("form").children(".patron").val();
												oneElemObject["pasportnum"] = jQuery(val).find("form").children(".number").val(); 
												oneElemObject["doctype"] = jQuery(val).find("form").children(".document").val();
												oneElemObject["phone"] = jQuery(val).find("form").children(".phone").val();
												oneElemObject["punkt"] = localStorage.getItem('punktPrib');
												oneElemObject["mestoOtpr"] = jQuery(val).find("form").children(".place-from").val(); 
												oneElemObject["mestoPrib"] = jQuery(val).find("form").children(".place-to").val(); 
												
												oneElemObject["coment"] = jQuery(val).find("form").children(".selected-places__item-comment").val();
												oneElemObject["agentmail"] = "mirturizma-kursk2@yandex.ru"; 
												oneElemObject["mestoID"] = jQuery(val).data("naprch")+jQuery(val).data("meston");
												oneElemObject["dataRod"] = jQuery(val).find("form").children(".born").val();
												
												
												oneElemObject["hotelName"] = jQuery("#hotel-number__item-title_itog").html()+" -> "+jQuery("#number_info").html();
												
												oneElemObject["managername"] = "";
												oneElemObject["fullprice"] = parseInt(localStorage.getItem('bronSumm'))+priceupp;
												oneElemObject["predoplata"] = 0;
												
												console.log(oneElemObject);
									
												allElemObject.push (oneElemObject); 
											}
									);
		
		console.log(allElemObject);
		
		if (!fl_error)
		{
			jQuery(".messageInfo").hide();
			jQuery("#msgSelectZerror").show();
			jQuery("#info-msg-modal").arcticmodal();
			
			
			return;
		}
		
		var  jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'new_bron_all',		
				nonce: allAjax.nonce,	
				allRezMesta:allElemObject,
				razmeshenie:"",
			}
			
		);
		
		
		jqXHR.done(function (responce) {
			//var qrez = JSON.parse(responce);
			
			jQuery(".messageInfo").hide();
			jQuery("#msgBronOk").show();
			
			if (priceupp>0)
				jQuery("#msgBronOk .message").html("Вы приобретаете билет в одну сторону. Cумма вашего заказа увеличивается на: "+((parseInt(nt)+parseInt(no))*500)+ " р.");
			
			
			jQuery("#msgBronOk .pay-booking").attr("href", jQuery("#msgBronOk .pay-booking").attr("href")+"?paybrid="+responce);
			
			jQuery("#info-msg-modal").arcticmodal({
				afterClose: function(data, el) {
					window.location.href = "https://www.turcentr46.ru/zabronirovano-mnoj/";
				}
				
			});
			
			
			
			console.log(responce);
		});
		
		jqXHR.fail(function (responce) {
			console.log("ERROR!");
		});
	});
	
	jQuery("#regUser").click(function(){  //Регистрация пользователя
		var username = jQuery("#username").val();
		
		if (username == "") {
			jQuery("#username").css("background-color","red");
			return;
		}
		
		var userphone = jQuery("#userphone").val();

		if (userphone == "") {
			jQuery("#userphone").css("background-color","red");
			return;
		}
		console.log(userphone);
		
		
		var policy = jQuery(".registerFeild .policy-wrap input[type=checkbox]").prop('checked');
		console.log(policy);
	
		if (policy == false) {
			jQuery(".registerFeild .policy-wrap  label").css("color","red");
			return;
		}
		
		var useremail = jQuery("#useremail").val();
		

		
		var  jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'register_user',		
				nonce: allAjax.nonce,	
				username:username,	
				userphone:userphone,	
				useremail:useremail,	
			}
			
		);
		
		
		jqXHR.done(function (responce) {
			jQuery(".registerFeild").html(jQuery(".trueRegister").html());
			console.log(responce);
		});
		
		jqXHR.fail(function (responce) {
			
			jQuery(".registerFeild .msgDell").remove();
			
			jQuery(".registerFeild").append(jQuery(".falseRegister").html());
			console.log("ERROR!");
		});
	});
	
	
		
	jQuery("#passRec").click(function(){  //Восстановление пароля
		
		
		var userphone = jQuery("#userphone").val();

		if (userphone == "") {
			jQuery("#userphone").css("background-color","red");
			return;
		}
	

		
		var  jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'pass_rec',		
				nonce: allAjax.nonce,	
				userphone:userphone,		
			}
			
		);
		
		
		jqXHR.done(function (responce) {
			jQuery(".registerFeild").html(jQuery(".trueRegister").html());
			console.log(responce);
		});
		
		jqXHR.fail(function (responce) {
			
			jQuery(".registerFeild .msgDell").remove();
			
			jQuery(".registerFeild").append(jQuery(".falseRegister").html());
			console.log("ERROR!");
		});
	});
	
	
	jQuery("#loginUser").click(function(){  // Авторизация пользователя

		
		var userphone = jQuery("#userphone").val();

		if (userphone == "") {
			jQuery("#userphone").css("background-color","red");
			return;
		}

		var userpass = jQuery("#userpass").val();
		
		if (userpass == "") {
			jQuery("#userpass").css("background-color","red");
			return;
		}
		
		var policy = jQuery(".registerFeild .policy-wrap input[type=checkbox]").prop('checked');
		console.log(policy);
	
		if (policy == false) {
			jQuery(".registerFeild .policy-wrap  label").css("color","red");
			return;
		}

		
		var  jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'login_user',		
				nonce: allAjax.nonce,	
				userphone:userphone,	
				userpass:userpass,	
			}
			
		);
		
		
		jqXHR.done(function (responce) {
			window.location.href = "https://www.turcentr46.ru/bronirovanie-proezda-na-more/";
			console.log(responce);
		});
		
		jqXHR.fail(function (responce) {
			
			jQuery(".registerFeild .msgDell").remove();

			jQuery(".registerFeild").append(jQuery(".falseRegister").html());
			console.log("ERROR!");
		});
	});
	
	jQuery(".delete-place").click(function(){
		jQuery("#bus-passengers_o .bus-passengers__item").removeClass("select");
		jQuery("#bus-passengers_t .bus-passengers__item").removeClass("select");
		
		jQuery.each(jQuery('.workPanel .selected-places__item-form'),
					function(i, val) {
							
							delWorkPanelElemen(val);
							
					}
				);
				
		localStorage.removeItem("bronSumm");
		jQuery(".itozSumm").html("0");
		
		jQuery("#number_info").html("");		
		jQuery("#number_price").html("");
		
		jQuery("#hotel-number__item-title_itog").html("Без проживания");		
		jQuery("#hotel-number__item-descr").html("Выберите гостиницу");		
	});
	
	
	$(".add-number").click(function() { // Загрузка отелей и открытие окна
		
		if (localStorage.getItem("punktPrib") == null) {
			jQuery(".messageInfo").hide();
			jQuery("#msgSelectPunkt").show();
			jQuery("#info-msg-modal").arcticmodal();
			return;
		}
		
		if (jQuery(".workPanel .selected-places__item").length <= 0) {
			jQuery(".messageInfo").hide();
			jQuery("#msgSelectMesto").show();
			jQuery("#info-msg-modal").arcticmodal();
			
			return;
		}
		
		
		if (jQuery("#number_price").html() != "") {
			var summ = 0;
			if (localStorage.getItem("bronSumm") != null)
				summ = parseInt(localStorage.getItem("bronSumm"));
			
			summ -= parseInt(jQuery("#number_price").html());
			localStorage.setItem('bronSumm', summ);
			
			jQuery(".itozSumm").html(localStorage.getItem('bronSumm'));
			
			jQuery("#hotel-number__item-photo_itog").css("background-image","url(https://www.turcentr46.ru/wp-content/themes/MirTurizma/images/hotel-beep.svg)");
			jQuery("#hotel-number__item-photo_itog").css("background-size","70%");
			jQuery("#hotel-number__item-title_itog").html("Без проживания");
			jQuery("#hotel-number__item-descr_itog").html("Выберите гостиницу");
			jQuery(".number_info").html("");
			jQuery(".number_price").html("");
		}
		
		var  jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'get_point_hotel_list',		
				nonce: allAjax.nonce,	
				hotelgeo:localStorage.getItem('punktPrib'),	
				reisid:localStorage.getItem('reisid'),	
			}
			
		);
		
		
		jqXHR.done(function (responce) {
			
			var elems = JSON.parse(responce);
			jQuery(".choice-wrapper__hotel").html("");	
			jQuery(".choice-wrapper__number").html("<span style = 'width: 100%; display: inline-block; text-align: center;'>Выберите отель</span>");
			
			
			
			
			for (i = 0; i<elems.length; i++) {
				add_hite_list(elems[i]);
			}
			
			console.log(JSON.parse(responce));
			$("#add-number-modal").arcticmodal();
		});
		
		jqXHR.fail(function (responce) {
			alert("Произошла ошибка попробуйте поздене!");
			console.log("ERROR!");
		});
		
	});
	
	
	$( ".choice-wrapper__hotel" ).on( "click", ".hotel-number__item-modal", function() { // Получение списка номеров выбранного отеля
		
		jQuery(".choice-wrapper__hotel .hotel-number__item").removeClass("hotel-number__item_select");
		jQuery(this).addClass("hotel-number__item_select");
		
		var  jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'get_hotel_number_list',		
				nonce: allAjax.nonce,	
				hotelid:jQuery(this).data("hotelid"),
				monfName:jQuery(this).data("monfName")
			}
			
		);
		
		
		jqXHR.done(function (responce) {
			
			jQuery(".choice-wrapper__number").html("");
			var elems = JSON.parse(responce);
			for (i = 0; i<elems.length; i++) {
				add_number_list(elems[i]);
			}
			console.log(JSON.parse(responce));
		});
		
		jqXHR.fail(function (responce) {
			alert("Произошла ошибка попробуйте поздене!");
			console.log("ERROR!");
		});
		
	});
	
	
	$( ".choice-wrapper__number" ).on( "click", ".qty-selector", function() { // Выбор номера
		console.log(111);
		
		if (jQuery(this).hasClass("qty-selector-active"))	
			jQuery(this).removeClass("qty-selector-active");
		else 
			jQuery(this).addClass("qty-selector-active");
		
		if (jQuery(this).parent().hasClass("choice-wrapper__hotel_select"))	
			jQuery(this).parent().removeClass("choice-wrapper__hotel_select");
		else 
			jQuery(this).parent().addClass("choice-wrapper__hotel_select");
	
		
	});
	
	
	$( ".choice-wrapper__number" ).on( "click", ".qty-number", function() { // Выбор номера
		console.log(111);
		
		if (jQuery(this).siblings(".qty-selector").hasClass("qty-selector-active"))	
			jQuery(this).siblings(".qty-selector").removeClass("qty-selector-active");
		else 
			jQuery(this).siblings(".qty-selector").addClass("qty-selector-active");
		
		if (jQuery(this).parent().hasClass("choice-wrapper__hotel_select"))	
			jQuery(this).parent().removeClass("choice-wrapper__hotel_select");
		else 
			jQuery(this).parent().addClass("choice-wrapper__hotel_select");
	
		
	});
	
	$("#add-number-btn").click(function() { // Добавление номеров к брони
		var summ = 0;
		var hotelName = "";
		var numbers = "";
		
		jQuery.each(jQuery('.choice-wrapper__number .choice-wrapper__item'),
				
				function(i, val) {
					if (jQuery(val).hasClass("choice-wrapper__hotel_select"))	
					{
						summ+= parseInt(jQuery(val).data("price"))*parseInt(jQuery(val).find(".piple_count").val()); 
						hotelName = jQuery(val).data("hotelname");
						numbers += jQuery(val).data("numbertype")+" $$ "+jQuery(val).find(".piple_count").val()+" | ";
					}
				}
		);
		
		if (summ <= 0) {
				$("#add-number-modal").arcticmodal("close");
				return;
		}
		
		console.log(summ);
		console.log(hotelName);
		console.log(numbers);
		
		jQuery("#hotel-number__item-photo_itog").css("background-image","url("+jQuery(".hotel-number__item_select").data("photourl")+")");
		jQuery("#hotel-number__item-photo_itog").css("background-size","cover");
		jQuery("#hotel-number__item-title_itog").html(hotelName);
		jQuery("#hotel-number__item-descr_itog").html("Цена проживания: <span class = 'selectHotelSumm'>"+summ+"</span> руб.");
		jQuery(".number_info").html(numbers);
		jQuery(".number_price").html(summ);
		
		
			var sum = 0;
			if (localStorage.getItem("bronSumm") != null)
				sum = parseInt(localStorage.getItem("bronSumm"));
			
			sum += summ;
			localStorage.setItem('bronSumm', sum);
		
		jQuery(".itozSumm").html(localStorage.getItem('bronSumm'));
		
		
		$("#add-number-modal").arcticmodal("close");
		
	});
	
	
	$(".ldRelogin").click(function() { // Выход из системы
		var  jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'relogin',		
				nonce: allAjax.nonce,	
				
			}
			
		);
		
		
		jqXHR.done(function (responce) {
			
			window.location.href = "https://www.turcentr46.ru/vxod/";
		});
		
		jqXHR.fail(function (responce) {
			alert("Произошла ошибка попробуйте поздене!");
			console.log("ERROR!");
		});
	});
	
	$("#saveUserData").click(function() { // Сохранение данных пользователя из личного кабинета
		
		if (jQuery("#username").val() == "") {
			jQuery("#username").css("background-color","#f9d6c5");
		}
		
		if (jQuery("#userpass").val() != "") {
			
			if (jQuery("#userpass").val() != jQuery("#userpass1").val()) {
				jQuery("#userpass").css("background-color","#f9d6c5");
				jQuery("#userpass1").css("background-color","#f9d6c5");
			}	
		}
		
		
		
		
		var  jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'update_user_data',		
				nonce: allAjax.nonce,
				userid:jQuery("#userid").val(),
				username: jQuery("#username").val(),
				userphone: jQuery("#userphone").val(),
				useremail: jQuery("#useremail").val(),
				userpass: jQuery("#userpass").val(),
			}
			
		);
		
		
		jqXHR.done(function (responce) {
			jQuery(".messageInfo").hide();
			jQuery("#msgSelectDataSave").show();
			jQuery("#info-msg-modal").arcticmodal();
			console.log(responce);
		});
		
		jqXHR.fail(function (responce) {
			alert("Произошла ошибка попробуйте поздене!");
			console.log("ERROR!");
		});
	});
	
	$(".delete-booking").click(function() { // удаление брони со страницы мои брони
		
		
		var  jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'delete_booking',		
				nonce: allAjax.nonce,
				bronid:jQuery(this).data("bronid"),
			}
			
		);
		
		
		jqXHR.done(function (responce) {
			location.reload();
		});
		
		jqXHR.fail(function (responce) {
			alert("Произошла ошибка попробуйте поздене!");
			console.log("ERROR!");
		});
	});
	
	
	$( "#may-booking-section" ).on( "click", ".selected-places-bron .open-booking", function() { // Выбор номера
		
		console.log(111); 
		
		if (jQuery(this).hasClass("selected-places-bron-activ"))
		{		
			jQuery(this).removeClass("selected-places-bron-activ");
			jQuery(this).parent().parent().siblings(".bron_in_page_info").hide();
		}
		else 
		{
			jQuery(this).addClass("selected-places-bron-activ");
			jQuery(this).parent().parent().siblings(".bron_in_page_info").show();
		}	
		
	});
	
	
	$(".chengeBron").click(function() { // Запрос на изменене брони вызов окна
		console.log("ddd");
		jQuery("#chengeBronWin .form_bron").html(jQuery(this).data("bronid"));
		jQuery("#chengeBronWin .form_mesta").html(jQuery(this).data("mesta"));
		jQuery("#chengeBronWin .form_reisid").html(jQuery(this).data("reisid"));
		jQuery("#chengeBronWin .form_data").html(jQuery(this).data("reisdata"));
		jQuery("#chengeBronWin .form_punkt").html(jQuery(this).data("punkt"));
	
		jQuery("#chengeBronWin").arcticmodal();
	});
	
	$("#formChengeBronBtn").click(function() { // Запрос на изменене брони отправка сообщения
		var  jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'bron_chenge_info',		
				nonce: allAjax.nonce,
				bronid:jQuery("#chengeBronWin .form_bron").html(),
				brondata:jQuery("#chengeBronWin .form_data").html(),
				bronpunkt:jQuery("#chengeBronWin .form_punkt").html(),
				
				
				reisid:jQuery("#chengeBronWin .form_reisid").html(),
				mesta:jQuery("#chengeBronWin .form_mesta").html(),
				/*
				bronpunkt:jQuery("#chengeBronWin .form_punkt").html(),
				bronpunkt:jQuery("#chengeBronWin .form_punkt").html(),
				*/
				
				bronmessage:jQuery("#chengeDescription").val(),
			}
			
		);
		
		
		jqXHR.done(function (responce) {
			jQuery("#chengeBronWin").arcticmodal("close");
			
			jQuery(".messageInfo").hide();
			jQuery("#msgBronChengeSend").show();
			jQuery("#info-msg-modal").arcticmodal();
		});
		
		jqXHR.fail(function (responce) {
			alert("Произошла ошибка попробуйте поздене!");
			console.log("ERROR!");
		});
	});
	
	$(".mobileStep").click(function() { // Открытие шага на мобильном
		var stepIndex = jQuery(this).data("stepindex");
		if (jQuery(this).hasClass("mobileStep-active"))
		{		
			jQuery(this).removeClass("mobileStep-active");
			jQuery("#section-step-"+stepIndex).hide();
		}
		else 
		{
			jQuery(this).addClass("mobileStep-active");
			jQuery("#section-step-"+stepIndex).show();
		}	
	});
	
	
	
	
});
