<?php
/**
 * This file is used to register multiple setting for dimension
 *
 * @since 1.0.0
 *
 * @package RareBiz WordPress theme
 */

if( !class_exists( 'RareBiz_Customizer_Dimensions_Integration' ) ){

	class RareBiz_Customizer_Dimensions_Integration extends RareBiz_Customizer{

		/**
		 * The control type.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 *
		 * @package RareBiz WordPress Theme
		 */

		public static $type = 'rarebiz-dimensions';

		public static $class = 'RareBiz_Customizer_Dimensions_Control';

		/**
		 * The constructor
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @package RareBiz WordPress Theme
		 */
		public function __construct(){

			self::add_custom_control( array(
			    'type'     => self::$type,
			    'class'    => self::$class,
			    'sanitize' => 'absint',
			    'register_control_type' => true
			));
			
			add_action( self::with_prefix( 'customize_register_start', '_' ), array( $this, 'start' ), 20, 2 );
			add_action( self::with_prefix( 'customize_register_end', '_' ), array( $this, 'end' ), 20, 2 );

			# Feed default values to the framework
			add_filter( self::with_prefix( 'customizer_after_set', '_' ), array( $this, 'setup_default_value' ), 10 );
		}


		/**
		 * Setup default value of custom setting fields
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @package RareBiz WordPress Theme
		 */
		public function setup_default_value( $instance ){
			if( isset( $instance::$fields[ self::$type ] ) ){
				foreach( $instance::$fields[ self::$type ] as $field ){
					foreach( $field[ 'dimension' ] as $side ){
						foreach ( array( 'desktop', 'tablet', 'mobile' ) as $device ) {
							if( isset( $field[ 'default' ] ) ){
								$id = self::with_prefix( $field[ 'id' ] ) . '-' . $device . '-' . $side;
								$instance::$defaults[ $id ] = $field[ 'default' ][ $device ][ $side ];
							}
						}
					}
				}
			}
		}

		/**
		 * Registers the setting for customizer
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @package RareBiz WordPress Theme
		 */
		public function start( $instance , $wp_customize ){
			if( !isset( $instance::$fields[ self::$type ] ) )
				return;

			foreach( $instance::$fields[ self::$type ] as $field ){
				$field_id = self::with_prefix( $field[ 'id' ] );

				# Remove this field from framework
				unset( $instance::$settings[ $field_id ] );
				unset( $instance::$defaults[ $field_id ] );

				$control = $instance::$controls[ $field_id ];
				unset( $instance::$controls[ $field_id ] );

				if( !isset( $field[ 'dimension' ] ) ){
					$err = esc_html__( 'Missing key "dimension" passed for Dimension Control.', 'rarebiz' );
					$instance::add_error( $err, 5 );
				}

				$settings = array();
				# Make new settings and send it to the framework
				foreach( $field[ 'dimension' ] as $side ){

					foreach ( array( 'desktop', 'tablet', 'mobile' ) as $device ) {

						$id = $field_id . '-' . $device . '-' . $side;
						$args = $instance::get_setting_arg( array(
							'id' => $id,
							'transport' => 'refresh',
							'sanitize_callback' => array( $instance, 'sanitize_number_blank' )
						));

						$instance::$settings[ $id ] = $args;

						$settings[ $device . '_' . $side ] = $id;
					}
				}

				if( !isset( $control[ 'input_attrs' ] ) ){
					$control[ 'input_attrs' ] =  array(
		                'min'   => 0,
		                'max'   => 100,
		                'step'  => 1,
		            );
				}

				$control[ 'settings' ] = $settings;

				$buf = $instance::get_buffer( 'dimension', array() );
				$buf[] = array(
					'id' => $field_id,
					'control' => $control
				);

				$instance::add_buffer( 'dimension', $buf );
			}
		}

		/**
		 * Registers the controls for customizer
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @package RareBiz WordPress Theme
		 */
		public function end( $instance, $wp_customize ){
			$settings = $instance::get_buffer( 'dimension' );
			if( $settings ){
				foreach( $settings as $s ){
					$instance::add_control( $wp_customize, $s[ 'id' ], $s[ 'control' ] );
				}
			}
		}
	}
	new RareBiz_Customizer_Dimensions_Integration();
}

