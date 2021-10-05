<?php

namespace ZionFfStyler;

use ZionBuilder\Elements\Element;
use ZionBuilder\Options\BaseSchema;

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

class UltimateElements extends Element {
	function get_label_text() {
		return 'ZionFfStyler';
	}

	function get_label_color() {
		return '#efefef';
	}

	function zff_elements_category() {
		return 'zionffstyler';
	}

	function getFluentForms() {
		$options = [
			[
				'id' => -1,
				'name' => esc_html__('Select a form', 'zionffstyler')
			]
		];

		if ( function_exists( 'wpFluentForm' ) ) {
			global $wpdb;
			$result = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}fluentform_forms" );
			if ( $result ) {
				$i = 1;
				foreach ( $result as $form ) {
					$options[$i]['id'] = $form->id;
					$options[$i]['name'] = esc_html__( $form->title );
					
					$i++;
				}
			} else {
				$options[0]['id'] = -1;
				$options[0]['name'] = esc_html__( 'No forms found!', 'zionffstyler' );
			}
		}

		return $options;
	}

	function attach_padding_options( $options, $prefix, $selector, $exclude_options = array() ) {
		if( ! in_array( 'pad_top', $exclude_options )) {
			$options->add_option(
				$prefix . '_pad_top',
				[
					'type' 		=> 'number_unit',
					//'title'     => __( 'Top', 'zionffstyler' ),
					'label-position' => 'left',
					'label-icon' => 'padding-top',
					'label-title' 	=> esc_html__( 'Padding Top', 'zionbuilder' ),
					'width' 	=> 50,
					'units' 	=> BaseSchema::get_units(),
					'css_style' => [
						[
							'selector' => $selector,
							'value'    => 'padding-top: {{VALUE}}',
						],
					],
				]
			);
		}

		if( ! in_array( 'pad_right', $exclude_options )) {
			$options->add_option(
				$prefix . '_pad_right',
				[
					'type' 		=> 'number_unit',
					//'title'     => __( 'Right', 'zionffstyler' ),
					'label-position' => 'right',
					'label-icon' => 'padding-right',
					'label-title' 	=> esc_html__( 'Padding Right', 'zionbuilder' ),
					'width' 	=> 50,
					'units' 	=> BaseSchema::get_units(),
					'css_style' => [
						[
							'selector' => $selector,
							'value'    => 'padding-right: {{VALUE}}',
						],
					],
				]
			);
		}

		if( ! in_array( 'pad_bottom', $exclude_options )) {
			$options->add_option(
				$prefix . '_pad_bottom',
				[
					'type' 		=> 'number_unit',
					//'title'     => __( 'Bottom', 'zionffstyler' ),
					'label-position' => 'left',
					'label-icon' => 'padding-bottom',
					'label-title' 	=> esc_html__( 'Padding Bottom', 'zionbuilder' ),
					'width' 	=> 50,
					'units' 	=> BaseSchema::get_units(),
					'css_style' => [
						[
							'selector' => $selector,
							'value'    => 'padding-bottom: {{VALUE}}',
						],
					],
				]
			);
		}

		if( ! in_array( 'pad_left', $exclude_options )) {
			$options->add_option(
				$prefix . '_pad_left',
				[
					'type' 		=> 'number_unit',
					//'title'     => __( 'Left', 'zionffstyler' ),
					'label-position' => 'right',
					'label-icon' => 'padding-left',
					'label-title' 	=> esc_html__( 'Padding Left', 'zionbuilder' ),
					'width' 	=> 50,
					'units' 	=> BaseSchema::get_units(),
					'css_style' => [
						[
							'selector' => $selector,
							'value'    => 'padding-left: {{VALUE}}',
						],
					],
				]
			);
		}
	}

	function attach_margin_options( $options, $prefix, $selector, $exclude_options = array() ) {
		if( ! in_array( 'mrg_top', $exclude_options )) {
			$options->add_option(
				$prefix . '_pad_top',
				[
					'type' 		=> 'number_unit',
					//'title'     => __( 'Top', 'zionffstyler' ),
					'label-position' => 'left',
					'label-icon' => 'margin-top',
					'label-title' 	=> esc_html__( 'Margin Top', 'zionbuilder' ),
					'width' 	=> 50,
					'units' 	=> BaseSchema::get_units(),
					'css_style' => [
						[
							'selector' => $selector,
							'value'    => 'margin-top: {{VALUE}}',
						],
					],
				]
			);
		}

		if( ! in_array( 'mrg_right', $exclude_options )) {
			$options->add_option(
				$prefix . '_pad_right',
				[
					'type' 		=> 'number_unit',
					//'title'     => __( 'Right', 'zionffstyler' ),
					'label-position' => 'right',
					'label-icon' => 'margin-right',
					'label-title' 	=> esc_html__( 'Margin Right', 'zionbuilder' ),
					'width' 	=> 50,
					'units' 	=> BaseSchema::get_units(),
					'css_style' => [
						[
							'selector' => $selector,
							'value'    => 'margin-right: {{VALUE}}',
						],
					],
				]
			);
		}

		if( ! in_array( 'mrg_bottom', $exclude_options )) {
			$options->add_option(
				$prefix . '_pad_bottom',
				[
					'type' 		=> 'number_unit',
					//'title'     => __( 'Bottom', 'zionffstyler' ),
					'label-position' => 'left',
					'label-icon' => 'margin-bottom',
					'label-title' 	=> esc_html__( 'Margin Bottom', 'zionbuilder' ),
					'width' 	=> 50,
					'units' 	=> BaseSchema::get_units(),
					'css_style' => [
						[
							'selector' => $selector,
							'value'    => 'margin-bottom: {{VALUE}}',
						],
					],
				]
			);
		}

		if( ! in_array( 'mrg_left', $exclude_options )) {
			$options->add_option(
				$prefix . '_pad_left',
				[
					'type' 		=> 'number_unit',
					//'title'     => __( 'Left', 'zionffstyler' ),
					'label-position' => 'right',
					'label-icon' => 'margin-left',
					'label-title' 	=> esc_html__( 'Margin Left', 'zionbuilder' ),
					'width' 	=> 50,
					'units' 	=> BaseSchema::get_units(),
					'css_style' => [
						[
							'selector' => $selector,
							'value'    => 'margin-left: {{VALUE}}',
						],
					],
				]
			);
		}
	}


	function attach_typography_options( $options, $prefix, $selector, $exclude_options = array() ) {
		if( ! in_array( 'text_align', $exclude_options )) {
			$options->add_option(
				$prefix . '_text-align',
				[
					'type' 			=> 'text_align',
					'title' 		=> esc_html__( 'Align', 'zionbuilder' ),
					'description' 	=> esc_html__( 'Select the desired text align.', 'zionbuilder' ),
					'css_style' 	=> [
						[
							'selector' 	=> $selector,
							'value' 	=> 'text-align: {{VALUE}}'
						],
					]
				]
			);
		}

		if( ! in_array( 'font_family', $exclude_options )) {
			$options->add_option(
				$prefix . '_font-family',
				[
					'title' 		=> esc_html__( 'Font Family', 'zionbuilder' ),
					'type'			=> 'select',
					'data_source'	=> 'fonts',
					'width' 		=> 50,
					'style_type' 	=> 'font-select',
					'css_style' 	=> [
						[
							'selector' 	=> $selector,
							'value' 	=> 'font-family: {{VALUE}}'
						],
					]
				]
			);
		}

		if( ! in_array( 'font_weight', $exclude_options )) {
			$options->add_option(
				$prefix . '_font-weight',
				[
					'title' 		=> esc_html__( 'Font Weight', 'zionbuilder' ),
					'description' 	=> esc_html__( 'Font weight allows you to set the text thickness.', 'zionbuilder' ),
					'type' 			=> 'select',
					'default' 		=> '400',
					'width' 		=> 50,
					'options' 		=> [
						[
							'id'   => '100',
							'name' => '100',
						],
						[
							'id'   => '200',
							'name' => '200',
						],
						[
							'id'   => '300',
							'name' => '300',
						],
						[
							'id'   => '400',
							'name' => '400',
						],
						[
							'id'   => '500',
							'name' => '500',
						],
						[
							'id'   => '600',
							'name' => '600',
						],
						[
							'id'   => '700',
							'name' => '700',
						],
						[
							'id'   => '800',
							'name' => '800',
						],
						[
							'id'   => '900',
							'name' => '900',
						],
						[
							'id'   => 'bolder',
							'name' => esc_html__( 'Bolder', 'zionbuilder' ),
						],
						[
							'id'   => 'lighter',
							'name' => esc_html__( 'Lighter', 'zionbuilder' ),
						],
						[
							'id'   => 'inherit',
							'name' => esc_html__( 'Inherit', 'zionbuilder' ),
						],
						[
							'id'   => 'initial',
							'name' => esc_html__( 'Initial', 'zionbuilder' ),
						],
						[
							'id'   => 'unset',
							'name' => esc_html__( 'Unset', 'zionbuilder' ),
						],
					],
					'css_style' 	=> [
						[
							'selector' 	=> $selector,
							'value' 	=> 'font-weight: {{VALUE}}'
						],
					]
				]
			);
		}

		if( ! in_array( 'font_color', $exclude_options )) {
			$options->add_option(
				$prefix . '_color',
				[
					'title' => esc_html__( 'Font Color', 'zionbuilder' ),
					'type'  => 'colorpicker',
					'width' => 50,
					'css_style' 	=> [
						[
							'selector' 	=> $selector,
							'value' 	=> 'color: {{VALUE}}'
						],
					]
				]
			);
		}

		if( ! in_array( 'font_size', $exclude_options )) {
			$options->add_option(
				$prefix . '_font-size',
				[
					'title'       => esc_html__( 'Font size', 'zionbuilder' ),
					'description' => esc_html__( 'The font size option sets the size of the font in various units', 'zionbuilder' ),
					'type'        => 'number_unit',
					'width'       => 50,
					'min'         => 0,
					'units'       => BaseSchema::get_units(),
					'css_style' 	=> [
						[
							'selector' 	=> $selector,
							'value' 	=> 'font-size: {{VALUE}}'
						],
					]
				]
			);
		}
		
		if( ! in_array( 'line_height', $exclude_options )) {
			$options->add_option(
				$prefix . '_line-height',
				[
					'type'        => 'number_unit',
					'title'       => esc_html__( 'Line height', 'zionbuilder' ),
					'description' => esc_html__( 'Line height sets the distance between lines of text.', 'zionbuilder' ),
					'width'       => 50,
					'min'         => 0,
					'units'       => BaseSchema::get_units(),
					'css_style' 	=> [
						[
							'selector' 	=> $selector,
							'value' 	=> 'line-height: {{VALUE}}'
						],
					]
				]
			);
		}

		if( ! in_array( 'letter_spacing', $exclude_options )) {
			$options->add_option(
				$prefix . '_letter-spacing',
				[
					'type'        => 'number_unit',
					'title'       => esc_html__( 'Letter Spacing', 'zionbuilder' ),
					'description' => esc_html__( 'Letter spacings sets the width between letters.', 'zionbuilder' ),
					'width'       => 50,
					'units'       => BaseSchema::get_units(),
					'css_style' 	=> [
						[
							'selector' 	=> $selector,
							'value' 	=> 'letter-spacing: {{VALUE}}'
						],
					]
				]
			);
		}

		if( ! in_array( 'text_decoration', $exclude_options )) {
			$options->add_option(
				$prefix . '_text-decoration',
				[
					'type'          => 'checkbox_group',
					'title'      	=> esc_html__( 'Text Decoration', 'zionbuilder' ),
					'direction'     => 'horizontal',
					'display-style' => 'buttons',
					'width'         => 50,
					'columns'       => 3,
					'options'       => [
						[
							'icon' => 'italic',
							'id'   => 'italic',
						],
						[
							'icon' => 'underline',
							'id'   => 'underline',
						],
						[
							'icon' => 'strikethrough',
							'id'   => 'line-through',
						],
					],
					'css_style' 	=> [
						[
							'selector' 	=> $selector,
							'value' 	=> 'text-decoration: {{VALUE}}'
						],
					]
				]
			);
		}

		if( ! in_array( 'text_transform', $exclude_options )) {
			$options->add_option(
				$prefix . '_text-transform',
				[
					'type'    => 'custom_selector',
					'title'      	=> esc_html__( 'Text Transform', 'zionbuilder' ),
					'columns' => 3,
					'width'   => 50,
					'options' => [
						[
							'id'   => 'uppercase',
							'icon' => 'uppercase',
							'name' => esc_html__( 'uppercase', 'zionbuilder' ),
						],
						[
							'id'   => 'lowercase',
							'icon' => 'lowercase',
							'name' => esc_html__( 'lowercase', 'zionbuilder' ),
						],
						[
							'id'   => 'capitalize',
							'icon' => 'capitalize',
							'name' => esc_html__( 'capitalize', 'zionbuilder' ),
						],
					],
					'css_style' 	=> [
						[
							'selector' 	=> $selector,
							'value' 	=> 'text-transform: {{VALUE}}'
						],
					]
				]
			);
		}
	}
}
