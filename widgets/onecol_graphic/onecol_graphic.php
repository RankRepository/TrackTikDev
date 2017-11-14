<?php

/*
Widget Name: Tracktik - One Col Graphic
Description: A block containing 1 column with Graphic / Text
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('OneColGraphic_Tracktik_Widget')) {

class OneColGraphic_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array(
                    "title" => array(
                        "type"=> "text",
                        "label"=> "Titre "                            
                    ),
                    "text" => array(
                        "type"=> "textarea"  ,
                        "label" => "Sous-titre"
                    )  ,
                    'image' => array(
                         'type' => 'media',
                         'label' => "Image",
                         'library' => 'image'
                     )  ,
            
                    "image_text_left" => array(
                        "type"=> "textarea"  ,
                        "label" => "Texte gauche dans l'image "
                    )  ,     
                    "image_text_center" => array(
                        "type"=> "textarea"  ,
                        "label" => "Texte du centre dans l'image"
                    )  ,     
                    "image_text_right" => array(
                        "type"=> "textarea"  ,
                        "label" => "Texte de droit dans l'image"
                    )  ,              
            
                    "text_left" => array(
                        "type"=> "textarea"  ,
                        "label" => "Texte de gauche"
                    )  ,     
                    "text_bottom" => array(
                        "type"=> "textarea"  ,
                        "label" => "Texte du bas"
                    )  ,     
                    "text_right" => array(
                        "type"=> "textarea"  ,
                        "label" => "Texte de droit"
                    )  ,                 
            
                );
        
       
        parent::__construct(
            'onecolgraphic-tracktik-widget',                                        // The unique id for your widget.
            'Block with 1 Column for Graphic / Text ',                                        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'A block containing 1 column with Graphic / Text',
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

siteorigin_widget_register('onecolgraphic-tracktik-widget', __FILE__, 'OneColGraphic_Tracktik_Widget');