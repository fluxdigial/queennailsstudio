<?php
$categories = get_the_category( $post->ID );
?>
<article <?php post_class( 'post-item img-hover group' ); ?>>
	<div class="entry-thumbnail rounded overflow-hidden w-full">
		<a href="<?php the_permalink(); ?>" class="block">
			<?php the_post_thumbnail( 'post-thumbnail-blog', [ 'alt' => get_the_title(), 'class' => 'block aspect-video object-cover w-full' ] ) ?>
		</a>
	</div>
	<div class="entry-content w-full mt-5">
		<h3 class="text-[20px] leading-tight font-semibold text-heading my-0">
			<a href="<?php the_permalink(); ?>"
				class="line-clamp-2 hover:no-underline text-heading hover:text-hover">
				<?php the_title(); ?>
			</a>
		</h3>
		<div class="flex flex-wrap items-center gap-2 mt-2">
			<p
				class="date my-0 flex flex-wrap items-center gap-1 text-heading text-base font-normal pr-2 border-solid border-r-[1px] border-[#999999] border-y-0 border-l-0">
				<?= Flux\Icon::output( 'time' ); ?>
				<?= get_the_date( 'd-m-Y' ); ?>
			</p>
			<a href="<?= get_category_link( $categories[0]->term_id ) ?>"
				class="see-more text-primary text-base font-medium hover:no-underline hover:text-hover">
				<?= esc_html( $categories[0]->cat_name ); ?>
			</a>
		</div>

		<p class="entry-except line-clamp-3 text-heading text-base font-normal mt-3 mb-0">
			<?= get_the_excerpt() ?>
		</p>
	</div>
</article>