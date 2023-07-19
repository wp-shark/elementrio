<?php
class Icon_Box_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'icon-box-widget';
	}

	public function get_title() {
		return esc_html__( 'Icon Box', 'elementrio' );
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

	protected function register_controls() {

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
						<div class="elementrio-icon-box-button">
							<a href="<?php echo esc_url( $settings['ele_icon_box_button_link']['url']); ?>" > <?php echo esc_html($ele_icon_box_button_text); ?> </a>
						</div>
					<?php endif;  ?>
				</div>
			</div>
		<?php
	}
}