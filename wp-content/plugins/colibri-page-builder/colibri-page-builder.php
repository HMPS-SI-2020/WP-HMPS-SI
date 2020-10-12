<?php
/* 
 *	Plugin Name: Colibri Page Builder 
 *  Author: ExtendThemes
 *  Description: Colibri Page Builder adds drag and drop page builder functionality to the ColibriWP theme.
 *
 * License: GPLv3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 * Version: 1.0.182
 * Text Domain: colibri-page-builder
 */

if ( ! in_array( get_option( 'template' ), array( 'colibri-wp', 'colibri', 'one-page-express') ) ) {
    require_once 'utils/survey.php';
    require_once 'recommendations/colibri-wp.php';
    return;
} else {
	$is_customize_page = ( is_admin() && 'customize.php' == basename( $_SERVER['PHP_SELF'] ) );
	$theme = get_template(); 
	if (isset($_GET['theme']) && $_GET['theme'] != get_stylesheet()) {
		$theme = $_GET['theme'];
	}

	//if is theme preview
	if ($is_customize_page && $theme !== 'colibri-wp') {
		return;
	}
}

$current_file = basename(__FILE__);
//is free
$is_free = $current_file === 'colibri-page-builder.php';
if($is_free) {
	$pro_builder_is_active = false;
	$active_plugins = get_option('active_plugins');
	foreach($active_plugins as $active_plugin) {
		if(strpos($active_plugin, 'colibri-page-builder-pro') !== false) {
			$pro_builder_is_active = true;
		}
	}
}

//checks on free if the pro plugin is active
if ( class_exists( '\ColibriWP\PageBuilder\PageBuilder' ) || $is_free && $pro_builder_is_active ) {
	return;
}

// Make sure that the companion is not already active from another theme
if (!defined("COLIBRI_PAGE_BUILDER_AUTOLOAD")) {
	require_once __DIR__ . "/vendor/autoload.php";
	define("COLIBRI_PAGE_BUILDER_AUTOLOAD", true);
}

if (!defined("COLIBRI_PAGE_BUILDER_VERSION")) {
	define("COLIBRI_PAGE_BUILDER_VERSION", "1.0.182");
}


\ColibriWP\PageBuilder\PageBuilder::load(__FILE__);
add_filter('colibri_page_builder/installed', '__return_true');


require_once 'extend-builder/extend-builder.php';
require_once 'recommendations/wpmu.php';
