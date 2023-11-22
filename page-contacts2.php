<?php
/*
* Template Name: Контакты (New)
*/
?>
<?php get_header("booking"); 
$banner = wp_get_attachment_image_src( carbon_get_the_post_meta('otel_banner'), 'full')[0];
if(empty($banner)) {
	$banner = get_template_directory_uri() . '/images/mir/contact.jpg';
}
?>

<section class="booking-title-wrapper" style="background-image: url(<?php echo $banner?>);">
	<div class="container-booking">
		<h1 class="booking-title"><?php the_title();?></h1>
	</div>
</section>
	
	<?php get_template_part('template-parts/bus-tour-menu');?>
	
	<div class = "line PageContent singlePage">
		<div class = "centerInLine">
			<div class="breadcrumb breadcrumbMrBottom">
				<?php
				if(function_exists('bcn_display'))
				{
					bcn_display();
				}
				?>
			</div>

			<div class="content content-contacts">
				<div class="contacts-info">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php the_content();?>
				<?php endwhile;?>
				<?php endif; ?>
				</div>
				<div class="contacts-map__wrapper">
					<h2>Как добраться</h2>
					<div id = "mapLine" class = "mapLine"></div>	 <script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
					<script>
								  ymaps.ready(init);

								  function init () {
									
									  var myMap = new ymaps.Map("mapLine", {
											  center: <?php echo carbon_get_theme_option('mkad_map_point') ?>,
											  zoom: 14,
											  controls: ['zoomControl']
										  }),

										myPlacemarkAdr = new ymaps.Placemark(<?php echo carbon_get_theme_option('mkad_map_point') ?>, {
											  iconContent: '',
											  balloonContent: 'Наш адрес: <b>г. Курск ул. Ленина 12 (ЦУМ, 3 этаж)</b><br/>Телефон: <b> +7 (4712) 306-000',
											  hintContent: 'Наш адрес: <b>г. Курск ул. Ленина 12 (ЦУМ, 3 этаж)</b><br/>Телефон: <b> +7 (4712) 306-000',
										  }, {
											iconLayout: 'default#image',
											iconImageHref: '<?php bloginfo("template_url"); ?>/images/strl1.png',
											iconImageSize: [40, 54],
											iconImageOffset: [-15, -54]
										  });
										  
										  myMap.geoObjects.add(myPlacemarkAdr);
										  
										
										
										


									myMap.behaviors.disable('scrollZoom');
								  }
					</script>
					<form action="" class="contacts-form-tour newstyle-control" id = "tur_so_stranitsy_kontakty">
						<div class="SendetMsg" style="display:none"> 
        			Ваше сообщение успешно отправлено.
      			</div>
						<div class="headen_form_blk">
						<h2>Отправить заявку на подбор тура</h2>
						<div class="contacts-form-tour__wrap">
							<div class="contacts-form-tour__inputs">
								<input type="hidden" name = "form_name" data-valuem = "Название формы" value = "Подобрать тур со страницы Контакты">
								<input type="hidden" name = "page_lnk" data-valuem = "Адрес страницы" value = "<? echo (is_home())?"https://www.turcentr46.ru/":get_the_permalink()?>">
								<input required type="text" name="name" data-valuem = "Имя" placeholder="Имя*">
								<input required type="tel" name="tel" data-valuem = "Телефон" placeholder="Телефон*">
								<input required type="email" name="email" data-valuem = "Email" placeholder="Email">
							</div>
							<textarea name="city" id="" cols="30" rows="8" data-valuem = "Куда поедем" placeholder="Куда поедем" class="contacts-form-tour__textarea"></textarea>
						</div>
						<button type="button" class="new_send_btn newButton" data-formid = "tur_so_stranitsy_kontakty" data-formmsg="Подобрать тур со страницы Контакты">Подобрать</button>
						</div>
					</form>
				</div>
			</div>
	
		</div>
	</div>
	
<?php get_footer(); ?>