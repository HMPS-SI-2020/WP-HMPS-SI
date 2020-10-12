<?php
/**
* Register sidebar Options
*
* @return void
* @since 1.0.0
*
* @package RareBiz WordPress theme
*/
function rarebiz_sidebar_options(){
	RareBiz_Customizer::set(array(
		# Theme Options
		'panel'   => 'panel',
		# Theme Options >Sidebar Layout > Settings
		'section' => array(
			'id'     => 'sidebar-options',
			'title'  => esc_html__( 'Sidebar Options','rarebiz' ),
		),
		'fields' => array(
			# sb - Sidebar
			array(
			    'id'      => 'sidebar-position',
			    'label'   => esc_html__( 'Sidebar Position' , 'rarebiz' ),
			    'type'    => 'rarebiz-buttonset',
			    'default' => 'right-sidebar',
			    'choices' => array(
			        'left-sidebar'  => esc_html__( 'Left' , 'rarebiz' ),
			        'right-sidebar' => esc_html__( 'Right' , 'rarebiz' ),
			        'no-sidebar'    => esc_html__( 'None', 'rarebiz' ),
			     )
			),
		),
	) );
}
add_action( 'init', 'rarebiz_sidebar_options' );