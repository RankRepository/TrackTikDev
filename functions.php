<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php',  // Theme customizer

    'lib/pnLib/pnLib.php',  // Theme customizer
    'lib/tracktik/pagebuilder.php',  // Theme customizer

    'lib/model/options.php',  // Options generales
    'lib/tracktik/pagebuilder.php',  // Theme customizer
    'lib/model/cpt/customers.php',  // CPT client
    'lib/model/cpt/blockquotes.php',  // CPT blockquotes
    'lib/model/cpt/video.php',  // CPT blockquotes
    'lib/model/cpt/newsroom.php',  // CPT blockquotes
    'lib/model/cpt/productinformation.php',  // CPT blockquotes
    'lib/model/cpt/whitepaper.php',  // CPT blockquotes
    'lib/model/cpt/jobs.php',  // CPT blockquotes
    'lib/model/cpt/article.php',  // CPT blockquotes
    'lib/model/page/productInformation.php',  // CPT blockquotes
    'lib/model/page/page-video.php',  // page video
    
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

remove_action('wp_head', 'wp_generator');
add_filter('login_errors', create_function('$no_login_error', "return 'Mauvais identifiants';"));

// Defer Javascripts
// Defer jQuery Parsing using the HTML5 defer property
function defer_parsing_of_js ( $url ) {
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.js' ) ) return $url;
    // return "$url' defer ";
    return "$url' defer onload='";
}
add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );

function gadwp_customize_trackingcode() {
  echo "ga('require', 'GTM-56939M3');";
}
add_action( 'ga_dash_addtrackingcode', 'gadwp_customize_trackingcode' );





