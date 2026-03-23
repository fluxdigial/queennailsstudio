<?php
namespace Flux;

use QueenNailsStudio\Assets;

class Loader {
	public function __construct() {
		add_action( 'after_setup_theme', [ $this, 'setup' ] );
		add_action( 'widgets_init', [ $this, 'widgets_init' ] );
		// add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
	}

	public function setup() {
		load_theme_textdomain( 'nozomi', get_template_directory() . '/languages' );

		register_nav_menus([
			'primary' => esc_html__( 'Primary Menu', 'nozomi' ),
            'left' => esc_html__( 'Primary Lef', 'nozomi' ),
            'right' => esc_html__( 'Primary Right', 'nozomi' ),
		]);

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ] );

		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo' );
		add_theme_support( 'responsive-embeds' );
	}

	public function widgets_init() {
        register_sidebar(
			[
				'name'          => esc_html__( 'Header Left', 'nozomi' ),
				'id'            => 'header-left',
				'before_widget' => '<aside class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);

        register_sidebar(
			[
				'name'          => esc_html__( 'Header Right', 'nozomi' ),
				'id'            => 'header-right',
				'before_widget' => '<aside class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);

        register_sidebar(
			[
				'name'          => esc_html__( 'Header Mobile', 'nozomi' ),
				'id'            => 'header-mobile',
				'before_widget' => '<aside class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);

		register_sidebar(
			[
				'name'          => esc_html__( 'Sidebar', 'nozomi' ),
				'id'            => 'sidebar-1',
				'before_widget' => '<aside class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);

        register_sidebar(
			[
				'name'          => esc_html__( 'Sidebar Post', 'btb' ),
				'id'            => 'sidebar-post',
				'before_widget' => '<aside class="widget widget-lang %2$s">',
				'after_widget'  => '</aside>',
			]
		);

		register_sidebar(
			[
				'name'          => esc_html__( 'Sidebar Archive', 'btb' ),
				'id'            => 'sidebar-archive',
				'before_widget' => '<aside class="widget widget-lang %2$s">',
				'after_widget'  => '</aside>',
			]
		);

        register_sidebar(
			[
				'name'          => esc_html__( 'Footer', 'nozomi' ),
				'id'            => 'footer',
				'before_widget' => '<aside class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);

        register_widget( '\Flux\Widgets\RecentPosts' );
	}
}