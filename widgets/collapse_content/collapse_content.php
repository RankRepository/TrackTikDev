<?php

/*
Widget Name: Tracktik - Block with collapsible content
Description: A block containing collapsible elements
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('CollapseContent_Tracktik_Widget')) {

class CollapseContent_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array( );
        
        $models["title"] = array(
                            "type"=> "text",
                            "label"=> "Titre "                            
                        );
        
        for($i=1; $i<=6; $i++){
            $models["col" . $i] = array(
                    'type' => 'section',
                    'label' => "Item # " . $i,
                    "hide" => true,
                    
                    'fields' => array(
                        "stat" => array(
                            "type"=> "text",
                            "label"=> "Stats"
                        )  ,
                        "text" => array(
                            "type"=> "text",
                            "label"=> "Texte "                            
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
            'collapsecontent-tracktik-widget',                                        // The unique id for your widget.
            'Block with collapsible content',                                        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'A block containing collapsible elements',
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

siteorigin_widget_register('collapsecontent-tracktik-widget', __FILE__, 'CollapseContent_Tracktik_Widget');