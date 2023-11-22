<?php 
/*
* Template Name: Оплата принята
*/
header('Cache-Control: no-store, private, no-cache, must-revalidate'); // HTTP/1.1
header('Cache-Control: pre-check=0, post-check=0, max-age=0, max-stale = 0', false); // HTTP/1.1
header('Pragma: public');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past  
header('Expires: 0', false); 
header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
header('Pragma: no-cache');

include "Sber/SberApiServices.php";



if (isset($_REQUEST["orderId"])) {
    
    $orderId = $_REQUEST["orderId"];
	
    $sber = new SberApiServices();
	
	$sber_order = $sber->getOrderStatus($orderId );

	if ($sber_order['orderStatus'] == 2)
	{
		$amount = intval($sber_order['amount']) / 100; 
        $order_number = $sber_order['orderNumber'];
		global $wpdb;
		$wpdb->update( 'mt_pay_orders', [
			'sber_status' => $sber_order['orderStatus'],
        ], ['sber_order' => $orderId] );

		$txt = "<b>Заказ оплачен</b>\n\r";
		$txt .= "<b>ID сбербанка: </b>".$orderId."\n\r";
		$txt .= "<b>ID сайта: </b>".$sber_order['orderNumber']."\n\r";
		$txt .= "<b>Сумма: </b>". $amount ." руб. \n\r";

		message_to_telegram($txt);
		$order_info = $wpdb->get_results( "SELECT * FROM `mt_pay_orders` WHERE `sber_order` = '". $orderId ."'" );

		$sendMsgMain = "Ваша оплата " .$amount. "р. принята. Ожидайте звонка.";
		
		if (!empty($order_info))
			file_get_contents("https://" . SMS_LOGIN . ":" . SMS_TOKEN . "@gate.smsaero.ru/v2/sms/send?number=". str_replace(['(',')','-',' '], "",$order_info[0]->cl_phone) ."&text=" . $sendMsgMain . "&sign=" . "Mir_Turizma" . "&channel=SERVICE");
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

				<h2>Ваша оплата принята</h2>
			    
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
					<?php the_content();?>
				<?php endwhile;?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>