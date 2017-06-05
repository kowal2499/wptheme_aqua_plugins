<?php
	class Aqua_Opis_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct( 
			'aqua_opis_widget', 
			__('AQUA opis', 'ao_domain'), 
			array('description' => __('Opisy apartamentu z obrazkiem', 'ao_domain')));
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget

		$img_src = esc_attr($instance['uploaded_image']);
		$desc = ($instance['description']);
		$direction = esc_attr($instance['position']);
		$has_image = esc_attr($instance['has_image']);

		echo $args['before_widget'];
		$this->getFrontend($img_src, $desc, $direction, $has_image);
		echo $args['after_widget'];
	
	}


	public function form( $instance ) {
		// outputs the options form on admin
		$this->getForm($instance);
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = array(
			'uploaded_image' 			=> (!empty($new_instance['uploaded_image'])) ? strip_tags($new_instance['uploaded_image']) : plugins_url().'/aqua-opis/img/no-image.jpg',
			'description'					=> (!empty($new_instance['description'])) ? ($new_instance['description']) : '',
			'position'						=> (!empty($new_instance['position'])) ? $new_instance['position'] : 'left',
			'has_image'						=> (!empty($new_instance['has_image'])) ? $new_instance['has_image'] : 0);
		return $instance;
	}

	public function getForm( $instance ) {
		// gets & dispays backend form

		if (isset($instance['uploaded_image'])) {
			$uploaded_image = $instance['uploaded_image'];
		} else {
			$uploaded_image = plugins_url() . '/aqua-opis/img/no-image.jpg';
		}

		if (isset($instance['description'])) {
			$description = $instance['description'];
		} else {
			$description = '';
		}

		if (isset($instance['position'])) {
			$position = $instance['position'];
		} else {
			$position = 'left';
		}

		if (isset($instance['has_image'])) {
			$has_image = $instance['has_image'];
		} else {
			$has_image = 0;
		}
?>

	<div class="wrap">
	
		<!-- OBRAZEK -->
		<div class="alignleft">
			<img src="<?= $uploaded_image; ?>" width="150" alt="no image" id="img-<?= $this->get_field_id('uploaded_image'); ?>">
		</div>

		<!-- PRZYCISKI WYBORU OBRAZKA -->
		<div class="alignright">
		
			<input type="button" class="button button-secondary aqua-opis-media-button" value="<?= _e('Wybierz obrazek', 'ao_domain'); ?>" data-related="<?= $this->get_field_id('uploaded_image'); ?>" data-hasimg="<?= $this->get_field_id('has_image'); ?>"><br><br>
			
			<input type="button" class="button button-secondary aqua-opis-delete-button" value="<?= _e('Usuń obrazek', 'ao_domain'); ?>" data-related="<?= $this->get_field_id('uploaded_image'); ?>" data-blankimg="<?= plugins_url() . '/aqua-opis/img/no-image.jpg'; ?>" data-hasimg="<?= $this->get_field_id('has_image'); ?>"><br>
		
		</div>
		<br class="clear"><br>

		<!-- URL OBRAZKA (HIDDEN) -->
		<input type="hidden" id="<?= $this->get_field_id('uploaded_image'); ?>" name="<?= $this->get_field_name('uploaded_image'); ?>" value="<?= $uploaded_image; ?>">

		<!-- HAS IMAGE (HIDDEN) -->
		<input type="hidden" id="<?= $this->get_field_id('has_image'); ?>" name="<?= $this->get_field_name('has_image'); ?>" value="<?= $has_image; ?>">

		<!-- TEXTAREA TREŚĆ -->
		<p>
		<label for=""><?= _e('Treść:', 'ao_domain'); ?></label>
		<textarea class="widefat" type="text" id="<?= $this->get_field_id('description'); ?>" name="<?= $this->get_field_name('description'); ?>" rows="10"><?= $description; ?></textarea>
		</p>

		<!-- POZYCJA OBRAZKA -->
		<p>
		<label for=""><?= _e('Pozycja obrazka:', 'ao_domain'); ?></label><br>

		<?php
			$options = array(
					array('value' => 'left', 'desc' => ' z lewej strony'),
					array('value' => 'right', 'desc' => ' z prawej strony')
				);

				foreach ($options as $option) {
					if ($option['value'] == $position) {
						$checked = 'checked';
					} else {
						$checked = '';
					}
					echo '<input type="radio" name="'.$this->get_field_name('position').'" value="'.$option['value'].'"'. $checked.'>'.$option['desc'].'<br>';
				}
		?>
		</p>

	</div><!-- wrap -->

<?php
	}

	function getFrontend($img_src, $desc, $direction, $has_image) {
		?>

		<?php if ($direction=='left'): ?>
		<div class="value">
			<?php if ($has_image) { ?>
			<div class="img-wrapper align-to-left animate fadeIn"><img src="<?= $img_src; ?>" alt="" class="img-responsive"></div><?php } ?>
			<div class="horiz-center-wrapper">
					<div class="horiz-center">
							<p class="animate toLeft"><img src="<?= plugins_url() . '/aqua-opis/img/aqua-wave.png'; ?>" alt="" class="wave"><?= pll__($desc); ?></p>
					</div>
			</div>
		</div>

		<?php else: ?>
		
		<div class="value">
		<?php if ($has_image) { ?>
			<div class="img-wrapper align-to-right animate fadeIn"><img src="<?= $img_src; ?>" alt="" class=""></div><?php } ?>
			<div class="horiz-center-wrapper">
					<div class="horiz-center">
							<p class="animate toRight"><img src="<?= plugins_url() . '/aqua-opis/img/aqua-wave.png'; ?>" alt="" class="wave"><?= pll__($desc); ?></p>
					</div>
			</div>
		</div>
		<?php endif; ?>

		<div style="clear: both;"></div>
	<?php
	}
}