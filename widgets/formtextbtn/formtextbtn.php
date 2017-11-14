<?php

/*
Widget Name: Tracktik - Form and Text/Button
Description: A block containing 2 column - One for a form and one for Text/Button
Author: Olivier
*/

if (!class_exists('FormTextBtn_Tracktik_Widget')) {

class FormTextBtn_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array(
            'order' => array(
                 'type' => 'select',
                 'label' => "Column Order",
                 'default' => 'imgtxt',
                 'options' => array(
                     'txtimg' => "Text and Form",
                     'imgtxt' => "Form and Text",
                 )
             ) , 
            'imgBottom' => array(
                 'type' => 'checkbox',
                 'label' => "Formulaire collée au bas (seulement quand le formulaire est à droite)",

             ) , 
            'content_form' => array(
                "type"=> "tinymce",
                'rows' => 1,                            
                'label' => "Colonne #1 : Form"
             ),
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
            'formtextbtn-tracktik-widget',                                       // The unique id for your widget.
            'Block with Form and Text/Button',        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'Block with 2 column. One for Form. Ong for Text & Button',
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

siteorigin_widget_register('formtextbtn-tracktik-widget', __FILE__, 'FormTextBtn_Tracktik_Widget');