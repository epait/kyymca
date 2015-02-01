<?php get_header() ?>
<!-- Main Content -->
        <div class="row-fluid">
        	<div class="col-sm-12">
	            <div class="single-content">
	            	<?php if (have_posts()) : ?>
	            		<?php while (have_posts()) : the_post(); ?>
	            			<div class="headerImage"><?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?></div>
	            			<div id="breadcrumb">
		  						<div id="bc_left">
		  							<?php if(function_exists('bcn_display')) {
		        						bcn_display();
		    						}?>
								</div>
		  						<div id="bc_spacer"></div>
		  						<div id="bc_right"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
		  					</div>
	            			<div class="pageTitle"><?php the_title(); ?></div>
							<br />
							<?php the_content() ?>
							<br />
							<?php the_field('section_two', 'option') ?>
							<br />
							<?php the_field('section_three', 'option') ?>
	            		<?php endwhile; ?>
	            	<?php endif; ?>
	            </div>
        	</div>
        </div>
<?php get_footer() ?>