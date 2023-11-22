<a href="<?php echo get_the_permalink();?>">
	<div class = 'turThumb'>
		<?php 
			if (!empty (get_post_meta(get_the_ID(), "iconFlag", true)))
			{
				echo "<div class = 'iconFlgPl'>".get_post_meta(get_the_ID(), "iconFlag", true)."</div>";
			}
		?>
		<?php echo get_the_post_thumbnail( get_the_ID(), "turImg", array("alt" => get_the_title(), "title" => get_the_title())); ?>
		
		<div class = 'text'>
			<div class = "line1"><i class="far fa-clock"></i> <?php echo carbon_get_the_post_meta('turkey_day'); ?> </div>
			<div class = 'line2'><strong><?php echo carbon_get_the_post_meta('resort_city'); ?></strong></div>
			<div class="country-flag" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('turkey_flag'), 'full')[0]?>);"></div>
		</div>
	</div>
</a>
	<div class = 'turInfoElem'> 
		<div class = 'upp'>
			
				<a href="<?php echo get_the_permalink();?>"><h2><?php echo get_the_title() ?></h2></a> 
		
			<?php 
				if (get_post_meta( $post->ID, "tur_date", true) === "") {
					echo apply_filters('the_content', $post->post_excerpt);
				} else
					echo get_post_meta($post->ID, "tur_date", true);
			
			?>
		</div>
		
		<div class='boot <?php if (carbon_get_the_post_meta("turkey_price") === "") echo "bootNo"; ?>'>
			<div class = 'price'>
				<strong class=""><?php echo carbon_get_the_post_meta("turkey_price"); ?></strong><span class = 'grayText'></span>
			</div>
			
			<div class = 'podr'>
				<a href="<?php echo get_the_permalink();?>">Подробнее</a>
			</div>
		</div>
	</div>