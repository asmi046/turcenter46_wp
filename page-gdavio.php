<?php

/*
Template Name: ЖД и Авиа - кассы 
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

					
                        <div class = "minipageblk minipageblk_avio">
                            
                            <div class = "minipageblk_side left">
                            
                            </div>

                            <div class = "minipageblk_side right">
                                <?php the_content();?>
                            </div>

                        </div> 
                        <div class = "mb tableWraper">
                            <button class = "bluebtn obrzv-oppen"
                            data-winheader = "Хочу купить билет!"
                            data-winsubheader = "Оставьте заявку и мы свяжемся с вами в течении 15 минут.">
                                Купить билет
                            </button>
                        </div>
                    </div>
                <?php endwhile;?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>