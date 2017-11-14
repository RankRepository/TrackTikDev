<?php

/*
Widget Name: Tracktik - Image and Text/Button
Description: A block containing 2 column - One for an image and one for Text/Button
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('ImgTextBtn_Tracktik_Widget')) {

class ImgTextBtn_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array(
            'order' => array(
                 'type' => 'select',
                 'label' => "Column Order",
                 'default' => 'imgtxt',
                 'options' => array(
                     'txtimg' => "Text and Image",
                     'imgtxt' => "Image and Text",
                 )
             ) , 
            'imgBottom' => array(
                 'type' => 'checkbox',
                 'label' => "Image collée au bas (seulement quand l'image est à droite)",

             ) , 
            'content_image' => array(
                 'type' => 'media',
                 'label' => "Colonne #1 : Image",
                 'library' => 'image'
             )  ,
            'content_image_mobile' => array(
                 'type' => 'media',
                 'label' => "Colonne #1 : Image(mobile)",
                 'library' => 'image'
             )  ,
            'content_title' => array(
                 'type' => 'text',
                 'label' => "Colonne #2 : Title"
             )  ,
            'content_text' => array(
                "type"=> "tinymce",
                'rows' => 10,                            
                'label' => "Colonne #2 : Texte"
             ) ,
            "btn" => get_button_field()             
        );

        
        parent::__construct(
            'imgtextbtn-tracktik-widget',                                       // The unique id for your widget.
            'Block with Image and Text/Button',        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'Block with 2 column. One for Image. Ong for Text & Button',
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

siteorigin_widget_register('imgtextbtn-tracktik-widget', __FILE__, 'ImgTextBtn_Tracktik_Widget');