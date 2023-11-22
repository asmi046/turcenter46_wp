
<div class="line topTur">
  <div class="centerInLine">
    <div class="motr-tour-wraper">
      <?php $arr_tours = carbon_get_theme_option('complex_tours');
      if ($arr_tours) :
        foreach ($arr_tours as $tour) : ?>
          <?
            if ( !empty($tour['complex_tou_version']) ) {
          ?>
              <div class="turElem turElemToVersion">
                <a href="<?php echo $tour['complex_tours_link']; ?>">
                  <img class = "mainImg" loading="lazy" src = "<?php echo wp_get_attachment_image_src($tour['complex_tours_img'], 'large')[0]; ?>" />
                  <div class = "shadow"></div>
                  <div class = "info">
                    <h2><?php echo $tour['complex_tours_title'] ?></h2>
                    <?php echo $tour['complex_tours_date'] ?><br/>
                    <?php echo $tour['complex_tours_price'] ?><span class="curr">₽</span>
                  </div>
                </a>
            </div>
          <?
              continue;
            }
          ?>
          <div class="turElem"><a href="<?php echo $tour['complex_tours_link']; ?>">
              <div class="turThumb">
                <?php if ($tour['complex_tours_sticker']) : ?>
                  <div class="iconFlgPl"><?php echo $tour['complex_tours_sticker']; ?></div>
                <?php endif; ?>
                <img width="390" height="260" loading="lazy" src="<?php echo wp_get_attachment_image_src($tour['complex_tours_img'], 'large')[0]; ?>" class="attachment-turImg size-turImg wp-post-image" alt="<?php echo $tour['complex_tours_title'] ?>" title="<?php echo $tour['complex_tours_title'] ?>">
                <?php if (!empty($tour['complex_tours_qty_days'])) { ?>
                  <div class="text ">
                    <div class="line1">
                      <!-- <i class="far fa-clock"></i> --> <?php echo $tour['complex_tours_qty_days'] ?>
                    </div>
                    <div class="line2"><strong><?php echo $tour['complex_tours_place'] ?></strong></div>
                  </div>
                <?php } ?>
              </div>

              <div class="turInfoElem">
                <div class="upp">

                  <h2><?php echo $tour['complex_tours_title'] ?></h2>
                  <br>
                  <?php echo $tour['complex_tours_date'] ?>
                </div>

                <div class="boot ">


                  <div class="price">
                    <?php if (!empty($tour['complex_tours_price'])) { ?>
                      <strong><?php echo $tour['complex_tours_price'] ?></strong><span class="grayText"> <span class="curr">₽</span></span>
                    <?php } ?>
                    <div class="red-line "></div>
                    <div class="new-price "></div>
                  </div>

                  <div class="podr">
                    <?php echo $tour['complex_tours_more_link'] ?> </div>
                </div>
              </div>

            </a>
        </div>
      <?php endforeach;
      endif;
      ?>
    </div>
    <?php //get_template_part('template-parts/mainAllTour');
    ?>
  </div>
</div>