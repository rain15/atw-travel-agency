<?php get_header(); ?>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<!-- post title -->
		<h2><span><?php the_title(); ?></span></h2>
		<!-- /post title -->
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class('grid2-3'); ?>>

			<!-- post thumbnail -->
			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<?php the_post_thumbnail(); // Fullsize image for the single post ?>
				
			<?php endif; ?>
			<!-- /post thumbnail -->

			<?php 
				// dates
				$format = 'F d, Y';
				$startDate = strtotime(get_field('start_date'));
				$startDate = date_i18n($format, $startDate);

				$endDate = strtotime(get_field('end_date'));
				$endDate = date_i18n($format, $endDate);
			?>
			<div class="tour-information">
				<p><strong>Leaving and Returning Date:</strong> <?php echo $startDate . ' - ' . $endDate ?></p>
				<p><strong>Location for departure:</strong> <?php the_field('location'); ?></p>
				<p><strong>Available Seats:</strong> <?php the_field('available_seats'); ?></p>
				<p><strong>Price:</strong> <?php the_field('price'); ?></p>
			</div> <!-- .tour-information-->

			<div class="itinerary">
				<h3>Travel Itinerary</h3>
				<?php the_field('travel_itinerary') ?>	
			</div>

			<?php edit_post_link(); // Always handy to have Edit Post Links available ?>


		</article>
		<!-- /article -->
		<aside class="grid1-3">
			<h3>Gallery</h3>
			<?php the_content(); ?>
		</aside>

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	


<?php get_footer(); ?>
