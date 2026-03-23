<?php
namespace Flux;

class PostType {
	public function __construct() {
		add_action( 'init', [ $this, 'register_post_type' ] );
	}

	public function register_post_type() {

	}
}
