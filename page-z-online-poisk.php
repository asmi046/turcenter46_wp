<?php 
/*
Template Name: Заграница - Онлайн поиск ткров 
*/
get_header('booking');
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

<div class="container">

	<div class="line search-topTur recreation-about">
		<div class="centerInLine">
			<div class="breadcrumb">
				<?php
				if(function_exists('bcn_display'))
				{
					bcn_display();
				}
				?>
			</div>
		
			<?php echo carbon_get_the_post_meta('abroad_code')?>
			<?php get_template_part('template-parts/zagr-zayavka');?>
			<h2 class = "noMrBottom" >Популярные направления</h2>	
			<div class = "mainAllTur searchZagrTur">
				<?php
					$args = array(
						'numberposts' 		=> -1,
						'post_parent'   	=> 1801,
						'post_type'   		=> 'page',
						'meta_key'			=> '_turkey_sort',
						'orderby' => 'meta_value_num',
						'order' => 'ASC'
					);

					$posts = get_posts( $args );

					foreach($posts as $post){
						
						// if (get_post_meta( $post->ID, "outLnk", true) === "hnn2018") {
						// 	include ("hnn2018-content.php");
						// } else
						// if (get_post_meta( $post->ID, "outLnk", true) === "turiMore") {
						// 	include ("turiMore-content.php");
						// } else	
						// if (get_post_meta( $post->ID, "outLnk", true) === "proezdMore") {
						// 	include ("proezdMore-content.php");
						// } else	
							
						// if (get_post_meta( $post->ID, "clicable", true)!== "0") {
						// 	echo "<div class = 'turElem'>";
						// 		echo "<a href = '".get_the_permalink($post->ID)."'>";
						// 			include ("tour-elem-content.php");
						// 		echo "</a>";
						// 	echo "</div>";
						// } else {
						// 	echo "<div class = 'turElem'>";
						// 		include ("tour-elem-content.php");
						// 	echo "</div>";
						// }
						echo "<div data-indexsort = '".carbon_get_the_post_meta('turkey_sort')."' class = 'turElem turElem-abroad'>";
							include ("tour-abroad.php"); 
						echo "</div>";
					}
				?>
			</div>
		</div>
	</div>

	<div class="recreation-sidebar">
    <div class="recreation-sidebar__wid see-also__widget">
      <?php $page_id = get_the_ID();
				$args = array(
					'numberposts' 		=> -1,
					'post_parent'   	=> $page_id,
					'post_type'   		=> 'page',
				); 
				$child_page_resorts = get_posts($args);
				$resorts_id = 0;
				foreach($child_page_resorts as $resort):
					
					if(stripos($resort->post_title, 'Курорты') !== FALSE):
						$resorts_id = $resort->ID;
						$resort_link = $resort->guid;
						?>
      <?php endif; endforeach;?>
      <h3>Смотрите также</h3>
			<a href="<?php echo get_category_link('13')?>">Экскурсионные туры</a>
			<a href="<?php echo get_permalink('4520')?>">Санаторный отдых</a>
    </div>

    <div class="recreation-sidebar__wid sale-tour__widget">
      <h3 id="tkName">Хотите выгодный тур?</h3>
      <form action="" class="form-resort" id = "vygodnyy_tur">
        <div class="SendetMsg" style="display:none">
          Ваше сообщение успешно отправлено.
        </div>
        <div class="headen_form_blk">
          <input type="hidden" name = "form_name" data-valuem = "Название формы" value = "Хотите выгодный тур">
          <input type="hidden" name = "page_lnk" data-valuem = "Адрес страницы" value = "<? echo (is_home())?"https://www.mirturizma46.ru/":get_the_permalink()?>">
          <input type="hidden" name="page" data-valuem = "Заголовок формы" value="On-line поиск туров">
          <input required type="text" name="name" data-valuem = "Имя" placeholder="Ваше имя">
          <input required type="tel" name="tel" data-valuem = "Телефон" placeholder="Ваш телефон">
          <button type="button" class="vygodnyy-tur-btn newButton new_send_btn" data-formid = "vygodnyy_tur" data-formmsg="Хотите выгодный тур">Отправить</button>
        </div>
        <div class="note-form"><span>Отправляя форму, Вы подтверждайте согласие на <a
              href="<?php echo get_permalink(1312);?>" target="_blank" class="d-in">обработку персональных
              данных</a></span></div>
      </form>
      <?php //echo do_shortcode('[contact-form-7 id="1800" title="Форма Хотите выгодный тур?"]')?>

    </div>

    <!-- <div class="recreation-sidebar__wid sale-tour__widget">
      <?php 
					$page_id = get_the_ID();
					$args = array(
						'numberposts' 		=> -1,
						'post_parent'   	=> $page_id,
						'post_type'   		=> 'page',
					); 
					$child_page_resorts = get_posts($args);
					$resorts_id = 0;
					foreach($child_page_resorts as $resort):
						if(stripos($resort->post_title, 'Курорты') !== FALSE):
							$resorts_id = $resort->ID;
							?>

      <?php endif; endforeach;?>

      <h3><?php echo $child_page_resorts[0]->post_title?></h3>

      <?php 
						if($resorts_id !== 0):
							$args = array(
								'numberposts' 		=> -1,
								'post_parent' 		=> $resorts_id,
								'post_type' 		=> 'page',
								'order'				=> 'asc',
								'orderby'			=> 'post_title',
							);
							$resorts = get_posts($args);
							foreach($resorts as $resort) :
								?>
      <a href="<?php echo get_the_permalink($resort->ID); //echo $resort->guid;?>"><?php echo $resort->post_title;?></a>
      <?php endforeach;?>
      <?php endif;?>
    </div> -->

    <div class="recreation-sidebar__wid sale-tour__widget">
      <h3>Популярные страны</h3>
      <?php 
						$args = array(
							'numberposts' 		=> -1,
							'post_parent'   	=> 1801,
							'post_type'   		=> 'page',
							'meta_key'			=> '_turkey_sort',
							'orderby' => 'meta_value_num',
							'order' => 'ASC'
						);

						$posts = get_posts( $args );
						foreach($posts as $post):
							?>
      <div class="recreation-country__item">
        <span class="recreation-country__flag"
          style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('turkey_flag'), 'full')[0]?>);"></span>
        <a href="<?php echo get_the_permalink()?>" class="recreation-country__link"><?php the_title()?></a>
        <span class="recreation-country__price"><?php echo carbon_get_the_post_meta('turkey_price');?></span>
      </div>

      <?php endforeach;?>
    </div>
  </div>

	</div>

	<?php include("cta-zayavka.php");?>
	<?php include 'advantages.php';?>
	<?php include 'review.php';?>
<?php get_footer();?>