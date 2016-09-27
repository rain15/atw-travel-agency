<?php if (have_posts()): 
$i = 0;
while (have_posts()) : the_post(); ?>

	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="clear">

			<?php if ($i == 0) { ?>
				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
						<div class="photo">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail('featuredBlog', array('class' => 'polaroid')); // Declare pixel size you need inside the array ?>
							</a>
						</div>		
				<?php endif; ?>
				<!-- /post thumbnail -->
				<div class="grid1-3 post-information">
				<!-- post details -->
				
				<span class="date"><strong><?php _e( 'Published ', 'html5blank' ); ?></strong> <?php the_time('F j, Y'); ?></span><br>
				<span class="author"><strong><?php _e( 'by ', 'html5blank' ); ?></strong> <?php the_author_posts_link(); ?></span><br>
				
				<span class="category"><strong><?php _e( 'category: ', 'html5blank' );  ?></strong> <?php the_category(', '); // Separated by commas ?></span>
				<!-- /post details -->
			</div> <!-- .grid1-3 -->				
			<?php } else { ?>
				<div class="grid1-3">
					<!-- post thumbnail -->
					<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
						<div class="photo">

							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php the_post_thumbnail('medium', array('class' => 'polaroid')); // Declare pixel size you need inside the array ?>
							</a>
						</div>						

					<?php endif; ?>
					<!-- /post thumbnail -->
				</div>
				
			<?php } ?>
			
			

			<div class="grid2-3 blog-list-excerpt">
				<!-- post title -->
				<h3>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h3>
				<!-- /post title -->
				<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
			</div> <!-- .grid2-3 -->

		</div> <!-- .clear -->


		<?php //edit_post_link(); ?>

	</article>
	<!-- /article -->
<?php $i++; endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><span><?php _e( 'Sorry, nothing to display', 'html5blank' ); ?></span></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
