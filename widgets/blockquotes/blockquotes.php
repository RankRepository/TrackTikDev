<?php

/*
Widget Name: Tracktik - Blockquote
Description: A block containing 3 blockquote
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('Blockquotes_Tracktik_Widget')) {

class Blockquotes_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array(

            'content_title' => array(
                 'type' => 'text',
                 'label' => "Titre"
             )            
        );
        
        
        for($i=1; $i<=3; $i++){
            $models["quote" . $i] = array(
                    'type' => 'section',
                    'label' => "Citation # " . $i,
                    "hide" => true,
                    
                    'fields' => array(
                        "title" => array(
                            "type"=> "text",
                            "label"=> "Titre "                            
                        ),
                        "text" => array(
                            "type"=> "textarea",
                            "label"=> "Texte "                            
                        ),
                        "source" => array(
                            "type"=> "text",
                            "label"=> "Source"                            
                        ),                    
                        "icon" => array(
                            "type"=> "media",
                            "label"=> "Image de l'item",
                            "library" => "image"
                        )                                        
                    )    
                );
        }
        

        
        parent::__construct(
            'blockquotes-tracktik-widget',                                      // The unique id for your widget.
            'Block with 3 Blockquotes ',                             // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'Block with Title, Text, Button and a Phone Animation with 3 images',
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

siteorigin_widget_register('blockquotes-tracktik-widget', __FILE__, 'Blockquotes_Tracktik_Widget');