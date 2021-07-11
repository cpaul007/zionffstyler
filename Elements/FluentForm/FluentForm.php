<?php

namespace ZionFfStyler\Elements\FluentForm;

use ZionFfStyler\UltimateElements;
use ZionBuilder\Options\BaseSchema;
use ZionBuilder\Options\Schemas\StyleOptions;

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Class FluentForm
 *
 * @package ZionFfStyler\Elements
 */
class FluentForm extends UltimateElements {
	
	public function get_type() {
		return 'zff_ff_styler';
	}

	public function get_name() {
		return __( 'Fluent Form Styler', 'zionffstyler' );
	}

	public function get_keywords() {
		return [ 'ff', 'fluent', 'form', 'fluentform', 'styler' ];
	}

	public function get_element_icon() {
		return 'element-form';
	}

	public function get_label() {
		return [
			'text'  => $this->get_label_text(),
			'color' => $this->get_label_color(),
		];
	}

	public function get_category() {
		return $this->zff_elements_category();
	}

	public function options( $options ) {
		$options->add_option(
			'ff_form',
			[
				'type' 			=> 'select',
				'default' 		=> -1,
				'title' 		=> __( 'Fluent Form', 'zionffstyler' ),
				'description' 	=> __( "Make sure that you build atleast one fluent form.", 'zionffstyler' ),
				'options' 		=> $this->getFluentForms()
			]
		);

		$options->add_option(
			'ff_el_gap',
			[
				'type' 			=> 'number_unit',
				'min' 			=> 0,
				'units' 		=> BaseSchema::get_units(),
				'title' 		=> __( 'Horizontal Gap', 'zionffstyler' ),
				'label-position' => 'left',
				'label-icon' 	=> 'horizontal',
				'label-title' 	=> esc_html__( 'Horizontal distance', 'zionbuilder' ),
				'width' 		=> 50,
				'responsive_options' => true,
				'css_style' 	=> [
					[
						'selector' => '{{ELEMENT}} .frm-fluent-form .ff-t-cell',
						'value'    => 'padding-left: {{VALUE}}',
					],
					[
						'selector' => '{{ELEMENT}} .frm-fluent-form .ff-t-cell',
						'value'    => 'padding-right: {{VALUE}}',
					],
				],
			]
		);

		$options->add_option(
			'ff_el_group',
			[
				'type' 			=> 'number_unit',
				'units' 		=> BaseSchema::get_units(),
				'title' 		=> __( 'Vertical Gap', 'zionffstyler' ),
				'label-position' => 'right',
				'label-icon' 	=> 'vertical',
				'label-title' 	=> esc_html__( 'Vertical distance', 'zionbuilder' ),
				'width' 		=> 50,
				'responsive_options' => true,
				'css_style' 	=> [
					[
						'selector' => '{{ELEMENT}} .fluentform .ff-el-group',
						'value'    => 'margin-bottom: {{VALUE}}',
					],
				],
			]
		);

		$options->add_option(
			'ff_textarea',
			[
				'type' 			=> 'number_unit',
				'units' 		=> BaseSchema::get_units(),
				'title' 		=> __( 'Textarea Height', 'zionffstyler' ),
				'responsive_options' => true,
				'css_style' 	=> [
					[
						'selector' => '{{ELEMENT}} textarea.ff-el-form-control',
						'value'    => 'height: {{VALUE}}',
					],
				],
			]
		);

		/*****************************
		 * Asterisk
		 *****************************/
		$asterisk = $options->add_group(
			'label_ast',
			[
				'type' 	=> 'accordion_menu',
				'title' => esc_html__('Asterisk', 'zionffstyler')
			]
		);

		$asterisk->add_option(
			'ast_color',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Color', 'zionbuilder' ),
				'layout' 	=> 'inline',
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .fluentform .ff-el-input--label.ff-el-is-required.asterisk-left label:before',
						'value'    => 'color: {{VALUE}}',
					],
					[
						'selector' => '{{ELEMENT}} .fluentform .ff-el-input--label.ff-el-is-required.asterisk-right label:after',
						'value'    => 'color: {{VALUE}}',
					],
				],
			]
		);

		$asterisk->add_option(
			'ast_gap',
			[
				'type' 		=> 'number_unit',
				'title'     => __( 'Gap Left', 'zionffstyler' ),
				'description' => __( 'Set the value when asterisk is placed at right side of label.', 'zionffstyler' ),
				'width' 	=> 50,
				'min' 		=> 0,
				'units' 	=> BaseSchema::get_units(),
				'responsive_options' => true,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .ff-el-input--label.ff-el-is-required.asterisk-right label:after',
						'value'    => 'margin-left: {{VALUE}}',
					],
				],
			]
		);

		$asterisk->add_option(
			'ast_gap_right',
			[
				'type' 		=> 'number_unit',
				'title'     => __( 'Gap Right', 'zionffstyler' ),
				'description' => __( 'Set the value when asterisk is placed at left side of label.', 'zionffstyler' ),
				'width' 	=> 50,
				'min' 		=> 0,
				'units' 	=> BaseSchema::get_units(),
				'responsive_options' => true,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .ff-el-input--label.ff-el-is-required.asterisk-left label:before',
						'value'    => 'margin-right: {{VALUE}}',
					],
				],
			]
		);

		$asterisk->add_option(
			'ast_size',
			[
				'type' 		=> 'number_unit',
				'title'     => __( 'Size', 'zionffstyler' ),
				'width' 	=> 50,
				'units' 	=> BaseSchema::get_units(),
				'responsive_options' => true,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .ff-el-input--label.ff-el-is-required.asterisk-left label:before',
						'value'    => 'font-size: {{VALUE}}',
					],
					[
						'selector' => '{{ELEMENT}} .ff-el-input--label.ff-el-is-required.asterisk-right label:after',
						'value'    => 'font-size: {{VALUE}}',
					]
				],
			]
		);


		/*****************************
		 * Checkboxes & Radios
		 *****************************/
		$cb = $options->add_group(
			'fl_el_cr',
			[
				'type' 	=> 'accordion_menu',
				'title' => esc_html__('Radio & Checkboxes', 'zionffstyler')
			]
		);

		$cb_selector = '{{ELEMENT}} .ff-el-group input[type=checkbox]:after';
		$rd_selector = '{{ELEMENT}} .ff-el-group input[type=radio]:after';
		$cb_checked_selector = '{{ELEMENT}} .fluentform .ff-el-group input[type=checkbox]:checked:after';
		$rd_checked_selector = '{{ELEMENT}} .fluentform .ff-el-group input[type=radio]:checked:after';

		$cb->add_option(
			'cb_smart_ui',
			[
				'type' 		=> 'checkbox_switch',
				'title' 	=> __('Enable Smart UI', 'zionffstyler'),
				'default' 	=> false,
				'layout' 	=> 'inline'
			]
		);

		$cb->add_option(
			'cb_size',
			[
				'type' 		=> 'slider',
				'title' 	=> __( 'Size' ),
				'content' 	=> 'px',
				'default' 	=> 15,
				'min' 		=> 15,
				'max' 		=> 30,
				'step' 		=> 1,
				'css_style' => [
					[
						'selector' => $cb_selector,
						'value'    => 'width: {{VALUE}}px',
					],
					[
						'selector' => $cb_selector,
						'value'    => 'height: {{VALUE}}px',
					],
					[
						'selector' => $rd_selector,
						'value'    => 'width: {{VALUE}}px',
					],
					[
						'selector' => $rd_selector,
						'value'    => 'height: {{VALUE}}px',
					]
				],
				'dependency' 	=> [
					[
						'option' 	=> 'cb_smart_ui',
						'value' 	=> [ true ]
					]
				]
			]
		);

		$cb->add_option(
			'cb_brd_wd',
			[
				'type' 		=> 'number_unit',
				'title' 	=> __( 'Border Width' ),
				'default' 	=> '1px',
				'min' 		=> 0,
				'units' 	=> BaseSchema::get_units(),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $cb_selector,
						'value'    => 'border-width: {{VALUE}}',
					],
					[
						'selector' => $rd_selector,
						'value'    => 'border-width: {{VALUE}}',
					]
				],
				'dependency' 	=> [
					[
						'option' 	=> 'cb_smart_ui',
						'value' 	=> [ true ]
					]
				]
			]
		);

		$cb->add_option(
			'cb_brd_rd',
			[
				'type' 		=> 'number_unit',
				'title' 	=> __( 'Border Radius' ),
				'description' => __('This is for checkbox only.', 'zionffstyler'),
				'min' 		=> 0,
				'units' 	=> BaseSchema::get_units(),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $cb_selector,
						'value'    => 'border-width: {{VALUE}}',
					]
				],
				'dependency' 	=> [
					[
						'option' 	=> 'cb_smart_ui',
						'value' 	=> [ true ]
					]
				]
			]
		);

		$cb->add_option(
			'cb_brd_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Border Color' ),
				'css_style' => [
					[
						'selector' => $cb_selector,
						'value'    => 'border-color: {{VALUE}}',
					],
					[
						'selector' => $rd_selector,
						'value'    => 'border-color: {{VALUE}}',
					]
				],
				'dependency' 	=> [
					[
						'option' 	=> 'cb_smart_ui',
						'value' 	=> [ true ]
					]
				]
			]
		);

		$cb->add_option(
			'cb_bg_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Background Color' ),
				'css_style' => [
					[
						'selector' => $cb_selector,
						'value'    => 'background-color: {{VALUE}}',
					],
					[
						'selector' => $rd_selector,
						'value'    => 'background-color: {{VALUE}}',
					]
				],
				'dependency' 	=> [
					[
						'option' 	=> 'cb_smart_ui',
						'value' 	=> [ true ]
					]
				]
			]
		);

		$cb->add_option(
			'cb_chbrd_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Checked Border Color' ),
				'css_style' => [
					[
						'selector' => $cb_checked_selector,
						'value'    => 'border-color: {{VALUE}}',
					],
					[
						'selector' => $rd_checked_selector,
						'value'    => 'border-color: {{VALUE}}',
					]
				],
				'dependency' 	=> [
					[
						'option' 	=> 'cb_smart_ui',
						'value' 	=> [ true ]
					]
				]
			]
		);

		$cb->add_option(
			'cb_chbg_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Checked Background Color' ),
				'css_style' => [
					[
						'selector' => $cb_checked_selector,
						'value'    => 'background-color: {{VALUE}}',
					],
					[
						'selector' => $rd_checked_selector,
						'value'    => 'background-color: {{VALUE}}',
					]
				],
				'dependency' 	=> [
					[
						'option' 	=> 'cb_smart_ui',
						'value' 	=> [ true ]
					]
				]
			]
		);

		$cb->add_option(
			'cb_bt_size',
			[
				'type' 		=> 'slider',
				'title' 	=> __( 'White Check Mark Size', 'zionffstyler' ),
				'content' 	=> 'px',
				'default' 	=> 9,
				'min' 		=> 9,
				'max' 		=> 30,
				'step' 		=> 1,
				'css_style' => [
					[
						'selector' => $cb_selector,
						'value'    => 'background-size: {{VALUE}}px',
					]
				],
				'dependency' 	=> [
					[
						'option' 	=> 'cb_smart_ui',
						'value' 	=> [ true ]
					]
				]
			]
		);

		$cb->add_option(
			'cb_bt_size',
			[
				'type' 		=> 'slider',
				'title' 	=> __( 'White Bullet Size (radio button)', 'zionffstyler' ),
				'content' 	=> 'px',
				'default' 	=> 9,
				'min' 		=> 9,
				'max' 		=> 30,
				'step' 		=> 1,
				'css_style' => [
					[
						'selector' => $rd_selector,
						'value'    => 'background-size: {{VALUE}}px',
					]
				],
				'dependency' 	=> [
					[
						'option' 	=> 'cb_smart_ui',
						'value' 	=> [ true ]
					]
				]
			]
		);

		$cb_mrg = $cb->add_option(
			'cb_mrg',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> __( 'Margin' ),
				'dependency' 	=> [
					[
						'option' 	=> 'cb_smart_ui',
						'value' 	=> [ true ]
					]
				]
			]
		);

		$this->attach_margin_options( $cb_mrg, 'cb_mrg', "{{ELEMENT}} .fluentform .ff-el-form-check-input" );

		/*****************************
		 * Checkable Grid Field
		 *****************************/
		$cg = $options->add_group(
			'ff_el_cg',
			[
				'type' 	=> 'accordion_menu',
				'title' => esc_html__('Checkable Grid')
			]
		);

		$cg->add_option(
			'cg_brd_wd',
			[
				'type' 		=> 'number_unit',
				'title' 	=> __( 'Border Width' ),
				'default' 	=> '1px',
				'min' 		=> 0,
				'units' 	=> BaseSchema::get_units(),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .fluentform .ff-checkable-grids',
						'value'    => 'border-width: {{VALUE}}',
					],
				],
			]
		);

		$cg->add_option(
			'cg_brd_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Border Color' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .fluentform .ff-checkable-grids',
						'value'    => 'border-color: {{VALUE}}',
					],
				],
			]
		);

		$th = $cg->add_group(
			'cg_th',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> __('Table Head', 'zionbuilder')
			]
		);

		$th->add_option(
			'cg_th_bg',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Background', 'zionbuilder' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .fluentform .ff-checkable-grids thead>tr>th',
						'value'    => 'background-color: {{VALUE}}',
					],
				],
			]
		);

		$this->attach_typography_options( 
			$th, 
			'cg_th', 
			'{{ELEMENT}} .fluentform .ff-checkable-grids thead>tr>th',
			['text_align', 'letter_spacing', 'line_height', 'text_decoration']
		);

		$tb = $cg->add_group(
			'cg_tb',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> __('Table Body', 'zionbuilder'),
			]
		);

		$tb->add_option(
			'cg_tb_bg',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Background Color' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .fluentform .ff-checkable-grids tbody>tr>td',
						'value'    => 'background-color: {{VALUE}}',
					],
				],
			]
		);

		$tb->add_option(
			'cg_tb_abg',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Alt Background Color', 'zionffstyler' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .ff-checkable-grids tbody>tr:nth-child(2n)>td',
						'value'    => 'background-color: {{VALUE}}',
					],
				],
			]
		);

		$tb->add_option(
			'cg_tb_txt',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Alt Text Color', 'zionffstyler' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .ff-checkable-grids tbody>tr:nth-child(2n)>td',
						'value'    => 'color: {{VALUE}}',
					],
				],
			]
		);

		$this->attach_typography_options( 
			$tb, 
			'cg_tb', 
			'{{ELEMENT}} .fluentform .ff-checkable-grids tbody>tr>td',
			['text_align', 'letter_spacing', 'line_height', 'text_decoration']
		);



		/*****************************
		 * GDPR / T&C
		 *****************************/
		$gdpr = $options->add_group(
			'ff_el_gtc',
			[
				'type' 	=> 'accordion_menu',
				'title' => esc_html__('GDPR / T&C', 'zionffstyler')
			]
		);

		$gdpr_selector = "{{ELEMENT}} .fluentform .ff-el-tc";
		$gdpr_error_selector = "{{ELEMENT}} .fluentform .ff-el-is-error .ff-el-tc .ff-el-form-check-label";

		$gdpr->add_option(
			'gdpr_bgclr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Background Color', 'zionbuilder' ),
				'css_style' => [
					[
						'selector' => $gdpr_selector,
						'value'    => 'background-color: {{VALUE}}',
					],
				],
			]
		);

		$gdpr->add_option(
			'gdpr_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Color', 'zionbuilder' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $gdpr_selector,
						'value'    => 'color: {{VALUE}}',
					],
				],
			]
		);

		$gdpr->add_option(
			'gdpr_eclr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Error Color', 'zionbuilder' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $gdpr_error_selector,
						'value'    => 'color: {{VALUE}}',
					],
				],
			]
		);

		$gdpr->add_option(
			'gdpr_clr_link',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Link Color', 'zionbuilder' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $gdpr_selector . ' a',
						'value'    => 'color: {{VALUE}}',
					],
				],
			]
		);

		$gdpr->add_option(
			'gdpr_hclr_link',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Link Hover Color', 'zionbuilder' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $gdpr_selector . ' a:hover',
						'value'    => 'color: {{VALUE}}',
					],
				],
			]
		);

		$gdpr->add_option(
			'gdpr_clr_elink',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Error Link Color', 'zionbuilder' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $gdpr_error_selector . ' a',
						'value'    => 'color: {{VALUE}}',
					],
				],
			]
		);

		$gdpr->add_option(
			'gdpr_hclr_elink',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Error Link Hover Color', 'zionbuilder' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $gdpr_error_selector . ' a:hover',
						'value'    => 'color: {{VALUE}}',
					],
				],
			]
		);

		$gdpr_pad = $gdpr->add_group(
			'gdpr_pad',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> __('Padding'),
			]
		);

		$this->attach_padding_options( $gdpr_pad, 'gdpr', $gdpr_selector );

		$gdpr_tg = $gdpr->add_group(
			'gdpr_tg',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> __('Typography', 'zionbuilder'),
			]
		);

		$this->attach_typography_options( $gdpr_tg, 'gdpr', $gdpr_selector );


		/*****************************
		 * Net Promoter Score
		 *****************************/
		$nps_selector = '{{ELEMENT}} .ff_net_table';

		$nps = $options->add_group(
			'ff_el_nps',
			[
				'type' 	=> 'accordion_menu',
				'title' => esc_html__('Net Promoter Score'),
			]
		);

		$nps_lbl = $nps->add_group(
			'nps_lbl',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> __('Label', 'zionbuilder'),
			]
		);

		$this->attach_typography_options( 
			$nps_lbl, 
			'nps_lbl', 
			$nps_selector . ' thead th span',
			['text_align']
		);

		$nps_conf = $nps->add_group(
			'nps_conf',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> __('Number Style', 'zionbuilder')
			]
		);

		$nps_conf->add_option(
			'nps_brd_wd',
			[
				'type' 		=> 'number_unit',
				'title' 	=> __( 'Border Width', 'zionffstyler' ),
				'default' 	=> '1px',
				'min' 		=> 0,
				'units' 	=> BaseSchema::get_units(),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $nps_selector . ' tbody tr td',
						'value'    => 'border-width: {{VALUE}}',
					],
				],
			]
		);

		$nps_conf->add_option(
			'nps_hbrd_wd',
			[
				'type' 		=> 'number_unit',
				'title' 	=> __( 'Hover Border Width', 'zionffstyler' ),
				'min' 		=> 0,
				'units' 	=> BaseSchema::get_units(),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $nps_selector . ' tbody tr td label:hover:after',
						'value'    => 'border-width: {{VALUE}}',
					],
				],
			]
		);

		$nps_conf->add_option(
			'nps_brd_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Border Color', 'zionffstyler' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .ff_net_table tbody tr td:first-of-type',
						'value'    => 'border-color: {{VALUE}}!important',
					],
					[
						'selector' => '{{ELEMENT}} .ff_net_table tbody tr td',
						'value'    => 'border-color: {{VALUE}}!important',
					]
				],
			]
		);

		$nps_conf->add_option(
			'nps_hbrd_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Hover Border Color', 'zionffstyler' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $nps_selector . ' tbody tr td label:hover:after',
						'value'    => 'border-color: {{VALUE}}',
					],
				],
			]
		);

		$nps_conf->add_option(
			'nps_bg',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Background Color' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $nps_selector . ' tbody tr td',
						'value'    => 'background-color: {{VALUE}}',
					],
				],
			]
		);

		$nps_conf->add_option(
			'nps_hbg',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Hover Background Color' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $nps_selector . ' tbody tr td label:hover:after',
						'value'    => 'background-color: {{VALUE}}',
					],
				],
			]
		);

		$nps_conf->add_option(
			'nps_no_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Number Color', 'zionffstyler' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .ff-el-net-label span',
						'value'    => 'color: {{VALUE}}',
					],
				],
			]
		);

		$nps_conf->add_option(
			'nps_no_hclr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Number Hover Color', 'zionffstyler' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .ff-el-net-label:hover span',
						'value'    => 'color: {{VALUE}}',
					],
				],
			]
		);

		$nps_conf->add_option(
			'nps_cb_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Selected BG Color', 'zionffstyler' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $nps_selector . ' tbody tr td input[type=radio]:checked+label',
						'value'    => 'background-color: {{VALUE}}',
					],
				],
			]
		);

		$nps_conf->add_option(
			'nps_cno_hclr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Selected No. Color', 'zionffstyler' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $nps_selector . ' tbody tr td input[type=radio]:checked+label *',
						'value'    => 'color: {{VALUE}}',
					],
				],
			]
		);


		/*****************************
		 * Payment Summary
		 *****************************/
		$payment = $options->add_group(
			'ff_el_payment',
			[
				'type' 	=> 'accordion_menu',
				'title' => esc_html__('Payment Summary')
			]
		);

		$pthead = $payment->add_group(
			'ff_el_pthead',
			[
				'type' 	=> 'panel_accordion',
				'title' => esc_html__('Table Head')
			]
		);

		$pthead->add_option(
			'ff_el_pthead_bg',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Background Color', 'zionffstyler' ),
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .ff_dynamic_payment_summary .ffp_table thead tr',
						'value'    => 'background-color: {{VALUE}}',
					],
				],
			]
		);

		$pthead->add_option(
			'ff_el_pthead_brdc',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Border Color', 'zionffstyler' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} table.input_items_table thead tr th',
						'value'    => 'border-color: {{VALUE}}',
					],
				],
			]
		);

		$pthead->add_option(
			'ff_el_pthead_brdw',
			[
				'type' 		=> 'number_unit',
				'title' 	=> __( 'Border Width', 'zionffstyler' ),
				'width' 	=> 50,
				'min' 		=> 0,
				'units' 	=> BaseSchema::get_units(),
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} table.input_items_table thead tr th',
						'value'    => 'border-width: {{VALUE}}',
					],
				],
			]
		);

		$this->attach_typography_options($pthead, 'theadtg', '{{ELEMENT}} .ff_dynamic_payment_summary thead th');


		$ptfooter = $payment->add_group(
			'ff_el_ptfooter',
			[
				'type' 	=> 'panel_accordion',
				'title' => esc_html__('Table Footer')
			]
		);

		$ptfooter->add_option(
			'ff_el_ptfooter_bg',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Background Color', 'zionffstyler' ),
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .ff_dynamic_payment_summary .ffp_table tfoot tr',
						'value'    => 'background-color: {{VALUE}}',
					],
				],
			]
		);

		$ptfooter->add_option(
			'ff_el_ptfooter_brdc',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Border Color', 'zionffstyler' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} table.input_items_table tfoot tr th',
						'value'    => 'border-color: {{VALUE}}',
					],
				],
			]
		);

		$ptfooter->add_option(
			'ff_el_ptfooter_brdw',
			[
				'type' 		=> 'number_unit',
				'title' 	=> __( 'Border Width', 'zionffstyler' ),
				'width' 	=> 50,
				'min' 		=> 0,
				'units' 	=> BaseSchema::get_units(),
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} table.input_items_table tfoot tr th',
						'value'    => 'border-width: {{VALUE}}',
					],
				],
			]
		);


		$total_txt = $payment->add_group(
			'ff_el_total_txt',
			[
				'type' 	=> 'panel_accordion',
				'title' => esc_html__('Total Text')
			]
		);

		$this->attach_typography_options( $total_txt, 'ps_ttl_txt', '{{ELEMENT}} .ff_dynamic_payment_summary tfoot th', ['text_decoration', 'line_height'] );

		$total_price = $payment->add_group(
			'ff_el_total_price',
			[
				'type' 	=> 'panel_accordion',
				'title' => esc_html__('Price')
			]
		);

		$this->attach_typography_options( $total_price, 'ps_ttl_price', '{{ELEMENT}} .ff_dynamic_payment_summary tfoot th', ['text_decoration', 'text_transform', 'line_height'] );

		//.ff_dynamic_payment_summary .ffp_table

		/*****************************
		 * Progress Bar
		 *****************************/
		$form_step = $options->add_group(
			'ff_el_pb',
			[
				'type' 	=> 'accordion_menu',
				'title' => esc_html__('Form Step')
			]
		);

		$fs_tab = $form_step->add_option(
			'fs_tab',
			[
				'type' => 'tabs',
			]
		);

		$pb = $fs_tab->add_option(
			'pb_tab',
			[
				'type'  => 'tab',
				'title' => esc_html__( 'Progress Bar' ),
			]
		);

		$pb->add_option(
			'bar_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Bar Color', 'zionffstyler' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .fluentform .ff-el-progress',
						'value'    => 'background-color: {{VALUE}}',
					],
				],
			]
		);

		$pb->add_option(
			'bar_actv_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Bar Active Color', 'zionffstyler' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .fluentform .ff-el-progress-bar',
						'value'    => 'background-color: {{VALUE}}',
					],
				],
			]
		);

		$pb->add_option(
			'bar_size',
			[
				'type' 			=> 'number_unit',
				'title' 		=> __( 'Bar Height' ),
				'units' 		=> BaseSchema::get_units(),
				'responsive_options' => true,
				'css_style' 	=> [
					[
						'selector' => '{{ELEMENT}} .fluentform .ff-el-progress',
						'value'    => 'height: {{VALUE}}',
					],
				],
			]
		);

		$bar_score = $pb->add_group(
			'bar_score',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> esc_html__('Bar Score'),
			]
		);
		
		$bs_selector = '{{ELEMENT}} .fluentform .ff-el-progress span';

		$this->attach_typography_options( 
			$bar_score, 
			'bar_score', 
			$bs_selector, 
			['text_align', 'line_height', 'letter_spacing', 'text_transform', 'text_decoration'] 
		);

		$bar_score->add_option(
			'bs_pos_top',
			[
				'type' 			=> 'number_unit',
				'title' 		=> __( 'Position Top' ),
				'units' 		=> BaseSchema::get_units(),
				'width' 		=> 50,
				'responsive_options' => true,
				'css_style' 	=> [
					[
						'selector' => $bs_selector,
						'value'    => 'top: {{VALUE}}',
					],
				],
			]
		);

		$bar_score->add_option(
			'bs_pos_left',
			[
				'type' 			=> 'number_unit',
				'title' 		=> __( 'Position Left' ),
				'units' 		=> BaseSchema::get_units(),
				'width' 		=> 50,
				'responsive_options' => true,
				'css_style' 	=> [
					[
						'selector' => $bs_selector,
						'value'    => 'left: {{VALUE}}',
					],
				],
			]
		);

		$pb_lbl = $pb->add_group(
			'pb_lbl',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> esc_html__('Top Text', 'zionffstyler'),
			]
		);

		$this->attach_typography_options( $pb_lbl, 'pb_lbl', '{{ELEMENT}} .ff-el-progress-status' );

		$pb->add_option(
			'pb_lbl_gap',
			[
				'type' 			=> 'number_unit',
				'units' 		=> BaseSchema::get_units(),
				'title' 		=> __( 'Margin Bottom', 'zionffstyler' ),
				'min' 			=> 5,
				'responsive_options' => true,
				'css_style' 	=> [
					[
						'selector' => '{{ELEMENT}} .ff-el-progress-status',
						'value'    => 'margin-bottom: {{VALUE}}',
					]
				],
			]
		);

		$steps = $fs_tab->add_option(
			'steps_tab',
			[
				'type'  => 'tab',
				'title' => esc_html__( 'Steps' ),
			]
		);

		$box = $steps->add_option(
			'box',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> esc_html__('Square Box', 'zionffstyler' )
			]
		);

		$box->add_option(
			'box_w',
			[
				'type' 			=> 'number_unit',
				'title' 		=> __( 'Size' ),
				'units' 		=> BaseSchema::get_units(),
				'responsive_options' => true,
				'css_style' 	=> [
					[
						'selector' => '{{ELEMENT}} .fluentform .ff-step-titles li:before',
						'value'    => 'width: {{VALUE}}',
					],
					[
						'selector' => '{{ELEMENT}} .fluentform .ff-step-titles li:before',
						'value'    => 'height: {{VALUE}}',
					],
				],
			]
		);

		$box_brd = $box->add_option(
			'box_brd',
			[
				'title'          => esc_html__( 'Border', 'zionffstyler' ),
				'type'           => 'group',
				'options-layout' => 'inline',
			]
		);

		$box_brd->add_option(
			'box_brd_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Color' ),
				'css_style' => [
					[
						'selector' => "{{ELEMENT}} .fluentform .ff-step-titles li:not(.ff_active):before",
						'value'    => 'border-color: {{VALUE}}',
					],
				],
			]
		);

		$box_brd->add_option(
			'box_brd_w',
			[
				'type' 			=> 'number_unit',
				'title' 		=> __( 'Width' ),
				'min' 			=> 0,
				'units' 		=> BaseSchema::get_units(),
				'css_style' 	=> [
					[
						'selector' => '{{ELEMENT}} .fluentform .ff-step-titles li:before',
						'value'    => 'border-width: {{VALUE}}',
					],
				],
			]
		);

		$box_brd->add_option(
			'box_brd_radius',
			[
				'type' 			=> 'number_unit',
				'title' 		=> __( 'Radius' ),
				'min' 			=> 0,
				'units' 		=> BaseSchema::get_units(),
				'css_style' 	=> [
					[
						'selector' => '{{ELEMENT}} .fluentform .ff-step-titles li:before',
						'value'    => 'border-radius: {{VALUE}}',
					],
				],
			]
		);

		$box->add_option(
			'box_bg',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Background Color', 'zionffstyler' ),
				'css_style' => [
					[
						'selector' => "{{ELEMENT}} .fluentform .ff-step-titles li:not(.ff_active):before",
						'value'    => 'background-color: {{VALUE}}',
					],
				],
			]
		);

		$pb_hr = $steps->add_option(
			'pb_hr',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> esc_html__('Horizontal Line', 'zionffstyler' )
			]
		);

		$pb_hr->add_option(
			'hr_height',
			[
				'type' 			=> 'number_unit',
				'title' 		=> __( 'Height' ),
				'min' 			=> 1,
				'units' 		=> BaseSchema::get_units(),
				'responsive_options' => true,
				'css_style' 	=> [
					[
						'selector' => "{{ELEMENT}} .fluentform .ff-step-titles li:after",
						'value'    => 'height: {{VALUE}}',
					],
				],
			]
		);

		$pb_hr->add_option(
			'hr_pos',
			[
				'type' 			=> 'number_unit',
				'title' 		=> __( 'Position' ),
				'min' 			=> 0,
				'units' 		=> BaseSchema::get_units(),
				'responsive_options' => true,
				'css_style' 	=> [
					[
						'selector' => "{{ELEMENT}} .fluentform .ff-step-titles li:after",
						'value'    => 'top: {{VALUE}}',
					],
				],
			]
		);

		$pb_hr->add_option(
			'hr_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Color' ),
				'css_style' => [
					[
						'selector' => "{{ELEMENT}} .fluentform .ff-step-titles li:after",
						'value'    => 'color: {{VALUE}}',
					],
				],
			]
		);

		$num = $steps->add_option(
			'num_sec',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> esc_html__('Number', 'zionffstyler' )
			]
		);

		$this->attach_typography_options( 
			$num, 
			'steps_num', 
			"{{ELEMENT}} .fluentform .ff-step-titles li:before",
			['text_align', 'text_decoration', 'text_transform', 'line_height', 'letter_spacing', 'font_color']
		);

		$num->add_option(
			'num_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Color', 'zionffstyler' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => "{{ELEMENT}} .fluentform .ff-step-titles li:not(.ff_active):before",
						'value'    => 'color: {{VALUE}}',
					]
				],
			]
		);


		$steps_actv = $steps->add_option(
			'steps_actv',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> esc_html__('Active Color', 'zionffstyler' )
			]
		);

		$steps_actv->add_option(
			'box_clr_active',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Box', 'zionffstyler' ),
				'css_style' => [
					[
						'selector' => "{{ELEMENT}} .fluentform .ff-step-titles li.ff_active:before",
						'value'    => 'background-color: {{VALUE}}',
					],
					[
						'selector' => "{{ELEMENT}} .fluentform .ff-step-titles li.ff_active:before",
						'value'    => 'border-color: {{VALUE}}',
					],
					[
						'selector' => "{{ELEMENT}} .fluentform .ff-step-titles li.ff_completed:before",
						'value'    => 'background-color: {{VALUE}}',
					],
					[
						'selector' => "{{ELEMENT}} .fluentform .ff-step-titles li.ff_completed:before",
						'value'    => 'border-color: {{VALUE}}',
					]
				],
			]
		);

		$steps_actv->add_option(
			'hr_active_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Horizontal Line', 'zionffstyler' ),
				'css_style' => [
					[
						'selector' => "{{ELEMENT}} .fluentform .ff-step-titles li.ff_active:after",
						'value'    => 'color: {{VALUE}}',
					],
					[
						'selector' => "{{ELEMENT}} .fluentform .ff-step-titles li.ff_completed:after",
						'value'    => 'color: {{VALUE}}',
					]
				],
			]
		);

		$steps_actv->add_option(
			'num_active_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Number', 'zionffstyler' ),
				'css_style' => [
					[
						'selector' => "{{ELEMENT}} .fluentform .ff-step-titles li.ff_active:before",
						'value'    => 'color: {{VALUE}}',
					],
					[
						'selector' => "{{ELEMENT}} .fluentform .ff-step-titles li.ff_completed:before",
						'value'    => 'color: {{VALUE}}',
					]
				],
			]
		);

		/*****************************
		 * Ratings
		 *****************************/
		$rating = $options->add_group(
			'ff_el_rt',
			[
				'type' 	=> 'accordion_menu',
				'title' => esc_html__('Ratings')
			]
		);

		$rt_selector = "{{ELEMENT}} .fluentform .ff-el-ratings";

		$rating->add_option(
			'rt_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Default Color', 'zionffstyler' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $rt_selector,
						'value'    => '--fill-inactive: {{VALUE}}',
					],
				],
			]
		);

		$rating->add_option(
			'rt_actv_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Active Color', 'zionffstyler' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $rt_selector,
						'value'    => '--fill-active: {{VALUE}}',
					],
				],
			]
		);

		$rating->add_option(
			'rt_star_size',
			[
				'type' 			=> 'number_unit',
				'title' 		=> __( 'Star Size', 'zionffstyler' ),
				'min' 			=> 0,
				'units' 		=> BaseSchema::get_units(),
				'width' 		=> 50,
				'responsive_options' => true,
				'css_style' 	=> [
					[
						'selector' => $rt_selector . ' svg',
						'value'    => 'width: {{VALUE}}',
					],
					[
						'selector' => $rt_selector . ' svg',
						'value'    => 'height: {{VALUE}}',
					],
				],
			]
		);

		$rating->add_option(
			'rt_star_gap',
			[
				'type' 			=> 'number_unit',
				'title' 		=> __( 'Gap', 'zionffstyler' ),
				'description' 	=> __( 'Set the spaces between stars', 'zionffstyler' ),
				'min' 			=> 0,
				'units' 		=> BaseSchema::get_units(),
				'width' 		=> 50,
				'responsive_options' => true,
				'css_style' 	=> [
					[
						'selector' => $rt_selector . ' label',
						'value'    => 'margin-right: {{VALUE}}',
					],
				],
			]
		);

		$rt_text = $rating->add_group(
			'rt_text',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> __('Rating Text', 'zionffstyler')
			]
		);

		$this->attach_typography_options( $rt_text, 'rt_text', "{{ELEMENT}} .ff-el-rating-text", ['text_align', 'text_decoration', 'line_height'] );


		/*****************************
		 * Repeat Field
		 *****************************/
		$rep = $options->add_group(
			'ff_el_rep',
			[
				'type' 	=> 'accordion_menu',
				'title' => esc_html__('Repeat Field')
			]
		);

		$rep->add_option(
			'rep_row_gap',
			[
				'type' 			=> 'number_unit',
				'units' 		=> BaseSchema::get_units(),
				'title' 		=> __( 'Row Gap', 'zionffstyler' ),
				'description' 	=> __( "Set the distance between two rows.", 'zionffstyler' ),
				'width' 		=> 50,
				'min' 			=> 0,
				'responsive_options' => true,
				'css_style' 	=> [
					[
						'selector' => '{{ELEMENT}} table.ff_repeater_table td',
						'value'    => 'padding-bottom: {{VALUE}}',
					],
				],
			]
		);

		$rep->add_option(
			'rep_col_gap',
			[
				'type' 			=> 'number_unit',
				'units' 		=> BaseSchema::get_units(),
				'title' 		=> __( 'Column Gap', 'zionffstyler' ),
				'description' 	=> esc_html__( 'Distance between two fields', 'zionbuilder' ),
				'width' 		=> 50,
				'min' 			=> 0,
				'responsive_options' => true,
				'css_style' 	=> [
					[
						'selector' => '{{ELEMENT}} table.ff_repeater_table td',
						'value'    => 'padding-right: {{VALUE}}',
					],
				],
			]
		);

		$rep_btns = $rep->add_group(
			'ff_el_rep_btns',
			[
				'type' 	=> 'panel_accordion',
				'title' => esc_html__('Plus/Minus Buttons', 'zionffstyler')
			]
		);

		$rep_btns->add_option(
			'rep_btns_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Color' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .repeat_btn svg',
						'value'    => 'color: {{VALUE}}',
					],
				],
			]
		);

		$rep_btns->add_option(
			'rep_btns_hclr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Hover Color' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => '{{ELEMENT}} .ff-el-repeat-buttons-list span:hover svg',
						'value'    => 'color: {{VALUE}}',
					],
				],
			]
		);

		$rep_btns->add_option(
			'rep_btns_size',
			[
				'type' 			=> 'number_unit',
				'title' 		=> __( 'Size' ),
				'units' 		=> BaseSchema::get_units(),
				'responsive_options' => true,
				'css_style' 	=> [
					[
						'selector' => '{{ELEMENT}} .fluentform',
						'value'    => '--repeat-btn-size: {{VALUE}}',
					],
				],
			]
		);


		/*****************************
		 * Section Break
		 *****************************/
		$sb = $options->add_group(
			'ff_el_sb',
			[
				'type' 	=> 'accordion_menu',
				'title' => esc_html__('Section Break')
			]
		);

		$sec_selector = '{{ELEMENT}} .ff-el-section-break';

		$sb->add_option(
			'sb_bg_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Background Color', 'zionffstyler' ),
				'css_style' => [
					[
						'selector' => $sec_selector,
						'value'    => 'background-color: {{VALUE}}',
					],
				],
			]
		);

		$sb->add_option(
			'sb_brd_wd',
			[
				'type' 		=> 'number_unit',
				'title' 	=> __( 'Line Height', 'zionffstyler' ),
				'min' 		=> 0,
				'units' 	=> BaseSchema::get_units(),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $sec_selector . ' hr',
						'value'    => 'border-width: {{VALUE}}',
					],
				],
			]
		);

		$sb->add_option(
			'sb_hr_clr',
			[
				'type' 		=> 'colorpicker',
				'title' 	=> __( 'Line Color', 'zionffstyler' ),
				'width' 	=> 50,
				'css_style' => [
					[
						'selector' => $sec_selector . ' hr',
						'value'    => 'boredr-color: {{VALUE}}',
					],
				],
			]
		);

		$sb_title = $sb->add_group(
			'sb_title',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> __('Title', 'zionbuilder'),
			]
		);

		$this->attach_typography_options( $sb_title, 'sb_title', "{{ELEMENT}} .ff-el-section-title" );

		$sb_desc = $sb->add_group(
			'sb_desc',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> __('Description', 'zionbuilder'),
				'collapsed' => true,
			]
		);

		$this->attach_typography_options( $sb_desc, 'sb_desc', "{{ELEMENT}} .ff-section_break_desk" );

		$sb_pad = $sb->add_group(
			'sb_pad',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> __( 'Padding' ),
				'collapsed' => true,
			]
		);

		$this->attach_padding_options( $sb_pad, 'sb_pad', $sec_selector );

		$sb_mrg = $sb->add_group(
			'sb_mrg',
			[
				'type' 		=> 'panel_accordion',
				'title' 	=> __( 'Margin' ),
				'collapsed' => true,
			]
		);

		$this->attach_margin_options( $sb_mrg, 'sb_mrg', $sec_selector );
	}

	public function enqueue_styles() {
		$this->enqueue_editor_style( ZFF_URL . 'dist/css/elements/FluentForm/fluentform.css' );
		$this->enqueue_element_style( ZFF_URL . 'dist/css/elements/FluentForm/fluentform.css' );
	}

	public function enqueue_scripts() {
		$this->enqueue_editor_script( ZFF_URL . 'dist/js/elements/FluentForm/editor.js' );
	}

	public function before_render( $options ) {
		$cb_smart_ui = $options->get_value('cb_smart_ui', false );

		if( $cb_smart_ui ) {
			$this->render_attributes->add( 'wrapper', 'class', 'zff-ff-cbui' );
		}

		$this->render_attributes->add( 'wrapper', 'class', 'zff-ff-styler' );
	}

	public function render( $options ) {
		$ff_id = $options->get_value('ff_form', false);

		if( ! $ff_id || $ff_id <= 0 ) {
			echo '<h5 class="form-missing">' . __("Select a form", 'zionffstyler') . '</h5>';
			return;
		}

		echo do_shortcode('[fluentform id='. $ff_id .']' );
	}

	/*public function enqueue_scripts() {
		if( Plugin::$instance->editor->preview->is_preview_mode() ) {
			(new Component(wpFluentForm()))->registerScripts();
		}
	}*/

	public function on_register_styles() {
		$this->register_style_options_element(
			'form_label',
			[
				'title'                   => esc_html__( 'Form Label', 'zionffstyler' ),
				'selector'                => '{{ELEMENT}} .fluentform .ff-el-input--label label',
				'allow_custom_attributes' => false,
				'allow_class_assignments' => false,
			]
		);

		$this->register_style_options_element(
			'input_field',
			[
				'title'                   => esc_html__( 'Input fields', 'zionffstyler' ),
				'selector'                => '{{ELEMENT}} .fluentform .ff-el-form-control',
				'allow_custom_attributes' => false,
				'allow_class_assignments' => false,
			]
		);

		$this->register_style_options_element(
			'ff_el_submit_button',
			[
				'title'                   => esc_html__( 'Submit Button', 'zionffstyler' ),
				'selector'                => '{{ELEMENT}} .ff-btn.ff-btn-submit',
				'allow_custom_attributes' => false,
				'allow_class_assignments' => false,
			]
		);

		$this->register_style_options_element(
			'ff_el_payment_summary',
			[
				'title'                   => esc_html__( 'Payment Summary' ),
				'selector'                => '{{ELEMENT}} .ff_dynamic_payment_summary .ffp_table',
				'allow_custom_attributes' => false,
				'allow_class_assignments' => false,
			]
		);

		$this->register_style_options_element(
			'ff_el_prev_button',
			[
				'title'                   => esc_html__( 'Prev / Next Buttons', 'zionffstyler' ),
				'selector'                => '{{ELEMENT}} .fluentform .ff-btn-secondary',
				'allow_custom_attributes' => false,
				'allow_class_assignments' => false,
			]
		);

		$this->register_style_options_element(
			'ff_el_sucmsg',
			[
				'title'                   => esc_html__( 'Success Message', 'zionffstyler' ),
				'selector'                => '{{ELEMENT}} .ff-message-success',
				'allow_custom_attributes' => false,
				'allow_class_assignments' => false,
			]
		);
	}
}
