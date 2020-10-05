<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.sktthemes.org
 * @since      1.0.0
 *
 * @package    Skt_Templates
 * @subpackage Skt_Templates/app
 */

class Skt_Templates_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Skt_Templates_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Skt_Templates_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$screen = get_current_screen();
		if ( empty( $screen ) ) {
			return;
		}
		if ( in_array( $screen->id, array( 'toplevel_page_skt_template_about' ), true ) ) {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . '../assets/css/skt-templates-admin.css', array(), $this->version, 'all' );
		}
		do_action( 'sktb_admin_enqueue_styles' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Skt_Templates_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Skt_Templates_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		$screen = get_current_screen();
		if ( empty( $screen ) ) {
			return;
		}
		if ( in_array( $screen->id, array( 'toplevel_page_skt_template_about' ), true ) ) {
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . '../assets/js/skt-templates-admin.js', array( 'jquery' ), $this->version, false );
		}
		do_action( 'sktb_admin_enqueue_scripts' );
	}

	/**
	 * Add admin menu items for skt-templates.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function menu_pages() {
		add_menu_page(
			__( 'SKT Templates', 'skt-templates' ),
			__( 'SKT Templates', 'skt-templates' ),
			'manage_options',
			'skt_template_about',
			array(
				$this,
				'page_modules_render',
			),
			'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAMAAAAoLQ9TAAAAIGNIUk0AAHomAACAhAAA+gAAAIDo
AAB1MAAA6mAAADqYAAAXcJy6UTwAAAKFUExURfaJIveKIfaNIPaLIfWMI/eKI/WMIfeLH/aJIPSO
IvaNJPaMHveMIviLIveNIPeMJPaMH/SNJvaNIvWLJfeOI/iNI/eOJfWPI/WQJveOIfKQJfiMJ/iN
JfmOJPiPJPOOIvWOJfaQJPiRKveSJvaOHfiMIPePIPaOH/mMI/aQIviPIvmPIvaPJvqPJfiTJ/aS
I/muXfrXr/3cufirWfnGh/vJlPioU/zewvnNnPvdt/vgw/7cufi7ePaQIfaWKPeVKv/x7PvRp/q6
c/u9gvvYsPzs3P3v5PvNmfiZL/iwXv/39PerU/ebNveVKPqZMPWUKfi0Yf7p1PzlxveoTPjSof//
//769/egOfaRH/mnQ/7x6PigP/SWJfmYMfebLvefNfrIjfm3afzjxf3ixfzWp/z16/7y5P3WrfaV
JPmoTf726/ikQviZK/ecMfaeMPidK/rNlPvw3v7t3fzBe/3UqPvbtPqwWf348vmsUPqnR//s2/ml
Q/meK/ugNfihOPmbJ/ilPfelQfqbLfmjPPekPPicLfqkP/ekOvefM/ehNPmhNfehMvakOPmjNviy
UPq7bPitSPmtTfiuTfipRPywWPmxTfqqR/qtUfmqRfetTPmkOvmmPvimNvatR/nGhPjYpfrSl/vR
lfzPlvraq/rUo//Xq/jUoPzUofivUPapPfmpOveqQPiwTPq1WPqxUvqxU/m+cPq4Yfi1Wve1Vfm1
VPi2X/qrQvqoPPetQPisPvirP/iqPfioOfiqPvepOverO/irOfepPPqpPfeqOPiqO/asP/msQPut
QfqtQ/auP/ivQPiuQ/quQPmvQveuP/iuQfqtQfiwQviwQfqwRfmvRPuuRPevQxYhL/8AAAABYktH
RFWTBLgzAAAAB3RJTUUH5AgGCRgw/wl0UwAAAEZ0RVh0UmF3IHByb2ZpbGUgdHlwZSBhcHAxMgAK
YXBwMTIKICAgICAgMTUKNDQ3NTYzNmI3OTAwMDEwMDA0MDAwMDAwNjQwMDAwCo97YnMAAABSdEVY
dFJhdyBwcm9maWxlIHR5cGUgZXhpZgAKZXhpZgogICAgICAyMgo0NTc4Njk2NjAwMDA0OTQ5MmEw
MDA4MDAwMDAwMDAwMDAwMDAwMDAwMDAwMAr5oEG6AAACMXpUWHRSYXcgcHJvZmlsZSB0eXBlIHht
cAAAOI2VVVuS4yAM/Ncp9gigJz6OE8zfVs3nHH9bOE8nU5kNVTaWhLppCULff7/oT/4iGslZRrQo
Xl385BbKxdnNwxffpDNv43Q6DWbYF9e0WIhpl6I9igpimy+kLdbAQpNYdTN1vJFQBIuYZcjGRc7R
ZI3mWOg9wbxyyW8/+xaSPkoEsFEfyUPW3XELn0zuaWA75Qq9reBiTbsV4iQ3YprEeJPCHXyKOGb5
rLBVEVGJHHyGleGv8A+8Gc8qTNzxClkRyniWXH4YfNkeg4XLaqyqftga03Tm9looRpEV2xkxf7wF
onibjGMiLzluTBjPvgOAEfiiPqlINGwLCOl/ZgEKKBUKwb5MpRYohIir3ytBsBEQNlntwj7WIgV+
5TvBtnuJMBfCtGMrDXxSvDrlHu9Takf3/JCWnvO+T4uE/U1yCbVs3akxfSb9Pnk2d0AvxIxMRyFT
I8YC2/On1Dt2ptcU2JBEs3aWAMPPL01ZwAgBGSRzVrJBTSSd87RlMDrhIflUatWstGStPVkb6aKz
YnsQtrLMo7miSYtWzZZmzBuiAt+KXqpqWqXJAm/FDEatpCZptLmgQL0jctKXsDx92W0vwLoD0wF5
+YT8Cry3Lh3QbfauAx0fmGfFykOhVz9oc2VIH7Tx3zKkJ20ekX+pzRWYLsjx/9rw5fbkvBuUfj7b
j2H3e+hmPVy+OGu7681fgGU7zu3wfnvTP4Egax6nORRNAAABG0lEQVQY0wEQAe/+AAABAgMEBQEG
AwYHBwMHCAYACQoLDAMNDgYPChAREhMMAQAUFRYXGBkaGxQcHR4fFSAhACIjJCUkGR4mJygpKiYr
LC0ALi8wMTIzNDU2Nzg5Ojs8PQA+P0BBQkNERUZHSElKS0xNAE5PUFFSU1RVVldYWVpbXF0AXl9g
YWJjZGVmZ2hpamtsbQBub3BxcnN0dXZ3eHl6e3xfAH1+f4CBgoOEhYaHiIGJiosAjI2Oj5CRkpOU
lZaXmJmagwCbnJ2en6ChoqOkpaahp6icAKmqq6ytrq+wsa2ys7S1trcAuLm6u7y9vr++wMHCw8TF
xgDHuMjHycrLzM3Oz9DPysvHAMjR0dLTy8vR1M3Uy9XW1M2VxmuLudm6lgAAACV0RVh0ZGF0ZTpj
cmVhdGUAMjAyMC0wOC0wNlQwOToyNDo0OCswMzowMCWu7rMAAAAldEVYdGRhdGU6bW9kaWZ5ADIw
MjAtMDgtMDZUMDk6MjQ6NDgrMDM6MDBU81YPAAAAAElFTkSuQmCC',
			'75'
		);
		add_submenu_page( 'skt_template_about', __( 'SKT Templates General Options', 'skt-templates' ), __( 'About Templates', 'skt-templates' ), 'manage_options', 'skt_template_about' );
	}

	/**
	 * Add the initial dashboard notice to guide the user to the OrbitFox admin page.
	 *
	 * @since   2.3.4
	 * @access  public
	 */
	public function visit_dashboard_notice() {
		global $current_user;
		$user_id = $current_user->ID;
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		if ( ! get_user_meta( $user_id, 'skt_templates_ignore_visit_dashboard_notice' ) ) { ?>
			<div class="notice notice-info" style="position:relative;">
				<p>
				<?php
					/*
					 * translators: Go to url.
					 */
					echo sprintf( esc_attr__( 'You have activated SKT Templates plugin! Go to the %s to get started.', 'skt-templates' ), sprintf( '<a href="%s">%s</a>', esc_url( add_query_arg( 'skt_templates_ignore_visit_dashboard_notice', '0', admin_url( 'admin.php?page=skt_template_directory' ) ) ), esc_attr__( 'Template Directory', 'skt-templates' ) ) );
				?>
					</p>
				<a href="<?php echo esc_url( add_query_arg( 'skt_templates_ignore_visit_dashboard_notice', '0', admin_url( 'admin.php?page=skt_template_directory' ) ) ); ?>"
				   class="notice-dismiss" style="text-decoration: none;">
					<span class="screen-reader-text">Dismiss this notice.</span>
				</a>
			</div>
			<?php
		}
	}

	/**
	 * Dismiss the initial dashboard notice.
	 *
	 * @since   2.3.4
	 * @access  public
	 */
	public function visit_dashboard_notice_dismiss() {
		global $current_user;
		$user_id = $current_user->ID;
		// phpcs:ignore WordPress.PHP.StrictComparisons.LooseComparison
		if ( isset( $_GET['skt_templates_ignore_visit_dashboard_notice'] ) && '0' == $_GET['skt_templates_ignore_visit_dashboard_notice'] ) {
			add_user_meta( $user_id, 'skt_templates_ignore_visit_dashboard_notice', 'true', true );
			wp_safe_redirect( admin_url( 'admin.php?page=skt_template_directory' ) );
			exit;
		}
	}

	/**
	 * Calls the skt_templates_modules hook.
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function load_modules() {
		do_action( 'skt_templates_modules' );
	}

	/**
	 * Method to display modules page.
	 *
	 * @codeCoverageIgnore
	 *
	 * @since   1.0.0
	 * @access  public
	 */
	public function page_modules_render() {
		$global_settings = new Skt_Templates_Global_Settings();

		$modules = $global_settings::$instance->module_objects;

		$rdh           = new Skt_Templates_Render_Helper();
		$panels        = '';
		$count_modules = 0;
		foreach ( $modules as $slug => $module ) {
			if ( $module->enable_module() ) {
				$module_options = $module->get_options();
				$options_fields = '';
				if ( ! empty( $module_options ) ) {
					foreach ( $module_options as $option ) {
						$options_fields .= $rdh->render_option( $option, $module );
					}

					$panels .= $rdh->get_partial(
						'module-panel',
						array(
							'slug'           => $slug,
							'name'           => $module->name,
							'active'         => $module->get_is_active(),
							'description'    => $module->description,
							'show'           => $module->show,
							'no_save'        => $module->no_save,
							'options_fields' => $options_fields,
						)
					);
				}
			}// End if().
		}// End foreach().

		$no_modules = false;
		$empty_tpl  = '';

		$data   = array(
			'panels'        => $panels,
		);
		$output = $rdh->get_view( 'modules', $data );
		echo $output; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

}