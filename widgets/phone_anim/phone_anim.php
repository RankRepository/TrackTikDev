<?php

/*
Widget Name: Tracktik - Phone Animation
Description: A block containing a Title, Text, Button and a Phone Animation with 3 images
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('PhoneAnim_Tracktik_Widget')) {

class PhoneAnim_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array(


            'content_title' => array(
                 'type' => 'text',
                 'label' => "Titre"
             )  ,
            'content_text' => array(
                 'type' => 'textarea',
                 'label' => "Texte"
             ) ,
             "btn" => get_button_field()  ,    
            'anim_image1' => array(
                 'type' => 'media',
                 'label' => "Animation : Image #1",
                 'library' => 'image'
             )  ,          
            'anim_image2' => array(
                 'type' => 'media',
                 'label' => "Animation : Image #2",
                 'library' => 'image'
             )  ,  
            'anim_image3' => array(
                 'type' => 'media',
                 'label' => "Animation : Image #3",
                 'library' => 'image'
             )  ,              
        );

        
        parent::__construct(
            'phoneanim-tracktik-widget',                                       // The unique id for your widget.
            'Block with Text and Image Animation ',        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'Block with Title, Text, Button and a Phone Animation with 3 images',
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

siteorigin_widget_register('phoneanim-tracktik-widget', __FILE__, 'PhoneAnim_Tracktik_Widget');