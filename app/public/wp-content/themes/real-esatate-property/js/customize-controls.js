( function( api ) {

	// Extends our custom "real-esatate-property" section.
	api.sectionConstructor['real-esatate-property'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );