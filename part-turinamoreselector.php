



	<?php  if (in_array(4, get_ancestors( $cID, 'category' ))): ?>
			<div class = "catMTurNavigation" >
				<ul class = "naprMoreTurUl"><a class = "reg <?php if ($cID == 14) echo "regActive"; ?>" href = "<?php echo get_category_link(14);?>" >Краснодарский край:</a> <?php wp_list_categories( array('child_of' => 14, 'hide_empty'=> 0, 'title_li' => '') ); ?> </ul>
				<ul class = "naprMoreTurUl"><a class = "reg <?php if ($cID == 15) echo "regActive"; ?>" href = "<?php echo get_category_link(15);?>" >Крым:</a> <?php wp_list_categories( array('child_of' => 15, 'hide_empty'=> 0, 'title_li' => '') ); ?>
					<li><a href="<?php echo get_permalink(162);?>">Наши автобусы<span class="miniNadp">&nbsp;</span></a></li> 
				</ul>
			</div>				
<?php endif; ?> 