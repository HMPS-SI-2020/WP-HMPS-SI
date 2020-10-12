<?php
/**
 * Register dynamic css for responsive devices
 *
 * @since 1.0.0
 *
 * @package RareBiz WordPress Theme
 */
function rarebiz_responsive_device_css(){
	foreach( array( 'md' => 'desktop', 'sm' => 'tablet', 'xs' => 'mobile' ) as $size => $device ){

		RareBiz_Css::add_styles( array(
			#Typography
			array(
				'selector'  => 'body, .footer-bottom-section a, .footer-bottom-section span',
				'props'		=> array(
					'font-size'	  => 'body-font-size-' . $device,
				),
			),
			array(
				'selector'  => RareBiz_Helper::with_prefix_selector( '%s-post .post-title a' ),
				'props'		=> array(
					'font-size' => 'post-title-size-' . $device,
				),
			),
			array(
				'selector' => RareBiz_Helper::with_prefix_selector( '%s-main-menu > ul > li > a' ),
				'props'	   => array(
					'font-size'	=> 'primary-menu-font-size-' . $device,
				),
			),
			array(
				'selector'  => '.footer-widget .widget-title, #secondary .widget-title',
				'props'		=> array(
					'font-size' => 'widget-title-font-size-' . $device,
				),
			),
			array(
				'selector'  => '.footer-widget, .footer-widget p, .footer-widget span, .footer-widget ul li a, #secondary, #secondary li , #secondary li a, #secondary p ',
				'props'		=> array(
					'font-size' => 'widget-content-font-size-' . $device,
				),
			),
			# Inner Banner Options
			array(
				'selector'  => RareBiz_Helper::with_prefix_selector( '%s-inner-banner-wrapper %s-inner-banner .entry-title' ),
				'props'		=> array(
					'font-size' => 'ib-title-size-' . $device,
				),
			),
			array(
				'selector' => RareBiz_Helper::with_prefix_selector( '%s-inner-banner-wrapper' ),
				'props' => array(
					'min-height' => 'ib-height-' . $device,
				),
			),
			array(
				'selector'  => '.wrap-breadcrumb ul li a, .wrap-breadcrumb ul li span, .wrap-breadcrumb ul.trail-items li a:after',
				'props'		=> array(
					'font-size' => 'bc-size-' . $device
				),
			),
			array(
				'selector'  => '.site-branding .site-title',
				'props'		=> array(
					'font-size' => 'title-size-' . $device,
				),
			),
			array(
				'selector'  => '.site-branding .site-description',
				'props'		=> array(
					'font-size' => 'tagline-size-' . $device,
				),
			),
			array(
				'selector' => '.site-branding img',
				'props' => array(
					'max-width' => 'logo-size-' . $device,
				)
			)
		), $size );
	}
}
add_action( 'init', 'rarebiz_responsive_device_css' );
