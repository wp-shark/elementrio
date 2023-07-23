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
			'ele_element_blog_posts_feature_img',
			[
				'label'     => esc_html__( 'Show Featured Image', 'elementrio' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => esc_html__( 'Yes', 'elementrio' ),
				'label_off' => esc_html__( 'No', 'elementrio' ),
				'default'   => 'yes',
			]
		);

		$this->end_controls_section();
		// Blog Post Section end
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