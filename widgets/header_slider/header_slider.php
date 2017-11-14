<?php

/*
Widget Name: Tracktik - Header w/ Slider
Description: A block containing a background image slider and button
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('Header_Slider_Tracktik_Widget')) {

class Header_Slider_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {

        $models = array();
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
                    "type"=> "textarea",
                    "label"=> "Texte"
                ),
                "btn" => get_button_field()    
            )
        )  ;

        
        parent::__construct(
            'header-slider-tracktik-widget',                                       // The unique id for your widget.
            'Header Block w/ Slider',        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'Header Block w/ Slider',
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

siteorigin_widget_register('header-slider-tracktik-widget', __FILE__, 'Header_Slider_Tracktik_Widget');