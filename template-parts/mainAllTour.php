			<?php if(!is_home() || !is_front_page()):?>
				<h2>Актуальные предложения</h2>
			<?php endif;?>
			<div class="mainAllTur">
				<?php $arr_tours = carbon_get_theme_option('complex_tours');
					if($arr_tours):
						foreach($arr_tours as $tour):?>
							<div class="turElem"><a href="<?php echo $tour['complex_tours_link'];?>">
								<div class="turThumb">
									<?php if($tour['complex_tours_sticker']):?>
										<div class="iconFlgPl"><?php echo $tour['complex_tours_sticker'];?></div>
									<?php endif;?>
									<img width="390" height="260" src="<?php echo wp_get_attachment_image_src($tour['complex_tours_img'], 'large')[0];?>" class="attachment-turImg size-turImg wp-post-image" alt="<?php echo $tour['complex_tours_title']?>" title="<?php echo $tour['complex_tours_title']?>">		
									<?php if (!empty($tour['complex_tours_qty_days'])) {?>
									<div class="text ">
										<div class="line1"><!-- <i class="far fa-clock"></i> --> <?php echo $tour['complex_tours_qty_days']?> </div>
										<div class="line2"><strong><?php echo $tour['complex_tours_place']?></strong></div>
									</div>
									<?php } ?>
								</div>
								
								<div class="turInfoElem">
									<div class="upp">
										
											<h2><?php echo $tour['complex_tours_title']?></h2>
									<br>
										<?php echo $tour['complex_tours_date']?>		</div>
									
									<div class="boot ">
										
										
										<div class="price">
											<?php if(!empty($tour['complex_tours_price'])){?>
											  <strong><?php echo $tour['complex_tours_price']?></strong><span class="grayText"> <span class="curr">₽</span></span>
											<?php } ?>
											<div class="red-line "></div>
											<div class="new-price "></div>
										</div>
										
										<div class="podr">
											<?php echo $tour['complex_tours_more_link']?>			</div>
									</div>
								</div>

							</a></div>
						<?php endforeach;
					endif;
				?>
			</div>