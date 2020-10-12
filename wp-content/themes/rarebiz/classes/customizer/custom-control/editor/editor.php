<?php
/** 
 * Customizer Control: rarebiz-editor
 *
 * @since 1.0.1
 * @package RareBiz WordPress Theme
 */

# Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) ) {
	class RareBiz_Editor_Control extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 *
		 * @package RareBiz WordPress Theme
		 */
		public $type = 'rarebiz-editor';

		/**
		 * Refresh the parameters passed to the JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @package RareBiz WordPress Theme
		 */
		public function to_json() {
			parent::to_json();
			$this->json[ 'link' ]  = $this->get_link();
			$this->json[ 'id' ]    = $this->id;
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
		 * @package RareBiz WordPress Theme
		 */
		protected function content_template() {?>
			<div class="rarebiz-tinymce-rarebiz-editor">
				<label>
					<# if ( data.label ) { #><span class="customize-control-title">{{{ data.label }}}</span><# } #>
					<# if ( data.description ) { #><span class="description customize-control-description">{{{ data.description }}}</span><#
					} #>
				</label>
				<textarea id="{{{ data.id }}}" {{{ data.link }}}>{{ data.value }}</textarea>
			</div>
		<?php }
	}
}

RareBiz_Customizer::add_custom_control( array(
    'type'     => 'rarebiz-editor',
    'class'    => 'RareBiz_Editor_Control',
    'sanitize' => 'wp_kses_post'
));