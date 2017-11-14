<?php

/*
Widget Name: Tracktik - Career
Description: A block containing a Jobs List
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('Career_Tracktik_Widget')) {

class Career_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array();
        $models["title"] = array(
            "type"=> "text",
            "label"=> "Titre "                            
        );
        $models["list" ] = array(
            'type' => 'repeater',
            'label' => "Liste d'emplois",
            'item_name' => "Item",
            'fields' => array(
                "title" => array(
                    "type"=> "text",
                    "label"=> "Titre de l'emploi"                            
                ),
                "texte" => array(
                    "type"=> "textarea",
                    "label"=> "Texte de l'emploi"                            
                ),
                "contenu" => array(
                    'type' => 'repeater',
                    'label' => "Liste Titre/Texte",
                    'item_name' => "Item",
                    'fields' => array(
                        "title" => array(
                            "type"=> "text",
                            "label"=> "Titre "                            
                        ),
                        "texte" => array(
                            "type"=> "textarea",
                            "label"=> "Texte "                            
                        )
                    )    
                )
            )    
        );

        
        parent::__construct(
            'career-tracktik-widget',                                       // The unique id for your widget.
            'Block with Jobs list',        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'Block with Jobs List',
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

siteorigin_widget_register('career-tracktik-widget', __FILE__, 'Career_Tracktik_Widget');