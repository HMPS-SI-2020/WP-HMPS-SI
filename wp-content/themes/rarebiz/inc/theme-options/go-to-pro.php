<?php
/**
* Register Go to pro button
*
* @since 1.0.3
*
* @package Rarebiz WordPress Theme
*/
function rarebiz_go_to_pro(){
	Rarebiz_Customizer::set(array(
		'section' => array(
			'id'       => 'go-to-pro', 
			'type'     => 'rarebiz-anchor',
			'title'    => esc_html__( 'Rarebiz Pro - Unlock Features', 'rarebiz' ),
			'url'      => esc_url( 'https://risethemes.com/downloads/rarebiz-pro/' ),
			'priority' => 0
		)
	));
}
add_action( 'init', 'rarebiz_go_to_pro' );