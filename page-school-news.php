<?php
$cat_ID = get_query_var('cat');
/*
Template Name: Школьный тур (New) 
WP Post Template: Школьный тур (New)
Template Post Type: post, page
*/

get_header('booking');

$banner = wp_get_attachment_image_src( carbon_get_the_post_meta('otel_banner'), 'full')[0];
if(empty($banner)) {
	$banner = get_template_directory_uri() . '/images/mir/contact.jpg';
}
?>

<section class="booking-title-wrapper" style="background-image: url(<?php echo get_template_directory_uri();?>/images/school.jpg);">
	<div class="container-booking">
		<h1 class="booking-title"><?php the_title();?></h1> 
	</div>
</section>

<div class="breadcrumb breadcrumbMrBottom container">  
	<?php
	if(function_exists('bcn_display'))
	{
		bcn_display();
	}
	?>
</div>

<section class="excurs-wrapper">
	<div class="container">

		<?php while(have_posts()): the_post();?>

			<div class="excurs-content">
				<div class="excurs-btn__wrapper">
					<div class="excurs-btn__content">
						<div class="excurs-btn__item excurs-btn__item-date">
							<?php echo carbon_get_the_post_meta('tur_date');?>
						</div>
						<div class="excurs-btn__item excurs-btn__item-time">
							<?php echo carbon_get_the_post_meta('day_count');?>
						</div>
						<div class="excurs-btn__item excurs-btn__item-price">
							<?php echo carbon_get_the_post_meta('price');?> руб.
						</div>
					</div>
					<div class = "panelInstrument">
						<div onclick = "window.print()" class = "bluebtn printRn">Отправить на печать</div>
						<div class ="bluebtn school-tour-modal g-button" data-winheader="Заказ школьных экскурсий" data-winsubheader="Организация школьных экскурсий и туров по всей России, оставьте заявку и мы свяжемся с Вами в ближайшее время">Задать вопрос</div>
						<!-- <div onclick = " jQuery('#zayavTurMoreModal').arcticmodal(); jQuery('#zayavTurMoreModal .tkName').html('<?php echo htmlspecialchars ($post->post_title); ?>'); ym(29416892,'reachGoal','openAutobTur') " class = "bluebtn zaprosNaTurMore g-button">Задать вопрос</div> -->
					</div>
				</div>
				<?php the_content();?>
				<? get_template_part("template-parts/excurs-help-banner")?>
			</div>

		<?php endwhile;?>

		<div class="excurs-cont-r">
			<div class="excurs-slider">
			<?php $arr_slide = carbon_get_the_post_meta('gallery_excurs')?>
			<?php foreach($arr_slide as $slide):?>
				<pictyre class="excurs-slider__item">
					<img loading="lazy" src = "<?php echo wp_get_attachment_image_src($slide['image'], 'full')[0];?>" alt="<? echo $slide['text'];?>" title="<? echo $slide['text'];?>">
				</pictyre>
			<?php endforeach;?>
			</div>
			<div class="excurs-vd">
				<?php
					echo carbon_get_the_post_meta('excurs_vd');
				?>
			</div> 
		</div>
		<img loading="lazy" class = "only-print" src = "<?php echo wp_get_attachment_image_src($arr_slide[0]['image'], 'full')[0];?>" >
	</div>
</section>

<section class="motr-tour">
	<div class="container">
		<h2>Смотрите так же</h2>   
		<div class="motr-tour-wraper">
			<?php $arr_tours = carbon_get_theme_option('complex_tours');
			if($arr_tours):
				foreach($arr_tours as $tour):?>
			<div class="turElem">
				<a href="<?php echo $tour['complex_tours_link'];?>">
				<div class="turThumb">
					<?php if($tour['complex_tours_sticker']):?>
					<div class="iconFlgPl"><?php echo $tour['complex_tours_sticker'];?></div>
					<?php endif;?>
					<img width="390" height="260" src="<?php echo wp_get_attachment_image_src($tour['complex_tours_img'], 'large')[0];?>" class="attachment-turImg size-turImg wp-post-image" alt="<?php echo $tour['complex_tours_title']?>" title="<?php echo $tour['complex_tours_title']?>">		
					<?php if (!empty($tour['complex_tours_qty_days'])) {?>
					<div class="text ">
						<div class="line1"><!-- <i class="far fa-clock"></i> --> <?php echo $tour['complex_tours_qty_days']?> </div>
							<div class="line2"><strong><?php echo $tour['complex_tours_place']?></strong></div>
					</div>
					<?php } ?>
				</div>

				<div class="turInfoElem">
					<div class="upp">
						<h2><?php echo $tour['complex_tours_title']?></h2> <br>
						<?php echo $tour['complex_tours_date']?>		
					</div>
					<div class="boot ">
						<div class="price">
							<?php if(!empty($tour['complex_tours_price'])){?>
							<strong><?php echo $tour['complex_tours_price']?></strong>
							<span class="grayText"> <span class="curr">₽</span></span>
							<?php } ?>
							<div class="red-line "></div>
							<div class="new-price "></div>
						</div>

						<div class="podr">
							<?php echo $tour['complex_tours_more_link']?>			</div>
					</div>
				</div>

				</a>
			</div>
			<?php endforeach;
				endif;
			?>
		</div>  
	</div>
</section>

<?php include 'review.php';?>

<?php get_footer();