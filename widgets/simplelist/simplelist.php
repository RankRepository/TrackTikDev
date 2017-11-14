<?php

/*
Widget Name: Tracktik - Block with a Simple List
Description: A block containing a simple list
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('SimpleList_Tracktik_Widget')) {

class SimpleList_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        
        $models = array(                              
            "icon" => array(
                "type"=> "media",
                "label"=> "Icône",
                "library" => "image"
             ) ,            
            
            "title" => array(
                "type"=> "text",
                "label"=> "Titre "                            
            ),
            'colorList' => array(
                'type' => 'select',
                'label' => "Couleur de la liste d'item",
                'default' => 'black',
                'options' => array(
                    'black' => "Noir",
                    'white' => "Blanc",
                )
            )
        );                
        
        $models["list" ] = array(
                'type' => 'repeater',
                'label' => "Liste d'item",
                'item_name' => "Item",
                'fields' => array(
                    "title" => array(
                        "type"=> "text",
                        "label"=> "Titre "                            
                    ),
                )    
            );
      
        

        
        parent::__construct(
            'simplelist-tracktik-widget',                                       // The unique id for your widget.
            'Block with a Simple List',                                         // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'A block containing a simple list',
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

siteorigin_widget_register('simplelist-tracktik-widget', __FILE__, 'SimpleList_Tracktik_Widget');