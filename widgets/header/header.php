<?php

/*
Widget Name: Tracktik - Header 
Description: A block containing a background image and button
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('Header_Tracktik_Widget')) {

class Header_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array(
            'title' => array(
                 'type' => 'text',
                 'label' => "Title"
             )  ,
                    "content" => array(
                        "type"=> "tinymce",
                        'rows' => 10,                            
                        "label"=> "Content"                            
                    )  ,            
            "btn" => get_button_field(),          
            "btn2" => get_button_field()           
        );

        
        parent::__construct(
            'header-tracktik-widget',                                       // The unique id for your widget.
            'Header Block',        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'Header B',
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

siteorigin_widget_register('header-tracktik-widget', __FILE__, 'Header_Tracktik_Widget');