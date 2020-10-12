<?php
  /**
  * Register dynamic css
  *
  * @since 1.0.0
  *
  * @package Smile Charities

  */
function smile_charities_common_css(){
 	$style = array(
 		array(
	 		'selector' => '.rarebiz-bottom-header a.header-btn, .rarebiz-header-style-2-menu a.header-btn',
	 		'props' => array(
	 			'background-color' => 'smile-header-bg-color',
	 			'color' => 'smile-header-txt-color'
	 		)
	 	),
	 	array(
	 		'selector' => '.inner-banner-btn a, ul.slick-dots li.slick-active button, .inner-banner-btn a.btn-2:hover',
	 		'props' => array(
	 			'background' => 'primary-color',
	 		)
	 	),
	 	array(
	 		'selector' => '.inner-banner-btn a:hover',
	 		'props' => array(
	 			'color' => 'primary-color',
	 		)
	 	)
 	);

 	RareBiz_Css::add_styles( $style, 'md' );
 }
 add_action( 'init', 'smile_charities_common_css' );