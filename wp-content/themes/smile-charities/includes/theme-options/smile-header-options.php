<?php
/**
* Register more header options
*
* @return void
* @since 1.0.0
*
* @package RareBiz WordPress theme
*/
function smile_charities_header_options(){
	RareBiz_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Header
		'section' => array(
		    'id'    => 'main-header',
		    'title' => esc_html__( 'Header Options', 'smile-charities' ),
		    'priority'    => 2,
		),
		# Theme Option > Header > settings
		'fields' => array(
			array(
				'id' => 'smile-header-btn-txt',
				'label' => esc_html__( 'Header Button Text', 'smile-charities' ),
				'default' => '',
				'type' => 'text'
			),
			array(
				'id' => 'smile-header-btn-url',
				'label' => esc_html__( 'Header Button URL', 'smile-charities' ),
				'default' => '#',
				'type' => 'url'
			),
			array(
				'id'      => 'smile-header-bg-color',
				'label'   => esc_html__( 'Header Button Background Color', 'smile-charities' ),
				'default' => '#fdc513',
				'type'    => 'rarebiz-color-picker',
			),
			array(
				'id'      => 'smile-header-txt-color',
				'label'   => esc_html__( 'Header Button Text COlor', 'smile-charities' ),
				'default' => '#000000',
				'type'    => 'rarebiz-color-picker',
			),
		),
	));
}
add_action( 'init', 'smile_charities_header_options' );