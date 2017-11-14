<?php

/*
Widget Name: Tracktik - Block with 3 column for Icon/Text
Description: A block containing 3 column with Icon/Text
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('ThreeColIconText_Tracktik_Widget')) {

class ThreeColIconText_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array( );
        
        $models["title"] = array(
                            "type"=> "text",
                            "label"=> "Titre "                            
                        );
        $model3Col = array();
        for($i=1; $i<=3; $i++){
            $model3Col["col" . $i] = array(
                    'type' => 'section',
                    'label' => "Item # " . $i,
                    "hide" => true,
                    
                    'fields' => array(
                        "icon" => array(
                            "type"=> "media",
                            "label"=> "Icône",
                            "library" => "image"
                        )  ,
                        "title" => array(
                            "type"=> "text",
                            "label"=> "Title "                            
                        ),     
                        "text" => array(
                            "type"=> "textarea",
                            "label"=> "Text "                            
                        ),   
                        "btn" => get_button_field()             
                    )    
                );                                   
        }
        
           $models["rows"] = array(
                "type" => "repeater",
                "label" => "Row witch 3 Block",
                "item_name" => "Row",
                "fields"=> $model3Col
            ) ;
        
        parent::__construct(
            'threecolicontext-tracktik-widget',                                        // The unique id for your widget.
            'Block with 3 Column for Icon/Text',                                        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'A block containing 3 column with Icon/Text',
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

siteorigin_widget_register('threecolicontext-tracktik-widget', __FILE__, 'ThreeColIconText_Tracktik_Widget');