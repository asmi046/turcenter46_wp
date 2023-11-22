<div class = "rColl">
							<?php
									for ($i =0; $i<14; $i++)
									{
							?>
										<div class = "riadi">Ряд <?php echo $i+1; ?></div>
							<?php
									}
							?>
						</div>
						
						<?php
							$mestaN = array (
								1, 2, 3, 4, 
								5, 6, 7, 8, 
								9, 10, 11, 12, 
								13, 14, 15, 16, 
								17, 18, 19, 20,
								21, 22, 23, 24, 
								25, 26, -1, -1, 
								27, 28, -1, -1, 
								31, 32, 29, 30, 
								35, 36, 33, 34, 
								39, 40, 37, 38, 
								43, 44, 41, 42, 
								47, 48, 45, 46, 
								51, 52, 53, 49, 50);
						?>
						<div id = "taCol1" class = "taCol">
							<div class = "reisinfo">
								<h2><i class="fas fa-map-marker"></i> Направление: <strong><?php $napr = $args["naprinfo"][0]->start." - ".$args["naprinfo"][0]->end; echo $args["naprinfo"][0]->start." - ".$args["textPunkt"];?></strong></h2>
								<h2><i class="far fa-clock"></i> Отправление: <strong><?php  echo date("d.m.Y", strtotime($args["reisinfo"][0]->start_to_date));?></strong></h2>
								<h2><i class="fas fa-bus"></i> № рейса: <strong><?php  echo $_REQUEST["reis"];?></strong></h2>
							</div>
							<div class = "cabina">Место водителя</div>
							<div class = "mesta">
								<?php
									for ($i =0; $i<52; $i++)
									{
										
								?>
									
										<div title="<?php echo title_to_rs($args["mesta"], $mestaN[$i],$napr); ?>" id = "t<?php echo $mestaN[$i];?>"  class = "<?php echo ($mestaN[$i] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[$i],$napr); echo mestoRez($args["mesta"], $mestaN[$i],$napr,$args["reisinfo"]); ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[$i];?>" data-direct = "<?php echo $napr; ?>" 
										data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[$i],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[$i],$napr); ?>" 	<?php echo titleFild($args["mesta"], $mestaN[$i],$napr); ?>
										>
											<?php echo $mestaN[$i];  echo prozg($args["mesta"], $mestaN[$i],$napr);?>
										</div>
								
								
								<?php
									}
								?>
								<div class = "lastRiad">
									
									<?php 
										$start = 52;
										for ( $i =0; $i<5; $i++) {?>
										<div title="<?php echo title_to_rs($args["mesta"], $mestaN[$start+$i],$napr); ?>" id = "t<?php echo $mestaN[$start+$i];?>"  class = "<?php echo ($mestaN[$start+$i] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[$start+$i],$napr); ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[$start+$i];?>" data-direct = "<?php echo $napr; ?>" 
										data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[$start+$i],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[$start+$i],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[$start+$i],$napr); ?>><?php echo $mestaN[$start+$i];  echo prozg($args["mesta"], $mestaN[$start+$i],$napr);?></div>
									<? } ?>

									<!-- <div  id = "t<?php echo $mestaN[53];?>"  class = "<?php echo ($mestaN[54] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[54],$napr); ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[54];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[54],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[54],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[54],$napr); ?>><?php echo $mestaN[54];  echo prozg($args["mesta"], $mestaN[54],$napr);?></div>
									
									<div  id = "t<?php echo $mestaN[54];?>"  class = "<?php echo ($mestaN[55] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[55],$napr); ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[55];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[55],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[55],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[55],$napr); ?>><?php echo $mestaN[55];  echo prozg($args["mesta"], $mestaN[55],$napr);?></div>
									
									<div  id = "t<?php echo $mestaN[55];?>"  class = "<?php echo ($mestaN[51] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[56],$napr); ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[56];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[51],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[56],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[56],$napr); ?>><?php echo $mestaN[56];  echo prozg($args["mesta"], $mestaN[56],$napr);?></div>
									
									<div  id = "t<?php echo $mestaN[57];?>"  class = "<?php echo ($mestaN[57] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[57],$napr); ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[57];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[57],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[57],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[57],$napr); ?>><?php echo $mestaN[57];  echo prozg($args["mesta"], $mestaN[57],$napr);?></div> -->
								</div>
								
							</div>
						</div>
						<div class = "rColl">
							<?php
									for ($i =0; $i<14; $i++)
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
							<div class = "mesta">
								<?php
									for ($i =0; $i<52; $i++)
									{
										
								?>
									
										<div title="<?php echo title_to_rs($args["mesta"], $mestaN[$i],$napr); ?>"  id = "o<?php echo $mestaN[$i];?>"  class = "<?php echo ($mestaN[$i] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[$i],$napr); echo mestoRez($args["mesta"], $mestaN[$i],$napr,$args["reisinfo"]); ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[$i];?>" data-direct = "<?php echo $napr; ?>" 
										data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[$i],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[$i],$napr); ?>" 	<?php echo titleFild($args["mesta"], $mestaN[$i],$napr); ?>
										>
											<?php echo $mestaN[$i];  echo prozg($args["mesta"], $mestaN[$i],$napr);?>
										</div>
								
								
								<?php
									}
								?>
								<div class = "lastRiad">
									
									<?php 
										$start = 52;
										for ( $i =0; $i<5; $i++) {?>
											<div title="<?php echo title_to_rs($args["mesta"], $mestaN[$start+$i],$napr); ?>" id = "o<?php echo $mestaN[$start+$i];?>"  class = "<?php echo ($mestaN[$start+$i] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[$start+$i],$napr); ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[$start+$i];?>" data-direct = "<?php echo $napr; ?>" 
											data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[$start+$i],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[$start+$i],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[$start+$i],$napr); ?>><?php echo $mestaN[$start+$i]; echo prozg($args["mesta"], $mestaN[$start+$i],$napr); ?></div>
									
									<? } ?>

									<!-- <div  id = "o<?php echo $mestaN[54];?>"  class = "<?php echo ($mestaN[54] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[54],$napr); ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[54];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[54],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[54],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[54],$napr); ?>><?php echo $mestaN[54]; echo prozg($args["mesta"], $mestaN[54],$napr);?></div>
									
									<div  id = "o<?php echo $mestaN[55];?>"  class = "<?php echo ($mestaN[55] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[55],$napr); ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[55];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[55],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[55],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[55],$napr); ?>><?php echo $mestaN[55]; echo prozg($args["mesta"], $mestaN[55],$napr);?></div>
									
									<div  id = "o<?php echo $mestaN[56];?>"  class = "<?php echo ($mestaN[56] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[56],$napr); ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[56];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[56],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[56],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[56],$napr); ?>><?php echo $mestaN[56]; echo prozg($args["mesta"], $mestaN[56],$napr);?></div>
									
									<div  id = "o<?php echo $mestaN[57];?>"  class = "<?php echo ($mestaN[57] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[57],$napr); ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[57];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[57],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[57],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[57],$napr); ?>><?php echo $mestaN[57]; echo prozg($args["mesta"], $mestaN[57],$napr);?></div> -->
								</div>
								
							</div>
						</div>