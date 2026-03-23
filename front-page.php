<?php
if ( 'posts' === get_option( 'show_on_front' ) ) { // If users select to display blog posts on the front page, load the index file.
	get_template_part( 'index' );
	return;
}

get_header();

foreach ( glob( __DIR__ . '/template-parts/home/*.php' ) as $file ) {
	include $file;
}

get_footer();