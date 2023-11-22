<?php

/*
* Template Name: Проезд на море
*/
get_header('booking');
?>
<section class="booking-title-wrapper" style="background-image: url(<?php echo get_template_directory_uri();?>/images/mir/contact.jpg);">
	<div class="container-booking">
		<h1 class="booking-title"><?php the_title();?></h1>
	</div>
</section>
<section class="travel-sea">
	<div class = "container-booking">
		<div class="travel-sea__number">
			<div class="travel-sea__number-item stepIndex1 active">1</div>
			<div class="travel-sea__number-item stepIndex2 ">2</div>
			<div class="travel-sea__number-item stepIndex3">3</div>
			<div class="travel-sea__number-item stepIndex4">4</div>
			<div class="travel-sea__number-item stepIndex5">5</div>
		</div>
		
		<section class = "step_wraper">
			<section class="where stepBoxes step1">
				<div class="container-booking">
					<h2 class="section-title">Куда поедем?</h2>
					<div class="travel-sea__note">Выберите населенный пункт в который вы хотели бы поехать по одному из 3 направлений</div>
				<div class="where-block">
					<?php 
						global $wpdb;
						
						$rez = $wpdb->get_results("SELECT * FROM `mt_br_napr` ORDER BY `order` DESC");
						
						$naprMass = array();
						
						foreach ($rez as $napr) {
					?>
							<div class="where-block__title"><? echo $naprStr = $napr->start." - ".$napr->end; $naprMass[$napr->ID] = $naprStr;?></div>
							<div class="where-block__wrapper">
								<?
									$npuncts = explode(";",$napr->prompunkts);
									foreach ($npuncts as $np) {
									?>
										<div data-naprid = "<?echo $napr->ID; ?>" data-punkt = "<?echo $np; ?>" data-start = "<?echo $napr->start; ?>" data-end = "<?echo $napr->end; ?>" data-naprstr = "<?echo $naprStr; ?>"  class="where-block__item">
											<div class="where-block__item-title"><?echo $np; ?></div>
											<div class="where-block__item-descr"><?echo $naprStr; ?></div>
										</div>
									<?
									}
								
									if ($napr->end !== "Крым") {
									?>
										<div data-naprid = "<?echo $napr->ID; ?>" data-punkt = "<?echo $np; ?>" data-start = "<?echo $napr->start; ?>" data-end = "<?echo $napr->end; ?>" data-naprstr = "<?echo $naprStr; ?>" class="where-block__item">
											<div class="where-block__item-title"><?echo $napr->end; ?></div>
											<div class="where-block__item-descr"><?echo $naprStr; ?></div>
										</div>
									<?
									}
								
								?>
								
							</div>
					<?php
						}
					?>
				</div>
			</section>
			<section class="when stepBoxes step2">
				<div class="container-booking">
					<h2 class="section-title">Когда поедем?</h2>
					<div class="when-wrapper">
						<?
							$reises = $wpdb->get_results("SELECT * FROM `mt_br_reis` WHERE `start_to_date` > curdate() ORDER BY `start_to_date` ASC");
							//foreach ($reises as $reis) {
							for ($i = 0; $i<count($reises); $i++){
								$reis = $reises[$i]; 
								
						?>
								<div class="when-item napravlenie<? echo $reis->turtype; ?>">
									<div class = "when-wrapper-inner">
										<div class="when-item__title">Выезд <? echo date("d.m.Y", strtotime($reis->start_to_date));?></div>
										<div class="when-item__text">
											<div class="when-item__text-item">
												<div class="when-item__text-item-title">Рейс №<? echo $reis->ID; ?></div>
												<div class="when-item__text-item-date"><?echo $naprMass[$reis->turtype]; ?></div>
											</div>
										</div>
									</div>
									
									<div class = "when-wrapper-inner-button"
												data-starttodate = "<? echo $reis->start_to_date; ?>"
												data-pribtodate = "<? echo $reis->prib_to_date; ?>"
												data-startoutdate = "<? echo $reis->start_out_date; ?>"
												data-priboutdate = "<? echo $reis->prib_out_date; ?>"
												
												data-price = "<? echo $reis->price; ?>"
												data-t1 = "<? echo $reis->t1; ?>"
												data-t2 = "<? echo $reis->t2; ?>"
												data-t3 = "<? echo $reis->t3; ?>"
												data-t4 = "<? echo $reis->t4; ?>"
									>
										<? if (!empty($reis->out_reis1)){?>
											<span class = "dayButton" data-outreis = "<? echo $reis->out_reis1; ?>"
											
											><?echo $reis->out_reis1_deys; ?> дней</span>
										<?}?>
										
										<? if (!empty($reis->out_reis2)){?>
											<span class = "dayButton" data-outreis = "<? echo $reis->out_reis2; ?>"
												
											><?echo $reis->out_reis2_deys; ?> дней</span>
										<?}?>
										
										<? if (!empty($reis->out_reis3)){?>
											<span class = "dayButton" data-outreis = "<? echo $reis->out_reis3; ?>"
											><?echo $reis->out_reis3_deys; ?> дней</span>
										<?}?>
										
										
										<? if (!empty($reis->out_reis4)){?>
											<span class = "dayButton" data-outreis = "<? echo $reis->out_reis4; ?>"
												
											><?echo $reis->out_reis4_deys; ?> дней</span>
										<?}?>
										
										<? if (!empty($reis->out_reis5)){?>
											<span class = "dayButton" data-outreis = "<? echo $reis->out_reis5; ?>"
											><?echo $reis->out_reis5_deys; ?> дней</span>
										<?}?>
										
										
										
									</div>
									
								</div>
						
						<?
							}
						?>
						<!--
						<div class="when-item">
							<div class="when-item__title">Рейс №22</div>
							<div class="when-item__text">
								<div class="when-item__text-item">
									<div class="when-item__text-item-title">Из Курска</div>
									<div class="when-item__text-item-date">08.06.2020</div>
								</div>
								<div class="when-item__text-arrow"></div>
								<div class="when-item__text-item">
									<div class="when-item__text-item-title">B Курск</div>
									<div class="when-item__text-item-date">18.06.2020</div>
								</div>
							</div>
						</div>
						<div class="when-item">
							<div class="when-item__title">Рейс №23</div>
							<div class="when-item__text">
								<div class="when-item__text-item">
									<div class="when-item__text-item-title">Из Курска</div>
									<div class="when-item__text-item-date">08.06.2020</div>
								</div>
								<div class="when-item__text-arrow"></div>
								<div class="when-item__text-item">
									<div class="when-item__text-item-title">B Курск</div>
									<div class="when-item__text-item-date">18.06.2020</div>
								</div>
							</div>
						</div>
						<div class="when-item">
							<div class="when-item__title">Рейс №24</div>
							<div class="when-item__text">
								<div class="when-item__text-item">
									<div class="when-item__text-item-title">Из Курска</div>
									<div class="when-item__text-item-date">08.06.2020</div>
								</div>
								<div class="when-item__text-arrow"></div>
								<div class="when-item__text-item">
									<div class="when-item__text-item-title">B Курск</div>
									<div class="when-item__text-item-date">18.06.2020</div>
								</div>
							</div>
						</div>
						<div class="when-item">
							<div class="when-item__title">Рейс №24</div>
							<div class="when-item__text">
								<div class="when-item__text-item">
									<div class="when-item__text-item-title">Из Курска</div>
									<div class="when-item__text-item-date">08.06.2020</div>
								</div>
								<div class="when-item__text-arrow"></div>
								<div class="when-item__text-item">
									<div class="when-item__text-item-title">B Курск</div>
									<div class="when-item__text-item-date">18.06.2020</div>
								</div>
							</div>
						</div>
						<div class="when-item">
							<div class="when-item__title">Рейс №25</div>
							<div class="when-item__text">
								<div class="when-item__text-item">
									<div class="when-item__text-item-title">Из Курска</div>
									<div class="when-item__text-item-date">08.06.2020</div>
								</div>
								<div class="when-item__text-arrow"></div>
								<div class="when-item__text-item">
									<div class="when-item__text-item-title">B Курск</div>
									<div class="when-item__text-item-date">18.06.2020</div>
								</div>
							</div>
						</div>
						<div class="when-item">
							<div class="when-item__title">Рейс №26</div>
							<div class="when-item__text">
								<div class="when-item__text-item">
									<div class="when-item__text-item-title">Из Курска</div>
									<div class="when-item__text-item-date">08.06.2020</div>
								</div>
								<div class="when-item__text-arrow"></div>
								<div class="when-item__text-item">
									<div class="when-item__text-item-title">B Курск</div>
									<div class="when-item__text-item-date">18.06.2020</div>
								</div>
							</div>
						</div>
						
						-->
						
					</div>
				</div>
			</section>
			
			
		</section>
		
		<div class="where-block__more">
			<a href="#" class="btn-back prevStep"></a>
			<a href="#" class="btn-step nextStep">Далее</a>
		</div>
		
	</div>
</section>

<?php
get_footer();