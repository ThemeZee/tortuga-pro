/**
 * Customizer JS
 *
 * Reloads changes on Theme Customizer Preview asynchronously for better usability
 *
 * @package Tortuga Pro
 */

( function( $ ) {

	/* Link & Button Color Option */
	wp.customize( 'tortuga_theme_options[link_color]', function( value ) {
		value.bind( function( newval ) {
			$('.entry-content a, .entry-content a:link, .entry-content a:visited, .comments-area a:link, .comments-area a:visited, .breadcrumbs a:link, .breadcrumbs a:visited')
				.css('color', newval );
			$('.entry-content a, .comments-area a, .breadcrumbs a')
				.hover( function() { $( this ).css( 'color', '#303030' ); },
						function() { $( this ).css( 'color', newval ); }
				);
			$('button, input[type="button"], input[type="reset"], input[type="submit"], .more-link, .post-navigation .nav-links a, .post-pagination .current, .post-slider-controls .zeeflex-direction-nav a, .tzwb-social-icons .social-icons-menu li a')
				.css( 'background', newval );
			$('button, input[type="button"], input[type="reset"], input[type="submit"], .more-link, .post-navigation .nav-links a, .post-pagination .current, .post-slider-controls .zeeflex-direction-nav a, .tzwb-social-icons .social-icons-menu li a')
				.hover( function() { $( this ).css( 'background', '#303030' ); },
						function() { $( this ).css( 'background', newval ); }
				);
			$('.entry-tags .meta-tags a, .post-pagination a')
				.hover( function() { $( this ).css( 'background', newval ); },
						function() { $( this ).css( 'background', '#303030' ); }
				);
		} );
	} );
	
	/* Top Navigation Color Option */
	wp.customize( 'tortuga_theme_options[top_navi_color]', function( value ) {
		value.bind( function( newval ) {
			$('.header-bar-wrap, .top-navigation-menu ul')
				.css( 'background', newval );
		} );
	} );
	
	/* Header Color Option */
	wp.customize( 'tortuga_theme_options[header_color]', function( value ) {
		value.bind( function( newval ) {
			$('.site-header, .main-navigation-menu ul')
				.css( 'background', newval );
		} );
	} );
	
	/* Title Color Option */
	wp.customize( 'tortuga_theme_options[title_color]', function( value ) {
		value.bind( function( newval ) {
			$('.archive-title, .page-title, .entry-title, .entry-title a:link, .entry-title a:visited, .comments-header .comments-title, .comment-reply-title span')
				.css('color', newval );
			$('.archive-title, .page-title, .entry-title, .entry-title a:link, .entry-title a:visited, .comments-header .comments-title, .comment-reply-title span')
				.hover( function() { $( this ).css( 'color', '#303030' ); },
						function() { $( this ).css( 'color', newval ); }
				);
			$('.page-header, .type-post, .type-page, .type-attachment, .comments-area')
				.css( 'border-color', newval );
		} );
	} );
	
	/* Widget Title Color Option */
	wp.customize( 'tortuga_theme_options[widget_title_color]', function( value ) {
		value.bind( function( newval ) {
			$('.widget-title, .widget-title a:link, .widget-title a:visited')
				.not( $('.footer-widgets .widget-title') )
				.css('color', newval );
			$('.tzwb-tabbed-content .tzwb-tabnavi li a')
				.hover( function() { $( this ).css('background', newval ); },
						function() { $( this ).css('background', '#303030' ); }
				);
			$('.tzwb-tabbed-content .tzwb-tabnavi li a.current-tab')
				.css( 'background', newval );
			$('.widget, .widget-magazine-posts-columns .magazine-posts-columns .magazine-posts-columns-content')
				.css( 'border-color', newval );		
		} );
	} );
	
	/* Widget Link Color Option */
	wp.customize( 'tortuga_theme_options[widget_link_color]', function( value ) {
		value.bind( function( newval ) {
			$('.sidebar .widget a:link, .sidebar .widget a:visited')
				.not( $('.sidebar .widget_tag_cloud .tagcloud a, .sidebar .widget .entry-meta a, .tzwb-tabbed-content .tzwb-tabnavi li a, .tzwb-social-icons .social-icons-menu li a, .footer-widgets .widget a') )
				.css('color', newval );
			$('.sidebar .widget a')
				.not( $('.sidebar .widget_tag_cloud .tagcloud a, .sidebar .widget .entry-meta a, .tzwb-tabbed-content .tzwb-tabnavi li a, .tzwb-social-icons .social-icons-menu li a, .footer-widgets .widget a') )
				.hover( function() { $( this ).css('color', '#303030' ); },
						function() { $( this ).css('color', newval ); }
				);
			$('.sidebar .widget_tag_cloud .tagcloud a')
				.hover( function() { $( this ).css('background', newval ); },
						function() { $( this ).css('background', '#303030' ); }
				);
			$('.tzwb-social-icons .social-icons-menu li a')
				.css('background', newval );
			$('.tzwb-social-icons .social-icons-menu li a')
				.hover( function() { $( this ).css('background', '#303030' ); },
						function() { $( this ).css('background', newval ); }
				);
				
		} );
	} );
	
	/* Footer Widgets Color Option */
	wp.customize( 'tortuga_theme_options[footer_widgets_color]', function( value ) {
		value.bind( function( newval ) {
			$('.footer-widgets-background')
				.css('background', newval );
		} );
	} );
	
	/* Footer Line Color Option */
	wp.customize( 'tortuga_theme_options[footer_color]', function( value ) {
		value.bind( function( newval ) {
			$('.footer-wrap')
				.css('background', newval );
		} );
	} );
	
	
	/* Theme Fonts */	
	wp.customize( 'tortuga_theme_options[text_font]', function( value ) {
		value.bind( function( newval ) {
		
			// Embed Font
			var fontFamilyUrl = newval.split(" ").join("+");
			var googleFontPath = "http://fonts.googleapis.com/css?family="+fontFamilyUrl+":400,700";
			var googleFontSource = "<link id='tortuga-pro-custom-text-font' href='"+googleFontPath+"' rel='stylesheet' type='text/css'>";					
			var checkLink = $("head").find("#tortuga-pro-custom-text-font").length;
			
			if (checkLink > 0) {
				$("head").find("#tortuga-pro-custom-text-font").remove();
			}
			$("head").append(googleFontSource);
			
			// Set CSS
			$('body, button, input, select, textarea')
				.css('font-family', newval );
				
		} );
	} );
	
	wp.customize( 'tortuga_theme_options[title_font]', function( value ) {
		value.bind( function( newval ) {
		
			// Embed Font
			var fontFamilyUrl = newval.split(" ").join("+");
			var googleFontPath = "http://fonts.googleapis.com/css?family="+fontFamilyUrl+":400,700";
			var googleFontSource = "<link id='tortuga-pro-custom-title-font' href='"+googleFontPath+"' rel='stylesheet' type='text/css'>";					
			var checkLink = $("head").find("#tortuga-pro-custom-title-font").length;
			
			if (checkLink > 0) {
				$("head").find("#tortuga-pro-custom-title-font").remove();
			}
			$("head").append(googleFontSource);
			
			// Set CSS
			$('.site-title, .archive-title, .page-title, .entry-title, .comments-header .comments-title, .comment-reply-title span')
				.css('font-family', newval );
				
		} );
	} );
	
	wp.customize( 'tortuga_theme_options[navi_font]', function( value ) {
		value.bind( function( newval ) {
		
			// Embed Font
			var fontFamilyUrl = newval.split(" ").join("+");
			var googleFontPath = "http://fonts.googleapis.com/css?family="+fontFamilyUrl+":400,700";
			var googleFontSource = "<link id='tortuga-pro-custom-navi-font' href='"+googleFontPath+"' rel='stylesheet' type='text/css'>";					
			var checkLink = $("head").find("#tortuga-pro-custom-navi-font").length;
			
			if (checkLink > 0) {
				$("head").find("#tortuga-pro-custom-navi-font").remove();
			}
			$("head").append(googleFontSource);
			
			// Set CSS
			$('.top-navigation-menu a, .main-navigation-menu a, .footer-navigation-menu a')
				.css('font-family', newval );
				
		} );
	} );
	
	wp.customize( 'tortuga_theme_options[widget_title_font]', function( value ) {
		value.bind( function( newval ) {
		
			// Embed Font
			var fontFamilyUrl = newval.split(" ").join("+");
			var googleFontPath = "http://fonts.googleapis.com/css?family="+fontFamilyUrl+":400,700";
			var googleFontSource = "<link id='tortuga-pro-custom-widget-title-font' href='"+googleFontPath+"' rel='stylesheet' type='text/css'>";					
			var checkLink = $("head").find("#tortuga-pro-custom-widget-title-font").length;
			
			if (checkLink > 0) {
				$("head").find("#tortuga-pro-custom-widget-title-font").remove();
			}
			$("head").append(googleFontSource);
			
			// Set CSS
			$('.widget-title')
				.css('font-family', newval );
				
		} );
	} );

} )( jQuery );