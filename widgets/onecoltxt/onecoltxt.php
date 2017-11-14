<?php

/*
Widget Name: Tracktik - One Col Text
Description: A block containing 1 column with Icon / Title / Rich Text / Button
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('OneColTxt_Tracktik_Widget')) {

class OneColTxt_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array(
                    "icon" => array(
                        "type"=> "media",
                        "label"=> "Icône",
                        "library" => "image"
                    )  ,
                    "title" => array(
                        "type"=> "text",
                        "label"=> "Titre "                            
                    ),
                    "content" => array(
                        "type"=> "tinymce",
                        'rows' => 10,                            
                        "label"=> "Content"                            
                    )  ,
                    "btn" => get_button_field()  
                );
        
       
        parent::__construct(
            'onecoltxt-tracktik-widget',                                        // The unique id for your widget.
            'Block with 1 Column and Text ',                                        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'A block containing 1 column with Icon / Title / Rich Text',
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

siteorigin_widget_register('onecoltxt-tracktik-widget', __FILE__, 'OneColTxt_Tracktik_Widget');