<?php

/*
Widget Name: V2 Block with Product Line List
Description: A block containing the product line list
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/



class ProductLineGeneral_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array();
        $models["title"] =  array(
            'type' => 'text',
            'label' => "Title (Leave blank for default)"
        );        
        $models["selected"] =  array(
            'type' => 'select',
            'label' => "Product Line category (Edit content on Produt Line menu)",
            'default' => '1',
            'options' => array(
                0 => "All",
                1 => "Guarding Suite",
                2 => "Mobile Suite",
                3 => "Back Office Management Suite"
            )
        );

        
        parent::__construct(
            'productline-general-tracktik-widget',                              // The unique id for your widget.
            'V2 Block with Product Line List',                                  // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'A block containing the product line list',
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

siteorigin_widget_register('productline-general-tracktik-widget', __FILE__, 'ProductLineGeneral_Tracktik_Widget');