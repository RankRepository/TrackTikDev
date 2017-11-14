<?php

/*
Widget Name: Tracktik - PDF List
Description: A block containing a list of pdf
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('PdfList_Tracktik_Widget')) {

class PdfList_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array();
        $models["title"] = array(
            "type"=> "text",
            "label"=> "Titre "                            
        );
        $models["list" ] = array(
            'type' => 'repeater',
            'label' => "Liste d'item",
            'item_name' => "Item",
            'fields' => array(
                "title" => array(
                    "type"=> "text",
                    "label"=> "Titre du document"                            
                ),
                "image" => array(
                    "type"=> "media",
                    "label"=> "Image du document",
                    "library" => "image"
                ),
                "pdf" => array(
                    "type"=> "media",
                    "label"=> "Document PDF"
                ),
                "btn" => array(
                    "type" => 'section',
                    "label" => "Bouton",
                    "fields" => array(
                        "color" => array(
                            "type"=> "color",
                            "label"=> "Couleur texte"                            
                        )  ,
                        "backgroundcolor" => array(
                            "type"=> "color",
                            "label"=> "Couleur de fond"                            
                        )
                    )
                )
            )    
        );

        
        parent::__construct(
            'pdf_list-tracktik-widget',                                       // The unique id for your widget.
            'Block with Pdf list',        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'Block with PDF List',
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

siteorigin_widget_register('pdf_list-tracktik-widget', __FILE__, 'PdfList_Tracktik_Widget');