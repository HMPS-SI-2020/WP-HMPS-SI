<?php
/**
 * Plugin Name: SKT Templates
 * Plugin URI: https://www.sktthemes.org/shop/ready-to-import-wordpress-sites/
 * Description: SKT Templates is an Elementor themes library and allows you to select from over 100s of designs to choose from. All you need to do is view the demo and then select import and install. It takes care of the importing and allows you to edit the template from within your dashboard. It works with any popular theme or you can choose to use any theme from our <a href="https://www.sktthemes.org/product-category/free-wordpress-themes/" rel="nofollow ugc">SKT Themes free.</a> These templates allow you to import them into your existing website and edit them and use them to build professional websites. Importing a single page template is very easy and you can do it on your existing WordPress website as well.
 * Version: 1.3
 * Author: SKT Themes
 * Author URI: https://www.sktthemes.org
 * Text Domain: skt-templates
 *
 * @package SKT Templates
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Set up the activation redirect
register_activation_hook( __FILE__, 'skt_templates_activate' );
add_action( 'admin_init', 'skt_templates_activation_redirect' );

/**
 * Plugin activation callback. Registers option to redirect on next admin load.
 *
 * Saves user ID to ensure it only redirects for the user who activated the plugin.
 */
function skt_templates_activate() {
	// Don't do redirects when multiple plugins are bulk activated
	if (
		( isset( $_REQUEST['action'] ) && 'activate-selected' === $_REQUEST['action'] ) &&
		( isset( $_POST['checked'] ) && count( $_POST['checked'] ) > 1 ) ) {
		return;
	}
	add_option( 'skt_templates_activation_redirect', wp_get_current_user()->ID );
}

/**
 * Redirects the user after plugin activation.
 */
function skt_templates_activation_redirect() {
	// Make sure it's the correct user
	if ( intval( get_option( 'skt_templates_activation_redirect', false ) ) === wp_get_current_user()->ID ) {
		// Make sure we don't redirect again after this one
		delete_option( 'skt_templates_activation_redirect' );
		wp_safe_redirect( admin_url( '/admin.php?page=skt_template_directory' ) );
		exit;
	}
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_skt_templates() {
	define( 'SKTB_URL', plugins_url( '/', __FILE__ ) );
	define( 'SKB_PATH', dirname( __FILE__ ) );
	$plugin = new Skt_Templates();
	$plugin->run();
	$vendor_file = SKB_PATH . '/vendor/autoload.php';
	if ( is_readable( $vendor_file ) ) {
		require_once $vendor_file;
	}
	add_filter(
		'sktthemes_sdk_products',
		function ( $products ) {
			$products[] = __FILE__;

			return $products;
		}
	);
	add_filter(
		'sktthemes_companion_friendly_name',
		function( $name ) {
			return 'SKT Templates';
		}
	);
}

require 'class-autoloader.php';
Autoloader::set_plugins_path( plugin_dir_path( __DIR__ ) );
Autoloader::define_namespaces( array( 'Skt_Templates', 'SKTB', 'SKTB_Module' ) );
/**
 * Invocation of the Autoloader::loader method.
 *
 * @since   1.0.0
 */
spl_autoload_register( array( 'Autoloader', 'loader' ) );

/**
 * Style Loading Templates
 *
 * @since   1.0.0
 */

function skt_template_styles() {
	wp_enqueue_style( 'templaters', plugin_dir_url( __FILE__ ) . 'css/templaters.css' );
}

add_action( 'wp_enqueue_scripts', 'skt_template_styles' );

/**
 * The start of the app.
 *
 * @since   1.0.0
 */
run_skt_templates();