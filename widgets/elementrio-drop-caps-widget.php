<?php
if (! defined( 'ABSPATH' ) ) exit;

class Elementrio_Drop_Caps_Widget extends \Elementor\Widget_Base { 

	public function get_name() {
		return 'drop-caps-widget';
	}

	public function get_title() {
		return esc_html__( 'Ele Drop Caps', 'elementrio' );
	}

	public function get_icon() {
		return 'eicon-editor-paragraph';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'drop', 'caps', 'dropcaps', 'elementrio' ];
	}

	// Register elementrio controls
	protected function register_controls() {

		$this->start_controls_section(
			'ele_dropcaps_content',
			[
				'label' => esc_html__( 'Dropcaps', 'elementrio' ),
			]
		);

		$this->add_control(
			'ele_dropcaps_text',
			[
				'label'         => esc_html__( 'Content', 'elementrio' ),
				'type'          => Elementor\Controls_Manager::TEXTAREA,
				'default'       => esc_html__( 'Lorem this delightful rhyming tale, a human boy engages in wintry fun with a gaggle of kids made of snow. But as they scamper through the woods and get into all manner of trouble', 'elementrio' ),
				'placeholder'   => esc_html__( 'Enter Your Drop Caps Content.', 'elementrio' ),
				'separator'=>'before',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'ele_dropcaps_content_style_section',
			[
				'label' => esc_html__( 'Content', 'elementrio' ),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'ele_content_color',
			[
				'label' => esc_html__( 'Color', 'elementrio' ),
				'type' => Elementor\Controls_Manager::COLOR,
				'default' => '#000',
				'selectors' => [
					'{{WRAPPER}} .ele-dropcap-cotnent' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ele_content_typography',
				'selector' => '{{WRAPPER}} .ele-dropcap-cotnent',
			]
		);

		$this->end_controls_section();

		// Style dropcaps latter tab section
		$this->start_controls_section(
			'ele_dropcaps_latter_style_section',
			[
				'label' => esc_html__( 'Dropcap Latter', 'elementrio' ),
				'tab' => Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'ele_content_dropcaps_color',
			[
				'label' => esc_html__( 'Color', 'elementrio' ),
				'type' => Elementor\Controls_Manager::COLOR,
				'default' => '#903',
				'selectors' => [
					'{{WRAPPER}} .ele-dropcap-cotnent:first-child:first-letter' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ele_content_dropcaps_typography',
				'selector' => '{{WRAPPER}} .ele-dropcap-cotnent:first-child:first-letter',
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'ele_content_dropcaps_background',
				'label' => esc_html__( 'Background', 'elementrio' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ele-dropcap-cotnent:first-child:first-letter',
			]
		);

		$this->add_responsive_control(
			'ele_content_dropcaps_padding',
			[
				'label' => esc_html__( 'Padding', 'elementrio' ),
				'type' => Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-dropcap-cotnent:first-child:first-letter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' =>'before',
			]
		);

		$this->add_responsive_control(
			'ele_content_dropcaps_margin',
			[
				'label' => esc_html__( 'Margin', 'elementrio' ),
				'type' => Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-dropcap-cotnent:first-child:first-letter' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'ele_content_dropcaps_border',
				'label' => esc_html__( 'Border', 'elementrio' ),
				'selector' => '{{WRAPPER}} .ele-dropcap-cotnent:first-child:first-letter',
			]
		);

		$this->add_responsive_control(
			'ele_content_dropcaps_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementrio' ),
				'type' => Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-dropcap-cotnent:first-child:first-letter' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render( ) {
		echo '<div class="ele-element" >';
			$this->render_raw();
		echo '</div>';
	}

	protected function render_raw( ) {

		$settings = $this->get_settings_for_display();
		extract($settings);

		?>
		<div class="ele-dropcap-wrapper">
			<?php if( !empty( $settings['ele_dropcaps_text'] ) ) : ?>
				<p class="ele-dropcap-cotnent"> <?php echo esc_html( $settings['ele_dropcaps_text'], 'elementrio'); ?> </p>
			<?php endif; ?>
		</div>
		<?php
	}

}