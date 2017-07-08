<?php
	class Aqua_Atrakcje_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct( 
			'aqua_atrakcje_widget', 
			__('AQUA atrakcje', 'aa_domain'), 
			array('description' => __('Okoliczne atrakcje', 'ao_domain')));
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
		$img_src = esc_attr($instance['uploaded_image']);
		$desc = $instance['description'];
		$title = esc_attr($instance['title']);
		echo $args['before_widget'];
		$this->getFrontend($img_src, $title, $desc);
		echo $args['after_widget'];

	}


	public function form( $instance ) {
		// outputs the options form on admin
		$this->getForm($instance);
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved

		$instance = array(
			'uploaded_image' => (!empty($new_instance['uploaded_image'])) ? strip_tags($new_instance['uploaded_image']) : '',
			'title' => (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '',
			'description' => (!empty($new_instance['description'])) ? $new_instance['description'] : '',
			'img_alt' => (!empty($new_instance['img_alt'])) ? $new_instance['img_alt'] : ''
			);
		return $instance;
	}

	public function getForm( $instance ) {
		// gets & dispays backend form
		if (isset($instance['uploaded_image'])) {
			$uploaded_image = $instance['uploaded_image'];
		} else {
			$uploaded_image = '';
		}

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

		if (isset($instance['img_alt'])) {
			$img_alt = $instance['img_alt'];
		} else {
			$img_alt = '';
		}


		?>
		<div class="wrap">

			<!-- INPUT TITLE -->
			<p>
			<label for="<?= $this->get_field_name('title'); ?>"><?= _e('Tytuł:', 'aa_domain'); ?></label>

			<input class="widefat" type="text" id="<?= $this->get_field_id('title'); ?>" name="<?= $this->get_field_name('title'); ?>" value="<?= $title; ?>">
			</p>

			<!-- TEXTAREA TREŚĆ -->
			<p>
			<label for="<?= $this->get_field_name('description'); ?>"><?= _e('Opis:', 'aa_domain'); ?></label>
			<textarea class="widefat" type="text" id="<?= $this->get_field_id('description'); ?>" name="<?= $this->get_field_name('description'); ?>" rows="10"><?= $description; ?></textarea>
			</p>

			<p>
			<!-- PRZYCISKI WYBORU OBRAZKA -->
			<input type="button" class="button button-secondary aqua-atrakcje-media-button" value="<?= _e('Wybierz obrazek', 'aa_domain'); ?>" data-related="<?= $this->get_field_id('uploaded_image'); ?>">

			<input type="button" class="button button-secondary aqua-atrakcje-remove-button" value="<?= _e('Usuń obrazek', 'aa_domain'); ?>" data-related="<?= $this->get_field_id('uploaded_image'); ?>">

			<br><br>
			

			<!-- URL OBRAZKA (HIDDEN) -->
			<input type="hidden" class="widefat" id="<?= $this->get_field_id('uploaded_image'); ?>" name="<?= $this->get_field_name('uploaded_image'); ?>" value="<?= $uploaded_image; ?>">

			<input type="hidden" class="widefat" id="alt-<?= $this->get_field_id('uploaded_image'); ?>" name="<?= $this->get_field_name('img_alt'); ?>" value="<?= $img_alt; ?>">

			<img src="<?= $uploaded_image; ?>" width="100%" alt="no image" id="img-<?= $this->get_field_id('uploaded_image'); ?>">

			</p>


		</div>
		<?php
	}

	function getFrontend($img_src, $title, $desc) {
		
			

		?>



<!-- 		<div class="item" >
			<div class="row">

			<div class="col-md-4">
				<img src="<?php #echo $img_src; ?>" alt="" class="img-responsive animate fadeIn">
			</div>
			<div class="col-md-8">
				<div class="description">
					<h3><?php # echo $title; ?></h3>
					<?php # echo $desc; ?>
				</div>
			</div>

			</div>
		</div> -->

		<?php
	}

}