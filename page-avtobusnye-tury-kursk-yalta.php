<?php get_header("booking"); 

/*
Template Name: Шаблон страницы Автобусные туры Курск-Ялта
*/

$banner = wp_get_attachment_image_src( carbon_get_the_post_meta('otel_banner'), 'full')[0];
if(empty($banner)) {
	$banner = get_template_directory_uri() . '/images/mir/contact.jpg';
}
?>

<section class="booking-title-wrapper"
  style="background-image: url(<?php echo get_template_directory_uri();?>/images/zagslides/cyprus.jpg);">
  <div class="container-booking">
    <h1 class="booking-title"><?php the_title();?></h1> 
  </div>
</section>

<?php get_template_part('template-parts/bus-tour-menu-two');?>

<div class="line PageContent singlePage">
  <div class="centerInLine">
    <div class="breadcrumb breadcrumbMrBottom">
      <?php
				if(function_exists('bcn_display'))
				{
					bcn_display();
				}
				?>
    </div>

    <div class="bus-tour__info">
      <p>
      <?php the_content(); ?>
      </p>
    </div>

    <div class="bus-tour__info-price">
      <div class="bus-tour__info-item">
        <div class="advant__item-line"></div>

        <div class="advant__item advant-icon-01">
          <div class="advant__item-text">
            <h3>Курск</h3>
            <!-- <p>от 5000 р.</p> -->
          </div>
        </div>

        <a href="<?php echo get_permalink(6978);?>" class="advant__item advant-icon-02 <?php if (get_the_ID() == 6978) echo "active";?>"> 
          <div class="advant__item-text">
            <h3>Симферополь</h3>
            <p>11500 р.</p>
          </div>
        </a>

        <a href="<?php echo get_permalink(6976);?>" class="advant__item advant-icon-03 <?php if (get_the_ID() == 6976) echo "active";?>">
          <div class="advant__item-text">
            <h3>Алушта</h3>
            <p>12500 р.</p>
          </div>
        </a>

        <a href="<?php echo get_permalink(6974);?>" class="advant__item advant-icon-04 c">
          <div class="advant__item-text">
            <h3>Гурзуф</h3>
            <p>12500 р.</p>
          </div>
        </a>

        <a href="<?php echo get_permalink(6050);?>" class="advant__item advant-icon-05 <?php if (get_the_ID() == 6050) echo "active";?>">
          <div class="advant__item-text">
            <h3>Ялта</h3>
            <p>12500 р.</p>
          </div>
        </a>

      </div>

      <div class="bus-tour__info-item">

        <div class="bus-tour__price-block">
          <div class="bus-tour__price-text">
            <span>в одну сторону</span>
            <p><?echo carbon_get_post_meta(get_the_ID(),"bus_tour_one_way"); ?> р</p>
          </div>
          <div class="bus-tour__price-btn">
            <a href="#" onclick="ym(29416892,'reachGoal','OpenRecall')" class="g-button obrzv-oppen"
              data-winheader="Купить билет до Ялты"
              data-winsubheader="Оставьте заявку и  мы свяжемся с вами в течении 15 минут.">Купить билет</a>
          </div>
        </div>

        <div class="bus-tour__price-block">
          <div class="bus-tour__price-text">
            <span>туда и обратно</span>
            <p><?echo carbon_get_post_meta(get_the_ID(),"bus_tour_roundtrip"); ?> р</p>
          </div>
          <div class="bus-tour__price-btn">
            <a href="#" onclick="ym(29416892,'reachGoal','OpenRecall')" class="g-button obrzv-oppen"
              data-winheader="Купить билет до Ялты"
              data-winsubheader="Оставьте заявку и  мы свяжемся с вами в течении 15 минут.">Купить билет</a>
          </div>
        </div>

      </div>
    </div>

    <div class="race-schedule">

      <div class="grafic">
        <h2>График заездов</h2>
        <?php echo carbon_get_the_post_meta('otel_schedule'); ?>
      </div>
      <div class="race-schedule__slider">
        <h2>Наши автобусы</h2>
        <div class="top-slider__bus">
          <? 
		        $ourBuses = carbon_get_post_meta(get_the_ID(),"our_buses"); 
	            if ($ourBuses) {
            $ourBusesIndex = 0;
		          foreach ($ourBuses as $item) {
			    ?>
            <div class="top-slider__item top-slider__item_bus slider__item">
              <img src="<?php echo wp_get_attachment_image_src($item['our_buses_img'], 'large')[0]; ?>" alt="">
            </div>
			    <?
			      $ourBusesIndex++; 
		          }
	          }
	        ?>
        </div>
      </div>


    </div>

    <div class="accommod-options">
      <h2>Варианты проживания</h2>
      <?php echo apply_filters('the_content', carbon_get_the_post_meta('accommod_script'));?>
    </div>



    <div class="content ">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <?php the_content();?>
      <?php endwhile;?>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>