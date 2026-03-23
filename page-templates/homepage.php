<?php // @codingStandardsIgnoreLine
/**
 * Template Name: Homepage
 */
?>
<?php get_header(); ?>
	<?php
	get_template_part( 'template-parts/home/01-banners' );
    get_template_part( 'template-parts/home/02-intro' );
	get_template_part( 'template-parts/home/03-core' );
    get_template_part( 'template-parts/home/04-industry' );
    get_template_part( 'template-parts/home/04-Philosophy' );
    get_template_part( 'template-parts/home/04-projects' );
	?>
<?php get_footer(); ?>