<?php

/*
Widget Name: Tracktik V2 - 4 Columns Icons List
Description: Tracktik V2 - A block containing a 4 Columns Icons List
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/


class V2_IconList_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array(

            'title' => array(
                 'type' => 'text',
                 'label' => "Title"
             )  ,

            "lists" => array(
                "type" => "repeater",
                "label" => "Liste avec icones",
                "item_name" => "Item",
                "fields"=>array(
                    "icon" => array(
                        "type"=> "media",
                        "label"=> "Image de l'item",
                        "library" => "image"
                    ) ,                       
                    "link" => array(
                        "type"=> "link",
                        "label"=> "Lien"                            
                    ),                    
                    "title" => array(
                        "type"=> "text",
                        "label"=> "Titre de l'item"                            
                    ),
                    "text" => array(
                        "type"=> "text",
                        "label"=> "Texte de l'item"                            
                    ),                    
                                    
                )
            )            
         
        );

        
        parent::__construct(
            'v2_iconlist-tracktik-widget',                                       // The unique id for your widget.
            'V2 Block with 4 Columns Icons List',        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'V2 Block with 4 Columns Icons List',
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

siteorigin_widget_register('v2_iconlist-tracktik-widget', __FILE__, 'V2_IconList_Tracktik_Widget');