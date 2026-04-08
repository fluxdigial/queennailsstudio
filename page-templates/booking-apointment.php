<?php // @codingStandardsIgnoreLine
/**
 * Template Name: Booking
 */
?>
<?php get_header(); ?>
<section class="banner">
	<div class="container">
		<h1 class="page__title m-0 text-center text-heading text-[30px] md:text-[32px] lg:text-[36px] xl:text-[40px] font-bold py-16">
			<?php the_title(); ?>
		</h1>
	</div>
</section>
<section class="booking min-h-[500px]">
	<div class="container">
		<?php the_content(); ?>
	</div>
</section>
<?php get_footer(); ?>