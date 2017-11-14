<?php

/*
Widget Name: Tracktik V3 - Text and Jobs Popup
Description: Tracktik V3 - Text and Jobs Popup
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('V3_jobs_text_popup')) {

class V3_jobs_text_popup extends SiteOrigin_Widget {

    function __construct() {
         $models = array();                 

         
        $models["popup_text"] = array(
                    "type"=> "textarea",
                    "label"=> "Popup : Texte"  );     
        
        $models["popup_btn1"] = array(
                    "type"=> "text",
                    "label"=> "Popup : Label bouton 1"  );       
        $models["popup_btn2"] = array(
             "type"=> "text",
             "label"=> "Popup : Label bouton 1"  );    
         
        $models["image1"] = array(
                    "type"=> "media",
                    "label"=> "Image 1 (700px * 380px)",
                    "library" => "image"    ); 
        $models["image2"] = array(
                    "type"=> "media",
                    "label"=> "Image 2 (340px * 260px)",
                    "library" => "image"    ); 
        $models["image3"] = array(
                    "type"=> "media",
                    "label"=> "Image 3 (340px * 260px)",
                    "library" => "image"    );         
               
        
        $models["title"] = array(
                    "type"=> "text",
                    "label"=> "Titre principal"  );        
        
        $models["subtitles_texts"] = array(
                "type" => "repeater",
                "label" => "Liste Sous-titre & Texte",
                "item_name" => "Item",
                "fields"=>array(
                    "subtitle" => array(
                        "type"=> "text",
                        "label"=> "Sous-titre"                            
                    ),
                    "text" => array(
                        "type"=> "textarea",
                        "label"=> "Texte"
                    )                                        
                )
            )  ;
        
        
        parent::__construct(
            'v3_jobs-text-popup',                                   // The unique id for your widget.
            'V3 Jobs Text & Popup',                                        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'V3 Text and Jobs Popup',
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

siteorigin_widget_register('v3_jobs-text-popup', __FILE__, 'V3_jobs_text_popup');