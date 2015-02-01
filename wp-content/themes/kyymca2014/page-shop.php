<?php
/*
Template Name: Store Page
*/
?>

<?php get_header() ?>
<!-- Main Content -->
        <div class="row-fluid">
        	<div class="col-sm-12">
	            <div class="single-content">
	            	<?php if (have_posts()) : ?>
	            		<?php while (have_posts()) : the_post(); ?>
	            			<div id="breadcrumb">
		  						<div id="bc_left">
		  							<?php if(function_exists('bcn_display')) {
		        						bcn_display();
		    						}?>
								</div>
		  						<div id="bc_spacer"></div>
		  						<div id="bc_right"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
		  					</div>
	            			<div class="pageTitle storeTitle"><?php the_title(); ?> <form method="get" action="<?php echo home_url( '/' ); ?>y-store/checkout"><input type="submit" value="View Cart" id="wpsc-view-cart" /></form></div>
							<br />
							<?php the_content(); ?>
						    <?php
							    if ( get_post_type == ‘wpsc-product’  && is_products_page() || is_archive() ){
							    	echo "<script>$('.bc-category').toggle(false);</script>";
							    }
						    ?>
	            		<?php endwhile; ?>
	            	<?php endif; ?>
	            </div>
        	</div>
        </div>
<?php get_footer() ?>