<?php
/*
Template Name: Заграница - Горящие туры
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

<div class="container containerZagKurort">

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
		<div class = "mContentSmileMob">
			<?php echo apply_filters('the_content', carbon_get_the_post_meta('turkey_text_smile'));?>
		</div>

		
		<div class = "mScriptMob">
			<?php //echo carbon_get_the_post_meta('turkey_script')?>
				<div class="tv-hot-tours" tv-view="2" tv-rows="8" tv-width="auto" tv-imgpos="1" tv-theme="theme1" tv-showfilter="1" tv-departure="32" tv-departure2="1" tv-departure3="26" tv-countries="<?echo carbon_get_the_post_meta('turkey_cantry')?>"></div>
				
				<script type="text/javascript" src="//tourvisor.ru/module/init.js"></script>
				<style>#TVHotTours0 .TVModuleFiltersBlock .TVFormControl {border-color: rgba(21,113,143,1); }

				#TVHotTours0 .TVMinPFilterWrap {
				background-color: #15718F;
				background-color:rgba(21,113,143,1);
				}
				#TVHotTours0 .TVMinPFilterWrap {
				border-radius: 5px
				}
				#TVHotTours0 .TVHotPriceBlock  {
				background-color:#FFFFFF;
				background-color:rgba(255,255,255,1);
				background-color:#00B4F1;
				}
				#TVHotTours0 .TVHotPriceBlock:before {
				border-right: 15px solid #FFFFFF;
				border-right: 15px solid rgba(255,255,255,1);
				background-color:#00B4F1;
				}
				#TVHotTours0 .TVHotNewPrice {
				color: #000000 !important;
				text-shadow: 1px 1px 0 #F1F1F1; 
				}
				#TVHotTours0 .TVMinPFilterWrap {
				background: linear-gradient(#8ab8c7, #15718F);
				}
				#TVHotTours0 .TVMinPFilterWrap {
				box-shadow: 1px 1px 3px #a6a6a6;
				}
				#TVHotTours0 .TVHotGradient {
				background: linear-gradient(#ffffff, #FFFFFF);
				}/*TV*TV*/
				</style>
		</div>
		
		<div class = "mContentMob">
			<?php the_content();?>
		</div>
		
		<div class = "mDownTextMob">
			<?php echo carbon_get_the_post_meta('turkey_text')?>
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
					if(stripos($resort->post_name, 'Курорты') !== 'false'):
						$resorts_id = $resort->ID;
						$resort_link = $resort->guid;
				?>
			<?php endif; endforeach;?>
			<h3>Смотрите также</h3> 
			<?php 
				$anchor_link = carbon_get_the_post_meta('turkey_anchor_link');
				if(empty($anchor_link)):
					$anchor_link = $child_page_resorts[0]->post_title;
				endif;
				
			?>
			
			<a href="<?php echo get_permalink('927')?>">Поиск туров по миру</a>
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

<?php include("cta-zayavka.php");?>
<?php include 'advantages.php';?>
<?php include 'review.php';?>

<?php get_footer();?>