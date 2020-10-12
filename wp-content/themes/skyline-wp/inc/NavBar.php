<?php

namespace ExtendThemes\Skyline;


use ColibriWP\Theme\AssetsManager;
use ExtendThemes\Skyline\NavBarStyle;
use ColibriWP\Theme\Components\FrontHeader\NavBar as Nav;
use ColibriWP\Theme\Core\ComponentBase;
use ColibriWP\Theme\Defaults;
use ColibriWP\Theme\View;

class NavBar extends Nav {

    /**
     * @return array();
     */
    protected static function getOptions() {
        $style = static::style()->getOptions();

        return $style;
    }

    /**
     * @return NavBarStyle
     */
    public static function style() {
        return NavBarStyle::getInstance( static::getPrefix(), static::selectiveRefreshSelector() );
    }
}
