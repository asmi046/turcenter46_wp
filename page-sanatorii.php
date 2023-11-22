<?php 
/*
* Template Name: Санатории посадочная
*/

get_header("booking"); 
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
	
	<?php get_template_part('template-parts/bus-tour-menu');?>
	
	<div class = "line PageContent singlePage">
		<div class = "centerInLine">
			<div class="breadcrumb breadcrumbMrBottom">
				<?php
				if(function_exists('bcn_display'))
				{
					bcn_display();
				}
				?>
			</div>
	
			<div class = "content ">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
					<?php the_content();?>

					<!-- <script type="text/javascript" charset="utf-8" src="https://stells.info/assets/js/partner.fire.js"></script>
					<div class="s-partnership" style="display:none;">ul49OWVL36XUdsFEK0pTVr9KD97LgOUaO%2BkZXvUn%2Fwc%3D</div> -->
					<script type="text/javascript" charset="utf-8" src="https://stells.info/assets/js/partner.fire.js"></script>
					<div class="s-partnership" style="display:none;">Vh0s3xlOtwXs2IQd4pFmTYyYpnOpv2pw1VcnMOp8vMY%3D</div>
				<?php endwhile;?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<?php include 'review.php';?>
<?php get_footer(); ?>