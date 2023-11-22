<?php 

/*
Template Name: Дайджест по заполняемости
WP Post Template: Дайджест по заполняемости
Template Post Type: page   
*/

get_header("booking"); 
$banner = wp_get_attachment_image_src( carbon_get_the_post_meta('otel_banner'), 'full')[0];
if(empty($banner)) {
	$banner = get_template_directory_uri() . '/images/mir/contact.jpg';
}
?>

<section class="booking-title-wrapper" style="background-image: url(<?php echo $banner?>);">
	<div class="container-booking">
		<h1 class="booking-title"><?php the_title();?></h1>
	</div>
</section>
	
	<?php get_template_part('template-parts/bus-tour-menu');?>
	
	<div class = "line PageContent singlePage">
		<div class = "centerInLine">
			<div class="breadcrumb breadcrumbMrBottom">
				<?php
				if(function_exists('bcn_display'))
				{
					bcn_display();
				}
				?>
			</div>
	
			<div class = "content ">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
					<?php the_content();?>
				<?php endwhile;?>
				<?php endif; ?>
                
                <?
                    global $wpdb;
                    // $didgest = $wpdb->get_results('SELECT mt_br_napr.end, mt_br_reis.start_to_date, mt_br_reis.prib_out_date, count(*) as count  FROM mt_br_mesto LEFT JOIN mt_br_reis ON mt_br_reis.ID = mt_br_mesto.reisID LEFT JOIN mt_br_napr ON mt_br_napr.ID = mt_br_mesto.directID GROUP BY mt_br_mesto.reisID');
                    $didgest = $wpdb->get_results('SELECT mt_br_napr.end, mt_br_reis.start_to_date, mt_br_reis.prib_out_date, count(*) as count  FROM mt_br_mesto LEFT JOIN mt_br_reis ON mt_br_reis.ID = mt_br_mesto.reisID LEFT JOIN mt_br_napr ON mt_br_napr.ID = mt_br_mesto.directID GROUP BY mt_br_reis.start_to_date');
                    
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Направление</th>
                            <th>Рейс</th>
                            <th>Заполненость</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                       
                        <?
                            $reisiDop = $wpdb->get_results('SELECT `ID`, `start_to_date`, `prib_out_date`  FROM `mt_br_reis` WHERE `ID` in (77, 78, 79, 80, 81, 82, 83, 53)');
                            $reisi = $wpdb->get_results('SELECT `ID`, `start_to_date`, `prib_out_date`, `bus_type`  FROM `mt_br_reis` WHERE `turtype` = 1 GROUP BY `start_to_date`');
                            
                            $reisi = array_merge($reisi, $reisiDop);

                            usort($reisi, function($a, $b) {
                                return strtotime($a->start_to_date) > strtotime($b->start_to_date);
                            });
                            
                            // echo "<pre>"; var_dump($reisi); echo "</pre>";
                            
                            $tt = $reisi[9];
                            $reisi[9] = $reisi[10];
                            $reisi[10] = $tt;

                            $tt = $reisi[17];
                            $reisi[17] = $reisi[18];
                            $reisi[18] = $tt;
                            
                            // echo "<pre>"; var_dump($reisi[9]); echo "</pre>";

                            $i = 0;
                            foreach ($reisi as $rs) {
                               $counter = $wpdb->get_results('SELECT count(*) as `count` FROM `mt_br_mesto` WHERE `reisID` = '.$rs->ID.' AND `mestoID` LIKE "%t%"')
                        
                        ?>
                        <tr>
                            <?if ($i==0) echo "<td rowspan='". count($reisi)."'> Лазаревское </td>"; else "<td></td>"?>
                            <td><? echo date("d.m.Y", strtotime($rs->start_to_date))." - ".date("d.m.Y", strtotime($rs->prib_out_date)); ?></td>
                            <td><?echo $counter[0]->count;?></td>
                        </tr>
                        <?
                            $i++;

                            }
                        ?>

<?
                            $reisi = $wpdb->get_results('SELECT `ID`, `start_to_date`, `prib_out_date`  FROM `mt_br_reis` WHERE `turtype` = 2 GROUP BY `start_to_date`');
                            $i = 0;
                            foreach ($reisi as $rs) {
                               $counter = $wpdb->get_results('SELECT count(*) as `count` FROM `mt_br_mesto` WHERE `reisID` = '.$rs->ID.' AND `mestoID` LIKE "%t%"')
                        ?>
                        <tr>
                            <?if ($i==0) echo "<td rowspan='". count($reisi)."'> Геленджик </td>"; else "<td></td>"?>
                            <td><? echo date("d.m.Y", strtotime($rs->start_to_date))." - ".date("d.m.Y", strtotime($rs->prib_out_date)); ?></td>
                            <td><?echo $counter[0]->count;?></td>
                        </tr>
                        <?
                            $i++;

                            }
                        ?>

<?
                            $reisi = $wpdb->get_results('SELECT `ID`, `start_to_date`, `prib_out_date`  FROM `mt_br_reis` WHERE `turtype` = 3 GROUP BY `start_to_date`');
                            $i = 0;
                            foreach ($reisi as $rs) {
                               $counter = $wpdb->get_results('SELECT count(*) as `count` FROM `mt_br_mesto` WHERE `reisID` = '.$rs->ID.' AND `mestoID` LIKE "%t%"')
                        ?>
                        <tr>
                            <?if ($i==0) echo "<td rowspan='". count($reisi)."'> Крым </td>"; else "<td></td>"?>
                            <td><? echo date("d.m.Y", strtotime($rs->start_to_date))." - ".date("d.m.Y", strtotime($rs->prib_out_date)); ?></td>
                            <td><?echo $counter[0]->count;?></td>
                        </tr>
                        <?
                            $i++;

                            }
                        ?>
                        
                    </tbody>
                </table>
            </div>
		</div>
	</div>
	
<?php get_footer(); ?>