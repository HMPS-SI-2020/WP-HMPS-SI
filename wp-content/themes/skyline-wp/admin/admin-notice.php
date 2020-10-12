<?php

use ColibriWP\Theme\Core\Hooks;
use ColibriWP\Theme\Core\Utils;
use ColibriWP\Theme\Defaults;

$skyline_front_page_design = false;

foreach ( Defaults::get( 'front_page_designs', array() ) as $design ) {
    if ( Utils::pathGet( $design, 'display', true ) ) {
        if ( Utils::pathGet( $design, 'meta.slug' ) === 'modern' ) {
            $skyline_front_page_design = $design;
            break;
        }

    }
}

?>
<style>
    .colibri-admin-big-notice--container .action-buttons,
    .colibri-admin-big-notice--container .content-holder {
        display: flex;
        align-items: center;
    }


    .colibri-admin-big-notice--container .front-page-preview {
        max-width: 362px;
        margin-right: 40px;
    }

    .colibri-admin-big-notice--container .front-page-preview img {
        max-width: 100%;
        border: 1px solid #ccd0d4;
    }

</style>
<div class="colibri-admin-big-notice--container">
    <div class="content-holder">

        <div class="front-page-preview">
            <?php $skyline_front_page_design_image = get_stylesheet_directory_uri() . "/screenshot.jpg"; ?>
            <img class="selected"
                 data-index="<?php echo esc_attr( $skyline_front_page_design['index'] ); ?>"
                 src="<?php echo esc_url( $skyline_front_page_design_image ); ?>"/>
        </div>
        <div class="messages-area">
            <div class="title-holder">
                <h1><?php esc_html_e( 'Would you like to install the pre-designed Skyline WP homepage?',
                        'skyline-wp' ) ?></h1>
            </div>
            <div class="action-buttons">
                <button class="button button-primary button-hero start-with-predefined-design-button">
                    <?php esc_html_e( 'Install the Skyline WP homepage', 'skyline-wp' ); ?>
                </button>
                <span class="or-separator"></span>
                <button class="button-link skyline-maybe-later">
                    <?php esc_html_e( 'Maybe Later', 'skyline-wp' ); ?>
                </button>
            </div>
            <div class="content-footer ">
                <div>
                    <div class="plugin-notice">
                        <span class="spinner"></span>
                        <span class="message"></span>
                    </div>
                </div>
                <div>
                    <p class="description large-text">
                        <?php esc_html_e( 'This action will also install the Colibri Page Builder plugin.',
                            'skyline-wp' ); ?>
                    </p>
                </div>
            </div>
        </div>

    </div>
    <?php
    $skyline_builder_slug = Hooks::colibri_apply_filters( 'plugin_slug', 'colibri-page-builder' );
    wp_localize_script( get_template() . "-page-info", 'colibriwp_builder_status', array(
        "status"         => colibriwp_theme()->getPluginsManager()->getPluginState( $skyline_builder_slug ),
        "install_url"    => colibriwp_theme()->getPluginsManager()->getInstallLink( $skyline_builder_slug ),
        "activate_url"   => colibriwp_theme()->getPluginsManager()->getActivationLink( $skyline_builder_slug ),
        "slug"           => $skyline_builder_slug,
        "view_demos_url" => add_query_arg(
            array(
                'page'        => 'colibri-wp-page-info',
                'current_tab' => 'demo-import'
            ),
            admin_url( 'themes.php' )
        ),
        "messages"       => array(
            "installing" => \ColibriWP\Theme\Translations::get( 'installing',
                'Colibri Page Builder' ),
            "activating" => \ColibriWP\Theme\Translations::get( 'activating',
                'Colibri Page Builder' )
        ),
    ) );
    ?>
</div>
