<?php
	class Aqua_Galeria_Script extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct( 
			'aqua_galeria_widget', 
			__('AQUA galeria', 'ag_domain'), 
			array('description' => __('Galeria zdjęć z kategoriami', 'ag_domain')));
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
		
		$desc = $instance['description'];
		$title = esc_attr($instance['title']);

		echo $args['before_widget'];
		$this->getFrontend($title, $desc);
		echo $args['after_widget'];

	}


	public function form( $instance ) {
		// outputs the options form on admin
		$this->getForm($instance);
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved

		$instance = array(
			'title' => (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '',
			'description' => (!empty($new_instance['description'])) ? $new_instance['description'] : ''
			);
		return $instance;
	}

	public function getForm( $instance ) {
		// gets & dispays backend form

		if (isset($instance['description'])) {
			$description = $instance['description'];
		} else {
			$description = '';
		}

		if (isset($instance['title'])) {
			$title = $instance['title'];
		} else {
			$title = '';
		}
		?>
		<div class="wrap">

			<!-- INPUT TITLE -->
			<p>
			<label for="<?= $this->get_field_name('title'); ?>"><?= _e('Tytuł:', 'ag_domain'); ?></label>

			<input class="widefat" type="text" id="<?= $this->get_field_id('title'); ?>" name="<?= $this->get_field_name('title'); ?>" value="<?= $title; ?>">
			</p>

			<!-- TEXTAREA TREŚĆ -->
			<p>
			<label for="<?= $this->get_field_name('description'); ?>"><?= _e('Opis:', 'ag_domain'); ?></label>
			<textarea class="widefat" type="text" id="<?= $this->get_field_id('description'); ?>" name="<?= $this->get_field_name('description'); ?>" rows="10"><?= $description; ?></textarea>
			</p>


		</div>
		<?php
	}

	function getFrontend($title, $desc) {
		
			

		?>
			<?php echo $title; ?>
			<?php echo $desc; ?>
		<?php
	}

}