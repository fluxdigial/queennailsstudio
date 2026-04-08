<?php

$title  = get_field( 'new_title' );
$button = get_field( 'news_button' );
$link   = get_field( 'news_link_button' );

$query = new WP_Query( array(
	'posts_per_page' => 3,
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

if( !$query->have_posts() ) {
	return;
}
?>
<section class="news py-12 md:py-14 xl:py-20 overflow-hidden">
	<div class="container">
		<?php if( !empty( $title ) ): ?>
			<h2 class="news__title my-0 text-heading text-center text-[32px] lg:text-[48px] font-bold  wow animate__animated animate__fadeInUp">
				<?php echo $title; ?>
			</h2>
		<?php endif; ?>
		<div class="news__wrap relative mt-6 lg:mt-8 grid grid-cols-1 lg:grid-cols-3 gap-5 lg:gap-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.3s" data-wow-delay="0.35s">
			<?php
			global $count;
			while( $query->have_posts() ):
				$query->the_post();
				get_template_part( 'template-parts/content', 'blog' );
			endwhile;
			wp_reset_postdata();
			?>
		</div>
		<?php if( !empty( $link ) ): ?>
			<a href="<?= esc_url( $link ) ?>" class="mx-auto text-center mt-6 px-6 py-3 flex items-center justify-center w-[180px] text-[18px] text-white border-solid border-[1px]  border-[#911439] rounded-[30px] bg-[#911439] font-medium hover:no-underline wow animate__animated animate__fadeInUp" data-wow-delay="0.6s" title="View More">
				<?= esc_html( $button ); ?>
			</a>
		<?php endif; ?>
	</div>
</section>