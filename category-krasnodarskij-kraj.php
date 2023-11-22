<?php get_header("booking"); 
$banner = wp_get_attachment_image_src( carbon_get_the_post_meta('otel_banner'), 'full')[0];
if(empty($banner)) {
	$banner = get_template_directory_uri() . '/images/mir/contact.jpg';
}
?>

<section class="booking-title-wrapper" style="background-image: url(<?php echo $banner?>);">
	<div class="container-booking">
		<h1 class="booking-title">Автобусные туры в Краснодарский край <?php echo carbon_get_theme_option('skvoznoye_godir'); ?> <?php //echo single_cat_title(); ?></h1>
	</div>
</section>

<?php get_template_part('template-parts/bus-tour-menu-two');?>
	
	<div class = "line PageContent exkursTur turi-more-cat _side-wrapper">
		<div class = "centerInLine">
				<div class="breadcrumb breadcrumbMrBottom">
					<?php
					if(function_exists('bcn_display'))
					{
						bcn_display();
					}
					?>
				</div>


			    <?php get_template_part('template-parts/filters-section');?>
    		<?php get_template_part('template-parts/bus-navigation-menu');?>
			
			
			<div class = "turi-more  excursTourBlk marginTopContent">
				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'part', 'turinamorepart' ); ?>
				<?php endwhile;?>
				<?php endif; ?>
			</div>
		
		<div class = "pageNavi">
			<?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
		</div>

		<script type="text/javascript" charset="utf-8" src="https://stells.info/assets/js/partner.fire.js"></script>
		<div class="s-partnership" style="display:none;">j07UDNQ8gM4nJENYGDa5B%2BhhFx%2BKdVyYS0ZGHpjFSW8%3D</div>
			
		<?php $desctCat = term_description(); if (!empty($desctCat)): ?>
				<div class = "aboutRegion">
					<?php echo  apply_filters('the_content', $desctCat);?>
				</div>
			<?php endif; ?>	
			
		</div>
		
	</div>
	
	
<?php get_footer(); ?>