<?php
/**
 * Create options for posts.
 *
 * @since 1.0.0
 *
 * @package RareBiz WordPress theme
 */

function rarebiz_post_options(){  
    RareBiz_Customizer::set(array(
    	# Theme Options
    	'panel'   => 'panel',
    	# Theme Options > Page Options > Settings
    	'section' => array(
    		'id'    => 'post-options',
    		'title' => esc_html__( 'Post Options','rarebiz' ),
    	),
    	'fields' => array(
            array(
                'id'      => 'post-category',
                'label'   =>  esc_html__( 'Show Categories', 'rarebiz' ),
                'default' => 1,
                'type'    => 'rarebiz-toggle',
            ),
            array(
                'id'      => 'post-date',
                'label'   => esc_html__( 'Show Date', 'rarebiz' ),
                'default' => 1,
                'type'    => 'rarebiz-toggle',
            ),
            array(
                'id'      => 'post-author',
                'label'   =>  esc_html__( 'Show Author', 'rarebiz' ),
                'default' => 1,
                'type'    => 'rarebiz-toggle',
            ),
            array(
                'id'      => 'excerpt_length',
                'label'   => esc_html__( 'Excerpt Length', 'rarebiz' ),
                'description' => esc_html__( 'Defaults to 10.', 'rarebiz' ),
                'default' => 10,
                'type'    => 'number',
            ),
     	),
    ) );
}
add_action( 'init', 'rarebiz_post_options' );