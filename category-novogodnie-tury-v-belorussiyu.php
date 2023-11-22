<?php 
get_header('booking'); 
$cat_ID = get_query_var('cat');

$banner = wp_get_attachment_image_src( carbon_get_the_post_meta('otel_banner'), 'full')[0];
if(empty($banner)) {
	$banner = get_template_directory_uri() . '/images/mir/contact.jpg';
}
?>

<section class="booking-title-wrapper" style = "display:block; background: url(<?php bloginfo('template_url');?>/images/b/minsk-win.jpg); background-position:center center; background-size:cover;" class = "b">
	<div class="container-booking">
		<h1 class="booking-title">НОВОГОДНИЕ ТУРЫ В БЕЛОРУССИЮ</h1>
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
		Мы организуем экскурсионные туры, в нашем портфеле есть иуры по ближнему зарубежю а так же широкий выбор туров по России.
	</div>
</section>

<section class="child-cat">
	
	<div class = "line PageContent exkursTur ngTour">
		<div class = "centerInLine">

			<?php get_template_part('template-parts/ecs-tour-menu');?>
				
			<?php if ( have_posts() ) : ?>
			<!-- <h1><?php echo get_queried_object()->name;?></h1> -->
			<div class = "excursTourBlk">
				<?php while ( have_posts() ) : the_post(); ?>
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
			</div>
			<?php endif; ?>
			
		<div class = "pageNavi">
			<?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
		</div>
		
		<div class = "aboutCategory">
				<?php echo  term_description();?>
		</div>
			
		</div>
		
		
		
		
	</div>
	</section>
	
<?php get_footer(); ?>