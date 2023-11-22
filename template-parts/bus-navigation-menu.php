<div class = "catMTurNavigation" >
	<a class = "reg <?php if ($cID == 14) echo "regActive"; ?>" href = "<?php echo get_category_link(14);?>" >Краснодарский край:</a>
	<ul class = "naprMoreTurUl"> 
		<?php 
			wp_list_categories( array(
				'child_of' => 14, 
				'hide_empty'=> 1, 
				'title_li' => '') ); 
		?> 
	</ul>
	<a class = "reg <?php if ($cID == 15) echo "regActive"; ?>" href = "<?php echo get_category_link(15);?>" >Крым:</a>
	<ul class = "naprMoreTurUl">  
		<?php 
			wp_list_categories( array(
				'child_of' => 15, 
				'hide_empty'=> 1, 
				'title_li' => '') ); ?>
		<li><a href="<?php echo get_permalink(6050);?>" class="yalta-point">Ялта - Гурзуф - Алушта<span class="miniNadp">new</span></a></li>
		
	</ul>
</div>	 