<?php

/*
* Template Name: Страница оплаты
*/
get_header('booking');
?>

<?php
	

?>

<section class="booking-title-wrapper" style="background-image: url(<?php echo get_template_directory_uri();?>/images/mir/contact.jpg);">
	<div class="container-booking">
		<h1 class="booking-title"><?php the_title();?></h1>
	</div>
</section>

<?php include ("bron-menu.php");?>

<section class = "login-section">
	<div class="container-booking" id = "container-login-section" >
		
		<?php
			global $wpdb;
			$broninfo = $wpdb->get_results('SELECT * FROM `mt_br_mesto`  WHERE `registrid` = "'.$_REQUEST["paybrid"].'" AND `clientype` = 5');
			
			$reisinfo = $wpdb->get_results('SELECT * FROM `mt_br_reis` WHERE `ID` = '.$broninfo[0]->reisID);
			
			$hotelName = explode(" -> ", $broninfo[0]->hotelName)[0];
			
		?>
		
		<div class="pay-information">
			<h2>Оплата брони: <?php echo $broninfo[0]->registrid; ?></h2>
			<strong>Направление: </strong> <?php echo $broninfo[0]->direct; ?><br/>
			<strong>Рейс № <?php echo $broninfo[0]->reisID; ?></strong> с <?php echo $reisinfo[0]->start_to_date; ?> по <?php echo $reisinfo[0]->prib_out_date; ?> <br/>
			<strong>Куплено мест: </strong> <?php echo count($broninfo); ?><br/>
			<strong>До пункта: </strong> <?php echo $broninfo[0]->punkt; ?><br/>
			
			<strong>Проживание в отеле: </strong> <?php echo $hotelName; ?><br/>
			
			
			<?php $payprice = (int)$broninfo[0]->fullprice - (int)$broninfo[0]->predoplata;?>
			
			<h3>Сумма: <span style = "color:#1FDC58;"><?php echo  $payprice;?> руб.</span></h3>
			
			<script>
				function showSuccessfulPurchase(order) {
					jQuery(".messageSucses").show();
					jQuery(".pay_button_in_page").hide();
					console.log(order);
					console.log(order.amount);
					
					var  jqXHR = jQuery.post(
						allAjax.ajaxurl,
						{
							action: 'upprice_booking',		
							nonce: allAjax.nonce,
							bronid:"<?php echo $_REQUEST['paybrid'];?>",
							amount:parseInt(order.amount)/parseInt(100),
						}
						
					);
					
					
					jqXHR.done(function (responce) {
					
					});
					
					jqXHR.fail(function (responce) {
						alert("Произошла ошибка попробуйте поздене!");
						console.log("ERROR!");
					});
					
					/*
					jQuery(".messageInfo").hide();
					jQuery("#msgPayOk").show();
					jQuery("#info-msg-modal").arcticmodal({
						afterClose: function(data, el) {
							window.location.href = "https://www.mirturizma46.ru/zabronirovano-mnoj/";
						}
						
					});
					*/
				}
				
				function showFailurefulPurchase(order) {
					/*
					jQuery(".messageInfo").hide();
					jQuery("#msgPayFail").show();
					jQuery("#info-msg-modal").arcticmodal({
						afterClose: function(data, el) {
							
						}
						
					});
					*/
					
					console.log(order);
				}
			</script>
			
			<div class = "newButton pay_button_in_page"
			onclick="ipayCheckout({
					amount:<?php echo $payprice;?>,
					currency:'RUB',
					order_number:'<?php echo $broninfo[0]->registrid."-".date("is").rand(100,200); ?>',
					description: 'Оплата брони: <?php echo $broninfo[0]->registrid; ?>, плательщик: <?php echo $broninfo[0]->bronflname; ?> телефон: <?php echo $broninfo[0]->bronflphone; ?>'},
					function(order) { showSuccessfulPurchase(order) },
					function(order) { showFailurefulPurchase(order) })"
			
			>Оплатить</div>
			
			<?php
				echo "<pre style = 'display:none;'>";
				print_r($broninfo);
				echo "</pre>";
			?>
			
			<p style = "display:none;" class = "messageSucses">Оплата успешна! Подробнее в разделе <a href = "<?php echo get_the_permalink(3181); ?>">мои брони</a>.</p>			
		</div>
		
		
		
	</div>
</section>
<?php
get_footer();