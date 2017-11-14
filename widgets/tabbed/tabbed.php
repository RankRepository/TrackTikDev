<?php

/*
Widget Name: Tracktik Tabbed Blocks
Description: A block containing a tab menu and content
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/



class Tabbed_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array();
        for($i=1; $i<=3; $i++){
            $models["tab" . $i] = array(
                    'type' => 'section',
                    'label' => "Onglet # " . $i,
                    "hide" => true,
                    
                    'fields' => array(
                        
                        "header" => array(
                            "type" => "section",
                            "hide" => true,
                            "label" => "Header",
                            "fields" =>array(

                                "title" => array(
                                    "type"=> "text",
                                    "label"=> "Titre de l'onglet"                            
                                ),
                                "icon" => array(
                                    "type"=> "media",
                                    "label"=> "Image du titre du actif",
                                    "library" => "image"
                                ),
                                "icon_off" => array(
                                    "type"=> "media",
                                    "label"=> "Image du titre du inactif",
                                    "library" => "image"
                                )                                                                
                            ) 
                        ),
                        
                        "content" => array(
                            "type" => "section",
                            "hide" => true,
                            "label" => "Content",
                            "fields" =>array(
                                
                                "content_title" => array(
                                    "type"=> "text",
                                    "label"=> "Titre du contenu"                            
                                ), 
                                "content_text" => array(
                                    "type"=> "textarea",
                                    "label"=> "Texte du contenu"                            
                                ),   
                                 "btn" => get_button_field()  ,    

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
                                        )    ,       
                                        "link" => array(
                                            "type"=> "link",
                                            "label"=> "Lien",
                                        )                                          
                                    )
                                )
                            )                                 
                        )
                        
                    )
                );            
        }

        
        parent::__construct(
            'tabbed-tracktik-widget',                                           // The unique id for your widget.
            'Block with 3 tabs',                                                     // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'A tab menu with content.',
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

siteorigin_widget_register('tabbed-tracktik-widget', __FILE__, 'Tabbed_Tracktik_Widget');