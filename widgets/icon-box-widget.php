<?php
class Icon_Box_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'icon-box-widget';
	}

	public function get_title() {
		return esc_html__( 'Ele Icon Box', 'elementrio' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'Icon', 'Box', 'elementrio' ];
	}

	// Register elementrio controls
	protected function register_controls() {

		// Icon Box Section Start
		$this->start_controls_section(
			'ele_icon_box',
			[
				'label' => esc_html__( 'Icon Box', 'elementrio' ),
			]
		);

		$this->add_control(
			'ele_icon_box_enable_header_icon', [
				'label'       => esc_html__( 'Icon Type', 'elementrio' ),
				'type'        => \Elementor\Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => [
					'none' => [
						'title' => esc_html__( 'None', 'elementrio' ),
						'icon'  => 'fa fa-ban',
					],
					'icon' => [
						'title' => esc_html__( 'Icon', 'elementrio' ),
						'icon'  => 'fa fa-paint-brush',
					],
					'image' => [
						'title' => esc_html__( 'Image', 'elementrio' ),
						'icon'  => 'fa fa-image',
					],
				],
				'default'   => 'icon',
			]
		);

		$this->add_control(
			'ele_icon_box_header_icons__switch',
			[
				'label' => esc_html__('Add icon? ', 'elementrio'),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' =>esc_html__( 'Yes', 'elementrio' ),
				'label_off' =>esc_html__( 'No', 'elementrio' ),
				'condition' => [
					'ele_icon_box_enable_header_icon!' => 'none',
				]
			]
		);

		$this->add_control(
			'ele_icon_box_header_icons',
			[
				'label' => esc_html__( 'Header Icon', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'icon icon-review',
					'library' => 'ekiticons',
				],
				'label_block' => true,
				'condition' => [
					'ele_icon_box_enable_header_icon' => 'icon',
					'ele_icon_box_header_icons__switch' => 'yes'
				]
			]
		);

		$this->add_control(
			'ele_icon_box_header_image',
			[
				'label' => esc_html__( 'Choose Image', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
					'id'    => -1
				],
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'ele_icon_box_enable_header_icon' => 'image',
				]
			]
		);

		$this->end_controls_section();
		// Icon Box Section End

		// Content Section Start
		$this->start_controls_section(
			'ele_icon_box_title',
			[
				'label' => esc_html__( 'Content', 'elementrio' ),
			]
		);

		$this->add_control(
			'ele_icon_box_title_text',
			[
				'label' => esc_html__( 'Title', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'This is the Elementrio', 'elementrio' ),
				'placeholder' => esc_html__( 'Enter your title', 'elementrio' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'ele_icon_box_description_text',
			[
				'label' => esc_html__( 'Description', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'elementrio' ),
				'placeholder' => esc_html__( 'Enter your description', 'elementrio' ),
				'rows' => 10,
			]
		);

		$this->end_controls_section();
		//Content Section End

		//Button Section Start
		$this->start_controls_section(
			'ele_icon_box_button',
			[
				'label' => esc_html__( 'Button', 'elementrio' ),
			]
		);

		$this->add_control(
			'ele_icon_box_button_text',
			[
				'label' => esc_html__( 'Button Text', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default' => esc_html__( 'Read More', 'elementrio' ),
				'placeholder' => esc_html__( 'Enter your title', 'elementrio' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'ele_icon_box_button_link',
			[
				'label' => esc_html__( 'Link', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'placeholder' => esc_html__( 'https://your-link.com', 'elementrio' ),
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
		//Button Section End

		// start style for Icon
		$this->start_controls_section(
			'ele_icon_box_icon_style',
			[
				'label' => esc_html__( 'Icon', 'elementrio' ),
				'tab' => \Elementor\controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'ele_icon_box_icon_size',
			[
				'label' => esc_html__( 'Size', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ele-element .elementrio-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		//Start Tabs 
		$this->start_controls_tabs(
			'ele_icon_box_icon_style_tabs'
		);

		$this->start_controls_tab(
			'ele_icon_box_icon_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'elementrio' ),
			]
		);

		$this->add_control(
			'ele_icon_box_icon_color',
			[
				'label' => esc_html__( 'Color', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ele-element .elementrio-icon svg' => 'fill: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'ele_icon_box_icon_bg',
				'types' => [ 'classic', 'gradient'],
				'exclude' => ['image'],
				'selector' => '{{WRAPPER}} .ele-element .elementrio-icon, {{WRAPPER}} .ele-element .elementrio-icon svg',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ele_icon_box_icon_box_shadow',
				'selector' => '{{WRAPPER}} .ele-element .elementrio-icon',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'ele_icon_box_icon_border',
				'selector' => '{{WRAPPER}} .ele-element .elementrio-icon',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'ele_icon_box_icon_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'elementrio' ),
			]
		);

		$this->add_control(
			'ele_icon_box_icon_hv_color',
			[
				'label' => esc_html__( 'Color', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ele-element .elementrio-icon svg:hover' => 'fill: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'ele_icon_box_icon_hv_bg',
				'types' => [ 'classic', 'gradient'],
				'exclude' => ['image'],
				'selector' => '{{WRAPPER}} .ele-element .elementrio-icon:hover, {{WRAPPER}} .ele-element .elementrio-icon:hover svg',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ele_icon_box_icon_hv_box_shadow',
				'selector' => '{{WRAPPER}} .ele-element .elementrio-icon:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'ele_icon_box_icon_hv_border',
				'selector' => '{{WRAPPER}} .ele-element .elementrio-icon:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		//End Tabs 

		$this->add_responsive_control(
			'ele_icon_box_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'separator' => 'before ',
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ele_icon_box_icon_padding',
			[
				'label' => esc_html__( 'Padding', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ele_icon_box_icon_margin',
			[
				'label' => esc_html__( 'Margin', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end style for Icon 


		// start style for Content
		$this->start_controls_section(
			'ele_icon_box_content_style',
			[
				'label' => esc_html__( 'Content', 'elementrio' ),
				'tab' => \Elementor\controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'ele_icon_box_title_heading',
			[
				'label' => esc_html__( 'Title', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ele_icon_box_title_typography',
				'selector' => '{{WRAPPER}} .ele-element .elementrio-icon-box-title',
			]
		);

		$this->add_control(
			'ele_icon_box_title_color',
			[
				'label' => esc_html__( 'Color', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon-box-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'ele_icon_box_title_hv_color',
			[
				'label' => esc_html__( 'Hover Color', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon-box-title:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'ele_icon_box_title_margin',
			[
				'label' => esc_html__( 'Margin', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon-box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'ele_icon_box_description_heaading',
			[
				'label' => esc_html__( 'Description', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ele_icon_box_description_typography',
				'selector' => '{{WRAPPER}} .ele-element .elementrio-icon-box-description',
			]
		);

		$this->add_control(
			'ele_icon_box_description_color',
			[
				'label' => esc_html__( 'Color', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon-box-description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'ele_icon_box_description_hv_color',
			[
				'label' => esc_html__( 'Hover Color', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon-box-description:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'ele_icon_box_description_margin',
			[
				'label' => esc_html__( 'Margin', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon-box-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'ele_icon_box_content_align',
			[
				'label' => esc_html__( 'Alignment', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'toggle' => true,
				'separator' => 'before',
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'elementrio' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'elementrio' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'elementrio' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon-box-wrapper' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
		// end style for Content

		// start style for button
		$this->start_controls_section(
			'ele_icon_box_button_style',
			[
				'label' => esc_html__( 'Button', 'elementrio' ),
				'tab' => \Elementor\controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ele_icon_box_button_typography',
				'selector' => '{{WRAPPER}} .ele-element .elementrio-icon-box-button',
			]
		);

		//Start Tabs 
		$this->start_controls_tabs(
			'ele_icon_box_button_style_tabs'
		);

		$this->start_controls_tab(
			'ele_icon_box_button_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'elementrio' ),
			]
		);

		$this->add_control(
			'ele_icon_box_button_color',
			[
				'label' => esc_html__( 'Color', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon-box-button' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'ele_icon_box_button_bg',
				'types' => [ 'classic', 'gradient'],
				'exclude' => ['image'],
				'selector' => '{{WRAPPER}} .ele-element .elementrio-icon-box-button',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ele_icon_box_button_box_shadow',
				'selector' => '{{WRAPPER}} .ele-element .elementrio-icon-box-button',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'ele_icon_box_button_border',
				'selector' => '{{WRAPPER}} .ele-element .elementrio-icon-box-button',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'ele_icon_box_button_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'elementrio' ),
			]
		);

		$this->add_control(
			'ele_icon_box_button_hv_color',
			[
				'label' => esc_html__( 'Color', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon-box-button:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'ele_icon_box_button_hv_bg',
				'types' => [ 'classic', 'gradient'],
				'exclude' => ['image'],
				'selector' => '{{WRAPPER}} .ele-element .elementrio-icon-box-button:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ele_icon_box_button_hv_box_shadow',
				'selector' => '{{WRAPPER}} .ele-element .elementrio-icon-box-button:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'ele_icon_box_button_hv_border',
				'selector' => '{{WRAPPER}} .ele-element .elementrio-icon-box-button:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();
		//end tabs

		$this->add_responsive_control(
			'ele_icon_box_button_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'separator' => 'before ',
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon-box-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ele_icon_box_button_padding',
			[
				'label' => esc_html__( 'Padding', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon-box-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ele_icon_box_button_margin',
			[
				'label' => esc_html__( 'Margin', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-icon-box-button-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// end style for button

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
			<div class="elementrio-icon-box-wrapper">
				<?php if (!empty( $settings['ele_icon_box_header_icons'] )) : ?>
					<div class="elementrio-icon-box-icon">
						<span class="elementrio-icon">
							<?php \Elementor\Icons_Manager::render_icon( $settings['ele_icon_box_header_icons'], [ 'aria-hidden' => 'true' ] ); ?>
						</span>
					</div>
				<?php endif; 

				if (!empty( $settings['ele_icon_box_header_image']['url'] )) : ?>
					<div class="elementrio-icon-box">
						<img src="<?php echo esc_url( $settings['ele_icon_box_header_image']['url'] ); ?>" alt="icon-box-image">
					</div>
				<?php endif; ?>

				<div class="elementrio-icon-box-content">
					<?php if (!empty($ele_icon_box_title_text)) : ?>
						<h3 class="elementrio-icon-box-title">
							<span> <?php echo esc_html($ele_icon_box_title_text); ?> </span>
						</h3>
					<?php endif;

					if (!empty($ele_icon_box_description_text)) : ?>
						<p class="elementrio-icon-box-description"> <?php echo esc_html($ele_icon_box_description_text); ?> </p>
					<?php endif;

					if (!empty($ele_icon_box_button_text)) : ?>
						<div class="elementrio-icon-box-button-wrap">
							<a href="<?php echo esc_url( $settings['ele_icon_box_button_link']['url']); ?>" class="elementrio-icon-box-button"> <?php echo esc_html($ele_icon_box_button_text); ?> </a>
						</div>
					<?php endif;  ?>
				</div>
			</div>
		<?php
	}
}