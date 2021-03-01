<?php
/**
 * Custom Colors
 *
 * Adds color settings to Customizer and generates color CSS code
 *
 * @package Tortuga Pro
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Custom Colors Class
 */
class Tortuga_Pro_Custom_Colors {

	/**
	 * Custom Colors Setup
	 *
	 * @return void
	 */
	static function setup() {

		// Return early if Tortuga Theme is not active.
		if ( ! current_theme_supports( 'tortuga-pro' ) ) {
			return;
		}

		// Add Custom Color CSS code to custom stylesheet output.
		add_filter( 'tortuga_pro_custom_css_stylesheet', array( __CLASS__, 'custom_colors_css' ) );

		// Add Custom Color Settings.
		add_action( 'customize_register', array( __CLASS__, 'color_settings' ) );
	}

	/**
	 * Adds Color CSS styles in the head area to override default colors
	 *
	 * @param String $custom_css Custom Styling CSS.
	 * @return string CSS code
	 */
	static function custom_colors_css( $custom_css ) {

		// Get Theme Options from Database.
		$theme_options = Tortuga_Pro_Customizer::get_theme_options();

		// Get Default Fonts from settings.
		$default_options = Tortuga_Pro_Customizer::get_default_options();

		// Color Variables.
		$color_variables = '';

		// Set Link Color.
		if ( $theme_options['link_color'] != $default_options['link_color'] ) {
			$color_variables .= '--page-background-color: ' . $theme_options['page_bg_color'] . ';';

			$custom_css .= '
				/* Link and Button Color Setting */
				a,
				a:link,
				a:visited,
				.has-primary-color {
					color: ' . $theme_options['link_color'] . ';
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
				.widget_tag_cloud .tagcloud a:hover,
				.widget_tag_cloud .tagcloud a:active,
				.post-navigation .nav-links a,
				.pagination a:hover,
				.pagination a:active,
				.pagination .current,
				.infinite-scroll #infinite-handle span:hover,
				.post-slider-controls .zeeflex-direction-nav a,
				.tzwb-social-icons .social-icons-menu li a,
				.tzwb-tabbed-content .tzwb-tabnavi li a:hover,
				.tzwb-tabbed-content .tzwb-tabnavi li a:active,
				.tzwb-tabbed-content .tzwb-tabnavi li a.current-tab,
				.scroll-to-top-button,
				.scroll-to-top-button:focus,
				.scroll-to-top-button:active {
					color: #fff;
					background: ' . $theme_options['link_color'] . ';
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
				.tzwb-social-icons .social-icons-menu li a:hover,
				.scroll-to-top-button:hover {
					background: #303030;
				}

				blockquote {
					border-left-color: ' . $theme_options['link_color'] . ';
				}

				.has-primary-background-color {
					background-color: ' . $theme_options['link_color'] . ';
				}
			';
		} // End if().

		// Set Top Navigation Color.
		if ( $theme_options['top_navi_color'] !== $default_options['top_navi_color'] ) {

			$custom_css .= '
				/* Top Navigation Color Setting */
				.header-bar-wrap,
				.top-navigation ul ul {
					background: ' . $theme_options['top_navi_color'] . ';
				}
			';

			// Check if a dark background color was chosen.
			if ( self::is_color_light( $theme_options['top_navi_color'] ) ) {
				$custom_css .= '
					.header-bar-wrap,
					.top-navigation ul a,
					.top-navigation ul a:link,
					.top-navigation ul a:visited,
					.secondary-menu-toggle,
					.secondary-menu-toggle:focus,
					.header-bar .social-icons-menu li a,
					.header-bar .social-icons-menu li a:link,
					.header-bar .social-icons-menu li a:visited {
					    color: #303030;
					}

					.header-bar .social-icons-menu li a:hover,
					.header-bar .social-icons-menu li a:active {
						color: rgba(0,0,0,0.6);
					}

					.top-navigation ul a:hover,
					.top-navigation ul a:active,
					.top-navigation ul a:focus,
					.secondary-menu-toggle:hover,
					.secondary-menu-toggle:active,
					.top-navigation .dropdown-toggle:hover,
					.top-navigation .dropdown-toggle:active,
					.top-navigation ul .menu-item-has-children > a:hover,
					.top-navigation ul .menu-item-has-children > a:active {
						background: rgba(0,0,0,0.1);
					}

					.top-navigation ul,
					.top-navigation ul a,
					.top-navigation ul ul,
					.top-navigation ul ul a,
					.top-navigation ul ul li:last-child > a {
						border-color: rgba(0,0,0,0.15);
					}

					.secondary-menu-toggle .icon,
					.top-navigation .dropdown-toggle .icon,
					.top-navigation ul .menu-item-has-children > a > .icon {
					    fill: #303030;
					}

					.top-navigation ul .menu-item-has-children > a:hover > .icon {
					    fill: rgba(0,0,0,0.6);
					}
				';
			} // End if().
		} // End if().

		// Set Header Color.
		if ( $theme_options['header_color'] !== $default_options['header_color'] ) {

			$custom_css .= '
				/* Header Color Setting */
				.site-header,
				.main-navigation ul ul {
					background: ' . $theme_options['header_color'] . ';
				}
			';

			// Check if a dark background color was chosen.
			if ( self::is_color_light( $theme_options['header_color'] ) ) {
				$custom_css .= '
					.primary-navigation-wrap {
						background: rgba(0,0,0,0.05);
					}

					.site-header,
					.site-title,
					.site-title a:link,
					.site-title a:visited,
					.primary-navigation-wrap,
					.main-navigation ul a,
					.main-navigation ul a:link,
					.main-navigation ul a:visited,
					.header-search .header-search-icon {
						color: #303030;
					}

					.site-title a:hover,
					.site-title a:active,
					.header-search .header-search-icon:hover,
					.header-search .header-search-icon:active {
						color: rgba(0,0,0,0.6);
					}

					.main-navigation ul a:hover,
					.main-navigation ul a:active,
					.main-navigation ul a:focus,
					.main-navigation ul li.current-menu-item > a {
						color: #fff;
					}

					.main-navigation .dropdown-toggle .icon,
					.main-navigation ul .menu-item-has-children > a > .icon {
					    fill: #303030;
					}

					.main-navigation .dropdown-toggle:hover .icon,
					.main-navigation .dropdown-toggle:active .icon,
					.main-navigation ul .menu-item-has-children > a:hover > .icon,
					.main-navigation ul .menu-item-has-children > a:active > .icon {
						fill: #fff;
					}

					.main-navigation ul a,
					.main-navigation ul ul a,
					.main-navigation ul ul li:last-child a {
						border-color: rgba(0,0,0,0.2);
					}

					.main-navigation ul li ul ul {
						border-left-color: rgba(0,0,0,0.2);
					}
				';
			} // End if().
		} // End if().

		// Set Navigation Color.
		if ( $theme_options['navi_color'] != $default_options['navi_color'] ) {

			$custom_css .= '
				/* Navigation Color Setting */
				.primary-navigation-wrap,
				.main-navigation ul,
				.main-navigation ul ul {
					border-color: ' . $theme_options['navi_color'] . ';
				}

				.main-navigation ul a:hover,
				.main-navigation ul a:active,
				.main-navigation ul a:focus,
				.main-navigation ul li.current-menu-item > a,
				.primary-menu-toggle,
				.primary-menu-toggle:active,
				.primary-menu-toggle:focus,
				.primary-menu-toggle:hover,
				.main-navigation .dropdown-toggle:hover,
				.main-navigation .dropdown-toggle:active,
				.main-navigation ul .menu-item-has-children > a:hover,
				.main-navigation ul .menu-item-has-children > a:active {
					background: ' . $theme_options['navi_color'] . ';
				}
			';

			// Check if a dark background color was chosen.
			if ( self::is_color_light( $theme_options['navi_color'] ) ) {
				$custom_css .= '
					.primary-menu-toggle,
					.main-navigation ul a:hover,
					.main-navigation ul a:active,
					.main-navigation ul a:focus,
					.main-navigation ul li.current-menu-item > a,
					.main-navigation .dropdown-toggle:hover,
					.main-navigation .dropdown-toggle:active,
					.main-navigation ul .menu-item-has-children > a:hover,
					.main-navigation ul .menu-item-has-children > a:active {
						color: #303030;
					}

					.primary-menu-toggle .icon,
					.main-navigation .dropdown-toggle:hover .icon,
					.main-navigation .dropdown-toggle:active .icon,
					.main-navigation ul .menu-item-has-children > a:hover > .icon,
					.main-navigation ul .menu-item-has-children > a:active > .icon {
						fill: #303030;
					}
				';
			} // End if().
		} // End if().

		// Set Primary Post Color.
		if ( $theme_options['title_color'] != $default_options['title_color'] ) {

			$custom_css .= '
				/* Post Titles Primary Color Setting */
				.archive-title,
				.page-title,
				.entry-title,
				.entry-title a:link,
				.entry-title a:visited,
				.comments-header .comments-title,
				.comment-reply-title span {
					color: ' . $theme_options['title_color'] . ';
				}

				.entry-title a:hover,
				.entry-title a:active {
					color: #303030;
				}

				.page-header,
				.type-post,
				.type-page,
				.type-attachment,
				.comments-area {
					border-color: ' . $theme_options['title_color'] . ';
				}
			';
		}

		// Set Widget Title Color.
		if ( $theme_options['widget_title_color'] != $default_options['widget_title_color'] ) {

			$custom_css .= '
				/* Widget Titles Color Setting */
				.widget,
				.widget-magazine-posts-columns .magazine-posts-columns .magazine-posts-columns-content {
					border-color: ' . $theme_options['widget_title_color'] . ';
				}

				.widget-title,
				.widget-title a:link,
				.widget-title a:visited {
					color: ' . $theme_options['widget_title_color'] . ';
				}

				.widget-title a:hover,
				.widget-title a:active  {
					color: #303030;
				}
			';
		}

		// Set Footer Widgets Color.
		if ( $theme_options['footer_widgets_color'] !== $default_options['footer_widgets_color'] ) {

			$custom_css .= '
				/* Top Navigation Color Setting */
				.footer-widgets-background {
					background: ' . $theme_options['footer_widgets_color'] . ';
				}
			';

			// Check if a dark background color was chosen.
			if ( self::is_color_light( $theme_options['footer_widgets_color'] ) ) {
				$custom_css .= '
					.footer-widgets .widget,
					.footer-widgets .widget-title,
					.footer-widgets .entry-meta,
					.footer-widgets .widget_tag_cloud .tagcloud a {
					    color: #303030;
					}

					.footer-widgets .widget a:link,
					.footer-widgets .widget a:visited  {
						color: rgba(0,0,0,0.85);
					}

					.footer-widgets .widget a:hover,
					.footer-widgets .widget a:active  {
						color: rgba(0,0,0,0.6);
					}

					.footer-widgets .tzwb-social-icons .social-icons-menu li a {
						color: #fff;
					}

					.footer-widgets .widget_tag_cloud .tagcloud a,
					.footer-widgets .tzwb-tabbed-content .tzwb-tabnavi li a,
					.footer-widgets .tzwb-social-icons .social-icons-menu li a:hover {
						color: #303030;
						background: rgba(0,0,0,0.05);
					}
				';
			} // End if().
		} // End if().

		// Set Link Color 2.
		if ( $theme_options['link_color'] != $default_options['link_color'] ) {

			$custom_css .= '
				.footer-widgets .widget_tag_cloud .tagcloud a:hover,
				.footer-widgets .widget_tag_cloud .tagcloud a:active,
				.footer-widgets .tzwb-tabbed-content .tzwb-tabnavi li a:hover,
				.footer-widgets .tzwb-tabbed-content .tzwb-tabnavi li a:active,
				.footer-widgets .tzwb-tabbed-content .tzwb-tabnavi li a.current-tab {
					color: #fff;
					background: ' . $theme_options['link_color'] . ';
				}
			';
		} // End if().

		// Set Footer Line Color.
		if ( $theme_options['footer_color'] !== $default_options['footer_color'] ) {

			$custom_css .= '
				/* Top Navigation Color Setting */
				.footer-wrap {
					background: ' . $theme_options['footer_color'] . ';
				}
			';

			// Check if a dark background color was chosen.
			if ( self::is_color_light( $theme_options['footer_color'] ) ) {
				$custom_css .= '
					.site-footer a:link,
					.site-footer a:visited {
						border-color: rgba(0,0,0,0.6);
						color: #303030;
					}

					.site-footer,
					.site-footer a:hover,
					.site-footer a:focus,
					.site-footer a:active {
						color: rgba(0,0,0,0.6);
					}
				';
			} // End if().
		} // End if().

		// Set Color Variables.
		if ( '' !== $color_variables ) {
			$custom_css .= ':root {' . $color_variables . '}';
		}

		return $custom_css;
	}

	/**
	 * Adds all color settings in the Customizer
	 *
	 * @param object $wp_customize / Customizer Object.
	 */
	static function color_settings( $wp_customize ) {

		// Add Section for Theme Colors.
		$wp_customize->add_section( 'tortuga_pro_section_colors', array(
			'title'    => __( 'Theme Colors', 'tortuga-pro' ),
			'priority' => 60,
			'panel'    => 'tortuga_options_panel',
		) );

		// Get Default Colors from settings.
		$default_options = Tortuga_Pro_Customizer::get_default_options();

		// Add Top Navigation Color setting.
		$wp_customize->add_setting( 'tortuga_theme_options[top_navi_color]', array(
			'default'           => $default_options['top_navi_color'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize, 'tortuga_theme_options[top_navi_color]', array(
				'label'    => _x( 'Top Navigation', 'color setting', 'tortuga-pro' ),
				'section'  => 'tortuga_pro_section_colors',
				'settings' => 'tortuga_theme_options[top_navi_color]',
				'priority' => 10,
			)
		) );

		// Add Navigation Primary Color setting.
		$wp_customize->add_setting( 'tortuga_theme_options[header_color]', array(
			'default'           => $default_options['header_color'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize, 'tortuga_theme_options[header_color]', array(
				'label'    => _x( 'Header', 'color setting', 'tortuga-pro' ),
				'section'  => 'tortuga_pro_section_colors',
				'settings' => 'tortuga_theme_options[header_color]',
				'priority' => 20,
			)
		) );

		// Add Navigation Secondary Color setting.
		$wp_customize->add_setting( 'tortuga_theme_options[navi_color]', array(
			'default'           => $default_options['navi_color'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize, 'tortuga_theme_options[navi_color]', array(
				'label'    => _x( 'Navigation', 'color setting', 'tortuga-pro' ),
				'section'  => 'tortuga_pro_section_colors',
				'settings' => 'tortuga_theme_options[navi_color]',
				'priority' => 30,
			)
		) );

		// Add Post Primary Color setting.
		$wp_customize->add_setting( 'tortuga_theme_options[title_color]', array(
			'default'           => $default_options['title_color'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize, 'tortuga_theme_options[title_color]', array(
				'label'    => _x( 'Post Titles', 'color setting', 'tortuga-pro' ),
				'section'  => 'tortuga_pro_section_colors',
				'settings' => 'tortuga_theme_options[title_color]',
				'priority' => 40,
			)
		) );

		// Add Link and Button Color setting.
		$wp_customize->add_setting( 'tortuga_theme_options[link_color]', array(
			'default'           => $default_options['link_color'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize, 'tortuga_theme_options[link_color]', array(
				'label'    => _x( 'Links and Buttons', 'color setting', 'tortuga-pro' ),
				'section'  => 'tortuga_pro_section_colors',
				'settings' => 'tortuga_theme_options[link_color]',
				'priority' => 50,
			)
		) );

		// Add Widget Title Color setting.
		$wp_customize->add_setting( 'tortuga_theme_options[widget_title_color]', array(
			'default'           => $default_options['widget_title_color'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize, 'tortuga_theme_options[widget_title_color]', array(
				'label'    => _x( 'Widget Titles', 'color setting', 'tortuga-pro' ),
				'section'  => 'tortuga_pro_section_colors',
				'settings' => 'tortuga_theme_options[widget_title_color]',
				'priority' => 60,
			)
		) );

		// Add Footer Widgets Color setting.
		$wp_customize->add_setting( 'tortuga_theme_options[footer_widgets_color]', array(
			'default'           => $default_options['footer_widgets_color'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize, 'tortuga_theme_options[footer_widgets_color]', array(
				'label'    => _x( 'Footer Widgets', 'color setting', 'tortuga-pro' ),
				'section'  => 'tortuga_pro_section_colors',
				'settings' => 'tortuga_theme_options[footer_widgets_color]',
				'priority' => 70,
			)
		) );

		// Add Footer Line Color setting.
		$wp_customize->add_setting( 'tortuga_theme_options[footer_color]', array(
			'default'           => $default_options['footer_color'],
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control(
			$wp_customize, 'tortuga_theme_options[footer_color]', array(
				'label'    => _x( 'Footer Widgets', 'color setting', 'tortuga-pro' ),
				'section'  => 'tortuga_pro_section_colors',
				'settings' => 'tortuga_theme_options[footer_color]',
				'priority' => 80,
			)
		) );
	}

	/**
	 * Returns color brightness.
	 *
	 * @param int Number of brightness.
	 */
	static function get_color_brightness( $hex_color ) {

		// Remove # string.
		$hex_color = str_replace( '#', '', $hex_color );

		// Convert into RGB.
		$r = hexdec( substr( $hex_color, 0, 2 ) );
		$g = hexdec( substr( $hex_color, 2, 2 ) );
		$b = hexdec( substr( $hex_color, 4, 2 ) );

		return ( ( ( $r * 299 ) + ( $g * 587 ) + ( $b * 114 ) ) / 1000 );
	}

	/**
	 * Check if the color is light.
	 *
	 * @param bool True if color is light.
	 */
	static function is_color_light( $hex_color ) {
		return ( self::get_color_brightness( $hex_color ) > 130 );
	}

	/**
	 * Check if the color is dark.
	 *
	 * @param bool True if color is dark.
	 */
	static function is_color_dark( $hex_color ) {
		return ( self::get_color_brightness( $hex_color ) <= 130 );
	}
}

// Run Class.
add_action( 'init', array( 'Tortuga_Pro_Custom_Colors', 'setup' ) );
