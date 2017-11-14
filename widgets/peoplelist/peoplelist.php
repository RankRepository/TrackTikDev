<?php

/*
Widget Name: Tracktik - Block with a People List
Description: A block containing a People List
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('PeopleList_Tracktik_Widget')) {

class PeopleList_Tracktik_Widget extends SiteOrigin_Widget {

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
                'label' => "List of people",
                'item_name' => "Person",
                'fields' => array(
                    "name" => array(
                        "type"=> "text",
                        "label"=> "Name"                            
                    ),
                    "image" => array(
                        "type"=> "media",
                        "label"=> "Icône",
                        "library" => "image"
                     ) ,    
                    "content" => array(
                        "type"=> "tinymce",
                        'rows' => 10,                            
                        "label"=> "Source"                            
                    ),                      
                )    
            );
      
        

        
        parent::__construct(
            'peoplelist-tracktik-widget',                                       // The unique id for your widget.
            'Block with a People List',                                         // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'A block containing a Peopl list',
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

siteorigin_widget_register('peoplelist-tracktik-widget', __FILE__, 'PeopleList_Tracktik_Widget');