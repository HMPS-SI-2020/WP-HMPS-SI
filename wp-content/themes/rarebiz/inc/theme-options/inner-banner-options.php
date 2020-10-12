<?php
if( !function_exists( 'rarebiz_acb_full_page' ) ):
	/**
	* Active callback function of full page options
	*
	* @static
	* @access public
	* @return boolen
	* @since 1.0.0
	*
	* @package RareBiz WordPress Theme
	*/
	function rarebiz_acb_full_page( $control ){
		$value = $control->manager->get_setting( RareBiz_Helper::with_prefix( 'ib-full-page' ) )->value();
		return !$value;
	}
endif;

/**
 * Inner banner options in customizer
 *
 * @return void
 * @since 1.0.0
 *
 * @package RareBiz WordPress Theme
 */

function rarebiz_inner_banner_options(){
	RareBiz_Customizer::set(array(
		# Theme Option > color options
		'section' => array(
		    'id'       => 'header_image',
		    'priority' => 27,
		    'prefix' => false,
		),
		'fields'  => array(
			array(
				'id'      	  => 'ib-blog-title',
				'label'   	  => esc_html__( 'Title' , 'rarebiz' ),
				'description' => esc_html__( 'It is displayed when home page is latest posts.' , 'rarebiz' ),
				'default' 	  => esc_html__( 'Latest Blog' , 'rarebiz' ),
				'type'	  	  => 'text',
				'priority'    => 10,
			),
		    array(
		        'id'	  	  => 'ib-title-size',
		        'label'   	  => esc_html__( 'Font Size', 'rarebiz' ),
		        'description' => esc_html__( 'The value is in px. Defaults to 40px.' , 'rarebiz' ),
		        'default' => array(
		    		'desktop' => 40,
		    		'tablet'  => 32,
		    		'mobile'  => 32,
		    	),
				'input_attrs' =>  array(
		            'min'   => 1,
		            'max'   => 60,
		            'step'  => 1,
		        ),
		        'type' => 'rarebiz-slider',
		        'priority' => 20
		    ),
		    array(
		        'id'      => 'ib-title-color',
		        'label'   => esc_html__( 'Text Color' , 'rarebiz' ),
		        'default' => '#ffffff',
		        'type'    => 'rarebiz-color-picker',
		        'priority' => 30
		    ),
		    array(
		    	'id' 	   => 'ib-background-color',
		    	'label'    => esc_html__( 'Overlay Color', 'rarebiz' ),
		    	'default'  => 'rgba(10,10,10,0.17)',
		    	'type' 	   => 'rarebiz-color-picker',
		    	'priority' => 40,
		    ),
		    array(
		        'id'      => 'ib-text-align',
		        'label'   => esc_html__( 'Alignment' , 'rarebiz' ),
		        'type'    => 'rarebiz-buttonset',
		        'default' => 'banner-content-center',
		        'choices' => array(
		        	'banner-content-left'   => esc_html__( 'Left' , 'rarebiz'   ),
		        	'banner-content-center' => esc_html__( 'Center' , 'rarebiz' ),
		        	'banner-content-right'  => esc_html__( 'Right' , 'rarebiz'  ),
		         ),
		        'priority' => 50
		    ),
			array(
			    'id'      => 'ib-image-attachment', 
			    'label'   => esc_html__( 'Image Attachment' , 'rarebiz' ),
			    'type'    => 'rarebiz-buttonset',
			    'default' => 'banner-background-scroll',
			    'choices' => array(
			    	'banner-background-scroll'           => esc_html__( 'Scroll' , 'rarebiz' ),
			    	'banner-background-attachment-fixed' => esc_html__( 'Fixed' , 'rarebiz' ),
			    ),
		        'priority' => 60
			),
			array(
				'id'	=> 'ib-full-page',
				'label' => esc_html__( 'Full Page Banner', 'rarebiz' ),
				'default' => true,
 				'type'  => 'rarebiz-toggle'
			),
			array(
			    'id'      	=> 'ib-height',
			    'label'   	=> esc_html__( 'Height (px)', 'rarebiz' ),
			    'type'    	=> 'rarebiz-slider',
	            'description' => esc_html__( 'If Full Page Banner is enabled this feature will not work.' , 'rarebiz' ),
	            'default' => array(
	        		'desktop' => 350,
	        		'tablet'  => 350,
	        		'mobile'  => 350,
	        	),
	    		'input_attrs' =>  array(
	                'min'   => 1,
	                'max'   => 1000,
	                'step'  => 1,
	            ),
	            'active_callback' => 'acb_full_page'
			)
		),
	) );
}
add_action( 'init', 'rarebiz_inner_banner_options' );