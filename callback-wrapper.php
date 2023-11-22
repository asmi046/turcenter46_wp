<?php
$class_logout = 'travel-agency__link';
if(isset($_COOKIE['taRegName'])) {
	$class_logout = 'logout';
}
?>

<div class="header-btn-wrapper">
	<!-- <a href="#" id="callback-link__modal" class="callback-link">Заказать звонок</a>
	<a href="<?php echo get_permalink(1801)?>" class="callback-link callback-link__green-bg btnRed">Поиск тура</a> -->
	<a href="<?php echo get_permalink(12);?>" class="<?php echo $class_logout?>"></a>
</div>