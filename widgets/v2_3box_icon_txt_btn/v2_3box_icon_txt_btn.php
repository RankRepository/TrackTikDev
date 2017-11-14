<?php

/*
Widget Name: Tracktik V2 - Block with 3 Boxes for Icon/Text
Description: Tracktik V2 - Block with 3 Boxes for Icon/Text/Button
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('V2_ThreeColIconText_Tracktik_Widget')) {

class V2_ThreeColIconText_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array( );
        
//        $models["title"] = array(
//                            "type"=> "text",
//                            "label"=> "Titre "                            
//                        );
        
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
                "type" => "section",
                "label" => "Row witch 3 Block",
                "item_name" => "Row",
                "fields"=> $model3Col
            ) ;
        
        parent::__construct(
            'v2_threecolicontext-tracktik-widget',                                        // The unique id for your widget.
            'V2 Block with 3 Boxes for Icon/Text/Button',                                        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'V2 Block with 3 Boxes for Icon/Text/Button',
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

siteorigin_widget_register('v2_threecolicontext-tracktik-widget', __FILE__, 'V2_ThreeColIconText_Tracktik_Widget');