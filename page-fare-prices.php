<?php

/*
Template Name: Страница Цены на проезд
WP Post Template: Страница Цены на проезд
Template Post Type: post, page   
*/

get_header("booking");

$banner = wp_get_attachment_image_src(carbon_get_the_post_meta('otel_banner'), 'full')[0];
if (empty($banner)) {
	$banner = get_template_directory_uri() . '/images/mir/contact.jpg';
}

?>

<section class="booking-title-wrapper" style="background-image: url(<?php echo $banner ?>);">
	<div class="container-booking">
		<h1 class="booking-title"><?php the_title(); ?></h1>
	</div>
</section>

<?php get_template_part('template-parts/bus-tour-menu'); ?>

<div class="line PageContent singlePage">
	<div class="centerInLine">
		<div class="breadcrumb breadcrumbMrBottom">
			<?php
			if (function_exists('bcn_display')) {
				bcn_display();
			}
			?>
		</div>

		<div class="content ">

			<div class="fare-prices__table">

				<div class="fare-prices__row">
					<div class="fare-prices__name">
						Направление/Курорт
					</div>
					<div class="fare-prices__name">
						в обе стороны
					</div>
					<div class="fare-prices__name">
						в одну сторону
					</div>
				</div>

				<? $fare_prices = carbon_get_theme_option('complex_fare_prices');
				if ($fare_prices) {
					$fare_pricesIndex = 0;
					foreach ($fare_prices as $item) {
				?>
						<div class="fare-prices__row">
							<div class="fare-prices__resort">
								<? echo $item['fare_prices_city']; ?>
							</div>
							<div class="fare-prices__round-trip-price">
							
								<? if (!empty($item['both_sides_price'])):?>

									<? echo $item['both_sides_price']; ?> ₽
								
								<!-- <button class="fare-prices__btn" data-price = "<? echo $item['both_sides_price']; ?>" data-nap ="В обе стороны" data-city = "<? echo $item['fare_prices_city']; ?>">Купить</button> -->
								
									<a class="fare-prices__btn" href="<?php echo get_the_permalink(8985);?>?type=proezd&price=<? echo $item['both_sides_price']; ?>&message=Проезд в обе стороны <? echo $item['fare_prices_city']; ?>">Купить</a>
								<? endif; ?>
							</div>
							<div class="fare-prices__one-way-price">
								<? if (!empty($item['one_way_price'])):?>
									<? echo $item['one_way_price']; ?> ₽
									<!-- <button class="fare-prices__btn" data-price = "<? echo $item['one_way_price']; ?>" data-nap ="В одну сторону" data-city = "<? echo $item['fare_prices_city']; ?>" >Купить</button> -->
								
									<a class="fare-prices__btn" href="<?php echo get_the_permalink(8985);?>?type=proezd&price=<? echo $item['one_way_price']; ?>&message=Проезд в одну сторону <? echo $item['fare_prices_city']; ?>">Купить</a>
								<? endif; ?>
								
							</div>
						</div>
				<?
						$fare_pricesIndex++;
					}
				}
				?>
			</div>

		</div>
	</div>
</div>

<?php get_footer(); ?>