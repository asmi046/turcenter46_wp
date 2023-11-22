<div class = "rColl">
							<?php
									for ($i =0; $i<13; $i++)
									{
							?>
										<div class = "riadi">Ряд <?php echo $i+1; ?></div>
							<?php
									}
							?>
						</div>
						
						<?php
							$mestaN = array (2, 1, 3, 4, 6, 5, 7, 8, 10, 9, 11, 12, 14, 13, 15, 16, 18, 17, 19, 20, 22, 21, -1, -1, 24, 23, -1, -1, 28, 27, 25, 26, 32, 31, 29, 30, 36, 35, 33, 34, 40, 39, 37, 38, 44, 43, 41, 42, 49, 48, 47, 46, 45);
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
									for ($i =0; $i<48; $i++)
									{
										
								?>
									
										<div  id = "t<?php echo $mestaN[$i];?>"  class = "<?php echo ($mestaN[$i] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[$i],$napr); echo mestoRez($args["mesta"], $mestaN[$i],$napr,$args["reisinfo"]); ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[$i];?>" data-direct = "<?php echo $napr; ?>" 
										data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[$i],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[$i],$napr); ?>" 	<?php echo titleFild($args["mesta"], $mestaN[$i],$napr); ?>
										>
											<?php echo $mestaN[$i];  echo prozg($args["mesta"], $mestaN[$i],$napr);?>
										</div>
								
								
								<?php
									}
								?>
								<div class = "lastRiad">
									<div  id = "t<?php echo $mestaN[48];?>"  class = "<?php echo ($mestaN[48] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[48],$napr); ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[48];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[48],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[48],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[48],$napr); ?>><?php echo $mestaN[48];  echo prozg($args["mesta"], $mestaN[48],$napr);?></div>
									
									<div  id = "t<?php echo $mestaN[49];?>"  class = "<?php echo ($mestaN[49] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[49],$napr); ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[49];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[49],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[49],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[49],$napr); ?>><?php echo $mestaN[49];  echo prozg($args["mesta"], $mestaN[49],$napr);?></div>
									
									<div  id = "t<?php echo $mestaN[50];?>"  class = "<?php echo ($mestaN[50] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[50],$napr); ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[50];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[50],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[50],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[50],$napr); ?>><?php echo $mestaN[50];  echo prozg($args["mesta"], $mestaN[50],$napr);?></div>
									
									<div  id = "t<?php echo $mestaN[51];?>"  class = "<?php echo ($mestaN[51] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[51],$napr); ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[51];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[51],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[51],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[51],$napr); ?>><?php echo $mestaN[51];  echo prozg($args["mesta"], $mestaN[51],$napr);?></div>
									
									<div  id = "t<?php echo $mestaN[52];?>"  class = "<?php echo ($mestaN[52] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[52],$napr); ?>" data-directchar = "t" data-mestonum = "<?php echo $mestaN[52];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[52],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[52],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[52],$napr); ?>><?php echo $mestaN[52];  echo prozg($args["mesta"], $mestaN[52],$napr);?></div>
								</div>
								
							</div>
						</div>
						<div class = "rColl">
							<?php
									for ($i =0; $i<13; $i++)
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
									for ($i =0; $i<48; $i++)
									{
										
								?>
									
										<div  id = "o<?php echo $mestaN[$i];?>"  class = "<?php echo ($mestaN[$i] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[$i],$napr); echo mestoRez($args["mesta"], $mestaN[$i],$napr,$args["reisinfo"]); ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[$i];?>" data-direct = "<?php echo $napr; ?>" 
										data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[$i],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[$i],$napr); ?>" 	<?php echo titleFild($args["mesta"], $mestaN[$i],$napr); ?>
										>
											<?php echo $mestaN[$i];  echo prozg($args["mesta"], $mestaN[$i],$napr);?>
										</div>
								
								
								<?php
									}
								?>
								<div class = "lastRiad">
									<div  id = "o<?php echo $mestaN[48];?>"  class = "<?php echo ($mestaN[48] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[48],$napr); ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[48];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[48],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[48],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[48],$napr); ?>><?php echo $mestaN[48]; echo prozg($args["mesta"], $mestaN[48],$napr); ?></div>
									
									<div  id = "o<?php echo $mestaN[49];?>"  class = "<?php echo ($mestaN[49] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[49],$napr); ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[49];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[49],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[49],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[49],$napr); ?>><?php echo $mestaN[49]; echo prozg($args["mesta"], $mestaN[49],$napr);?></div>
									
									<div  id = "o<?php echo $mestaN[50];?>"  class = "<?php echo ($mestaN[50] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[50],$napr); ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[50];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[50],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[50],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[50],$napr); ?>><?php echo $mestaN[50]; echo prozg($args["mesta"], $mestaN[50],$napr);?></div>
									
									<div  id = "o<?php echo $mestaN[51];?>"  class = "<?php echo ($mestaN[51] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[51],$napr); ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[51];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[51],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[51],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[51],$napr); ?>><?php echo $mestaN[51]; echo prozg($args["mesta"], $mestaN[51],$napr);?></div>
									
									<div  id = "o<?php echo $mestaN[52];?>"  class = "<?php echo ($mestaN[52] > 0)?"mesto":"mesto mesto-1"; ?> <?php echo $mz = mestoZan($args["mesta"], $mestaN[52],$napr); ?>" data-directchar = "o" data-mestonum = "<?php echo $mestaN[52];?>" data-direct = "<?php echo $napr; ?>" 
									data-fullprice = "<?php echo fullpriceFild($args["mesta"], $mestaN[52],$napr); ?>" data-predoplata = "<?php echo predoplataFild($args["mesta"], $mestaN[52],$napr); ?>" <?php echo titleFild($args["mesta"], $mestaN[52],$napr); ?>><?php echo $mestaN[52]; echo prozg($args["mesta"], $mestaN[52],$napr);?></div>
								</div>
								
							</div>
						</div>