<?php
if (! defined( 'ABSPATH' ) ) exit;
class Elementrio_Chart_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'chart-widget';
	}

	public function get_title() {
		return esc_html__( 'Ele Chart', 'elementrio' );
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_categories() {
		return [ 'basic', 'elementrio' ];
	}

	public function get_keywords() {
		return [ 'chart', 'graph', 'diagram', 'elementrio', 'ele' ];
	}

	// Register elementrio controls
	protected function register_controls() { 

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
		<canvas id="chart"></canvas>

		<script>
			var ctx = document.getElementById("chart").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ["<  1","1 - 2","3 - 4","5 - 9","10 - 14","15 - 19","20 - 24","25 - 29","> - 29"],
					datasets: [{
						label: 'Employee',
						backgroundColor: "#caf270",
						data: [12, 59, 5, 56, 58,12, 59, 87, 45],
					}, {
						label: 'Engineer',
						backgroundColor: "#45c490",
						data: [12, 59, 5, 56, 58,12, 59, 85, 23],
					}, {
						label: 'Government',
						backgroundColor: "#008d93",
						data: [12, 59, 5, 56, 58,12, 59, 65, 51],
					}, {
						label: 'Political parties',
						backgroundColor: "#2e5468",
						data: [12, 59, 5, 56, 58, 12, 59, 12, 74],
					}],
				},
				options: {
					tooltips: {
					displayColors: true,
					callbacks:{
						mode: 'x',
					},
					},
					scales: {
					xAxes: [{
						stacked: true,
						gridLines: {
						display: false,
						}
					}],
					yAxes: [{
						stacked: true,
						ticks: {
						beginAtZero: true,
						},
						type: 'linear',
					}]
					},
						responsive: true,
						maintainAspectRatio: false,
						legend: { position: 'bottom' },
					}
				});
		</script>
		<?php

	}
}