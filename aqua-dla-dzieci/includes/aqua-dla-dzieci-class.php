<?php
	class Aqua_Dla_Dzieci_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct( 
			'aqua_dla_dzieci_widget', 
			__('AQUA dla dzieci', 'ad_domain'), 
			array('description' => __('Udogodnienia dla najmłodszych', 'ad_domain')));
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget

		$title = esc_attr($instance['title']);

		echo $args['before_widget'];
		$this->getFrontend($title);
		echo $args['after_widget'];
	
	}


	public function form( $instance ) {
		// outputs the options form on admin
		$this->getForm($instance);
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array(
			'title'						=> (!empty($new_instance['title'])) ? $new_instance['title'] : 0);
		return $instance;
	}

	public function getForm( $instance ) {
		// gets & dispays backend form

		if (isset($instance['title'])) {
			$title = $instance['title'];
		} else {
			$title = '';
		}

?>

	<div class="wrap">

		<!-- INPUT TITLE -->
		<p>
		<label for="<?= $this->get_field_name('title'); ?>"><?= _e('Tytuł:', 'ad_domain'); ?></label>

		<input class="widefat" type="text" id="<?= $this->get_field_id('title'); ?>" name="<?= $this->get_field_name('title'); ?>" value="<?= $title; ?>">
		</p>

	</div><!-- wrap -->

<?php
	}

	function getFrontend($title) {
		?>
			
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="bullet"><img src="<?= plugins_url().'/aqua-dla-dzieci/img/tick.png'; ?>"></div>
                <div class="desc"><?= $title; ?></div>
            </div>



		<?php
	}
}