<?php
require_once("../../../wp-config.php");

$wpdb->show_errors(); 
	
	
global $wpdb;
							


// Build your query						

$directID = !empty($_REQUEST["napravlenie"])?$_REQUEST["napravlenie"]:"%";
$reisID = !empty($_REQUEST["start_to_date"])?$_REQUEST["start_to_date"]:"%";
$agent = !empty($_REQUEST["agent"])?$_REQUEST["agent"]:"%";
/*
$MyQuery = $wpdb->get_results("SELECT `mt_br_mesto`.*, `mt_br_user`.`naim`, `mt_br_user`.`phone` AS `agentPhone`, `mt_br_napr`.`prompunkts` AS `naprPunct`, ".
		" `mt_br_napr`.`start` AS `naprStart`, ".
		" `mt_br_napr`.`end` AS `naprEnd`, ".
		" `mt_br_reis`.`start_to_date` AS `dViezd`, ".
		" `mt_br_reis`.`prib_out_date` AS `dPrib` ".
		" FROM `mt_br_mesto` ".
		"LEFT JOIN `mt_br_user` ON (`mt_br_mesto`.`agentmail` = `mt_br_user`.`mail`) ".
		"LEFT JOIN `mt_br_napr` ON (`mt_br_mesto`.`directID` = `mt_br_napr`.`ID`) ".
		"LEFT JOIN `mt_br_reis` ON (`mt_br_mesto`.`reisID` = `mt_br_reis`.`ID`) ".
		"WHERE `mt_br_mesto`.`directID` like '".$directID ."' AND `mt_br_mesto`.`reisID` like '".$reisID."' AND `mt_br_mesto`.`agentmail` like '".$agent."' ");						
*/

$naprinfo = $wpdb->get_results("SELECT * FROM `mt_br_napr` WHERE `ID` LIKE '".$directID."'");

$napr = $naprinfo[0]->start." - ".$naprinfo[0]->end;
$reisinfo = $wpdb->get_results("SELECT * FROM `mt_br_reis`  WHERE `ID` LIKE '".$reisID."'");

$MyQuery = $wpdb->get_results("SELECT `mt_br_mesto`.*, `mt_br_user`.`naim`, `mt_br_user`.`phone` AS `agentPhone`, `mt_br_napr`.`prompunkts` AS `naprPunct`, ".
		" `mt_br_napr`.`start` AS `naprStart`, ".
		" `mt_br_napr`.`end` AS `naprEnd`, ".
		" `mt_br_reis`.`start_to_date` AS `dViezd`, ".
		" `mt_br_reis`.`prib_out_date` AS `dPrib` ".
		" FROM `mt_br_mesto` ".
		"LEFT JOIN `mt_br_user` ON (`mt_br_mesto`.`agentmail` = `mt_br_user`.`mail`) ".
		"LEFT JOIN `mt_br_napr` ON (`mt_br_mesto`.`directID` = `mt_br_napr`.`ID`) ".
		"LEFT JOIN `mt_br_reis` ON (`mt_br_mesto`.`reisID` = `mt_br_reis`.`ID`) ".
		"WHERE `mt_br_mesto`.`direct` like '".$napr."' AND `mt_br_mesto`.`reisID` like '".$reisID."' AND `mt_br_mesto`.`agentmail` like '".$agent."' ");

$napr = $naprinfo[0]->end." - ".$naprinfo[0]->start;
$reisinfoObr = $wpdb->get_results("SELECT * FROM `mt_br_reis`  WHERE `start_out_date` = '".$reisinfo[0]->prib_to_date."' AND `turtype` = '".$directID."'");
// echo  iconv("utf-8", "windows-1251","SELECT * FROM `mt_br_reis`  WHERE `start_out_date` = '".$reisinfo[0]->prib_to_date."' AND `turtype` = '".$directID."'");

$reisinfoObrId = !empty($_REQUEST["orid"])?$_REQUEST["orid"]:$reisinfoObr[0]->ID;

// echo  iconv("utf-8", "windows-1251",$reisinfoObrId);


$MyQueryObr = $wpdb->get_results("SELECT `mt_br_mesto`.*, `mt_br_user`.`naim`, `mt_br_user`.`phone` AS `agentPhone`, `mt_br_napr`.`prompunkts` AS `naprPunct`, ".
		" `mt_br_napr`.`start` AS `naprStart`, ".
		" `mt_br_napr`.`end` AS `naprEnd`, ".
		" `mt_br_reis`.`start_to_date` AS `dViezd`, ".
		" `mt_br_reis`.`prib_out_date` AS `dPrib` ".
		" FROM `mt_br_mesto` ".
		"LEFT JOIN `mt_br_user` ON (`mt_br_mesto`.`agentmail` = `mt_br_user`.`mail`) ".
		"LEFT JOIN `mt_br_napr` ON (`mt_br_mesto`.`directID` = `mt_br_napr`.`ID`) ".
		"LEFT JOIN `mt_br_reis` ON (`mt_br_mesto`.`reisID` = `mt_br_reis`.`ID`) ".
		"WHERE `mt_br_mesto`.`direct` like '".$napr."' AND `mt_br_mesto`.`reisID` like '".$reisinfoObrId."' AND `mt_br_mesto`.`agentmail` like '".$agent."' ");		
		
