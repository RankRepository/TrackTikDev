<?php

/*
Widget Name: Tracktik V2 - Image Top Offset, Text & Button
Description: Tracktik V2 - An Image Offset On Top and Text & Button
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('V2_ImgTextBtn_Tracktik_Widget')) {

class V2_ImgTextBtn_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array(

            'image' => array(
                 'type' => 'media',
                 'label' => "Image Offset Top",
                 'library' => 'image'
             ),

            'content_title' => array(
                 'type' => 'text',
                 'label' => "Title"
             )  ,
            'content_text' => array(
                "type"=> "textarea",
                'rows' => 5,                            
                'label' => "Text"
             ) ,
            "btn" => get_button_field()             
        );

        
        parent::__construct(
            'v2_imgtextbtn-tracktik-widget',                                       // The unique id for your widget.
            'V2 Block with Image Offset Top and Text/Button',        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'V2 Block with Image Offset Top and Text/Button',
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

siteorigin_widget_register('v2_imgtextbtn-tracktik-widget', __FILE__, 'V2_ImgTextBtn_Tracktik_Widget');