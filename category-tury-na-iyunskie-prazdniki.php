
<?php get_header("booking"); 
	$banner = wp_get_attachment_image_src( carbon_get_the_post_meta('otel_banner'), 'full')[0];
	if(empty($banner)) {
		$banner = get_template_directory_uri() . '/images/mir/contact.jpg';
	}?>
<script>
	$(document).ready(function() { 
			
	});
			
</script>

	
	<section class="booking-title-wrapper" style="background-image: url(<?php bloginfo('template_url');?>/images/b/otkritie-fontanov.jpg);">
		<div class="container-booking">
			<h1 class="booking-title"><?php echo get_queried_object()->name;?></h1>
		</div>
	</section>
	<div class = "line PageContent exkursTur">
		<div class = "centerInLine">
				<div class="breadcrumb">
					<?php
					if(function_exists('bcn_display')) 
					{
						bcn_display();
					}
					?>
				</div>

			<?php if ( have_posts() ) : ?>
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
			
		</div>
		
	</div>
	
	
<?php get_footer(); ?>