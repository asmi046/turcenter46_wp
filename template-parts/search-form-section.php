<section class="search-site">
	<div class="centerInLine centerInLine__search">
		<form role="search" method="get" action="<?php echo home_url( '/?s=экскурсионный' ) ?>" class="search-site__form">
				<input id="search-site__int" type="text" tabindex = "1" autocomplete="off" value = "<? echo $_REQUEST["s"];?>" name="s" placeholder="Строка поиска"> 
				<button id="search-site__btn" tabindex = "1" value="" type="submit">Искать</button>
		</form>
	</div>
</section>

