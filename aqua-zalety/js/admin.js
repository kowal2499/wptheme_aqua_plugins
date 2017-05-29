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
		jQuery("#" + dest).val("");
		jQuery("#img-" + dest).attr("src", "");

		var has_image = jQuery(event.srcElement).data('hasimg');
	}

	// bind events
	jQuery('input.zalety-opis-media-button').on('click', openMediaUploader);
	jQuery('input.aqua-zalety-delete-button').on('click', deleteImage);

	// restore event bindings after widget update
	jQuery(document).on('widget-updated', function() {
		jQuery('input.aqua-zalety-media-button').on('click', openMediaUploader);
	});

	frame.on('select', function() {
		var	attachment = frame.state().get('selection').first().toJSON();
		jQuery("#" + destinatedID).val(attachment.url);
		jQuery("#img-" + destinatedID).attr("src", attachment.url);
	});
})