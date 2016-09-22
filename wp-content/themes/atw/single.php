<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<section>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<!-- post thumbnail -->
			<?php //if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<!-- <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); // Fullsize image for the single post ?>
				</a> -->
			<?php //endif; ?>
			<!-- /post thumbnail -->

			<!-- post title -->
			<h2><span><?php the_title(); ?></span></h2>

			<!-- /post title -->

			<div class="clear">
	
				<div class="grid1-3 post-information">
					<!-- post details -->
					
					<span class="date"><strong><?php _e( 'Published ', 'html5blank' ); ?></strong> <?php the_time('F j, Y'); ?></span><br>
					<span class="author"><strong><?php _e( 'by ', 'html5blank' ); ?></strong> <?php the_author_posts_link(); ?></span><br>
					
					<span class="category"><strong><?php _e( 'category: ', 'html5blank' );  ?></strong> <?php the_category(', '); // Separated by commas ?></span>

					<!-- /post details -->

					<div class="share-buttons">
						<p>Share: </p>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57e42f56bebb46b9"></script>
						<div class="addthis_inline_share_toolbox_6ucz"></div>
					</div>

				</div> <!-- .grid1-3 -->	

				<div class="grid2-3 blog-single-post">
					
					<?php the_content( ); ?>

					<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

					<?php comments_template(); ?>
				</div> <!-- .grid2-3 -->
			</div> <!-- .clear -->

			

		</article>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /section -->
	</main>


<?php get_footer(); ?>
