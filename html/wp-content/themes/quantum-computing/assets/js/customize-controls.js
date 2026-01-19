( function( api ) {

	// Extends our custom "quantum-computing" section.
	api.sectionConstructor['quantum-computing'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );