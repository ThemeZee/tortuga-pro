<?php
/**
 * Footer Line
 *
 * Displays credit link and footer text based on theme options
 * Registers and displays footer navigation
 *
 * @package Tortuga Pro
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Footer Line Class
 */
class Tortuga_Pro_Footer_Line {

	/**
	 * Footer Line Setup
	 *
	 * @return void
	 */
	static function setup() {

		// Return early if Tortuga Theme is not active.
		if ( ! current_theme_supports( 'tortuga-pro' ) ) {
			return;
		}

		// Remove default footer text function and replace it with new one.
		remove_action( 'tortuga_footer_text', 'tortuga_footer_text' );
		add_action( 'tortuga_footer_text', array( __CLASS__, 'footer_text' ) );

		// Add Footer Settings in Customizer.
		add_action( 'customize_register', array( __CLASS__, 'footer_settings' ) );

		// Display footer navigation.
		add_action( 'tortuga_footer_menu', array( __CLASS__, 'display_footer_menu' ) );

	}

	/**
	 * Displays Credit Link and user defined Footer Text based on theme settings.
	 *
	 * @return void
	 */
	static function footer_text() {

		// Get Theme Options from Database.
		$theme_options = Tortuga_Pro_Customizer::get_theme_options();

		// Display Footer Text.
		if ( '' !== $theme_options['footer_text'] ) :

			echo do_shortcode( wp_kses_post( $theme_options['footer_text'] ) );

		endif;

		// Call Credit Link function of theme if credit link is activated.
		if ( true === $theme_options['credit_link'] ) :

			if ( function_exists( 'tortuga_footer_text' ) ) :

				tortuga_footer_text();

			endif;

		endif;

	}

	/**
	 * Display footer navigation menu
	 *
	 * @return void
	 */
	static function display_footer_menu() {

		echo '<nav id="footer-links" class="footer-navigation navigation clearfix" role="navigation">';

		wp_nav_menu( array(
			'theme_location' => 'footer',
			'container' => false,
			'menu_class' => 'footer-navigation-menu',
			'echo' => true,
			'fallback_cb' => '',
			'depth' => 1,
			)
		);

		echo '</nav><!-- #footer-links -->';

	}

	/**
	 * Adds footer text and credit link setting
	 *
	 * @param object $wp_customize / Customizer Object.
	 */
	static function footer_settings( $wp_customize ) {

		// Add Sections for Footer Settings.
		$wp_customize->add_section( 'tortuga_pro_section_footer', array(
			'title'    => __( 'Footer Settings', 'tortuga-pro' ),
			'priority' => 90,
			'panel' => 'tortuga_options_panel',
			)
		);

		// Add Footer Text setting.
		$wp_customize->add_setting( 'tortuga_theme_options[footer_text]', array(
			'default'           => '',
			'type'           	=> 'option',
			'transport'         => 'refresh',
			'sanitize_callback' => array( __CLASS__, 'sanitize_footer_text' ),
			)
		);
		$wp_customize->add_control( 'tortuga_theme_options[footer_text]', array(
			'label'    => __( 'Footer Text', 'tortuga-pro' ),
			'section'  => 'tortuga_pro_section_footer',
			'settings' => 'tortuga_theme_options[footer_text]',
			'type'     => 'textarea',
			'priority' => 1,
			)
		);

		// Add Credit Link setting.
		$wp_customize->add_setting( 'tortuga_theme_options[credit_link]', array(
			'default'           => true,
			'type'           	=> 'option',
			'transport'         => 'refresh',
			'sanitize_callback' => 'tortuga_sanitize_checkbox',
			)
		);
		$wp_customize->add_control( 'tortuga_theme_options[credit_link]', array(
			'label'    => __( 'Display Credit Link to ThemeZee on footer line', 'tortuga-pro' ),
			'section'  => 'tortuga_pro_section_footer',
			'settings' => 'tortuga_theme_options[credit_link]',
			'type'     => 'checkbox',
			'priority' => 2,
			)
		);

	}

	/**
	 *  Sanitize footer content textarea
	 *
	 * @param String $value / Value of the setting.
	 * @return string
	 */
	static function sanitize_footer_text( $value ) {

		if ( current_user_can( 'unfiltered_html' ) ) :
			return $value;
		else :
			return stripslashes( wp_filter_post_kses( addslashes( $value ) ) );
		endif;
	}

	/**
	 * Register footer navigation menu
	 *
	 * @return void
	 */
	static function register_footer_menu() {

		// Return early if Tortuga Theme is not active.
		if ( ! current_theme_supports( 'tortuga-pro' ) ) {
			return;
		}

		register_nav_menu( 'footer', esc_html__( 'Footer Navigation', 'tortuga-pro' ) );

	}
}

// Run Class.
add_action( 'init', array( 'Tortuga_Pro_Footer_Line', 'setup' ) );

// Register footer navigation in backend.
add_action( 'after_setup_theme', array( 'Tortuga_Pro_Footer_Line', 'register_footer_menu' ), 20 );
