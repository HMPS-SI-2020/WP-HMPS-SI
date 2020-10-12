<?php
/**
 * Resets all the value of customizer
 *
 * @since 1.0.0
 *
 * @package RareBiz WordPress Theme
 */

if( !function_exists( 'rarebiz_get_setting_id' ) ):
	add_action( 
		RareBiz_Helper::fn_prefix( 'customize_register_start' ), 
		'rarebiz_get_setting_id', 30, 2 );
	/**
	* Get all the setting id to reset the data.
	*
	* @return array
	* @since 1.0.0
	*
	* @package RareBiz WordPress theme
	*/
	function rarebiz_get_setting_id( $instance, $wp_customize ) {
		
		RareBiz_Customizer::set(array(
			# Theme option
			'panel' => 'panel',
			# Theme Option > Reset options
			'section' => array(
			    'id'    => 'reset-section',
			    'title' => esc_html__( 'Reset Options' ,'rarebiz' ),
			),
			'fields' => array(
				array(
				    'id' 	      => 'reset-options',
				    'type'        => 'rarebiz-reset',
				    'settings'    => array_keys( $instance::$settings ),
				    'label'       => esc_html__( 'Reset', 'rarebiz' ),
				    'description' => esc_html__( 'Reseting will delete all the data. Once reset, you will not be able to get back those data.', 'rarebiz' ),
				),
			),
		) );
	}
endif;
