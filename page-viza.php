<?php
/*
Template Name: Визовый центр
*/
get_header();
?>
	<div class = "line banerLine banerLineInPage">
		<div class = "allB">
			<div style = "display:block; background: url(<?php bloginfo('template_url');?>/images/b/<?php echo get_post_meta( $post->ID, "banerName", true)?>);" class = "b">
				<div class = "centerInLine">
					
					<!--
					<div class = "banerText">
					
					</div>
					-->
					
				</div>
			</div>
			
			
			<div class = "firstM">
				1 место</br>
				"Независимый рейтинг 2015г."
			</div>
			
		</div>
	</div>

<div class="line PageContent singlePage">
	<div class="centerInLine">
			<div class="breadcrumb">
				<?php
				if(function_exists('bcn_display'))
				{
					bcn_display();
				}
				?>
			</div>
			<div class = "content">
				<h1><?php the_title();?></h1>
				<div class="viza-steps">
					<div class="viza-step">
						<div class="viza-step__icon" style="background-image: url(<?php echo get_template_directory_uri();?>/images/icon/oform1.svg);"></div>
						<div class="viza-step__text">Оставляете заявку на сайте</div>
					</div>
					<div class="viza-step">
						<div class="viza-step__icon" style="background-image: url(<?php echo get_template_directory_uri();?>/images/icon/oform2.svg);"></div>
						<div class="viza-step__text">Получаете бесплатную консультацию</div>
					</div>
					<div class="viza-step">
						<div class="viza-step__icon" style="background-image: url(<?php echo get_template_directory_uri();?>/images/icon/oform3.svg);"></div>
						<div class="viza-step__text">Мы готовим пакет необходимых документов</div>
					</div>
					<div class="viza-step">
						<div class="viza-step__icon" style="background-image: url(<?php echo get_template_directory_uri();?>/images/icon/oform4.svg);"></div>
						<div class="viza-step__text">Вы получаете действующую визу</div>
					</div>
				</div>
				<div class="visa-country-wrapper">
					<span class="visa-country vizaBtn">
						<div class="visa-country__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/images/visa/s-italy.jpg);"></div>
						<div class="visa-country__content">
							<div class="visa-country__name">Италия</div>
							<div class="visa-country__price">от 6500 <span>руб.</span></div>
						</div>
					</span>
					<span class="visa-country vizaBtn">
						<div class="visa-country__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/images/visa/s-germany.jpg);"></div>
						<div class="visa-country__content">
							<div class="visa-country__name">Германия</div>
							<div class="visa-country__price">от 6500 <span>руб.</span></div>
						</div>
					</span>
					<span class="visa-country vizaBtn">
						<div class="visa-country__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/images/visa/s-spain.jpg);"></div>
						<div class="visa-country__content">
							<div class="visa-country__name">Испания</div>
							<div class="visa-country__price">от 6500 <span>руб.</span></div>
						</div>
					</span>
					<span class="visa-country vizaBtn">
						<div class="visa-country__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/images/visa/s-greece.jpg);"></div>
						<div class="visa-country__content">
							<div class="visa-country__name">Греция</div>
							<div class="visa-country__price">от 6500 <span>руб.</span></div>
						</div>
					</span>
					<span class="visa-country vizaBtn">
						<div class="visa-country__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/images/visa/s-italy.jpg);"></div>
						<div class="visa-country__content">
							<div class="visa-country__name">Италия</div>
							<div class="visa-country__price">от 6500 <span>руб.</span></div>
						</div>
					</span>
					<span class="visa-country vizaBtn">
						<div class="visa-country__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/images/visa/s-germany.jpg);"></div>
						<div class="visa-country__content">
							<div class="visa-country__name">Германия</div>
							<div class="visa-country__price">от 6500 <span>руб.</span></div>
						</div>
					</span>
					<span class="visa-country vizaBtn">
						<div class="visa-country__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/images/visa/s-spain.jpg);"></div>
						<div class="visa-country__content">
							<div class="visa-country__name">Испания</div>
							<div class="visa-country__price">от 6500 <span>руб.</span></div>
						</div>
					</span>
					<span class="visa-country vizaBtn">
						<div class="visa-country__photo" style="background-image: url(<?php echo get_template_directory_uri();?>/images/visa/s-greece.jpg);"></div>
						<div class="visa-country__content">
							<div class="visa-country__name">Греция</div>
							<div class="visa-country__price">от 6500 <span>руб.</span></div>
						</div>
					</span>
				</div>
			</div>
	</div>
</div>
<?php include("cta-zayavka.php");?>
<?php include 'advantages.php';?>

<?php get_footer();?>