<?php
/*
Template Name: Вход для турагентств - Моя бронь
*/				
get_header(); 
?>
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
	
	<div class = "line PageContent singlePage">
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
				
			
				<?php if (!isset($_COOKIE['taReg'])): ?>	
					<?php the_content();?>
					<h2>Данная страница доступна только зарегистрированным пользователям</h2>
				<?php else: ?>
					
					<div class = "raspisanie">
						<table>
						<thead>
							<tr>
								<th>№ рейса</th>
								<th>Дата выезда</th>
								<th>№ места </th>
								<th>Направление</th>
								<th>Ф.И.О.</th>
								<th>Дата рождения</th>
								<th>Пункт назначения</th>
								<th>Место отправления</th>
								<th>Место прибытия</th>
								<th>Комментарий</th>
							</tr>
						</thead>
						<tbody>
							<?php
								
								$reis = $wpdb->get_results("SELECT ".
															"`mt_br_mesto`.`reisID`, ".
															"`mt_br_mesto`.`mestoNum`, ".
															"`mt_br_mesto`.`direct`, ".
															"`mt_br_mesto`.`F`, ".
															"`mt_br_mesto`.`I`, ".
															"`mt_br_mesto`.`O`, ".
															"`mt_br_mesto`.`dataRod`, ".
															"`mt_br_mesto`.`punkt`, ".
															"`mt_br_mesto`.`mestoPos`, ".
															"`mt_br_mesto`.`mestoPrib`, ".
															"`mt_br_mesto`.`coment`, ".
															"`mt_br_mesto`.`mestoID`, ".
															"`mt_br_reis`.`start_to_date`, ".
															"`mt_br_reis`.`start_out_date` ".
															
															
															"FROM `mt_br_mesto` LEFT JOIN `mt_br_reis` ON (`mt_br_mesto`.`reisID` = `mt_br_reis`.`ID`)  WHERE `mt_br_mesto`.`agentmail` like '".$_COOKIE['taReg']."'");
								
							foreach($reis as $r) {
							?>
								<tr>
									<?php 
										echo "<td>".$r->reisID."</td>";
										if ($r->mestoID[0] === 't')
											echo "<td>".date("d.m.Y", strtotime($r->start_to_date))."</td>";
										else
											echo "<td>".date("d.m.Y", strtotime($r->start_out_date))."</td>";
										echo "<td>".$r->mestoNum."</td>";
										echo "<td>".$r->direct."</td>";
										echo "<td>".$r->F." ".$r->I." ".$r->O."</td>";
										echo "<td>".$r->dataRod."</td>";
										echo "<td>".$r->punkt."</td>";
										echo "<td>".$r->mestoPos."</td>";
										echo "<td>".$r->mestoPrib."</td>";
										echo "<td>".$r->coment."</td>";
										
									?>
								</tr>
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