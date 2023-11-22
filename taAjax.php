<?php
header("Content-type: text/html; charset=utf-8");
require_once("../../../wp-config.php");
	

$reisID = $_POST['reisID']; 	
$mestoNum = $_POST['mestoNum'];
$direct = $_POST['direct'];
$F = $_POST['F']; 
$I = $_POST['I'];
$O = $_POST['O'];
$pasportnum = $_POST['pasportnum'];
$phone = $_POST['phone']; 
$punkt = $_POST['punkt'];
$coment = $_POST['coment']; 
$agentmail = $_POST['agentmail'];
$rezervid = $_POST['rezervid'];

$doctype = $_POST['doctype'];
$mestoOtpr = $_POST['mestoOtpr'];
$mestoPrib = $_POST['mestoPrib'];
$mestoID = $_POST['mestoID'];
$directID = $_POST['directID']; 

$phone = $_POST['phone'];
$name = $_POST['name'];
$dataRod = $_POST['dataRod'];


$allRezMesta = $_POST['allRezMesta'];
$razmeshenie = $_POST['razmeshenie'];

if ($_POST['ajaxAction'] == "addAllMesta") 
{
	addAllMesta($allRezMesta, $razmeshenie);
}

if ($_POST['ajaxAction'] == "rezervMesto") 
{
	rezervMesto($reisID, $mestoNum, $direct, $F, $I, $O, $pasportnum, $phone, $punkt, $coment, $agentmail, $doctype, $mestoOtpr, $mestoPrib, $mestoID, $directID, $dataRod);
}

if ($_POST['ajaxAction'] == "updateMesto") 
{
	updateMesto($reisID, $mestoNum, $direct, $F, $I, $O, $pasportnum, $phone, $punkt, $coment, $agentmail, $doctype, $mestoOtpr, $mestoPrib, $mestoID, $directID, $dataRod);
}

if ($_POST['ajaxAction'] == "dellMesto") 
{
		dellMesto($reisID, $mestoID, $agentmail);
}



if ($_POST['ajaxAction'] == "getData") 
{
		getData($reisID, $mestoID, $agentmail);
}


