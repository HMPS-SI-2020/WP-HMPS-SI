<?php
if( !function_exists( 'rarebiz_acb_banner_section' ) ):
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
	function rarebiz_acb_banner_section( $control ){
		$value = $control->manager->get_setting( RareBiz_Helper::with_prefix( 'show-banner-content' ) )->value();
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
function rarebiz_banner_section_options(){
	RareBiz_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Top Bar
		'section' => array(
		    'id'    => 'banner-section',
		    'title' => esc_html__( 'Home Page Banner', 'rarebiz' ),
		    'priority'    => 3,
		),
		'fields' => array(
			array(
				'id'	=> 'show-banner-content',
				'label' => esc_html__( 'Enable', 'rarebiz' ),
				'default' => true,
 				'type'  => 'rarebiz-toggle'
			),
			array(
				'id' => 'banner-title',
				'label' => esc_html__( 'Title', 'rarebiz' ),
				'default' => esc_html__( 'Theme Preview', 'rarebiz' ),
				'type' => 'text',
				'active_callback' => 'acb_banner_section'
			),
			array(
				'id' => 'banner-description',
				'label' => esc_html__( 'Description', 'rarebiz' ),
				'default' => esc_html( 'Previewing Another WordPress Blog', 'rarebiz' ),
				'active_callback' => 'acb_banner_section',
				'type' => 'rarebiz-editor'
			),
			array(
				'id' => 'primary-btn-text',
				'label' => esc_html__( 'Primary Button Text', 'rarebiz' ),
				'default' => esc_html__( 'Primary Button', 'rarebiz' ),
				'type' => 'text',
				'active_callback' => 'acb_banner_section'
			),
			array(
				'id' => 'primary-btn-url',
				'label' => esc_html__( 'Primary Button URL', 'rarebiz' ),
				'default' => '#',
				'type' => 'url',
				'active_callback' => 'acb_banner_section'
			),
			array(
				'id' => 'secondary-btn-text',
				'label' => esc_html__( 'Secondary Button Text', 'rarebiz' ),
				'default' => esc_html__( 'Secondary Button', 'rarebiz' ),
				'type' => 'text',
				'active_callback' => 'acb_banner_section'
			),
			array(
				'id' => 'secondary-btn-url',
				'label' => esc_html__( 'Secondary Button URL', 'rarebiz' ),
				'default' => '#',
				'type' => 'url',
				'active_callback' => 'acb_banner_section'
			),
		)
	));
}
add_action( 'init', 'rarebiz_banner_section_options' );