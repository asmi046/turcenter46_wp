<?php
/*
* Template Name: Аренда автобусов
*/
?>
<?php  get_header("booking");
$banner = wp_get_attachment_image_src( carbon_get_the_post_meta('otel_banner'), 'full')[0];
if(empty($banner)) {
	$banner = get_template_directory_uri() . '/images/mir/contact.jpg';
}
?>

	<script>
		
		var timerId = setInterval(function() {
				indexbaner = jQuery(".perekluhatel .perSel").data("number");
				
				if (indexbaner == jQuery(".perekluhatel .per").length)
				{
					jQuery(".perekluhatel .per").removeClass("perSel");
					jQuery(".perekluhatel #p1").addClass("perSel");
					indexbaner = 0;
					
				}
				
				
				indexbaner++;
				
				jQuery(".allB .b").hide("fade");
				jQuery(".allB #bn"+indexbaner).show("fade");
				
				jQuery(".perekluhatel .per").removeClass("perSel");
			jQuery(".perekluhatel #p"+indexbaner).addClass("perSel");
				
				
				
		}, 5000);
	
		jQuery(document).ready(function($) { 
			$(".perekluhatel .per").click(function(){ 
				var index = $(this).data("number");
				$(".perekluhatel .per").removeClass("perSel");
				$(this).addClass("perSel");
				$(".allB .b").hide("fade");
				$(".allB #bn"+index).show("fade");
			});
		});		
	</script>


<?php get_template_part('template-parts/bus-tour-menu');?>

<?php get_template_part('template-parts/slider-bus');?>

<?php get_template_part('template-parts/choice-bus');?>

<?php get_template_part('template-parts/bus-card');?>

<?php get_template_part('template-parts/bus-subtitle');?>

<?php get_footer(); ?>
