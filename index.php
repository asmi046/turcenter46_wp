<?php get_header("booking");
include 'Mobile_Detect.php';
$detect = new Mobile_Detect; 
$imgRaz = "webp";
if ($detect->isiOS()) {
  $imgRaz = "jpg";
}

$banner = wp_get_attachment_image_src(carbon_get_the_post_meta('otel_banner'), 'full')[0];
if (empty($banner)) {
  $banner = get_template_directory_uri() . '/images/mir/contact.jpg';
}
?>

<script>
  var timerId = setInterval(function() {
    indexbaner = jQuery(".perekluhatel .perSel").data("number");

    if (indexbaner == jQuery(".perekluhatel .per").length) {
      jQuery(".perekluhatel .per").removeClass("perSel");
      jQuery(".perekluhatel #p1").addClass("perSel");
      indexbaner = 0;
    }

    indexbaner++;

    jQuery(".allB .b").hide("fade");
    jQuery(".allB #bn" + indexbaner).show("fade");

    jQuery(".perekluhatel .per").removeClass("perSel");
    jQuery(".perekluhatel #p" + indexbaner).addClass("perSel");

  }, 5000);

  jQuery(document).ready(function($) {
    $(".perekluhatel .per").click(function() {
      var index = $(this).data("number");
      $(".perekluhatel .per").removeClass("perSel");
      $(this).addClass("perSel");
      $(".allB .b").hide("fade");
      $(".allB #bn" + index).show("fade");
    });
  });
</script>

<?php get_template_part('template-parts/bus-tour-menu'); ?> 

<div class="line top-slider__wrapper">
  <div class="centerInLine">
    <?php if (carbon_get_theme_option('slide_complex')) :
      $arr_slide = carbon_get_theme_option('slide_complex'); ?>

      <div class="top-slider">
        <?php foreach ($arr_slide as $item) : ?>

          <?php if ($item['link']) : ?>
            <div><a href="<?php echo $item['link'] ?>" style="display: block;">
              <?php else : ?>
                <div>
                <?php endif; ?>
                <!-- <div href = "<?php echo $item['link'] ?>"> -->

                <div class="top-slider__item">
                  <img loading="lazy" class="top-slider__item-img" src="<?php echo wp_get_attachment_image_src($item['img'], 'full')[0]; ?>" alt="<? echo $item['title']; ?>">
                  <div class="top-slider__item-content">
                    <?php echo apply_filters('the_content', $item['text']); ?>
                  </div>
                </div>

                <?php if ($item['link']) : ?>
              </a>
            </div>
          <?php else : ?>
      </div>

    <?php endif; ?>
  <?php endforeach; ?>
  </div>

  <div class="top-slider top-slider-mob">
    <?php foreach ($arr_slide as $item) : ?>

      <?php if ($item['link']) : ?>
        <div><a href="<?php echo $item['link'] ?>" style="display: block;">
          <?php else : ?>
            <div>
            <?php endif; ?>
            <!-- <div href = "<?php echo $item['link'] ?>"> -->

            <div class="top-slider__item">
              <img loading="lazy" class="top-slider__item-img" src="<?php echo wp_get_attachment_image_src($item['img_m'], 'full')[0]; ?>" alt="<? echo $item['title']; ?>">
              <div class="top-slider__item-content">
                <?php echo apply_filters('the_content', $item['text_m']); ?>
              </div>
            </div>

            <?php if ($item['link']) : ?>
          </a>
        </div>
      <?php else : ?>
  </div>

<?php endif; ?>
<?php endforeach; ?>
</div>
<?php endif; ?>

<script type="text/javascript">

