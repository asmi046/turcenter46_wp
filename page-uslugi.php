<?php
/*
Template Name: Услуги
*/
?>
<?php get_header(); ?>
		<div class = "line banerLine banerLineInPage">
		<div class = "allB">
			<div style = "display:block; background: url(<?php bloginfo('template_url');?>/images/b/<?php echo get_post_meta( $post->ID, "banerName", true)?>);" class = "b">
				<div class = "centerInLine">
					<!--
					<div class = "banerText">
					
					</div>
					-->
					
				</div>
			</div>
			
			
			<div class = "firstM">
				1 место</br>
				"Независимый рейтинг 2015г."
			</div>
			
		</div>
	</div>
	
	<div class = "line PageContent singlePage exkursTur">
		<div class = "centerInLine">
			<div class="breadcrumb">
				<?php
				if(function_exists('bcn_display'))
				{
					bcn_display();
				}
				?>
			</div>
	
			<div class = "content ">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h1><?php the_title();?></h1>
					<?php the_content();?>
					<div class = "uslElems">
						<div class = 'turElem uslElem'>
								<a href = "https://www.turcentr46.ru/vizovyj-centr">
									<div class = 'turThumb'>
										<img src = "<?php bloginfo('template_url');?>/images/viza-center.jpg" />
										<div class="text">
											<h2>Визовый центр в Курске</h2>
										</div>
									</div>
								</a>
								<a href = "https://www.turcentr46.ru/vizovyj-centr">
									<div class = 'turInfoElem'>
										<div class = 'upp'>
											Оформление виз в Курске. Визовый центр ТурЦентр предлагает оформление виз по всем направлениям в Курске. Дактелоскопия на  Шенгенскую визу в нашем офисе. 	
										</div>
										
									</div>
								</a>
						</div>
						
						<div class = 'turElem uslElem'>
								<div class = 'turThumb'>
									<img src = "<?php bloginfo('template_url');?>/images/kassi.jpg" />
									<div class="text">
										<h2>Авиа/жд билеты</h2>
									</div>
								</div>
								
								<div class = 'turInfoElem'>
									<div class = 'upp'>
											Для Вашего удобства у нас ежедневно работает ЖД и АВИА касса. Таким образом приобрести любые ЖД и АВИА билеты стало значительно проще, а самое главное удобнее и быстрее! В Туристическом центре «ТурЦентр»! Наша ЖД, Авиакасса работает ежедневно с 09:00 до 20:00.
									</div>
									
								</div>
						</div>
						
						<div class = 'turElem uslElem'>
								<div class = 'turThumb'>
									<img src = "<?php bloginfo('template_url');?>/images/zagPasport.jpg" />
									<div class="text">
										<h2>Оформление загранпаспорта</h2>
									</div>
								</div>
								
								<div class = 'turInfoElem'>
									<div class = 'upp'>
											У Вас закончился срок действия заграничного паспорта? Или у Вас ещё нет загранпаспорта, но Вы хотите посетить  лучшие курорты мира?  Тогда спешите к нам! Быстро и профессионально поможем в оформлении заграничного паспорта! И в минимальные сроки Вы сможете поехать туда, куда мечтали!
									</div>
									
								</div>
						</div>
						
						<div class = 'turElem uslElem'>
								<div class = 'turThumb'>
									<img src = "<?php bloginfo('template_url');?>/images/giftCard.jpg" />
									<div class="text">
										<h2>Подарочные карты</h2>
									</div>
								</div>
								
								<div class = 'turInfoElem'>
									<div class = 'upp'>
											
											Не знаете что подарить на день рождения, юбилей или знаменательное событие? Есть отличная идея - подарочные карты Туристического центра «ТурЦентр»! Это не только красивый, но и весомый подарок любого номинала! Картами можно оплачивать до 100% предстоящего отдыха!
									</div>
									
								</div>
						</div>
						
						<div class = 'turElem uslElem'>
								<div class = 'turThumb'>
									<img src = "<?php bloginfo('template_url');?>/images/globalSim.jpg" />
									<div class="text">
										<h2>Продажа туристических сим-карт</h2>
									</div>
								</div>
								
								<div class = 'turInfoElem'>
									<div class = 'upp'>
											К услугам наших клиентов мы предлагаем Международные туристические сим-карты! Все входящие БЕСПЛАТНО! Оставайтесь  на связи в любой точке мира! Это лучший способ тратить деньги на отдых, а не на разговоры!
									</div>
									
								</div>
						</div>
					</div>
					
				<?php endwhile;?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>