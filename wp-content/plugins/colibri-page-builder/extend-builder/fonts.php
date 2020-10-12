<?php

namespace ExtendBuilder;

add_filter('extend_builder/google_fonts', function ($fonts) {
	$page_fonts = array();
	$data = get_current_data();

	foreach ($data['partials'] as $partial_type => $partial) {
		$partial_fonts = array_get_value($partial, 'meta.fonts.google');
		if ($partial_fonts) {
			$page_fonts = array_merge_recursive($page_fonts, $partial_fonts);
		}
	}

	//global fonts//
	$theme_fonts = array_get_value($data, 'options.theme.fonts.google');
    $fonts = array_merge_recursive($page_fonts, $theme_fonts);

    return $fonts;
});


function enqueue_google_fonts()
{
    
    $fonts = array();
    $fonts = apply_filters("extend_builder/google_fonts", $fonts);

    if (!count($fonts)) {
        return;
    }

    $fontQuery = array();
    foreach ($fonts as $family => $font) {
        $fontQuery[] = $family . ":" . implode(',', $font['weights']);
    }

    $query_args = array(
        'family' => urlencode(implode('|', $fontQuery)),
        'subset' => urlencode('latin,latin-ext'),
    );


    $fontsURL = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
    wp_enqueue_style(prefix() . '-fonts', $fontsURL, array(), null);
}

add_action('wp_enqueue_scripts', '\ExtendBuilder\enqueue_google_fonts');
