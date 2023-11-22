<?php 
/*
Template Name: Шаблон школьного тура (True)
Template Post Type: post
*/

get_header("booking"); 
include 'Mobile_Detect.php';
$cat_ID = get_query_var('cat');
$detect = new Mobile_Detect;
$imgRaz = "webp";
if( $detect->isiOS() ){ 
   $imgRaz = "jpg";
}
$banner = wp_get_attachment_image_src( carbon_get_the_post_meta('otel_banner'), 'full')[0];
if(empty($banner)) {
	$banner = get_template_directory_uri() . '/images/mir/contact.jpg';
}
?>
	<!-- <section class="booking-title-wrapper" style="background-image: url(<?php echo $banner?>);"> -->
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

	<section class="school-gallery">
		<div class="container">
			<img src="<?php the_post_thumbnail_url('full');?>" alt="" class="school-gallery__item">
		</div>
	</section>
	<section class="content-post">
		<div class="container">
			<?php 
			while ( have_posts() ) :
				 the_post();
				the_content();
			endwhile;?>
			<a href="#" class="bluebtn  school-tour-modal" data-winheader="Заказ школьных экскурсий" data-winsubheader="Организация школьных экскурсий и туров по всей России, оставьте заявку и мы свяжемся с Вами в ближайшее время">Заказать</a>
			<!-- <a href="#" class="bluebtn  school-tour-modal" data-winheader="Заявка на обратный звонок">Заказать</a> -->
		</div>
	</section>

<?php 
get_footer();