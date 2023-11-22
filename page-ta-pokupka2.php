<?php
/*
Template Name: Вход для турагентств - покупка билета v2.0
*/	
get_header(); ?>

	<?php
		$textPunkt = $_REQUEST["punct"];
	?>

	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.maskedinput.js"></script>
	<script type="text/javascript">
		
		function copyData(elem) {
					var indexEl = jQuery(elem).data("mestoid");
		
					var lastname = jQuery("#"+indexEl+"-rezform").find('.F').val();
					var name = jQuery("#"+indexEl+"-rezform").find('.I').val();
					var patron = jQuery("#"+indexEl+"-rezform").find('.O').val();
					var born = jQuery("#"+indexEl+"-rezform").find('.dataRod').val();
					var number = jQuery("#"+indexEl+"-rezform").find('.pasportnum').val();
					var phone = jQuery("#"+indexEl+"-rezform").find('.phone1').val();
					var comment = jQuery("#"+indexEl+"-rezform").find('.coment').val();

					var copy_string = lastname + '|' + name + '|' + patron + '|' + born + '|' + number + '|' + phone + '|' + comment;
					localStorage.setItem("copy_user", copy_string);
					console.log(copy_string);
				
				}
				
				function pastData(elem) {
					var indexEl = jQuery(elem).data("mestoid");
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
						jQuery("#"+indexEl+"-rezform").find('.F').val(lastname);
						jQuery("#"+indexEl+"-rezform").find('.I').val(name);
						jQuery("#"+indexEl+"-rezform").find('.O').val(patron);
						jQuery("#"+indexEl+"-rezform").find('.dataRod').val(born);
						jQuery("#"+indexEl+"-rezform").find('.pasportnum').val(number);
						jQuery("#"+indexEl+"-rezform").find('.phone1').val(phone);
						jQuery("#"+indexEl+"-rezform").find('.coment').val(comment);			
					}
						
				}
		
		var chengHotelFlag = false;
	
		jQuery(function($){
			jQuery(".phone1").mask("+9 (999) 999-9999");
			jQuery(".pasportnum").mask("99 99 999999");
			jQuery(".dataRod").mask("99.99.9999");
		});		
		
		function clearForm() {						
			jQuery("#mestoNum").val("");
			jQuery("#direct").val("");
			jQuery("#F").val("");
			jQuery("#I").val(""); 
			jQuery("#O").val(""); 
			jQuery("#pasportnum").val(""); 
			jQuery("#phone1").val("");
			jQuery("#punkt").val(""); 
			jQuery("#coment").val(""); 
		}
		
		function checForm (elem){
			errs = false;
				
				if (jQuery(elem).siblings(".F").val() == ""){
					errs = true;
					
					jQuery(elem).siblings(".F").css("background-color","#f9d6c5");
				}
				
				if (jQuery(elem).siblings(".I").val() == ""){
					errs = true;
					
					jQuery(elem).siblings(".I").css("background-color","#f9d6c5");
				}
				
				if (jQuery(elem).siblings(".O").val() == ""){
					errs = true;
					
					jQuery(elem).siblings(".O").css("background-color","#f9d6c5");
				}
	
				if (jQuery(elem).siblings(".pasportnum").val() == ""){
					errs = true;
					
					jQuery(elem).siblings(".pasportnum").css("background-color","#f9d6c5");
				}
				
				if (jQuery(elem).siblings(".phone1").val() == ""){
					errs = true;
					jQuery(elem).siblings(".phone1").css("background-color","#f9d6c5");
				}
				
				if (jQuery(elem).siblings(".punkt").val() == ""){
					errs = true;
					jQuery(elem).siblings(".punkt").css("background-color","#f9d6c5");
				}
				
				if (jQuery(elem).siblings(".dataRod").val() == ""){
					errs = true;
					jQuery(elem).siblings(".dataRod").css("background-color","#f9d6c5");
				}
				
				return errs;
				
		}
		
		function checFormNew (elem){
			errs = false;
				
				if (jQuery(elem).children(".F").val() == ""){
					errs = true;
					
					jQuery(elem).children(".F").css("background-color","#f9d6c5");
				}
				
				if (jQuery(elem).children(".I").val() == ""){
					errs = true;
					
					jQuery(elem).children(".I").css("background-color","#f9d6c5");
				}
				
				if (jQuery(elem).children(".O").val() == ""){
					errs = true;
					
					jQuery(elem).children(".O").css("background-color","#f9d6c5");
				}
	
				if (jQuery(elem).children(".pasportnum").val() == ""){
					errs = true;
					
					jQuery(elem).children(".pasportnum").css("background-color","#f9d6c5");
				}
				
				if (jQuery(elem).children(".phone1").val() == ""){
					errs = true;
					jQuery(elem).children(".phone1").css("background-color","#f9d6c5");
				}
				
				if (jQuery(elem).children(".punkt").val() == ""){
					errs = true;
					jQuery(elem).children(".punkt").css("background-color","#f9d6c5");
				}
				
				if (jQuery(elem).children(".dataRod").val() == ""){
					errs = true;
					jQuery(elem).children(".dataRod").css("background-color","#f9d6c5");
				}
				
				return errs;
				
		}
		
		function unselectElem(elmid) { // удаление элемента из списка
			
			if (confirm("Вы уверены что хотите удалить этот элемент?")) {
				console.log(jQuery('#'+jQuery(elmid).attr("id")+"-rezform").find(".midInSchem").val());
				
				if (jQuery('#'+jQuery(elmid).attr("id")+"-rez").hasClass("rsMestoRezerved")){	
					jQuery(".taMestoRezervForm i").show();
					jQuery.post("<?php bloginfo("template_url")?>/taAjax.php",
											{
											ajaxAction: "dellMesto", 
											mestoID:jQuery('#'+jQuery(elmid).attr("id")+"-rezform").find(".midInSchem").val(),
											reisID:jQuery('#'+jQuery(elmid).attr("id")+"-rezform").find(".reisID").val(),
											agentmail: jQuery('#'+jQuery(elmid).attr("id")+"-rezform").find(".agentmail").val(), 
											}, function (response, status, xhr) {
													if ( status == "error" ) {
													var msg = "Sorry but there was an error: ";
													alert( msg + xhr.status + " " + xhr.statusText );
													} else {
														//alert(response);
														mas = response.split("|");
														
														
														if (mas[1] == 1) {
							
															jQuery(".taMestoRezervForm i").hide();
															
														}
														
														alert(mas[0]);
													}
													
											});
				}
				jQuery(elmid).removeClass("selected");
				jQuery(elmid).removeClass("zanyatoVami");
				jQuery('#'+jQuery(elmid).attr("id")+"-rez").detach();
				jQuery('#'+jQuery(elmid).attr("id")+"-rezform").detach();
			} else {
			
			}
			
		}

		function togForm (elem) { // открытие формы для элемента
			
			
			
			
			
			jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".phone1").mask("+9 (999) 999-9999");
			jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".dataRod").mask("99.99.9999");
			
			
			if (jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".doctype").val() == "Паспорт")
				jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".pasportnum").mask("99 99 999999");
			else
			jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".pasportnum").unmask();
			//jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".pasportnum").mask("aa-** № 999999");
			
			//jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".pasportnum").mask("99 99 999999");
			
			
			jQuery.post("<?php bloginfo("template_url")?>/taAjax.php",
										{
										ajaxAction: "getData", 
										mestoID:jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".midInSchem").val(),
										reisID:jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".reisID").val(),
										agentmail: jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".agentmail").val(), 
										}, function (response, status, xhr) {
												if ( status == "error" ) {
												var msg = "Sorry but there was an error: ";
												alert( msg + xhr.status + " " + xhr.statusText );
												} else {
													//alert(response);
													mas = response.split("|");
													
													if (mas != ""){
														//jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".izmenitBtn").show();
														//jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".oformleniBtn").hide();
													
													
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".reisID").val(mas[0]);
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".mestoNum").val(mas[1]);
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".direct").val(mas[2]);
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".F").val(mas[3]);
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".I").val(mas[4]);
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".O").val(mas[5]);
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".pasportnum").val(mas[6]);
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".phone1").val(mas[7]);
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".punkt").val(mas[8]);
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".coment").html(mas[9]);
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".agentmail").val(mas[10]);
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".mestoOtpr").val(mas[11]);
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".mestoPrib").val(mas[14]);
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".doctype").val(mas[12]);
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".mestoID").val(mas[13]);
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".dataRod").val(mas[15]);
													
													
													if (!chengHotelFlag)
														jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".rfHotelName").html(mas[16]);
													
													}
													
													jQuery('#'+jQuery(elem).attr("id")+"-rezform").find(".usType").val(mas[17]);
													
													
													console.log(mas);
													
												}
												
										});
		
			jQuery('#'+jQuery(elem).attr("id")+"-rezform").toggle();
		}
		
		function changeDoc(elem) {
			if (jQuery(elem).val() == "Паспорт")
				jQuery(elem).siblings(".pasportnum").mask("99 99 999999");
			else
			jQuery(elem).siblings(".pasportnum").unmask();
			//jQuery(elem).siblings(".pasportnum").mask("aa-** № 999999");
		}
		
		function offormlZak(elem) { // резерв места
		
			//console.log(jQuery(elem).siblings(".mestoNum").val());
			
			errs = checForm(elem);
			console.log(errs);
			if (!errs) {
				jQuery(".taMestoRezervForm i").show();
				
				console.log("Вот: "+jQuery(elem).siblings(".midInSchem").val());
				
				jQuery.post("<?php bloginfo("template_url")?>/taAjax.php",
									{
									ajaxAction: "rezervMesto", 
									reisID: jQuery(elem).siblings(".reisID").val(), 
									mestoNum: jQuery(elem).siblings(".mestoNum").val(), 
									direct: jQuery(elem).siblings(".direct").val(), 
									directID: jQuery(elem).siblings(".directID").val(), 
									F: jQuery(elem).siblings(".F").val(), 
									I: jQuery(elem).siblings(".I").val(), 
									O: jQuery(elem).siblings(".O").val(), 
									pasportnum: jQuery(elem).siblings(".pasportnum").val(), 
									doctype: jQuery(elem).siblings(".doctype").val(), 
									phone: jQuery(elem).siblings(".phone1").val(), 
									punkt: jQuery(elem).siblings(".punkt").val(), 
									mestoOtpr: jQuery(elem).siblings(".mestoOtpr").val(), 
									mestoPrib: jQuery(elem).siblings(".mestoPrib").val(), 
									coment: jQuery(elem).siblings(".coment").val(), 
									agentmail: jQuery(elem).siblings(".agentmail").val(), 
									mestoID: jQuery(elem).siblings(".midInSchem").val(), 
									dataRod: jQuery(elem).siblings(".dataRod").val(), 
									
									}, function (response, status, xhr) {
											if ( status == "error" ) {
											var msg = "Sorry but there was an error: ";
											alert( msg + xhr.status + " " + xhr.statusText );
											jQuery(".taMestoRezervForm i").hide();
											} else {
												//alert(response);
												mas = response.split("|");
												
												if (mas[1] == 1) {
													jQuery(".taMestoRezervForm i").hide();
													console.log(jQuery(elem).siblings(".midInSchem").val());
													
													jQuery("#"+jQuery(elem).siblings(".midInSchem").val()).removeClass("selected");
													jQuery("#"+jQuery(elem).siblings(".midInSchem").val()).addClass("zanyatoVami");
													jQuery("#"+jQuery(elem).siblings(".midInSchem").val()+"-rezform").hide();
													jQuery("#"+jQuery(elem).siblings(".midInSchem").val()+"-rez").addClass("rsMestoRezerved");
												}
												
												alert(mas[0]);
												
											}
											
									});
			
			} else {
				alert("Не заполнены обязательные поля формы.");
			}
			
		}
		

		
		
		function updateZak(elem) { // Обновление информации 
			
			errs = checForm(elem);
			console.log(errs);
			if (!errs) {
				jQuery(".taMestoRezervForm i").show();
				
	
				jQuery.post("<?php bloginfo("template_url")?>/taAjax.php",
									{
									ajaxAction: "updateMesto", 
									reisID: jQuery(elem).siblings(".reisID").val(), 
									mestoNum: jQuery(elem).siblings(".mestoNum").val(), 
									direct: jQuery(elem).siblings(".direct").val(), 
									directID: jQuery(elem).siblings(".directID").val(), 
									F: jQuery(elem).siblings(".F").val(), 
									I: jQuery(elem).siblings(".I").val(), 
									O: jQuery(elem).siblings(".O").val(), 
									pasportnum: jQuery(elem).siblings(".pasportnum").val(), 
									doctype: jQuery(elem).siblings(".doctype").val(), 
									phone: jQuery(elem).siblings(".phone1").val(), 
									punkt: jQuery(elem).siblings(".punkt").val(), 
									mestoOtpr: jQuery(elem).siblings(".mestoOtpr").val(), 
									mestoPrib: jQuery(elem).siblings(".mestoPrib").val(), 
									coment: jQuery(elem).siblings(".coment").val(), 
									agentmail: jQuery(elem).siblings(".agentmail").val(), 
									mestoID: jQuery(elem).siblings(".midInSchem").val(), 
									dataRod: jQuery(elem).siblings(".dataRod").val(), 
									
									}, function (response, status, xhr) {
											if ( status == "error" ) {
											var msg = "Sorry but there was an error: ";
											alert( msg + xhr.status + " " + xhr.statusText );
											jQuery(".taMestoRezervForm i").hide();
											} else {
												//alert(response);
												mas = response.split("|");
												
												if (mas[1] == 1) {
													
													console.log(jQuery(elem).siblings(".midInSchem").val());
													//jQuery("#"+jQuery(elem).siblings(".midInSchem").val()).removeClass("selected");
													//jQuery("#"+jQuery(elem).siblings(".midInSchem").val()).addClass("zanyatoVami");
													jQuery("#"+jQuery(elem).siblings(".midInSchem").val()+"-rezform").hide();
													jQuery("#"+jQuery(elem).siblings(".midInSchem").val()+"-rez").addClass("rsMestoRezerved");
												}
												
												alert(mas[0]);
												jQuery(".taMestoRezervForm i").hide();
											}
											
									});
			
			} else {
				alert("Не заполнены обязательные поля формы.");
			}
			
		}
		
		jQuery(document).ready(function() {
			
				

		
			jQuery(".mesto").click(function(){
					
			
				if (jQuery(this).hasClass("zanyato")) return;
				if (jQuery(this).hasClass("selected")) return;
				if (jQuery(this).hasClass("uObozn")) return;
				if (jQuery(this).hasClass("sotrudnik")) return;
				
				
				if (chengHotelFlag)
					if (!confirm("Для места "+jQuery(this).data("mestonum")+" место проживания изменится! Продолжить?")) return;
				
				//if (jQuery(this).data("mestonum") <= 4) return;
				
				
				jQuery(this).addClass("selected");
				
				
				jQuery(".hText").hide();
				
				var stlbDir = ".rezt";
				jQuery(".oformlForm #mestoOtpr").html(jQuery("#naprp-t-otpr").html());
				jQuery(".oformlForm #mestoPrib").html(jQuery("#naprp-t-prib").html());
				
				console.log(jQuery(this).data("directchar") );
				
				if (jQuery(this).data("directchar") == "o")
				{
					stlbDir = ".rezo";
					jQuery(".oformlForm #mestoOtpr").html(jQuery("#naprp-o-otpr").html());
					jQuery(".oformlForm #mestoPrib").html(jQuery("#naprp-o-prib").html());	
				}
				
				rezervedClass = ""
				if (jQuery(this).hasClass("zanyatoVami")) rezervedClass = "rsMestoRezerved";
				
				jQuery(stlbDir).append("<div class = 'rsMesto "+rezervedClass+"' id = '"+jQuery(this).attr("id")+"-rez' data-mestoid = '"+jQuery(this).attr("id")+"'>"+
												"<div class = 'mestonum'>"+jQuery(this).data("mestonum")+"</div>"+
												"<div class = 'direct'>"+jQuery(this).data("direct")+"</div>"+
												"<div class = 'upr'><span class = 'copyData' data-mestoid = '"+jQuery(this).attr("id")+"' onclick = 'copyData(this)'>Копировать</span>   <span class = 'pastData' data-mestoid = '"+jQuery(this).attr("id")+"' onclick = 'pastData(this)'>Вставить</span><i class='fas fa-id-card' onclick = 'togForm("+jQuery(this).attr("id")+")' title = 'Данные клиента'></i> <i data-mestoid = '"+jQuery(this).attr("id")+"' data-mestonum = '"+jQuery(this).data("mestonum")+"' class='fas fa-ban' onclick = 'unselectElem("+jQuery(this).attr("id")+")' title = 'Удалить место'></i></div>"+
												"</div>");
				jQuery(".oformlForm .mestoNum").val(jQuery(this).data("mestonum"));
				jQuery(".oformlForm .direct").val(jQuery(this).data("direct")); 
				jQuery(".oformlForm .midInSchem").val(jQuery(this).attr("id")); 
				
				jQuery("#fullPrice").val(jQuery(this).data("fullprice")); 
				jQuery("#insPrice").val(jQuery(this).data("predoplata")); 
				
				
				
				jQuery(stlbDir).append("<div id = '"+jQuery(this).attr("id")+"-rezform' class = 'rsMestoForm'>"+jQuery(".oformlForm").html()+"</div>");
			});
			
			jQuery(".oformleniBtn").click( function(){ 
				
			});
			
				
				
				
				
		});
	</script>

		<div class = "line banerLine banerLineInPage">
		<div class = "allB">
			<div style = "display:block; background: url(<?php bloginfo('template_url');?>/images/b/<?php echo get_post_meta( $post->ID, "banerName", true)?>);" class = "b">
				<div class = "centerInLine">
					<!--
					<div class = "banerText">
					
					</div>
					-->
					
				</div>
			</div>
			
			
			<div class = "firstM">
				1 место</br>
				"Независимый рейтинг 2015г."
			</div>
			
		</div>
	</div>
	

	
	<div class = "line PageContent singlePage">
		<div class = "centerInLine">
			<div class="breadcrumb">
				<?php
				if(function_exists('bcn_display'))
				{
					bcn_display();
				}
				?>
			</div>
	
			<div class = "content ">
				
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<h1><?php the_title();?> (Шаг 3 из 3)</h1>
				
			
				<?php if (!isset($_COOKIE['taReg'])): ?>	
					<?php the_content();?>
					<h2>Данная страница доступна только зарегистрированным пользователям</h2>
				<?php else: ?>
					<?php
						
						
						function mestoZan($mesta, $n, $napr){
							foreach($mesta as $mesto){
								if (($mesto->mestoNum == $n)&&($napr === $mesto->direct))
								{
									if ($mesto->agentmail === $_COOKIE['taReg'])
										return "zanyatoVami";
									else return  "zanyato";
								}
							}
						}
						
						function titleFild($mesta, $n, $napr){
							foreach($mesta as $mesto){
								if (($mesto->mestoNum == $n)&&($napr === $mesto->direct))
								{
									if ($mesto->agentmail === $_COOKIE['taReg']){
										return "title = '".$mesto->F." ".$mesto->I." ".$mesto->O." Документ: ".$mesto->doctype." ".$mesto->pasportnum." ".$mesto->pasportinfo." ".$mesto->doctype." ".$mesto->punkt." ".$mesto->dataRod." Посадка: ".$mesto->mestoPos." Прибытие: ".$mesto->mestoPrib." Размещение: ".$mesto->hotelName."'";
										
									}
										
								}
							}
						}
						
						function fullpriceFild($mesta, $n, $napr){
							foreach($mesta as $mesto){
								if (($mesto->mestoNum == $n)&&($napr === $mesto->direct))
								{
									if ($mesto->agentmail === $_COOKIE['taReg']){
										return $mesto->fullprice;
									}
										
								}
							}
						}
						
						function predoplataFild($mesta, $n, $napr){
							foreach($mesta as $mesto){
								if (($mesto->mestoNum == $n)&&($napr === $mesto->direct))
								{
									if ($mesto->agentmail === $_COOKIE['taReg']){
										return $mesto->predoplata;
									}
										
								}
							}
						}
						
						function prozg($mesta, $n, $napr){
							foreach($mesta as $mesto){
								if (($mesto->mestoNum == $n)&&($napr === $mesto->direct))
								{
									if ($mesto->usType){
										return "*";
										
									}
										
								}
							}
						}
						
						function title_to_rs($mesta, $n, $napr){
							
							if (!isset($_COOKIE['taRegAdm'])) return "";

							foreach($mesta as $mesto){
								if (($mesto->mestoNum == $n)&&($napr === $mesto->direct))
								{
									return $mesto->F." ".$mesto->I." ".$mesto->O." \n\r".$mesto->phone;
					
								}
							}
						}
							
						
						
						$reisNum = $_REQUEST["reis"];
						$directID = $_REQUEST["napr"];
						global $wpdb;
						$reisinfo = $wpdb->get_results("SELECT * FROM `mt_br_reis` WHERE `ID` = ".$reisNum);
						$naprinfo = $wpdb->get_results("SELECT * FROM `mt_br_napr` WHERE `ID` = ".$reisinfo[0]->turtype);
						$mesta = $wpdb->get_results("SELECT * FROM `mt_br_mesto` WHERE `reisID` = ".$reisNum);
						
						function mestoRez($mesta, $n, $napr, $reisinfo){
								
								if ($n > 4) return "";
								
								$mmm = (array)$reisinfo[0];
								
								if (!empty($mmm["t".$n])) return " sotrudnik"; else return " sotrudnikNo";
								
											
						}
						
					?>
					
	<div id = "naprp-t-prib" style = "display:none;">
		<?php
			switch ($directID) {
				case 1: 
					include("posadkapuncts/punktsNapr1t-prib.php");
				break;
				
				case 2: 
					if (in_array($textPunkt, array("Лермонтово","Новомихайловский","Дедеркой","Лазаревское")))
						include("posadkapuncts/punktsNapr1t-prib.php");
					else
						// include("posadkapuncts/punktsNapr1t-prib.php");
						include("posadkapuncts/punktsNapr2t-prib.php");
				break;
				
				case 3: 
					include("posadkapuncts/punktsNapr3t-prib.php");
				break;
			}
		?>
	</div>
	
	<div id = "naprp-t-otpr" style = "display:none;">
		<?php
			switch ($directID) {
				case 1: 
					include("posadkapuncts/punktsNapr1t-otpr.php");
				break;
				
				case 2: 
					if (in_array($textPunkt, array("Лермонтово","Новомихайловский","Дедеркой","Лазаревское")))
						include("posadkapuncts/punktsNapr1t-otpr.php");
					else
					include("posadkapuncts/punktsNapr2t-otpr.php");
				break;
				
				case 3: 
					include("posadkapuncts/punktsNapr3t-otpr.php");
				break;
			}
		?>
	</div>
	
	<div id = "naprp-o-prib" style = "display:none;">
		<?php
			switch ($directID) {
				case 1: 
					include("posadkapuncts/punktsNapr1o-prib.php");
				break;
				
				case 2: 
					if (in_array($textPunkt, array("Лермонтово","Новомихайловский","Дедеркой","Лазаревское")))
						include("posadkapuncts/punktsNapr1o-prib.php");
					else
					include("posadkapuncts/punktsNapr2o-prib.php");
				break;
				
				case 3: 
					include("posadkapuncts/punktsNapr3o-prib.php");
				break;
			}
		?>
	</div>

	<div id = "naprp-o-otpr" style = "display:none;">
		<?php
			switch ($directID) {
				case 1: 
					include("posadkapuncts/punktsNapr1o-otpr.php");
				break;
				
				case 2: 
					if (in_array($textPunkt, array("Лермонтово","Новомихайловский","Дедеркой","Лазаревское")))
						include("posadkapuncts/punktsNapr1o-otpr.php"); 
					else
						include("posadkapuncts/punktsNapr2o-otpr.php");
				break;
				
				case 3: 
					include("posadkapuncts/punktsNapr3o-otpr.php");
				break;
			}
		?>
	</div>	
					<div class = "avtobusWriper">
						

						<?php 
							// if (($directID == 1) || ($directID == 3))
							if (($directID == 1 && $reisinfo[0]->bus_type === "bus18") || ($directID == 3))
								get_template_part('template-parts/rassadka', "bus18", array("mesta" => $mesta, "naprinfo" => $naprinfo, "textPunkt" => $textPunkt, "reisinfo" => $reisinfo));
							else
								get_template_part('template-parts/rassadka', "bus53", array("mesta" => $mesta, "naprinfo" => $naprinfo, "textPunkt" => $textPunkt, "reisinfo" => $reisinfo));
								// get_template_part('template-parts/rassadka', "bus49", array("mesta" => $mesta, "naprinfo" => $naprinfo, "textPunkt" => $textPunkt, "reisinfo" => $reisinfo));
							
						?>
						
						
						
						<div class = "rezervTable raspisanie">
							<h2>Выбранные места</h2>
							<div class = "rezervSession rezt">
								<span class = "hText">Выберите места для покупки</span>
							</div>
							<div class = "rezervSession rezo">
							</div>
						</div>
						
						<?php
							$registred = $wpdb->get_results("SELECT * FROM `mt_br_user` WHERE `mail`='".$_COOKIE['taReg']."' ", ARRAY_A);
							
							if ($registred[0]["moderate"] == 10)
							{
						?>
						
							<h2 style = "display: inline-block;">Цена брони</h2>
							<div class = "priceLine">	
								<form>
									<label>Полная цена брони</label>
									<input name = "fullPrice" id = "fullPrice" type = "text" placeholder = "Полная цена брони"><br/><br/>
									<label>Внесено средств</label>
									<input name = "insPrice" id = "insPrice" type = "text" placeholder = "Внесено средств">
								</form>
							</div>
						<?php }?>
							
						<h2 style = "display: inline-block;">Выберите вариант размещения в пункте: <?php echo $_REQUEST["punct"]; ?></h2>
						<div class = "hotelsLine">
							<div class = "hotelsLineElem hotelsLineElemSelect" data-typebr = "0">
								<div class = "iWraper">
									<img src="<?php bloginfo("template_url");?>/images/icon/icon-proezd.png">
								</div>
								
								<div class = "eWrap">
									<h2>Не заказывать размещение</h2>
									
									<div class = "hotelInBronText">
										<span>Заказать только проезд до места</span><br />
									</div>
									<img class = "selectCh" src = "<?php bloginfo("template_url");?>/images/verified.svg" />
								</div>
										
							</div>
							
							<?php
							$geo = (empty($_REQUEST["punct"]))?"%":$_REQUEST["punct"];
							$hotel = $wpdb->get_results("SELECT * FROM `mt_br_hotel` WHERE `geo` LIKE '".$geo."'");
							$i = 0;
							foreach($hotel as $h) {
							?>
								
									<div class = "hotelsLineElem <?php //if ($i == 0) echo "hotelsLineElemSelect";?>" data-typebr = "1">
										<div class = "iWraper">
											<?php echo get_the_post_thumbnail($h->information); ?>
										</div>
										
										<div class = "eWrap">
											<h2><?php echo get_the_title($h->information); ?></h2>
											
											<div class = "hotelInBronText">
												<span><?php echo get_the_excerpt($h->information); ?></span><br />
												<a target = "_blank" href = "<?php echo get_the_permalink($h->information);?>"><span class = 'bronirovanie'>Информация об отеле</span></a>
											</div>
											<img class = "selectCh" src = "<?php bloginfo("template_url");?>/images/verified.svg" />
										</div>
										
									</div>
								
							<?php
									$i++;
								}
							?>
						</div>
						
						<script>
							jQuery(document).ready(function() { 
								jQuery(".hotelsLineElem").click( function(){ 
								var mestaChang = "";
								jQuery(".rsMestoRezerved .mestonum").each(function(indx, element){
								  mestaChang +=  "Для места № "+jQuery(element).html()+"\r\n";
								});
								
								if (mestaChang == "") mestaChang = "для всех выбранных мест";
								
									if (confirm("Этот отель будет добавлен: \r\n"+mestaChang+"\r\nПродолжить?")) {
										jQuery(".hotelsLineElem").removeClass("hotelsLineElemSelect");
										jQuery(this).addClass("hotelsLineElemSelect");
										jQuery(".rfHotelName").html(jQuery(".hotelsLineElemSelect h2").html());
										chengHotelFlag = true;
									}
								});
								
								jQuery(".allOformleniBtn").click( function(){ 
									
									if (jQuery('.rezervSession .taMestoRezervForm').length == 0)
									{
										alert("Места не выбраны!");
										return;
									}
									
									let destrib = jQuery('.hotelsLineElemSelect').data("typebr");

									if ((jQuery('.onlypr.selected').length != 0)&&(destrib == 0))
									{
										
										alert("Вы выбрали места с обязательной покупкой проживания. Выберите отель.");
										return;
									}

									//alert(jQuery(".managerSelect").val());
									
									if (jQuery(".managerSelect").val() === null)
									{
										alert("Выберите менеджера!");
										return;
									}
									
									
									
									var allElemObject = new Array();
									var fl_error = true;
									jQuery.each(jQuery('.rezervSession .taMestoRezervForm'),
											function(i, val) {
							
												
												var oneElemObject = new Object();
												
												errs = checFormNew(val);
												
											
												if (errs) {
													
													allElemObject = null;
													fl_error = false;
													return;
												}
												
												oneElemObject["reisID"] = jQuery(val).children(".reisID").val();
												oneElemObject["mestoNum"] = jQuery(val).children(".mestoNum").val(); 
												oneElemObject["direct"] = jQuery(val).children(".direct").val(); 
												oneElemObject["directID"] = jQuery(val).children(".directID").val(); 
												oneElemObject["F"] = jQuery(val).children(".F").val();
												oneElemObject["I"] = jQuery(val).children(".I").val();
												oneElemObject["O"] = jQuery(val).children(".O").val();
												oneElemObject["pasportnum"] = jQuery(val).children(".pasportnum").val(); 
												oneElemObject["doctype"] = jQuery(val).children(".doctype").val();
												oneElemObject["phone"] = jQuery(val).children(".phone1").val();
												oneElemObject["punkt"] = jQuery(val).children(".punkt").val();
												oneElemObject["mestoOtpr"] = jQuery(val).children(".mestoOtpr").val(); 
												oneElemObject["mestoPrib"] = jQuery(val).children(".mestoPrib").val(); 
												oneElemObject["coment"] = jQuery(val).children(".coment").val();
												oneElemObject["agentmail"] = jQuery(val).children(".agentmail").val(); 
												oneElemObject["mestoID"] = jQuery(val).children(".midInSchem").val();
												oneElemObject["dataRod"] = jQuery(val).children(".dataRod").val();
												
												if (chengHotelFlag){
													oneElemObject["usType"] = jQuery(".hotelsLineElemSelect").data("typebr");
													oneElemObject["hotelName"] = jQuery(".hotelsLineElemSelect h2").html();
												}
												else
												{ 
													oneElemObject["usType"] = jQuery(val).children(".usType").val();
													oneElemObject["hotelName"] = jQuery(val).find(".rfHotelName").html();

												}
												
												oneElemObject["managername"] = jQuery(".managerSelect").val();
												oneElemObject["fullprice"] = jQuery("#fullPrice").val();
												oneElemObject["predoplata"] = jQuery("#insPrice").val();
												
												console.log(oneElemObject["predoplata"]);
									
												allElemObject.push (oneElemObject); 
											}
									)
									
									if (!fl_error)
									{
										alert("При заполнении допущенны ошибки");
										return;
									}
										
									
									jQuery(".loadSpiner").show();
									jQuery.post("<?php bloginfo("template_url")?>/taAjax.php",
									{
										ajaxAction: "addAllMesta", 
										allRezMesta: allElemObject,
										razmeshenie: jQuery(".hotelsLineElemSelect h2").html()
									
									}, function (response, status, xhr) {
											if ( status == "error" ) {
											var msg = "Sorry but there was an error: ";
											alert( msg + xhr.status + " " + xhr.statusText );
											
											} else {
												alert("Данные добавленны!");
												console.log(response);
												location.reload();
											}
											
										jQuery(".loadSpiner").hide();		
									});
									
									
									
									console.log(allElemObject);
									
									
								});
							} );
						</script>
						
						<div class = "allUprElem">
							<form>
								<select class = "managerSelect">
									<?php
										
									
										if ($registred[0]["moderate"] == 10)
										{
									?>
									
									<option selected disabled value = "">Выберите менеджера</option> 
									<!-- <option value = "Владимир (Мир туризма)">Владимир (Мир туризма)</option> -->
								
									<option value = "Кристина (Мир туризма)">Кристина (Мир туризма)</option>
									<option value = "Ирина (Мир туризма)">Ирина (Мир туризма)</option>
									<!--<option value = "Наталья (Мир туризма)">Наталья (Мир туризма)</option>-->
									<option value = "Елена Владимировна">Елена Владимировна (Мир туризма)</option>
									<option value = "Павел Алексеевич">Павел Алексеевич (Мир туризма)</option>
										<?php } else { ?>
											<option selected value = "<?php echo $registred[0]["person"]; ?>"><?php echo $registred[0]["person"]; ?></option> 
										<?php } ?>
								</select>
							</form>
							<div class="bluebtn allOformleniBtn" >Оформить выбранные места</div><img class = "loadSpiner" src = "<?php bloginfo("template_url"); ?>/images/load.svg" />
						</div>
					</div>

					<div id = "taCol3" class = "taCol">
					<div class = "oformlForm" style = "display:none;" >
						<form class="taMestoRezervForm" name="taMestoRezervForm" action="" method="post">
							<input class = "usType" name="usType" value="<?php echo $reisinfo[0]->usType; ?>" type="hidden">
							
							<input class = "reisID" name="reisID" value="<?php echo $reisinfo[0]->ID; ?>" type="hidden">
							<input class = "mestoNum" name="mestoNum" value="" type="hidden">
							<input class = "direct" name="direct" value="" type="hidden">
							<input class = "midInSchem" name="midInSchem" value="" type="hidden">
							<input class = "directID" name="directID" value="<?php echo $directID;?>" type="hidden">
			
							
							<input class="agentmail" name="agentmail" value="<?php echo $_COOKIE['taReg']; ?>" type="hidden">
							
							
							
							<div style = "margin-bottom: 10px;" class = "razmInForm">
								<strong>Размещение: </strong> <span class = "rfHotelName">Без размещения</span>
							</div>
							
							<input class="F" name="F" value="" placeholder="Фамилия" type="text"><br />
							<input class="I" name="I" value="" placeholder="Имя" type="text"><br />
							<input class="O" name="O" value="" placeholder="Отчество" type="text"><br />
							<select class="doctype" name="doctype" onchange = "changeDoc(this)" >
								<option value = "Паспорт">Паспорт</option>
								<option value = "Свидетельство о рождении">Свидетельство о рождении</option>
							</select>
							<input class="pasportnum" name="pasportnum" value="" placeholder="Номер документа" type="text"><br />
							<input class="dataRod" name="dataRod" value="" placeholder="Дата рождения" type="text"><br />
							<input class="phone1" name="phone" value="" placeholder="Контактный телефон" type="text"><br />
							<select id = "mestoOtpr" class="mestoOtpr" name="mestoOtpr">

							</select>
							
							<select id = "mestoPrib" class="mestoPrib" name="mestoPrib">

							</select>
							
							<select style = "display:none;" id = "punktLoad" class="punkt" name="punkt">
								<option value="" disabled selected>Выберите пункт прибывания</option>
								<?php
									$puncts = explode(";", $naprinfo[0]->prompunkts);
									
									echo "<option ".(($naprinfo[0]->start === $textPunkt)?"selected":'')." value = '".$naprinfo[0]->start."'>".$naprinfo[0]->start."</option>";
									for ($i = 0; $i < count($puncts); $i++) {
										echo "<option ".(($puncts[$i] === $textPunkt)?"selected":'')." value = '".$puncts[$i]."'>".$puncts[$i]."</option>";
									}
									echo "<option ".(($naprinfo[0]->end === $textPunkt)?"selected":'')." value = '".$naprinfo[0]->end."'>".$naprinfo[0]->end."</option>";
								?>
							</select>
							
							<!--<input class="mestoPos" name="mestoPos" value="" placeholder="Место посадки высадки" type="text"><br />-->
							
							<textarea class="coment" name="coment"></textarea>
						
							<div class = "btn oformleniBtn" id = "oformleniBtn"  style = "display:none;"  onclick = "offormlZak(this)" >Оформить</div><br />
							<div class = "btn izmenitBtn" id = "izmenitBtn" style = "display:none;" onclick = "updateZak(this)" >Сохранить</div>
		
						</form>
					</div>
					
						<h2>Условные обозначения</h2>
						<div class = "uOboznBlk"><div class = "mesto uObozn"></div>Свободное место</div>
						<div class = "uOboznBlk"><div class = "mesto uObozn onlypr"></div>Пакетный тур (проезд + проживание)</div>
						<div class = "uOboznBlk"><div class = "mesto uObozn zanyato"></div>Занятое место</div>
						<div class = "uOboznBlk"><div class = "mesto uObozn zanyatoVami"></div>Наша бронь</div>
						<div class = "uOboznBlk"><div class = "mesto uObozn zanyatoVami">*</div>Наша бронь (проезд + проживание)</div>
						<div class = "uOboznBlk"><div class = "mesto uObozn selected"></div>Выбрано для покупки</div>
						<div class = "uOboznBlk"><div class = "mesto uObozn " style = "background-color:lightgray"></div>Для сотрудников</div>
					</div>
				<?php endif;?>
			<?php endwhile;?>
			<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>