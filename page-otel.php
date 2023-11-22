<?php
/*
Template Name: Отели
WP Post Template: Отели
Template Post Type: post, page   
*/
?>

<?php get_header("booking"); 

$banner = wp_get_attachment_image_src( carbon_get_the_post_meta('otel_banner'), 'full')[0];
if(empty($banner)) {
	$banner = get_template_directory_uri() . '/images/mir/contact.jpg';
}
?>

<?php if(!wp_is_mobile() && empty($_COOKIE["girlClose"])):?>


<div id = "girlWrapper" class="girlWrapper">
	<a href = "#grafic-payment">
		<div class="girlOnline"></div> 
		<div class="girlOnline-text">
			<p>Этот тур можно купить</p>
			<h3>On-Line</h3>
		</div> 
	</a>
	<div id = "closeGirlBtn" class = "closeBtn"></div>
</div>


<script>
	var girl_interval = setInterval(function() {
		document.getElementById("girlWrapper").classList.add('girlWrapperShow');
		clearInterval(girl_interval);
	}, 8000);

	closeGirlBtn.onclick = function() {
		girlWrapper.classList.remove('girlWrapperShow');
		document.cookie = "girlClose=close; path=/; max-age=12000"
  	};
</script>
<?endif;?>

<div class="" style="display: none; background-image: url(<?php echo get_template_directory_uri();?>/images/phone-call-red.svg);"></div>
<section class="booking-title-wrapper" style="background-image: url(<?php echo $banner?>);">
	<div class="container-booking">
		<h1 class="booking-title"><?php the_title();?></h1>
	</div>
</section>
<?php get_template_part('template-parts/bus-tour-menu');?>
<script>
	var imgIndex = 0;
	var LentPosition = 0;
	
	function neximgLb() { 
		imgIndex++;
		if (jQuery(".prevyGalery img").length<=imgIndex)
			imgIndex = 0;
		jQuery(".lightbox .img").html(jQuery("#imgblk"+imgIndex).html());
		jQuery(".galery .bigImg .imgWiev").html(jQuery("#imgblk"+imgIndex).html());
	}
	
	function previmgLb() {
		imgIndex--;
		if (imgIndex<0)
			imgIndex = jQuery(".prevyGalery img").length-1;
		jQuery(".lightbox .img").html(jQuery("#imgblk"+imgIndex).html());
		jQuery(".galery .bigImg .imgWiev").html(jQuery("#imgblk"+imgIndex).html());
	}
	

	jQuery(document).ready(function(event) { 
		jQuery(".prevyGalery .lent").css ("width", jQuery(".prevyGalery img").length*110);
		jQuery(".imgWraper").click(function(){ 

			jQuery(".galery .bigImg .imgWiev").html(jQuery(this).html());
			imgIndex = jQuery(this).data("index");
		});
		jQuery(".bigImg .imgWiev").click(function(){ 
			jQuery(".lightbox").show();
			jQuery("body").addClass("fsMode");
			jQuery(".lightbox .img").html(jQuery(this).html());
			jQuery('.osnNaprFixed').hide();
		});

		jQuery(".lightbox .closeBtn").click(function(){ 
			jQuery(".lightbox").hide();
			jQuery("body").removeClass("fsMode");
		});

		jQuery(".lightbox .nextBtn").click(function(){ 
			neximgLb();
		});

		jQuery(".lightbox .prevBtn").click(function(){ 
			previmgLb();
		});

		jQuery(".bigImg .nextBtn").click(function(){ 
			neximgLb();
		});

		jQuery(".bigImg .prevBtn").click(function(){ 
			previmgLb();
		});

		jQuery(".prevyGalery .nextBtn").click(function(){ 

			LentPosition-=100;
			if (LentPosition<(jQuery(".prevyGalery").width() - jQuery(".prevyGalery .lent").width())) {
				LentPosition+=100;
				return;
			}
			jQuery(".prevyGalery .lent").css("left",LentPosition+"px");
		});

		jQuery(".prevyGalery .prevBtn").click(function(){ 
			LentPosition+=100;
			if (LentPosition>0) LentPosition= 0;
			jQuery(".prevyGalery .lent").css("left",LentPosition+"px");
		});


		
	});	
