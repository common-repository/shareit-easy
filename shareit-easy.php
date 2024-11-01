<?php
/**
 * Plugin Name: ShareIt Easy
 * Description: Add a social share link to the end of the post
 * Version: 1.0.0
 * Tested up to: 6.5
 * Author: Wings Tech
 * Author URI: https://www.wingstechsolutions.com/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 **/
// Exit if accessed directly
if(!defined('ABSPATH'))
{
    exit;
}

// Defin Constant
define('SHEA_PLUGIN_PATH', plugin_dir_path(__FILE__).'/');
define('SHEA_INCLUDES', SHEA_PLUGIN_PATH .'includes/');

$plugins_url = plugins_url();
if ($plugins_url) { // Check if $plugins_url is not false
    define('SHEA_PLUGIN_URL', $plugins_url . '/shareit-easy/');
}
define('SHEA_URL_INCLUDES', SHEA_PLUGIN_URL.'includes/');
define('SHEA_PLUGIN_JS', SHEA_PLUGIN_URL.'js/');
define('SHEA_PLUGIN_CSS', SHEA_PLUGIN_URL.'css/');
define('SHEA_PLUGIN_ICON', SHEA_PLUGIN_URL.'icons/');

// Global Options Variable
$shea_options = get_option('shea_settings');

if (defined('SHEA_INCLUDES') && is_string(SHEA_INCLUDES) && SHEA_INCLUDES !== '') {
    if(is_admin())
    {
        // Load admin Settings
        require_once(SHEA_INCLUDES. 'shareit-easy-settings.php');
    }

    // load Scripts
    require_once(SHEA_INCLUDES. 'shareit-easy-scripts.php');

    // HTML code for front end
    require_once(SHEA_INCLUDES. 'shareit-easy-content.php');
}
?>