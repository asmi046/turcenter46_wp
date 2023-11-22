	
	<div class="line review">
		<div class="container">
			<h2>Отзывы наших клиентов</h2>
			<div class="review-slider owl-carousel"> 
				<?php
					// $posts = get_posts( array(
					// 	'numberposts' => 5,
					// 	'category'    => 40,
					// 	'orderby' 	=> 'date',
					// 	'order' => 'DESC'
					// ) );

					$posts = carbon_get_theme_option('complex_reviews');
					$inc = 0;
					foreach( $posts as $post ){
						if($inc < 5):
						// setup_postdata($post);
				?>
					<div class="review-slider__item">
						<picture class="review-slider__item-photo">
							<img loading="lazy" src="<?php echo wp_get_attachment_image_src($post['img'], 'full')[0];?>" alt="Отзыв о туре от <?php echo $post['name']?>">
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
						<!-- <button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: block;">Previous</button> -->
					</div>
				<?php
					endif; $inc++;
				}
				?>
			
			</div>
		</div>
		<div class="btn-wrap-center">
			
			<a href="<?php echo get_category_link(40)?>" class="g-button">Все отзывы</a>
		</div>
	</div>