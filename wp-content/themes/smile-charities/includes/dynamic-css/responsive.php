<?php
add_action( 'init', 'smile_charities_responsive_device_css' );

/**
 * Register dynamic css for responsive devices
 *
 * @since 1.0.0
 *
 * @package Smile Charities
 */
function smile_charities_responsive_device_css(){
	foreach( array( 'md' => 'desktop', 'sm' => 'tablet', 'xs' => 'mobile' ) as $size => $device ){

		RareBiz_Css::add_styles( array(

		), $size );
	}
}