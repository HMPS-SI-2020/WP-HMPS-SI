<?php 
/**
 * SKT Secure functions and definitions
 *
 * @package SKT Secure
 */
 global $content_width;
 if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */ 
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! function_exists( 'skt_secure_setup' ) ) : 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function skt_secure_setup() {
	load_theme_textdomain( 'skt-secure', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support('woocommerce');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_post_type_support( 'page', 'excerpt' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'custom-logo', array(
		'height'      => 51,
		'width'       => 230,
		'flex-height' => true,
	) );	
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'skt-secure' )			
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_editor_style( 'editor-style.css' );
} 
endif; // skt_secure_setup
add_action( 'after_setup_theme', 'skt_secure_setup' );
function skt_secure_widgets_init() { 	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'skt-secure' ),
		'description'   => esc_html__( 'Appears on sidebar', 'skt-secure' ),
		'id'            => 'sidebar-1',
		'before_widget' => '',		
		'before_title'  => '<h3 class="widget-title titleborder"><span>',
		'after_title'   => '</span></h3><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) ); 	
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'skt-secure' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-secure' ),
		'id'            => 'fc-1',
		'before_widget' => '',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'skt-secure' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-secure' ),
		'id'            => 'fc-2',
		'before_widget' => '',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'skt-secure' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-secure' ),
		'id'            => 'fc-3',
		'before_widget' => '',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );		
		
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'skt-secure' ),
		'description'   => esc_html__( 'Appears on page footer', 'skt-secure' ),
		'id'            => 'fc-4',
		'before_widget' => '',		
		'before_title'  => '<h5>',
		'after_title'   => '</h5><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );	
	
}
add_action( 'widgets_init', 'skt_secure_widgets_init' );
function skt_secure_font_url(){
		$font_url = '';		
		/* Translators: If there are any character that are not
		* supported by Roboto Condensed, trsnalate this to off, do not
		* translate into your own language.
		*/
		$robotocondensed = _x('on','Roboto Condensed:on or off','skt-secure');		
		/* Translators: If there has any character that are not supported 
		*  by Scada, translate this to off, do not translate
		*  into your own language.
		*/	
		$roboto = _x('on','Roboto:on or off','skt-secure');
		$assistant = _x('on','Assistant:on or off','skt-secure');
		$anton = _x('on','Anton:on or off','skt-secure');
		$playfairdisplay = _x('on','Playfair Display:on or off','skt-secure');
		$oswald = _x('on','Oswald:on or off','skt-secure');
		$firasans = _x('on','Fira Sans:on or off','skt-secure');
		
		if('off' !== $robotocondensed ){
			$font_family = array();
			if('off' !== $robotocondensed){
				$font_family[] = 'Roboto Condensed:300,400,600,700,800,900';
			}
			if('off' !== $roboto){
				$font_family[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
			}	
			if('off' !== $assistant){
				$font_family[] = 'Assistant:200,300,400,600,700,800';
			}	
 			if('off' !== $anton){
				$font_family[] = 'Anton:400';
			}	
			if('off' !== $playfairdisplay){
				$font_family[] = 'Playfair Display:400,400i,700,700i,900,900i';
			}	
			if('off' !== $oswald){
				$font_family[] = 'Oswald:200,300,400,500,600,700';
			}
			if('off' !== $firasans){
				$font_family[] = 'Fira Sans:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
			}			
									
			$query_args = array(
				'family'	=> urlencode(implode('|',$font_family)),
			);
			$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
		}
	return $font_url;
	}
function skt_secure_scripts() {
	wp_enqueue_style('skt-secure-font', skt_secure_font_url(), array());
	if ( !is_rtl() ) {
		wp_enqueue_style( 'skt-secure-basic-style', get_stylesheet_uri() );
		wp_enqueue_style( 'skt-secure-main-style', get_template_directory_uri()."/css/responsive.css" );		
	}
	if ( is_rtl() ) {
		wp_enqueue_style( 'skt-secure-rtl', get_template_directory_uri() . "/rtl.css");
	}	
	wp_enqueue_style( 'skt-secure-editor-style', get_template_directory_uri()."/editor-style.css" );
	wp_enqueue_style( 'skt-secure-animation-style', get_template_directory_uri()."/css/animation.css" );
	wp_enqueue_style( 'nivo-slider', get_template_directory_uri()."/css/nivo-slider.css" );
	wp_enqueue_style( 'skt-secure-base-style', get_template_directory_uri()."/css/style_base.css" );
	wp_enqueue_script( 'jquery-nivo', get_template_directory_uri() . '/js/jquery.nivo.slider.js', array('jquery') );
	wp_enqueue_script( 'skt-secure-custom-js', get_template_directory_uri() . '/js/custom.js' );	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skt_secure_scripts' );

define('SKT_SECURE_SKTTHEMES_URL','https://www.sktthemes.org/','skt-secure');
define('SKT_SECURE_SKTTHEMES_PRO_THEME_URL','https://www.sktthemes.org/shop/security-company-wordpress-theme','skt-secure');
define('SKT_SECURE_SKTTHEMES_FREE_THEME_URL','https://www.sktthemes.org/shop/free-security-wordpress-theme','skt-secure');
define('SKT_SECURE_SKTTHEMES_THEME_DOC','http://sktthemesdemo.net/documentation/secure-pro-documentation','skt-secure');
define('SKT_SECURE_SKTTHEMES_LIVE_DEMO','https://www.sktperfectdemo.com/demos/securepro/','skt-secure');
define('SKT_SECURE_SKTTHEMES_THEMES','https://www.sktthemes.org/themes','skt-secure');

/**
 * Custom template for about theme.
 */
require get_template_directory() . '/inc/about-themes.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
// get slug by id
function skt_secure_get_slug_by_id($id) {
	$post_data = get_post($id, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug; 
}
if ( ! function_exists( 'skt_secure_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function skt_secure_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;
require_once get_template_directory() . '/customize-pro/example-1/class-customize.php';
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function skt_secure_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_html(get_bloginfo( 'pingback_url' ) ));
	}
}
add_action( 'wp_head', 'skt_secure_pingback_header' );
add_filter( 'body_class','skt_secure_body_class' );
function skt_secure_body_class( $classes ) {
 	$hideslide = get_theme_mod('hide_slides', 1);
	if (!is_home() && is_front_page()) {
		if( $hideslide == '') {
			$classes[] = 'enableslide';
		}
	}
    return $classes;
}
/**
 * Filter the except length to 21 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function skt_secure_custom_excerpt_length( $excerpt_length ) {
    return 21;
}
add_filter( 'excerpt_length', 'skt_secure_custom_excerpt_length', 999 );
/**
 *
 * Style For About Theme Page
 *
 */
function skt_secure_admin_about_page_css_enqueue($hook) {
   if ( 'appearance_page_skt_secure_guide' != $hook ) {
        return;
    }
    wp_enqueue_style( 'skt-secure-about-page-style', get_template_directory_uri() . '/css/skt-secure-about-page-style.css' );
}
add_action( 'admin_enqueue_scripts', 'skt_secure_admin_about_page_css_enqueue' );


// WordPress wp_body_open backward compatibility
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

/**
 * Include the Plugin_Activation class.
 */

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'skt_secure_register_required_plugins' );
 
function skt_secure_register_required_plugins() {
	$plugins = array(
		array(
			'name'      => 'SKT Templates',
			'slug'      => 'skt-templates',
			'required'  => false,
		) 				
	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'skt-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}