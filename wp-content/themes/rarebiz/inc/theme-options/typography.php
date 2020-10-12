<?php
/**
* Register typography Options
*
* @return void
* @since 1.0.0
*
* @package RareBiz WordPress theme
*/
function rarebiz_typography_options(){ 

    $message = esc_html__( 'The value is in px.', 'rarebiz' );
    RareBiz_Customizer::set(array(
        # Theme option
        'panel' => array(
            'id'       => 'panel',
            'title'    => esc_html__( 'RareBiz Options', 'rarebiz' ),
            'priority' => 10,
        ),
        # Theme Option > Header
        'section' => array(
            'id'    => 'typography',
            'title' => esc_html__( 'Typography','rarebiz' ),
            'priority' => 5
        ),
        # Theme Option > Header > settings
        'fields' => array(
            array(
                'id'          => 'site-info-font',
                'label'       => esc_html__( 'Site Identity Font Family', 'rarebiz' ),
                'description' => esc_html__( 'Font family for site title and tagline. Defaults to Poppins', 'rarebiz' ),
                'default'     => 'font-11',
                'type'        => 'select',
                'choices'     => RareBiz_Theme::get_font_family(),
            ),
            array(
                'id'      => 'body-font',
                'label'   =>  esc_html__( 'Body Font Family.', 'rarebiz' ),
                'description' => esc_html__( 'Defaults to Poppins.', 'rarebiz' ),
                'default' => 'font-11',
                'type'    => 'select',
                'choices' => RareBiz_Theme::get_font_family(),
            ),
            array(
                'id'          => 'heading-font',
                'label'       =>  esc_html__( 'Headings Font Family.', 'rarebiz' ),
                'description' =>  esc_html__( 'h1 to h6. Defaults to Poppins.', 'rarebiz' ),
                'default'     => 'font-11',
                'type'        => 'select',
                'choices'     => RareBiz_Theme::get_font_family(),
            ),
            array(
                'id'          => 'body-font-size',
                'label'       => esc_html__( 'Body Font Size.', 'rarebiz' ),
                'description' => $message . ' ' . esc_html__( 'Defaults to 15px.', 'rarebiz' ),
                'type'        => 'rarebiz-slider',
                'default' => array(
                    'desktop' => 15,
                    'tablet'  => 15,
                    'mobile'  => 15,
                ),
                'input_attrs' =>  array(
                    'min'   => 1,
                    'max'   => 40,
                    'step'  => 1,
                ),
            ),
            array(
                'id'          => 'post-title-size',
                'label'       => esc_html__( 'Post Title Font Size', 'rarebiz' ),
                'description' => $message . ' ' . esc_html__( 'Defaults to 21px.' , 'rarebiz' ),
                'default' => array(
                    'desktop' => 21,
                    'tablet'  => 21,
                    'mobile'  => 21,
                ),
                'input_attrs' =>  array(
                    'min'   => 1,
                    'max'   => 60,
                    'step'  => 1,
                ),
                'type' => 'rarebiz-slider',
            ),
            array(
                'id'          => 'primary-menu-font-size',
                'label'       => esc_html__( 'Primary Menu Font Size', 'rarebiz' ),
                'description' => $message . ' ' . esc_html( 'Defaults to 15px.', 'rarebiz' ),
                'type'        => 'rarebiz-slider',
                'default' => array(
                    'desktop' => 15,
                    'tablet'  => 15,
                    'mobile'  => 15,
                ),
                'input_attrs' =>  array(
                    'min'   => 1,
                    'max'   => 40,
                    'step'  => 1,
                ),
            ),
            array(
                'id'          => 'widget-title-font-size',
                'label'       => esc_html__( 'Widget Title Font Size', 'rarebiz' ),
                'description' => $message . ' ' . esc_html( 'Defaults to 18px.', 'rarebiz' ),
                'type'        => 'rarebiz-slider',
                'default' => array(
                    'desktop' => 18,
                    'tablet'  => 18,
                    'mobile'  => 18,
                ),
                'input_attrs' =>  array(
                    'min'   => 1,
                    'max'   => 60,
                    'step'  => 1,
                ),
            ),
            array(
                'id'          => 'widget-content-font-size',
                'label'       => esc_html__( 'Widget Content Font Size', 'rarebiz' ),
                'description' => $message . ' ' . esc_html( 'Defaults to 16px.', 'rarebiz' ),
                'type'        => 'rarebiz-slider',
                'default' => array(
                    'desktop' => 16,
                    'tablet'  => 16,
                    'mobile'  => 16,
                ),
                'input_attrs' =>  array(
                    'min'   => 1,
                    'max'   => 40,
                    'step'  => 1,
                ),
            ),
        )
    ));
}
add_action( 'init', 'rarebiz_typography_options' );