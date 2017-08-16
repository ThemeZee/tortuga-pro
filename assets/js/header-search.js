/**
 * Header Search JS
 *
 * @package Tortuga Pro
 */

( function( $ ) {

	$( document ).ready( function() {

		/* Display Search Form when search icon is clicked */
		$( '#main-navigation-wrap .header-search a.header-search-icon' ).on( 'click', function() {
			$( '#main-navigation-wrap .header-search .header-search-form' ).toggle().find( '.search-form .search-field' ).focus();
			$( this ).toggleClass( 'active' );
		});

		/* Do not close search form if click is inside header search element */
		$( '#main-navigation-wrap .header-search' ).click( function(e) {
			e.stopPropagation();
		});

		/* Close search form if click is outside header search element */
		$( document ).click( function() {
			$( '#main-navigation-wrap .header-search .header-search-form' ).hide();
		});
	} );

} )( jQuery );
