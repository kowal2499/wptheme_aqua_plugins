jQuery( document ).ready( function() {

	var frame = wp.media({
	 	title: 				'Select or upload an icon',
	 	button: 			{ text: 'Use this media' },
		multiple: 		false 
	});

	var destinatedID;
	var has_image;

	var openMediaUploader = function(event) {
		event.preventDefault();
		destinatedID = jQuery(event.srcElement).data('related');
		frame.open();
	}

	var deleteImage = function(event) {
		event.preventDefault;
		var dest = jQuery(event.srcElement).data('related');
		jQuery("#" + dest).val('');
		jQuery("#img-" + dest).attr("src", '');
	}

	// bind events
	jQuery('input.aqua-atrakcje-media-button').on('click', openMediaUploader);
	jQuery('input.aqua-atrakcje-remove-button').on('click', deleteImage);

	// restore event bindings after widget update
	jQuery(document).on('widget-updated', function() {
		jQuery('input.aqua-atrakcje-media-button').on('click', openMediaUploader);
		jQuery('input.aqua-atrakcje-remove-button').on('click', deleteImage);
	});

	// set event binding on widget add
	jQuery(document).on('widget-added', function(event, widget) {

		if (widget[0].id.includes('aqua_atrakcje_widget')) { // <----------- name of my widget here as declared in widget constructor class
			jQuery('input.aqua-atrakcje-media-button').on('click', openMediaUploader);
			jQuery('input.aqua-atrakcje-remove-button').on('click', deleteImage);
		}
	});

	frame.on('select', function() {
		var	attachment = frame.state().get('selection').first().toJSON();
		jQuery("#" + destinatedID).val(attachment.url);
		jQuery("#img-" + destinatedID).attr("src", attachment.url);
	});
})