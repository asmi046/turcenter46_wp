<?php
/*
Template Name: Страница Наши Партнеры 
*/

get_header('booking');

$banner = wp_get_attachment_image_src( carbon_get_the_post_meta('otel_banner'), 'full')[0];
if(empty($banner)) {
	$banner = get_template_directory_uri() . '/images/mir/contact.jpg';
}
?>

<section class="booking-title-wrapper" style="background-image: url(<?php echo get_template_directory_uri();?>/images/mir/contact.jpg);">
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


<section class="partners">
	<div class="container partners__container">
		
		<!-- <img class = "picture-text-banner" src="<?php echo get_template_directory_uri();?>/images/partner/970x250-raif.jpg" alt=""> -->

		<noindex>
			<div class="partners__body">
				<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/p-01.jpg" alt=""></a>
				<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/p-02.jpeg" alt=""></a>
				<a href="#"><img class="partners__ban-raif" src="<?php echo get_template_directory_uri();?>/images/partner/970x250-raif.jpg" alt=""></a>
				<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/p-03.jpg" alt=""></a>
				<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/p-04.png" alt=""></a>
			</div>

			<div class="partners__body partners__body_5">

				<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/p-05.jpg" alt=""></a>
				<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/p-06.jpeg" alt=""></a>
				<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/p-07.jpg" alt=""></a>
				<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/p-08.jpg" alt=""></a>
				<a href="#"><img src="<?php echo get_template_directory_uri();?>/images/p-09.jpg" alt=""></a>
			</div>
				
			</div>
		</noindex>
	</div>
</section>

<?php get_footer();