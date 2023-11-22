<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 */

get_header('booking');
?> 

<section class="booking-title-wrapper" style="background-image: url(<?php echo get_template_directory_uri();?>/images/b/mainBuss.jpg);">
	<div class="container-booking">
		<h1 class="booking-title">Поиск</h1>
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
	</div> 
</div>


<?php get_template_part('template-parts/search-form-section');?> 


<section id="primary" class="content-area site-content">
	<main id="main" class="site-main">

	<?php if ( have_posts() ) : ?>
		<div class="container h-a container-serch">
			<!-- <div class="">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Поиск для: %s', 'bizishop' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</div> -->
			<!-- .page-header -->
		</div>

		<div class="container resort-container">
			<div class="resort-item-wraper">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */?>

				 <a class="resort-item resort-item__search" href="<?php echo get_permalink();?>">
				 	<div class="resort-item-inner-wraper">
				 		<picture>
				 			<!-- <?php echo get_the_post_thumbnail( $post->ID, "turImg", array("alt" => $post->post_title, "title" => $post->post_title));?> -->

				 			<?php 
								if( has_post_thumbnail() ) {
									echo get_the_post_thumbnail( $post->ID, "turImg", array("alt" => $post->post_title, "title" => $post->post_title)); }
								else {
									echo '<img src="'.get_bloginfo("template_url").'/images/img-default.jpg" />';
									}
								?>

				 		</picture>
				 		<h2><?php echo $post->post_title?></h2>
				 		<div class="newButton">Подробнее</div>
				 	</div>
				 </a>
				<?php //get_template_part( 'template-parts/content', 'search' );

			endwhile;?>
		</div>

		<?php the_posts_navigation();
	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
</div>

</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();
