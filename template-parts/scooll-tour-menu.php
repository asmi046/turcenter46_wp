<div class = "scMenuWraper">
<?$cat_ID = get_query_var('cat');?>
	<a class = "<?echo ($cat_ID == 5)?"navSelect":""; ?> bluebtn" href="<?php echo get_category_link( 5 )?>"  title = "Все школьные туры в Курске">Все</a>
	<a class = "<?echo ($cat_ID == 6)?"navSelect":""; ?> bluebtn" href="<?php echo get_category_link( 6 )?>"  title = "Туры выходного дня">Туры выходного дня</a>
	<a class = "<?echo ($cat_ID == 7)?"navSelect":""; ?> bluebtn" href="<?php echo get_category_link( 7 )?>"  title = "Курский край">Курский край</a>
	<a class = "<?echo ($cat_ID == 8)?"navSelect":""; ?> bluebtn" href="<?php echo get_category_link( 8 )?>"  title = "Белгородская область">Белгородская область</a>
	<a class = "<?echo ($cat_ID == 9)?"navSelect":""; ?> bluebtn" href="<?php echo get_category_link( 9 )?>"  title = "Орловская область">Орловская область</a>
	<a class = "<?echo ($cat_ID == 10)?"navSelect":""; ?> bluebtn" href="<?php echo get_category_link( 10 )?>"  title = "Воронежская область">Воронежская область</a>
	<a class = "<?echo ($cat_ID == 11)?"navSelect":""; ?> bluebtn" href="<?php echo get_category_link( 11 )?>"  title = "Тульская область">Тульская область</a>
	<a class = "<?echo ($cat_ID == 12)?"navSelect":""; ?> bluebtn" href="<?php echo get_category_link( 12 )?>"  title = "Популярные">Популярные</a>
</div>