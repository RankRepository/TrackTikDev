<?php

/*
Widget Name: Tracktik - Animated Device
Description: A Block containning a animated Image and Text 
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('AnimatedDevice_Tracktik_Widget')) {

class AnimatedDevice_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array(
            "image" => array(
                "type"=> "media",
                "label"=> "Image",
                "library" => "image"
            )  ,
            "content" => array(
                "type"=> "tinymce",
                'rows' => 10,                            
                "label"=> "Content"                            
            )  
         
        );

        
        parent::__construct(
            'animateddevice-tracktik-widget',                                   // The unique id for your widget.
            'Block with Animated Image',                                        // The name of the widget for display purposes.
                
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

siteorigin_widget_register('animateddevice-tracktik-widget', __FILE__, 'AnimatedDevice_Tracktik_Widget');