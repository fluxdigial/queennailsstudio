<?php

get_header(); ?>
<?php
use Flux\Icon;

$categories     = get_the_category( $post->ID );
$first_category = $categories[0];

$author_name       = get_the_author();
$author_avatar_url = get_avatar_url( get_the_author_meta( 'ID' ) );
$author_id         = get_the_author_meta( 'ID' );
$author_url        = get_author_posts_url( $author_id );

?>
<article <?php post_class( 'py-[72px] lg:py-[96px]' ) ?> id="<?php the_ID() ?>">
	<div class="container single-blog flex flex-wrap gap-6 md:gap-8 lg:gap-10">
		<div class="single-blog__content">
			<?php the_title( '<h1 class="my-0 text-[22px] md:text-[24px] lg:text-[28px] leading-tight">', '</h1>' ); ?>
			<div class="single-blog__author flex flex-wrap gap-3 items-center justify-between mt-[10px] border-b-[1px] border-x-0 border-t-0 border-dashed border-[#DDDDDD] pb-[22px] mb-[30px]">
				<ul class="list-none p-0 m-0 flex flex-wrap items-center gap-2">
					<li class="bg-[#efcec9] rounded-full text-[#911439] text-[14px] leading-6 font-bold py-1 px-4">
						<a href="<?= esc_url( get_term_link( $first_category->term_id ) ); ?>" class="text-[#911439] text-[14px] leading-tight font-medium hover:no-underline">
							<?= esc_html( $first_category->name ); ?>
						</a>
					</li>
					<li class="text-[#999999] flex flex-wrap gap-1 items-center text-[14px] leading-tight font-normal hover:no-underline pr-2 border-r-[1px] border-solid border-y-0 border-l-0 border-[#999999]">
						<?php Icon::output( 'author' ); ?>
						<?php echo esc_html( $author_name ); ?>
					</li>
					<li class="text-[#999999] flex flex-wrap gap-1 items-center text-[14px] leading-tight font-normal hover:no-underline">
						<?php Icon::output( 'calendar' ); ?>
						<?= get_the_date( 'd/m/y' ); ?>
					</li>
				</ul>
				<div class="share flex items-center flex-wrap text-[#999999]">
					<?php
					echo 'Share:';
					?>
					<ul class="flex items-center flex-wrap list-none p-0 m-0 gap-3 ml-2">
						<li><a target="_blank" rel="noopener" class="size-[44px] rounded-full overflow-hidden flex items-center justify-center bg-[#efcec9]" href="https://facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
								<?php Icon::output( 'facebook' ) ?>
							</a></li>
						<li><a target="_blank" rel="noopener" class="size-[44px] rounded-full overflow-hidden flex items-center justify-center bg-[#efcec9]" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>">
								<?php Icon::output( 'twitter' ) ?>
							</a></li>
						<li><a target="_blank" rel="noopener" class="size-[44px] rounded-full overflow-hidden flex items-center justify-center bg-[#efcec9]" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>">
								<?php Icon::output( 'linkedin' ) ?>
							</a></li>
					</ul>
				</div>
			</div>
			<?php the_content(); ?>
			<?php if( has_tag() ): ?>
				<div class="single-tag border-t-[1px] border-x-0 border-b-0 border-dashed border-[#DDDDDD] pt-4">
					<div class=" tag flex flex-wrap items-center gap-2">
						<p><?= esc_html__( 'Tags:', 'btb' ); ?></p>
						<?php the_tags( '<ul class="list-none p-0 m-0 flex flex-wrap items-center gap-2"><li>', '</li><li>', '</li></ul>' ); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<div class="single-blog__sidebar sidebar">
			<?php dynamic_sidebar( 'sidebar-post' ) ?>
		</div>
	</div>
	<div class="container">
		<?php get_template_part( 'template-parts/single/related-posts' ) ?>
	</div>
</article>

<?php get_footer(); ?>