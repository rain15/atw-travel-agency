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
				<div class="grid1-3">
				<!-- post details -->
				<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
				<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
				<span class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
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
			
			

			<div class="grid2-3">
				<!-- post title -->
				<h3>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</h3>
				<!-- /post title -->
				<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
			</div> <!-- .grid2-3 -->

		</div> <!-- .clear -->


		<?php edit_post_link(); ?>

	</article>
	<!-- /article -->
<?php $i++; endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
