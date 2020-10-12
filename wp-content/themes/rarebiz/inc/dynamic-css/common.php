<?php 
/**
 * Common css for all devices
 *
 * @since 1.0.0
 * @package RareBiz WordPress Theme
 */

add_action( 'init', RareBiz_Helper::fn_prefix( 'custom_width' ), 150 );
add_action( 'customize_preview_init', RareBiz_Helper::fn_prefix( 'custom_width' ), 150 );

/**
 * Adjust custom width
 *
 * @since 1.0.0
 * @package RareBiz WordPress Theme
 */
function rarebiz_custom_width(){

	if( 'default' == rarebiz_get( 'container-width' ) ) :
		# container width
		$style = array(
			array(
				'selector' => '.container',
				'props' => array(
					'max-width' => 'container-custom-width',
			)
		));

	endif;
	RareBiz_Css::add_styles( $style, 'md' );
}

add_action( 'init', 'rarebiz_all_device_css' );
/**
 * Register dynamic css
 *
 * @since 1.0.0
 * @package RareBiz WordPress Theme
 */
function rarebiz_all_device_css(){

	$style = array(
		# Primary Color
		array(
			'selector' => RareBiz_Helper::with_prefix_selector( '.pagination .nav-links > *.current, ::selection, %s-main-menu > ul > li > a:after, %s-btn-primary, #infinite-handle span, ul.wc-block-grid__products li.wc-block-grid__product button, ul.wc-block-grid__products li.wc-block-grid__product .wp-block-button__link, ul.wc-block-grid__products li.wc-block-grid__product button:hover, ul.wc-block-grid__products li.wc-block-grid__product .wp-block-button__link:hover, ul.wc-block-grid__products li.wc-block-grid__product .wc-block-grid__product-onsale, .woocommerce ul.products li.product .button, .woocommerce ul.products li.product .added_to_cart.wc-forward,
				.woocommerce ul.products li.product .onsale, .single-product .product .onsale, .single-product .product .entry-summary button.button, .woocommerce-cart .woocommerce .cart-collaterals .cart_totals a.checkout-button.button.alt.wc-forward,  .woocommerce-cart .woocommerce form.woocommerce-cart-form table button.button, form.woocommerce-checkout div#order_review #payment button#place_order, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .widget.woocommerce.widget_price_filter .price_slider_amount .button, .widget .woocommerce-product-search button, .woocommerce ul.products li.product-category.product h2, a.cart-icon span, #site-navigation li.menu-item:before, div#mr-mobile-menu li.menu-item:before, .widget-area .widget .widget-title:after, .footer-widget-wrapper .widget .widget-title:after, #calendar_wrap #today, .post .post-categories li a, .widget_tag_cloud .tagcloud a, .rarebiz-inner-banner-wrapper .inner-banner-btn a.btn-1, .rarebiz-post .image-full'
			 ),
			'props' => array(
				'background-color' => 'primary-color',
			)
		),
		array(
			'selector' => '#infinite-handle span',
			'props' => array(
				'color' => 'primary-color',
			)
		),		
		array(
			'selector' => RareBiz_Helper::with_prefix_selector( '.product-with-slider %s-arrow svg, .product-with-slider %s-arrow svg:hover' ),
			'props' => array(
				'fill' => 'primary-color',
			)
		),		
		array(
			'selector' => RareBiz_Helper::with_prefix_selector(  ' %s-post .entry-content-stat + a:hover, %s-post %s-comments a:hover, %s-bottom-header-wrapper %s-header-icons %s-search-icon, .pagination .nav-links > *, ul.wc-block-grid__products li.wc-block-grid__product del span.woocommerce-Price-amount.amount, .woocommerce ul.products li.product a.woocommerce-LoopProduct-link del span.woocommerce-Price-amount.amount, ul.wc-block-grid__products li.wc-block-grid__product del, .woocommerce ul.products li.product .star-rating, ul.wc-block-grid__products li.wc-block-grid__product .wc-block-grid__product-title a:hover, .single-product .product .entry-summary .product_meta > span a, .single-product .stars a, .single-product .star-rating span::before, .wc-block-grid__product-rating .wc-block-grid__product-rating__stars span:before, .single-product .product .entry-summary .star-rating span::before, .single-product .product .entry-summary a.woocommerce-review-link, .woocommerce .star-rating, .woocommerce del, li.wc-layered-nav-rating a, .woocommerce ul.products li.product-category.product h2 mark.count, a.cart-icon, a.cart-icon:visited, .rarebiz-inner-banner-wrapper .inner-banner-btn a.btn-2, .rarebiz-post .post-title a:hover, .rarebiz-main-menu > ul > li > a:hover, #secondary .widget a:hover, #secondary .widget ul li a:hover, .footer-widget ul li a:hover' ),
			'props' => array(
				'color' => 'primary-color',
			)
		),
		array(
			'selector' => RareBiz_Helper::with_prefix_selector( '.pagination .nav-links > *, %s-post.sticky' ),
			'props' => array(
				'border-color' => 'primary-color',
			)
		),

		# Typography
		array(
			'selector' => '.site-branding .site-title, .site-branding .site-description, .site-title a',
			'props'    => array(
				'font-family' => 'site-info-font'
			)
		),
		array(
			'selector' => 'body',
			'props'    => array(
				'font-family' => 'body-font'
			)
		),
		array(
			'selector'  => 'h1, h2, h3, h4, h5, h6, h1 a, h2 a, h3 a, h4 a, h5 a, h6 a',
			'props'	=> array(
				'font-family' => 'heading-font',
			),
		),
		# Color Options
		array(
			'selector'  => 'body, body p, body div, .woocommerce-Tabs-panel, div#tab-description, .woocommerce-tabs.wc-tabs-wrapper',
			'props'		=> array(
				'color' => 'body-paragraph-color',
			),
		),
		array(
			'selector'  => RareBiz_Helper::with_prefix_selector( '%s-main-menu > ul > li > a, nav#primary-menu > ul > li > a, .rarebiz-transparent-header .rarebiz-header-icons a i' ),
			'props'		=> array(
				'color' => 'primary-menu-item-color',
			),
		),
		array(
			'selector'  => 'body a, body a:visited',
			'props'		=> array(
				'color' => 'link-color',
			),
		),
		array(
			'selector'  => 'body a:hover',
			'props'		=> array(
				'color' => 'link-hover-color',
			),
		),
		array(
			'selector'  => '#secondary .widget-title',
			'props'		=> array(
				'color' => 'sb-widget-title-color',
			),
		),		
		array(
			'selector'  => '#secondary .widget, #secondary .widget a, #secondary .widget ul li a',
			'props'		=> array(
				'color' => 'sb-widget-content-color',
			),
		),
		array(
			'selector'  => '.footer-widget .widget-title',
			'props'		=> array(
				'color' => 'footer-title-color',
			),
		),
		array(
			'selector'  => '.footer-top-section',
			'props'		=> array(
				'background-color' => 'footer-top-background-color',
			),
		),
		array(
			'selector'  => '.rarebiz-topbar-wrapper',
			'props'		=> array(
				'background' => 'topbar-bg-color',
			),
		),
		array(
			'selector'  => '.rarebiz-topbar-wrapper .rarebiz-top-bar-info div, .rarebiz-topbar-wrapper .rarebiz-top-bar-info .rarebiz-contact-info p',
			'props'		=> array(
				'color' => 'topbar-text-color',
			),
		),		
		array(
			'selector'  => '.footer-bottom-section',
			'props'		=> array(
				'background-color' => 'footer-copyright-background-color',
			),
		),		
		array(
			'selector'  => '.footer-widget, .footer-widget p, .footer-widget span, .footer-widget ul li a,  #calendar_wrap #wp-calendar th, #calendar_wrap td, #calendar_wrap caption, #calendar_wrap td a,  .footer-widget ul li',
			'props'		=> array(
				'color' => 'footer-content-color',
			),
		),
		array(
			'selector'  => '.footer-bottom-section span, .footer-bottom-section .credit-link',
			'props'		=> array(
				'color' => 'footer-copyright-text-color',
			),
		),		
		# inner banner
		array(
			'selector' => RareBiz_Helper::with_prefix_selector( '%s-inner-banner-wrapper:after' ),
			'props'    => array(
				'background-color' => 'ib-background-color'
			)
		),
		array(
			'selector' => RareBiz_Helper::with_prefix_selector( '%s-inner-banner-wrapper %s-inner-banner .entry-title' ),
			'props'    => array(
				'color' => 'ib-title-color'
			)
		),
		# Breadcrumb
		array(
			'selector'  => '.wrap-breadcrumb ul.trail-items li a:after',
			'props'		=> array(
				'content' => 'bc-separator',
			),
		),
		array(
			'selector'  => '.wrap-breadcrumb ul li a, .wrap-breadcrumb ul li span, .taxonomy-description p',
			'props'		=> array(
				'color' => 'ib-title-color'
			),
		),
		array(
			'selector'  =>  '.rarebiz-top-bar-content, header.rarebiz-site-header, .rarebiz-transparent-header.add-bg-header #masthead',
			'props'		=> array(
				'background' => 'header-bg-color'
			),
		),
		array(
			'selector' => '.site-branding .site-title a, .site-branding .site-description',
			'props' => array(
				'color' => array(
					'customizer' => false,
					'value'		=> '#' . get_theme_mod( 'header_textcolor' ,'ffffff' ),
					'unit' => ''
				)
			)
		),
	);

	RareBiz_Css::add_styles( $style, 'md' );
}