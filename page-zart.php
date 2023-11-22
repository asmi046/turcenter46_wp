<?php
/*
Template Name: Страница зарубежные туры
*/				
?>

<?php get_header(); ?>
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
	
	<div class = "line PageContent singlePage">
		<div class = "centerInLine">
			<div class="breadcrumb">
				<?php
				if(function_exists('bcn_display'))
				{
					bcn_display();
				}
				?>
			</div>
			
			<script type="text/javascript">
				
			</script>
			
			<div class = "content ">
				
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h1><?php the_title();?></h1>
					<?php the_content();?>
					<!--
					<div class = "pereklBlk">
						<a href = "<?php //echo get_the_permalink(927);?>">
						<div id = "pb1" class = "tereklBtnSel tereklBtn">
							<div class = "img">
								<img src = "<?php //bloginfo("template_url")?>/images/hotturIcon.png" title = "Горящие туры" alt = "Горящие туры"   />
							</div>
							<div class = "hd">
								<h2>Горящие туры</h2>
							</div>
						</div>
						</a>
						
						<a href = "<?php //echo get_the_permalink(938);?>">
						<div id = "pb2" class = "tereklBtn">
							<div class = "img">
								<img src = "<?php //bloginfo("template_url")?>/images/minpriceIcon.png" title = "Туры по минимальной цене" alt = "Туры по минимальной цене" />
							</div>
							<div class = "hd">
								<h2>Минимальные цены</h2>
							</div>
						</div>
						</a>
						
						<a href = "<?php //echo get_the_permalink(947);?>">
						<div id = "pb3" class = " tereklBtn">
							<div class = "img">
								<img src = "<?php //bloginfo("template_url")?>/images/saleIcon.png" title = "Распродажа туров" alt = "Распродажа туров" />
							</div>
							<div class = "hd">
								<h2>Распродажа туров</h2>
							</div>
						</div>
						</a>
					</div>
					-->
					<style>
						#ts_sform .ts_block_main2 {
								width: 100%!important;
								
						}
					</style>
					
<div class="tv-search-form" tv-type="2" tv-showoperator:="1" tv-theme="theme2" tv-resultinwindow="0" tv-resultwidth="auto"></div>
<script type="text/javascript" src="//tourvisor.ru/module/init.js"></script>

					</div>
				<?php endwhile;?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<?php include 'review.php';?>
<?php get_footer(); ?>