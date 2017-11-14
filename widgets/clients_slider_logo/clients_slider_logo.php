<?php

/*
Widget Name: Tracktik Clients Slider Logos (General)
Description: A block containing a slider for client logos
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/



class ClientsSliderLogo_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array(
            'title' => array(
                 'type' => 'text',
                 'label' => "Title"
             ),
        );
        $models["slides"] = array(
            "type" => "repeater",
            "label" => "Liste des Slides",
            "item_name" => "Item",
            "fields"=>array(
                'content' => array(
                    "type"=> "tinymce",
                    'rows' => 10,                            
                    "label"=> "Content"                            
                ),   
            )
        )  ;

        parent::__construct(
            'clients-slider-logos-tracktik-widget',                                           // The unique id for your widget.
            'Slider of clients logo',                                                     // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'A block containing a slider for client logos',
                'help'        => 'Tracktik',
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

siteorigin_widget_register('clients-slider-logos-tracktik-widget', __FILE__, 'ClientsSliderLogo_Tracktik_Widget');