<?php
namespace Flux;

class Fields {
	public function __construct() {
		add_filter( 'rwmb_meta_boxes', [ $this, 'register_fields' ] );
	}

	public function register_fields( array $meta_boxes ): array {
		$meta_boxes[] = $this->home();

		return $meta_boxes;
	}

	private function home(): array {
		return [
			'title'      => __( 'Homepage settings', 'flux' ),
			'id'         => 'home',
			'post_types' => [ 'page' ],
			'include'    => [
				'ID' => get_option( 'page_on_front' ),
			],
			'tabs'       => [
				'banners'  => __( 'Banners', 'flux' ),
				'features' => __( 'Features', 'flux' ),
				'intro'    => __( 'Intro', 'flux' ),
				'partners' => __( 'Partners', 'flux' ),
				'news'     => __( 'News', 'flux' ),
			],
			'tab_style'  => 'left',
			'fields'     => [
				[
					'id'          => 'banners',
					'type'        => 'group',
					'tab'         => 'banners',
					'clone'       => true,
					'sort'        => true,
					'collapsible' => true,
					'group_title' => __( 'Banner {#}', 'flux' ),
					'fields'      => [
						[
							'id'   => 'image',
							'name' => __( 'Image', 'flux' ),
							'type' => 'single_image',
							'desc' => __( 'Recommended size: 1920x560', 'flux' ),
						],
						[
							'id'   => 'link',
							'name' => __( 'Link', 'flux' ),
						],
					],
				],
			],
		];
	}
}
