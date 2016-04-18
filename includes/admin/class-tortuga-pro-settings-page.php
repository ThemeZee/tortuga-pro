<?php
/***
 * Tortuga Pro Settings Page Class
 *
 * Adds a new tab on the themezee plugins page and displays the settings page.
 *
 * @package Tortuga Pro
 */
 
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


// Use class to avoid namespace collisions
if ( ! class_exists('Tortuga_Pro_Settings_Page') ) :

class Tortuga_Pro_Settings_Page {

	/**
	 * Setup the Settings Page class
	 *
	 * @return void
	*/
	static function setup() {
		
		// Add settings page to appearance menu
		add_action( 'admin_menu', array( __CLASS__, 'add_settings_page' ), 12 );
		
		// Enqueue Settings CSS
		add_action( 'admin_enqueue_scripts', array( __CLASS__, 'settings_page_css' ) );
	}
	
	/**
	 * Add Settings Page to Admin menu
	 *
	 * @return void
	*/
	static function add_settings_page() {
	
		// Return early if Tortuga Theme is not active
		if ( ! current_theme_supports( 'tortuga-pro'  ) ) {
			return;
		}
			
		add_theme_page(
			esc_html__( 'Pro Version', 'tortuga-pro' ),
			esc_html__( 'Pro Version', 'tortuga-pro' ),
			'manage_options',
			'tortuga-pro',
			array( __CLASS__, 'display_settings_page' )
		);
		
	}
	
	/**
	 * Display settings page
	 *
	 * @return void
	*/
	static function display_settings_page() { 
		
		// Get Theme Details from style.css
		$theme = wp_get_theme(); 
	
		ob_start();
		?>

		<div class="wrap pro-version-wrap">

			<h1><?php echo TORTUGA_PRO_NAME; ?> <?php echo TORTUGA_PRO_VERSION; ?></h1>
			
			<div id="tortuga-pro-settings" class="tortuga-pro-settings-wrap">
				
				<form class="tortuga-pro-settings-form" method="post" action="options.php">
					<?php
						settings_fields( 'tortuga_pro_settings' );
						do_settings_sections( 'tortuga_pro_settings' );
					?>
				</form>
				
				<p><?php printf( __( 'You can find your license keys and manage your active sites in your <a href="%s" target="_blank">ThemeZee.com account</a>.', 'tortuga-pro' ), 'https://themezee.com/license-keys/?utm_source=plugin-settings&utm_medium=textlink&utm_campaign=tortuga-pro&utm_content=license-keys' ); ?></p>
				
			</div>
			
		</div>
<?php
		echo ob_get_clean();
	}
	
	/**
	 * Enqueues CSS for Settings page
	 *
	 * @return void
	*/
	static function settings_page_css( $hook ) { 

		// Load styles and scripts only on theme info page
		if ( 'appearance_page_tortuga-pro' != $hook ) {
			return;
		}
		
		// Embed theme info css style
		wp_enqueue_style( 'tortuga-pro-settings-css', plugins_url('/assets/css/settings.css', dirname( dirname(__FILE__) ) ), array(), TORTUGA_PRO_VERSION );

	}
	
}

// Run Tortuga Pro Settings Page Class
Tortuga_Pro_Settings_Page::setup();

endif;