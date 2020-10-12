<?php
if( !function_exists( 'rarebiz_acb_topbar' ) ):
	/**
	* Active callback function of header top bar
	*
	* @static
	* @access public
	* @return boolen
	* @since 1.0.0
	*
	* @package RareBiz WordPress Theme
	*/
	function rarebiz_acb_topbar( $control ){
		$value = $control->manager->get_setting( RareBiz_Helper::with_prefix( 'show-top-bar' ) )->value();
		return $value;
	}
endif;

/**
* Register Top bar Options
*
* @return void
* @since 1.0.0
*
* @package RareBiz WordPress Theme
*/
function rarebiz_topbar_options(){
	RareBiz_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Top Bar
		'section' => array(
		    'id'    => 'top-bar',
		    'title' => esc_html__( 'Top Bar', 'rarebiz' ),
		    'priority'    => 0,
		),
		'fields' => array(
			array(
				'id'	=> 'show-top-bar',
				'label' => esc_html__( 'Enable', 'rarebiz' ),
				'default' => false,
 				'type'  => 'rarebiz-toggle'
			),
			array(
				'id' => 'top-bar-text',
				'label' => esc_html__( 'Top Bar Text', 'rarebiz' ),
				'default' => esc_html( 'Join Our Business', 'rarebiz' ),
				'active_callback' => 'acb_topbar',
				'type' => 'rarebiz-editor'
			),
			array(
				'id' => 'top-bar-contact',
				'label' => esc_html__( 'Contact', 'rarebiz' ),
				'default' => esc_html( 'Contact Us Anytime: 001-223-445', 'rarebiz' ),
				'active_callback' => 'acb_topbar',
				'type' => 'text'
			),
			array(
				'id'	=> 'topbar-bg-color',
				'label' => esc_html__( 'Background Color', 'rarebiz' ),
				'active_callback' => 'acb_topbar',
				'default' => '#028484',
 				'type'  => 'rarebiz-color-picker'
			),
			array(
				'id'	=> 'topbar-text-color',
				'label' => esc_html__( 'Text Color', 'rarebiz' ),
				'active_callback' => 'acb_topbar',
				'default' => '#ffffff',
 				'type'  => 'rarebiz-color-picker'
			)
		)
	));
}
add_action( 'init', 'rarebiz_topbar_options' );