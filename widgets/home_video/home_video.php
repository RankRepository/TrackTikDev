<?php

/*
Widget Name: Tracktik - Background Video, Title, Text, 2 Buttons
Description: A block containing a Background video with A Big Title, Text and 2 Buttons
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('HomeVideo_Tracktik_Widget')) {

class HomeVideo_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array(
            'background_image' => array(
                 'type' => 'media',
                 'label' => "Background image before video",
                 'library' => 'image'
             ),
            'video' => array(
                 'type' => 'media',
                 'label' => "Background video",
                 'library' => 'video'
             )  ,
            'content_title' => array(
                 'type' => 'text',
                 'label' => "Title"
             )  ,
            'content_text' => array(
                 'type' => 'textarea',
                 'label' => "Text"
             ) ,
            "btn" => get_button_field(),   
            "btn2" => get_button_field()             
             
        );

        
        parent::__construct(
            'home_video-tracktik-widget',                                       // The unique id for your widget.
            'Block with Background Video',        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'Block with Background Video, Title, Text',
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

siteorigin_widget_register('home_video-tracktik-widget', __FILE__, 'HomeVideo_Tracktik_Widget');