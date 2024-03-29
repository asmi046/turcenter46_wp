<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package accauntant
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta name="yandex-verification" content="b4ee04063d8fdee2" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
	<title><?php wp_title(); ?></title>

	
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600|PT+Sans:wght@400;700&display=swap&subset=cyrillic" rel="stylesheet">

	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> 
	<meta name="viewport" content="width=device-width">
	

	<link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/icon.png" />
	
	<?php 
		//if ($post->ID == 3222) { 
		if ( false ) { 
	?>
		<script src="https://securecardpayment.ru/payment/docsite/assets/js/ipay.js"></script>
		<script>
			var ipay = new IPAY({api_token: '1vkpic9blj0mm7f01d1mh7ae63'});
		</script>
	<? } ?>
	
	<?php wp_head(); ?>
  

</head>

<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(29416892, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        trackHash:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/29416892" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<body <?php body_class('page-booking'); ?>>
<?php include ("arcticWindow.php"); ?>
<?php include ("awNew.php"); ?>
  <div id="page" class="site">
  	<header class="header">
      <?php get_template_part('template-parts/menu-top-bus');?>
  		<div class="header-middle">
  			<div class="container-booking">
  				<!-- <a href="<?php echo home_url('/');?>" class="logo-booking" style="background-image: url(<?php echo get_template_directory_uri();?>/images/mir/logo.png);"></a> -->
          <div class="logo-print only-print" style="background-image: url(<?php echo get_template_directory_uri();?>/images/mir/logo.png);"></div>
  				<div class="header-schedule">
  					<div class="header-schedule__item">Пн - Пт: 10:00 -20:00</div>
  					<div class="header-schedule__item">Cб - Вс: 10:00 -18:00</div>
  					<a href="<?php echo get_permalink(10);?>" class="header-schedule__item header-schedule__item-address">г. Курск ул. Ленина 12 (ЦУМ, 3 этаж)</a>
  				</div>
          <div class="header-soc">
            <div class="header-soc-wrap">
              <a target="_blank" href="<?php echo carbon_get_theme_option("vk_lnk");?>" style="background-image: url(<?php echo get_template_directory_uri();?>/images/vk.svg);"></a>
              <a target="_blank" href="<?php echo carbon_get_theme_option("inst_lnk");?>" style="background-image: url(<?php echo get_template_directory_uri();?>/images/instagram.svg);"></a>
            </div>
            <a href="mailto:turcentr46@yandex.ru" class="header-email">turcentr46@yandex.ru</a>
          </div>
  				<a href="#" onclick="ym(29416892,'reachGoal','OpenRecall')" class="g-button obrzv-oppen">Заказать звонок</a>
  			</div>
  		</div>
  	</header>
    <div id="content" class="site-content">