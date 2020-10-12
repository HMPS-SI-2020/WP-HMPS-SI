<?php
/**
 * Smile_Charities functions and definitions
 * Smile_Charities only works in WordPress 4.7 or later.
 *
 * @link https://developer.wordpress.org/themes/advanced-topics/child-themes/
 * @package Smile Charities
 */

final class Smile_Charities{
	public function __construct(){
		# enqueue script
		add_action( 'wp_enqueue_scripts', array( __CLASS__, 'scripts' ) );
		add_action( 'customize_controls_enqueue_scripts', array( __CLASS__, 'customizer_scripts' ), 99	);

		# After parent theme
		add_action( 'after_setup_theme', array( __CLASS__, 'after_parent_theme' ) );
	}

	/**
	* Enqueue styles and scripts
	*
	* @static
	* @access public
	* @since  1.0.0
	*
	* @package Smile Charities
	*/
	public static function scripts(){
		$scripts = array(
			# enqueue parent stylesheet
			array(
				'handler'  => 'rarebiz-style',
				'style'    => get_template_directory_uri() . '/style.css',
				'version'  => wp_get_theme()->get('Version'),
				'absolute' => true,
				'minified' => false
			),
			array(
			    'handler' => 'smile-script',
			    'script'  => 'assets/js/script.js',
			),
			array(
		        'handler' => 'slick',
		        'script'  => 'assets/js/slick.js',
		    ),
	    	array(
	            'handler' => 'slick',
	            'style'  => 'assets/css/slick.css',
	        )
		);

		RareBiz_Helper::enqueue( $scripts );
	}

	/**
	 * Enqueue the style and scripts used in customizer
	 *
	 * @static
	 * @access public
	 * @return object
	 * @since  1.0.0
	 *
	 * @package Smile Charities
	 */
	public static function customizer_scripts(){
		$scripts = array(
			array(
				'handler'  => 'smile-charities-repeater',
				'style'    => get_stylesheet_directory_uri() . '/classes/custom-control/repeater/assets/repeater.css',
				'absolute' => true,
				'minified' => false
			),
			array(
				'handler'  => 'smile-charities-repeater',
				'script'    => get_stylesheet_directory_uri() . '/classes/custom-control/repeater/assets/repeater.js',
				'absolute' => true,
				'minified' => false
			)

		);

		RareBiz_Helper::enqueue( $scripts );
	}

	/**
	 * After parent theme
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 *
	 * @package Smile Charities
	 */
	public static function after_parent_theme(){
		# include custom control
		RareBiz_Helper::include( array(
			'cat-dropdown/cat-dropdown',
			'repeater/repeater'
		), 'classes/custom-control', '');

		# include dynamic css
		RareBiz_Helper::include( array(
			'common',
			'responsive'
		), 'includes/dynamic-css', '');

		# include dynamic css
		RareBiz_Helper::include( array(
			'banner-slider',
			'smile-header-options'
		), 'includes/theme-options', '');

		# include dynamic css
		require get_stylesheet_directory() . '/classes/class-excerpt.php';

		# filter to modify priority
		add_filter( RareBiz_Helper::with_prefix( 'customizer_get_defaults','_' ), array( __CLASS__ , 'change_defaults' ), 99 ,2 );

		#filter to change default on admin
		add_filter( RareBiz_Helper::fn_prefix( 'customizer_get_setting_arg' ), array( __CLASS__, 'change_default_admmin' ), 10, 2 );

		# Register or modify customizer options
		add_action( 'customize_register', array( __CLASS__, 'customize_register' ) );

		# displays the inner banner and breadcrumb
		remove_action( RareBiz_Helper::fn_prefix( 'after_header' ), array( 'RareBiz_Theme' , 'the_inner_banner_content' ) );
		remove_action( 'init', 'rarebiz_banner_section_options' );

		add_action( RareBiz_Helper::fn_prefix( 'after_header' ), array( __CLASS__ , 'the_inner_banner_content' ) );

		#header button
		add_action( RareBiz_Helper::fn_prefix( 'after_primary_menu' ), array( __CLASS__, 'add_button' ), 30 );

		#donation plugin recommendation
		add_action( 'tgmpa_register', array( __CLASS__, 'register_required_plugins' ) );
	}

	/**
	 * Change default value
	 *
	 * @static
	 * @access public
	 * @since  1.0.0
	 *
	 * @package Smile Charities
	 */	
	public static function change_defaults( $def, $instance ){
		$id = RareBiz_Helper::with_prefix( 'footer-copyright-text' );
		$pc = RareBiz_Helper::with_prefix( 'primary-color' );
	
		$def[ $id ] = esc_html__( 'Copyright &copy; 2020 | Smile Charities', 'smile-charities' );
		$def[ $pc ] = '#fdc513';
		return $def;
	}

