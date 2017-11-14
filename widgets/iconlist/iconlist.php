<?php

/*
Widget Name: Tracktik - Text & Icon list
Description: A block containing a Title, Text and a Icon list
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/


class IconList_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array(
            'background_image' => array(
                 'type' => 'media',
                 'label' => "Background image",
                 'library' => 'image'
             ),
            'content_title' => array(
                 'type' => 'text',
                 'label' => "Colonne #2 : Title"
             )  ,
            'content_text' => array(
                 'type' => 'textarea',
                 'label' => "Colonne #2 : Texte"
             ) ,
            "lists" => array(
                "type" => "repeater",
                "label" => "Liste avec icones",
                "item_name" => "Item",
                "fields"=>array(
                    "title" => array(
                        "type"=> "text",
                        "label"=> "titre de l'item"                            
                    ),
                    "icon" => array(
                        "type"=> "media",
                        "label"=> "Image de l'item",
                        "library" => "image"
                    )                                        
                )
            )            
         
        );

        
        parent::__construct(
            'iconlist-tracktik-widget',                                       // The unique id for your widget.
            'Block with Text & Icon list',        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'Block with a Title, Text and icon list',
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

siteorigin_widget_register('iconlist-tracktik-widget', __FILE__, 'IconList_Tracktik_Widget');