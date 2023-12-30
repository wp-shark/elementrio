<?php
namespace Elementrio\Modules\GlassMorphism;

use Elementor\Controls_Manager;

class Elementrio_Morphism_Control {

	public function __construct() {
		add_action('elementor/element/common/_section_style/after_section_end', [$this, 'morphism_controls_section'], 1);
	}

	public function morphism_controls_section($element) {

		$element->start_controls_section(
			'elementrio_glass_morphism_section',
			[
				'label' => esc_html__( 'Elementrio Glass Morphism', 'elementrio' ),
				'tab' => Controls_Manager::TAB_ADVANCED,
			]
		);

		$element->add_control(
			'ele_glass_morphism',
			[
				'label'           => esc_html__( 'Glass Morphism', 'elementrio' ),
				'type'            => Controls_Manager::POPOVER_TOGGLE,
				'return_value'    => 'yes',
			]
		);

		$element->start_popover();

		$element->add_control(
			'ele_glass_morphism_blur',
			[
				'label'     => esc_html__( 'Blur', 'elementrio' ),
				'type'      => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'render_type' => 'ui',
				'range'     => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 0.1,
					]
				],
				'default'   => [
					'unit' => 'px',
					'size' => 0,
				],
				'condition' => [
					'ele_glass_morphism' => 'yes',
				],
			]
		);

		$element->add_control(
			'ele_glass_morphism_brightness',
			[
				'label'       => esc_html__( 'Brightness', 'elementrio' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'render_type' => 'ui',
				'range'       => [
					'px' => [
						'min'  => 0,
						'max'  => 10,
						'step' => 0.1,
					],
				],
				'default'     => [
					'unit' => 'px',
					'size' => 1,
				],
				'condition'   => [
					'ele_glass_morphism' => 'yes',
				],
			]
		);

		$element->add_control(
			'ele_glass_morphism_contrast',
			[
				'label'       => esc_html__( 'Contrast', 'elementrio' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'render_type' => 'ui',
				'range'       => [
					'px' => [
						'min'  => 0,
						'max'  => 10,
						'step' => 0.1,
					],
				],
				'default'     => [
					'unit' => 'px',
					'size' => 1,
				],
				'condition'   => [
					'ele_glass_morphism' => 'yes',
				],
			]
		);

		$element->add_control(
			'ele_glass_morphism_saturation',
			[
				'label'       => esc_html__( 'Saturation', 'elementrio' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'render_type' => 'ui',
				'range'       => [
					'px' => [
						'min'  => 0,
						'max'  => 10,
						'step' => 0.1,
					],
				],
				'default'     => [
					'unit' => 'px',
					'size' => 1,
				],
				'condition'   => [
					'ele_glass_morphism' => 'yes',
				],
			]
		);

		$element->add_control(
			'ele_glass_morphism_grayscale',
			[
				'label'       => esc_html__( 'Grayscale', 'elementrio' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'render_type' => 'ui',
				'range'       => [
					'px' => [
						'min'  => 0,
						'max'  => 10,
						'step' => 0.1,
					],
				],
				'default'     => [
					'unit' => 'px',
					'size' => 1,
				],
				'condition'   => [
					'ele_glass_morphism' => 'yes',
				],
			]
		);

		$element->add_control(
			'ele_glass_morphism_hue',
			[
				'label'       => esc_html__( 'Hue', 'elementrio' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'render_type' => 'ui',
				'range'       => [
					'px' => [
						'min' => 0,
						'max' => 360,
					]
				],
				'default'     => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}}:not(.elementor-widget),{{WRAPPER}} > .elementor-widget-container' => 'backdrop-filter: brightness( {{ele_glass_morphism_brightness.SIZE}} ) contrast( {{ele_glass_morphism_contrast.SIZE}} ) saturate( {{ele_glass_morphism_saturation.SIZE}} ) grayscale( {{ele_glass_morphism_grayscale.SIZE}} ) blur( {{ele_glass_morphism_blur.SIZE}}px ) hue-rotate( {{ele_glass_morphism_hue.SIZE}}deg );
					-webkit-backdrop-filter: brightness( {{ele_glass_morphism_brightness.SIZE}} ) contrast( {{ele_glass_morphism_contrast.SIZE}} ) saturate( {{ele_glass_morphism_saturation.SIZE}} ) blur( {{ele_glass_morphism_blur.SIZE}}px ) grayscale( {{ele_glass_morphism_grayscale.SIZE}} ) hue-rotate( {{ele_glass_morphism_hue.SIZE}}deg )',
				],
				'condition'   => [
					'ele_glass_morphism' => 'yes',
				],
			]
		);

		$element->end_popover();

		$element->end_controls_section();
	}
}

// Instantiate the Elementrio_Morphism_Control class
new Elementrio_Morphism_Control();
