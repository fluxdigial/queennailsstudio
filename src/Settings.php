<?php
namespace Flux;

class Settings {
	const OPTION_NAME = 'website_settings';

	public function __construct() {
		add_filter( 'mb_settings_pages', [ $this, 'register_settings_page' ] );
		add_filter( 'rwmb_meta_boxes', [ $this, 'register_fields' ] );
	}

	public static function get( string $name, array $args = [] ) {
		$args['object_type'] = 'setting';

		return rwmb_meta( $name, $args, self::OPTION_NAME );
	}

	public function register_settings_page( array $settings_pages ): array {
		$settings_pages[] = [
			'id'          => 'website-settings',
			'option_name' => self::OPTION_NAME,
			'menu_title'  => __( 'Website Settings', 'flux' ),
			'parent'      => 'themes.php',
			'capability'  => 'edit_theme_options',
			'style'       => 'no-boxes',
			'columns'     => 1,
			'tabs'        => [
				'contact' => [
					'label' => __( 'Contact', 'flux' ),
					'icon'  => 'dashicons-phone',
				],
				'social'  => [
					'label' => __( 'Social', 'flux' ),
					'icon'  => 'dashicons-facebook-alt',
				],
			],
		];

		return $settings_pages;
	}

	public function register_fields( array $meta_boxes ): array {
		$meta_boxes[] = $this->contact();
		$meta_boxes[] = $this->social();

		return $meta_boxes;
	}

	private function contact(): array {
		return [
			'title'          => __( 'Contact', 'flux' ),
			'id'             => 'settings-contact',
			'settings_pages' => 'website-settings',
			'tab'            => 'contact',
			'fields'         => [
				[
					'id'   => 'phone',
					'name' => __( 'Phone', 'flux' ),
				],
				[
					'id'   => 'email',
					'name' => __( 'Email', 'flux' ),
				],
				[
					'id'   => 'address',
					'name' => __( 'Address', 'flux' ),
				],
			],
		];
	}

	private function social(): array {
		return [
			'title'          => __( 'Social', 'flux' ),
			'id'             => 'settings-social',
			'settings_pages' => 'website-settings',
			'tab'            => 'social',
			'fields'         => [
				[
					'id'   => 'facebook',
					'name' => __( 'Facebook', 'flux' ),
				],
				[
					'id'   => 'twitter',
					'name' => __( 'Twitter', 'flux' ),
				],
				[
					'id'   => 'youtube',
					'name' => __( 'Youtube', 'flux' ),
				],
				[
					'id'   => 'instagram',
					'name' => __( 'Instagram', 'flux' ),
				],
				[
					'id'   => 'tiktok',
					'name' => __( 'Tiktok', 'flux' ),
				],
			],
		];
	}
}
