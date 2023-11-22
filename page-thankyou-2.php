<?php
/*
Template Name: Спасибо за заявку (С кнопки Отправить запрос)
*/
?>
<?php get_header("booking"); 
$banner = wp_get_attachment_image_src( carbon_get_the_post_meta('otel_banner'), 'full')[0];
if(empty($banner)) {
	$banner = get_template_directory_uri() . '/images/mir/contact.jpg';
}
?>
	<section class="booking-title-wrapper" style="background-image: url(<?php echo $banner?>);">
		<div class="container-booking">
			<h1 class="booking-title">Благодарим Вас за обращение в "ТурЦентр"</h1>
		</div>
	</section>
	<div class = "line PageContent singlePage blagPage">
		<div class = "centerInLine">
			<div class="breadcrumb breadcrumbMrBottom">
				<?php
				if(function_exists('bcn_display'))
				{
					bcn_display();
				}
				?>
			</div>
			<? //include "price-banner-autobus.php";?>	
				
			<div class = "content ">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
					<div class = " new_text_style" >
						Благодарим Вас за обращение! Наши специалисты свяжутся с Вами в самое ближайшее время и помогут с выбором Тура.
					</div>
				
				<?php endwhile;?>
				<?php endif; ?>
			</div>
			<?php get_template_part('template-parts/mainAllTour');?>

		</div>
	</div>
<?php get_footer(); ?>