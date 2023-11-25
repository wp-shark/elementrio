<?php
if (!defined('ABSPATH')) exit;

class Elementrio_Progress_Bar_Widget extends \Elementor\Widget_Base {

    public function __construct($data = [], $args = null) {
        parent::__construct($data, $args);
        $this->add_script_depends('elementor-waypoints');
    }

    public function get_name() {
        return 'progress-bar-widget';
    }

    public function get_title() {
        return esc_html__('Ele Progress Bar', 'elementrio');
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return ['basic', 'elementrio'];
    }

    public function get_keywords() {
        return ['progress', 'bar', 'counter', 'elementrio', 'ele'];
    }

    // Register elementrio controls
    protected function register_controls() {
        $this->start_controls_section(
            'progress_bar_section',
            [
                'label' => __('Progress Bar Settings', 'elementrio'),
            ]
        );

        // Add your controls here

        $this->end_controls_section();
    }

    protected function render() {
        echo '<div class="ele-element">';
        $this->render_raw();
        echo '</div>';
    }

    protected function render_raw() {
        $settings = $this->get_settings_for_display();
        extract($settings);

        ?>
        <div class="waypoint-tigger">
            <div class="skillbar-group" data-progress-bar>
                <div class="single-skill-bar">
                    <div class="content-group">
                        <div class="skill-bar-content">
                            <span class="skill-title">Hello</span>
                        </div><!-- .skill-bar-content END -->
                        <div class="skill-bar">
                            <div class="skill-track"></div>
                        </div><!-- .skill-bar END -->
                    </div>
                    <span class="number-percentage-wraper">
                        <span class="number-percentage" data-value='50' data-animation-duration='3500'>0</span>%
                    </span>
                </div>
            </div>
        </div>

        <script>

        </script>
        <?php
    }
}
