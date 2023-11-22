
<div class = 'turThumb'>

	<?php 
	if (!empty (carbon_get_the_post_meta('excurs_tours_sticker')))
	{
		echo "<div class = 'iconFlgPl'>".carbon_get_the_post_meta('excurs_tours_sticker')."</div>";
	}
	?>

	<?php echo get_the_post_thumbnail( get_the_ID(), "turImg", array("alt" => get_the_title(), "title" => get_the_title())); ?>
	<div class = 'text '>
		<div class = "line1"><i class="far fa-clock"></i> <?php $deycount = get_post_meta(get_the_ID(), "day_count", true); echo empty($deycount)?get_post_meta(get_the_ID(), "_day_count", true):$deycount; ?> </div>
		<div class = 'line2'><strong><?php $mesto = get_post_meta(get_the_ID(), "where", true); echo empty($mesto)?get_post_meta(get_the_ID(), "_where", true):$mesto; ?></strong></div>
	</div>
</div>

<div class = 'turInfoElem'>
	<div class = 'upp'>

		<h2><?php echo get_the_title() ?></h2>
		
		<?php 
		if (empty(get_post_meta( $post->ID, "tur_date", true))&&empty(get_post_meta( $post->ID, "_tur_date", true))) {
			echo apply_filters('the_content', $post->post_excerpt);
		} else
		{
			$td = get_post_meta($post->ID, "tur_date", true);
			echo empty($td)?get_post_meta($post->ID, "_tur_date", true):$td;
		}
		?>
	</div>

	<div class = 'boot '>
		<?php $is_sale = !empty(get_post_meta( $post->ID, "new_price", true)) ? 'is_sale' : '';?>
		<div class = 'price'>
			<strong><?php $priceM = get_post_meta($post->ID, "price", true); echo empty($priceM)?get_post_meta($post->ID, "_price", true):$priceM; ?></strong><span class = 'grayText'> <span class="curr">₽</span></span>
				<!-- <div class="red-line <?php echo $is_sale;?>"></div>
					<div class="new-price <?php echo $is_sale;?>"><?php echo get_post_meta($post->ID, "new_price", true); ?></div> -->
				</div>

				<div class = 'podr'>
					<?php 
					if (!carbon_get_the_post_meta('checkbox_empty_card'))
					// if (get_post_meta( $post->ID, "clicable", true)!== "0") 
					echo "Подробнее"; ?>
				</div>
			</div>
		</div>

