<?php get_header(); ?>

<div class="row-fluid">

	<div class="col-sm-12">

		<div class="headerImage"></div>

	</div>

</div>

<div class="row-fluid">

	<div class="col-sm-8">

		<div class="homeTitle"><h4>Search Results for <?php the_search_query() ?></h4></div>

		<hr>

		<div class="main-content">

		    <?php if (have_posts()) : ?>

		    <?php while (have_posts()) : the_post(); ?>    

		        <div class="post">

		            <!-- <div class="row-fluid"> -->

		                <!-- <div class="col-sm-12"> -->

		                  	<!-- <div class="tnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div> -->

			                <div class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>

			                <div class="post-author">By <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a> on <?php the_date(); ?></div>

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