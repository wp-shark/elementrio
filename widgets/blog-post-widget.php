<?php
if (! defined( 'ABSPATH' ) ) exit;

class Blog_post_Widget extends \Elementor\Widget_Base { 

	public function get_name() {
		return 'blog-post-widget';
	}

	public function get_title() {
		return esc_html__( 'Ele Blog Post', 'elementrio', 'ele' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	public function get_keywords() {
		return [ 'blog', 'post', 'blog-post','elementrio' ];
	}

	// Register elementrio controls
	protected function register_controls() {

		// Blog Post Section Start
		$this->start_controls_section(
			'ele_element_blog_post_content',
			[
				'label' => esc_html__( 'Layout', 'elementrio' ),
			]
		);

		$this->add_control(
			'ele_element_blog_posts_num',
			[
				'label'     => esc_html__( 'Posts Count', 'elementrio' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'min'       => 1,
				'max'       => 100,
				'default'   => 3,
			]
		);

		$this->add_control(
			'ele_element_blog_posts_column',
			[
				'label'     => esc_html__( 'Show Posts Per Row', 'elementrio' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => [
					'col-lg-12 col-md-12'   => esc_html__( '1', 'elementrio' ),
					'col-lg-6 col-md-6'     => esc_html__( '2', 'elementrio' ),
					'col-lg-4 col-md-6'     => esc_html__( '3', 'elementrio' ),
					'col-lg-3 col-md-6'     => esc_html__( '4', 'elementrio' ),
					'col-lg-2 col-md-6'     => esc_html__( '6', 'elementrio' ),
				],
				'default'   => 'col-lg-4 col-md-6',
			]
		);
 
		$this->add_control(
			'ele_element_blog_posts_feature_img',
			[
				'label'     => esc_html__( 'Show Featured Image', 'elementrio' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Yes', 'elementrio' ),
				'label_off' => esc_html__( 'No', 'elementrio' ),
				'default'   => 'yes',
			]
		);

		$this->add_control(
			'ele_element_blog_posts_title',
			[
				'label'     => esc_html__( 'Show Title', 'elementrio' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Yes', 'elementrio' ),
				'label_off' => esc_html__( 'No', 'elementrio' ),
				'default'   => 'yes',
			]
		);

		$this->add_control(
			'ele_element_blog_posts_content',
			[
				'label'     => esc_html__( 'Show Title', 'elementrio' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Yes', 'elementrio' ),
				'label_off' => esc_html__( 'No', 'elementrio' ),
				'default'   => 'yes',
			]
		);

		$this->add_control(
			'ele_element_blog_posts_show_more',
			[
				'label'     => esc_html__( 'Show More Button', 'elementrio' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Yes', 'elementrio' ),
				'label_off' => esc_html__( 'No', 'elementrio' ),
				'default'   => 'yes',
			]
		);

		$this->end_controls_section();
		// Blog Post Section end

		// Blog Post Button Section Start
		$this->start_controls_section(
			'ele_element_blog_post_button',
			[
				'label' => esc_html__( 'Read More Button', 'elementrio' ),
			]
		);

		$this->add_control(
			'ele_element_blog_post_btn_text',
			[
				'label' =>esc_html__( 'Label', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'dynamic' => [
					 'active' => true,
				],
				'default' =>esc_html__( 'Learn more ', 'elementrio' ),
				'placeholder' =>esc_html__( 'Learn more ', 'elementrio' ),
			]
		);

		$this->end_controls_section();
		// Blog Post Button Section End

		// Blog Post Wrapper Style Section Start
		$this->start_controls_section(
			'ele_element_blog_post_wrapper',
			[
				'label' => esc_html__( 'Warapper', 'elementrio' ),
				'tab' => \Elementor\controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs(
			'ele_element_blog_post_wrapper_tabs'
		);

		$this->start_controls_tab(
			'ele_element_blog_post_wrapper_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'elementrio' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'ele_element_blog_post_wrapper_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ele-element .elementrio-post-card',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ele_element_blog_post_wrapper_box_shadow',
				'selector' => '{{WRAPPER}} .ele-element .elementrio-post-card',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'ele_element_blog_post_wrapper_border',
				'selector' => '{{WRAPPER}} .ele-element .elementrio-post-card',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'ele_element_blog_post_wrapper_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'elementrio' ),
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'ele_element_blog_post_hv_wrapper_bg',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ele-element .elementrio-post-card:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'ele_element_blog_post_wrapper_hv_box_shadow',
				'selector' => '{{WRAPPER}} .ele-element .elementrio-post-card:hover',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'ele_element_blog_post_wrapper_hv_border',
				'selector' => '{{WRAPPER}} .ele-element .elementrio-post-card:hover',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'ele_element_blog_post_wrapper_radius',
			[
				'label' => esc_html__( 'Border Radius', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'separator' => 'before ',
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-post-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ele_element_blog_post_wrapper_padding',
			[
				'label' => esc_html__( 'Padding', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-post-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ele_element_blog_post_wrapper_margin',
			[
				'label' => esc_html__( 'Margin', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-element .elementrio-post-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// Blog Post Wrapper Style Section End

		// Blog Post Title Style Section Start
		$this->start_controls_section(
			'ele_element_blog_post_title',
			[
				'label' => esc_html__( 'Title', 'elementrio' ),
				'tab' => \Elementor\controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'ele_element_blog_post_title_typography',
				'selector' => '{{WRAPPER}} .ele-element .entry-title',
			]
		);

		$this->add_control(
			'ele_element_blog_post_title_color',
			[
				'label' => esc_html__( 'Color', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ele-element .entry-title' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ele-element .entry-title > a' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'ele_element_blog_post_title_hv_color',
			[
				'label' => esc_html__( 'Hover Color', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ele-element .entry-title:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .ele-element .entry-title a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'ele_element_blog_post_title_margin',
			[
				'label' => esc_html__( 'Margin', 'elementrio' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ele-element .entry-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// Blog Post Title Style Section End
	}

	protected function render( ) {
		echo '<div class="ele-element" >';
			$this->render_raw();
		echo '</div>';
	}

	protected function render_raw( ) {

		$settings = $this->get_settings_for_display();
		extract($settings);

		$default    = [
			'orderby' => array( 'date' => 'ASC' ),
			'posts_per_page'    => 5,
			'offset'            => 0,
			'post_status'       => 'publish'
		];

		

		// Post Query
		$post_query = new \WP_Query( $default ); 

		?>
			<div class="ele-post-wrapper">
				<div class="ele-post-container row">
					<?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
						<div class="col-md-6">
							<div class="elementrio-post-card">
								<div class="elementrio-post-header">
									<a href="<?php the_permalink(); ?>" class="elementrio-post-thumb">
										<img src="<?php the_post_thumbnail_url( esc_attr( 'large' ) ); ?>" alt="<?php the_title(); ?>">
									</a>
								</div>
								<div class="elementrio-post-body ">

									<h2 class="entry-title">
										<a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a>
									</h2>

									<div class="post-meta-list">
										<span class="meta-author">
											<i aria-hidden="true" class="icon icon-user"></i>
											<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="author-name"><?php the_author_meta('display_name'); ?></a>
										</span>
										<span class="meta-date">
											<i aria-hidden="true" class="icon icon-calendar3"></i>
											<?php echo esc_html( get_the_date() ); ?>
										</span>
										<span class="post-cat">
											<i aria-hidden="true" class="icon icon-folder"></i>
											<?php echo get_the_category_list( ' | ' ); // phpcs:ignore WordPress.Security.EscapeOutput -- Already escaped by WordPress ?>
										</span>
										<span class="post-comment">
											<i aria-hidden="true" class="icon icon-comment"></i>
											<a href="<?php comments_link(); ?>"><?php echo esc_html( get_comments_number() ); ?></a>
										</span>
									</div>

									<p><?php echo esc_html( wp_trim_words(get_the_excerpt(), 20) ); ?></p>

									<div class="btn-wrapper">
										<a href="<?php the_permalink(); ?>" class="elementrio-post-btn ">
										<i aria-hidden="true" class="far fa-moon"></i> Learn more </a>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<?php

	}

}