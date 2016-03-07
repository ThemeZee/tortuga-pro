<?php
/***
 * Custom Colors
 *
 * Adds color settings to Customizer and generates color CSS code
 *
 * @package Tortuga Pro
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Use class to avoid namespace collisions
if ( ! class_exists( 'Tortuga_Pro_Custom_Colors' ) ) :

class Tortuga_Pro_Custom_Colors {

	/**
	 * Custom Colors Setup
	 *
	 * @return void
	*/
	static function setup() {
		
		// Return early if Tortuga Theme is not active
		if ( ! current_theme_supports( 'tortuga-pro'  ) ) {
			return;
		}
		
		// Add Custom Color CSS code to custom stylesheet output
		add_filter( 'tortuga_pro_custom_css_stylesheet', array( __CLASS__, 'custom_colors_css' ) ); 
		
		// Add Custom Color Settings
		add_action( 'customize_register', array( __CLASS__, 'color_settings' ) );

	}
	
	/**
	 * Adds Color CSS styles in the head area to override default colors
	 *
	 */
	static function custom_colors_css( $custom_css ) { 
		
		// Get Theme Options from Database
		$theme_options = Tortuga_Pro_Customizer::get_theme_options();
		
		// Get Default Fonts from settings
		$default_options = Tortuga_Pro_Customizer::get_default_options();

		// Set Color CSS Variable
		$color_css = '';
		
		/* Set Link Color */
		if ( $theme_options['link_color'] != $default_options['link_color'] ) { 
		
			$color_css .= '
				/* Link and Button Color Setting */
				a,
				a:link,
				a:visited {
					color: '. $theme_options['link_color'] .';
				}

				a:hover,
				a:focus,
				a:active {
					color: #303030;
				}
				
				button,
				input[type="button"],
				input[type="reset"],
				input[type="submit"],
				.more-link,
				.entry-tags .meta-tags a:hover, 
				.entry-tags .meta-tags a:active,
				.post-navigation .nav-links a,
				.post-pagination a:hover,
				.post-pagination a:active,
				.post-pagination .current,
				.infinite-scroll #infinite-handle span:hover,
				.post-slider-controls .zeeflex-direction-nav a,
				.tzwb-social-icons .social-icons-menu li a {
					color: #fff;
					background: '. $theme_options['link_color'] .';
				}
				
				button:hover,
				input[type="button"]:hover,
				input[type="reset"]:hover,
				input[type="submit"]:hover,
				button:focus,
				input[type="button"]:focus,
				input[type="reset"]:focus,
				input[type="submit"]:focus,
				button:active,
				input[type="button"]:active,
				input[type="reset"]:active,
				input[type="submit"]:active,
				.more-link:hover,
				.more-link:focus,
				.more-link:active,
				.post-navigation .nav-links a:hover, 
				.post-navigation .nav-links a:active,
				.post-slider-controls .zeeflex-direction-nav a:hover,
				.tzwb-social-icons .social-icons-menu li a:hover {
					background: #303030;
				}
				';
				
		}
		
		// Set Top Navigation Color
		if ( $theme_options['top_navi_color'] != $default_options['top_navi_color'] ) { 
		
			$color_css .= '
				/* Top Navigation Color Setting */
				.header-bar-wrap, 
				.top-navigation-menu ul {
					background: '. $theme_options['top_navi_color'] .';
				}';
				
		}
		
		// Set Primary Navigation Color
		if ( $theme_options['header_color'] != $default_options['header_color'] ) { 
		
			$color_css .= '
				/* Header Color Setting */
				.site-header,
				.main-navigation-menu ul {
					background: '. $theme_options['header_color'] .';
				}';
				
		}
		
		// Set Secondary Navigation Color
		if ( $theme_options['navi_color'] != $default_options['navi_color'] ) { 
		
			$color_css .= '
				/* Navigation Color Setting */
				.primary-navigation-wrap,
				.main-navigation-menu ul {
					border-color: '. $theme_options['navi_color'] .';
				}
				
				.main-navigation-menu a:hover,
				.main-navigation-menu a:active,
				.main-navigation-menu li.current-menu-item > a {
					background: '. $theme_options['navi_color'] .';
				}
												
				@media only screen and (max-width: 60em) {
					
					.main-navigation-toggle,
					.main-navigation-toggle:active,
					.main-navigation-toggle:focus,
					.main-navigation-toggle:hover,
					.main-navigation-menu .submenu-dropdown-toggle:hover,
					.main-navigation-menu .submenu-dropdown-toggle:active {
						background: '. $theme_options['navi_color'] .';
					}
					
					.main-navigation-menu {
						border-color: '. $theme_options['navi_color'] .';
					}
					
				}
				';
				
		}
		
		// Set Primary Post Color
		if ( $theme_options['title_color'] != $default_options['title_color'] ) { 
		
			$color_css .= '
				/* Post Titles Primary Color Setting */
				.archive-title, 
				.page-title, 
				.entry-title, 
				.entry-title a:link, 
				.entry-title a:visited,
				.comments-header .comments-title,
				.comment-reply-title span {
					color: '. $theme_options['title_color'] .';
				}
				
				.entry-title a:hover, 
				.entry-title a:active{
					color: #303030;
				}
				
				.page-header,
				.type-post, 
				.type-page, 
				.type-attachment,
				.comments-area  {
					border-color: '. $theme_options['title_color'] .';
				}
				';
				
		}
		
		// Set Widget Title Color
		if ( $theme_options['widget_title_color'] != $default_options['widget_title_color'] ) { 
		
			$color_css .= '
				/* Widget Titles Color Setting */
				.widget,
				.widget-magazine-posts-columns .magazine-posts-columns .magazine-posts-columns-content {
					border-color: '. $theme_options['widget_title_color'] .';
				}
				
				.widget-title,
				.widget-title a:link,
				.widget-title a:visited {
					color: '. $theme_options['widget_title_color'] .';
				}
				
				.widget-title a:hover, 
				.widget-title a:active  {
					color: #303030;
				}
				
				.tzwb-tabbed-content .tzwb-tabnavi li a:hover, 
				.tzwb-tabbed-content .tzwb-tabnavi li a:active,
				.tzwb-tabbed-content .tzwb-tabnavi li a.current-tab {
					background: '. $theme_options['widget_title_color'] .';
				}
				';
				
		}
		
		// Set Widget Link Color
		if ( $theme_options['widget_link_color'] != $default_options['widget_link_color'] ) { 
		
			$color_css .= '
				/* Widget Links Color Setting */
				.sidebar .widget a:link,
				.sidebar .widget a:visited {
					color: '. $theme_options['widget_link_color'] .';
				}
				
				.sidebar .widget a:hover,
				.sidebar .widget a:active,
				.sidebar .widget .entry-meta a:link,
				.sidebar .widget .entry-meta a:visited {
					color: #303030;
				}
				
				.sidebar .widget .entry-meta a:hover,
				.sidebar .widget .entry-meta a:active {
					color: #777;
				}
				
				.sidebar .widget_tag_cloud .tagcloud a:link, 
				.sidebar .widget_tag_cloud .tagcloud a:visited {
					color: #fff;
				}
					
				.sidebar .widget_tag_cloud .tagcloud a:hover, 
				.sidebar .widget_tag_cloud .tagcloud a:active,
				.tzwb-social-icons .social-icons-menu li a {
					color: #fff;
					background: '. $theme_options['widget_link_color'] .';
				}

				.tzwb-social-icons .social-icons-menu li a:hover {
					background: #303030;
				}
				';
		}
		
		// Set Footer Widgets Color
		if ( $theme_options['footer_widgets_color'] != $default_options['footer_widgets_color'] ) { 
		
			$color_css .= '
				/* Footer Widget Color Setting */
				.footer-widgets-background {
					background: '. $theme_options['footer_widgets_color'] .';
				}
				';
				
		}
		
		// Set Footer Line Color
		if ( $theme_options['footer_color'] != $default_options['footer_color'] ) { 
		
			$color_css .= '
				/* Footer Line Color Setting */
				.footer-wrap {
					background: '. $theme_options['footer_color'] .';
				}
				';
				
		}
		
		$color_css = $color_css <> '' ? $color_css : '/* No Custom Colors settings were saved */';
		$custom_css .= $color_css;
		
		return $custom_css;
		
	}
	
	/**
	 * Adds all color settings in the Customizer
	 *
	 * @param object $wp_customize / Customizer Object
	 */
	static function color_settings( $wp_customize ) {

		// Add Section for Theme Colors
		$wp_customize->add_section( 'tortuga_pro_section_colors', array(
			'title'    => __( 'Theme Colors', 'tortuga-pro' ),
			'priority' => 60,
			'panel' => 'tortuga_options_panel' 
			)
		);
		
		// Get Default Colors from settings
		$default_options = Tortuga_Pro_Customizer::get_default_options();
		
		// Add Top Navigation Color setting
		$wp_customize->add_setting( 'tortuga_theme_options[top_navi_color]', array(
			'default'           => $default_options['top_navi_color'],
			'type'           	=> 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 'tortuga_theme_options[top_navi_color]', array(
				'label'      => _x( 'Top Navigation', 'color setting', 'tortuga-pro' ),
				'section'    => 'tortuga_pro_section_colors',
				'settings'   => 'tortuga_theme_options[top_navi_color]',
				'priority' => 1
			) ) 
		);
		
		// Add Navigation Primary Color setting
		$wp_customize->add_setting( 'tortuga_theme_options[header_color]', array(
			'default'           => $default_options['header_color'],
			'type'           	=> 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 'tortuga_theme_options[header_color]', array(
				'label'      => _x( 'Header', 'color setting', 'tortuga-pro' ),
				'section'    => 'tortuga_pro_section_colors',
				'settings'   => 'tortuga_theme_options[header_color]',
				'priority' => 2
			) ) 
		);
		
		// Add Navigation Secondary Color setting
		$wp_customize->add_setting( 'tortuga_theme_options[navi_color]', array(
			'default'           => $default_options['navi_color'],
			'type'           	=> 'option',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 'tortuga_theme_options[navi_color]', array(
				'label'      => _x( 'Navigation', 'color setting', 'tortuga-pro' ),
				'section'    => 'tortuga_pro_section_colors',
				'settings'   => 'tortuga_theme_options[navi_color]',
				'priority' => 3
			) ) 
		);
		
		// Add Post Primary Color setting
		$wp_customize->add_setting( 'tortuga_theme_options[title_color]', array(
			'default'           => $default_options['title_color'],
			'type'           	=> 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 'tortuga_theme_options[title_color]', array(
				'label'      => _x( 'Post Titles', 'color setting', 'tortuga-pro' ),
				'section'    => 'tortuga_pro_section_colors',
				'settings'   => 'tortuga_theme_options[title_color]',
				'priority' => 4
			) ) 
		);
		
		// Add Link and Button Color setting
		$wp_customize->add_setting( 'tortuga_theme_options[link_color]', array(
			'default'           => $default_options['link_color'],
			'type'           	=> 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 'tortuga_theme_options[link_color]', array(
				'label'      => _x( 'Links and Buttons', 'color setting', 'tortuga-pro' ),
				'section'    => 'tortuga_pro_section_colors',
				'settings'   => 'tortuga_theme_options[link_color]',
				'priority' => 5
			) ) 
		);
		
		// Add Widget Title Color setting
		$wp_customize->add_setting( 'tortuga_theme_options[widget_title_color]', array(
			'default'           => $default_options['widget_title_color'],
			'type'           	=> 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 'tortuga_theme_options[widget_title_color]', array(
				'label'      => _x( 'Widget Titles', 'color setting', 'tortuga-pro' ),
				'section'    => 'tortuga_pro_section_colors',
				'settings'   => 'tortuga_theme_options[widget_title_color]',
				'priority' => 6
			) ) 
		);
		
		// Add Widget Title Color setting
		$wp_customize->add_setting( 'tortuga_theme_options[widget_link_color]', array(
			'default'           => $default_options['widget_link_color'],
			'type'           	=> 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 'tortuga_theme_options[widget_link_color]', array(
				'label'      => _x( 'Widget Links', 'color setting', 'tortuga-pro' ),
				'section'    => 'tortuga_pro_section_colors',
				'settings'   => 'tortuga_theme_options[widget_link_color]',
				'priority' => 7
			) ) 
		);
		
		// Add Footer Widgets Color setting
		$wp_customize->add_setting( 'tortuga_theme_options[footer_widgets_color]', array(
			'default'           => $default_options['footer_widgets_color'],
			'type'           	=> 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 'tortuga_theme_options[footer_widgets_color]', array(
				'label'      => _x( 'Footer Widgets', 'color setting', 'tortuga-pro' ),
				'section'    => 'tortuga_pro_section_colors',
				'settings'   => 'tortuga_theme_options[footer_widgets_color]',
				'priority' => 8
			) ) 
		);
		
		// Add Footer Line Color setting
		$wp_customize->add_setting( 'tortuga_theme_options[footer_color]', array(
			'default'           => $default_options['footer_color'],
			'type'           	=> 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color'
			)
		);
		$wp_customize->add_control( new WP_Customize_Color_Control( 
			$wp_customize, 'tortuga_theme_options[footer_color]', array(
				'label'      => _x( 'Footer Widgets', 'color setting', 'tortuga-pro' ),
				'section'    => 'tortuga_pro_section_colors',
				'settings'   => 'tortuga_theme_options[footer_color]',
				'priority' => 9
			) ) 
		);
		
	}

}

// Run Class
add_action( 'init', array( 'Tortuga_Pro_Custom_Colors', 'setup' ) );

endif;