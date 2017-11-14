<?php

/*
Widget Name: Tracktik - Block with a Partner List 
Description: A block containing a Partner List
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('Partners_Tracktik_Widget')) {

class Partners_Tracktik_Widget extends SiteOrigin_Widget {

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
            )      ,
            "text" => array(
                "type"=> "textarea",
                "label"=> "Texte "                            
            )               
        );                
        
        $models["list" ] = array(
                'type' => 'repeater',
                'label' => "Liste d'item",
                'item_name' => "Item",
                'fields' => array(
                    "image" => array(
                        "type"=> "media",
                        "label"=> "Icône",
                        "library" => "image"
                     )                 
                )    
            );
      
        

        
        parent::__construct(
            'partners-tracktik-widget',                                         // The unique id for your widget.
            'Block with a Partners',                               // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'A block containing a Partner List',
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

siteorigin_widget_register('partners-tracktik-widget', __FILE__, 'Partners_Tracktik_Widget');