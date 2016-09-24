<?php get_header(); ?>

	<section class="upcoming-tours">
		<h2><span>Upcoming Travels</span></h2>

		<?php 
			$args = array(
				'post_type' => 'all_tours',
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'posts_per_page' => 3
			);
		?>
		<ul>
			<?php $tours = new WP_Query($args); ?>
			<?php while($tours->have_posts()) : $tours->the_post(); ?>
				<?php the_title(); ?>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
	</section>

	
<?php get_footer(); ?>
