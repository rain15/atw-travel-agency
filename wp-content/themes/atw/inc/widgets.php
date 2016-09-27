<?php 
/**
 * Adds Upcoming Tours widget.
 */
class UpcomingTours extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'upcoming_tours', // Base ID
			__( 'Upcoming Tours', 'text_domain' ), // Name
			array( 'description' => __( 'Show 2 Upcoming Tours', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		/* MY NOTES: I removed the echo statement here and added WP Query */
				//echo __( esc_attr( 'Hello, World!' ), 'text_domain' );
		$query = array(
			'post_type' => 'all_tours',
			'posts_per_page' => 2,
			'orderby' => 'title',
			'order' => 'ASC'
		);?>

		<ul class="tours list-footer">
			<?php $tours = new WP_QUERY($query); while ($tours->have_posts()) : $tours->the_post() ; ?>
			<li class="clear">
				<div class="featured-tour grid2-4">
					<?php the_post_thumbnail('thumbnail'); ?>
				</div> <!-- .featured-tour -->
				<div class="content-tour grid2-4 omega">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 
				</div> <!-- .content-tour -->
			</li>

			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
		<?php 
		//MY NOTES: Because we are mixing HTML with php, I added open and closing php tags here 
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class UpcomingTours

// register UpcomingTours widget
function register_upcoming_tours() {
    register_widget( 'UpcomingTours' );
}
add_action( 'widgets_init', 'register_upcoming_tours' );

/**************************************************************/
/***************** RANDOM TIPS WIDGET BELOW *******************/
/**************************************************************/


/**
 * Adds Random Tips widget.
 */
class RandomTips extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'random_tips', // Base ID
			__( 'ATW Random Tips', 'text_domain' ), // Name
			array( 'description' => __( 'Show 2 random entries from the Blog', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		/* MY NOTES: I removed the echo statement here and added WP Query */
				//echo __( esc_attr( 'Hello, World!' ), 'text_domain' );
		$query = array(
			'post_type' => 'post',
			'posts_per_page' => 2,
			'orderby' => 'rand',
			'order' => 'ASC'
		);?>

		<ul class="blog-post">
			<?php $post = new WP_QUERY($query); while ($post->have_posts()) : $post->the_post() ; ?>
			<li class="clear">
				<div class="featured-tour grid2-4">
					<?php the_post_thumbnail('thumbnail'); ?>
				</div> <!-- .featured-tour -->
				<div class="content-tour grid2-4 omega">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 
				</div> <!-- .content-tour -->
			</li>

			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
		<?php 
		//MY NOTES: Because we are mixing HTML with php, I added open and closing php tags here 
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class RandomTips

// register RandomTips widget
function register_random_tips() {
    register_widget( 'RandomTips' );
}
add_action( 'widgets_init', 'register_random_tips' );

/**************************************************************/
/***************** COUPONS WIDGET BELOW *******************/
/**************************************************************/


/**
 * Adds Coupons Images widget.
 */
class CouponsWidget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'coupons_widget', // Base ID
			__( 'ATW Coupons', 'text_domain' ), // Name
			array( 'description' => __( 'Show 2 coupons', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		/* MY NOTES: I removed the echo statement here and added WP Query */
				//echo __( esc_attr( 'Hello, World!' ), 'text_domain' );
		$query = array(
			'post_type' => 'coupons',
			'posts_per_page' => 2,
			'orderby' => 'date',
			'order' => 'DESC'
		);?>

		<ul class="coupons">
			<?php $coupons = new WP_QUERY($query); while ($coupons->have_posts()) : $coupons->the_post() ; ?>
			<li class="clear">
				<div class="content-coupon">
					<img src="<?php the_field('image'); ?>" alt=""> 
				</div> <!-- .content-coupon -->
				
			</li>

			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
		<?php 
		//MY NOTES: Because we are mixing HTML with php, I added open and closing php tags here 
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} // class CouponsWidget

// register CouponsWidget widget
function register_coupons_widget() {
    register_widget( 'CouponsWidget' );
}
add_action( 'widgets_init', 'register_coupons_widget' );


?>