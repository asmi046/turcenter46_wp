	<?php
/*
Template Name: Вход для турагентств - покупка билета
*/				
?>

<?php get_header(); ?>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.maskedinput.js"></script>
	<script type="text/javascript">
		jQuery(function($){
			jQuery("#phone1").mask("+9 (999) 999-9999");
			jQuery("#pasportnum").mask("99 99 999999");
		});		
		function disabledForm()
		{
			jQuery(".taMestoRezervForm *").attr("disabled","disabled");
		}
		
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
		
		function enabledForm()
		{
			jQuery(".taMestoRezervForm *").removeAttr("disabled");
		}
		
		
		function checForm (){
			errs = false;
				if (jQuery("#F").val() == ""){
					errs = true;
					
					jQuery("#F").css("background-color","#f9d6c5");
				}
				
				if (jQuery("#I").val() == ""){
					errs = true;
					
					jQuery("#I").css("background-color","#f9d6c5");
				}
				
				if (jQuery("#O").val() == ""){
					errs = true;
					
					jQuery("#O").css("background-color","#f9d6c5");
				}
	
				if (jQuery("#pasportnum").val() == ""){
					errs = true;
					
					jQuery("#pasportnum").css("background-color","#f9d6c5");
				}
				
				if (jQuery("#phone1").val() == ""){
					errs = true;
					jQuery("#phone1").css("background-color","#f9d6c5");
				}
				
				if (jQuery("#punkt").val() == ""){
					errs = true;
					jQuery("#punkt").css("background-color","#f9d6c5");
				}
				
				return errs;
				
		}
		

		
		jQuery(document).ready(function() { 
		
		jQuery("#anyMestoC").change(function(){
			if ($(this).is(':checked')) {
				
				jQuery(".formNaprInformAny").show();
				jQuery(".mestoHeadAny").css("display", "inline-block");
			} else {
		
				jQuery(".formNaprInformAny").hide();
				jQuery(".mestoHeadAny").css("display", "none");
			}
		});
		
			disabledForm();
			jQuery(".mesto").click(function(){
				
				
				if (jQuery(this).hasClass("zanyato")) return;
				
				if ($("#anyMestoC").is(':checked')) {
					
					if (jQuery(this).hasClass("zanyatoVami")) return;
					
					var mestoNum = jQuery(this).data("mestonum");
					var direct = jQuery(this).data("direct");
				
					jQuery("#mestoHeadAny").html("Оформление места № "+mestoNum);
					jQuery(".formNaprInformAny").html("Направление: "+direct);
					
					jQuery("#directAny").val(direct);
					jQuery("#mestoNumAny").val(mestoNum);
					
					jQuery("#realIDAny").val(jQuery(this).attr("id"));
					
					jQuery(this).addClass("selected");

					jQuery(".izmenitBtnAny").show();
					
					$("#anyMestoC").removeAttr("checked");
					return;
				}
				
				clearForm();
				
				if (jQuery(this).hasClass("zanyatoVami")) {
						
						jQuery("#reisID").val(jQuery(this).data("reisid")); 
						
						jQuery("#mestoNum").val(jQuery(this).data("mestonum"));
						jQuery("#direct").val(jQuery(this).data("direct"));
						jQuery("#F").val(jQuery(this).data("f"));
						jQuery("#I").val(jQuery(this).data("i")); 
						jQuery("#O").val(jQuery(this).data("o")); 
						jQuery("#pasportnum").val(jQuery(this).data("pasportnum")); 
						jQuery("#phone1").val(jQuery(this).data("phone"));
						jQuery("#punkt").val(jQuery(this).data("punkt")); 
						jQuery("#coment").val(jQuery(this).data("coment")); 
						jQuery("#agentmail").val(jQuery(this).data("agentmail"));
						
						jQuery("#mestoHead").html("Редактирование места № "+jQuery(this).data("mestonum"));
						jQuery(".formNaprInform").html("Направление: "+jQuery(this).data("direct"));
						
						jQuery("#izmenitBtn").data("rezervid",jQuery(this).data("rezervid")).attr("data-rezervid", jQuery(this).data("rezervid"));
						
						jQuery("#oformleniBtn").hide();
						jQuery("#izmenitBtn").show();					
						jQuery("#dellBtn").show();		
						jQuery(".addAnyMesto").show();		
						
				} else {
				
				var mestoNum = jQuery(this).data("mestonum");
				var direct = jQuery(this).data("direct");
				
				jQuery("#mestoHead").html("Оформление места № "+mestoNum);
				jQuery(".formNaprInform").html("Направление: "+direct);
				jQuery("#direct").val(direct);
				jQuery("#mestoNum").val(mestoNum);

				
				
				jQuery("#oformleniBtn").show();
				jQuery("#izmenitBtn").hide();
				jQuery("#dellBtn").hide();
				jQuery(".addAnyMesto").hide();
				}
				
				jQuery("#realID").val(jQuery(this).attr("id"));
				jQuery("#taCol1 .mesto").removeClass("selected");
				jQuery("#taCol2 .mesto").removeClass("selected");
				jQuery(this).addClass("selected");
				
				enabledForm();
			});
			
			jQuery(".taMestoRezervForm input").click(function(){
				jQuery(this).css("background-color","white");
				
			}); 
			
			jQuery(".taMestoRezervForm select").click(function(){
				jQuery(this).css("background-color","white");
			}); 
			
		
			jQuery("#izmenitBtn").bind("click", function(){ 
				errs = checForm();
				
				console.log(errs);
				
				if (!errs) {
					jQuery(".taMestoRezervForm i").show();
					
					mestoNumThis = jQuery("#mestoNum").val();
					directThis = jQuery("#direct").val(); 
					rezervidThis = jQuery("#izmenitBtn").data("rezervid");
					
					jQuery.post("<?php bloginfo("template_url")?>/taAjax.php",
										{
										ajaxAction: "updateMesto", 
										reisID: jQuery("#reisID").val(), 
										mestoNum: mestoNumThis, 
										direct: directThis, 
										F: jQuery("#F").val(), 
										I: jQuery("#I").val(), 
										O: jQuery("#O").val(), 
										pasportnum: jQuery("#pasportnum").val(), 
										phone: jQuery("#phone1").val(), 
										punkt: jQuery("#punkt").val(), 
										coment: jQuery("#coment").val(), 
										agentmail: jQuery("#agentmail").val(), 
										rezervid:rezervidThis,
										}, function (response, status, xhr) {
												if ( status == "error" ) {
												var msg = "Sorry but there was an error: ";
												alert( msg + xhr.status + " " + xhr.statusText );
												} else {
													//alert(response);
													mas = response.split("|");
													
													if (mas[1] == 1) {
														
														
														jQuery("#"+jQuery("#realID").val()).data("reisid", mas[2]).attr("data-reisid", mas[2]);
														jQuery("#"+jQuery("#realID").val()).data("mestonum", mas[3]).attr("data-mestonum", mas[3]);
														jQuery("#"+jQuery("#realID").val()).data("direct", mas[4]).attr("data-direct", mas[4]);
														jQuery("#"+jQuery("#realID").val()).data("i", mas[5]).attr("data-f", mas[5]);
														jQuery("#"+jQuery("#realID").val()).data("f", mas[6]).attr("data-i", mas[6]);
														jQuery("#"+jQuery("#realID").val()).data("o", mas[7]).attr("data-o", mas[7]);
														jQuery("#"+jQuery("#realID").val()).data("pasportnum", mas[8]).attr("data-pasportnum", mas[8]);
														jQuery("#"+jQuery("#realID").val()).data("phone", mas[9]).attr("data-phone", mas[9]);
														jQuery("#"+jQuery("#realID").val()).data("punkt", mas[10]).attr("data-punkt", mas[10]);
														jQuery("#"+jQuery("#realID").val()).data("coment", mas[11]).attr("data-coment", mas[11]);
														jQuery("#"+jQuery("#realID").val()).data("agentmail", mas[12]).attr("data-agentmail", mas[12]);
														jQuery(".taMestoRezervForm i").hide();
													}
													
													alert(mas[0]);
												}
												
										});
				
				} else {
					alert("Не заполнены обязательные поля формы.");
				}
			});
			
			
	
			
			jQuery("#oformleniBtn, .izmenitBtnAny").click( function(){ 
				errs = checForm();
				console.log(errs);
				if (!errs) {
					jQuery(".taMestoRezervForm i").show();
					
					mestoNumThis = jQuery("#mestoNum").val();
					directThis = jQuery("#direct").val(); 
					realIDThis = jQuery("#realID").val();
					
					if (jQuery(this).hasClass("izmenitBtnAny")) {
						mestoNumThis = jQuery("#mestoNumAny").val();
						directThis = jQuery("#directAny").val();
						realIDThis = jQuery("#realIDAny").val();
					}
					
					
					
					jQuery.post("<?php bloginfo("template_url")?>/taAjax.php",
										{
										ajaxAction: "rezervMesto", 
										reisID: jQuery("#reisID").val(), 
										mestoNum: mestoNumThis, 
										direct: directThis, 
										F: jQuery("#F").val(), 
										I: jQuery("#I").val(), 
										O: jQuery("#O").val(), 
										pasportnum: jQuery("#pasportnum").val(), 
										phone: jQuery("#phone1").val(), 
										punkt: jQuery("#punkt").val(), 
										coment: jQuery("#coment").val(), 
										agentmail: jQuery("#agentmail").val(), 
										
										}, function (response, status, xhr) {
												if ( status == "error" ) {
												var msg = "Sorry but there was an error: ";
												alert( msg + xhr.status + " " + xhr.statusText );
												} else {
													//alert(response);
													mas = response.split("|");
													
													if (mas[1] == 1) {
														console.log("#"+realIDThis);
														jQuery("#"+realIDThis).removeClass("selected");
														jQuery("#"+realIDThis).addClass("zanyatoVami");
														jQuery("#"+realIDThis).data("rezervid", mas[13]).attr("data-rezervid",mas[13]);
														
														jQuery("#"+realIDThis).data("reisid", mas[2]).attr("data-reisid", mas[2]);
														jQuery("#"+realIDThis).data("mestonum", mas[3]).attr("data-mestonum", mas[3]);
														jQuery("#"+realIDThis).data("direct", mas[4]).attr("data-direct", mas[4]);
														jQuery("#"+realIDThis).data("f", mas[5]).attr("data-f", mas[5]);
														jQuery("#"+realIDThis).data("i", mas[6]).attr("data-i", mas[6]);
														jQuery("#"+realIDThis).data("o", mas[7]).attr("data-o", mas[7]);
														jQuery("#"+realIDThis).data("pasportnum", mas[8]).attr("data-pasportnum", mas[8]);
														jQuery("#"+realIDThis).data("phone", mas[9]).attr("data-phone", mas[9]);
														jQuery("#"+realIDThis).data("punkt", mas[10]).attr("data-punkt", mas[10]);
														jQuery("#"+realIDThis).data("coment", mas[11]).attr("data-coment", mas[11]);
														jQuery("#"+realIDThis).data("agentmail", mas[12]).attr("data-agentmail", mas[12]);
														jQuery(".taMestoRezervForm i").hide();
														
														jQuery(".addAnyMesto").hide();
														jQuery("#realIDAny").val();
														jQuery("#directAny").val();
														jQuery("#mestoNumAny").val();
														
														jQuery("#mestoHeadAny").html("Выберитие место для оформлния");
														jQuery(".formNaprInformAny").html("");
														
														jQuery("#mestoHeadAny").hide();
														
														jQuery("#izmenitBtnAny").hide();
													}
													
													alert(mas[0]);
													
												}
												
										});
				
				} else {
					alert("Не заполнены обязательные поля формы.");
				}
			});
			
			jQuery("#dellBtn").click(function(){ 
				jQuery(".taMestoRezervForm i").show();
				jQuery.post("<?php bloginfo("template_url")?>/taAjax.php",
										{
										ajaxAction: "dellMesto", 
										rezervid:jQuery("#izmenitBtn").data("rezervid"),
										}, function (response, status, xhr) {
												if ( status == "error" ) {
												var msg = "Sorry but there was an error: ";
												alert( msg + xhr.status + " " + xhr.statusText );
												} else {
													//alert(response);
													mas = response.split("|");
													
													
													if (mas[1] == 1) {
														jQuery("#"+jQuery("#realID").val()).removeClass("selected");
														jQuery("#"+jQuery("#realID").val()).removeClass("zanyatoVami");
														
														jQuery("#"+jQuery("#realID").val()).data("reisid", "").attr("data-reisid", "");
														jQuery("#"+jQuery("#realID").val()).data("mestonum", "").attr("data-mestonum", "");
														jQuery("#"+jQuery("#realID").val()).data("direct", "").attr("data-direct", "");
														jQuery("#"+jQuery("#realID").val()).data("i", "").attr("data-f", "");
														jQuery("#"+jQuery("#realID").val()).data("f", "").attr("data-i", "");
														jQuery("#"+jQuery("#realID").val()).data("o", "").attr("data-o", "");
														jQuery("#"+jQuery("#realID").val()).data("pasportnum", "").attr("data-pasportnum", "");
														jQuery("#"+jQuery("#realID").val()).data("phone", "").attr("data-phone", "");
														jQuery("#"+jQuery("#realID").val()).data("punkt", "").attr("data-punkt", "");
														jQuery("#"+jQuery("#realID").val()).data("coment", "").attr("data-coment", "");
														jQuery("#"+jQuery("#realID").val()).data("agentmail", "").attr("data-agentmail", "");
														
														jQuery("#oformleniBtn").show();
														jQuery("#izmenitBtn").hide();
														jQuery("#dellBtn").hide();
														
														jQuery(".taMestoRezervForm i").hide();
														clearForm();
													}
													
													alert(mas[0]);
												}
												
										});
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
				<h1><?php the_title();?></h1>
				
			
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
						
						function rezervID($mesta, $n, $napr){
							foreach($mesta as $mesto){
								if (($mesto->mestoNum == $n)&&($napr === $mesto->direct))
								{
									if ($mesto->agentmail === $_COOKIE['taReg'])
										return "data-rezervid = '".$mesto->ID."'";
								}
							}
						}
						
					function rezervFild($mesta, $n, $napr){
							foreach($mesta as $mesto){
								if (($mesto->mestoNum == $n)&&($napr === $mesto->direct))
								{
									if ($mesto->agentmail === $_COOKIE['taReg']){
										return "data-rezervid = '".$mesto->ID."' ".
											   "data-reisid = '".$mesto->reisID."' ".
											   "data-f = '".$mesto->F."' ".
											   "data-i = '".$mesto->I."' ".
											   "data-o = '".$mesto->O."' ".
											   "data-pasportnum = '".$mesto->pasportnum."' ".
											   "data-phone = '".$mesto->phone."' ".
											   "data-punkt = '".$mesto->punkt."' ".
											   "data-coment = '".$mesto->coment."' ".
											   "data-agentmail = '".$mesto->agentmail."' ";
									}
										
								}
							}
						}
						
						$reisNum = $_REQUEST["reis"];
						global $wpdb;
						$reisinfo = $wpdb->get_results("SELECT * FROM `mt_br_reis` WHERE `ID` = ".$reisNum);
						$naprinfo = $wpdb->get_results("SELECT * FROM `mt_br_napr` WHERE `ID` = ".$reisinfo[0]->turtype);
						$mesta = $wpdb->get_results("SELECT * FROM `mt_br_mesto` WHERE `reisID` = ".$reisNum);
						
					?>
					
					
					
					<div class = "avtobusWriper">
						<div id = "taCol1" class = "taCol">
							<div class = "reisinfo">
								<h2><i class="fas fa-map-marker"></i> Направление: <strong><?php echo $napr = $naprinfo[0]->start." - ".$naprinfo[0]->end; ?></strong></h2>
								<h2><i class="far fa-clock"></i> Отправление: <strong><?php echo $reisinfo[0]->start_to_date;?></strong></h2>
							</div>
							<div class = "cabina">Место водителя</div>
							<div class = "mesta">
								<?php
									for ($i =0; $i<48; $i++)
									{
								?>
										<div  id = "t<?php echo $i+1;?>"  class = "mesto <?php echo mestoZan($mesta, $i+1,$napr); ?>" data-mestonum = "<?php echo $i+1;?>" data-direct = "<?php echo $napr; ?>" <?php echo rezervFild($mesta, $i+1,$napr); ?>><?php echo $i+1;?></div>
								<?php
									}
								?>
							</div>
						</div>
						
						<div id = "taCol2" class = "taCol">
							<div class = "reisinfo">
								<h2><i class="fas fa-map-marker"></i> Направление: <strong><?php echo $napr = $naprinfo[0]->end." - ".$naprinfo[0]->start; ?></strong></h2>
								<h2><i class="far fa-clock"></i> Отправление: <strong><?php echo $reisinfo[0]->start_out_date;?></strong></h2>
							</div>
							<div class = "cabina">Место водителя</div>
							<div class = "mesta">
								<?php
									for ($i =0; $i<48; $i++)
									{
								?>
										<div id = "o<?php echo $i+1;?>"  class = "mesto <?php echo mestoZan($mesta, $i+1, $napr); ?>" data-mestonum = "<?php echo $i+1;?>" data-direct = "<?php echo $napr; ?>" <?php echo rezervFild($mesta, $i+1,$napr); ?>><?php echo $i+1;?></div>
								<?php
									}
								?>
							</div>
						</div>
						
						<div class = "rezervTable raspisanie">
							<h2>Забронированно сейчас</h2>
							<table id = "rezervTable">
								<thead>
									<tr>
										<th>Номер места</th>
										<th>Направление</th>
										<th>Ф.И.О.</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
							
						</div>
						
					</div>

					<div id = "taCol3" class = "taCol">
					
					<h2 id = "mestoHead">Выберите место для оформления</h2>
					<span class = "formNaprInform"></span>
					<form class="taMestoRezervForm" name="taMestoRezervForm" action="" method="post">
						<input id = "reisID" name="reisID" value="<?php echo $reisinfo[0]->ID; ?>" type="hidden">
						<input id = "mestoNum" name="mestoNum" value="" type="hidden">
						<input id = "direct" name="direct" value="" type="hidden">
						
						<input id = "mestoNumAny" name="mestoNum" value="" type="hidden">
						<input id = "directAny" name="direct" value="" type="hidden">
						
						<input id="agentmail" name="agentmail" value="<?php echo $_COOKIE['taReg']; ?>" type="hidden">
						
						<input id = "realID" name="realID" value="" type="hidden">
						<input id = "realIDAny" name="realIDAny" value="" type="hidden">
						
						<input id="F" name="F" value="" placeholder="Фамилия" type="text"><br />
						<input id="I" name="I" value="" placeholder="Имя" type="text"><br />
						<input id="O" name="O" value="" placeholder="Отчество" type="text"><br />
						<input id="pasportnum" name="pasportnum" value="" placeholder="Паспорт (серия номер)" type="text"><br />
						<input id="phone1" name="phone" value="" placeholder="Контактный телефон" type="text"><br />
						<select id="punkt" name="punkt">
							<option value="" disabled selected>Выберите пункт прибывания</option>
							<?php
								$puncts = explode(";", $naprinfo[0]->prompunkts);
								for ($i = 0; $i < count($puncts); $i++) {
									echo "<option value = '".$puncts[$i]."'>".$puncts[$i]."</option>";
								}
							?>
						</select>
						<textarea id="coment" name="coment"></textarea>
						<i class="fa fas fa-spinner fa-pulse fa-3x fa-fw"></i>
						<div class = "btn" id = "oformleniBtn">Оформить</div> <div class = "btn" id = "izmenitBtn" data-rezervid = "" >Сохранить</div> <div class = "btn" id = "dellBtn" data-rezervid = "" >Удалить</div><br />
						<div class = "addAnyMesto">
							<input type="checkbox" id="anyMestoC" name="anyMestoC" value="addAnyMesto">
							<label for="anyMestoC">Дополнительное сесто для пассажира</label>
							
							<h2 class = "mestoHeadAny" id = "mestoHeadAny">Выберите место для оформления</h2>
							<span class = "formNaprInformAny"></span>
							<div class = "btn izmenitBtnAny" id = "izmenitBtnAny" data-rezervid = "" >Сохранить</div>
						</div>
					</form>
					
					
						<h2>Условные обозначения</h2>
						<div class = "uOboznBlk"><div class = "mesto uObozn"></div> - свободное место</div>
						<div class = "uOboznBlk"><div class = "mesto uObozn zanyato"></div> - занятое место</div>
						<div class = "uOboznBlk"><div class = "mesto uObozn zanyatoVami"></div> - зарезервировано Вы</div>
						<div class = "uOboznBlk"><div class = "mesto uObozn selected"></div> - выбрано для покупки</div>
					</div>
				<?php endif;?>
			<?php endwhile;?>
			<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>