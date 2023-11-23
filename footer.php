		<?php if(!is_page(4458)):?>
		<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
		
		<script async>	
			var myMap, myMap2,
			myPlacemark, myPlacemark2;

			// Дождёмся загрузки API и готовности DOM.
			ymaps.ready(init);

			function init () {
				// Создание экземпляра карты и его привязка к контейнеру с
				// заданным id ("map").
				myMap = new ymaps.Map('leftMap', {
					center: [51.73415798382783,36.19187236903374], 
					zoom: 17,
					controls: []
				}, {
					searchControlProvider: 'yandex#search'
				});
				
				myMap2 = new ymaps.Map('rightMap', {
					center: [51.7479146421563,36.23654970237729], 
					zoom: 17,
					controls: []
				}, {
					searchControlProvider: 'yandex#search'
				})
				
				myPlacemark = new ymaps.Placemark([51.734402113560286,36.19264484523003], {
					iconContent: '',
					hintContent: '<b>Адрес:</b> г. Курск ул. Ленина 12 (ЦУМ, 3 этаж)',
					balloonContent: '<b>Адрес:</b> г. Курск ул. Ленина 12 (ЦУМ, 3 этаж)'
				}, {
                        iconLayout: 'default#image',
						iconImageHref: '<?php bloginfo("template_url"); ?>/images/strl1.png',
						iconImageSize: [50, 74],
						iconImageOffset: [-25, -74]
                    }
				
				);
				
				myPlacemark2 = new ymaps.Placemark([51.74788800365302,36.23703786441799], {
				iconContent: '',
				hintContent: '<b>Адрес:</b> г. Курск ул. Союзная 6А (Империал, 2 этаж)	',
				balloonContent: '<b>Адрес:</b> г. Курск ул. Союзная 6А (Империал, 2 этаж)'
				}, { 
					    iconLayout: 'default#image',
						iconImageHref: '<?php bloginfo("template_url"); ?>/images/strl2.png',
						iconImageSize: [50, 74],
						iconImageOffset: [-25, -74]
				});
			
			
			

				myMap.geoObjects.add(myPlacemark);
				myMap2.geoObjects.add(myPlacemark2);
			
			}
			
			jQuery(document).ready(function($) {  
				$("#adres1").click(function(){ 
					  myMap.setCenter(myPlacemark.geometry.getCoordinates(), 18);
				});
				
				$("#adres2").click(function(){ 
					  myMap2.setCenter(myPlacemark2.geometry.getCoordinates(), 18);
				});
			
			});
			
		</script>
	<div class = "line contacts">
		<div class = "mapInMain" id = "leftMap">
			
		</div>
		
		<div class = "contactsInCenter">
			<h2>Контакты</h2>

			<div class="contacts__wrap">
				<!-- <div class="contacts__img">
					<img src="<?php echo get_template_directory_uri();?>/images/contacts-img-big.jpg" alt="">
				</div> -->
				<div class="contacts__adress">
					<!-- <div class="contacts__adress-text">Адрес:</div> -->
					<?php $options = get_option( 'wpuniq_theme_options' ); ?>
					<div class="contacts__adress-number"><?php echo $options["adres1"]; ?></div>
				</div>
				<div class="contacts__adress">
					<!-- <div class="contacts__adress-text">Телефон:</div> -->
					<?php $options = get_option( 'wpuniq_theme_options' ); ?>
					<div class="contacts__adress-number">
						<a href="tel:+<?php echo preg_replace('/[^0-9]/', '', $options["phone"]); ?>"><?php echo $options["phone"]; ?></a>	
					 
				</div>
			</div>
			
			<div class = "timeWork"> 
				Время работы:</br>
				<table>
					<tr>
						<th>Пн - Пт:</th>
						<th>10:00</th>
						<th>-</th>
						<th>20:00</th>
					</tr>
					<tr>
						<th>Cб - Вс:</th>
						<th>10:00</th>
						<th>-</th>
						<th>18:00</th>
					</tr>
					<tr>
				</table>
			</div>
		</div>
		
		<div class = "mapInMain" id = "rightMap">
		</div>

		
		
		
	</div>
	
	<?php endif;?>
	<div class = "line footer">
		<div class = "centerInLine">
			<div class = "stbF" id = "stbF1">
				<h2>Меню</h2></br>
				<?php wp_nav_menu( array('menu' => 'Главное меню', 'container' => false )); ?>
			</div>
			
			<div class = "stbF" id = "stbF2">
				<h2>Наши партнеры</h2></br>
				<a href = "<?php echo get_the_permalink(2531);?>">Все наши партнеры</a>
			</div>
			
			<div class = "stbF" id = "stbF3">
				<h2>Мы в соцсетях</h2></br>
				<a class = "footer_icon footer_vk" href = "https://vk.com/mirturizma46"></a>
				<a class = "footer_icon footer_ok" href = "https://ok.ru/group/54374461079804"></a>
				<a class = "footer_telegramm footer_telegramm-icon" href = "https://t.me/mirturizma46"></a>
				<!-- <a class = "footer_icon footer_insta" href = "https://www.instagram.com/mirturizma46/"></a> --> 
				
				<!-- <div class = "rs">
					Разработка сайта: <a href = "https://asmi-studio.ru/">Asmi-Studio</a> 
				</div> -->
			
			</div>
			
		</div>
	</div>
	
</div>
<?php 
// echo '<pre>';
// var_dump($_COOKIE);
// echo '</pre>';
?><style>
	.label_39._bottom_3v._init_Tk, .label_39._left_2d._init_Tk, .label_39._right_1y._init_Tk {
    opacity: 1;
    bottom: 47px!important;

}
._orinationRight_25.wrap_mW {
	bottom: 50px;
}
</style>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'JXb7O313pV';var d=document;var w=window;function l(){var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();
</script>
<!-- {/literal} END JIVOSITE CODE -->
<style>
	.label_39._bottom_3v._init_Tk, .label_39._left_2d._init_Tk, .label_39._right_1y._init_Tk {
    opacity: 1;
    bottom: 47px!important;
}
</style>
<?php wp_footer(); ?>


</body>
</html>