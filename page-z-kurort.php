<?php
/*
Template Name: Заграница - Курорт
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

	<div class="recreation-about">
		<div class="breadcrumb">
			<?php
			if(function_exists('bcn_display'))
			{
				bcn_display();
			}
			?>
		</div>

		<br/>

		<?php the_content();?>
		
		<?php echo carbon_get_the_post_meta('resort_script')?>
		<?php echo carbon_get_the_post_meta('turkey_text')?>
	</div>
	<div class="recreation-sidebar">
		<div class="recreation-sidebar__wid see-also__widget">
			<?php $page_id = get_the_ID();
			$ancestors = get_ancestors(get_the_ID(), 'page');
				$args = array(
						'include'   		=> $ancestors[0],
						'post_type'   		=> 'page',
					); 
				$child_page_resorts = get_posts($args);
				$resorts_id = 0;
				foreach($child_page_resorts as $resort):
					if(stripos($resort->post_name, 'Курорты') !== 'false'):
						$resorts_id = $resort->ID;
						$resort_link = $resort->guid;
						$resort_title = $resort->post_title;
				?>
			<?php endif; endforeach;?>
			<h3>Смотрите также</h3>
			<?php if(!empty(carbon_get_the_post_meta('resort_anchor_link_resort')))
					$resort_title = carbon_get_the_post_meta('resort_anchor_link_resort');
			?>
			<a href="<?php echo get_the_permalink(!empty(carbon_get_the_post_meta('resort_page_id')) ? carbon_get_the_post_meta('resort_page_id') : $resorts_id); //echo $resort_link?>"><?php echo $resort_title?></a>
			<a href="<?php echo get_permalink('1801')?>">Поиск туров по миру</a>
		</div>
		<div class="recreation-sidebar__wid sale-tour__widget">
			<h3>Хотите выгодный тур?</h3>
			<form action="" class="form-resort">
				<input type="hidden" name="page" value="<?php echo the_title() . ' '?>">
				<input type="text" name="name" placeholder="Ваше имя">
				<input type="tel" name="tel" placeholder="Ваш телефон">
				<a href="#" class="button newButton resort-submit">Отправить</a>
				<div class="note-form"><span>Отправляя форму, Вы подтверждайте согласие на <a href="<?php echo get_permalink(1312);?>" target="_blank" class="d-in">обработку персональных данных</a></span></div>
			</form>

		</div>
		<div class="recreation-sidebar__wid sale-tour__widget">
			<?php 
				$page_id = get_the_ID();
				$args = array(
						'numberposts' 		=> -1,
						'post_parent'   	=> $ancestors[0],
						'post_type'   		=> 'page',
					); 
				$child_page_resorts = get_posts($args);
				$resorts_id = 0;
				foreach($child_page_resorts as $resort):
					if(stripos($resort->post_name, 'Курорты') !== 'false'):
						$resorts_id = $resort->ID;
				?>
				
			<?php endif; endforeach;?>
			<h3><?php echo $resort_title?></h3>
			<?php 
			if($resorts_id !== 0):
				$args = array(
					'numberposts' 		=> -1,
					'post_parent' 		=> $ancestors[0],
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
		</div>
		<?php 
			// Погода
			//echo carbon_get_the_post_meta('resort_weather_forecast');
		?>
		
		<div class="recreation-sidebar__wid sale-tour__widget">
			<h3>Популярные страны</h3>
			<?php 
				$args = array(
						'numberposts' 		=> 9,
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
				<span class="recreation-country__flag" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('turkey_flag'), 'full')[0]?>);"></span>
				<a href="<?php echo get_the_permalink()?>" class="recreation-country__link"><?php the_title()?></a>
				<span class="recreation-country__price"><?php echo carbon_get_the_post_meta('turkey_price');?></span>
			</div>

		<?php endforeach;?>
		</div>
	</div>
</div>
<?php include 'advantages.php';?>
<?php include 'review.php';?>
<?php get_footer();?>

