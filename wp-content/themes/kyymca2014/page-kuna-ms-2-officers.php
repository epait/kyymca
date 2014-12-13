<?php
/*
Template Name: MS KUNA 2 Officer
*/
?>
<!-- Main Content -->
<?php get_header() ?>
    <div class="row-fluid">
       	<div class="col-sm-12">
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
  		</div>
	            	<div class="chapterTitle"><?php the_title(); ?></div>
	            	<div class="row-fluid">
	            		<div class="col-sm-4">
	            			<div class="sidebar">
	            				<?php $image = get_field('sidebar_image'); if ( $image != NULL ) { ?>
										<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
	            				<br />
	            				<?php } ?>
	            				<h4 class="sidebar-title"><?php the_field('sidebar_title') ?></h4>
	            				<div class="sidebar-subtitle"><?php the_field('sidebar_subtitle') ?></div>
	            				<?php
	            					wp_nav_menu( array( 'theme_location' => 'kuna-ms-2-menu', 'menu_class' => 'sidebar-menu' ) );
									// check if the repeater field has rows of data
									if( have_rows('ms_kuna_2_officers', 'option') ): ?>
										<br />
										<h4 class="sidebar-title">Presiding Officers</h4>
										<?php 
									 	// loop through the rows of data
									    while ( have_rows('ms_kuna_2_officers', 'option') ) : the_row();
									        // display a sub field value ?> 
									        <div class="national-officer">
									        	<a class="officer-name" href='<?php the_sub_field('page_link'); ?>'><?php the_sub_field('name'); ?></a><br />
									        	<span class="officer-position"><?php the_sub_field('position'); ?></span><br />
									        	<span class="officer-school"><?php the_sub_field('school'); ?></span><br />
									        	<span class="officer-email"><a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a></span><br />
									       	</div> 
									    <?php endwhile; ?>
									    <br />
									<?php  else :
									    // no rows found
									endif; 
								?>
	            				<?php the_field('sidebar_content') ?>
	            			</div>
	            		</div>
	            		<div class="col-sm-8">
							<div class="pageContent">
								<?php the_content() ?>
								<?php
									// check if the repeater field has rows of data
									if( have_rows('page_sections') ): ?>
										<br />
										<?php 
									 	// loop through the rows of data
									    while ( have_rows('page_sections') ) : the_row();
									        // display a sub field value
									        the_sub_field('additional_section');
									        ?> <br /> <?php 
									    endwhile;
									else :
									    // no rows found
									endif;
								?>
							</div>
						</div>
					</div>
	           	<?php endwhile; ?>
	        <?php endif; ?>
    </div>
<?php get_footer() ?>