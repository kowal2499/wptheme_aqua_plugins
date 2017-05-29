<?php
	class Aqua_Zalety_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct( 
			'aqua_zalety_widget', 
			__('AQUA zalety', 'az_domain'), 
			array('description' => __('Zalety apartamentu: tytuł, opis i obrazek', 'az_domain')));
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget

		$img_src = esc_attr($instance['uploaded_image']);
		$desc = ($instance['description']);
		$title = esc_attr($instance['title']);

		echo $args['before_widget'];
		$this->getFrontend($img_src, $desc, $title);
		echo $args['after_widget'];
	
	}


	public function form( $instance ) {
		// outputs the options form on admin
		$this->getForm($instance);
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array(
			'uploaded_image' 			=> (!empty($new_instance['uploaded_image'])) ? strip_tags($new_instance['uploaded_image']) : '',
			'description'					=> (!empty($new_instance['description'])) ? ($new_instance['description']) : '',
			'title'						=> (!empty($new_instance['title'])) ? $new_instance['title'] : 0);
		return $instance;
	}

	public function getForm( $instance ) {
		// gets & dispays backend form

		if (isset($instance['uploaded_image'])) {
			$uploaded_image = $instance['uploaded_image'];
		} else {
			$uploaded_image = "";
		}

		if (isset($instance['title'])) {
			$title = $instance['title'];
		} else {
			$title = '';
		}

		if (isset($instance['description'])) {
			$description = $instance['description'];
		} else {
			$description = '';
		}

?>

	<div class="wrap">

		<!-- INPUT TITLE -->
		<p>
		<label for="<?= $this->get_field_name('title'); ?>"><?= _e('Tytuł:', 'az_domain'); ?></label>

		<input class="widefat" type="text" id="<?= $this->get_field_id('title'); ?>" name="<?= $this->get_field_name('title'); ?>" value="<?= $title; ?>">
		</p>

		<!-- TEXTAREA TREŚĆ -->
		<p>
		<label for="<?= $this->get_field_name('description'); ?>"><?= _e('Opis:', 'az_domain'); ?></label>
		<textarea class="widefat" type="text" id="<?= $this->get_field_id('description'); ?>" name="<?= $this->get_field_name('description'); ?>" rows="5"><?= $description; ?></textarea>
		</p>
	
		<p>
		<!-- PRZYCISKI WYBORU OBRAZKA -->
		<input type="button" class="button button-secondary aqua-zalety-media-button" value="<?= _e('Wybierz obrazek', 'az_domain'); ?>" data-related="<?= $this->get_field_id('uploaded_image'); ?>">

		<input type="button" class="button button-secondary aqua-zalety-remove-button" value="<?= _e('Usuń obrazek', 'az_domain'); ?>" data-related="<?= $this->get_field_id('uploaded_image'); ?>">

		<br><br>

		<!-- URL OBRAZKA (HIDDEN) -->
		<input type="hidden" class="widefat" id="<?= $this->get_field_id('uploaded_image'); ?>" name="<?= $this->get_field_name('uploaded_image'); ?>" value="<?= $uploaded_image; ?>">

		<img src="<?= $uploaded_image; ?>" width="30%" alt="no image" id="img-<?= $this->get_field_id('uploaded_image'); ?>">

		</p>
	</div><!-- wrap -->

<?php
	}

	function getFrontend($img_src, $desc, $title) {
		?>
			
			<div class="col-xs-6 col-sm-6 col-md-2">
	        	<div class="asset" >
	        		<img src="<?= $img_src; ?>" alt="">
	        		<h3><?= $title; ?></h3>
	        		<?php if (!empty($desc)) : ?>
	                <div class="horiz-center-wrapper">
	                    <div class="horiz-center">
	        		      <p><?= $desc; ?></p>
	                    </div>
	                </div>
	            	<?php endif; ?>
	        	</div>
	        </div>


		<?php
	}
}