</script>
<div class="top-list">
  <?php if (carbon_get_theme_option('btn_complex')) :
    $arr_btn = carbon_get_theme_option('btn_complex'); ?>
    <?php foreach ($arr_btn as $item) : ?>
      <?php if ($item['link']) : ?>
        <a href="<?php echo $item['link'] ?>" class="top-list__item <?php echo $item['class'] ?>">
        <?php else : ?>
          <div class="top-list__item <?php echo $item['class'] ?>">
          <?php endif; ?>
          <div class="top-list__item-icon" style="background-image: url(<?php echo wp_get_attachment_image_src($item['img'], 'full')[0]; ?>);"></div>
          <div class="top-list__item-text"><?php echo $item['text']; ?></div>

          <?php if ($item['link']) : ?>
        </a>
      <?php else : ?>
</div>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>

</div>
</div>
</div>

<div class="line ztLine">
  <div class="centerInLine">
    <a class="ztLnk" href="<?php echo get_permalink(1801) ?>">Туры за границу</a>
    <div class="ztWraper">

      <div class="ztFlexLine__flex">

        <div class="ztFlexLine ztFlexLine_left">
          <picture class="ztCantry ztCantryFull">
            <img class="of-c ztCantryFull" loading="lazy" src="<?php bloginfo("template_url"); ?>/images/zagslides/thailand.<?php echo $imgRaz; ?>" alt="">
          </picture>
          
          <div class="ztCantryControl">
            <a href="<?php echo get_permalink(5571) ?>"> 
              <h2>Тайланд</h2>
            </a>
            <hr class="ztCantryLine" />
            <div class="ztCantryControlButtons">
              <a class="se" href="<?php echo get_permalink(2117) ?>">Найти тур</a>
              <span class="zy" data-strananame="Мальдивы">Оставить заявку</span>
              <a class="fire" href="<?php echo get_permalink(2248) ?>">Горящие туры</a>
              <a class="reset" href="<?php echo get_permalink(2120) ?>">Курорты</a>
            </div>
          </div>
        </div>

        <div class="ztFlexLine">
          <picture class="ztCantry ztCantryFull">
            <img class="of-c ztCantryFull ztCantry" loading="lazy" src="<?php bloginfo("template_url"); ?>/images/zagslides/oae.<?php echo $imgRaz; ?>" alt="">
          </picture>
          <!-- <div style = "background-image:url(<?php bloginfo("template_url"); ?>/images/zagslides/oae.jpg);" class = "ztCantry ztCantryFull"></div> -->

          <div class="ztCantryControl">
            <a href="<?php echo get_permalink(1805) ?>">
              <h2>ОАЭ</h2>
            </a>
            <hr class="ztCantryLine" />
            <div class="ztCantryControlButtons">
              <a class="se" href="<?php echo get_permalink(1805) ?>">Найти тур</a>
              <span class="zy" data-strananame="ОАЭ">Оставить заявку</span>
              <a class="fire" href="<?php echo get_permalink(2254) ?>">Горящие туры</a>
              <a class="reset" href="<?php echo get_permalink(1893) ?>">Курорты</a>
            </div>
          </div>
        </div>

      </div>

      <div class="ztFlexLine__flex">

        <div class="ztFlexLine">
          <picture class="ztCantry ztCantryFull">
            <img class="of-c ztCantryFull" loading="lazy" src="<?php bloginfo("template_url"); ?>/images/turkey-slide.jpg" alt="">
          </picture>
          <!-- <div style = "background-image:url(<?php bloginfo("template_url"); ?>/images/zagslides/oae.jpg);" class = "ztCantry ztCantryFull"></div> -->

          <div class="ztCantryControl">
            <a href="<?php echo get_permalink(1794) ?>">
              <h2>Турция</h2>
            </a>
            <hr class="ztCantryLine" />
            <div class="ztCantryControlButtons">
              <a class="se" href="<?php echo get_permalink(1794) ?>">Найти тур</a>
              <span class="zy" data-strananame="Турция">Оставить заявку</span>
              <a class="fire" href="<?php echo get_permalink(2244) ?>">Горящие туры</a>
              <a class="reset" href="<?php echo get_permalink(1866) ?>">Курорты</a>
            </div>
          </div>
        </div>

      </div>

      <div class="ztFlexLine__flex">

        <div class="ztFlexLine ztFlexLine_left">
          <picture class="ztCantryFull ztCantry">
            <img class="of-c ztCantryFull" loading="lazy" src="<?php bloginfo("template_url"); ?>/images/zagslides/egipt.<?php echo $imgRaz; ?>" alt="">
          </picture>
          <!-- <div style = "background-image:url(<?php bloginfo("template_url"); ?>/images/zagslides/turky.jpg);" class = "ztCantry ztCantryFull"></div> -->

          <div class="ztCantryControl">
            <a href="<?php echo get_permalink(4360) ?>">
              <h2>Египет</h2>
            </a>
            <hr class="ztCantryLine" />
            <div class="ztCantryControlButtons">
              <a class="se" href="<?php echo get_permalink(4360) ?>">Найти тур</a> <span class="zy" data-strananame="Египет">Оставить заявку</span><a class="fire" href="<?php echo get_permalink(4364) ?>">Горящие туры</a>
              <a class="reset" href="<?php echo get_permalink(4367) ?>">Курорты</a>
            </div>
          </div>
        </div>

        <div class="ztFlexLine">
          <picture class="ztCantryFull ztCantry">
            <img class="of-c ztCantryFull" loading="lazy" src="<?php bloginfo("template_url"); ?>/images/zagslides/cubu.<?php echo $imgRaz; ?>" alt="">
          </picture>
          <!-- <div style = "background-image:url(<?php bloginfo("template_url"); ?>/images/zagslides/turky.jpg);" class = "ztCantry ztCantryFull"></div> -->

          <div class="ztCantryControl">
            <a href="<?php echo get_permalink(4918) ?>">
              <h2>Куба</h2>
            </a>
            <hr class="ztCantryLine" />
            <div class="ztCantryControlButtons">
              <a class="se" href="<?php echo get_permalink(4918) ?>">Найти тур</a> <span class="zy" data-strananame="Куба">Оставить заявку</span><a class="fire" href="<?php echo get_permalink(5568) ?>">Горящие туры</a>
              <a class="reset" href="<?php echo get_permalink(4928) ?>">Курорты</a>
            </div>
          </div>

        </div>

      </div>

      <div class="ztFlexLine__flex">
        
        <div class="ztFlexLine ztFlexLine_left">
          <picture class="ztCantry ztCantryFull">
            <img class="of-c ztCantryFull" loading="lazy" src="<?php bloginfo("template_url"); ?>/images/zagslides/mald.<?php echo $imgRaz; ?>" alt="">
          </picture>
          
          <div class="ztCantryControl">
            <a href="<?php echo get_permalink(5571) ?>"> 
              <h2>Мальдивы</h2>
            </a>
            <hr class="ztCantryLine" />
            <div class="ztCantryControlButtons">
              <a class="se" href="<?php echo get_permalink(5571) ?>">Найти тур</a>
              <span class="zy" data-strananame="Мальдивы">Оставить заявку</span>
              <a class="fire" href="<?php echo get_permalink(2250) ?>">Горящие туры</a>
              <a class="reset" href="<?php echo get_permalink(2145) ?>">Курорты</a>
            </div>
          </div>
        </div>

        <div class="ztFlexLine">
          <picture class="ztCantry ztCantryFull">
            <img class="of-c ztCantryFull" loading="lazy" src="<?php bloginfo("template_url"); ?>/images/zagslides/shri-lanka.<?php echo $imgRaz; ?>" alt="">
          </picture>
          <!-- <div style = "background-image:url(<?php bloginfo("template_url"); ?>/images/zagslides/tai.jpg);" class = "ztCantry ztCantryFull"></div> -->

          <div class="ztCantryControl">
            <a href="<?php echo get_permalink(6908) ?>">
              <h2>Шри-Ланка</h2>
            </a>
            <hr class="ztCantryLine" />
            <div class="ztCantryControlButtons">
              <a class="se" href="<?php echo get_permalink(6908) ?>">Найти тур</a>
              <span class="zy" data-strananame="Шри-Ланка">Оставить заявку</span>
              <a class="fire" href="<?php echo get_permalink(6911) ?>">Горящие туры</a>
              <a class="reset" href="<?php echo get_permalink(6914) ?>">Курорты</a>
            </div>
          </div>
        </div>
      </div>

      <div class="ztFlexLine__flex">
        
        <div class="ztFlexLine ztFlexLine_left">
          <picture class="ztCantryFull ztCantry">
            <img class="of-c ztCantryFull" loading="lazy" src="<?php bloginfo("template_url"); ?>/images/zagslides/tunisia.<?php echo $imgRaz; ?>" alt="">
          </picture>
          <!-- <div style = "background-image:url(<?php bloginfo("template_url"); ?>/images/zagslides/turky.jpg);" class = "ztCantry ztCantryFull"></div> -->

          <div class="ztCantryControl">
            <a href="<?php echo get_permalink(1803) ?>">
              <h2>Тунис</h2>
            </a>
            <hr class="ztCantryLine" />
            <div class="ztCantryControlButtons">
              <a class="se" href="<?php echo get_permalink(1803) ?>">Найти тур</a> <span class="zy" data-strananame="Тунис">Оставить заявку</span><a class="fire" href="<?php echo get_permalink(2264) ?>">Горящие туры</a>
              <a class="reset" href="<?php echo get_permalink(1905) ?>">Курорты</a>
            </div>
          </div>
        </div>

        <!-- <div class="ztFlexLine ztFlexLine_left">
          <picture class="ztCantryFull ztCantry">
            <img class="of-c ztCantryFull" loading="lazy" src="<?php bloginfo("template_url"); ?>/images/zagslides/cyprus.<?php echo $imgRaz; ?>" alt="">
          </picture>
    

          <div class="ztCantryControl">
            <a href="<?php echo get_permalink(5966) ?>">
              <h2>Кипр</h2>
            </a>
            <hr class="ztCantryLine" />
            <div class="ztCantryControlButtons">
              <a class="se" href="<?php echo get_permalink(5966) ?>">Найти тур</a> <span class="zy" data-strananame="Кипр">Оставить заявку</span><a class="fire" href="<?php echo get_permalink(6012) ?>">Горящие туры</a>
              <a class="reset" href="<?php echo get_permalink(6014) ?>">Курорты</a>
            </div>
          </div>
        </div> -->

        <div class="ztFlexLine">
          <picture class="ztCantry ztCantryFull">
            <img class="of-c ztCantryFull ztCantry" loading="lazy" src="https://www.turcentr46.ru/wp-content/uploads/2021/10/vinisuella.jpg" alt="">
          </picture>
          <!-- <div style = "background-image:url(<?php bloginfo("template_url"); ?>/images/zagslides/oae.jpg);" class = "ztCantry ztCantryFull"></div> -->

          <div class="ztCantryControl">
            <a href="<?php echo get_permalink(6189) ?>">
              <h2>Венесуэла</h2>
            </a>
            <hr class="ztCantryLine" />
            <div class="ztCantryControlButtons">
              <a class="se" href="<?php echo get_permalink(6189) ?>">Найти тур</a>
              <span class="zy" data-strananame="Венесуэла">Оставить заявку</span>
              <a class="fire" href="<?php echo get_permalink(6194) ?>">Горящие туры</a>
              <a class="reset" href="<?php echo get_permalink(6197) ?>">Курорты</a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>

<?php get_template_part('template-parts/hot-position-new'); ?>

<?php include("cta-zayavka.php"); ?>

<?php include 'advantages.php'; ?>

<?php include 'review.php'; ?>

<div class="about">
  <div class="centerInLine">
    <div class="aboutTextWriper">
      <div class="aboutText">
        <h1>Туристическая компания "ТурЦентр"</h1>
        <p><?php /*iinclude_page(44);*/ echo carbon_get_theme_option('main_text') ?></p>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>