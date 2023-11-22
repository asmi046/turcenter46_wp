<?php

/*
Template Name: ПЦР - тест 
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
                        <div class = "minipageblk">
                            
                            <div class = "minipageblk_side left">
                            
                            </div>

                            <div class = "minipageblk_side right">
                                <h2>ПЦР тест на COVID-19</h2>
                                <span class="pcrcomment">+ все справки для выезда заграницу <br/>в Курске</span>
                                <div class = "uslovia">
                                    <div class = "uslovia_all price">
                                        <span>цена:</span>
                                        <p>1600 ₽ <span class="uslovia__abbr">(на русском языке)</span></p>
                                        <p>1800 ₽ <span class="uslovia__abbr">(на английском языке)</span></p>
                                        <p>2500 ₽ <span class="uslovia__abbr">(на английском языке + QR код)</span></p>
                                    </div>
                                    <div class = "uslovia_all  result">
                                        <span>результат:</span>
                                        <p>в этот же день</p>
                                    </div>
                                </div> 
                            </div>

                        </div> 
                        <div class = "mb tableWraper">
                            <button class = "bluebtn obrzv-oppen"
                            data-winheader = "Заявка на ПЦР тест"
                            data-winsubheader = "Оставьте заявку и мы свяжемся с вами в течении 15 минут.">
                                Записаться на тест
                            </button>
                        </div>
                    </div>
                <?php endwhile;?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
<?php get_footer(); ?>