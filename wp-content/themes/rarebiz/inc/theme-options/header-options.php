<?php
/**
* Register more header options
*
* @return void
* @since 1.0.0
*
* @package RareBiz WordPress theme
*/
function rarebiz_header_options(){
	RareBiz_Customizer::set(array(
		# Theme option
		'panel' => 'panel',
		# Theme Option > Header
		'section' => array(
		    'id'    => 'main-header',
		    'title' => esc_html__( 'Header Options', 'rarebiz' ),
		    'priority'    => 2,
		),
		# Theme Option > Header > settings
		'fields' => array(
			array(
				'id'	=> 'transparent-header',
				'label' => esc_html__( 'Transparent Header', 'rarebiz' ),
				'default' => true,
 				'type'  => 'rarebiz-toggle'
			),
			array(
			    'id'      	  => 'layout-header',
			    'label'   	  => esc_html__( 'Header Layout', 'rarebiz' ),
			    'type'    	  => 'rarebiz-buttonset',
			    'default' 	  => 'layout-1',
			    'choices' 	  => array(
		    	    'layout-1' => esc_html__( 'Layout 1', 'rarebiz' ),
		    	    'layout-2'  => esc_html__( 'Layout 2', 'rarebiz' ),
			    )
			),
			array(
			    'id'      	  => 'site-identity-layout',
			    'label'   	  => esc_html__( 'Logo And Site Identity Layout', 'rarebiz' ),
			    'type'    	  => 'rarebiz-radio-image',
			    'default' 	  => '1',
			    'choices' => array(
			        '1' => array(
			            'label' => esc_html__( 'Logo left', 'rarebiz' ),
						'url'   => false,
						'svg'   => '
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 270 86"><image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQ4AAABWAgMAAABDdZAYAAAACVBMVEVsrrrq6ur///9uMR70AAAAV0lEQVRYw+3YIQ6AMAwF0J5np5nB7HTIZafEbI4EUUgIvK+aiqd+KhpbPjVuQdpIBwKBQCAQCOTDyB4rBfI40ufqavoToid5xGWDQCAQCAQCOUNe86M+AILt9aRr0ixjAAAAAElFTkSuQmCC"/></svg>'
			        ),
			        '2' => array(
			            'label' => esc_html__( 'Logo top', 'rarebiz' ),
						'url'   => false,
						'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 270 86"><image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQ4AAABWAgMAAABDdZAYAAAADFBMVEVsrrq2193q6ur///+zG1jiAAAAWElEQVRYw+3YIQ6AMBAEwHM8g6/0qWgML2xa0VQSRJsUwqw6NWqz4uIczxFTkKsMBwKBQCCrkBw9GwQC+SRi2SAQCGQqktow70/XnxA9gUAgEMgd8pofdQU21isgaTepogAAAABJRU5ErkJggg=="/></svg>'
			        ),	                
			        '3' => array(
			            'label' => esc_html__( 'Logo Right', 'rarebiz' ),
						'url'   => false,
						'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 270 86"><image id="Background" width="270" height="86" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQ4AAABWCAYAAAA+G3iLAAABeklEQVR4nO3awWnDQBBAUTmohS0pBaSQVJNCUkA62i3CwQafAsE/iCSY9y46WDJiDp9l0GnOed4AgifDAqr9dv8Yw/CAb621rj87cQCZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcACZcADZbmRwrNf3j3870beX50P+x4kDyIQDyIQDyIQDyA5bjv7FQqgserzfV4/0fvwuJw4gEw4gEw4gO805z5eHxhimBwd45A/A1lrXqxMHkAkHkAkHkAkHkFmOAnezHAV+TDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiATDiAbL89sNYyPeAuThxAs23bJ6sRKapPoPNQAAAAAElFTkSuQmCC"/></svg>'
			        ),
			    )
			),
			array(
				'id'      => 'header-bg-image',
				'label'   => esc_html__( 'Background Image', 'rarebiz' ),
				'type'    => 'image',
			),
			array(
				'id'      => 'header-bg-color',
				'label'   => esc_html__( 'Background Color', 'rarebiz' ),
				'default' => '#000000ad',
				'type'    => 'rarebiz-color-picker',
			),
			array(
				'id'      => 'primary-menu-item-color',
				'label'   => esc_html__( 'Primary Menu Item color', 'rarebiz' ),
				'default' => '#fff',
				'type'    => 'rarebiz-color-picker',
			)
		),
	));
}
add_action( 'init', 'rarebiz_header_options' );