// Process report request
if (empty($MyQuery)&&($MyQuery != array())) {
$Error = $wpdb->print_error();
die("Возникли следующие ошибки: $Error");
} else {

$csv_fields=array();


$csv_fields[] = iconv("utf-8", "windows-1251", 'Номер рейса');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Направление');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Номер места');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Место посадки');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Место прибытия');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Дата выезда');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Дата прибытия');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Агент');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Телефон агента');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Фамилия');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Имя');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Отчество');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Документ');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Номер документа');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Контактный телефон');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Дата рождения');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Коментарий');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Размещение');
$csv_fields[] = iconv("utf-8", "windows-1251", 'ID заказа');
$csv_fields[] = iconv("utf-8", "windows-1251", 'Зарегистрировавший менеджер');


$output_filename = 'bron_' .date("d.m.Y"). '.csv';
$output_handle = @fopen( 'php://output', 'w' );
 
header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
header( 'Content-Description: File Transfer' );
header( 'Content-type: text/csv; charset=windows-1251' );
header( 'Content-Disposition: attachment; filename=' . $output_filename );
header( 'Expires: 0' );
header( 'Pragma: public' );	

// Insert header row
//fputcsv( $output_handle, $csv_fields);

for ($i = 0; $i<count((array)$csv_fields); $i++) {
	echo $csv_fields[$i].";";
}
echo "\r\n";
echo  iconv("utf-8", "windows-1251", "Везем:;");
echo "\r\n";
// Parse results to csv format
foreach ($MyQuery as $Result) {
	
	echo iconv("utf-8", "windows-1251", $Result->reisID).";";
	echo iconv("utf-8", "windows-1251", $Result->direct).";";
	echo iconv("utf-8", "windows-1251", $Result->mestoNum).";";
	echo iconv("utf-8", "windows-1251", $Result->mestoPos).";";
	echo iconv("utf-8", "windows-1251", $Result->mestoPrib).";";
	echo iconv("utf-8", "windows-1251", $Result->dViezd).";";
	echo iconv("utf-8", "windows-1251", $Result->dPrib).";";
	echo iconv("utf-8", "windows-1251", empty($Result->naim)?"":$Result->naim).";";
	echo iconv("utf-8", "windows-1251", empty($Result->agentPhone)?"":$Result->agentPhone).";";
	echo iconv("utf-8", "windows-1251", $Result->F).";";
	echo iconv("utf-8", "windows-1251", $Result->I).";";
	echo iconv("utf-8", "windows-1251", $Result->O).";";
	echo iconv("utf-8", "windows-1251", $Result->doctype).";";
	echo iconv("utf-8", "windows-1251", $Result->pasportnum).";";
	echo iconv("utf-8", "windows-1251", $Result->phone).";";
	echo iconv("utf-8", "windows-1251", $Result->dataRod).";";
	$commentClear = str_replace("\n","",iconv("utf-8", "windows-1251", $Result->coment));
	$commentClear=str_replace("\r","",$commentClear);
	echo $commentClear.";";
	echo iconv("utf-8", "windows-1251", htmlspecialchars_decode($Result->hotelName)).";";
	echo iconv("utf-8", "windows-1251", $Result->registrid).";";
	echo iconv("utf-8", "windows-1251", $Result->managername).";";
	
	echo "\r\n";
}

echo iconv("utf-8", "windows-1251", "Забираем:;");
echo "\r\n";
 
foreach ($MyQueryObr as $Result) {
	
	echo iconv("utf-8", "windows-1251", $Result->reisID).";";
	echo iconv("utf-8", "windows-1251", $Result->direct).";";
	echo iconv("utf-8", "windows-1251", $Result->mestoNum).";";
	echo iconv("utf-8", "windows-1251", $Result->mestoPos).";";
	echo iconv("utf-8", "windows-1251", $Result->mestoPrib).";";
	echo iconv("utf-8", "windows-1251", $Result->dViezd).";";
	echo iconv("utf-8", "windows-1251", $Result->dPrib).";";
	echo iconv("utf-8", "windows-1251", empty($Result->naim)?"":$Result->naim).";";
	echo iconv("utf-8", "windows-1251", empty($Result->agentPhone)?"":$Result->agentPhone).";";
	echo iconv("utf-8", "windows-1251", $Result->F).";";
	echo iconv("utf-8", "windows-1251", $Result->I).";";
	echo iconv("utf-8", "windows-1251", $Result->O).";";
	echo iconv("utf-8", "windows-1251", $Result->doctype).";";
	echo iconv("utf-8", "windows-1251", $Result->pasportnum).";";
	echo iconv("utf-8", "windows-1251", $Result->phone).";";
	echo iconv("utf-8", "windows-1251", $Result->dataRod).";";
	$commentClear = str_replace("\n","",iconv("utf-8", "windows-1251", $Result->coment));
	$commentClear=str_replace("\r","",$commentClear);
	echo $commentClear.";";
	echo iconv("utf-8", "windows-1251", htmlspecialchars_decode($Result->hotelName)).";";
	echo iconv("utf-8", "windows-1251", $Result->registrid).";";
	echo iconv("utf-8", "windows-1251", $Result->managername).";";
	
	echo "\r\n";
} 
 
// Close output file stream
fclose( $output_handle ); 

die();
}
?>