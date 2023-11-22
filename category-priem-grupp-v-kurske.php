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
		<h1 class="booking-title"><? single_cat_title(); ?></h1>
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

<section class="reception">
	<div class="container-booking">
		<div class="reception__column">
			<div class="reception__item">
					<?php
						echo carbon_get_theme_option('group_kursk_text');
					?>
			</div>
			<div class="reception__item">
				<?php
				echo wp_video_shortcode( [
					'src'      => get_bloginfo('template_url').'/images/poed-poedim.mp4',
					'poster'   => get_bloginfo('template_url').'/images/poedim.jpg',
					'height'   => 315,
					'width'    => 560,
					] );
				?>
			</div>
		</div>
	</div>
</section>

<div class = "excursTourBlk excursTourBlk_border">
	<div class = "centerInLine">
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
			
			<div class = "pageNavi">
				<?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
			</div>

		</div>
	</div>

	<?php get_footer(); ?>
