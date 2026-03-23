<?php
namespace Flux;

use QueenNailsStudio\Assets;
class AssetsLoader {
	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
        add_filter('upload_mimes', [ $this,'allow_svg_uploads']);
	}
	public function enqueue_assets() {
		wp_enqueue_style( 'QueenNailsStudio', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css' ) );
		Assets::js( 'script', [ 'jquery' ] );
        wp_enqueue_style( 'animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', [], '1.1.0' );
        wp_enqueue_script( 'wowjs', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', ['jquery'], '5.0.0', true );

		if ( is_page_template( 'page-templates/homepage.php' ) ) {
			Assets::css( 'home', true );
			$this->enqueue_slider();
		}

        if ( is_page_template( 'page-templates/about-us.php' ) ) {
            Assets::css( 'about-us', true );
            $this->enqueue_slider();
             Assets::js( 'archivement', [ 'jquery' ]);
		}

        if ( is_page_template( 'page-templates/contact-us.php' ) ) {
			Assets::css( 'contact-us', true );
		}

        if ( is_page_template( 'page-templates/services.php' ) ) {
			Assets::css( 'services', true );
            $this->enqueue_slider();
		}

        if ( is_page_template( 'page-templates/our-team.php' ) ) {
			Assets::css( 'out-team', true );
            Assets::js( 'archivement', [ 'jquery' ]);
		}

        if ( is_page_template( 'page-templates/gallery.php' ) ) {
            Assets::css( 'gallery', true );
            wp_enqueue_style('lightgallery-css', 'https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/css/lightgallery-bundle.min.css', [],'2.7.2' );
            wp_enqueue_script( 'lightgallery-js',   'https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/lightgallery.min.js',   [], '2.7.2',  true );
            wp_enqueue_script( 'lightgallery-plugins-js', 'https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/thumbnail/lg-thumbnail.min.js', [ 'lightgallery-js' ], '2.7.2', true);
            wp_enqueue_script('lightgallery-zoom-js','https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/zoom/lg-zoom.min.js',[ 'lightgallery-js' ],'2.7.2', true);
        }

        if ( is_page_template( 'page-templates/products.php' ) ) {
            Assets::css( 'products', true );
        }

        if ( is_singular( 'post' ) ) {
            Assets::css( 'single', true );
        }

		if ( ( is_home() || is_archive() || is_search() ) ) {
			Assets::css( 'archive', true );
		}

        if ( is_404() ) {
            Assets::css( '404', true );
        }
	}

	private function enqueue_slider() {
		?>
		<link href="https://unpkg.com/blaze-slider@1.9.3/dist/blaze.css" rel="stylesheet" media="print"
			onload="this.media='all'">
		<?php
		// wp_enqueue_style( 'blaze-css', 'https://unpkg.com/blaze-slider@1.9.3/dist/blaze.css' );
		wp_enqueue_script( 'blaze-js', 'https://unpkg.com/blaze-slider@1.9.3/dist/blaze-slider.min.js', [], '1.9.3', true );
		wp_add_inline_script( 'blaze-js', '
		document.querySelectorAll( ".slider" ).forEach( slider => {
			let options = slider.dataset.options;

			options = JSON.parse( options );
			new BlazeSlider( slider, options );
		} );
	' );
	}

    public function allow_svg_uploads($mimes) {
        $mimes['svg']  = 'image/svg+xml';
        $mimes['svgz'] = 'image/svg+xml';
        return $mimes;
    }
}