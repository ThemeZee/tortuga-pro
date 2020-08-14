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

	/* Link & Button Color Option */
	wp.customize( 'tortuga_theme_options[link_color]', function( value ) {
		value.bind( function( newval ) {
			var custom_css;

			custom_css = 'a, a:link, a:visited { color: ' + newval + '; }';
			custom_css += 'a:hover, a:focus, a:active { color: #303030; }';

			custom_css += 'button, input[type="button"], input[type="reset"], input[type="submit"], .more-link, .entry-tags .meta-tags a:hover, .entry-tags .meta-tags a:active, .widget_tag_cloud .tagcloud a:hover, .widget_tag_cloud .tagcloud a:active, .post-navigation .nav-links a, .pagination a:hover, .pagination a:active, .pagination .current, .infinite-scroll #infinite-handle span:hover, .post-slider-controls .zeeflex-direction-nav a, .tzwb-social-icons .social-icons-menu li a, .tzwb-tabbed-content .tzwb-tabnavi li a:hover, .tzwb-tabbed-content .tzwb-tabnavi li a:active, .tzwb-tabbed-content .tzwb-tabnavi li a.current-tab, .scroll-to-top-button, .scroll-to-top-button:focus, .scroll-to-top-button:active { color: #fff; background: ' + newval + '; }';
			custom_css += 'button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, button:focus, input[type="button"]:focus, input[type="reset"]:focus, input[type="submit"]:focus, button:active, input[type="button"]:active, input[type="reset"]:active, input[type="submit"]:active, .more-link:hover, .more-link:focus, .more-link:active, .post-navigation .nav-links a:hover, .post-navigation .nav-links a:active, .post-slider-controls .zeeflex-direction-nav a:hover, .tzwb-social-icons .social-icons-menu li a:hover, .scroll-to-top-button:hover { background: #303030; }';
			custom_css += 'blockquote { border-left-color: ' + newval + '; }';

			addColorStyles( custom_css, 1 );

			custom_css = '.footer-widgets .widget_tag_cloud .tagcloud a:hover, .footer-widgets .widget_tag_cloud .tagcloud a:active, .footer-widgets .tzwb-tabbed-content .tzwb-tabnavi li a:hover, .footer-widgets .tzwb-tabbed-content .tzwb-tabnavi li a:active, .footer-widgets .tzwb-tabbed-content .tzwb-tabnavi li a.current-tab { color: #fff; background: ' + newval + '; }';
			addColorStyles( custom_css, 8 );

			$( '.has-primary-color' ).css( 'color', newval );
			$( '.has-primary-background-color' ).css( 'background-color', newval );
		} );
	} );

	/* Top Navigation Color Option */
	wp.customize( 'tortuga_theme_options[top_navi_color]', function( value ) {
		value.bind( function( newval ) {
			var custom_css, text_color, hover_color, bg_color, border_color;

			custom_css = '.header-bar-wrap, .top-navigation ul ul { background: ' + newval + '; }';

			if( isColorLight( newval ) ) {
				text_color = '#303030';
				hover_color = 'rgba(0,0,0,0.6)';
				bg_color = 'rgba(0,0,0,0.10)';
				border_color = 'rgba(0,0,0,0.15)';
			} else {
				text_color = '#ffffff';
				hover_color = 'rgba(255,255,255,0.6)';
				bg_color = 'rgba(255,255,255,0.10)';
				border_color = 'rgba(255,255,255,0.15)';
			}

			custom_css += '.header-bar-wrap, .top-navigation ul a, .top-navigation ul a:link, .top-navigation ul a:visited, .secondary-menu-toggle, .secondary-menu-toggle:focus, .top-navigation .dropdown-toggle, .top-navigation ul .menu-item-has-children > a, .header-bar .social-icons-menu li a, .header-bar .social-icons-menu li a:link, .header-bar .social-icons-menu li a:visited { color: ' + text_color + '; }';
			custom_css += '.secondary-menu-toggle .icon, .top-navigation .dropdown-toggle .icon, .top-navigation ul .menu-item-has-children > a > .icon { fill: ' + text_color + '; }';
			custom_css += '.header-bar .social-icons-menu li a:hover, .header-bar .social-icons-menu li a:active { color: ' + hover_color + '; }';
			custom_css += '.top-navigation ul .menu-item-has-children > a:hover > .icon { fill: ' + hover_color + '; }';
			custom_css += '.top-navigation ul a:hover, .top-navigation ul a:active, .secondary-menu-toggle:hover, .secondary-menu-toggle:active, .top-navigation .dropdown-toggle:hover, .top-navigation .dropdown-toggle:active, .top-navigation ul .menu-item-has-children > a:hover { background: ' + bg_color + '; }';
			custom_css += '.top-navigation ul, .top-navigation ul a, .top-navigation ul ul, .top-navigation ul ul a, .top-navigation ul ul li:last-child > a { border-color: ' + border_color + '; }';

			addColorStyles( custom_css, 2 );
		} );
	} );

	/* Header Color Option */
	wp.customize( 'tortuga_theme_options[header_color]', function( value ) {
		value.bind( function( newval ) {
			var custom_css, text_color, hover_color, bg_color, border_color;

			custom_css = '.site-header, .main-navigation ul ul { background: ' + newval + '; }';

			if( isColorLight( newval ) ) {
				text_color = '#303030';
				hover_color = 'rgba(0,0,0,0.6)';
				bg_color = 'rgba(0,0,0,0.05)';
				border_color = 'rgba(0,0,0,0.2)';
			} else {
				text_color = '#ffffff';
				hover_color = 'rgba(255,255,255,0.6)';
				bg_color = 'rgba(0,0,0,0.15)';
				border_color = 'rgba(255,255,255,0.2)';
			}

			custom_css += '.primary-navigation-wrap { background: ' + bg_color + '; }';
			custom_css += '.site-header, .site-title, .site-title a:link, .site-title a:visited, .primary-navigation-wrap, .main-navigation ul a, .main-navigation ul a:link, .main-navigation ul a:visited, .main-navigation ul .submenu-dropdown-toggle, .header-search .header-search-icon { color: ' + text_color + '; }';
			custom_css += '.site-title a:hover, .site-title a:active, .header-search .header-search-icon:hover, .header-search .header-search-icon:active { color: ' + hover_color + '; }';
			custom_css += '.main-navigation .dropdown-toggle .icon, .main-navigation ul .menu-item-has-children > a > .icon { fill: ' + text_color + '; }';
			custom_css += '.main-navigation .dropdown-toggle:hover .icon, .main-navigation .dropdown-toggle:active .icon, .main-navigation ul .menu-item-has-children > a:hover > .icon, .main-navigation ul .menu-item-has-children > a:active > .icon { fill: ' + hover_color + '; }';
			custom_css += '.main-navigation ul a:hover, .main-navigation ul a:active, .main-navigation ul li.current-menu-item > a, .main-navigation ul .submenu-dropdown-toggle:hover, .main-navigation ul .submenu-dropdown-toggle:active { color: #fff; }';
			custom_css += '.main-navigation ul a, .main-navigation ul ul a, .main-navigation ul ul li:last-child a { border-color: ' + border_color + '; }';
			custom_css += '.main-navigation ul li ul ul { border-left-color: ' + border_color + '; }';

			addColorStyles( custom_css, 3 );
		} );
	} );

	/* Navigation Color Option */
	wp.customize( 'tortuga_theme_options[navi_color]', function( value ) {
		value.bind( function( newval ) {
			var custom_css, text_color;

			custom_css = '.primary-navigation-wrap, .main-navigation ul, .main-navigation ul ul { border-color: ' + newval + '; }';
			custom_css += '.main-navigation ul a:hover, .main-navigation ul a:active, .main-navigation ul li.current-menu-item > a, .primary-menu-toggle, .primary-menu-toggle:active, .primary-menu-toggle:focus, .primary-menu-toggle:hover, .main-navigation .dropdown-toggle:hover, .main-navigation .dropdown-toggle:active, .main-navigation ul .menu-item-has-children > a:hover, .main-navigation ul .menu-item-has-children > a:active { background: ' + newval + '; }';

			if( isColorLight( newval ) ) {
				text_color = '#303030';
			} else {
				text_color = '#ffffff';
			}

			custom_css += '.primary-menu-toggle, .main-navigation ul a:hover, .main-navigation ul a:active, .main-navigation ul li.current-menu-item > a, .main-navigation ul .submenu-dropdown-toggle:hover, .main-navigation ul .submenu-dropdown-toggle:active { color: ' + text_color + '; }';
			custom_css += '.primary-menu-toggle .icon, .main-navigation .dropdown-toggle:hover .icon, .main-navigation .dropdown-toggle:active .icon, .main-navigation ul .menu-item-has-children > a:hover > .icon, .main-navigation ul .menu-item-has-children > a:active > .icon { fill: ' + text_color + '; }';
			addColorStyles( custom_css, 4 );
		} );
	} );

	/* Title Color Option */
	wp.customize( 'tortuga_theme_options[title_color]', function( value ) {
		value.bind( function( newval ) {
			var custom_css;

			custom_css = '.archive-title, .page-title, .entry-title, .entry-title a:link, .entry-title a:visited, .comments-header .comments-title, .comment-reply-title span { color: ' + newval + '; }';
			custom_css += '.entry-title a:hover, .entry-title a:active { color: #303030; }';
			custom_css += '.page-header, .type-post, .type-page, .type-attachment, .comments-area { border-color: ' + newval + '; }';

			addColorStyles( custom_css, 5 );
		} );
	} );

	/* Widget Title Color Option */
	wp.customize( 'tortuga_theme_options[widget_title_color]', function( value ) {
		value.bind( function( newval ) {
			var custom_css;

			custom_css = '.widget-title, .widget-title a:link, .widget-title a:visited { color: ' + newval + '; }';
			custom_css += '.widget-title a:hover, .widget-title a:active { color: #303030; }';
			custom_css += '.widget, .widget-magazine-posts-columns .magazine-posts-columns .magazine-posts-columns-content { border-color: ' + newval + '; }';

			addColorStyles( custom_css, 6 );
		} );
	} );

	/* Footer Widgets Color Option */
	wp.customize( 'tortuga_theme_options[footer_widgets_color]', function( value ) {
		value.bind( function( newval ) {
			var custom_css, text_color, link_color, hover_color, bg_color,
				button_color = '#dd5533';

			if( typeof wp.customize.value( 'tortuga_theme_options[link_color]' ) !== 'undefined' ) {
				button_color = wp.customize.value( 'tortuga_theme_options[link_color]' ).get();
			}

			custom_css = '.footer-widgets-background { background: ' + newval + '; }';

			if( isColorLight( newval ) ) {
				text_color = '#303030';
				link_color = 'rgba(0,0,0,0.85)';
				hover_color = 'rgba(0,0,0,0.6)';
				bg_color = 'rgba(0,0,0,0.15)';
			} else {
				text_color = '#ffffff';
				link_color = 'rgba(255,255,255,0.85)';
				hover_color = 'rgba(255,255,255,0.6)';
				bg_color = 'rgba(255,255,255,0.05)';
			}

			custom_css += '.footer-widgets .widget, .footer-widgets .widget-title, .footer-widgets .entry-meta, .footer-widgets .widget_tag_cloud .tagcloud a { color: ' + text_color + '; }';
			custom_css += '.footer-widgets .widget a:link, .footer-widgets .widget a:visited { color: ' + link_color + '; }';
			custom_css += '.footer-widgets .widget a:hover, .footer-widgets .widget a:active { color: ' + hover_color + '; }';
			custom_css += '.footer-widgets .tzwb-social-icons .social-icons-menu li a { color: #fff; }';
			custom_css += '.footer-widgets .widget_tag_cloud .tagcloud a, .footer-widgets .tzwb-tabbed-content .tzwb-tabnavi li a, .footer-widgets .tzwb-social-icons .social-icons-menu li a:hover { color: ' + text_color + '; background: ' + bg_color + '; }';
			custom_css += '.footer-widgets .widget_tag_cloud .tagcloud a:hover, .footer-widgets .widget_tag_cloud .tagcloud a:active, .footer-widgets .tzwb-tabbed-content .tzwb-tabnavi li a:hover, .footer-widgets .tzwb-tabbed-content .tzwb-tabnavi li a:active, .footer-widgets .tzwb-tabbed-content .tzwb-tabnavi li a.current-tab { color: #fff; background: ' + button_color + '; }';

			addColorStyles( custom_css, 7 );
		} );
	} );

	/* Footer Line Color Option */
	wp.customize( 'tortuga_theme_options[footer_color]', function( value ) {
		value.bind( function( newval ) {
			var custom_css, text_color, hover_color;

			custom_css = '.footer-wrap { background: ' + newval + '; }';

			if( isColorLight( newval ) ) {
				text_color = '#303030';
				hover_color = 'rgba(0,0,0,0.6)';
			} else {
				text_color = '#ffffff';
				hover_color = 'rgba(255,255,255,0.6)';
			}

			custom_css += '.site-footer a:link, .site-footer a:visited { border-color: ' + hover_color + '; }';
			custom_css += '.site-footer a:link, .site-footer a:visited { color: ' + text_color + '; }';
			custom_css += '.site-footer, .site-footer a:hover, .site-footer a:focus, .site-footer a:active { color: ' + hover_color + '; }';

			addColorStyles( custom_css, 9 );
		} );
	} );

	/* Theme Fonts */
	wp.customize( 'tortuga_theme_options[text_font]', function( value ) {
		value.bind( function( newval ) {

			// Embed Font.
			var fontFamilyUrl = newval.split( " " ).join( "+" );
			var googleFontPath = "https://fonts.googleapis.com/css?family=" + fontFamilyUrl + ":400,700";
			var googleFontSource = "<link id='tortuga-pro-custom-text-font' href='" + googleFontPath + "' rel='stylesheet' type='text/css'>";
			var checkLink = $( "head" ).find( "#tortuga-pro-custom-text-font" ).length;

			if (checkLink > 0) {
				$( "head" ).find( "#tortuga-pro-custom-text-font" ).remove();
			}
			$( "head" ).append( googleFontSource );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			$( 'body, button, input, select, textarea' )
				.css( 'font-family', newFont );

		} );
	} );

	wp.customize( 'tortuga_theme_options[title_font]', function( value ) {
		value.bind( function( newval ) {

			// Embed Font.
			var fontFamilyUrl = newval.split( " " ).join( "+" );
			var googleFontPath = "https://fonts.googleapis.com/css?family=" + fontFamilyUrl + ":400,700";
			var googleFontSource = "<link id='tortuga-pro-custom-title-font' href='" + googleFontPath + "' rel='stylesheet' type='text/css'>";
			var checkLink = $( "head" ).find( "#tortuga-pro-custom-title-font" ).length;

			if (checkLink > 0) {
				$( "head" ).find( "#tortuga-pro-custom-title-font" ).remove();
			}
			$( "head" ).append( googleFontSource );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			$( '.site-title, .archive-title, .page-title, .entry-title, .comments-header .comments-title, .comment-reply-title span' )
				.css( 'font-family', newFont );

		} );
	} );

	wp.customize( 'tortuga_theme_options[navi_font]', function( value ) {
		value.bind( function( newval ) {

			// Embed Font.
			var fontFamilyUrl = newval.split( " " ).join( "+" );
			var googleFontPath = "https://fonts.googleapis.com/css?family=" + fontFamilyUrl + ":400,700";
			var googleFontSource = "<link id='tortuga-pro-custom-navi-font' href='" + googleFontPath + "' rel='stylesheet' type='text/css'>";
			var checkLink = $( "head" ).find( "#tortuga-pro-custom-navi-font" ).length;

			if (checkLink > 0) {
				$( "head" ).find( "#tortuga-pro-custom-navi-font" ).remove();
			}
			$( "head" ).append( googleFontSource );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			$( '.top-navigation ul a, .main-navigation ul a, .footer-navigation-menu a' )
				.css( 'font-family', newFont );

		} );
	} );

	wp.customize( 'tortuga_theme_options[widget_title_font]', function( value ) {
		value.bind( function( newval ) {

			// Embed Font.
			var fontFamilyUrl = newval.split( " " ).join( "+" );
			var googleFontPath = "https://fonts.googleapis.com/css?family=" + fontFamilyUrl + ":400,700";
			var googleFontSource = "<link id='tortuga-pro-custom-widget-title-font' href='" + googleFontPath + "' rel='stylesheet' type='text/css'>";
			var checkLink = $( "head" ).find( "#tortuga-pro-custom-widget-title-font" ).length;

			if (checkLink > 0) {
				$( "head" ).find( "#tortuga-pro-custom-widget-title-font" ).remove();
			}
			$( "head" ).append( googleFontSource );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			$( '.widget-title' )
				.css( 'font-family', newFont );

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

	function writeColorStyles() {
		for( var i = 1; i < 10; i++) {
			$( 'head' ).append( '<style id="tortuga-pro-colors-' + i + '"></style>' );
		}
	}

	function addColorStyles( colorRules, priority ) {

		// Write Color Styles if they do not exist.
		if ( ! $( '#tortuga-pro-colors-1' ).length ) {
			writeColorStyles();
		}

		$( '#tortuga-pro-colors-' + priority ).html( colorRules );
	}

} )( jQuery );
