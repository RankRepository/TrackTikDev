<?php

/*
Widget Name: Tracktik V3 - Jobs List
Description: Tracktik V3 - Jobs List
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('V3_jobs_list')) {

class V3_jobs_list extends SiteOrigin_Widget {

    function __construct() {
        $models = array();

        $models["title"] =   array(
            "type"=> "text",
            "label"=> "Titre"
        );
        
        parent::__construct(
            'v3_jobs-list',                                   // The unique id for your widget.
            'V3 Jobs List',                                        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'V3 Jobs List',
                'help'        => 'http://poudrenoire.ca',
                'panels_icon' => 'dashicons dashicons-star-filled pn-icon',
            ),
           
            array( ),                                                             //The $control_options array, which is passed through to WP_Widget
            
            $models ,                                                            //The $form_options array,

            //The $base_folder path string.
            plugin_dir_path(__FILE__)
        );
    }    
    
    
    function get_template_name($instance) {
        return 'template';
    }

    function get_style_name($instance) {
        return '';
    }
}

   // Put class TestClass here
}

siteorigin_widget_register('v3_jobs-list', __FILE__, 'V3_jobs_list');