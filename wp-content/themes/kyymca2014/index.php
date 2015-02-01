<?php get_header(); ?>
<div class="row-fluid">
	<div class="col-sm-12">
		<div class="headerImage"></div>
		<div id="breadcrumb">
  			<div id="bc_left">
  				<?php if(function_exists('bcn_display')) {
        			bcn_display();
    			}?>
			</div>
  			<div id="bc_spacer"></div>
  			<div id="bc_right"><a href="/news">Blog</a></div>
  		</div>
	</div>
</div>
<div class="row-fluid">
	<div class="col-sm-8">
		<div class="homeTitle"><h4>KY YMCA Blog</h4></div>
		<hr>
		<div class="main-content">
			<?php query_posts('posts_per_page=5&cat=17'); ?>
		    <?php if (have_posts()) : ?>
		    <?php while (have_posts()) : the_post(); ?>    
		        <div class="post">
		            <!-- <div class="row-fluid"> -->
		                <!-- <div class="col-sm-12"> -->
		                  	<!-- <div class="tnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div> -->
			                <div class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
			                <div class="post-author">By <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a> on  <?php the_time(get_option('date_format')); ?></div>
			                <div class="excerpt"><?php the_excerpt(); ?></div>
			                <a class="black_arrow" href="<?php the_permalink(); ?>">READ MORE</a>
			            <!-- </div> -->
			        <!-- </div> -->
		        </div> 
		    <?php endwhile; ?>
		    <!-- Pagination -->
				<div <?php post_class('pagination'); ?>>
				<?php if(function_exists('wp_paginate')) { wp_paginate(); } ?>
				</div>
		    <?php endif; ?>
		</div>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>