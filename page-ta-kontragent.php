<?php
/*
Template Name: Вход для турагентств - Контрагенты
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
					
					<div class = "errMssages">
					<?php
						global $wpdb;
						if (isset($_REQUEST["delete"]))
						{
							$delRez = $wpdb->delete("mt_br_user",array("mail" => $_REQUEST["mail"]));
							if (!empty($delRez)) 
								echo "<div class = 'errMsg okMsg'>Запись удалена</div>";
							else 
								echo "<div class = 'errMsg'>Запись НЕ удалена</div>";
								
						}
						
						if (isset($_REQUEST["on"]))
						{
							$delRez = $wpdb->update("mt_br_user",array("moderate" => "1"), array("mail" => $_REQUEST["mail"]));
							if (!empty($delRez)) 
								echo "<div class = 'errMsg okMsg'>Запись активирована</div>";
							else 
								echo "<div class = 'errMsg'>Произошла ошибка</div>";
						}
						
						if (isset($_REQUEST["off"]))
						{
							$delRez = $wpdb->update("mt_br_user",array("moderate" => "0"), array("mail" => $_REQUEST["mail"]));
							if (!empty($delRez)) 
								echo "<div class = 'errMsg okMsg'>Запись деактивирована</div>";
							else 
								echo "<div class = 'errMsg'>Произошла ошибка</div>";
						}
					?>
					</div>
					
					<div class = "raspisanie">
						<table class = "tableContragent">
						<thead>
							<tr>
								<th>Статус</th>
								<th>Название компании</th>
								<th>E-mail</th>
								<th>Контактное лицо</th>
								<th>Телефон</th>
								<th>Управление</th>
						
							</tr>
						</thead>
						<tbody>
							<?php
								
								$reis = $wpdb->get_results("SELECT * FROM `mt_br_user` ");
								
							foreach($reis as $r) {
							?>
								<tr>
									<td>
										<?php
											if ($r->moderate == 0) echo "Не активирован";
											if ($r->moderate == 1) echo "Активирован";
											if ($r->moderate == 10) echo "Администратор";
											
										?>
									</td>
									<?php 
										echo "<td>".$r->naim."</td>";
										echo "<td>".$r->mail."</td>";
										echo "<td>".$r->person."</td>";
										echo "<td>".$r->phone."</td>";
									?>
									<td>
										<form method = "post">
											<input type = "hidden" name = "mail" value = "<?php echo $r->mail; ?>">
											
											<input type = "submit" name = "delete" value = "Удалить">
											<input type = "submit" name = "on" value = "Включить">
											<input type = "submit" name = "off" value = "Выключить">
										</form>
									</td>
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