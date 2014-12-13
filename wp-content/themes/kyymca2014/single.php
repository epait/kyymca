<?php get_header() ?>
<!-- Main Content -->
        <div class="row-fluid">
        	<div class="col-sm-12">
	            <div class="single-content">
	            	<?php if (have_posts()) : ?>
	            		<?php while (have_posts()) : the_post(); ?>
	            			<div class="headerImage"></div>
	            			<div class="pageTitle"><?php the_title(); ?></div>
	            			<div class="post-author">By <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author_meta('display_name'); ?></a> on <?php the_date(); ?></div>
							<div class="postContent"><?php the_content() ?></div>
	            		<?php endwhile; ?>
	            	<?php endif; ?>
	            </div>
        	</div>
        </div>
<?php get_footer() ?>