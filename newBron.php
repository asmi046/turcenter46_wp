<?php
//Количество дней между датами

function countDaysBetweenDates($d1, $d2)
{
    $d1_ts = strtotime($d1);
    $d2_ts = strtotime($d2);

    $seconds = abs($d1_ts - $d2_ts);
    
    return floor($seconds / 86400);
}


	//Генератор паролей
	function generate_password($number)  
	{  
		$arr = array('1','2','3','4','5','6',  
					 '3','2','1','9','8','7',  
					 '4','7','8','5','5','6',  
					 '5','6','9','6','4','8',  
					 '5','4','3','2','1','2',  
					 '5','4','3','3','2','1',  
					 '4','5','6','7','8','9',  
					 '5','6','7','2','3','4',  
					 '5','3','4','7','6','5',  
					 '6','7','8','6','4','5',  
					 '8','2','4','5','8','6',  
					 '4','2','5','6','6','7',  
					 '4','1','3','7','5','4',  
					 '3','4','4','7');  
		// Генерируем пароль  
		$pass = "";  
		for($i = 0; $i < $number; $i++)  
		{  
		  // Вычисляем случайный индекс массива  
		  $index = rand(0, count($arr) - 1);  
		  $pass .= $arr[$index];  
		}  
		return $pass;  
	}  

	//Разбор информации об отеле 
	function get_hotel_info_r($hotelstr) {
		
		$hotelname = explode(" -> ", $hotelstr)[0];
		$hotelnumbers = explode(" -> ", $hotelstr)[1];
		
		
		$numbers = explode(" | ", $hotelnumbers);
		
		foreach ($numbers as $number) {
			$tmp = explode(" $$ ", $number);
			if (empty($tmp[0])) break;
			$hotelnumbersarr[] = array("name" => $tmp[0], "count" => $tmp[1], "all" => print_r($tmp,true),"str" => $hotelstr);
		}
		
		$rezarr["hotelName"] = $hotelname; 
		$rezarr["hotelnumbers"] = $hotelnumbersarr; 
	
		return $rezarr;
		
	}

	//Получение списка рейсов по направлению
	add_action( 'wp_ajax_get_reises', 'get_reises' );
	add_action( 'wp_ajax_nopriv_get_reises', 'get_reises' );

	function get_reises() {
	  if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	  }
	  
	  if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
			$naprid = $_REQUEST["naprid"];
			
			if (empty($naprid)) wp_die( 'Передайте направление!', '', 403 );
	
			global $wpdb;		
			$rez = $wpdb->get_results("SELECT * FROM `mt_br_reis` WHERE `turtype` = ".$naprid); 	
				
			wp_die(json_encode($rez));
			
	  } else {
		wp_die( 'НО-НО-НО!', '', 403 );
	  }
	}

	
	//Получение рассадки по рейсу
	add_action( 'wp_ajax_get_reises_rassadka', 'get_reises_rassadka' );
	add_action( 'wp_ajax_nopriv_get_reises_rassadka', 'get_reises_rassadka' );

	function get_reises_rassadka() {
	  if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	  }
	  
	  if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
			$naprid = $_REQUEST["naprid"];
			$reisid = $_REQUEST["reisid"];
			
			if (empty($naprid)) wp_die( 'Передайте направление!', '', 403 );
			if (empty($reisid)) wp_die( 'Передайте направление!', '', 403 );
	
			global $wpdb;		
			$rez = $wpdb->get_results("SELECT * FROM `mt_br_mesto` WHERE `reisID` = ".$reisid); 	
				
			wp_die(json_encode($rez));
			
	  } else {
		wp_die( 'НО-НО-НО!', '', 403 );
	  }
	}
	
	//Регистрация пользователя
	add_action( 'wp_ajax_register_user', 'register_user' );
	add_action( 'wp_ajax_nopriv_register_user', 'register_user' );

	function register_user() {
	  if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	  }
	  
	  if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			//include_once('SmsaeroApiV2.class.php');
			
			$pass = generate_password(5);
			$sendMsg = "Ваш пароль для входа: ".$pass;
			$sendMsgMain = "Новый пользователь: ".$_REQUEST["username"]." Телефон: ".$_REQUEST["userphone"];
			
			
			global $wpdb;
			$rez = $wpdb->insert(
					'mt_br_user_fl',
					array( 
						'name' => $_REQUEST["username"], 
						'phone' => $_REQUEST["userphone"], 
						'mail' => $_REQUEST["useremail"], 
						'pass' => md5($pass."mt2020") 
					),
					array( '%s', '%s', '%s', '%s' )
				);
			
			if (!empty($rez)) {	
				$sendphone = str_replace(array('+','-', ' '), "",$_REQUEST["userphone"]);
				
				$homepage = file_get_contents("https://" . SMS_LOGIN . ":" . SMS_TOKEN . "@gate.smsaero.ru/v2/sms/send?number=".$sendphone."&text=".$sendMsg."&sign="."Mir_Turizma"."&channel=SERVICE");
				
				file_get_contents("https://" . SMS_LOGIN . ":" . SMS_TOKEN . "@gate.smsaero.ru/v2/sms/send?number=+79192777557&text=".$sendMsgMain."&sign="."Mir_Turizma"."&channel=SERVICE");
				
				$headers = array(
					'From: ТурЦентр <noreply@turcentr46.ru>',
					'content-type: text/html'
				);

				$sendmailadr = array("asmi046@gmail.com","litvinov-pa@yandex.ru", "mirturizma-kursk2@yandex.ru");
				
				wp_mail( $sendmailadr, "Новое физлицо", $sendMsgMain, $headers );
				
				wp_die($rez);	
			} else {
				wp_die( 'При регистрации произошла ошибка попробуйте позднее!', '', array('response' => 403) );
			}
			
			
	  } else {
		wp_die( 'НО-НО-НО!', '', 403 );
	  }
	}
	
	
	//Восстановление пароля
	add_action( 'wp_ajax_pass_rec', 'pass_rec' );
	add_action( 'wp_ajax_nopriv_pass_rec', 'pass_rec' );

	function pass_rec() {
	  if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	  }
	  
	  if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			//include_once('SmsaeroApiV2.class.php');
			
			$pass = generate_password(5);
			$sendMsg = "Ваш пароль для входа: ".$pass;
			
			global $wpdb;
			
			$user = $wpdb->get_results("SELECT * FROM `mt_br_user_fl` WHERE `phone` = '".$_REQUEST["userphone"]."'");
			
			if (empty($user)) wp_die( 'Пользователя с таким телефоном нет в базе!', '', array('response' => 403) );
			
			
			
			$rez = $wpdb->update(
					'mt_br_user_fl',
					array( 
						'pass' => md5($pass."mt2020") 
					),
					array( 'id' => $user[0]->id )
				);
			
			if (!empty($rez)) {	
				$sendphone = str_replace(array('+','-', ' '), "",$_REQUEST["userphone"]);
			
				$homepage = file_get_contents("https://" . SMS_LOGIN . ":" . SMS_TOKEN . "@gate.smsaero.ru/v2/sms/send?number=".$sendphone."&text=".$sendMsg."&sign="."Mir_Turizma"."&channel=DIRECT");
				echo "https://" . SMS_LOGIN . ":" . SMS_TOKEN . "@gate.smsaero.ru/v2/sms/send?number=".$sendphone."&text=".$sendMsg."&sign="."SMS_86471"."&channel=SERVICE";
				wp_die($homepage);	
			} else {
				wp_die( 'При регистрации произошла ошибка попробуйте позднее!', '', array('response' => 403) );
			}
			
			
	  } else {
		wp_die( 'НО-НО-НО!', '', 403 );
	  }
	}
	

	//Авторизация пользователя
	add_action( 'wp_ajax_login_user', 'login_user' );
	add_action( 'wp_ajax_nopriv_login_user', 'login_user' );

	function login_user() {
	  if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	  }
	  
	  if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			global $wpdb;
			$rez = $wpdb->get_results("SELECT * FROM `mt_br_user_fl` WHERE `phone` = '".$_REQUEST["userphone"]."'");
			
			if (empty($rez)) wp_die( 'Логин или пароль не верный!', '', 403 ); 
			
			if ($rez[0]->pass === md5($_REQUEST["userpass"]."mt2020"))
			{
				setcookie('identity', md5($rez[0]->name.$rez[0]->phone."mt2020"), 0, '/', "turcentr46.ru");
				setcookie('phone', $_REQUEST["userphone"], 0, '/', "turcentr46.ru");
				setcookie('name', $rez[0]->name, 0, '/', "turcentr46.ru");
				setcookie('uflmail', $rez[0]->mail, 0, '/', "turcentr46.ru");
				wp_die( 'Вы авторизовались');
				
			} else {
				wp_die( 'Логин или пароль не верный!', '', 403 ); 
			}
			
			
	  } else {
		wp_die( 'НО-НО-НО!', '', 403 );
	  }
	}	
	
	
	//Выход из системы
	add_action( 'wp_ajax_relogin', 'relogin' );
	add_action( 'wp_ajax_nopriv_relogin', 'relogin' );

	function relogin() {
	  if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	  }
	  
	  if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
				
				setcookie('identity', "", time()-3600, '/', "turcentr46.ru");
				setcookie('phone', "", time()-3600, '/', "turcentr46.ru");
				setcookie('name', "", time()-3600, '/', "turcentr46.ru");
				setcookie('uflmail', "", time()-3600, '/', "turcentr46.ru");
				wp_die( 'Вы вышли');
				
	  } else {
		wp_die( 'НО-НО-НО!', '', 403 );
	  }
	}
	
	
	//Новая бронь
	add_action( 'wp_ajax_new_bron_all', 'new_bron_all' );
	add_action( 'wp_ajax_nopriv_new_bron_all', 'new_bron_all' );

	function new_bron_all() {
	  if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	  }
	  
	  if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			
			$allRezMesta = $_POST['allRezMesta'];
			$razmeshenie = $_POST['razmeshenie'];
				
			$registrid = date("h")."-".date("i")."-A-".(1000+rand(100,9000));
			
			$message = "<img src = '".get_bloginfo("template_url")."/images/more_mail_ban.png' /><br/>";
			$rezstr = "";
			foreach($allRezMesta as $elem) {
				
				global $wpdb;
				$addRez = $wpdb->get_results("SELECT * FROM `mt_br_mesto` WHERE `reisID` = ".$elem["reisID"]." AND `mestoNum` = ".$elem["mestoNum"]." AND `mestoID` = '".$elem["mestoID"]."'");
				
				$actionZag = "Забронировано место";
				
				$insertedElem =0;
				
				if (empty($addRez))
				{
					$flg = $wpdb->insert("mt_br_mesto",
						array(
							"reisID" => $elem["reisID"], 
							"mestoNum" => $elem["mestoNum"], 
							"direct" => $elem["direct"], 
							"F" => $elem["F"], 
							"I" => $elem["I"], 
							"O" => $elem["O"], 
							"pasportnum" => $elem["pasportnum"], 
							"phone" => $elem["phone"], 
							"punkt" => $elem["punkt"], 
							"coment" => $elem["coment"], 
							"agentmail" => $elem["agentmail"],
							"doctype" => $elem["doctype"],
							"mestoPos" => $elem["mestoOtpr"],
							"mestoPrib" => $elem["mestoPrib"],
							"mestoID" => $elem["mestoID"],
							"directID" => $elem["directID"],
							"dataRod" => $elem["dataRod"],
							"usType" => 5,   
							"hotelName" => $elem["hotelName"],
							"registrid" => $registrid,
							"managername" => "Физлицо",
							"fullprice" => empty($elem["fullprice"])?0:$elem["fullprice"],
							"predoplata" => empty($elem["predoplata"])?0:$elem["predoplata"],
							"clientype" => 5,
							"bronflphone" => $_COOKIE["phone"],
							"bronflname" => $_COOKIE["name"],
						),
						array("%d", "%d", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%d", "%s", "%d", "%s", "%s", "%s", "%f", "%f", "%d", "%s", "%s" )
					);
					
						
					
						$rowM = $wpdb->get_row('SELECT `mt_br_mesto`.*, `mt_br_reis`.`start_to_date`, `mt_br_reis`.`start_out_date`  FROM `mt_br_mesto` LEFT JOIN `mt_br_reis` ON (`mt_br_mesto`.`reisID` = `mt_br_reis`.`ID`)   WHERE `mt_br_mesto`.`ID` = '.$wpdb->insert_id);
						$infoM = 
						"<h2>Старые данные</h2>".
						"Клиент: ".$addRez->F." ".$addRez->I." ".$addRez->O."<br/>".
						"Документ: ".$addRez->doctype."<br/>".
						"Номер документа: ".$addRez->pasportnum."<br/>".
						"Телефон: ".$addRez->phone."<br/>".
						"Место прибывания: ".$addRez->punkt."<br/>".
						"Место отправления: ".$addRez->mestoPos."<br/>".
						"Место прибытия: ".$addRez->mestoPrib."<br/>".
						"Коментарий: ".$addRez->coment."<br/>".
						"ID места: ".$addRez->mestoID."<br/><br/>";

						$infoM .= 
							"<h2>Зарезервировано</h2>".
							"Клиент: ".$elem["F"]." ".$elem["I"]." ".$elem["O"]."<br/>".
							"Документ: ".$elem["doctype"]."<br/>".
							"Номер документа: ".$elem["pasportnum"]."<br/>".
							"Телефон: ".$elem["phone"]."<br/>".
							"Место прибывания: ".$elem["punkt"]."<br/>".
							"Место отправления: ".$elem["mestoOtpr"]."<br/>".
							"Место прибытия: ".$elem["mestoPrib"]."<br/>".
							"Коментарий: ".$elem["coment"]."<br/>".
							"ID места: ".$elem["mestoID"]."<br/>".
							"Физическое лицо, телефон ".$_COOKIE["phone"];
						
						$wpdb->insert("mt_br_log",
						array(
							"type" => "Бронирование места22",
							"agentname" =>  $_COOKIE['taRegName'],
							"agentmail" => $elem["agentmail"],
							"reis" => $elem["reisID"],
							"mesto" =>  $elem["mestoNum"],
							"reisdata" => $rowM->start_to_date,
							"direct" => $rowM->start_to_date,
							"mestoID" => $elem["mestoID"],
							"info" => $infoM,
							"managername" => $elem["managername"]
						),
						array("%s", "%s", "%s", "%d", "%d", "%s", "%s", "%s", "%s", "%s")
						);
					
					$actionZag = "Забронировано место";
					$insertedElem = $wpdb->insert_id;
				} else {
					$rowOld = $wpdb->get_row('SELECT `mt_br_mesto`.*,`mt_br_user`.`naim` ,`mt_br_reis`.`start_to_date` FROM `mt_br_mesto` LEFT JOIN `mt_br_user` ON `mt_br_user`.`mail` = `mt_br_mesto`.`agentmail` LEFT JOIN `mt_br_reis` ON `mt_br_reis`.`ID` = `mt_br_mesto`.`reisID` WHERE `reisID` = '.$elem["reisID"].' AND `mestoID` = "'.$elem["mestoID"].'" AND `agentmail` = "'.$elem["agentmail"].'"');
					$flg = $wpdb->update("mt_br_mesto",
						array(
							"reisID" => $elem["reisID"], 
							"mestoNum" => $elem["mestoNum"], 
							"direct" => $elem["direct"], 
							"F" => $elem["F"], 
							"I" => $elem["I"], 
							"O" => $elem["O"], 
							"pasportnum" => $elem["pasportnum"], 
							"phone" => $elem["phone"], 
							"punkt" => $elem["punkt"], 
							"coment" => $elem["coment"], 
							"agentmail" => $elem["agentmail"],
							"doctype" => $elem["doctype"],
							"mestoPos" => $elem["mestoOtpr"],
							"mestoPrib" => $elem["mestoPrib"],
							"mestoID" => $elem["mestoID"],
							"directID" => $elem["directID"],
							"dataRod" => $elem["dataRod"],
							"usType" => $elem["usType"],
							"hotelName" => $elem["hotelName"],
							"fullprice" => empty($elem["fullprice"])?0:$elem["fullprice"],
							"predoplata" => empty($elem["predoplata"])?0:$elem["predoplata"],
						),
						
						array(
							"reisID" => $elem["reisID"], 
							"mestoNum" => $elem["mestoNum"],
							"mestoID" => $elem["mestoID"]	
						),
						
						array("%d", "%d", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%d", "%s", "%d", "%s", "%s" ),
						array("%d", "%d", "%s" )
						
					);
					
					
						$rowM = $wpdb->get_row('SELECT `mt_br_mesto`.*,`mt_br_user`.`naim` ,`mt_br_reis`.`start_to_date` FROM `mt_br_mesto` LEFT JOIN `mt_br_user` ON `mt_br_user`.`mail` = `mt_br_mesto`.`agentmail` LEFT JOIN `mt_br_reis` ON `mt_br_reis`.`ID` = `mt_br_mesto`.`reisID` WHERE `reisID` = '.$elem["reisID"].' AND `mestoID` = "'.$elem["mestoID"].'" AND `agentmail` = "'.$elem["agentmail"].'"');
						$infoM = 
						"<h2>Старые данные</h2>".
						"Клиент: ".$rowOld->F." ".$rowOld->I." ".$rowOld->O."<br/>".
						"Документ: ".$rowOld->doctype."<br/>".
						"Номер документа: ".$rowOld->pasportnum."<br/>".
						"Телефон: ".$rowOld->phone."<br/>".
						"Место прибывания: ".$rowOld->punkt."<br/>".
						"Место отправления: ".$rowOld->mestoPos."<br/>".
						"Место прибытия: ".$rowOld->mestoPrib."<br/>".
						"Коментарий: ".$rowOld->coment."<br/>".
						"ID места: ".$rowOld->mestoID."<br/><br/>";

						$infoM .= 
							"<h2>Новые данные</h2>".
							"Клиент: ".$rowM->F." ".$rowM->I." ".$rowM->O."<br/>".
							"Документ: ".$rowM->doctype."<br/>".
							"Номер документа: ".$rowM->pasportnum."<br/>".
							"Телефон: ".$rowM->phone."<br/>".
							"Место прибывания: ".$rowM->punkt."<br/>".
							"Место отправления: ".$rowM->mestoPos."<br/>".
							"Место прибытия: ".$rowM->mestoPrib."<br/>".
							"Коментарий: ".$rowM->coment."<br/>".
							"ID места: ".$rowM->mestoID."<br/>";
						
						$wpdb->insert("mt_br_log",
						array(
							"type" => "Изменение места11",
							"agentname" =>  $rowM->naim,
							"agentmail" => $rowM->agentmail,
							"reis" => $rowM->reisID,
							"mesto" => $rowM->mestoNum,
							"reisdata" => $rowM->start_to_date,
							"direct" => $rowM->direct,
							"mestoID" => $rowM->ID,
							"info" => $infoM,
							"managername" => $elem["managername"]
						),
						
						array("%s", "%s", "%s", "%d", "%d", "%s", "%s", "%s", "%s", "%s")
						);
					
					
					
					
					$qwr = $wpdb->get_results("SELECT * FROM `mt_br_mesto` WHERE  `reisID` = '".$elem["reisID"]."' AND `mestoNum` = '".$elem["mestoNum"]."' AND `mestoID` = '".$elem["mestoID"]."'");
					
					$insertedElem = $qwr[0]->ID;
					
					$actionZag = "Обновлено место";
				}
			
			

				
				
				//$rowM = $wpdb->get_row('SELECT `mt_br_mesto`.*, `mt_br_reis`.`start_to_date`, `mt_br_reis`.`start_out_date`  FROM `mt_br_mesto` LEFT JOIN `mt_br_reis` ON (`mt_br_mesto`.`reisID` = `mt_br_reis`.`ID`)   WHERE `mt_br_mesto`.`ID` = '.$insertedElem);
				$reisinfo = $wpdb->get_row("SELECT * FROM `mt_br_reis` WHERE `ID` = ".$elem["reisID"]);
				
				$punkt1 = explode("-", $elem["direct"])[1];
				$otpravlenie = date("d.m.Y", strtotime($reisinfo->start_to_date));
				
				if ($elem["mestoID"][0] === "t"){
					$otpravlenie = date("d.m.Y", strtotime($reisinfo->start_to_date));
					
				}
				else { 
					$otpravlenie = date("d.m.Y", strtotime($reisinfo->start_out_date));
				}
				
				$phoneQ = $wpdb->get_results("SELECT * FROM `mt_br_user` Where `mail` = '".$elem["agentmail"]."'");
				
				$message .= "<h1>".$actionZag.":</h1>".
							"<strong>Номер рейса:</strong> ".$elem["reisID"]."<br/>".
							"<strong>Дата отправления:</strong> ".$otpravlenie."<br/>".
							
							"<strong>Направление:</strong> ".$elem["direct"]."<br/>".
							"<strong>Номер места:</strong> ".$elem["mestoNum"]."<br/>".
							"<strong>Пассажир:</strong> ".$elem["F"]." ".$elem["I"]." ".$elem["O"]."<br/>".
							"<strong>Документ:</strong> ".$elem["doctype"]."<br/>".
							"<strong>Дата рождения:</strong> ".$elem["dataRod"]."<br/>".
							"<strong>Номер документа:</strong> ".$elem["pasportnum"]."<br/>".
							"<strong>Контактный телефон:</strong> ".$elem["phone"]."<br/>".
							"<strong>Пункт назначения:</strong> ".$punkt1."<br/>".
							"<strong>Место отправления:</strong> ".$elem["mestoOtpr"]."<br/>".
							"<strong>Место прибытия:</strong> ".$elem["mestoPrib"]."<br/>".
							"<strong>Агент (Наименование):</strong> ".$_COOKIE['taRegName']." тел.: ".$phoneQ[0]->phone." <br/>".
							"<strong>Агент (e-mail):</strong> ".$elem["agentmail"]."<br/>".
							"<strong>Менеджер:</strong> ".$elem["managername"]."<br/>".
							"<strong>Коментарий:</strong> ".$elem["coment"]."<br/>";
							
				$message .= "<h2>Выбран отель для размещения</h2>";
				$message .= $elem["hotelName"];
				
				$message .= "<br/>";
				$message .= "<h3>Как с нами связаться:</h3>";
				$message .= "<a href = 'mailto:mirturizma-kursk2@yandex.ru'>mirturizma-kursk2@yandex.ru</a><br/>";
				$message .= "<a href = 'tel:+74712306000'>+7(4712)306-000</a><br/>";
				$message .= "<a href = 'https://yandex.ru/maps/8/kursk/?ll=36.193047%2C51.734053&mode=search&oid=1718933496&ol=biz&z=17.8'>г. Курск ул. Ленина 12 эт. 3</a><br/>";
			
				
				
				}
				
				
				$message .= "<br/> <h2>Данные физического лица:</h2>";
				$message .= "<strong>Телефон: </strong>".$_COOKIE["phone"]."<br/>";
				$message .= "<strong>e-mail: </strong>".$_COOKIE["uflmail"]."<br/>";
				$message .= "<strong>Имя: </strong>".$_COOKIE["name"]."<br/>";
				
				$headers = array(
					'From: ТурЦентр <noreply@turcentr46.ru>',
					'content-type: text/html'
				);

				$sendmailadr = array("asmi046@gmail.com","litvinov-pa@yandex.ru", "mirturizma-kursk2@yandex.ru");
				
				wp_mail( $sendmailadr, "Забронировано / Изменено место", $message, $headers );
				
				if (!in_array($elem["agentmail"],$sendmailadr))
					wp_mail( array($elem["agentmail"]), "Забронировано / Изменено место", $message, $headers );
				
				wp_die( $registrid );
			
	  } else {
		wp_die( 'НО-НО-НО!', '', 403 );
	  }
	}
	
	
	// Загрузка отелей и открытие окна
	add_action( 'wp_ajax_get_point_hotel_list', 'get_point_hotel_list' );
	add_action( 'wp_ajax_nopriv_get_point_hotel_list', 'get_point_hotel_list' );

	function get_point_hotel_list() {
	  if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	  }
	  
	  if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			global $wpdb;
			
			$reis = $wpdb->get_results("SELECT * FROM `mt_br_reis` WHERE `ID` = '".$_REQUEST['reisid']."'");
			
			$reisData =  $reis[0]->prib_to_date;
			
			$rez = $wpdb->get_results("SELECT * FROM `mt_br_hotel_number` WHERE `hotelGeo` = '".$_REQUEST['hotelgeo']."' OR `napr` = '".$_REQUEST['hotelgeo']."' GROUP BY `hotelName`");
			
			
			$elems = array();
			foreach ($rez as $elem) {
				$hotel["hotelId"] = $elem->hotelID; 
				$hotel["hotelName"] = $elem->hotelName; 	
				$hotel["hotelGeo"] = $elem->hotelGeo;
				
				$mn = date("n", strtotime($reisData));
				
				$mname = "june";
				switch ($mn) {
					case 6: $mname = "june"; break;
					case 7: $mname = "jule"; break;
					case 8: $mname = "august"; break;
					case 9: $mname = "september"; break;
				}
				
				$hotel["monfName"] = $mname;
				
				$hotel["hotelimg"] = "";
				$hotel["hotellnk"] = "";
				
				if (!empty($elem->info_id)) {
					$hotel["hotelimg"] = get_the_post_thumbnail_url($elem->info_id);
					$hotel["hotellnk"] = get_the_permalink($elem->info_id);
				}
				
				$elems[] = $hotel;	
			}
			
			
			wp_die(json_encode($elems));
	  } else {
		wp_die( 'НО-НО-НО!', '', 403 );
	  }
	}	
	
	
	// Загрузка списка номеров отелоя
	add_action( 'wp_ajax_get_hotel_number_list', 'get_hotel_number_list' );
	add_action( 'wp_ajax_nopriv_get_hotel_number_list', 'get_hotel_number_list' );

	function get_hotel_number_list() {
	  if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	  }
	  
	  if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			global $wpdb;
						
			$rez = $wpdb->get_results("SELECT * FROM `mt_br_hotel_number` WHERE `hotelID` = '".$_REQUEST['hotelid']."'");
				
			wp_die(json_encode($rez));
	  } else {
		wp_die( 'НО-НО-НО!', '', 403 );
	  }
	}	
	
	
	// Сохранение данных пользователя
	add_action( 'wp_ajax_update_user_data', 'update_user_data' );
	add_action( 'wp_ajax_nopriv_update_user_data', 'update_user_data' );

	function update_user_data() {
	  if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	  }
	  
	  if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			global $wpdb;
			
			$dataArr = array( 'name' => $_REQUEST['username'], 'mail' => $_REQUEST['useremail'], 'pass' => md5($_REQUEST['userpass']."mt2020"));	
			if (empty($_REQUEST['userpass']))
					$dataArr = array( 'name' => $_REQUEST['username'], 'mail' => $_REQUEST['useremail']);	
						
			$rez = $wpdb->update( 'mt_br_user_fl',
				$dataArr,
					array( 'id' => $_REQUEST['userid'] )
				);
				
					
				
			if ($rez == 0)	wp_die($rez);
				
				
			if (!empty($rez)) {
				
				setcookie('identity', md5($_REQUEST["username"].$_REQUEST["userphone"]."mt2020"), 0, '/', "turcentr46.ru");
				setcookie('phone', $_REQUEST["userphone"], 0, '/', "turcentr46.ru");
				
				wp_die($rez);	
			} else {
				wp_die( 'Произошла ошибка попробуйте позднее!', '', array('response' => 403) );
			}	

			
			wp_die(json_encode($rez));
	  } else {
		wp_die( 'НО-НО-НО!', '', 403 );
	  }
	}	
	
	
	// Удаление брони
	add_action( 'wp_ajax_delete_booking', 'delete_booking' );
	add_action( 'wp_ajax_nopriv_delete_booking', 'delete_booking' );

	function delete_booking() {
	  if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	  }
	  
	  if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			global $wpdb;
			
			$rez = $wpdb->delete( "mt_br_mesto", array("registrid" => $_REQUEST['bronid']));
				
			if (!empty($rez)) {
				wp_die($rez);	
			} else {
				wp_die( 'Произошла ошибка попробуйте позднее!', '', array('response' => 403) );
			}	

			
			wp_die(json_encode($rez));
	  } else {
		wp_die( 'НО-НО-НО!', '', 403 );
	  }
	}


	// Установка цены на бронь
	add_action( 'wp_ajax_upprice_booking', 'upprice_booking' );
	add_action( 'wp_ajax_nopriv_upprice_booking', 'upprice_booking' );

	function upprice_booking() {
	  if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	  }
	  
	  if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			global $wpdb;
			
			$rez = $wpdb->update( "mt_br_mesto", array("predoplata" => $_REQUEST['amount']), array("registrid" => $_REQUEST['bronid']));
				
			if (!empty($rez)) {
				wp_die($rez);	
			} else {
				wp_die( 'Произошла ошибка попробуйте позднее!', '', array('response' => 403) );
			}	

			
			wp_die(json_encode($rez));
	  } else {
		wp_die( 'НО-НО-НО!', '', 403 );
	  }
	}	
	
	
	// Отправка запроса на удаление брони
	add_action( 'wp_ajax_bron_chenge_info', 'bron_chenge_info' );
	add_action( 'wp_ajax_nopriv_bron_chenge_info', 'bron_chenge_info' );

	function bron_chenge_info() {
	  if ( empty( $_REQUEST['nonce'] ) ) {
		wp_die( '0' );
	  }
	  
	  if ( check_ajax_referer( 'NEHERTUTLAZIT', 'nonce', false ) ) {
			$headers = array(
				'From: ТурЦентр <noreply@turcentr46.ru>',
				'content-type: text/html'
			);
			
			$message = "<h2>Пользователь ".$_COOKIE["name"]."</h2> Телефон: ".$_COOKIE["phone"]."<br/> e-mail: ".$_COOKIE["uflmail"]."<br/>";
			$message .= "<h3>Запрашивает следующие изменения:</h3> <strong>Бронь: </strong> ".$_REQUEST["bronid"]
			."<br/> <strong>Номер рейса: </strong>".$_REQUEST["reisid"]
			."<br/> <strong>Забронированные места: </strong>".$_REQUEST["mesta"]
			."<br/> <strong>Сообщение: </strong> <br/>".$_REQUEST["bronmessage"];
			
			$sendmailadr = array("asmi046@gmail.com","litvinov-pa@yandex.ru", "mirturizma-kursk2@yandex.ru");
				
			wp_mail( $sendmailadr, "Запрос на изменение брони физическим лицом", $message, $headers );
				
			
	  } else {
		wp_die( 'НО-НО-НО!', '', 403 );
	  }
	}	
	

?>