</script>



<div class = "line PageContent page-class page-otel-class _side-wrapper">
	<div class = "centerInLine">
		<div class="breadcrumb breadcrumbMrBottom">
			<?php
			if(function_exists('bcn_display'))
			{
				bcn_display();
			}
			?>
		</div>

		<?php get_template_part('template-parts/filters-section');?> 
		
		<?
			$closet = carbon_get_post_meta( get_the_ID(), "otel_close");
			if (!empty($closet)) {
		?>
		
				<div class = "official_close official_close_inpage" >
					<p><? echo $closet; ?></p>
				</div>
		<?
			}
		?>

		<div class = "allOtelInfoWriper">	
			<div class = "otelInfoWriper">	
				<div class = "leftStlb">
					<?php 
					?>
					<?php $files = carbon_get_the_post_meta('otel_gallery');?>
					<div class="slider-for-gallery" id = "slider-for-gallery">
						<?php foreach($files as $file):
							$src = wp_get_attachment_image_src($file['image'], 'large')[0];?>
							<div class="slider-for-gallery__item">
							<!-- data-lightbox='photo' -->
								<a data-fslightbox="gallery" href="<?php echo $src;?>" >
									<img src="<?php echo $src;?>" loading="lazy" alt="<?php echo $file['text']; ?>" title="<?php echo $file['text']; ?>">
								</a>
								
								<?php if (!empty($file['text'])){?>
									<div class = "galery_termin"><?php echo $file['text']; ?></div>
								<?}?>	
							</div>
						<?php endforeach;?>
					</div>
					
					<?php //if(!wp_is_mobile()){?>
						<div class="slider-nav-gallery">
							<?php foreach($files as $file):
								$src = wp_get_attachment_image_src($file['image'], 'thumbnail')[0];?>
								<div class="slider-nav-gallery__item" style="background-image: url(<?php echo $src;?>);"></div>
							<?php endforeach;?>
						</div>
					<?//}?>


					<div class="rasp-otel-wrap">
						<?php if(carbon_get_the_post_meta('otel_map')):?>
							<h2>Расположение отеля</h2>
							<div id="map-wrapper" class="map-wrapper">

							</div>
							<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
							<script>	
								var myMap3,
								myPlacemark, myPlacemark2;

						// Дождёмся загрузки API и готовности DOM.
						ymaps.ready(init);

						function init () {
							// Создание экземпляра карты и его привязка к контейнеру с
							// заданным id ("map").
							myMap3 = new ymaps.Map('map-wrapper', {
								center: <?php echo carbon_get_the_post_meta('otel_map');?>, 
								zoom: 14,
								controls: []
							}, {
								searchControlProvider: 'yandex#search'
							});
							
							myPlacemark3 = new ymaps.Placemark(<?php echo carbon_get_the_post_meta('otel_map');?>, {
								iconContent: '',
								// hintContent: '<b>Адрес:</b> г. Курск ул. Ленина 12 (ЦУМ, 3 этаж)',
								// balloonContent: '<b>Адрес:</b> г. Курск ул. Ленина 12 (ЦУМ, 3 этаж)'
							}, {
								iconLayout: 'default#image',
								iconImageHref: '<?php bloginfo("template_url"); ?>/images/signs.svg',
								iconImageSize: [50, 74],
								iconImageOffset: [-25, -74]
							}
							
							);
							myMap3.geoObjects.add(myPlacemark3);

						}
						
						
					</script>
				<?php endif;?>
				<!-- <div class = "galery"> -->
					<?php
								// $inputString = "";
								// $files = scandir($_SERVER['DOCUMENT_ROOT']."/galery/".get_post_meta($post->ID, "galeryFolder",true));
								// $files = carbon_get_the_post_meta('otel_gallery');
								// $count = 0;
								// foreach($files as $file)
								// {

								// 	if ($file == '.' || $file == '..') continue;
								// 	if (is_dir($fullfilename))  continue;
								// 	$imgSize = getimagesize($_SERVER['DOCUMENT_ROOT']."/galery/".get_post_meta($post->ID, "galeryFolder",true)."/".$file);

								// 	$imgName = ""; 
								// 	$imgDerection = "horDir";
								// 	if ($imgSize[0]<$imgSize[1]) {
								// 		$imgName = " vertDirection";
								// 		$imgDerection = "verDir";
								// 	}

								// 	$src = wp_get_attachment_image_src($file['image'], 'full')[0];
								// 	$inputString .= "<div data-index = '".$count."' id = 'imgblk".$count."'  class = 'imgWraper ".$imgName."'>";
								// 		// $inputString .= "<img rel='lightbox' class = '".$imgDerection."' src = '".get_bloginfo("url")."/galery/".get_post_meta($post->ID, "galeryFolder",true)."/".$file."' />";
								// 		$inputString .= "<a href=". $src . " data-lightbox='photo'><img rel='lightbox' class = '".$imgDerection."' src = '".wp_get_attachment_image_src($file['image'], 'full')[0]."' /></a>";
								// 	$inputString .= "</div>";

								// 	$firstImg = "<a href=". $src . " data-lightbox='photo'><img class = '".$imgDerection."' src = '".wp_get_attachment_image_src($file['image'], 'full')[0]."' /></a>";
								// 	if ($count == 0)
								// 			$firstImg = "<img class = '".$imgDerection."' src = '".get_bloginfo("url")."/galery/".get_post_meta($post->ID, "galeryFolder",true)."/".$file."' />";
								// 		// $firstImg = "<a href=". $src . " data-lightbox='photo'><img class = '".$imgDerection."' src = '".wp_get_attachment_image_src($file['image'], 'full')[0]."' /></a>";

								// 	$count++;
								// }
					?>
						<!-- <div class = "bigImg">
							<div class = "btnStr prevBtn">
								<i class="fas fa-chevron-left" aria-hidden="true"></i>&nbsp;
							</div>
							<div class = "imgWiev">
								<?php echo $firstImg; ?>
							</div>
							<div class = "btnStr nextBtn">
								<i class="fas fa-chevron-right" aria-hidden="true"></i>&nbsp;
							</div>
						</div> -->
						<!-- <div class = "prevyGalery">
							<div class = "btnStr prevBtn">
								
								<i class="fas fa-chevron-left" aria-hidden="true"></i>&nbsp;
							</div>
							
							<div class = "lent">
								<?php echo $inputString; ?>
							</div>
							
							<div class = "btnStr nextBtn">
								<i class="fas fa-chevron-right" aria-hidden="true"></i>&nbsp;
							</div>
						</div> -->
						<!-- </div> -->
					</div>
					<div class = "grafic">
						<h2>Цена</h2>
						<?php 
							// echo apply_filters( 'the_content', htmlspecialchars_decode(get_post_meta($post->ID, "html_Price", true)));
						echo carbon_get_the_post_meta('otel_price');
						?>
					</div>

						<script>
							function calc_price_all() {
								let countOld = Number(jQuery("#countOld").val());
								let count5 = jQuery("#count5").val();
								let count12 = jQuery("#count12").val();
								
								let price5 = jQuery("#price5").val();
								let price12 = jQuery("#price12").val();
								
								let june_night_price = Number(jQuery('#number_sel option:selected').data("june"));
								let july_night_price = Number(jQuery('#number_sel option:selected').data("july"));
								let august_night_price = Number(jQuery('#number_sel option:selected').data("august"));
								let september_night_price = Number(jQuery('#number_sel option:selected').data("september"));

								let june_day_count = Number(jQuery('#reis_sel option:selected').data("june"));
								let july_day_count = Number(jQuery('#reis_sel option:selected').data("july"));
								let august_day_count = Number(jQuery('#reis_sel option:selected').data("august"));
								let september_day_count = Number(jQuery('#reis_sel option:selected').data("september"));
								
								console.log(june_day_count)
								console.log(july_day_count)
								console.log(august_day_count)
								console.log(september_day_count)

								console.log("-----------")

								console.log(june_night_price)
								console.log(july_night_price)
								console.log(august_night_price)
								console.log(september_night_price)

								let day_summ_calc = (june_night_price*june_day_count)
								+(july_night_price*july_day_count)
								+(august_night_price*august_day_count)
								+(september_night_price*september_day_count);	

								let summOld = countOld * day_summ_calc; 

								let summ5 = count5 * price5;
								let summ12 = count12 * ((1-(price12/100))*day_summ_calc);

								console.log(summOld + " " + summ5+ " " + summ12);
								return summOld +summ5 +summ12;
							}

							jQuery( document ).on("change", ".recalc_elem", function() {
								let rez = calc_price_all();
								jQuery('.result-summ').html(Number(rez).toLocaleString('ru-RU'));
								jQuery('.result-summ').data("tsumm", rez);
							});

						</script>
						<!-- <div id = "grafic-payment" class="grafic-payment">
							<h2>Купить On-line</h2>
							<form class="grafic-payment-form" action="#">
								<input type = "hidden" name = "kurortName" id = "kurortName" value = "<?php the_title();?>">
								<input type = "hidden" name = "price5" id = "price5" value = "<? echo carbon_get_the_post_meta('before_5_price');?>">
								<input type = "hidden" name = "price12" id = "price12" value = "<? echo carbon_get_the_post_meta('before_12_price');?>">


								<div class="grafic-payment-form__row grafic-payment-form__block">
									<div class="grafic-payment__quantity-item">
										<label for="#">Колличество взрослых</label>
										<div class="quantity-item__number">
											<span class="grafic-payment__minus">-</span>
											<input type="number" value = "0" min = "0" id = "countOld" class="recalc_elem grafic-payment-form__input">
											<span class="grafic-payment__plus">+</span>
										</div> 
									</div>
									<div class="grafic-payment__quantity-item"> 
										<label for="#">Дети до 5 лет</label>
										<div class="quantity-item__number">
											<span class="grafic-payment__minus">-</span>
											<input type="number" value = "0"  min = "0" id = "count5" class="recalc_elem grafic-payment-form__input">
											<span class="grafic-payment__plus">+</span>
										</div> 
									</div>
									<div class="grafic-payment__quantity-item">
										<label for="#">Дети до 12 лет</label>
										<div class="quantity-item__number">
											<span class="grafic-payment__minus">-</span>
											<input type="number" value = "0"  min = "0" id = "count12" class="recalc_elem grafic-payment-form__input">
											<span class="grafic-payment__plus">+</span>
										</div> 
									</div>
								</div>

								<div class="grafic-payment-form__block">
									<label for="#">Выберите тип номера</label>
									<?php $numbers = carbon_get_the_post_meta('hotel_number_pricing');?>

									<select name="number_sel" id="number_sel" class="recalc_elem grafic-payment-form__select">
										<?
										$i = 1;
										foreach ($numbers as $number) {?>
											<option  value = "<?echo $i;?>" data-june = "<?echo $number["june_night_price"]; ?>" data-july = "<?echo $number["july_night_price"]; ?>" data-august = "<?echo $number["august_night_price"]; ?>" data-september = "<? echo $number["september_night_price"]; ?>">
												<?echo trim($number["number_type"]); ?>
											</option>
											<?
											$i++;
										}
										?>
									</select>
								</div>

								<div class="grafic-payment-form__block">
									<label for="#">Выберите рейс</label>
									<?php 
									if (carbon_get_the_post_meta('calc_reis_type') == 0) 
										$reises = carbon_get_theme_option('reis_to_calc_krasnodar');
									else
									if (carbon_get_the_post_meta('calc_reis_type') == 1) 
										$reises = carbon_get_theme_option('reis_to_calc_krasnodar_second');
									else
										$reises = carbon_get_theme_option('reis_to_calc_krim');
									?>

									<select name="reis_sel" id="reis_sel" class="recalc_elem grafic-payment-form__select">
										<?
										$i = 1;
										foreach ($reises as $reis) {?>
											<option value = "<?echo $i;?>" 
												data-june = "<?echo $reis["june_day_count"]; ?>" 
												data-july = "<?echo $reis["july_day_count"]; ?>" 
												data-august = "<?echo $reis["august_day_count"]; ?>" 
												data-september = "<? echo $reis["september_day_count"]; ?>" >
												Выезд из Курска <?echo trim($reis["viezd"]); ?> - возвращение <?echo $reis["vozvrashenie"]; ?>
											</option>
											<?
											$i++;
										}
										?>
									</select>
								</div>
								<div class="grafic-payment-form__output">
									<p>Цена: <span class = "result-summ grafic-payment__number">0</span> р.</p>
								</div>
								<hr>
								<div class="grafic-payment-form__contact">
									<input type="text" placeholder="Имя" name = "tnmName" id = "tnmName" class="grafic-payment-form__input">
									<input type="tel" placeholder="*Телефон" name = "tnmTel" id = "tnmTel" class="grafic-payment-form__input">
									<input type="email" placeholder="*Email"  name = "tnmMail" id = "tnmMail" class="grafic-payment-form__input">
								</div>
								<div class="grafic-payment-form__message">
									<textarea  name = "tnmMessage" id = "tnmMessage" type="text"  placeholder="В данное поле впишите ФИО и паспортные данные отдыхающих" cols="30" rows="10"></textarea>
									<label>
										<input type="checkbox" checked name ="tnmCheck" value="check" id = "tnmCheck">
										<p>
											Я ознакомился и принимаю условия <a href="<?php echo get_permalink(1312);?>">"Политики в области обработки персональных данных".</a> 
											При оформлении покупки, согласен с условиями <a href="<?php echo get_permalink(5689);?>">оферты.</a>
										</p>
									</label>
									<button class = "busTourPayBtn">Купить</button>
								</div>
							</form>
						</div> -->

						
						<div class = "grafic">
							<h2>График заездов</h2>
							<?php  echo carbon_get_the_post_meta('otel_schedule'); ?>
						</div>
						

				</div>
				


				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class = "rightStlb">
						<div class = "panelInstrument">
							<div onclick = "window.print()" class = "bluebtn printRn">Отправить на печать</div>
							
							<?php if (isset($_COOKIE['taReg'])){ ?>
								
								<?php 
								$lnkparam = get_post_meta($post->ID, "lnkparam", true);	
								$lnkparamnapr = get_post_meta($post->ID, "lnkparamnapr", true);

								$dopstr = "";	
								if (!empty($lnkparam)) $dopstr = "?napr=".$lnkparamnapr."&punct=".$lnkparam."#step2" 
									?>
								<a class = "bluebtn toLkBtn" href = "<?php echo get_the_permalink(793).$dopstr;?>">Заказать в личном кабинете</a>

							<?php } else {?>
								<div onclick = " jQuery('#zayavTurMoreModal').arcticmodal(); jQuery('#zayavTurMoreModal .tkName').html('<?php echo htmlspecialchars ($post->post_title); ?>'); ym(29416892,'reachGoal','openAutobTur') " class = "bluebtn zaprosNaTurMore g-button">Задать вопрос</div>

							<?php } ?>
							
						</div>
						<div class = "baseDescr">
							<?php the_content();?>
						</div>
					<?php endwhile;?>
				<?php endif; ?>

				<div class = "vprice">
					<h2>В цену входит</h2>
					<?php 
							// echo apply_filters( 'the_content', htmlspecialchars_decode(get_post_meta($post->ID, "html_V_Price", true)));
					echo carbon_get_the_post_meta('otel_serv');
					?>
				</div>
						<!-- <div class="help-tour  newstyle-control">
							<div class="help-tour__photo"><img src="<?php echo get_template_directory_uri();?>/images/zTur.jpg" alt=""></div>
							<div class="help-tour__content">
								<div class="help-tour__title">Нужна помощь в подборе автобусного тура?</div>
								<div class="help-tour__btn bluebtn ">Заявка на подбор</div>
								<span class = "mirgalka"></span>
							</div>
						</div> -->
						<?php echo do_shortcode('[help_tour]');?>
						
						<?php if(wp_is_mobile()):?>
							<div class = "grafic">
								<h2>График заездов</h2>
								<?php 
									echo carbon_get_the_post_meta('otel_schedule');
								?>
							</div>
						<?php endif;?>
					</div>
				</div>


				<div class = "otelInfoWriperBottom">

				</div>

			</div>
		</div>


		<?php include 'review.php';?>
		<?php get_footer(); ?>