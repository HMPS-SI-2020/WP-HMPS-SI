<?php
/**
 * This file is used to register multiple setting for a slider
 *
 * @since 1.0.0
 *
 * @package RareBiz WordPress theme
 */
if( !class_exists( 'RareBiz_Customizer_Slider_Integration' ) ){
	class RareBiz_Customizer_Slider_Integration extends RareBiz_Customizer{

		/**
		 * The control type.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 *
		 * @package RareBiz WordPress Theme
		 */
		public static $type = 'rarebiz-slider';

		public static $class = 'RareBiz_Customizer_Slider_Control';

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
			    'register_control_type' => true,
			));

			add_action( self::fn_prefix( 'customize_register_start' ), array( $this, 'start' ), 10, 2 );
			add_action( self::fn_prefix( 'customize_register_end' ), array( $this, 'end' ), 10, 2 );

			# Feed default values to the framework
			add_filter( self::fn_prefix( 'customizer_after_set' ), array( $this, 'setup_default_value' ), 10 );
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
					foreach( array( 'mobile', 'tablet', 'desktop' ) as $device ){
						if( isset( $field[ 'default' ] ) ){
							$id = self::with_prefix( $field[ 'id' ] ) . '-' . $device;
							$instance::$defaults[ $id ] = $field[ 'default' ][ $device ];
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
			if( !$instance::$fields[ self::$type ] )
				return;
			foreach( $instance::$fields[ self::$type ] as $field ){
				$field_id = self::with_prefix( $field[ 'id' ] );

				# Remove this field from framework
				unset( $instance::$settings[ $field_id ] );
				unset( $instance::$defaults[ $field_id ] );

				$control = $instance::$controls[ $field_id ];
				unset( $instance::$controls[ $field_id ] );

				$settings = array();
				# Make new settings and send it to the framework
				foreach( array( 'mobile', 'tablet', 'desktop' ) as $device ){
					$id = $field_id . '-' . $device;

					$args = $instance::get_setting_arg( array(
						'id' => $id,
						'sanitize_callback' => array( $instance, 'sanitize_number_blank' )
					));

					$instance::$settings[ $id ] = $args;

					$settings[ $device ] = $id;
				}

				if( !isset( $control[ 'input_attrs' ] ) ){
					$control[ 'input_attrs' ] =  array(
		                'min'   => 0,
		                'max'   => 100,
		                'step'  => 1,
		            );
				}

				$control[ 'settings' ] = $settings;

				$buf = $instance::get_buffer( 'slider', array() );
				$buf[] = array(
					'id' => $field_id,
					'control' => $control
				);

				$instance::add_buffer( 'slider', $buf );
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
			$settings = $instance::get_buffer( 'slider' );
			if( $settings ){
				foreach( $settings as $s ){
					$instance::add_control( $wp_customize, $s[ 'id' ], $s[ 'control' ] );
				}
			}
		} 
	}
	
	new RareBiz_Customizer_Slider_Integration();
}