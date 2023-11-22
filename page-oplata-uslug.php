<?php
/*
Template Name: Оплата услуг
*/
$banner = wp_get_attachment_image_src( carbon_get_the_post_meta('otel_banner'), 'full')[0];
if(empty($banner)) {
	$banner = get_template_directory_uri() . '/images/mir/contact.jpg';
}
?>
<?php get_header('booking'); ?>
	<section class="booking-title-wrapper" style="background-image: url(<?php echo $banner?>);">
		<div class="container-booking">
			<h1 class="booking-title"><?php the_title();?></h1>
		</div>
	</section>
	<?php get_template_part('template-parts/bus-tour-menu');?>
		<!-- <div class = "line banerLine banerLineInPage">
		<div class = "allB">
			<div style = "display:block; background: url(<?php bloginfo('template_url');?>/images/b/<?php echo get_post_meta( $post->ID, "banerName", true)?>);" class = "b">
				<div class = "centerInLine">
					
					<div class = "banerText">
					
					</div>
					
					
				</div>
			</div>
			
			
			<div class = "firstM">
				1 место</br>
				"Независимый рейтинг 2015г."
			</div>
			
		</div>
	</div> -->
	
	<div class = "line PageContent singlePage">
		<div class = "centerInLine container-booking">
			<div class="breadcrumb">
				<?php
				if(function_exists('bcn_display'))
				{
					bcn_display();
				}
				?>
			</div>
	
			<div class = "content ">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<!-- <h1><?php the_title();?></h1> -->
					<div class = "contactsContent new_text_style" >
						<?php the_content();?>
					</div>
					
				<?php endwhile;?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>