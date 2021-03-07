<?php
/**
 * Customizer
 *
 * Setup the Customizer and theme options for the Pro plugin
 *
 * @package Tortuga Pro
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Customizer Class
 */
class Tortuga_Pro_Customizer {

	/**
	 * Customizer Setup
	 *
	 * @return void
	 */
	static function setup() {

		// Return early if Tortuga Theme is not active.
		if ( ! current_theme_supports( 'tortuga-pro' ) ) {
			return;
		}

		// Enqueue scripts and styles in the Customizer.
		add_action( 'customize_preview_init', array( __CLASS__, 'customize_preview_js' ) );
		add_action( 'customize_controls_print_styles', array( __CLASS__, 'customize_preview_css' ) );

		// Remove Upgrade section.
		remove_action( 'customize_register', 'tortuga_customize_register_upgrade_settings' );
	}

	/**
	 * Get saved user settings from database or plugin defaults
	 *
	 * @return array
	 */
	static function get_theme_options() {

		// Merge Theme Options Array from Database with Default Options Array.
		return wp_parse_args( get_option( 'tortuga_theme_options', array() ), self::get_default_options() );
	}


	/**
	 * Returns the default settings of the plugin
	 *
	 * @return array
	 */
	static function get_default_options() {

		$default_options = array(
			'header_logo'               => '',
			'logo_spacing'              => 10,
			'header_spacing'            => 10,
			'header_search'             => false,
			'author_bio'                => false,
			'scroll_to_top'             => false,
			'footer_text'               => '',
			'credit_link'               => true,
			'primary_color'             => '#cc5555',
			'secondary_color'           => '#5d7b94',
			'tertiary_color'            => '#90aec7',
			'accent_color'              => '#60945d',
			'highlight_color'           => '#915d94',
			'light_gray_color'          => '#f0f0f0',
			'gray_color'                => '#999999',
			'dark_gray_color'           => '#303030',
			'top_navi_color'            => '#383838',
			'header_color'              => '#303030',
			'navi_color'                => '#dd5533',
			'title_color'               => '#dd5533',
			'link_color'                => '#dd5533',
			'widget_title_color'        => '#dd5533',
			'footer_widgets_color'      => '#383838',
			'footer_color'              => '#303030',
			'text_font'                 => 'Open Sans',
			'title_font'                => 'Titillium Web',
			'title_is_bold'             => false,
			'title_is_uppercase'        => true,
			'navi_font'                 => 'Titillium Web',
			'navi_is_bold'              => false,
			'navi_is_uppercase'         => true,
			'widget_title_font'         => 'Titillium Web',
			'widget_title_is_bold'      => false,
			'widget_title_is_uppercase' => true,
		);

		return $default_options;
	}

	/**
	 * Embed JS file to make Theme Customizer preview reload changes asynchronously.
	 *
	 * @return void
	 */
	static function customize_preview_js() {
		wp_enqueue_script( 'tortuga-pro-customizer-js', TORTUGA_PRO_PLUGIN_URL . 'assets/js/customize-preview.js', array( 'customize-preview' ), '20210215', true );
	}

	/**
	 * Embed CSS styles for the theme options in the Customizer
	 *
	 * @return void
	 */
	static function customize_preview_css() {
		wp_enqueue_style( 'tortuga-pro-customizer-css', TORTUGA_PRO_PLUGIN_URL . 'assets/css/customizer.css', array(), '20210212' );
	}
}

// Run Class.
add_action( 'init', array( 'Tortuga_Pro_Customizer', 'setup' ) );
