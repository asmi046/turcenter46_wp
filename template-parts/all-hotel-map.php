<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

<?
$mapsPoint = [];

$posts_hotel = get_posts( array(
	'numberposts' => -1,
	'category'    => 4,
));

foreach ($posts_hotel as $h) {
    
    $mapsPoint[] = [
        "point" =>  carbon_get_post_meta($h->ID, 'otel_map'),
        "name" =>  $h->post_title,
        "lnk" =>  get_the_permalink($h->ID),
        "img" =>  get_the_post_thumbnail_url($h->ID, "medium"),
      ]; 

}
?>

<script>	
    let mapinfo = <? echo json_encode($mapsPoint);?>;
    console.log(mapinfo)
</script>	

<script>	
	var myMap3, myPlacemark, myPlacemark2;

	
	ymaps.ready(init);

	function init () {
		// Создание экземпляра карты и его привязка к контейнеру с
		// заданным id ("map").
		myMap3 = new ymaps.Map('all_hotel_map', {
			center: [44.02183486277301,39.17140031255061], 
			zoom: 7,
			controls: ['zoomControl', 'fullscreenControl']
		}, {
			searchControlProvider: 'yandex#search'
		});
		
        var myGeoObjects = [];

        for (let i = 0; i<mapinfo.length; i++ )
        {
            let pCoord = mapinfo[i].point.substr(1,mapinfo[i].point.length-2);
        
            let content = 
            '<img class = "mainImg" width = "100" src = "'+ mapinfo[i].img +'"/>'+
            '<strong>'+mapinfo[i].name+'</strong><br/>'+
            '<a class = "blueLnk" href = "'+mapinfo[i].lnk+'">Подробнее...</a>';

            let pin = new ymaps.Placemark([parseFloat(pCoord.split(",")[0]), parseFloat(pCoord.split(",")[1])], {
                                            balloonContent: content, 
                        },
                        {
                            iconLayout: 'default#image',
							iconImageHref: '<?php bloginfo("template_url"); ?>/images/signs.svg',
							iconImageSize: [50, 74],
							iconImageOffset: [-25, -74]
                        }
            );

            myGeoObjects.push(pin);
        }

        var clusterer = new ymaps.Clusterer({
            clusterDisableClickZoom: false,
            clusterOpenBalloonOnClick: false,
        });
        
        clusterer.add(myGeoObjects);
        myMap3.geoObjects.add(clusterer);

	}
	
						
					</script>

<div id = "all_hotel_map" class = "all_hotel_map">

</div>