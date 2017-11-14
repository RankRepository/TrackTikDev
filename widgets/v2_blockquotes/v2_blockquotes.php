<?php

/*
Widget Name: Tracktik V2 - Blockquote
Description: Tracktik V2 - A block containing blockquotes slider
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('V2_Blockquotes_Tracktik_Widget')) {

class V2_Blockquotes_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array(

            'content_title' => array(
                 'type' => 'text',
                 'label' => "Titre"
             )       ,
            "background_image" => array(
                "type"=> "media",
                "label"=> "Background image",
                "library" => "image"
            )          ,     
            
            "lists" => array(
                "type" => "repeater",
                "label" => "Liste des citations",
                "item_name" => "Item",
                "fields"=>array(
                    "title" => array(
                        "type"=> "text",
                        "label"=> "Title"                            
                    ),
                    "text" => array(
                        "type"=> "tinymce",
                        'rows' => 10,                       
                        "label"=> "Text"                            
                    ),        
                    "text_bottom" => array(
                        "type"=> "textarea",
                        "label"=> "Text bottom"                            
                    ),                       
                    "image" => array(
                        "type"=> "media",
                        "label"=> "Logo",
                        "library" => "image"
                    )                                        
                )
                )               
        );
        
        
        

        
        parent::__construct(
            'v2_blockquotes-tracktik-widget',                                      // The unique id for your widget.
            'V2 Block with Blockquotes Slider',                             // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'V2 Block with Blockquotes Slider',
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

siteorigin_widget_register('v2_blockquotes-tracktik-widget', __FILE__, 'V2_Blockquotes_Tracktik_Widget');