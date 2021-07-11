<?php

namespace ZionFfStyler;

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

class RegisterElements {
	function __construct() {
		add_filter( 'zionbuilder/elements/categories', [ $this, 'add_elements_categories' ] );
		add_action( 'zionbuilder/elements_manager/register_elements', [ $this, 'register_elements' ] );
	}

	function add_elements_categories( $categories ) {
		$zuwoo_categories = [
			[
				'id'   => 'zionffstyler',
				'name' => __( 'FF Styler', 'zionffstyler' ),
			],
		];

		return array_merge( $categories, $zuwoo_categories );
	}

	function register_elements( $elements_manager ) {
		/**
		 * The list of all the plugin's default elements
		 */
		$default_elements = [
			'FluentForm\FluentForm',
		];

		foreach ( $default_elements as $element_name ) {
			// Normalize class name
			$class_name = str_replace( '-', '_', $element_name );
			$class_name = __NAMESPACE__ . '\\Elements\\' . $class_name;
			$elements_manager->register_element( new $class_name() );
		}
	}
}