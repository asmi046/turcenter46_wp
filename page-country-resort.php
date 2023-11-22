<?php
/*
Template Name: Страница Курорты Страны
*/
?>

<?php get_header(); ?>

<div class="line banerLine banerLineInPage banerLineInResort">
		<div class="allB">
			<?php if(strlen(carbon_get_the_post_meta('resort_banner')) > 0):?>
			<div style="display:block; background: url(<?php echo wp_get_attachment_image_src(carbon_get_the_post_meta('resort_banner'), 'full')[0]?>);  background-position:center;" class="b">
			<?php else:?>
				<div style="display:block; background: url(<?php echo wp_get_attachment_image_src('1813', 'full')[0]?>);  background-position:center;" class="b">
			<?php endif;?>
				<div class="centerInLine">
					<!--
					<div class = "banerText">
					
					</div>
					-->
					
				</div>
			</div>
			
			
			<div class="firstM">
				1 место<br>
				"Независимый рейтинг 2015г."
			</div>
			
		</div>
	</div>
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
		<h1><?php the_title();?></h1>
		<?php echo carbon_get_the_post_meta('tyrkey_script_1')?>
		<?php echo carbon_get_the_post_meta('tyrkey_script')?>
		<?php the_content();?>

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
		<div class="resort-item">
			<h2><a href="<?php echo get_the_permalink($resort->ID); //echo $resort->guid;?>"><?php echo $resort->post_title;?></a></h2>
			<?php echo $resort->post_excerpt;?>
			<a class="resort-item__link" href="<?php echo get_the_permalink($resort->ID);?>">Смотреть подробнее</a>
		</div>

			<?php endforeach;?>
		
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
					if(stripos($resort->post_name, 'Курорты') !== 'false'):
						$resorts_id = $resort->ID;
						$resort_link = $resort->guid;
				?>
			<?php endif; endforeach;?>
			<h3>Смотрите также</h3>
			<a href="<?php echo get_the_permalink(get_the_ID()); //echo $resort_link?>">Курорты</a>
			<a href="<?php echo get_permalink('927')?>">Поиск туров по миру</a>
		</div>
		<div class="recreation-sidebar__wid sale-tour__widget">
			<h3>Хотите выгодный тур?</h3>
			<?php echo do_shortcode('[contact-form-7 id="1800" title="Форма Хотите выгодный тур?"]')?>

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
						'numberposts' 		=> 9,
						'post_parent'   	=> 1801,
						'post_type'   		=> 'page',
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
<?php get_footer();?>
