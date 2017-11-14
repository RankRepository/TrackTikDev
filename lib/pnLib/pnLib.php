<?php
/**
 * This lib contain PnPostType Class for creating postType and metavalue
 * 
 * Also include the necessary JS and CSS
 */


include_once "pn_posttype.php";
include_once "pn_page.php";
include_once "pn_global.php";
include_once "pn_option.php";
include_once "pn_taxonomy.php";
include_once "pn_field.php";

include_once "pn_posttype_lib.php";
include_once "pn_input_template.php";




/**
 * Load the script and style for the admin side
 */
function load_custom_wp_admin_style_n_script() {

    $pnLibDir = str_replace(get_home_path(), "", __DIR__);
    $pnLibDirUrl  = get_site_url() . "/" . $pnLibDir;

    $pnRelativePath = dirname(__FILE__);

    wp_enqueue_media();

    wp_register_style( 'admin_css', $pnLibDirUrl . '/assets/dist/css/admin.css', array(), filemtime($pnRelativePath . '/assets/dist/css/admin.css') );
    wp_enqueue_style( 'admin_css' );

    wp_register_script( 'admin_script', $pnLibDirUrl . '/assets/dist/js/admin.js', array("jquery", "wp-color-picker"), filemtime($pnRelativePath . '/assets/dist/js/admin.js') );
    wp_enqueue_script( 'admin_script' );

    wp_register_script( 'googlejs', "https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places", array("jquery"), '1.0.0' );
    wp_enqueue_script( 'googlejs' );

    wp_enqueue_style( 'wp-color-picker' );
    // wp_register_script( 'color-field-handle', $pnLibDirUrl . '/js/color-field.js', array("wp-color-picker"), '1.0.0');
    // wp_enqueue_script( 'color-field-handle' );
    
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style_n_script', 100);