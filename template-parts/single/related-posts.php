<?php
$current_post_id = get_the_ID();

$categories      = wp_get_post_terms( $current_post_id, 'category', array( 'fields' => 'ids' ) );
$args            = array(
	'post_type'      => 'post',
	'posts_per_page' => 3,
	'post__not_in'   => array( $current_post_id ),
	'tax_query'      => array(
		'relation' => 'OR',
		array(
			'taxonomy' => 'category',
			'field'    => 'term_id',
			'terms'    => $categories,
		),
	),
);
$query           = new WP_Query( $args );
?>
<section class="related-post">
	<h2>
		<?= esc_html__( 'Related Posts', 'villa' ); ?>
	</h2>
	<div class="related-post__wrap grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-10 mt-6">
		<?php
		if ( $query->have_posts() ) :
			while ( $query->have_posts() ) :
				$query->the_post();
				get_template_part( 'template-parts/content', 'blog' );
			endwhile;
			wp_reset_postdata();
		endif;
		?>
	</div>
</section>