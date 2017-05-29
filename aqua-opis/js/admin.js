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
		has_image = jQuery(event.srcElement).data('hasimg');
		frame.open();
	}

	var deleteImage = function(event) {
		event.preventDefault;
		var dest = jQuery(event.srcElement).data('related');
		var blank = jQuery(event.srcElement).data('blankimg');
		jQuery("#" + dest).val(blank);
		jQuery("#img-" + dest).attr("src", blank);

		var has_image = jQuery(event.srcElement).data('hasimg');
		jQuery("#"+has_image).val(0);

	}

	// bind events
	jQuery('input.aqua-opis-media-button').on('click', openMediaUploader);
	jQuery('input.aqua-opis-delete-button').on('click', deleteImage);

	// restore event bindings after widget update
	jQuery(document).on('widget-updated', function() {
		jQuery('input.aqua-opis-media-button').on('click', openMediaUploader);
	});

	frame.on('select', function() {
		var	attachment = frame.state().get('selection').first().toJSON();
		jQuery("#" + destinatedID).val(attachment.url);
		jQuery("#img-" + destinatedID).attr("src", attachment.url);

		jQuery("#"+has_image).val(1);
	});
})