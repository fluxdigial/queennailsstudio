<?php
namespace Flux\Widgets;
use Flux\Icon;
class RecentPosts extends \WP_Widget {
	protected $defaults;

	public function __construct() {
		$this->defaults = array(
			'title'     => esc_html__( 'Title', 'dienlanh' ),
			'id'        => 2,
			'post-type' => esc_html__( 'post', 'dienlanh' ),
		);
		parent::__construct(
			'dienlanh-recent-posts',
			esc_html__( 'Recent Posts', 'dienlanh' )
		);
	}

	/**
	 * How to display the widget on the screen.
	 *
	 * @param array $args     Widget parameters.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		$titlewd  = apply_filters( 'widget_title', $instance['title'] );
		$posttype = apply_filters( 'widget_posttype', $instance['post-type'] );
		$args     = [
			'post_type'      => $posttype,
			'posts_per_page' => 5,
			'post_status'    => 'publish',
			'no_found_rows'  => true,
		];
		$query    = new \WP_Query( $args );
		?>
		<!--widget content-->
		<aside class="widget news-sidebar">
			<h2 class="widgettitle">
				<?= esc_html( $titlewd ); ?>
			</h2>
			<div class="news-sidebar__wrap">
				<?php
				$i = 1;
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) :
						$query->the_post();
						?>
						<div class="news-sidebar__item">
							<div class="entry-thumbnail">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'sidebar-thumbnail' ); ?>
								</a>
							</div>
							<div class="entry-content">
								<a href="<?php the_permalink() ?>">
									<?php the_title(); ?>
								</a>
								<p class="entry-date flex flex-nowrap gap-1 items-center">
									<?php Icon::output( 'calendar' ); ?>
									<?= get_the_date( 'd-m-Y' ); ?>
								</p>
							</div>
						</div>
						<?php
					endwhile;
				endif;
				wp_reset_postdata();
				?>
			</div>
		</aside>
		<?php
	}
	/**
	 * Update the widget settings.
	 *
	 * @param array $new_instance New widget instance.
	 * @param array $old_instance Old widget instance.
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['post-type'] = sanitize_text_field( $new_instance['post-type'] );
		$instance['number']    = absint( $new_instance['number'] );

		return $instance;
	}

	/**
	 * Widget form.
	 *
	 * @param array $instance Widget instance.
	 *
	 * @return void
	 */
	public function form( $instance ) {
		$instance = wp_parse_args( $instance, $this->defaults );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_html_e( 'Title:', 'dienlanh' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"
				value="<?php echo esc_attr( $instance['title'] ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'post-type' ) ); ?>">
				<?php esc_html_e( 'Post Type:', 'dienlanh' ); ?>
			</label>
			<input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'post-type' ) ); ?>"
				name="<?php echo esc_attr( $this->get_field_name( 'post-type' ) ); ?>"
				value="<?php echo esc_attr( $instance['post-type'] ); ?>">
		</p>
		<?php
	}

}