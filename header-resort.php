<?php
if (isset($_REQUEST["relogin"]))
{
		SetCookie('taReg', "11", time()-3600, "/", "mirturizma46.ru");
		SetCookie('taRegAdm', "11", time()-3600, "/", "mirturizma46.ru");
		SetCookie('taRegName', "11", time()-3600, "/", "mirturizma46.ru");
		header( 'Refresh: 0; url='.get_the_permalink(12));	
}
$class_recreation = '';
if(is_page_template('page-turkey.php')) {
	$class_recreation = 'recreation';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>> 
<head profile="http://gmpg.org/xfn/11"> 
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-‎61425340-1', 'auto');
  ga('send', 'pageview');

</script>
<meta name="yandex-verification" content="b4ee04063d8fdee2" />
	<meta name="google-site-verification" content="GD2KN4VvI4E2eEJKwRa2NSn1wN0m9R5K_mGMcDu2Iu0" />
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title><?php wp_title(); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/fonts/font-awesome.min.css" type="text/css" media="screen" />
	<!--
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?ver=1.1.7" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/print.css" type="text/css" media="print">
	-->
	
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> 
	<meta name="viewport" content="width=device-width">
	
	<!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
	<!-- <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script> -->
	<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
	<!-- файл общих JavaScript функций -->
	<!-- <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.cookie.js"></script> -->
	<!-- <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.maskedinput.js"></script> -->
	<!-- <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js"></script> -->
	
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/images/icon.png" />
    <?php wp_head(); // API Hook ?> 
	
</head> 
<body>

	<script>
(function () {
    window.advcake_int = {
        init: function () {
            if (advcake_int.get_q('source') !== '' || advcake_int.get_q('utm_source') !== '' || advcake_int.get_q('gclid') !== '' || advcake_int.get_q('fbclid') !== '' || advcake_int.get_q('yclid') !== '' || advcake_int.get_q('ymclid') !== '') {
                advcake_int.setCookie("advcakeUrl", location.href, {
                    expires: 2678400, domain: advcake_int.getDomain(), path: "/"
                });
            }
        },
        get_q: function (e) {
            var t = window.location.search;
            t = t.match(new RegExp(e + "=([^&=]+)"));
            return t ? t[1] : '';
        },
        getDomain: function(){
            var splittedDomain = location.hostname.split('.');
            if(['com', 'net', 'org', 'co'].indexOf(splittedDomain[splittedDomain.length-2]) !== -1){
                return '.'+[splittedDomain[splittedDomain.length-3],splittedDomain[splittedDomain.length-2],splittedDomain[splittedDomain.length-1]].join('.');
            }
            return '.'+[splittedDomain[splittedDomain.length-2],splittedDomain[splittedDomain.length-1]].join('.');
        },
        setCookie: function (e, t, n) {
            n = n || {};
            var o = n.expires;
            if ("number" === typeof o && o) {
                var r = new Date();
                r.setTime(r.getTime() + 1e3 * o);
                o = n.expires = r;
            }
            if (o && o.toUTCString) {
                n.expires = o.toUTCString();
            }
            t = encodeURIComponent(t);
            var i = e + "=" + t;
            for (var a in n) {
                i += "; " + a;
                if (!n.hasOwnProperty(a)) {
                    continue;
                }
                var c = n[a];
                if (c !== true) {
                    i += "=" + c;
                }
            }
            window.document.cookie = i;
        }
    };
    advcake_int.init();
})();

</script>

	
	<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter29416892 = new Ya.Metrika({
                    id:29416892,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    trackHash:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/29416892" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = 'https://vk.com/rtrg?...';</script>
	<script>
		jQuery(document).ready(function($) { 
			$(".wpcf7-response-output").click(function(){ 
				$(this).css("display", "none");
			});
			
			$(window).scroll(function () { 
				if ($(this).scrollTop() > 500) {
					$('.osnNaprFixed').show();
					$('.samolet').hide();
				}
				
				if ($(this).scrollTop() < 500) {
					$('.osnNaprFixed').hide();
					$('.samolet').show();
				}
			});
			
			
			
		});		
	</script>

<div class = "main <?php echo $class_recreation?>">
	<?php if (isset($_COOKIE['taReg'])): ?>
		<div class = "autMenu">
			Вы вошли как: <?php echo $_COOKIE['taRegName']; ?> <a href = "?relogin=1" title = "Выйти из личного кабинета"><i class="fas fa-share-square"></i></a>
		</div>
	<?php endif;?>
<div class = "upBtn">
	<i class="fas fa-arrow-circle-up"></i>
</div>

<div class = "lightbox">
	
	<div class = "closeBtn">
		<i class="fas fa-times"></i>
	</div>
	
	<div class = "btnStr prevBtn">
		<i class="fas fa-chevron-left"></i>
	</div>
	
	<div class = "img">
	
	</div>
	
	<div class = "btnStr nextBtn">
		<i class="fas fa-chevron-right" aria-hidden="true"></i>
	</div>
</div>

<div class = "osnNaprFixed">
	<div class = "centerInLine">
		<?php include("osnBtn.php");?>
	</div>
	<div class = "headBtnToggel">
		<i class="fas fa-chevron-circle-up"></i>
	</div>
</div>


<script>
	jQuery(document).ready(function($) { 
		

	});		
</script>


<div class = "line headLine">
	<div class = "centerInLine">
		<a href = "<?php bloginfo('url'); ?>" >
		<img class = "logo" src = "<?php bloginfo('template_url'); ?>/images/logo.png" alt = "Туристический оператор Мир туризма" title = "Туристический оператор Мир туризма" />
		</a>

		<div class = "menu">
			<div class = "phoneInHead">
				<?php 
					$options = get_option( 'wpuniq_theme_options' ); 
				?>
				
				<a onclick = 'yaCounter29416892.reachGoal("clickCall");' href = 'tel:<?php echo $options["phonelnk"]; ?>'><?php echo $options["phone"]; ?></a>
			</div>
			<div class = "meuBtn"><i class="fas fa-bars"></i></div>
			
			<!-- Меню -->
			<?php //wp_nav_menu( array('menu' => 'Главное меню', 'container' => false, 'items_wrap' => '<ul id="%1$s" class="%2$s"><li><a href = "http://www.mirturizma46.ru/turi-na-more/">Автобусные туры на море</a></li><li onclick="yaCounter29416892.reachGoal("/OpenRecall"/);" class = "zakZv"><i class="fa fa-volume-control-phone" aria-hidden="true"></i> Заказать звонок</li>%3$s</ul>' )); ?>
			<?php demo_menu();?>

		
			<?php //head_menu();?>
			<?php include('callback-wrapper.php')?>
		</div>

	</div>

</div>
<?php include ("mini-sidebar.php"); ?>
<?php include ("arcticWindow.php"); ?>
<?php //include ("black-friday.php"); ?>