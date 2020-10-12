<?php
/**
 * Customizer Control: rarebiz-rarebiz-toggle.
 *
 * @since 1.0.0
 *
 * @package RareBiz WordPress Theme
 */

# Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return null;
}
/**
 * This class is for the rarebiz-toggle control in the Customizer.
 *
 * @access public
 */
class RareBiz_Toggle_Control extends WP_Customize_Control {

   /**
    * The control type.
    *
    * @since  1.0.0
    * @access public
    * @var    string
    *
    * @package RareBiz WordPress Theme
    */
	public $type = 'rarebiz-toggle';

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
		// The setting value.
		$this->json['id']           = $this->id;
		$this->json['value']        = $this->value();
		$this->json['link']         = $this->get_link();
		$this->json['defaultValue'] = $this->setting->default;
	}

   /**
	* Don't render the content via PHP.  This control is handled with a JS template.
	*
	* @access public
	* @since  1.0.0
	* @return void
	*
	* @package RareBiz WordPress Theme
	*/
	public function render_content() {}

   /**
	* An Underscore (JS) template for this control's content.
	*
	* Class variables for this control class are available in the `data` JS object;
	* export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	*
	* @see    WP_Customize_Control::print_template()
	*
	* @access protected
	* @since  1.3.4
	* @return void
	*
	* @package RareBiz WordPress Theme
	*/
	protected function content_template() {
		?>
		<label class="rarebiz-toggle">
			<div class="rarebiz-toggle--wrapper">

				<# if ( data.label ) { #>
					<span class="customize-control-title">{{ data.label }}</span>
				<# } #>

				<input id="rarebiz-toggle-{{ data.id }}" type="checkbox" class="rarebiz-toggle--input" value="{{ data.value }}" {{{ data.link }}} <# if ( data.value ) { #> checked="checked" <# } #> />
				<label for="rarebiz-toggle-{{ data.id }}" class="rarebiz-toggle--label"></label>
			</div>

			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{ data.description }}</span>
			<# } #>
		</label>
		<?php
	}
}

rarebiz_Customizer::add_custom_control( array(
    'type'     => 'rarebiz-toggle',
    'class'    => 'RareBiz_Toggle_Control',
    'sanitize' => array( 'RareBiz_Customizer', 'sanitize_checkbox' )
));