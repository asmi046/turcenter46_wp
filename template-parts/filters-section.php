<section class="filters-sec filters-sec_side-block">
	<div class="centerInLine">
<script>
  
  function go_to_cat(element) {
    document.location.href = element.value
  }

</script>
    <div class="filters__row">
      <!-- <div class="filter_select_wraper"> -->
            <div class="filters__select-block filters__item">
              <p class="filters__select-name">Краснодарский край:</p>
              <select name="form[]" onchange = "go_to_cat(this)"  class="filters__select-sel">
                <option value="0" disabled selected>Выберите курорт</option>
                <?
                  $categories = get_categories( [
                    'parent' => 14
                  ]);
                  
                  $i = 0;
                  $cur_c_id = empty(get_queried_object()->term_id)?0:get_queried_object()->term_id;
                  foreach( $categories as $cat ){
                ?>
                    <option value="<?echo get_category_link($cat->term_id)?>" <? if ($cur_c_id == $cat->term_id) echo 'selected'; ?> data-lnk = "<?echo get_category_link($cat->term_id)?>" ><? echo  $cat->name?></option>
                <?
                    $i++;
                  }
                ?>
                
              </select>
            </div>

            <div class="filters__select-block filters__item">
              <p class="filters__select-name">Крым</p>
              <select name="form[]" onchange = "go_to_cat(this)" class="filters__select-sel">
              <option value="0" disabled selected >Выберите курорт</option>
              <?
                  $categories = get_categories( [
                    'parent' => 15
                  ]);
                  
                  $i = 0;
                  $cur_c_id = empty(get_queried_object()->term_id)?0:get_queried_object()->term_id;
                  foreach( $categories as $cat ){
                ?>
                    <option value="<?echo get_category_link($cat->term_id)?>" <? if ($cur_c_id == $cat->term_id) echo 'selected'; ?> data-lnk = "<?echo get_category_link($cat->term_id)?>"><? echo  $cat->name?></option>
                <?
                    $i++;
                  }
                ?>
              </select>
            </div>
      
      <a href="<? echo get_the_permalink(4165);?>" class="filters__item filters__item-link"><span class="filters__link-icon filters__link-icon-01"></span> <span class = "filters__link-text">Все цены на проезд</span></a>
      <a href="<? echo get_the_permalink(4122);?>" class="filters__item filters__item-link"><span class="filters__link-icon filters__link-icon-02"></span> <span class = "filters__link-text"> График заездов</span></a>
      <a href="<? echo get_the_permalink(162);?>" class="filters__item filters__item-link"><span class="filters__link-icon filters__link-icon-03"></span> <span class = "filters__link-text"> Наши автобусы</span></a>

    </div>

	</div>
</section>