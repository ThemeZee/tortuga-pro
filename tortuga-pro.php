<?php
/*
Plugin Name: Tortuga Pro
Plugin URI: http://themezee.com/addons/tortuga-pro/
Description: Adds additional features like footer widgets, custom colors, fonts and logo upload to the Tortuga theme.
Author: ThemeZee
Author URI: https://themezee.com/
Version: 1.0.1
Text Domain: tortuga-pro
Domain Path: /languages/
License: GPL v3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Tortuga Pro
Copyright(C) 2015, ThemeZee.com - support@themezee.com

*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

// Use class to avoid namespace collisions
if ( ! class_exists( 'Tortuga_Pro' ) ) :


/**
 * Main Tortuga_Pro Class
 *
 * @package Tortuga Pro
 */
class Tortuga_Pro {

	/**
	 * Call all Functions to setup the Plugin
	 *
	 * @uses Tortuga_Pro::constants() Setup the constants needed
	 * @uses Tortuga_Pro::includes() Include the required files
	 * @uses Tortuga_Pro::setup_actions() Setup the hooks and actions
	 * @return void
	 */
	static function setup() {
	
		// Setup Constants
		self::constants();
		
		// Setup Translation
		add_action( 'plugins_loaded', array( __CLASS__, 'translation' ) );
	
		// Include Files
		self::includes();
		
		// Setup Action Hooks
		self::setup_actions();
		
	}
	
	/**
	 * Setup plugin constants
	 *
	 * @return void
	 */
	static function constants() {
		
		// Define Plugin Name
		define( 'TORTUGA_PRO_NAME', 'Tortuga Pro' );

		// Define Version Number
		define( 'TORTUGA_PRO_VERSION', '1.0' );
		
		// Define Plugin Name
		define( 'TORTUGA_PRO_PRODUCT_ID', 56518 );

		// Define Update API URL
		define( 'TORTUGA_PRO_STORE_API_URL', 'https://themezee.com' ); 

		// Plugin Folder Path
		define( 'TORTUGA_PRO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

		// Plugin Folder URL
		define( 'TORTUGA_PRO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

		// Plugin Root File
		define( 'TORTUGA_PRO_PLUGIN_FILE', __FILE__ );
		
	}
	
	/**
	 * Load Translation File
	 *
	 * @return void
	 */
	static function translation() {

		load_plugin_textdomain( 'tortuga-pro', false, dirname( plugin_basename( TORTUGA_PRO_PLUGIN_FILE ) ) . '/languages/' );
		
	}
	
	/**
	 * Include required files
	 *
	 * @return void
	 */
	static function includes() {
	
		// Include Admin Classes
		require_once TORTUGA_PRO_PLUGIN_DIR . '/includes/admin/class-plugin-updater.php';
		require_once TORTUGA_PRO_PLUGIN_DIR . '/includes/admin/class-settings.php';
		require_once TORTUGA_PRO_PLUGIN_DIR . '/includes/admin/class-settings-page.php';
		require_once TORTUGA_PRO_PLUGIN_DIR . '/includes/admin/class-admin-notices.php';
		
		// Include Customizer Classes
		require_once TORTUGA_PRO_PLUGIN_DIR . '/includes/customizer/class-customizer.php';
		
		// Include Pro Features
		require_once TORTUGA_PRO_PLUGIN_DIR . '/includes/modules/class-custom-colors.php';
		require_once TORTUGA_PRO_PLUGIN_DIR . '/includes/modules/class-custom-fonts.php';
		require_once TORTUGA_PRO_PLUGIN_DIR . '/includes/modules/class-footer-line.php';
		require_once TORTUGA_PRO_PLUGIN_DIR . '/includes/modules/class-footer-widgets.php';
		require_once TORTUGA_PRO_PLUGIN_DIR . '/includes/modules/class-header-bar.php';
		require_once TORTUGA_PRO_PLUGIN_DIR . '/includes/modules/class-site-logo.php';
		
		// Include Custom Stylesheet class
		require_once TORTUGA_PRO_PLUGIN_DIR . '/includes/class-custom-stylesheet.php';

	}
	
	/**
	 * Setup Action Hooks
	 *
	 * @see https://codex.wordpress.org/Function_Reference/add_action WordPress Codex
	 * @return void
	 */
	static function setup_actions() {
		
		// Enqueue Frontend Widget Styles
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'enqueue_styles' ) );
		
		// Add Settings link to Plugin actions
		add_filter( 'plugin_action_links_' . plugin_basename( TORTUGA_PRO_PLUGIN_FILE ), array( __CLASS__, 'plugin_action_links' ) );
		
		// Add automatic plugin updater from ThemeZee Store API
		add_action( 'admin_init', array( __CLASS__, 'plugin_updater' ), 0 );
		
	}

	/**
	 * Enqueue Styles
	 *
	 * @return void
	 */
	static function enqueue_styles() {

		// Return early if Tortuga Theme is not active
		if ( ! current_theme_supports( 'tortuga-pro'  ) ) {
			return;
		}
		
		// Enqueue Plugin Stylesheet
		wp_enqueue_style( 'tortuga-pro', TORTUGA_PRO_PLUGIN_URL . 'assets/css/tortuga-pro.css', array(), TORTUGA_PRO_VERSION );
		
	}
	
	/**
	 * Add Settings link to the plugin actions
	 *
	 * @return array $actions Plugin action links
	 */
	static function plugin_action_links( $actions ) {

		$settings_link = array( 'settings' => sprintf( '<a href="%s">%s</a>', admin_url( 'themes.php?page=tortuga-pro' ), __( 'Settings', 'tortuga-pro' ) ) );
		
		return array_merge( $settings_link, $actions );
	}
	
	/**
	 * Plugin Updater
	 *
	 * @return void
	 */
	static function plugin_updater() {

		if( ! is_admin() ) :
			return;
		endif;
		
		$options = Tortuga_Pro_Settings::instance();

		if( $options->get( 'license_key' ) <> '' ) :
			
			$license_key = $options->get( 'license_key' );
			
			// setup the updater
			$tortuga_pro_updater = new Tortuga_Pro_Plugin_Updater( TORTUGA_PRO_STORE_API_URL, __FILE__, array(
					'version' 	=> TORTUGA_PRO_VERSION,
					'license' 	=> $license_key,
					'item_name' => TORTUGA_PRO_NAME,
					'item_id'   => TORTUGA_PRO_PRODUCT_ID,
					'author' 	=> 'ThemeZee'
				)
			);
			
		endif;
		
	}
	
}

// Run Plugin
Tortuga_Pro::setup();

endif;