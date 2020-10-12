<?php
/**
 * Customizer Control: rrebiz-reapeter
 *
 * @since 1.0.2
 * @package Smile Charities Theme
 */

# Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) ) {
	class RareBiz_Page_Repeater extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 *
		 * @package Smile Charities Theme
		 */
		public $type = 'rarebiz-repeater';

		public $limit = 1000;

		public $pro_link = '';

		public $pro_text = '';

		public $repeat = '';

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @package Smile Charities Theme
		 */
		public function to_json() {

			parent::to_json();

			$this->json[ 'value' ] = ( '' == $this->value() ) ? json_encode( [ 0 ] ) : $this->value(); 

			$args = array( 'post_type' => 'post', 'posts_per_page' => -1 ); 
			$pages = get_posts( $args ); 
			$select_pages = array( esc_html__( '---Select Post---', 'smile-charities' ) ); 

			if( $pages && is_array( $pages ) ){
				foreach( $pages as $p ) { 
				  $select_pages[ $p->ID ] = $p->post_title; 
				} 
			}

			$this->json[ 'pages' ]  = $select_pages;
			$this->json[ 'link' ]  = $this->get_link();
			$this->json[ 'id' ]    = $this->id;
			$this->json[ 'limit' ] = $this->limit;
			$this->json[ 'repeat' ] = $this->repeat;
		}

		/**
		 * An Underscore (JS) template for this control's content (but not its container).
		 *
		 * Class variables for this control class are available in the `data` JS object;
		 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
		 *
		 * @access protected
		 * @since 1.0.0
		 *
		 * @package Smile Charities Theme
		 */
		protected function content_template() {
			?>
			<div class="page-repeater-template hidden">
				<div>
					<# _.each( data.repeat, function( value, type ) { #>
						<# if( 'text' == type ){ #>
							<span class="customize-control-title">{{value.label}}</span>
							<span class="customize-control-description">{{value.description}}</span>
							<input type="text" class="repeat-text-box">
						<# } #>
						<# if( 'page' == type ){ #>
							<span class="customize-control-title">{{value.label}}</span>
							<span class="customize-control-description">{{value.description}}</span>
							<select>
								<# _.each( data.pages, function( label, choice ) { #>
									<option value="{{ choice }}">{{ label }}</option>
								<# } ) #>
							</select>
						<# } #>
					<# }) #>
					<button data-index="{#index}" data-limit="{{ data.limit }}" class="page-repeater-remove"> 
						<span class="dashicons dashicons-trash"></span><?php esc_html_e( 'Delete', 'smile-charities' ) ?>
					</button>
				</div>
			</div>

			<label for="repeater_{{ data.id }}" class="customizer-text">
				<# if ( data.label ) { #>
					<span class="customize-control-title">{{{ data.label }}}</span>
				<# } #>
				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>
			</label>

			<div id="repeater_{{ data.id }}">
				<div class="page-repeater-selectors">
					<# var val = JSON.parse( data.value ); #>
					<#  _.each( val, function(l, c){ #>
						<div class="repeat-field">
							<# _.each( data.repeat, function( value, type ) { #>
								<# if( 'text' == type ){ #>
									<# if ( value.label ) { #>
										<span class="customize-control-title">{{value.label}}</span>
									<# } #>
									<# if ( value.description ) { #>
										<span class="customize-control-description">{{value.description}}</span>
									<# } #>
									<# if( l ){
										if( Array.isArray( l ) ){
											inputValue = l[ 0 ];
										}else{
											inputValue = l;
										}
									}else{
										inputValue = '';
									}#>
									<input type="text" value="{{ inputValue }}" class="repeat-text-box">
								<# } #>
								<# if( 'page' == type ){ #>
									<# if ( value.label ) { #>
										<span class="customize-control-title">{{value.label}}</span>
									<# } #>
									<# if ( value.description ) { #>
										<span class="customize-control-description">{{value.description}}</span>
									<# } #>
									<select>
										<# _.each( data.pages, function( label, choice ) { #>
											<# if( Array.isArray( l ) ){
												var selected = l[1];
											}else{
												var selected = l;
											} #>
											<option 
												value="{{ choice }}" 
												<# if ( selected == choice ) { #> selected<# } #>
												<# if ( 'pro' == choice ) { #> disabled<# } #>										
												> {{ label }}
											</option>
										<# }) #>
									</select>
								<# } #>
							<# }) #>
							<button data-index="{{c}}" data-limit="{{ data.limit }}" class="page-repeater-remove">
								<span class="dashicons dashicons-trash"></span><?php esc_html_e( 'Delete', 'smile-charities' ) ?>
							</button>
						</div>
					<# }) #>
				</div>

				<button
					data-limit="{{ data.limit }}" 
					class="page-repeater-add"
					style="display:<# if( val.length == data.limit ){ #>none<# }else{ #>block<# } #>;"
				>
					<?php esc_html_e( 'Add new', 'smile-charities' ); ?>
					<span class="dashicons dashicons-plus"></span> 
				</button>

				<input type="hidden" value="{{ data.value }}" {{{ data.link }}} />
			</div>
			<?php
		}

		public static function sanitize( $val ){

			if( json_decode($val) != null ){
				// is json
				return $val;
			}

			return '';
		}
	}
}

RareBiz_Customizer::add_custom_control( array(
    'type'     => 'rarebiz-repeater',
    'class'    => 'RareBiz_Page_Repeater',
    'sanitize' =>  array( 'RareBiz_Page_Repeater', 'sanitize' )
));

function rarebiz_page_repeater_control( $args, $section, $field ){

	if( isset( $field[ 'type' ] ) && 'rarebiz-repeater' == $field[ 'type' ] ){
		$args[ 'limit' ] = isset( $field[ 'limit' ] ) ? $field[ 'limit' ] : 1000;
	}

	$args[ 'repeat' ] = isset( $field[ 'repeat' ] ) ? $field[ 'repeat' ] : 'text';
	return $args;
}
add_filter( 'rarebiz_customizer_get_control_arg', 'rarebiz_page_repeater_control', 10, 3 );

function rarebiz_page_repeater_get( $value, $id, $instance ){

	if( isset( $instance::$controls[ $id ] ) && 'page-repeater' == $instance::$controls[ $id ][ 'type' ] ){
		return json_decode( $value );
	}	

	return $value;
}
add_filter( 'rarebiz_customizer_get', 'rarebiz_page_repeater_get', 10, 3 );