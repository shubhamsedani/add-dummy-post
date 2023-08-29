<?php
/*
Plugin Name:    Add dummy post
Plugin URI:     https://wordpress.org/plugins/add-dummy-post/
Description:    Add Dummy Post in WordPress
Version:        1.0.0
Author:         shubhamsedani
Text Domain:    adp
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if( !defined( 'ADP_DIR' ) ) {
    define('ADP_DIR', dirname( __FILE__ ) ); // plugin dir
}
if( !defined( 'ADP_URL' ) ) {
    define('ADP_URL', plugin_dir_url( __FILE__ ) ); // plugin url
}
//get more knowledge on this
if( !defined('ADP_BASENAME') ){
    define('ADP_BASENAME', 'ADP');  // plugin base name
}
if( !defined( 'ADP_ADMIN_DIR' ) ) {
    define('ADP_ADMIN_DIR', ADP_DIR . '/backend' ); // plugin admin dir
}
if( !defined( 'ADP_ADMIN_URL' ) ) {
    define('ADP_ADMIN_URL', ADP_DIR . 'backend' ); // plugin admin url
}
if( !defined( 'ADP_FRONT_DIR' ) ) {
    define('ADP_FRONT_DIR', ADP_DIR . '/frontend' ); // plugin frontend dir
}
if( !defined( 'ADP_FRONT_URL' ) ) {
    define('ADP_FRONT_URL', ADP_DIR . 'frontend' ); // plugin frontend url
}
if( !defined( 'ADP_SETTINGS_TABLE' ) ) {
    define( 'ADP_SETTINGS_TABLE', 'ADP_settings' ); // define the table name - to store seleted options details
}
//include custom function file for backend
include ADP_ADMIN_DIR . '/includes/adp-back-end-custom-functions.php';

//include custom function file for frontend
include ADP_FRONT_DIR . '/includes/adp-front-end-custom-functions.php';

//get more knowledge on this
function adp_load_scripts() {
    wp_enqueue_style('adp_custom_css', ADP_URL . 'backend/assets/public-style.css');
    wp_enqueue_script('adp_custom_js', ADP_URL . 'backend/assets/public-script.js');
}
add_action( 'admin_init','adp_load_scripts');

/**
 * Activation Hook
 *
 * Register plugin activation hook.
 */
register_activation_hook( __FILE__, 'adp_install' );

/**
 * Deactivation Hook
 *
 * Register plugin deactivation hook.
 */
register_deactivation_hook( __FILE__, 'adp_deactivate' );

/**
 * Uninstall Hook
 *
 * Register plugin deactivation hook.
 */
register_uninstall_hook ( __FILE__, 'adp_uninstall' );

/**
 * Plugin Setup (On Activation)
 *
 * Does the initial setup,
 * stest default values for the plugin options.
 */
function adp_install() {
    //create custom table for plugin

    //IMP Call of Function
    //Need to call when custom post type is being used in plugin
    flush_rewrite_rules();
}

/**
 * Plugin Setup (On Deactivation)
 *
 * Delete plugin options.
 */
function adp_deactivate() {

}
/**
 * Plugin Setup (On Uninstall)
 *
 * Delete plugin options.
 */
function adp_uninstall() {
    //drop custom table for plugin
}

?>