<?php 
/*
* Template Name: Оплата принята YooKassa
*/
header('Cache-Control: no-store, private, no-cache, must-revalidate'); // HTTP/1.1
header('Cache-Control: pre-check=0, post-check=0, max-age=0, max-stale = 0', false); // HTTP/1.1
header('Pragma: public');
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past  
header('Expires: 0', false); 
header('Last-Modified: '.gmdate('D, d M Y H:i:s') . ' GMT');
header('Pragma: no-cache');
?>

<?php
    $source = file_get_contents('php://input');
    $requestBody = json_decode($source, true);


    use YooKassa\Model\Notification\NotificationSucceeded;
    use YooKassa\Model\Notification\NotificationWaitingForCapture;
    use YooKassa\Model\NotificationEventType;

    try {
      $notification = ($requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
        ? new NotificationSucceeded($requestBody)
        : new NotificationWaitingForCapture($requestBody);
    } catch (Exception $e) {
        // Обработка ошибок при неверных данных
    }

    $payment = $notification->getObject();

    file_put_contents("yoo_rez.json", json_encode($payment));

    if (($payment->status === "waiting_for_capture")|| ($payment->status === "succeeded"))
	{
		$amount = $payment->amount->value; 
        $order_number = $payment->id;
		global $wpdb;
		$wpdb->update( 'mt_pay_orders', [
			'yoo_status' => $payment->status,
        ], ['sber_order' => $payment->id] );

        if ($payment->status === "waiting_for_capture")
		    $txt = "<b>Заказ ждет подстверждения в кабинете</b>\n\r";
        else
            $txt = "<b>Заказ подтвержден</b>\n\r";

		$txt .= "<b>ID YooKassa: </b>".$payment->id."\n\r";
		$txt .= "<b>Сумма: </b>". $amount ." руб. \n\r";

		message_to_telegram($txt);
		$order_info = $wpdb->get_results( "SELECT * FROM `mt_pay_orders` WHERE `sber_order` = '". $payment->id ."'" );

		$sendMsgMain = "Ваша оплата " .$amount. "р. принята. Ожидайте звонка.";
		
		if (!empty($order_info))
			file_get_contents("https://" . SMS_LOGIN . ":" . SMS_TOKEN . "@gate.smsaero.ru/v2/sms/send?number=". str_replace(['(',')','-',' '], "",$order_info[0]->cl_phone) ."&text=" . $sendMsgMain . "&sign=" . "Mir_Turizma" . "&channel=SERVICE");
	}

?>

	