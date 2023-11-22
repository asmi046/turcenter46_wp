<?php get_header("booking"); 
include 'Mobile_Detect.php';

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
	<section class="section-descr">
		<div class="container">
			Наш коллектив имеет огромный опыт в проведении школьных экскурсий. Мы предоставим для Вас удобные, комфортабельные автобусы, опытных экскурсоводов и подберем незабываемую программу для школьников всех возрастов.
		</div>
	</section>
	<section class="child-cat">
		<div class="container">

			<?php get_template_part('template-parts/scooll-tour-menu');?>

			<div class="resort-item-wraper">
				<?php if ( have_posts() ) : 
					while ( have_posts() ) :
						the_post();
						global $post;
						?>
						<a class="resort-item" href="<?php echo get_permalink();?>">
							<div class="resort-item-inner-wraper">
								<picture>
									<?php echo get_the_post_thumbnail( $post->ID, "turImg", array("alt" => $post->post_title, "title" => $post->post_title));?>
								</picture>
								<h2><?php echo $post->post_title?></h2>
								<!-- <p class="pice-bus">от 1 000 р./час.</p> -->

								<div class = "tourInfoInPage tourInfoInPage__custom">
									<!-- <span class = "info"><i class="fas fa-map-marker"></i> <?php  echo get_post_meta(get_the_ID(), "where", true); ?></span> -->
									<!-- <span class = "info"><i class="far fa-clock"></i> <?php  echo get_post_meta(get_the_ID(), "day_count", true); ?></span> -->
									<span class = "info info__custom info__custom_pc"><i class="far fa-money-bill-alt"></i> <?php  echo get_post_meta(get_the_ID(), "price", true); ?> </span>
									<span class = "info info__custom"><i class="far fa-money-bill-alt"></i> <?php  echo get_post_meta(get_the_ID(), "sPrice", true); ?> </span>
									<?php if (!empty(get_post_meta(get_the_ID(), "tur_date", true))):?>
										<!-- <span class = "info"><i class="far fa-calendar-alt"></i> <?php  echo get_post_meta(get_the_ID(), "tur_date", true); ?></span> -->
									<?php endif;?>
								</div>

								<div class="newButton">Программа тура</div> 
							</div>
						</a>
						<?php //the_content();?>
					<?php endwhile; wp_reset_postdata();?>
				<?php endif; ?>
			</div>
			<div class = "pageNavi">
				<?php if ( function_exists( 'wp_pagenavi' ) ) wp_pagenavi(); ?>
			</div>
		</div>
	</section>

	<script>
		setTimeout(function() {
			jQuery("#help-school-tour-modals").arcticmodal();
		}, 10000);
	</script>

	<?php get_footer(); ?>