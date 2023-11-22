<?php 
/*
* Template Name: Отправка данных на оплату
*/
header('Cache-Control: no-store, private, no-cache, must-revalidate'); // HTTP/1.1
header('Cache-Control: pre-check=0, post-check=0, max-age=0, max-stale = 0', false); // HTTP/1.1
header('Pragma: public');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past  
header('Expires: 0', false); 
header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
header('Pragma: no-cache');

include "Sber/SberApiServices.php";

use YooKassa\Client;

$price = $_REQUEST["price"];
$type = $_REQUEST["type"];
$message = $_REQUEST["message"];
$pay_pik = (isset($_REQUEST["pic"]))?$_REQUEST["pic"]:"https://www.turcentr46.ru/wp-content/uploads/2023/07/autobus-belosaraika.jpg";

$thencs_page = get_the_permalink(8989); 
$error_page = get_the_permalink(8991); 

$order_number = "mt-".uniqid();

if (!empty($price) && isset($_REQUEST["dopay"])) {
	// $sber = new SberApiServices();
	
	// $sber_order = $sber->registerOrder($price, $order_number, $thencs_page);

	$client = new Client();
	$client->setAuth(CASSA_SHOP_ID, CASSA_TOKEN);

	
	$payment = $client->createPayment(
		array(
			'amount' => array(
				'value' => $price,
				'currency' => 'RUB',
			),
			'confirmation' => array(
				'type' => 'redirect',
				'return_url' => $thencs_page,
			),
			'capture' => true,
			'description' => 'Заказ №'.$order_number,
			'metadata' => [
				'order_id' => $order_number
			]
		),
		uniqid('', true)
	);

	// return ['pay_url' => $payment->confirmation->confirmation_url];
	// echo "<pre>";
	// var_dump($payment->id);
	// echo "</pre>";
	// return;
	
	if (isset($payment->confirmation->confirmation_url))
	{
			
		global $wpdb;
		$wpdb->insert( 'mt_pay_orders', [
			'sber_order' => $payment->id,
			'type' => $type,
			'message' => $message,
			'price' => $price,

			'cl_name' => $_REQUEST["namecl"],
			'cl_phone' => $_REQUEST["tel"],
			'cl_docn' => $_REQUEST["data"],
			'cl_datar' => $_REQUEST["number"],
		] );

		$txt = "<b>Зарегистрирован заказ на оплату</b>\n\r";
		$txt .= "<b>ID YooKassa: </b>".$payment->id."\n\r";
		$txt .= "<b>Тип: </b>".$type."\n\r";
		$txt .= "<b>Сообщение: </b>".$message."\n\r";
		$txt .= "<b>Цена: </b>".$price." руб. \n\r";
		$txt .= "<b>Клиент: </b>".$_REQUEST["namecl"]."\n\r";
		$txt .= "<b>Телефон: </b>".$_REQUEST["tel"]."\n\r";
		$txt .= "<b>Дата рождени: </b>".$_REQUEST["data"]."\n\r";
		$txt .= "<b>Номер документа: </b>".$_REQUEST["number"]."\n\r";

		message_to_telegram($txt);

		header("Location: " . $payment->confirmation->confirmation_url);
	}
	else 
		{
			// var_dump ($sber_order);
			header("Location: " . $error_page);	
		}
}

get_header("booking"); 
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
	
			<div class = "content ">

                <form class="form_in_page" action="" method="GET">
                    <input type="hidden" name="son" value="<?php echo $order_number; ?>">
                    <input type="hidden" name="type" value="<?php echo $type; ?>">
                    <input type="hidden" name="message" value="<?php  echo $message; ?>">
                    <input type="hidden" name="price" value="<?php  echo $price; ?>">
                    
					<? if (!empty($price)) {?>
						<div class="pay_inform_wrp">
							<div class="ing_wrp">
								<img src="<?php echo $pay_pik;?>" alt="">
							</div>
							<div class="txy">
								<p><?php echo $message; ?></p>
							</div>
						</div>
						<div class="price_input">
							Цена: <?php  echo $price; ?> ₽
						</div>
					<? } else {?>
						<div class="price_input price_input_err">
							Цена не определена
						</div>
					<? } ?>

					<input required type="text" data-valuem = "ФИО" name="namecl" placeholder="*ФИО">
                    <input required type="tel" data-valuem = "Телефон" name="tel" placeholder="*Телефон">
                    <input type="text" data-valuem = "Дата рождения" name="data" placeholder="Дата рождения">
                    <input type="text" data-valuem = "Номер документа (паспорт или свидетельство)" name="number" placeholder="Номер документа (паспорт или свидетельство)">

					<label for="oferta_chekc">
						<input id="oferta_chekc" type="checkbox" name="podtv" required checked>
						<span>Я согласен с условиями <a href="<?echo get_the_permalink(9005); ?>">публичной аферты</a></span>
					</label>
					
                    <p class="win-forms-policy">Заполняя данную форму вы соглашаетесь с <a href="<?echo get_the_permalink(1312); ?>">политикой конфиденциальности</a></p>

	                <button type="submit" name="dopay" class="newButton">Оплатить тур</button>
                </form>
                

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
					<?php the_content();?>
				<?php endwhile;?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>