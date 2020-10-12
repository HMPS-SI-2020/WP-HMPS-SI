<?php


namespace ExtendThemes\Skyline;


use ColibriWP\Theme\Components\CSSOutput;
use ColibriWP\Theme\Components\Header\NavBarStyle as NavStyle;
use ColibriWP\Theme\Defaults;
use ColibriWP\Theme\Translations;

class NavBarStyle extends  NavStyle {
	
    protected static $instances = array();

    public function getOptions( ) {
        $options = parent::getOptions();

        $prefix      = $this->getPrefix();
		$section     = 'nav_bar';
		$colibri_tab = 'content';
		$priority    = 10;

		return array(
			"settings" => array(

				"{$prefix}props.layoutType" => array(
					'default'    => Defaults::get( "{$prefix}props.layoutType" ),
					'control'    => array(
						'label'       => Translations::get( 'layout_type' ),
						'focus_alias' => "navigation",
						'type'        => 'select-icon',
						'section'     => $section,
						'colibri_tab' => $colibri_tab,
						'priority'    => $priority ++,
						'choices'     => array(
							'logo-spacing-menu' =>
								array(
									'tooltip' => Translations::get( 'logo_nav' ),
									'label'   => Translations::get( 'logo_nav' ),
									'value'   => 'logo-spacing-menu',
									'icon'    => Defaults::get( 'icons.logoNav.content' ),
								),

							'logo-above-menu' =>
								array(
									'tooltip' => Translations::get( 'logo_above' ),
									'label'   => Translations::get( 'logo_above' ),
									'value'   => 'logo-above-menu',
									//'icon'    => $icons['logoAbove']['content'],
									'icon'    => Defaults::get( 'icons.logoAbove.content' ),
								),
						),
					),
					'css_output' => array(
						array(
							'selector' => "{$this->selector} .h-column-container",
							'property' => 'flex-basis',
							'value'    => array(
								'logo-spacing-menu' => 'auto',
								'logo-above-menu'   => '100%',
							),
						),
						array(
							'selector' => "{$this->selector} .h-column-container:nth-child(1) a",
							'property' => 'margin',
							'value'    => array(
								'logo-spacing-menu' => 'auto',
								'logo-above-menu'   => 'auto',
							),
						),
						array(
							'selector' => "{$this->selector} .h-column-container:nth-child(2)",
							'property' => 'display',
							'value'    => array(
								'logo-spacing-menu' => 'block',
								'logo-above-menu'   => 'none',
							),
						),
						array(
							'selector' => "{$this->selector} div > .colibri-menu-container > ul.colibri-menu",
							'property' => 'justify-content',
							'value'    => array(
								'logo-spacing-menu' => 'normal',
								'logo-above-menu'   => 'center',
							),
						),

					),
				),
			),
		);
		
        return $options;
    }
}
