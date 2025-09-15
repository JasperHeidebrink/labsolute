<?php

const D_VERSION = '1.0.3';
//define('D_VERSION', time());

require(  __DIR__  . '/DGinfiniteWP.php' );
new DGinfiniteWP();

function enqueueScripts()
{
    wp_enqueue_script(
        'labsolute',
        get_stylesheet_directory_uri() . '/script.js',
        [ 'jquery' ],
        D_VERSION,
        true
    );

    wp_register_style(
        'labsolute',
        get_stylesheet_uri(),
        [],
        D_VERSION
    );
    wp_enqueue_style( 'labsolute' );
}

add_action('wp_enqueue_scripts', 'enqueueScripts');

function add_header_favicon()
{
    echo '<link rel="apple-touch-icon" sizes="180x180" href="' . get_stylesheet_directory_uri() . '/favicon/apple-touch-icon.png">';
    echo '<link rel="icon" type="image/png" sizes="32x32" href="' . get_stylesheet_directory_uri() . '/favicon/favicon-32x32.png">';
    echo '<link rel="icon" type="image/png" sizes="16x16" href="' . get_stylesheet_directory_uri() . '/favicon/favicon-16x16.png">';
    echo '<link rel="manifest" href="' . get_stylesheet_directory_uri() . '/favicon/site.webmanifest">';
    echo '<link rel="mask-icon" href="' . get_stylesheet_directory_uri() . '/favicon/safari-pinned-tab.svg" color="#5bbad5">';
    echo '<meta name="msapplication-TileColor" content="#da532c">';
    echo '<meta name="theme-color" content="#ffffff">';
}

add_action('wp_head', 'add_header_favicon');

//add_action(
//    'wp',
//    function () {
//        global $wp_filter;
//        echo '<pre style="background:#0f0; padding: 2rem; width:100%; z-index:9999">';
//        var_dump( $wp_filter['wp_head'] );
//        echo '</pre>';
//
////        global $wp_actions;
////        echo '<pre style="background:#0f0; padding: 2rem; width:100%; z-index:9999">';
////        echo htmlspecialchars(print_r($wp_actions, true));
////        echo '</pre>';
//        die(__FILE__.':'.__LINE__);
//    }, 999
//);
