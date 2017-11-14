<?php

/*
Widget Name: Tracktik V3 - Slider 3D
Description: Tracktik V3 - Slider 3D
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('V3_slider_3d')) {

class V3_slider_3d extends SiteOrigin_Widget {

    function __construct() {
        $models = array();

        $models["title"] =   array(
            "type"=> "text",
            "label"=> "Titre"
        );

        $models["slides"] = array(
            "type" => "repeater",
            "label" => "Liste des Slides",
            "item_name" => "Item",
            "fields"=>array(
                "image" => array(
                    "type"=> "media",
                    "label"=> "Image",
                    "library" => "image"
                ),
                "titre" => array(
                    "type"=> "text",
                    "label"=> "Titre"
                ),
                "texte" => array(
                    "type"=> "text",
                    "label"=> "Texte"
                )
            )
        )  ;
        
        parent::__construct(
            'v3_slider-3d',                                   // The unique id for your widget.
            'V3 Slider 3D',                                        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'V3 Slider 3D',
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

siteorigin_widget_register('v3_slider-3d', __FILE__, 'V3_slider_3d');