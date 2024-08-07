<?php
/*
Plugin Name: WP Word Search
Plugin URI: 
Description: Plugin para buscar palavras em uma lista.
Author: Antonio Marcos dos Santos
Version: 1.0.0
Author URI: https://github.com/amarcos
*/

function wp_ws_enqueue_scripts_styles()
{    
    wp_enqueue_script( 'wp-ws-scripts', plugin_dir_url( __FILE__ ) . 'js/scripts.js', array('jquery'), null, true );    

    wp_enqueue_style( 'wp-ws-styles', plugin_dir_url( __FILE__ ) . 'css/styles.css', false);
}
add_action('wp_enqueue_scripts', 'wp_ws_enqueue_scripts_styles');

    function wp_ws_shortcode($atts) {
        
        $atts = shortcode_atts(
            array(
                'wordlist' => '',
                'sort' => '',
                'case' => '',            
                'align' => '',
                'formplaceholder' => 'Buscar',                
                'wrapperclass' => '',
            ), 
            $atts, 
            'wordsearch'
        );

        $word_list = esc_html($atts['wordlist']);        
        $sort = $atts['sort'];
        $case = $atts['case'];
        $align = $atts['align'];
        $form_placeholder = esc_html($atts['formplaceholder']);
        $wrapper_class = esc_html($atts['wrapperclass']);
        
        $word_array = array_map('trim', explode(',', $word_list));
        $word_array = wp_ws_sort_word_list($word_array, $sort);
        $word_array = wp_ws_change_word_case($word_array, $case);

        $output = '<div id="wp-ws-wrapper" class="wp-ws-wrapper ' . $wrapper_class . '"><form class="wp-ws-form-search" method="POST"><input type="text" name="wp-ws-search" class="wp-ws-search" placeholder="' . $form_placeholder . '"></form>';
        $output .= wp_ws_get_word_list_grid($word_array, $align);
        $output .= '</div>';
        
        return $output;
    }
    add_shortcode('wordsearch', 'wp_ws_shortcode');

function wp_ws_sort_word_list(array $word_list = [], string $sort = '') : array{

    $allowed_sort_options = [
        'asc', 
        'desc'
    ];

    if (empty($word_list) || !in_array($sort, $allowed_sort_options)) {
        return $word_list;
    }

    $collator = new Collator('pt_BR');

    if ($sort == 'asc') {
        usort($word_list, [$collator, 'compare']);
        
        return $word_list;
    }

    usort($word_list, function($a, $b) use ($collator) {
        return $collator->compare($b, $a);
    });

    return $word_list;
}

function wp_ws_change_word_case(array $word_list = [], string $case = '') : array{

    $allowed_case_options = [
        'upper' => MB_CASE_UPPER, 
        'lower' => MB_CASE_LOWER, 
        'title' => MB_CASE_TITLE
    ];

    if (empty($word_list) || !array_key_exists($case, $allowed_case_options)) {
        return $word_list;
    }
    
    $case = $allowed_case_options[$case];

    return array_map(function($word) use ($case) {
        return mb_convert_case($word, $case, "UTF-8");
    }, $word_list);
}

function wp_ws_get_word_list_grid(array $word_list = [], string $align = '') : string {

    $allowed_align_options = [
        'text-start', 
        'text-center', 
        'text-end'
    ];

    if (empty($word_list)) {
        return $word_list;
    }

    $align = in_array($align, $allowed_align_options) ? $align : '';

    $output = '';
    foreach ($word_list as $word) {
        $output .= '<div class="wl-card"><div class="wl-content ' . $align . '">' . $word . '</div></div>';
    }
    
    return '<div class="wl-container">' . $output . '</div>';
}