<?php

/*
Widget Name: Tracktik - Block with 3 column for Icon & Title
Description: A block containing 3 column with Icon / Title 
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('ThreeColIcon_Tracktik_Widget')) {

class ThreeColIcon_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array( );
        
        $models["title"] = array(
                            "type"=> "text",
                            "label"=> "Titre "                            
                        );
        
        for($i=1; $i<=3; $i++){
            $models["col" . $i] = array(
                    'type' => 'section',
                    'label' => "Colone # " . $i,
                    "hide" => true,
                    
                    'fields' => array(
                        "icon" => array(
                            "type"=> "media",
                            "label"=> "Icône",
                            "library" => "image"
                        )  ,
                        "title" => array(
                            "type"=> "text",
                            "label"=> "Titre "                            
                        ),
                        "subtitle" => array(
                            "type"=> "text",
                            "label"=> "Sous titre"                            
                        ),
                   
                                      
                    )    
                );
        }
        

        
        parent::__construct(
            'threecolicon-tracktik-widget',                                        // The unique id for your widget.
            'Block with 3 Column for Icon',                                        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'A block containing 3 column with Icon / Title',
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

siteorigin_widget_register('threecolicon-tracktik-widget', __FILE__, 'ThreeColIcon_Tracktik_Widget');