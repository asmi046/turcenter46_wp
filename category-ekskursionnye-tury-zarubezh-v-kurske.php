<?php 
	get_header('booking'); 
	$cat_ID = get_query_var('cat');
	
	$banner = wp_get_attachment_image_src( carbon_get_the_post_meta('otel_banner'), 'full')[0];
	if(empty($banner)) {
		$banner = get_template_directory_uri() . '/images/mir/contact.jpg';
	}
?>

	<section class="booking-title-wrapper" style="background-image: url(<?php echo $banner?>);">
		<div class="container-booking">
			<h1 class="booking-title"><? echo single_cat_title()?></h1>
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
	
	<section class="section-descr">
		<div class="container">
			Мы организуем экскурсионные туры. Специально для Вас у нас есть туры по ближнему зарубежью, а так же, широкий выбор туров по всей России.
		</div>
	</section>

	<section class="child-cat">
		<div class="container">

	<?php get_template_part('template-parts/ecs-tour-menu');?>
						
			<div class = "excursTourBlk excursTourBlk_border">
				<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php 
						if (get_post_meta( $post->ID, "outLnk", true) === "proezdMore") continue;
						if (get_post_meta( $post->ID, "outLnk", true) === "turiMore") continue;
						if (get_post_meta( $post->ID, "outLnk", true) === "hnn2018") continue;
					?>
					<?php if (get_post_meta( $post->ID, "clicable", true)!== "0"):?>
						<div class = 'turElem'>
							<a href = '<?php echo get_the_permalink($post->ID); ?>'>	
								<?php include ("tour-elem-content.php");?>
							</a>
						</div>
					<?php else: ?>
						<div class = 'turElem'>
							<?php include ("tour-elem-content.php");?>
						</div>
					<?php endif; ?>
					
					
				<?php endwhile;?>
				<?php endif; ?>
			</div>
			
		<div class = "pageNavi">
			<?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
		</div>
	</div>
	</section>
<?php get_footer(); ?>