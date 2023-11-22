<section class = "bron_user_menu"> 
	<div class="container-booking">
		<ul>
			<li class = "<?php if (get_the_ID() == 3161) echo "selectedpm";?>" ><a class = "bookingLink" href = "<?php echo get_the_permalink(3161); ?>">Оформить проезд</a></li>
			<li class = "<?php if (get_the_ID() == 3181) echo "selectedpm";?>" ><a class = "bronLink" href = "<?php echo get_the_permalink(3181); ?>">Мои брони</a></li>
			<li class = "<?php if (get_the_ID() == 3183) echo "selectedpm";?>" ><a class = "ldLink" href = "<?php echo get_the_permalink(3183); ?>">Мои данные</a></li>
			<li><span class = "ldRelogin">Выход</span></li>
			<li class = "mobileSumm"><span class = "mobileSumm_title">Цена тура</span><br/><span class = "mobileSumm_price"><span class = "itozSumm">0</span> руб.</span></li>
		</ul>
	</div>
</section>