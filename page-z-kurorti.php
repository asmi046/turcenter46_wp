<?php
/*
Template Name: Заграница - Курорты Страны  
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
		<?php echo carbon_get_the_post_meta('tyrkey_script_1')?>
		<?php echo carbon_get_the_post_meta('tyrkey_script')?>
		<?php the_content();?>

		<div class = "resort-item-wraper">
		<?php 
			$args = array(
				'numberposts' 		=> -1,
				'post_parent' 		=> get_the_ID(),
				'post_type' 		=> 'page',
				'order'				=> 'asc',
				'orderby'			=> 'date',
			);
			$resorts = get_posts($args);
			
			foreach($resorts as $resort) :
		?>
		<a class = "resort-item" href = "<?php echo get_the_permalink($resort->ID);?>">
			<div class="resort-item-inner-wraper">
				<picture>
					<?
						$picture = get_the_post_thumbnail_url($resort->ID, 'large' );
						
						if (empty ($picture) ) {
							$picture = get_template_directory_uri()."/images/empty.jpg";
						}
					
					?>
				
					<img src = "<? echo $picture; ?>" alt = "Отдых - <?php echo $resort->post_title;?>" title = "Отдых - <?php echo $resort->post_title;?>"/>
				</picture>
				<h2><?php echo $resort->post_title;?></h2>
				<?php echo $resort->post_excerpt;?>
				<div class="newButton">Подобрать тур</div>
			</div>
		</a>
		<?php endforeach;?>
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
			<a href="<?php echo get_the_permalink(get_the_ID()); //echo $resort_link?>">Курорты</a>
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
				?>
			<h3>Курорты</h3>
			<?php 
				$args = array(
					'numberposts' 		=> -1,
					'post_parent' 		=> get_the_ID(),
					'post_type' 		=> 'page',
					'order'				=> 'asc',
					'orderby'			=> 'post_title',
				);
				$resorts = get_posts($args);
				foreach($resorts as $resort) :
			?>
				<a href="<?php echo get_the_permalink($resort->ID); //echo $resort->guid;?>"><?php echo $resort->post_title;?></a>
			<?php endforeach;?>
		</div>
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
				<span class="recreation-country__flag" style="background-image: url(<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('turkey_flag'), 'full')[0]?>);"></span>
				<a href="<?php echo get_the_permalink()?>" class="recreation-country__link"><?php the_title()?></a>
				<span class="recreation-country__price"><?php echo carbon_get_the_post_meta('turkey_price');?></span>
			</div>

		<?php endforeach;?>
		</div>
	</div>
</div>
	<?php include 'review.php';?>
<?php get_footer();?>
