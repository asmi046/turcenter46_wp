<?php
ini_set("display_errors",1);
error_reporting(E_ALL);

require_once("../../../wp-config.php");

$wpdb->show_errors(); 
	
	
global $wpdb;
							


// Build your query						

$directID = !empty($_REQUEST["napravlenie"])?$_REQUEST["napravlenie"]:"%";
$reisID = !empty($_REQUEST["reisid"])?$_REQUEST["reisid"]:"%";

$treis = !empty($_REQUEST["treis"])?$_REQUEST["treis"]:"t";

$naprinfo = $wpdb->get_results("SELECT * FROM `mt_br_napr` WHERE `ID` = ".$directID);
$mesta = $wpdb->get_results("SELECT `mt_br_mesto`.*, `mt_br_user`.`naim` FROM `mt_br_mesto`  LEFT JOIN `mt_br_user` ON (`mt_br_mesto`.`agentmail` = `mt_br_user`.`mail`) WHERE `reisID` = ".$reisID);					
$reisinfo = $wpdb->get_results("SELECT * FROM `mt_br_reis`  WHERE `ID` = ".$reisID);

if ($treis === "t")
	$napr = $naprinfo[0]->start." - ".$naprinfo[0]->end;
else 
	$napr = $naprinfo[0]->end." - ".$naprinfo[0]->start;

// Process report request
if (empty($mesta)&&($mesta != array())) {
$Error = $wpdb->print_error();
die("Возникли следующие ошибки: $Error");
} else {
	$mestaN = array (2,1,-1,5,4,3,8,7,6,11,10,9,14,13,12,18,17,16,15);
	function mestoZan($mesta, $n, $napr){
		foreach($mesta as $mesto){
			if (($mesto->mestoNum == $n)&&($napr === $mesto->direct))
			{
				if ($mesto->agentmail === $_COOKIE['taReg'])
					return "zanyatoVami";
				else return  "zanyato";
			}
		}
	}
	
	function titleFild1($mesta, $n, $napr){
		if ($n == -1) return "Проход";
		$rez = "<strong>№ места: </strong>".$n." <br/> Место свободно";
		
		foreach($mesta as $mesto){
			
			if (($mesto->mestoNum == $n)&&($napr === $mesto->direct))
			{
				$rez = "<strong>№ места:</strong>".$mesto->mestoNum." <br/> <strong>Ф.И.О. </strong>".$mesto->F." ".$mesto->I." ".$mesto->O." <br/><strong>Тел.: </strong>".$mesto->phone;
				// $rez = "<strong>№ места:</strong>".$mesto->mestoNum." <br/> <strong>Ф.И.О. </strong>".$mesto->F." ".$mesto->I." ".$mesto->O." <br/><strong>Тел.: </strong>".$mesto->phone." <br/><strong>Посадка: </strong>".$mesto->mestoPos
				// ."<br/><strong>Высадка: </strong> ".$mesto->mestoPrib
				// ."<br/><strong>Агент: </strong> ".$mesto->naim
				// ."<br/><strong>Комментарий: </strong> ".$mesto->coment;	
			}
		}

		return $rez;
	}
?>
	<style>
		table {
			border-top:1px solid black;
			border-right:1px solid black;
			border-spacing: 0;
		}
		
		th, td {
			border-bottom:1px solid black;
			border-left:1px solid black;
			font-size:14px;
		}
		
		tr:nth-child(1) {width:24%;}
		tr:nth-child(2) {width:24%;}
		
		tr:nth-child(3) {width:4%;}
		
		tr:nth-child(4) {width:24%;}
		tr:nth-child(5) {width:24%;}
	</style>
	
	<h1>Номер рейса: <?php echo $reisID;?></h1>
	<h3>Направление: <?php echo $napr;?></h3>
	<h3>Дата выезда: <?php  echo date("d.m.Y", strtotime($reisinfo[0]->start_to_date));?></h3>
	
	<table>
		<thead>
			<tr>
				<th colspan = "5">Место водителя</th>
			</tr>
		</thead>
	
		<tbody>
			<?php
				for ($i =0; $i<15; $i+=3)
				{
					
			?>
				
					<tr>
						<td><?php echo titleFild1($mesta, $mestaN[$i], $napr); ?></td>
						<td><?php echo titleFild1($mesta, $mestaN[$i+1], $napr); ?></td>
						<td></td>
						<td><?php echo titleFild1($mesta, $mestaN[$i+2], $napr); ?></td>
					</tr>			
			
			<?php
				}
			?>
			
			<tr>
				<td><?php echo titleFild1($mesta, $mestaN[15], $napr); ?></td>
				<td><?php echo titleFild1($mesta, $mestaN[16], $napr); ?></td>
				<td><?php echo titleFild1($mesta, $mestaN[17], $napr); ?></td>
				<td><?php echo titleFild1($mesta, $mestaN[18], $napr); ?></td>
			</tr>
		</tbody>	
	</table>
	
<?php

echo "<pre>";
	//print_r($naprinfo);
echo "</pre>";

echo "<pre>";
	//print_r($mesta);
echo "</pre>";

}
?>