	/**
	 * Change default value on admin
	 *
	 * @static
	 * @access public
	 * @since  1.0.1
	 *
	 * @package Smile Charities
	 */	
	public static function change_default_admmin( $args, $field ){
		if( $field[ 'id' ] == RareBiz_Helper::with_prefix( 'footer-copyright-text' ) ){
			$args[ 'default' ] = esc_html__( 'Copyright &copy; 2020 | Smile Charities', 'smile-charities' );
		}
		if( $field[ 'id' ] == RareBiz_Helper::with_prefix( 'primary-color' ) ){
			$args[ 'default' ] = '#fdc513';
		}
		return $args;
	}

	/**
	* Register or modify customizer options
	*
	* @static
	* @access public
	* @since  1.0.0
	* @return void
	*
	* @package Smile Charities
	*/
	public static function customize_register( $wp_customize ){
		$wp_customize->get_setting( 'header_textcolor' )->default = '#fdc513';
	}

	/**
	* Adds button on header
	*
	* @static
	* @access public
	* @since  1.0.0
	* @return void
	*
	* @package Smile Charities
	*/
	public static function add_button(){
		if( '' != rarebiz_get( 'smile-header-btn-txt' ) ): ?>
			<a href="<?php echo esc_url( rarebiz_get( 'smile-header-btn-url' ) ); ?>" class="header-btn">
				<?php echo esc_html( rarebiz_get( 'smile-header-btn-txt' ) ); ?>
			</a>
		<?php endif;
	}

	/**
	* Add a wrapper on inner banner and breadcrumb
	*
	* @static
	* @access public
	* @since  1.0.0
	*
	* @package Smile Charities
	*/
	public static function the_inner_banner_content( ){

		$disable = false;
		# inner banner should not load in 404 page,
		if( 
			# don't load it in 404 page
			is_404() ||
			( ( is_page() || 								# don't load if disabled on page					
				RareBiz_Theme::is_woo_shop_page() || 				# don't load if disabled on woocommerce shop page
				RareBiz_Theme::is_static_blog_page() ||				# don't load if disabled on static blog page
				RareBiz_Theme::is_static_front_page()				# don't load if disabled on static homepage
 			  ) && RareBiz_Theme::get_meta( 'disable-inner-banner' ) 
			) ||
			# remove banner on woocommerce category page
			RareBiz_Theme::is_woo_product_category() ||
			# don't load it if it is blog page and title is empty
			( is_home() && is_front_page() && !RareBiz_Theme::get_blog_title() )
		){ 
			$disable = true;
		}

		# since 1.0.0
		if( apply_filters( RareBiz_Theme::fn_prefix( 'child_disable_inner_banner_content' ), $disable) ){
			return;
		}
		
		if( is_home() || RareBiz_Helper::is_static_front_page() ){
			if( !rarebiz_get( 'enable-slider' ) ){
				return;
			}
			get_template_part( 'templates/content/content', 'slider' );
		}else{
			get_template_part( 'templates/content/content', 'banner' );
		}
	}

	/**
	 * Get according to type
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 *
	 * @package Smile Charities
	 */
	public static function get_posts_by_type( $type, $cat_id ){
		$post_per_page = apply_filters( RareBiz_Helper::fn_prefix( 'slider_post_per_page' ), 3 );
		$posts = array();
		if( 'post' == $type ){
			$posts = json_decode( rarebiz_get( 'slider-posts' ) );
		}elseif( 'category' == $type ){			
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => $post_per_page,
				'orderby' => 'post__in',
				'ignore_sticky_posts' => 1,
			);
			if( $cat_id ){
				$args[ 'cat' ] = $cat_id; 
			}

			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
			    while ( $query->have_posts() ) {
			        $query->the_post();
			        $posts[] = get_the_ID();
			    }
			}
			wp_reset_postdata();					
		}
		if( empty( $posts ) ){
			return false;
		}else{
			return $posts;
		}
	}

	/**
	 *Plugin recommendation
	 *
	 * @static
	 * @access public
	 * @since 1.0.0
	 *
	 * @package RareBiz WordPress Theme
	 */
	public static function register_required_plugins(){
		$plugins = array(
			array(
				'name'     => esc_html__( 'GiveWP – Donation Plugin and Fundraising Platform', 'smile-charities' ),
				'slug'     => 'give',
				'required' => false,
			),
		);

		tgmpa( $plugins );
	}
}

new Smile_Charities;