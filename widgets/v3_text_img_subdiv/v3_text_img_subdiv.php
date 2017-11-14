<?php

/*
Widget Name: Tracktik V3 - Text / Image and Sub Div
Description: Tracktik V3 - Text / Image and Sub Div
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('V3_text_img_subdiv')) {

class V3_text_img_subdiv extends SiteOrigin_Widget {

    function __construct() {
         $models = array();

        $models["order"] = array(
            'type' => 'select',
            'label' => "Column Order",
            'default' => 'imgtxt',
            'options' => array(
                'txtimg' => "Text and Image",
                'imgtxt' => "Image and Text"
            )
        ) ;

        $models["title"] = array(
            "type"=> "text",
            "label"=> "Titre"  );


        
        $models["image"] = array(
                    "type"=> "media",
                    "label"=> "Image (960px * 560px)",
                    "library" => "image"    );        
        
        for($i=1; $i<=4; $i++){
            $models["col" . $i] = array(
                'type' => 'section',
                'label' => "Item # " . $i,
                "hide" => true,

                'fields' => array(

                    "title" => array(
                        "type"=> "text",
                        "label"=> "Title "                            
                    ),     
                    "text" => array(
                        "type"=> "textarea",
                        "label"=> "Text "                   
                    )        
                )    
            );                                   
        }
        
       
        
        
        parent::__construct(
            'v3_text-img-subdiv',                                   // The unique id for your widget.
            'V3 Text / Image and Sub Div',                                        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'V3 Text / Image and Sub Div',
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

siteorigin_widget_register('v3_text-img-subdiv', __FILE__, 'V3_text_img_subdiv');