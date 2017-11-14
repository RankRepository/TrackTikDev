<?php

/*
Widget Name: Tracktik - Two Col Text
Description: A block containing 2 column with Icon / Title / Rich Text
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('TwoColTxt_Tracktik_Widget')) {

class TwoColTxt_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array( 
                        "icon" => array(
                            "type"=> "media",
                            "label"=> "Icône",
                            "library" => "image"
                        )  ,
                        "title" => array(
                            "type"=> "text",
                            "label"=> "Titre "                            
                        )
            );
        
        
        for($i=1; $i<=2; $i++){
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
                        "content" => array(
                            "type"=> "tinymce",
                            'rows' => 10,                            
                            "label"=> "Source"                            
                        ),                    
                                      
                    )    
                );
        }
        

        
        parent::__construct(
            'twocoltxt-tracktik-widget',                                        // The unique id for your widget.
            'Block with 2 Column and Text ',                                        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'A block containing 2 column with Icon / Title / Rich Text',
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

siteorigin_widget_register('twocoltxt-tracktik-widget', __FILE__, 'TwoColTxt_Tracktik_Widget');