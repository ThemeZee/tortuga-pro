<?php
/**
 * Header Spacing
 *
 * Adds header spacing settings and CSS
 *
 * @package Tortuga Pro
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Header Spacing Class
 */
class Tortuga_Pro_Header_Spacing {

	/**
	 * Site Logo Setup
	 *
	 * @return void
	 */
	static function setup() {

		// Return early if Tortuga Theme is not active.
		if ( ! current_theme_supports( 'tortuga-pro' ) ) {
			return;
		}

		// Replace default site title function with new site logo function.
		remove_action( 'tortuga_site_title', 'tortuga_site_title' );
		add_action( 'tortuga_site_title', array( __CLASS__, 'display_site_logo' ) );

		// Add Custom Spacing CSS code to custom stylesheet output.
		add_filter( 'tortuga_pro_custom_css_stylesheet', array( __CLASS__, 'custom_spacing_css' ) );

		// Add Site Logo Settings.
		add_action( 'customize_register', array( __CLASS__, 'header_settings' ) );
	}

	/**
	 * Display Site Logo if user uploaded a logo image or shows Site Title as default if not
	 * Hooks into the tortuga_site_title action hook in the on header area.
	 */
	static function display_site_logo() {

		// Get Theme Options from Database.
		$theme_options = Tortuga_Pro_Customizer::get_theme_options();
		?>

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">

		<?php // Display Logo Image or Site Title.
		if ( isset( $theme_options['header_logo'] ) and '' !== $theme_options['header_logo'] ) : ?>

				<img class="site-logo" src="<?php echo esc_url( $theme_options['header_logo'] ); ?>" alt="<?php esc_attr( bloginfo( 'name' ) ); ?>" />

		<?php else : ?>

				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>

		<?php endif; ?>

		</a>

		<?php
	}

	/**
	 * Adds custom Margin CSS styling for the logo and navigation spacing
	 *
	 * @param String $custom_css Custom Styling CSS.
	 * @return string CSS code
	 */
	static function custom_spacing_css( $custom_css ) {

		// Get Theme Options from Database.
		$theme_options = Tortuga_Pro_Customizer::get_theme_options();

		// Set Logo Spacing.
		if ( 10 !== $theme_options['logo_spacing'] ) {

			$margin = $theme_options['logo_spacing'] / 10;

			$custom_css .= '
				.site-branding {
					margin: '. $margin .'em 0;
				}
				';

		}

		// Set Navigation Spacing.
		if ( 10 !== $theme_options['header_spacing'] ) {

			$margin = $theme_options['header_spacing'] / 10;

			$custom_css .= '
				@media only screen and (min-width: 60em) {

					.header-main {
						padding-top: '. $margin .'em;
						padding-bottom: '. $margin .'em;
					}

				}
				';

		}

		return $custom_css;

	}

	/**
	 * Adds site logo settings
	 *
	 * @param object $wp_customize / Customizer Object.
	 */
	static function header_settings( $wp_customize ) {

		// Add Section for Header Spacing.
		$wp_customize->add_section( 'tortuga_pro_section_header', array(
			'title'    => __( 'Header Settings', 'tortuga-pro' ),
			'priority' => 20,
			'panel' => 'tortuga_options_panel',
			)
		);

		// Add Upload logo image setting for WordPress 4.4 and earlier.
		if ( ! current_theme_supports( 'custom-logo' ) ) :

			$wp_customize->add_setting( 'tortuga_theme_options[header_logo]', array(
				'default'           => '',
				'type'           	=> 'option',
				'transport'         => 'refresh',
				'sanitize_callback' => 'esc_url',
				)
			);
			$wp_customize->add_control( new WP_Customize_Image_Control(
				$wp_customize, 'tortuga_theme_options[header_logo]', array(
					'label'    => __( 'Logo Image (replaces Site Title)', 'tortuga-pro' ),
					'section'  => 'tortuga_pro_section_header',
					'settings' => 'tortuga_theme_options[header_logo]',
					'priority' => 1,
				)
			) );

		endif;

		// Add Logo Spacing setting.
		$wp_customize->add_setting( 'tortuga_theme_options[logo_spacing]', array(
			'default'           => 10,
			'type'           	=> 'option',
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control( 'tortuga_theme_options[logo_spacing]', array(
			'label'    => __( 'Logo Spacing (default: 10)', 'tortuga-pro' ),
			'section'  => 'tortuga_pro_section_header',
			'settings' => 'tortuga_theme_options[logo_spacing]',
			'type'     => 'text',
			'priority' => 2,
			)
		);

		// Add Header Spacing setting.
		$wp_customize->add_setting( 'tortuga_theme_options[header_spacing]', array(
			'default'           => 10,
			'type'           	=> 'option',
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
			)
		);
		$wp_customize->add_control( 'tortuga_theme_options[header_spacing]', array(
			'label'    => __( 'Header Spacing (default: 10)', 'tortuga-pro' ),
			'section'  => 'tortuga_pro_section_header',
			'settings' => 'tortuga_theme_options[header_spacing]',
			'type'     => 'text',
			'priority' => 3,
			)
		);

	}
}

// Run Class.
add_action( 'init', array( 'Tortuga_Pro_Header_Spacing', 'setup' ) );
