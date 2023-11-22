<div class = 'turElem turMoreElem'>
	<?
		$closet = carbon_get_post_meta( get_the_ID(), "otel_close");
		if (!empty($closet)) {
	?>
	
		<a href = '<?php echo get_the_permalink($post->ID); ?>'>
			<div class = "official_close" >
				<p><? echo $closet; ?></p>
			</div>
		</a>
	<?
		}
	?>
	<div class = 'turThumb'>
		<a href = '<?php echo get_the_permalink($post->ID); ?>'>
		<?php 
			//echo get_the_post_thumbnail( get_the_ID(), "turImg", array("alt" => get_the_title(), "title" => get_the_title())); 
			echo get_the_post_thumbnail( get_the_ID(), "large",  array("title" => get_the_title())); 
		
		?>
		<?php if(carbon_get_the_post_meta('close_tour_1')):?> 
			<div class="close-block"></div>
		<?php endif;?>
		</a>
		<div class = 'text'>
			<div class = "line1"><i class="fas fa-bed"></i> <p><?php echo get_post_meta(get_the_ID(), "razm", true); ?></p></div>
			<div class = 'line1 line1-beach'><i class="far fa-sun"></i><p> <?php echo get_post_meta(get_the_ID(), "plazg", true); ?></p></div>
		</div>
	</div>
	
	<div class = 'turInfoElem'> 
		<div class = 'upp'>
			<a href = '<?php echo get_the_permalink($post->ID); ?>'>
				<h2><?php echo get_the_title() ?></h2>
			</a>
			<?php echo get_the_excerpt($post->ID);?>
		</div>
		
		
		<div class = 'boot'>
			<div class = 'price priceSmile'>
				<span class = 'grayText'>от </span><strong><?php echo get_post_meta($post->ID, "startPrice", true)? get_post_meta($post->ID, "startPrice", true) : get_post_meta($post->ID, "html_Price", true); ?></strong><span class = 'grayText'> ₽</span>
			</div>
			
			<!--<i title = "Оставь заявку и получи приятный сюрприз при заказе тура." class="fa fa-gift"></i>-->
			
			<div class = 'podr podrSmile'>
				<a href = '<?php echo get_the_permalink($post->ID); ?>'>Подробнее</a>
			</div>
			
			<img class = "tgift" src = "<?php echo bloginfo("template_url");?>/images/tgift.png" title = "Оставь заявку и получи приятный сюрприз при заказе тура." />
		</div>
	</div>
</div>