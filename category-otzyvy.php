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
	<!-- <div class="container mh-u">
		<h1>Отзывы</h1>
	</div> -->
	<section class="booking-title-wrapper" style="background-image: url(<?php echo $banner?>);">
		<div class="container-booking">
			<h1 class="booking-title">Отзывы</h1>
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
		</div>
	</div>
	<div class="line review">
		<div class="container mh-u">
			<div class="review-slider1 owl-carousel1">
				<?php
					// $posts = get_posts( array(
					// 	'numberposts' => 5,
					// 	'category'    => 40,
					// 	'orderby' 	=> 'date',
					// 	'order' => 'DESC'
					// ) );

					$posts = carbon_get_theme_option('complex_reviews');
					foreach( $posts as $post ){
						// setup_postdata($post);
				?>
					<div class="review-slider__item">
						<picture class="review-slider__item-photo">
							<img src="<?php echo wp_get_attachment_image_src($post['img'], 'full')[0];?>" alt="Отзыв о туре от <?php echo $post['name']?>">
							<?php //the_post_thumbnail( "full", array( "alt" => "Отзыв о туре от ".get_the_title(), "loading" => "lazy") ); ?>
						
						</picture>
						
						<div class="review-slider__item-content">
							<div class="slider__item-content-name">
								<span class="full-name"><?php echo $post['name'];?></span>
								<!-- <span class="date"><?php echo get_post_meta(get_the_ID(),"turdata",true); ?></span> -->
							</div>
							<div class="slider__item-content-text">
								<?php echo $post['text'] //the_excerpt(); ?>
							</div>
							<a target = "_blank" href="<?php echo (empty($post['link']))?"https://vk.com/topic-66662293_30361307":$post['link'];?>" class="slider-review__link">Читать Вконтакте</a>
						</div>
					</div>
				<?php
				}
				?>
			
			</div>
		</div>
	</div>

<?php get_footer(); ?>