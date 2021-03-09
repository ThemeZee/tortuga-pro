/**
 * Customizer JS
 *
 * Reloads changes on Theme Customizer Preview asynchronously for better usability
 *
 * @package Tortuga Pro
 */

( function( $ ) {

	/* Header Search checkbox */
	wp.customize( 'tortuga_theme_options[header_search]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				hideElement( '.primary-navigation-wrap .header-search' );
			} else {
				showElement( '.primary-navigation-wrap .header-search' );
			}
		} );
	} );

	/* Author Bio checkbox */
	wp.customize( 'tortuga_theme_options[author_bio]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				hideElement( '.type-post .entry-footer .entry-author' );
			} else {
				showElement( '.type-post .entry-footer .entry-author' );
			}
		} );
	} );

	/* Primary Color Option */
	wp.customize( 'tortuga_theme_options[primary_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--primary-color', newval );
		} );
	} );

	/* Secondary Color Option */
	wp.customize( 'tortuga_theme_options[secondary_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--secondary-color', newval );
		} );
	} );

	/* Tertiary Color Option */
	wp.customize( 'tortuga_theme_options[tertiary_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--tertiary-color', newval );
		} );
	} );

	/* Accent Color Option */
	wp.customize( 'tortuga_theme_options[accent_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--accent-color', newval );
		} );
	} );

	/* Highlight Color Option */
	wp.customize( 'tortuga_theme_options[highlight_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--highlight-color', newval );
		} );
	} );

	/* Light Gray Color Option */
	wp.customize( 'tortuga_theme_options[light_gray_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--light-gray-color', newval );
		} );
	} );

	/* Gray Color Option */
	wp.customize( 'tortuga_theme_options[gray_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gray-color', newval );
		} );
	} );

	/* Dark Gray Color Option */
	wp.customize( 'tortuga_theme_options[dark_gray_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--dark-gray-color', newval );
		} );
	} );

	/* Top Navigation Color Option */
	wp.customize( 'tortuga_theme_options[top_navi_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color, hover_color, hover_bg_color, border_color;

			if( isColorLight( newval ) ) {
				text_color = '#151515';
				hover_color = 'rgba(0, 0, 0, 0.5)';
				hover_bg_color = 'rgba(0, 0, 0, 0.1)';
				border_color = 'rgba(0, 0, 0, 0.15)';
			} else {
				text_color = '#fff';
				hover_color = 'rgba(255, 255, 255, 0.6)';
				hover_bg_color = 'rgba(0, 0, 0, 0.1)';
				border_color = 'rgba(255, 255, 255, 0.15)';
			}

			document.documentElement.style.setProperty( '--header-bar-background-color', newval );
			document.documentElement.style.setProperty( '--header-bar-text-color', text_color );
			document.documentElement.style.setProperty( '--header-bar-text-hover-color', hover_color );
			document.documentElement.style.setProperty( '--header-bar-bg-hover-color', hover_bg_color );
			document.documentElement.style.setProperty( '--header-bar-border-color', border_color );
		} );
	} );

	/* Header Color Option */
	wp.customize( 'tortuga_theme_options[header_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color, hover_color, background_color, border_color;

			if( isColorLight( newval ) ) {
				text_color = '#151515';
				hover_color = 'rgba(0, 0, 0, 0.5)';
				background_color = 'rgba(0, 0, 0, 0.05)';
				border_color = 'rgba(0, 0, 0, 0.15)';
			} else {
				text_color = '#fff';
				hover_color = 'rgba(255, 255, 255, 0.6)';
				background_color = 'rgba(0, 0, 0, 0.15)';
				border_color = 'rgba(255, 255, 255, 0.2)';
			}

			document.documentElement.style.setProperty( '--header-background-color', newval );
			document.documentElement.style.setProperty( '--header-text-color', text_color );
			document.documentElement.style.setProperty( '--site-title-color', text_color );
			document.documentElement.style.setProperty( '--site-title-hover-color', hover_color );
			document.documentElement.style.setProperty( '--navi-color', text_color );
			document.documentElement.style.setProperty( '--navi-background-color', background_color );
			document.documentElement.style.setProperty( '--navi-border-color', border_color );
		} );
	} );

	/* Navigation Color Option */
	wp.customize( 'tortuga_theme_options[navi_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color;

			if( isColorLight( newval ) ) {
				text_color = '#151515';
			} else {
				text_color = '#fff';
			}

			document.documentElement.style.setProperty( '--navi-hover-color', newval );
			document.documentElement.style.setProperty( '--navi-hover-text-color', text_color );
		} );
	} );

	/* Link Color Option */
	wp.customize( 'tortuga_theme_options[link_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--link-color', newval );
		} );
	} );

	/* Link Color Hover Option */
	wp.customize( 'tortuga_theme_options[link_hover_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--link-hover-color', newval );
		} );
	} );

	/* Button Color Option */
	wp.customize( 'tortuga_theme_options[button_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color;

			if( isColorLight( newval ) ) {
				text_color = '#151515';
			} else {
				text_color = '#fff';
			}

			document.documentElement.style.setProperty( '--button-color', newval );
			document.documentElement.style.setProperty( '--button-text-color', text_color );
		} );
	} );

	/* Button Color Hover Option */
	wp.customize( 'tortuga_theme_options[button_hover_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color;

			if( isColorLight( newval ) ) {
				text_color = '#151515';
			} else {
				text_color = '#fff';
			}

			document.documentElement.style.setProperty( '--button-hover-color', newval );
			document.documentElement.style.setProperty( '--button-hover-text-color', text_color );
		} );
	} );

	/* Title Color Option */
	wp.customize( 'tortuga_theme_options[title_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--title-color', newval );
			document.documentElement.style.setProperty( '--page-border-color', newval );
		} );
	} );

	/* Title Hover Option */
	wp.customize( 'tortuga_theme_options[title_hover_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--title-hover-color', newval );
		} );
	} );

	/* Widget Title Color Option */
	wp.customize( 'tortuga_theme_options[widget_title_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--widget-title-color', newval );
			document.documentElement.style.setProperty( '--widget-border-color', newval );
		} );
	} );

	/* Footer Widgets Color Option */
	wp.customize( 'tortuga_theme_options[footer_widgets_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color, link_color, link_hover_color;

			if( isColorLight( newval ) ) {
				text_color = '#151515';
				link_color = 'rgba(0, 0, 0, 0.8)';
				link_hover_color = 'rgba(0, 0, 0, 0.5)';
			} else {
				text_color = '#fff';
				link_color = 'rgba(255, 255, 255, 0.85)';
				link_hover_color = 'rgba(255, 255, 255, 0.6)';
			}

			document.documentElement.style.setProperty( '--footer-widgets-background-color', newval );
			document.documentElement.style.setProperty( '--footer-widgets-text-color', text_color );
			document.documentElement.style.setProperty( '--footer-widgets-link-color', link_color );
			document.documentElement.style.setProperty( '--footer-widgets-link-hover-color', link_hover_color );
		} );
	} );

	/* Footer Line Color Option */
	wp.customize( 'tortuga_theme_options[footer_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color, link_color, link_hover_color;

			if( isColorLight( newval ) ) {
				text_color = 'rgba(0, 0, 0, 0.6)';
				link_color = '#151515';
				link_hover_color = 'rgba(0, 0, 0, 0.6)';
			} else {
				text_color = 'rgba(255, 255, 255, 0.6)';
				link_color = '#fff';
				link_hover_color = 'rgba(255, 255, 255, 0.6)';
			}

			document.documentElement.style.setProperty( '--footer-background-color', newval );
			document.documentElement.style.setProperty( '--footer-text-color', text_color );
			document.documentElement.style.setProperty( '--footer-link-color', link_color );
			document.documentElement.style.setProperty( '--footer-link-hover-color', link_hover_color );
		} );
	} );

	/* Text Font */
	wp.customize( 'tortuga_theme_options[text_font]', function( value ) {
		value.bind( function( newval ) {

			// Load Font in Customizer.
			loadCustomFont( newval, 'text-font' );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			document.documentElement.style.setProperty( '--text-font', newFont );
		} );
	} );

	/* Title Font */
	wp.customize( 'tortuga_theme_options[title_font]', function( value ) {
		value.bind( function( newval ) {

			// Load Font in Customizer.
			loadCustomFont( newval, 'title-font' );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			document.documentElement.style.setProperty( '--title-font', newFont );
		} );
	} );

	/* Title Font Weight */
	wp.customize( 'tortuga_theme_options[title_is_bold]', function( value ) {
		value.bind( function( newval ) {
			var fontWeight = newval ? 'bold' : 'normal';
			document.documentElement.style.setProperty( '--title-font-weight', fontWeight );
		} );
	} );

	/* Title Text Transform */
	wp.customize( 'tortuga_theme_options[title_is_uppercase]', function( value ) {
		value.bind( function( newval ) {
			var textTransform = newval ? 'uppercase' : 'none';
			document.documentElement.style.setProperty( '--title-text-transform', textTransform );
		} );
	} );

	/* Navi Font */
	wp.customize( 'tortuga_theme_options[navi_font]', function( value ) {
		value.bind( function( newval ) {

			// Load Font in Customizer.
			loadCustomFont( newval, 'navi-font' );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			document.documentElement.style.setProperty( '--navi-font', newFont );
		} );
	} );

	/* Navi Font Weight */
	wp.customize( 'tortuga_theme_options[navi_is_bold]', function( value ) {
		value.bind( function( newval ) {
			var fontWeight = newval ? 'bold' : 'normal';
			document.documentElement.style.setProperty( '--navi-font-weight', fontWeight );
		} );
	} );

	/* Navi Text Transform */
	wp.customize( 'tortuga_theme_options[navi_is_uppercase]', function( value ) {
		value.bind( function( newval ) {
			var textTransform = newval ? 'uppercase' : 'none';
			document.documentElement.style.setProperty( '--navi-text-transform', textTransform );
		} );
	} );

	/* Widget Title Font */
	wp.customize( 'tortuga_theme_options[widget_title_font]', function( value ) {
		value.bind( function( newval ) {

			// Load Font in Customizer.
			loadCustomFont( newval, 'widget-title-font' );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			document.documentElement.style.setProperty( '--widget-title-font', newFont );
		} );
	} );

	/* Widget Title Font Weight */
	wp.customize( 'tortuga_theme_options[widget_title_is_bold]', function( value ) {
		value.bind( function( newval ) {
			var fontWeight = newval ? 'bold' : 'normal';
			document.documentElement.style.setProperty( '--widget-title-font-weight', fontWeight );
		} );
	} );

	/* Widget Title Text Transform */
	wp.customize( 'tortuga_theme_options[widget_title_is_uppercase]', function( value ) {
		value.bind( function( newval ) {
			var textTransform = newval ? 'uppercase' : 'none';
			document.documentElement.style.setProperty( '--widget-title-text-transform', textTransform );
		} );
	} );

	function hideElement( element ) {
		$( element ).css({
			clip: 'rect(1px, 1px, 1px, 1px)',
			position: 'absolute',
			width: '1px',
			height: '1px',
			overflow: 'hidden'
		});
	}

	function showElement( element ) {
		$( element ).css({
			clip: 'auto',
			position: 'relative',
			width: 'auto',
			height: 'auto',
			overflow: 'visible'
		});
	}

	function hexdec( hexString ) {
		hexString = ( hexString + '' ).replace( /[^a-f0-9]/gi, '' );
		return parseInt( hexString, 16 );
	}

	function getColorBrightness( hexColor ) {

		// Remove # string.
		hexColor = hexColor.replace( '#', '' );

		// Convert into RGB.
		var r = hexdec( hexColor.substring( 0, 2 ) );
		var g = hexdec( hexColor.substring( 2, 4 ) );
		var b = hexdec( hexColor.substring( 4, 6 ) );

		return ( ( ( r * 299 ) + ( g * 587 ) + ( b * 114 ) ) / 1000 );
	}

	function isColorLight( hexColor ) {
		return ( getColorBrightness( hexColor ) > 130 );
	}

	function isColorDark( hexColor ) {
		return ( getColorBrightness( hexColor ) <= 130 );
	}

	function loadCustomFont( font, type ) {
		var fontFile = font.split( " " ).join( "+" );
		var fontFileURL = "https://fonts.googleapis.com/css?family=" + fontFile + ":400,700";

		var fontStylesheet = "<link id='tortuga-pro-custom-" + type + "' href='" + fontFileURL + "' rel='stylesheet' type='text/css'>";
		var checkLink = $( "head" ).find( "#tortuga-pro-custom-" + type ).length;

		if (checkLink > 0) {
			$( "head" ).find( "#tortuga-pro-custom-" + type ).remove();
		}
		$( "head" ).append( fontStylesheet );
	}

} )( jQuery );
