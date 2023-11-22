<section class="bus-tour">
	<div class="container-booking">
		<ul class="ul-clean menu-bus-tour menu-bus"> 
<!-- 			<li class="menu-bus-li__top-tur">
				<a class="menu-bus-li__nvg-tur" href="<?php echo get_category_link(31)?>">Новогодние туры</a>
			</li> -->
			<li class="menu-bus-li menu-bus-li_ya">
				<a href="https://www.mirturizma46.ru/avtobusnye-tury-kursk-yalta/" class = "topLnk">Ялта</a>
				<ul class="sub-menu">
					<li class = "cat-item"><a href="<?php echo get_the_permalink(6978)?>">Симферополь</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(6976)?>">Алушта</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(6974)?>">Гурзуф</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(6050)?>">Ялта</a></li> 
				</ul>   
			</li>
			<li class="menu-bus-li menu-bus-li_e">
				<a href="https://www.mirturizma46.ru/poisk-turov-on-line-v-kurske/otdyx-v-turcii/" class = "topLnk">Египет</a>
				<ul class="sub-menu">
					<li class = "cat-item"><a href="<?php echo get_the_permalink(4373)?>">Хургада</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(4369)?>">Шарм-Эль-Шейх</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(5441)?>">Дахаб</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(5437)?>">Каир</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(5439)?>">Сафага</a></li>
				</ul>  
			</li>
			<li class="menu-bus-li menu-bus-li_t">
				<a href="https://www.mirturizma46.ru/poisk-turov-on-line-v-kurske/otdyx-v-turcii/" class = "topLnk">Турция</a>
				<ul class="sub-menu">
					<li class = "cat-item"><a href="<?php echo get_the_permalink(1868)?>">Алания</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(1870)?>">Анталия</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(1872)?>">Белек</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(1874)?>">Бодрум</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(1883)?>">Кемер</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(1887)?>">Мармарис</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(1889)?>">Сиде</a></li>
				</ul> 
			</li>
			<li class="menu-bus-li menu-bus-li_o">
				<a href="https://www.mirturizma46.ru/poisk-turov-on-line-v-kurske/tury-v-oae/" class = "topLnk">ОАЭ</a>
				<ul class="sub-menu">
					<li class = "cat-item"><a href="<?php echo get_the_permalink(1897)?>">Абу-Даби</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(1934)?>">Аджман</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(1895)?>">Дубай</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(1936)?>">Дубай-Джумейра</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(1938)?>">Рас-эль-Хайм</a></li>
					<li class = "cat-item"><a href="<?php echo get_the_permalink(1940)?>">Фуджейра</a></li>
				</ul>
			</li>
			<li class="menu-bus-li mobil-hiden menu-bus-li_k">
				<a href="https://www.mirturizma46.ru/turi-na-more/avtobusnye-tury-v-krym/" class = "topLnk">Крым</a>
				<ul class="sub-menu">
					<?php wp_list_categories( array('child_of' => 15, 'hide_empty'=> 0, 'title_li' => '', 'use_desc_for_title' => 0) ); ?>
				</ul>
			</li>
			
			<li class="menu-bus-li mobil-hiden menu-bus-li_kra">
				<a href="https://www.mirturizma46.ru/turi-na-more/krasnodarskij-kraj/" class = "topLnk">Краснодарский край</a>
				<ul class="sub-menu">
					<?php wp_list_categories( array('child_of' => 14, 'hide_empty'=> 0, 'title_li' => '', 'use_desc_for_title' => 0) ); ?>
				</ul>
			</li>
		</ul>
	</div>
</section>

