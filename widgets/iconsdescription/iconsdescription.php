<?php

/*
Widget Name: Tracktik - Block with a Icons List 
Description: A block containing a simple list with icon
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('IconsDescription_Tracktik_Widget')) {

class IconsDescription_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        
        $models = array(                              
//            "icon" => array(
//                "type"=> "media",
//                "label"=> "Icône",
//                "library" => "image"
//             ) ,            
            
            "title" => array(
                "type"=> "text",
                "label"=> "Titre "                            
            )                
        );                
        
        $models["list" ] = array(
                'type' => 'repeater',
                'label' => "Liste d'item",
                'item_name' => "Item",
                'fields' => array(
                    "icon" => array(
                        "type"=> "media",
                        "label"=> "Icône",
                        "library" => "image"
                     ) ,                        
                    "title" => array(
                        "type"=> "text",
                        "label"=> "Titre "                            
                    ),
                    "text" => array(
                        "type"=> "textarea",
                        "label"=> "Texte "                            
                    ),                    
                )    
            );
      
        

        
        parent::__construct(
            'iconsdescription-tracktik-widget',                                       // The unique id for your widget.
            'Block with a Simple List with Icon',                                         // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'A block containing a simple list with Icon',
                'help'        => 'http://poudrenoire.ca',
                'panels_icon' => 'dashicons dashicons-star-filled pn-icon',
                
            ),
           
            array( ),                                                           //The $control_options array, which is passed through to WP_Widget
            
            $models ,                                                           //The $form_options array,

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

siteorigin_widget_register('iconsdescription-tracktik-widget', __FILE__, 'IconsDescription_Tracktik_Widget');