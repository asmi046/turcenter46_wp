<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

require_once("../../../wp-config.php");

$wpdb->show_errors(); 
	
	
global $wpdb;


$orderDir = !empty($_REQUEST["odir"])?$_REQUEST["odir"]:"ASC";
if ($orderDir === "ASC") $orderDir = "DESC"; else $orderDir = "ASC";

$orderBy = !empty($_REQUEST["order"])?$_REQUEST["order"]:"reisID";
$directID = !empty($_REQUEST["napravlenie"])?$_REQUEST["napravlenie"]:"%";
$reisID = !empty($_REQUEST["reisid"])?$_REQUEST["reisid"]:"%";
$agent = !empty($_REQUEST["agent"])?$_REQUEST["agent"]:"%";

$reis = $wpdb->get_results("SELECT `mt_br_mesto`.*, `mt_br_user`.`naim`, `mt_br_user`.`phone` AS `agentPhone`, `mt_br_napr`.`prompunkts` AS `naprPunct`, ".
" `mt_br_napr`.`start` AS `naprStart`, ".
" `mt_br_napr`.`end` AS `naprEnd`, ".
" `mt_br_reis`.`start_to_date` AS `dViezd`, ".
" `mt_br_reis`.`start_out_date` AS `dViezdOb`, ".
" `mt_br_reis`.`prib_out_date` AS `dPrib`, ".
" `mt_br_reis`.`prib_to_date` AS `dPribOb` ".
" FROM `mt_br_mesto` ".
"LEFT JOIN `mt_br_user` ON (`mt_br_mesto`.`agentmail` = `mt_br_user`.`mail`) ".
"LEFT JOIN `mt_br_napr` ON (`mt_br_mesto`.`directID` = `mt_br_napr`.`ID`) ".
"LEFT JOIN `mt_br_reis` ON (`mt_br_mesto`.`reisID` = `mt_br_reis`.`ID`) ".
"WHERE `mt_br_mesto`.`directID` like '".$directID ."' AND `mt_br_mesto`.`reisID` like '".$reisID."' AND `mt_br_mesto`.`agentmail` like '".$agent."'  GROUP BY `registrid` ".$orderDir);



$napr = $wpdb->get_results("SELECT `start`, `end` FROM `mt_br_napr` WHERE `ID` = '".$directID."'  ORDER BY `order`", ARRAY_A);

$turType = !empty($_REQUEST["napravlenie"])?$_REQUEST["napravlenie"]:"%";
$reisinfoObr = $wpdb->get_results("SELECT `start_to_date` FROM `mt_br_reis`  WHERE `turtype` LIKE '".$turType."' ORDER BY `start_to_date`", ARRAY_A);
?>
<style>
	table {
		border-top:1px solid black;
		border-right:1px solid black;
		border-spacing: 0;
	}
	.head-table-row  td{
		border-top:  1px solid #000;
	}
	th, td {
		/*border-bottom:1px solid black;
		border-left:1px solid black;*/
		font-size:14px;
	}
	
	tr:nth-child(1) {width:24%;}
	tr:nth-child(2) {width:24%;}
	
	tr:nth-child(3) {width:4%;}
	
	tr:nth-child(4) {width:24%;}
	tr:nth-child(5) {width:24%;}
</style>
<h1>Направление: <?php echo $napr[0]['start'];?> - <?php echo $napr[0]['end'];?></h1>
<h2>Дата выезда: <?php  echo $reisinfoObr[0]['start_to_date'];?></h2>
<table class = "raspisanie adminBronTable">
	<?php
	foreach($reis as $r):

			if ($r->hotelName === 'Без размещения') continue;?>
		<tr class="head-table-row">
			<td><?php echo $r->registrid; ?></td>
			<td><?php echo 'Забронировано: ' . $r->dataBron; ?></td>
			<td><?php echo 'Агент: '.$r->naim; ?></td>
			<td><?php echo 'Менеджер '.$r->managername; ?></td>
			<td></td>
		</tr>
		<?php
				//echo "SELECT * FROM `mt_br_mesto` WHERE `registrid` = '".$r->registrid."'";
				$reisInner = $wpdb->get_results("SELECT * FROM `mt_br_mesto` WHERE `registrid` = '".$r->registrid."'");
				foreach($reisInner as $rIner):
					if (($rIner->mestoID[0] === 't')&&(count($reisInner)>1)) continue;
			?>
				<tr class = "hotelline">
					<td class = "fio"><?php echo $rIner->F." ".$rIner->I." ".$rIner->O; ?></td>
					<td class = "dataR"><?php echo $rIner->dataRod; ?></td>
					<td class = "phone"><?php echo $rIner->phone; ?></td>
					<td class = "punkt"><?php echo $rIner->punkt; ?></td>
					<td class = "hotel"><?php echo $rIner->hotelName; ?></td>
					<td class = "comment"><?php echo $rIner->coment; ?></td>
					
				</tr>
	<?php endforeach; endforeach;?>
</table>