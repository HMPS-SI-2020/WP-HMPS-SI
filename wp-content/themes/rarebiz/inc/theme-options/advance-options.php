<?php
if( !function_exists( 'rarebiz_acb_custom_header_one' ) ):
	/**
	* Active callback function of header top bar
	*
	* @static
	* @access public
	* @return boolen
	* @since 1.0.0
	*
	* @package RareBiz WordPress theme
	*/
	function rarebiz_acb_custom_header_one( $control ){
		$value = $control->manager->get_setting( RareBiz_Helper::with_prefix( 'container-width' ) )->value();
		return 'default' == $value;
	}
endif;

/**
* Register Advanced Options
*
* @return void
* @since 1.0.0
*
* @package RareBiz WordPress theme
*/
function rarebiz_advanced_options(){

	RareBiz_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Header
		'section' => array(
		    'id'    => 'advance-options',
		    'title' => esc_html__( 'Advanced Options', 'rarebiz' ),
		),
		# Theme Option > Header > settings
		'fields' => array(
			array(
				'id'	=> 'pre-loader',
				'label' => esc_html__( 'Show Preloader', 'rarebiz' ),
				'type'  => 'rarebiz-toggle',
			),
			array(
			    'id'      => 'assets-version',
			    'label'   => esc_html__( 'Assets Version', 'rarebiz' ),
			    'type'    => 'rarebiz-buttonset',
			    'default' => 'development',
			    'choices' => array(
			        'development' => esc_html__( 'Development', 'rarebiz' ),
			        'production'  => esc_html__( 'Production', 'rarebiz' ),
			    )
			),
			array(
			    'id'      =>  'container-width',
			    'label'   => esc_html__( 'Site Layout', 'rarebiz' ),
			    'type'    => 'rarebiz-buttonset',
			    'default' => 'default',
			    'choices' => array(
			        'default' => esc_html__( 'Default', 'rarebiz' ),
			        'box'	  => esc_html__( 'Boxed', 'rarebiz' ),
			    )
			),
		    array(
		        'id'          	  => 'container-custom-width',
		        'label'   	  	  => esc_html__( 'Container Width', 'rarebiz' ),
		        'active_callback' => 'acb_custom_header_one',
		        'type'        	  => 'rarebiz-range',
		        'default'     	  => '1140',
	    		'input_attrs' 	  =>  array(
	                'min'   => 400,
	                'max'   => 2000,
	                'step'  => 5,
	            ),
		    ),
		)
	));
}
add_action( 'init', 'rarebiz_advanced_options' );