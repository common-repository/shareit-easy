<?php
// Add Scripts
function shea_add_scripts()
{
    wp_enqueue_style( 'shea-main-style', SHEA_PLUGIN_CSS. 'shea-style.css', array(), '1.0' );
    wp_enqueue_script( 'shea-main-script', SHEA_PLUGIN_JS . 'shea-main.js', array(), '1.0', true );
}

add_action('wp_enqueue_scripts', 'shea_add_scripts');
?>
