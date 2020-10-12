<?php

if( !function_exists( 'rarebiz_acb_slider' ) ):
	/**
	* Active callback function of header top bar
	*
	* @static
	* @access public
	* @return boolen
	* @since 1.0.0
	*
	* @package Smile Charities
	*/
	function rarebiz_acb_slider( $control ){
		$value = $control->manager->get_setting( RareBiz_Helper::with_prefix( 'enable-slider' ) )->value();
		return $value;
	}
endif;

if( !function_exists( 'rarebiz_acb_type_cat' ) ):
	/**
	* Active callback function of header top bar
	*
	* @static
	* @access public
	* @return boolen
	* @since 1.0.0
	*
	* @package Smile Charities
	*/
	function rarebiz_acb_type_cat( $control ){
		$value = $control->manager->get_setting( RareBiz_Helper::with_prefix( 'enable-slider' ) )->value();
		$cat = $control->manager->get_setting( RareBiz_Helper::with_prefix( 'slider-type' ) )->value();
		$val = $value && 'category' == $cat;
		return $val;
	}
endif;

if( !function_exists( 'rarebiz_acb_type_post' ) ):
	/**
	* Active callback function of header top bar
	*
	* @static
	* @access public
	* @return boolen
	* @since 1.0.0
	*
	* @package Smile Charities
	*/
	function rarebiz_acb_type_post( $control ){
		$value = $control->manager->get_setting( RareBiz_Helper::with_prefix( 'enable-slider' ) )->value();
		$post = $control->manager->get_setting( RareBiz_Helper::with_prefix( 'slider-type' ) )->value();
		$val = $value && 'post' == $post;

		return $val;
	}
endif;

/**
* Banner Slider Options
*
* @return void
* @since 1.0.0
*
* @package Smile Charities
*/
function smile_charities_slider_options(){

	RareBiz_Customizer::set(array(
		# Theme option
		'panel' => array(
		    'id'       => 'front-page',
		    'title'    => esc_html__( 'Front Page Options', 'smile-charities' ),
		    'priority' => 10,
		),
		# Theme Option > Header
		'section' => array(
		    'id'    => 'slider',
		    'title' => esc_html__( 'Slider', 'smile-charities' )
		),
		# Theme Option > Header > settings
		'fields' => array(
			array(
				'id'	=> 'enable-slider',
				'label' => esc_html__( 'Enable Slider', 'smile-charities' ),
				'default' => true,
				'type'  => 'rarebiz-toggle',
			),
			array(
			    'id'      => 'slider-type',
			    'label'   => esc_html__( 'Get Content From', 'smile-charities' ),
			    'type'    => 'rarebiz-buttonset',
			    'default' => 'category',
			    'choices' => array(
			        'category' => esc_html__( 'Category', 'smile-charities' ),
			        'post'  => esc_html__( 'Select Post', 'smile-charities' ),
			    ),
			    'active_callback' => 'acb_slider'
			),
			array(
				'id' => 'cat-post',
				'label' => esc_html__( 'Select Category', 'smile-charities' ),
				'default' => 0,
				'type' => 'category-dropdown',
				'active_callback' => 'acb_type_cat'
			),
			array(
			  'id'    => 'slider-posts',
			  'label' => esc_html__( 'Select Posts', 'smile-charities' ),
			  'type'  => 'rarebiz-repeater',
			  'limit' => 3,
			  'active_callback' => 'acb_type_post',
			  'repeat' => array(
			    'page' => array(
			        'label' => '',
			    )
			  ),
			),
			array(
				'id' => 'smile-primary-btn-txt',
				'label' => esc_html__( 'Primary Button Text', 'smile-charities' ),
				'default' => esc_html__( 'Read More', 'smile-charities' ),
				'description' => esc_html__( 'This button is link to single page', 'smile-charities' ),
				'type' => 'text',
				'active_callback' => 'acb_slider'
			),
			array(
				'id' => 'smile-secondary-btn-txt',
				'label' => esc_html__( 'Secondary Button Text', 'smile-charities' ),
				'default' => esc_html__( 'Donate Now', 'smile-charities' ),
				'type' => 'text',
				'active_callback' => 'acb_slider'
			),
			array(
				'id' => 'smile-secondary-btn-url',
				'label' => esc_html__( 'Secondary Button URL', 'smile-charities' ),
				'default' => '#',
				'type' => 'url',
				'active_callback' => 'acb_slider'
			),
		)
	));
}
add_action( 'init', 'smile_charities_slider_options' );