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
// $mesta = $wpdb->get_results("SELECT `mt_br_mesto`.*, `mt_br_user`.`naim` FROM `mt_br_mesto`  LEFT JOIN `mt_br_user` ON (`mt_br_mesto`.`agentmail` = `mt_br_user`.`mail`) WHERE `reisID` = ".$reisID);					
$mesta = $wpdb->get_results("SELECT `mt_br_mesto`.*, `mt_br_user`.`naim` FROM `mt_br_mesto`  LEFT JOIN `mt_br_user` ON (`mt_br_mesto`.`agentmail` = `mt_br_user`.`mail`) WHERE `reisID` = 33");					
$reisinfo = $wpdb->get_results("SELECT * FROM `mt_br_reis`  WHERE `ID` = ".$reisID);



$reisinfoObr = array();
if ($treis === "t")
	$napr = $naprinfo[0]->start." - ".$naprinfo[0]->end;
else
{	
	$napr = $naprinfo[0]->end." - ".$naprinfo[0]->start;
	
	$reisinfoObr = $wpdb->get_results("SELECT * FROM `mt_br_reis`  WHERE `turtype` = '".$directID."' AND `start_out_date` = '".$reisinfo[0]->prib_to_date."'");
	
	if (empty ($reisinfoObr))
	{
		echo "Воспользуйтесь кнопкой формирования рассадки на крайнуюю дату";
		wp_die();
	}
	// echo "<pre>";
	// print_r($reisinfoObr);
	// echo "</pre>"; 
	$mesta = $wpdb->get_results("SELECT `mt_br_mesto`.*, `mt_br_user`.`naim` FROM `mt_br_mesto`  LEFT JOIN `mt_br_user` ON (`mt_br_mesto`.`agentmail` = `mt_br_user`.`mail`) WHERE `reisID` = ".$reisinfoObr[0]->ID);
}

// Process report request
if (empty($mesta)&&($mesta != array())) {
$Error = $wpdb->print_error();
die("Возникли следующие ошибки: $Error");
} else {
	// $mestaN = array (2, 1, 3, 4, 6, 5, 7, 8, 10, 9, 11, 12, 14, 13, 15, 16, 18, 17, 19, 20, 22, 21, -1, -1, 24, 23, -1, -1, 28, 27, 25, 26, 32, 31, 29, 30, 36, 35, 33, 34, 40, 39, 37, 38, 44, 43, 41, 42, 49, 48, 47, 46, 45);
	$mestaN = array (
		1, 2, 3, 4, 
		5, 6, 7, 8, 
		9, 10, 11, 12, 
		13, 14, 15, 16, 
		17, 18, 19, 20,
		21, 22, 23, 24, 
		25, 26, -1, -1, 
		27, 28, -1, -1, 
		31, 32, 29, 30, 
		35, 36, 33, 34, 
		39, 40, 37, 38, 
		43, 44, 41, 42, 
		47, 48, 45, 46, 
		51, 52, 53, 49, 50);

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
				// " <br/><strong>Посадка: </strong>".$mesto->mestoPos
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
	<h3>Дата выезда: <?php  echo date("d.m.Y", strtotime($reisinfoObr[0]->start_out_date));?></h3>
	
	<table>
		<thead>
			<tr>
				<th colspan = "5">Место водителя</th>
			</tr>
		</thead>
	
		<tbody>
			<?php
				for ($i =0; $i<52; $i+=4)
				{
					
			?>
				
					<tr>
						<td><?php echo titleFild1($mesta, $mestaN[$i], $napr); ?></td>
						<td><?php echo titleFild1($mesta, $mestaN[$i+1], $napr); ?></td>
						<td></td>
						<td><?php echo titleFild1($mesta, $mestaN[$i+2], $napr); ?></td>
						<td><?php echo titleFild1($mesta, $mestaN[$i+3], $napr); ?></td>
					</tr>
					
					<?php //echo $mz = mestoZan($mesta, $mestaN[$i],$napr); ?>
					
					<?php //echo titleFild($mesta, $mestaN[$i],$napr); ?>
							
			
			<?php
				}
			?>
			
			<tr>
				<td><?php echo titleFild1($mesta, $mestaN[52], $napr); ?></td>
				<td><?php echo titleFild1($mesta, $mestaN[53], $napr); ?></td>
				<td><?php echo titleFild1($mesta, $mestaN[54], $napr); ?></td>
				<td><?php echo titleFild1($mesta, $mestaN[55], $napr); ?></td>
				<td><?php echo titleFild1($mesta, $mestaN[56], $napr); ?></td>
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