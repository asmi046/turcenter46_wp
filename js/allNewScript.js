jQuery(document).ready(function($) { 
	
	var inputmask_reg1 = {"mask":"+7(999)999-99-99"};
	jQuery("input[type=tel]").inputmask(inputmask_reg1);
	
	
	$(".universalSendElem").click(function() { // Сохранение данных пользователя из личного кабинета
		console.log("222");
		var username = jQuery("#obrZvForm .username").val();
		
		if (username == "") {
			jQuery("#obrZvForm .username").css("background-color","red");
			return;
		}
		
		var userphone = jQuery("#obrZvForm .userphone").val();

		if (userphone == "") {
			jQuery("#obrZvForm .userphone").css("background-color","red");
			return;
		}
		
		var  jqXHR = jQuery.post(
			allAjax.ajaxurl,
			{
				action: 'universal_send',		
				nonce: allAjax.nonce,
				username: username,
				userphone: userphone,
			}
			
		);
		
		jqXHR.done(function (responce) {
			// jQuery(".messageInfo").hide();
			// jQuery("#msgSendMail").show();
			
			// jQuery("#new_obr_zv").arcticmodal("close");
			// jQuery("#info-msg-modal").arcticmodal();
			window.location.href = "https://www.mirturizma46.ru/spasibo-za-zayavku/";
		});
		
		jqXHR.fail(function (responce) {
			alert("Произошла ошибка попробуйте поздене!");
			console.log("ERROR!");
		});

	});
	
});
