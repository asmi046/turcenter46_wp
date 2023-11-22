<div class = "rColl">
							<?php
									for ($i =0; $i<6; $i++)
									{
							?>
										<div class = "riadi">Ряд <?php echo $i+1; ?></div>
							<?php
									}
							?>
						</div>
						
						<?php
							$mestaN = array (2,1,-1,5,4,3,8,7,6,11,10,9,14,13,12,18,17,16,15);
							$mestaPrPr = array (1,1,0,1,1,1,1,1,1,0,0,0,0,0,0,0,0,0,0);
						?>
						<div id = "taCol1" class = "taCol">
							<div class = "reisinfo">
								<h2><i class="fas fa-map-marker"></i> Направление: <strong><?php $napr = $args["naprinfo"][0]->start." - ".$args["naprinfo"][0]->end; echo $args["naprinfo"][0]->start." - ".$args["textPunkt"];?></strong></h2>
								<h2><i class="far fa-clock"></i> Отправление: <strong><?php  echo date("d.m.Y", strtotime($args["reisinfo"][0]->start_to_date));?></strong></h2>
								<h2><i class="fas fa-bus"></i> № рейса: <strong><?php  echo $_REQUEST["reis"];?></strong></h2>
							</div>
							<div class = "cabina">Место водителя</div>
							<div class = "mesta mesta18">
								<?php
									for ($i =0; $i<15; $i++)
									{
										
								?>
									
										<div title="<?php echo title_to_rs($args["mesta"], $mestaN[$i],$napr); ?>" id = "t<?php echo $mestaN[$i];?>"  class = "<?php echo ($mestaN[$i] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[$i],$napr); echo mestoRez($args["mesta"], $mestaN[$i],$napr,$reisinfo); ?> <? if (!empty($mestaPrPr[$i]) && $_REQUEST["napr"] != 5) echo "onlypr"; ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[$i];?>" data-direct = "<?php echo $napr; ?>" 
										data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[$i],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[$i],$napr); ?>" 	<?php echo titleFild($args["mesta"], $mestaN[$i],$napr); ?>
										>
											<?php echo $mestaN[$i];  echo prozg($args["mesta"], $mestaN[$i],$napr);?>
										</div>
								
								
								<?php
									}
								?>
								<div class = "lastRiad">
									<div title="<?php echo title_to_rs($args["mesta"], $mestaN[15],$napr); ?>"  id = "t<?php echo $mestaN[15];?>"  class = "<?php echo ($mestaN[15] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[15],$napr); ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[15];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[15],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[15],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[15],$napr); ?>><?php echo $mestaN[15];  echo prozg($args["mesta"], $mestaN[15],$napr);?></div>
									
									<div title="<?php echo title_to_rs($args["mesta"], $mestaN[16],$napr); ?>"  id = "t<?php echo $mestaN[16];?>"  class = "<?php echo ($mestaN[16] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[16],$napr); ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[16];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[16],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[16],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[16],$napr); ?>><?php echo $mestaN[16];  echo prozg($args["mesta"], $mestaN[16],$napr);?></div>
									
									<div title="<?php echo title_to_rs($args["mesta"], $mestaN[17],$napr); ?>" id = "t<?php echo $mestaN[17];?>"  class = "<?php echo ($mestaN[17] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[17],$napr); ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[17];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[17],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[17],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[17],$napr); ?>><?php echo $mestaN[17];  echo prozg($args["mesta"], $mestaN[17],$napr);?></div>
									
									<div title="<?php echo title_to_rs($args["mesta"], $mestaN[18],$napr); ?>" id = "t<?php echo $mestaN[18];?>"  class = "<?php echo ($mestaN[18] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[18],$napr); ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[18];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[18],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[18],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[18],$napr); ?>><?php echo $mestaN[18];  echo prozg($args["mesta"], $mestaN[18],$napr);?></div>
									
								</div>
								
							</div>
						</div>
						<div class = "rColl">
							<?php
									for ($i =0; $i<6; $i++)
									{
							?>
										<div class = "riadi">Ряд <?php echo $i+1; ?></div>
							<?php
									}
							?>
						</div>
						<div id = "taCol2 " class = "taCol taColReis<?php  echo $_REQUEST["reis"];?>">
							<div class = "reisinfo">
								<h2><i class="fas fa-map-marker"></i> Направление: <strong><?php $napr = $args["naprinfo"][0]->end." - ".$args["naprinfo"][0]->start; echo $args["textPunkt"]." - ".$args["naprinfo"][0]->start; ?></strong></h2>
								<h2><i class="far fa-clock"></i> Отправление: <strong><?php echo date("d.m.Y", strtotime($args["reisinfo"][0]->start_out_date));?></strong></h2>
								<h2><i class="fas fa-bus"></i> № рейса: <strong><?php  echo $_REQUEST["reis"];?></strong></h2>
							</div>
							<div class = "cabina">Место водителя</div>
							<div class = "mesta mesta18">
								<?php
									for ($i =0; $i<15; $i++)
									{
										
								?>
									
										<div title="<?php echo title_to_rs($args["mesta"], $mestaN[$i],$napr); ?>" id = "o<?php echo $mestaN[$i];?>"  class = "<?php echo ($mestaN[$i] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[$i],$napr); echo mestoRez($args["mesta"], $mestaN[$i],$napr,$reisinfo); ?> <? if (!empty($mestaPrPr[$i]) && $_REQUEST["napr"] != 5) echo "onlypr"; ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[$i];?>" data-direct = "<?php echo $napr; ?>" 
										data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[$i],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[$i],$napr); ?>" 	<?php echo titleFild($args["mesta"], $mestaN[$i],$napr); ?>
										>
											<?php echo $mestaN[$i];  echo prozg($args["mesta"], $mestaN[$i],$napr);?>
										</div>
								
								
								<?php
									}
								?>
								<div class = "lastRiad">
									<div title="<?php echo title_to_rs($args["mesta"], $mestaN[15],$napr); ?>" id = "o<?php echo $mestaN[15];?>"  class = "<?php echo ($mestaN[15] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[15],$napr); ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[15];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[15],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[15],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[15],$napr); ?>><?php echo $mestaN[15]; echo prozg($args["mesta"], $mestaN[15],$napr); ?></div>
									
									<div title="<?php echo title_to_rs($args["mesta"], $mestaN[16],$napr); ?>" id = "o<?php echo $mestaN[16];?>"  class = "<?php echo ($mestaN[16] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[16],$napr); ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[16];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[16],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[16],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[16],$napr); ?>><?php echo $mestaN[16]; echo prozg($args["mesta"], $mestaN[16],$napr);?></div>
									
									<div title="<?php echo title_to_rs($args["mesta"], $mestaN[17],$napr); ?>" id = "o<?php echo $mestaN[17];?>"  class = "<?php echo ($mestaN[17] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[17],$napr); ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[17];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[17],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[17],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[17],$napr); ?>><?php echo $mestaN[17]; echo prozg($args["mesta"], $mestaN[17],$napr);?></div>
									
									<div title="<?php echo title_to_rs($args["mesta"], $mestaN[18],$napr); ?>" id = "o<?php echo $mestaN[18];?>"  class = "<?php echo ($mestaN[18] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[18],$napr); ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[18];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[18],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[18],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[18],$napr); ?>><?php echo $mestaN[18]; echo prozg($args["mesta"], $mestaN[18],$napr);?></div>
									
									
								</div>
								
							</div>
						</div>