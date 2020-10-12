<?php
/**
* Register breadcrumb Options
*
* @return void
* @since 1.0.0
*
* @package RareBiz WordPress theme
*/
function rarebiz_color_options(){	
	RareBiz_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > color options
		'section' => array(
		    'id'       => 'color-section',
		    'title'    => esc_html__( 'Color Options' ,'rarebiz' ),
		    'priority' => 5
		),
		'fields'  =>array(
			array(
				'id'      => 'primary-color',
				'label'   => esc_html__( 'Primary Color', 'rarebiz' ),
				'default' => '#028484',
				'type'    => 'rarebiz-color-picker',
			),
			array(
				'id'      => 'body-paragraph-color',
				'label'   => esc_html__( 'Body Text Color', 'rarebiz' ),
				'default' => '#5f5f5f',
				'type'    => 'rarebiz-color-picker',
			),
			array(
				'id'   => 'line-1',
				'type' => 'rarebiz-horizontal-line',
			),
			array(
				'id'      => 'link-color',
				'label'   => esc_html__( 'Link Color', 'rarebiz' ),
				'default' => '#145fa0',
				'type'    => 'rarebiz-color-picker',
			),
			array(
				'id'      => 'link-hover-color',
				'label'   => esc_html__( 'Link Hover Color', 'rarebiz' ),
				'default' => '#028484',
				'type'    => 'rarebiz-color-picker',
			),
			array(
				'id'   => 'line-2',
				'type' => 'rarebiz-horizontal-line',
			),
			array(
				'id'      => 'sb-widget-title-color',
				'label'   => esc_html__( 'Sidebar Widget Title Color', 'rarebiz' ),
				'default' => '#000000',
				'type'    => 'rarebiz-color-picker',
			),
			array(
				'id'      => 'sb-widget-content-color',
				'label'   => esc_html__( 'Sidebar Widget Content Color', 'rarebiz' ),
				'default' => '#282835',
				'type'    => 'rarebiz-color-picker',
			),
			array(
				'id'   => 'line-3',
				'type' => 'rarebiz-horizontal-line',
			),
			array(
				'id'      => 'footer-title-color',
				'label'   => esc_html__( 'Footer Widget Title Color', 'rarebiz' ),
				'default' => '#fff',
				'type'    => 'rarebiz-color-picker',
			),
			array(
				'id'      => 'footer-content-color',
				'label'   => esc_html__( 'Footer Widget Content Color', 'rarebiz' ),
				'default' => '#a8a8a8',
				'type'    => 'rarebiz-color-picker',
			),
			array(
				'id'   => 'line-4',
				'type' => 'rarebiz-horizontal-line',
			),
			array(
				'id'      => 'footer-top-background-color',
				'label'   => esc_html__( 'Footer Background Color', 'rarebiz' ),
				'default' => '#28292a',
				'type'    => 'rarebiz-color-picker',
			),
			array(
				'id'      => 'footer-copyright-background-color',
				'label'   => esc_html__( 'Footer Copyright Background Color', 'rarebiz' ),
				'default' => '#028484',
				'type'    => 'rarebiz-color-picker',
			),
			array(
				'id'      => 'footer-copyright-text-color',
				'label'   => esc_html__( 'Footer Copyright Text Color', 'rarebiz' ),
				'default' => '#ffffff',
				'type'    => 'rarebiz-color-picker',
			),
		),			
	));
}
add_action( 'init', 'rarebiz_color_options' );