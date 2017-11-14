<?php

/*
Widget Name: Tracktik - Block with 3 column for Colored Box
Description: A block containing 3 column with Colored Box
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('ThreeColColoredBox_Tracktik_Widget')) {

class ThreeColColoredBox_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array( );
        
        $models["title"] = array(
                            "type"=> "text",
                            "label"=> "Titre "                            
                        );
        $models["titlecolor"] = array(
                            "type"=> "color",
                            "label"=> "Couleur du titre "                            
                        );        
        
        for($i=1; $i<=3; $i++){
            $models["col" . $i] = array(
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
                        'bgcolor' => array(
                            'type' => 'color',
                            "label" => "Background color",
                            'default' => '#333333'
        
                        )
                    )    
                );
        }
        

        
        parent::__construct(
            'threecolcolorbox-tracktik-widget',                                        // The unique id for your widget.
            'Block with 3 Column for Colored Box',                                        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'A block containing 3 column with Colored Box',
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

siteorigin_widget_register('threecolcolorbox-tracktik-widget', __FILE__, 'ThreeColColoredBox_Tracktik_Widget');