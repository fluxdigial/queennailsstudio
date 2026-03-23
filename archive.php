<?php get_header(); ?>

<div class="archive__blog py-12 md:py-14 xl:py-24">
	<div class="container flex flex-wrap gap-6 md:gap-8 lg:gap-10">
		<div class="archive__blog--list">
			<?php if ( have_posts() ) : ?>
				<div class="entries flex flex-wrap gap-y-10 gap-x-6">
					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'template-parts/content', 'list' );
					}
					?>
				</div>
				<?php
				the_posts_pagination(
					[
						'mid_size'  => 1,
						'prev_text' => __( '<', 'QueenNailsStudio' ),
						'next_text' => __( '>', 'QueenNailsStudio' ),
					]
				);
				?>
			<?php else : ?>
				<?php get_template_part( 'template-parts/content/none' ); ?>
			<?php endif; ?>
		</div>
		<div class="archive__blog--sidebar sidebar">
			<?php dynamic_sidebar( 'sidebar-archive' ) ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>