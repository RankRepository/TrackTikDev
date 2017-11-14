<?php

/*
Widget Name: Tracktik V2 - Two Vertical Animated Boxes
Description: Tracktik V2 - Two Vertical Animated Boxes
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('V2_2_Verical_Boxes')) {

class V2_2_Verical_Boxes extends SiteOrigin_Widget {

    function __construct() {
         $models = array();
         
         // BLOCK TOP
        $models["block1"] = array(
             "type" => "section",
             "label" => "Block Top with Image & Text/List",
             "item_name" => "Row",
             "fields"=> array(
                 
                'image' => array(
                     'type' => 'media',
                     'label' => "Image",
                     'library' => 'image'
                 ),                 
                "title" => array(
                    "type"=> "text",
                    "label"=> "Title "                            
                ),     
                "text" => array(
                    "type"=> "textarea",
                    "label"=> "Text "                            
                )          ,
                 
                "lists" => array(
                    "type" => "repeater",
                    "label" => "Liste avec icones",
                    "item_name" => "Item",
                    "fields"=>array(
                        "title" => array(
                            "type"=> "text",
                            "label"=> "titre de l'item"                            
                        ),
                        "icon" => array(
                            "type"=> "media",
                            "label"=> "Image de l'item",
                            "library" => "image"
                        )                                        
                    )
                )                    
                 
                 
             )
         ) ;
        
        // BLOCK BOTTOM
        $models["block2"] = array(
             "type" => "section",
             "label" => "Block Bottom With 3 Phones Images",
             "item_name" => "Row",
             "fields"=> array(
                 

                 
                "background_image" => array(
                    "type"=> "media",
                    "label"=> "Background image",
                    "library" => "image"
                )          ,                   
                "title" => array(
                    "type"=> "text",
                    "label"=> "Title "                            
                ),     
                "text" => array(
                    "type"=> "textarea",
                    "label"=> "Text "                            
                ),
                 
                'image1' => array(
                     'type' => 'media',
                     'label' => "Image Effect #1",
                     'library' => 'image'
                 ),              
                'image2' => array(
                     'type' => 'media',
                     'label' => "Image Effect #2",
                     'library' => 'image'
                 ),    
                'image3' => array(
                     'type' => 'media',
                     'label' => "Image Effect #3",
                     'library' => 'image'
                 ),                      
                 
                "btn" => get_button_field()                     
                 
                 
             )
         ) ;        

        
        parent::__construct(
            'v2_2-vertical-boxes',                                   // The unique id for your widget.
            'V2 Two Vertical Animated Boxes for home',                                        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'V2 Two Vertical Animated Boxes for home',
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

siteorigin_widget_register('v2_2-vertical-boxes', __FILE__, 'V2_2_Verical_Boxes');