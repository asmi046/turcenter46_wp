<?php
class SberApiServices {

    public function test() {
        echo "GOOD";
    }

    public function registerOrder($total, $order, $returnUrl){
        $url = "https://securepayments.sberbank.ru/payment/rest/register.do?amount=".intval($total)."00&language=ru&orderNumber=".$order."&password=".SBER_PASS."&userName=".SBER_LOGIN."&returnUrl=".$returnUrl."&sessionTimeoutSecs=1200";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        if( $response )
            return json_decode($response, true);

        return false;
	}

    public function getOrderStatus($orderId){
        $url = "https://securepayments.sberbank.ru/payment/rest/getOrderStatusExtended.do?orderId=".$orderId."&password=".SBER_PASS."&userName=".SBER_LOGIN;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        if( $response )
            return json_decode($response, true);

        return false;
	}


}
