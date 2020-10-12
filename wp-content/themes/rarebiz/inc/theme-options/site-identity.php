<?php
/**
 * Register font size and choice to display logo or title.
 *
 * @since 1.0.0
 *
 * @package RareBiz WordPress theme
 */

/**
* Register Site Identity Options
*
* @return void
* @since 1.0.0
*
* @package RareBiz WordPress theme
*/
function rarebiz_site_identity(){
	RareBiz_Customizer::set(array(
		# Site Identity > title size || title or logo
		'section' => array(
			'id' => 'title_tagline',
			'prefix' => false,
		),
		'fields'  => array(
		    array(
		        'id'	  	  => 'title-size',
		        'label'   	  => esc_html__( 'Title Size', 'rarebiz' ),
		        'description' => esc_html__( 'The value is in px.' , 'rarebiz' ),
		        'default' => array(
		    		'desktop' => 22,
		    		'tablet'  => 22,
		    		'mobile'  => 22,
		    	),
				'input_attrs' =>  array(
		            'min'   => 1,
		            'max'   => 60,
		            'step'  => 1,
		        ),
		        'type'    => 'rarebiz-slider',
		    ),
	        array(
	            'id'	  	  => 'tagline-size',
	            'label'   	  => esc_html__( 'Tagline Size', 'rarebiz' ),
	            'description' => esc_html__( 'The value is in px.' , 'rarebiz' ),
	            'default' => array(
	        		'desktop' => 14,
	        		'tablet'  => 14,
	        		'mobile'  => 14,
	        	),
	    		'input_attrs' =>  array(
	                'min'   => 1,
	                'max'   => 35,
	                'step'  => 1,
	            ),
	            'type'    => 'rarebiz-slider',
	        ),
            array(
    	        'id'	  	  => 'logo-size',
    	        'label'   	  => esc_html__( 'Logo Size', 'rarebiz' ),
    	        'description' => esc_html__( 'The value is in px.' , 'rarebiz' ),
    	        'default' => array(
    	    		'desktop' => 200,
    	    		'tablet'  => 200,
    	    		'mobile'  => 200,
    	    	),
    			'input_attrs' =>  array(
    	            'min'   => 1,
    	            'max'   => 400,
    	            'step'  => 1,
    	        ),
    	        'type'    => 'rarebiz-slider',
    	    ),
		)	
	));
}
add_action( 'init', 'rarebiz_site_identity' );