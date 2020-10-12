<?php
/**
* Active callback function for footer author
*
* @static
* @access public
* @return boolen
* @since 1.0.0
*
* @package RareBiz WordPress theme
*/
if( !function_exists( 'rarebiz_acb_footer_author' ) ){
	function rarebiz_acb_footer_author( $control ){
		$value = $control->manager->get_setting( RareBiz_Helper::with_prefix( 'footer-author-show' ) )->value();
		return $value;
	}
}

/**
 * Creates option for footer author
 * Register footer Options author section
 *
 * @since 1.0.0
 * @package RareBiz WordPress Theme
 */
function rarebiz_footer_author_options(){

	$disable_section = apply_filters( RareBiz_Helper::with_prefix( 'disable-autohr-options' ), true );
	if( $disable_section ){
		return;
	}

	RareBiz_Customizer::set(array(
		'panel' => 'panel',
		'section' => array(
			'id' => 'footer',
			'title' => esc_html__( 'Footer Options', 'rarebiz' ),
		),
		'fields' => array(
			array(
				'id'      => 'footer-author-show',
				'label'   => esc_html__( 'Show Author', 'rarebiz' ),
				'default' => true,
				'type'    => 'rarebiz-toggle',
			),
			array(
				'id'      => 'footer-author',
				'label'   => esc_html__( 'Author Text', 'rarebiz' ),
				'default' => esc_html__( 'Created By: Rise Themes', 'rarebiz' ),
				'active_callback' => 'acb_footer_author',
				'type'    => 'text',
			    'partial' =>	array(
			    	'selector'	=>	'.credit-link'
				)
			)
		)
	));
}
add_action( 'init', 'rarebiz_footer_author_options' );