function addAllMesta($allRezMesta, $razmeshenie) {
	
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
					"usType" => $elem["usType"],
					"hotelName" => $elem["hotelName"],
					"registrid" => $registrid,
					"managername" => $elem["managername"],
					"fullprice" => empty($elem["fullprice"])?0:$elem["fullprice"],
					"predoplata" => empty($elem["predoplata"])?0:$elem["predoplata"],
				),
				array("%d", "%d", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%d", "%s", "%d", "%s", "%s", "%s", "%f", "%f" )
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
					"ID места: ".$elem["mestoID"]."<br/>";
				
				$wpdb->insert("mt_br_log",
				array(
					"type" => "Бронирование места",
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
				
				array("%d", "%d", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%d", "%s", "%d", "%s" ),
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
					"type" => "Изменение места",
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
		

		
		$headers = array(
			'From: ТурЦентр <noreply@turcentr46.ru>',
			'content-type: text/html'
		);

		$sendmailadr = array("asmi046@gmail.com","litvinov-pa@yandex.ru", "mirturizma-kursk2@yandex.ru");
		
		wp_mail( $sendmailadr, "Забронировано / Изменено место", $message, $headers );
		
		if (!in_array($elem["agentmail"],$sendmailadr))
			wp_mail( array($elem["agentmail"]), "Забронировано / Изменено место", $message, $headers );
		
		die( "Ответ: ".$rezstr." ".print_r($allRezMesta,true) );
}

function rezervMesto($reisID, $mestoNum, $direct, $F, $I, $O, $pasportnum, $phone, $punkt, $coment, $agentmail, $doctype, $mestoOtpr, $mestoPrib, $mestoID, $directID, $dataRod ) {
	
	global $wpdb;
	
	$flg = $wpdb->insert("mt_br_mesto",
	array(
	"reisID" => $reisID, 
	"mestoNum" => $mestoNum, 
	"direct" => $direct, 
	"F" => $F, 
	"I" => $I, 
	"O" => $O, 
	"pasportnum" => $pasportnum, 
	"phone" => $phone, 
	"punkt" => $punkt, 
	"coment" => $coment, 
	"agentmail" => $agentmail,
	"doctype" => $doctype,
	"mestoPos" => $mestoOtpr,
	"mestoPrib" => $mestoPrib,
	"mestoID" => $mestoID,
	"directID" => $directID,
	"dataRod" => $dataRod,
	),
	array("%d", "%d", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%d", "%s" )
	);
	
	$rowM = $wpdb->get_row('SELECT `mt_br_mesto`.*, `mt_br_reis`.`start_to_date`, `mt_br_reis`.`start_out_date`  FROM `mt_br_mesto` LEFT JOIN `mt_br_reis` ON (`mt_br_mesto`.`reisID` = `mt_br_reis`.`ID`)   WHERE `mt_br_mesto`.`ID` = '.$wpdb->insert_id);
	
	if ($flg) {
		
		$otpravlenie = date("d.m.Y", strtotime($rowM->start_to_date));
		$punkt1 = explode("-", $direct)[1];
		
		if ($mestoID[0] === "t"){
			$otpravlenie = date("d.m.Y", strtotime($rowM->start_to_date));
			
		}
		else { 
			$otpravlenie = date("d.m.Y", strtotime($rowM->start_out_date));
		}
		
		$phoneQ = $wpdb->get_results("SELECT * FROM `mt_br_user` Where `mail` = '".$agentmail."'");
		
		$message = "<h1>Забронировано место:</h1>".
					"<strong>Номер рейса:</strong> ".$reisID."<br/>".
					"<strong>Дата отправления:</strong> ".$otpravlenie."<br/>".
					//"<strong>Дата отправления в Курск:</strong> ".date("d.m.Y", strtotime($rowM->start_out_date))."<br/>".
					"<strong>Направление:</strong> ".$direct."<br/>".
					"<strong>Номер места:</strong> ".$mestoNum."<br/>".
					"<strong>Пассажир:</strong> ".$F." ".$I." ".$O."<br/>".
					"<strong>Документ:</strong> ".$doctype."<br/>".
					"<strong>Дата рождения:</strong> ".$dataRod."<br/>".
					"<strong>Номер документа:</strong> ".$pasportnum."<br/>".
					"<strong>Контактный телефон:</strong> ".$phone."<br/>".
					"<strong>Пункт назначения:</strong> ".$punkt1."<br/>".
					"<strong>Место отправления:</strong> ".$mestoOtpr."<br/>".
					"<strong>Место прибытия:</strong> ".$mestoPrib."<br/>".
					"<strong>Агент (Наименование):</strong> ".$_COOKIE['taRegName']." тел.: ".$phoneQ[0]->phone." <br/>".
					"<strong>Агент (e-mail):</strong> ".$agentmail."<br/>".
					"<strong>Коментарий:</strong> ".$coment."<br/>";
											
					$headers = array(
						'From: ТурЦентр <noreply@turcentr46.ru>',
						'content-type: text/html'
					);

					wp_mail( array("asmi046@gmail.com","litvinov-pa@yandex.ru", "mirturizma-kursk2@yandex.ru"), "Забронировано место", $message, $headers );
	}
	
	$infoM = 
		"<h2>Зарезервировано</h2>".
		"Клиент: ".$F." ".$I." ".$O."<br/>".
		"Документ: ".$doctype."<br/>".
		"Номер документа: ".$pasportnum."<br/>".
		"Телефон: ".$phone."<br/>".
		"Место прибывания: ".$punkt1."<br/>".
		"Место отправления: ".$mestoOtpr."<br/>".
		"Место прибытия: ".$mestoPrib."<br/>".
		"Коментарий: ".$coment."<br/>".
		"ID места: ".$mestoID."<br/>";
	
	$wpdb->insert("mt_br_log",
	array(
		"type" => "Бронирование места",
		"agentname" =>  $_COOKIE['taRegName'],
		"agentmail" => $agentmail,
		"reis" => $reisID,
		"mesto" => $mestoNum,
		"reisdata" => $rowM->start_to_date,
		"direct" => $direct,
		"mestoID" => $mestoID,
		"info" => $infoMold." ".$infoM
	),
	array("%s", "%s", "%s", "%d", "%d", "%s", "%s", "%s", "%s")
	);
	
	//$wpdb->show_errors(); 
	//$wpdb->print_error();
	
	echo $flg?"Место успешно зарезервировано|1|".$rowM->reisID."|".$rowM->mestoNum."|".$rowM->direct."|".$rowM->F."|".$rowM->I."|".$rowM->O."|".$rowM->pasportnum."|". $rowM->phone."|".$rowM->punkt."|".$rowM->coment."|".$rowM->agentmail."|".$wpdb->insert_id:"Место не зарезервировано попробуйте еще раз|0|".$wpdb->insert_id;


}

function updateMesto($reisID, $mestoNum, $direct, $F, $I, $O, $pasportnum, $phone, $punkt, $coment, $agentmail, $doctype, $mestoOtpr, $mestoPrib, $mestoID, $directID, $dataRod) {
	
	
	global $wpdb;
	
	$rowMold = $wpdb->get_row('SELECT `mt_br_mesto`.*,`mt_br_user`.`naim` ,`mt_br_reis`.`start_to_date` FROM `mt_br_mesto` LEFT JOIN `mt_br_user` ON `mt_br_user`.`mail` = `mt_br_mesto`.`agentmail` LEFT JOIN `mt_br_reis` ON `mt_br_reis`.`ID` = `mt_br_mesto`.`reisID` WHERE `reisID` = '.$reisID.' AND `mestoID` = "'.$mestoID.'" AND `agentmail` = "'.$agentmail.'"');
	$infoMold = 
		"<h2>Было</h2>".
		"Клиент: ".$rowMold->F." ".$rowMold->I." ".$rowMold->O."<br/>".
		"Документ: ".$rowMold->doctype."<br/>".
		"Номер документа: ".$rowMold->pasportnum."<br/>".
		"Телефон: ".$rowMold->phone."<br/>".
		"Место прибывания: ".$rowMold->punkt."<br/>".
		"Место отправления: ".$rowMold->mestoPos."<br/>".
		"Место прибытия: ".$rowMold->mestoPrib."<br/>".
		"Коментарий: ".$rowMold->coment."<br/>".
		"ID места: ".$rowMold->mestoID."<br/>";
	
	$flg = $wpdb->update("mt_br_mesto",
	array(
	"reisID" => $reisID, 
	"mestoNum" => $mestoNum, 
	"direct" => $direct, 
	"F" => $F, 
	"I" => $I, 
	"O" => $O, 
	"pasportnum" => $pasportnum, 
	"phone" => $phone, 
	"punkt" => $punkt, 
	"coment" => $coment, 
	"agentmail" => $agentmail,
	"doctype" => $doctype,
	"mestoPos" => $mestoOtpr,
	"mestoPrib" => $mestoPrib,
	"mestoID" => $mestoID,
	"directID" => $directID,
	"dataRod" => $dataRod,
	),
	array(
			"reisID" => $reisID,
			"mestoID" => $mestoID,
			"agentmail" => $agentmail
			),
	array("%d", "%d", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%s", "%d", "%s" ),
	array('%d', '%s', '%s')
	);
	
	$rowM = $wpdb->get_row('SELECT `mt_br_mesto`.*,`mt_br_user`.`naim` ,`mt_br_reis`.`start_to_date` FROM `mt_br_mesto` LEFT JOIN `mt_br_user` ON `mt_br_user`.`mail` = `mt_br_mesto`.`agentmail` LEFT JOIN `mt_br_reis` ON `mt_br_reis`.`ID` = `mt_br_mesto`.`reisID` WHERE `reisID` = '.$reisID.' AND `mestoID` = "'.$mestoID.'" AND `agentmail` = "'.$agentmail.'"');
	
	$infoM = 
		"<h2>Стало</h2>".
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
		"type" => "Изменение места",
		"agentname" =>  $rowM->naim,
		"agentmail" => $rowM->agentmail,
		"reis" => $rowM->reisID,
		"mesto" => $rowM->mestoNum,
		"reisdata" => $rowM->start_to_date,
		"direct" => $rowM->direct,
		"mestoID" => $rowM->ID,
		"info" => $infoMold." ".$infoM
	),
	
	array("%s", "%s", "%s", "%d", "%d", "%s", "%s", "%s", "%s")
	);
	
	echo $flg?"Информация успешно изменена|1|".$rowM->reisID."|".$rowM->mestoNum."|".$rowM->direct."|".$rowM->F."|".$rowM->I."|".$rowM->O."|".$rowM->pasportnum."|". $rowM->phone."|".$rowM->punkt."|".$rowM->coment."|".$rowM->agentmail:"Информация не изменена|0";
}

function getData($reisID, $mestoID, $agentmail) {
	global $wpdb;
	$rowM = $wpdb->get_row('SELECT * FROM `mt_br_mesto` WHERE `reisID` = '.$reisID.' AND `mestoID` = "'.$mestoID.'" AND `agentmail` = "'.$agentmail.'"');

	
	if (!empty($rowM)){
	echo $rowM->reisID."|".
		$rowM->mestoNum."|".
		$rowM->direct."|".
		$rowM->F."|".
		$rowM->I."|".
		$rowM->O."|".
		$rowM->pasportnum."|".
		$rowM->phone."|".
		$rowM->punkt."|".
		$rowM->coment."|".
		$rowM->agentmail."|".
		$rowM->mestoPos."|".
		$rowM->doctype."|".
		$rowM->mestoID."|".
		$rowM->mestoPrib."|".
		$rowM->dataRod."|".
		$rowM->hotelName."|".
		$rowM->usType;
	}
	
}

function dellMesto($reisID, $mestoID, $agentmail) {
    global $wpdb;
	
	$rowM = $wpdb->get_row('SELECT `mt_br_mesto`.*,`mt_br_user`.`naim` ,`mt_br_reis`.`start_to_date` FROM `mt_br_mesto` LEFT JOIN `mt_br_user` ON `mt_br_user`.`mail` = `mt_br_mesto`.`agentmail` LEFT JOIN `mt_br_reis` ON `mt_br_reis`.`ID` = `mt_br_mesto`.`reisID` WHERE `reisID` = '.$reisID.' AND `mestoID` = "'.$mestoID.'" AND `agentmail` = "'.$agentmail.'"');
	$infoM = 
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
		"type" => "Удаление места",
		"agentname" =>  $rowM->naim,
		"agentmail" => $rowM->agentmail,
		"reis" => $rowM->reisID,
		"mesto" => $rowM->mestoNum,
		"reisdata" => $rowM->start_to_date,
		"direct" => $rowM->direct,
		"mestoID" => $rowM->ID,
		"info" => $infoM
	),
	array("%s", "%s", "%s", "%d", "%d", "%s", "%s", "%s", "%s")
	);

	
	
	$flg = $wpdb->delete("mt_br_mesto", 
		array(
			"reisID" => $reisID,
			"mestoID" => $mestoID,
			"agentmail" => $agentmail
			),
		array('%d', '%s', '%s')
	);
	
	echo $flg?"Запись удалена|1|".$rezervid:"Запись не удалена попробуйте еще раз|0|";

}

?>