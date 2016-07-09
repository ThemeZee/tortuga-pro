<?php
/**
 * Custom Font Control for the Customizer
 *
 * @package Tortuga Pro
 */

/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays a custom Font control. Allows to switch fonts for particular elements on the theme.
	 */
	class Tortuga_Pro_Customize_Font_Control extends WP_Customize_Control {

		/**
		 * Declare the control type. Critical for JS constructor.
		 *
		 * @var string
		 */
		public $type = 'tortuga_pro_custom_font';

		/**
		 * Localization Strings.
		 *
		 * @var array
		 */
		public $l10n = array();

		/**
		 * Custom Fonts Array
		 *
		 * @var array
		 */
		private $fonts = false;

		/**
		 * Setup Font Control
		 *
		 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
		 * @param String               $id      Control ID.
		 * @param array                $args    Arguments to override class property defaults.
		 * @return void
		 */
		public function __construct( $manager, $id, $args = array() ) {

			// Make Buttons translateable.
			$this->l10n = array(
				'previous' => __( 'Previous Font', 'tortuga-pro' ),
				'next' => __( 'Next Font', 'tortuga-pro' ),
				'standard' => _x( 'Default', 'default font button', 'tortuga-pro' ),
			);

			// Get Theme Options.
			$theme_options = Tortuga_Pro_Customizer::get_theme_options();

			// Set Fonts.
			$this->fonts = Tortuga_Pro_Custom_Font_Lists::get_fonts( $theme_options['available_fonts'] );

			parent::__construct( $manager, $id, $args );

		}

		/**
		 * Enqueue Font Control JS
		 *
		 * @return void
		 */
		public function enqueue() {

			// Register and Enqueue Custom Font JS Constructor.
			wp_enqueue_script( 'tortuga-pro-custom-font-control', TORTUGA_PRO_PLUGIN_URL . 'assets/js/custom-font-control.js', array( 'customize-controls' ), TORTUGA_PRO_VERSION, true );

		}

		/**
		 * Display Control
		 *
		 * @return void
		 */
		public function render_content() {

			$l10n = json_encode( $this->l10n );

			if ( ! empty( $this->fonts ) ) :
			?>

				<label>
					<span class="customize-control-title" data-l10n="<?php echo esc_attr( $l10n ); ?>" data-font="<?php echo esc_attr( $this->setting->default ); ?>">
						<?php echo esc_html( $this->label ); ?>
					</span>
					<div class="customize-font-select-control">
						<select <?php $this->link(); ?>>
							<?php
							foreach ( $this->fonts as $k => $v ) :
								printf( '<option value="%s" %s>%s</option>', $k, selected( $this->value(), $k, false ), $v );
							endforeach;
							?>
						</select>
					</div>
					<div class="actions"></div>
				</label>

			<?php
			endif;
		}
	}

endif;
