<?php
/**
 * Customizer Control: rarebiz-anchor.
 *
 * @since 1.0.0
 *
 * @package RareBiz WordPress theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Exit if it get loaded before WP_class Customize_Section class
if ( ! class_exists( 'WP_Customize_Section' ) ) {
	return;
}

class RareBiz_Anchor_Customize_Section extends WP_Customize_Section {

	/**
	* The control type.
	*
	* @access public
	* @var string
	*/
	public $type = 'rarebiz-anchor';
	public $url  = '';
	public $id = '';

	/**
	 * JSON.
	 */
	public function json() {
		$json 		 = parent::json();
		$json['url'] = esc_url( $this->url );
		$json['id']  = $this->id;
		return $json;
	}

	/**
	 * Render template
	 *
	 * @access protected
	 */
	protected function render_template() {
		?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }}">
			<h3>
				<a href="{{{ data.url }}}" target="_blank">{{ data.title }}</a>
			</h3>
		</li>
		<?php
	}
}

require get_theme_file_path( 'classes/customizer/custom-control/anchor/hook.php' );