<?php
/*
Template Name: Вход для турагентств - заказ проезда
*/				
get_header(); ?>
<div class="line banerLine banerLineInPage">
  <div class="allB">
    <div
      style="display:block; background: url(<?php bloginfo('template_url');?>/images/b/<?php echo get_post_meta( $post->ID, "banerName", true)?>);"
      class="b">
      <div class="centerInLine">
        <!--
					<div class = "banerText">
					
					</div>
					-->

      </div>
    </div>


    <div class="firstM">
      1 место</br>
      "Независимый рейтинг 2015г."
    </div>

  </div>
</div>

<div class="line PageContent singlePage">
  <div class="centerInLine">
    <div class="breadcrumb">
      <?php
				if(function_exists('bcn_display'))
				{
					bcn_display();
				}
				?>
    </div>

    <div class="content ">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <h1>Выберите направление (Шаг 1 из 3)</h1>


      <?php if (!isset($_COOKIE['taReg'])): ?>
      <?php the_content();?>
      <h2>Данная страница доступна только зарегистрированным пользователям</h2>
      <?php else: ?>
      <div class="nprBloks-insur nprBloks">
        <?php
							global $wpdb;
							$napr = $wpdb->get_results("SELECT * FROM `mt_br_napr` ORDER BY `order`");
							foreach($napr as $ne) {
								?>

        <div class="naprBlk <?php echo $_REQUEST["napr"] == $ne->ID?"naprBlkSel":""; ?>">
          <div class="wriper">
            <a href="<?php echo get_permalink(); ?>?napr=<?php echo $ne->ID;?>&punct=<?php echo $ne->end;?>#step2">
              <div class="naprBlkPoints naprBlkPointsH" style="margin-bottom: 12px; margin-top: -10px;">
                <div class='circle circleTop'></div><?php echo $ne->start;?>
              </div>
            </a>
            <?php
												$puncts = explode(";", $ne->prompunkts);
												for ($i = 0; $i < count($puncts); $i++) {
											?>
            <a
              href="<?php echo get_permalink()?>?napr=<?php echo ($ne->ID == 1)?$ne->ID:$ne->ID;?>&punct=<?php echo $puncts[$i];?>#step2">
              <div class='naprBlkPoints'>
                <div class='circle'></div><?php echo $puncts[$i]; ?>
                <?php
															if ($puncts[$i] === "Голубицкая  ") {
																echo "<span class = 'newnapr'>Новое направление</span>";
															}
														?>
              </div>

            </a>
            <?php	
												}
											?>
            <a
              href="<?php echo get_permalink();?>?napr=<?php echo ($ne->ID == 1)?$ne->ID:$ne->ID;?>&punct=<?php echo $ne->end;?>#step2">
              <div class="naprBlkPoints naprBlkPointsH naprBlkPointsHB" style="margin-top: 4px; margin-bottom: -10px;">
                <div class='circle circleBot'></div><?php echo $ne->end?>
              </div>
            </a>
          </div>
        </div>
        <!-- </a> -->
        <?php
							}
						?>
        <!-- <a href="<?php echo get_permalink()."#step2"?>?napr=%"> -->
        <div class="naprBlk">
          <div class="wriper">
            <a href="<?php echo get_permalink();?>">
              <div class="naprBlkPoints naprBlkPointsH">
                <div class='circle'></div>Показать все
              </div>
            </a>
          </div>
        </div>
      </div>

      <h2 style="display: inline-block;" id="step2">Выберите дату отправления (Шаг 2 из 3)</h2>
      <div class="raspisanie">
        <table>
          <thead>
            <tr>
              <th>№ рейса</th>
              <th>Направление</th>
              <th>Из Курска (Отправление)</th>
              <th>Обратно</th>
              <th>Действие</th>
            </tr>
          </thead>
          <tbody>
            <?php
								$naprElem = empty($_REQUEST["napr"])?'%':$_REQUEST["napr"];
								
								$reis = $wpdb->get_results("SELECT `mt_br_napr`.`ID`, `mt_br_napr`.`end`, `mt_br_napr`.`start`, `mt_br_reis`.`ID` AS reisID, `mt_br_reis`.`turtype`, `mt_br_reis`.`Info`, `mt_br_reis`.`start_to_date`, `mt_br_reis`.`prib_to_date`, `mt_br_reis`.`start_out_date`, `mt_br_reis`.`prib_out_date`, `mt_br_reis`.`bus_type` FROM `mt_br_napr`,`mt_br_reis` WHERE `mt_br_napr`.`ID` = `mt_br_reis`.`turtype` AND `mt_br_reis`.`turtype` like '".$naprElem."' AND `mt_br_reis`.`start_out_date` > curdate() ORDER BY `start_to_date`");
								// echo "<pre>";
								// print_r($reis);
								// echo "</pre>";
								// echo "SELECT `mt_br_napr`.`ID`, `mt_br_napr`.`end`, `mt_br_napr`.`start`, `mt_br_reis`.`ID` AS reisID, `mt_br_reis`.`turtype`, `mt_br_reis`.`Info`, `mt_br_reis`.`start_to_date`, `mt_br_reis`.`prib_to_date`, `mt_br_reis`.`start_out_date`, `mt_br_reis`.`prib_out_date` FROM `mt_br_napr`,`mt_br_reis` WHERE `mt_br_napr`.`ID` = `mt_br_reis`.`turtype` AND `mt_br_reis`.`turtype` like '".$naprElem."' AND `mt_br_reis`.`start_out_date` > curdate() ORDER BY `start_to_date`";

								foreach($reis as $r) {
								// if ($r->turtype == 1) continue;
							?>
            <tr>
              <?php 
                    $pom = (($r->turtype == 1 && $r->bus_type === "bus18") || ($r->turtype == 3))?" (18 мест)":"";
										echo "<td>".$r->reisID."</td>";
										echo "<td>".$r->start." - ".(!empty($_REQUEST["punct"])?$_REQUEST["punct"]:$r->end).$pom."</td>";
										echo "<td>".date("d.m.Y", strtotime($r->start_to_date))."</td>";
										echo "<td>".date("d.m.Y", strtotime($r->start_out_date))."</td>";
										echo "<td>";
											echo "<span class = 'reisInfo' title = 'Информация о рейсе'><i class='fas fa-info-circle' aria-hidden='true'	></i></span> ";
											echo "<a href = '".get_permalink(797)."?reis=".$r->reisID."&punct=".(!empty($_REQUEST["punct"])?$_REQUEST["punct"]:$r->end)."&napr=".$r->turtype."'>Приобрести билеты</a>";
										echo "</td>";
										
										
									?>
            </tr>

            <!-- <tr>
									<?
										// if (($naprElem === '%')&&($r->ID == 2)) {
										// 		echo "<td>".$r->reisID."</td>";
										// 		echo "<td>".$r->start." - Лазаревское</td>";
										// 		echo "<td>".date("d.m.Y", strtotime($r->start_to_date))."</td>";
										// 		echo "<td>".date("d.m.Y", strtotime($r->start_out_date))."</td>";
										// 		echo "<td>";
										// 			echo "<span class = 'reisInfo' title = 'Информация о рейсе'><i class='fas fa-info-circle' aria-hidden='true'	></i></span> ";
										// 			echo "<a href = '".get_permalink(797)."?reis=".$r->reisID."&punct=Лазаревское&napr=".$r->turtype."'>Приобрести билеты</a>";
										// 		echo "</td>";
										// 	}
									?>
								</tr> -->
            <?php
								}
							?>
          </tbody>

        </table>
      </div>
      <?php endif;?>
      <?php endwhile;?>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>