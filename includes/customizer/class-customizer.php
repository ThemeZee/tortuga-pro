<?php
/***
 * Customizer
 *
 * Setup the Customizer and theme options for the Pro plugin
 *
 * @package Tortuga Pro
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Use class to avoid namespace collisions
if ( ! class_exists( 'Tortuga_Pro_Customizer' ) ) :

class Tortuga_Pro_Customizer {

	/**
	 * Customizer Setup
	 *
	 * @return void
	*/
	static function setup() {
		
		// Return early if Tortuga Theme is not active
		if ( ! current_theme_supports( 'tortuga-pro'  ) ) {
			return;
		}
		
		// Enqueue scripts and styles in the Customizer
		add_action( 'customize_preview_init', array( __CLASS__, 'customize_preview_js' ) );
		add_action( 'customize_controls_print_styles', array( __CLASS__, 'customize_preview_css' ) );
		
		// Remove Upgrade section
		remove_action( 'customize_register', 'tortuga_customize_register_upgrade_settings' );
	}
	
	/**
	 * Get saved user settings from database or plugin defaults
	 *
	 * @return array
	 */
	static function get_theme_options() {
		
		// Merge Theme Options Array from Database with Default Options Array
		$theme_options = wp_parse_args( 
			
			// Get saved theme options from WP database
			get_option( 'tortuga_theme_options', array() ), 
			
			// Merge with Default Options if setting was not saved yet
			self::get_default_options() 
			
		);

		// Return theme options
		return $theme_options;
		
	}


	/**
	 * Returns the default settings of the plugin
	 *
	 * @return array
	 */
	static function get_default_options() {

		$default_options = array(
			'header_logo' 						=> '',
			'logo_spacing'						=> 10,
			'header_spacing'					=> 10,
			'footer_text'						=> '',
			'credit_link' 						=> true,
			'top_navi_color'					=> '#383838',
			'header_color'						=> '#303030',
			'navi_color'						=> '#dd5533',
			'title_color'						=> '#dd5533',
			'link_color'						=> '#dd5533',
			'widget_title_color'				=> '#dd5533',
			'widget_link_color'					=> '#dd5533',
			'footer_widgets_color'				=> '#383838',
			'footer_color'						=> '#303030',
			'text_font' 						=> 'Open Sans',
			'title_font' 						=> 'Titillium Web',
			'navi_font' 						=> 'Titillium Web',
			'widget_title_font' 				=> 'Titillium Web',
			'available_fonts'					=> 'favorites'
		);
		
		return $default_options;
		
	}
	
	/**
	 * Embed JS file to make Theme Customizer preview reload changes asynchronously.
	 *
	 * @return void
	 */
	static function customize_preview_js() {
		
		wp_enqueue_script( 'tortuga-pro-customizer-js', TORTUGA_PRO_PLUGIN_URL . 'assets/js/customizer.js', array( 'customize-preview' ), TORTUGA_PRO_VERSION, true );
	
	}

	/**
	 * Embed CSS styles for the theme options in the Customizer
	 *
	 * @return void
	 */
	static function customize_preview_css() {
		
		wp_enqueue_style( 'tortuga-pro-customizer-css', TORTUGA_PRO_PLUGIN_URL . 'assets/css/customizer.css', array(), TORTUGA_PRO_VERSION );
	
	}

}

// Run Class
add_action( 'init', array( 'Tortuga_Pro_Customizer', 'setup' ) );

endif;