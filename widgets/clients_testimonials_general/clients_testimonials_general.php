<?php

/*
Widget Name: Tracktik Customers Testimonials (General)
Description: A block containing a slider for client testimonials
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/



class ClientsTestimonialsGeneral_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array();

        
        parent::__construct(
            'clients-testimoials-general-tracktik-widget',                                           // The unique id for your widget.
            'Block with Testimonials (General)',                                                     // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'A slider for clients quotes from posttype',
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

siteorigin_widget_register('clients-testimoials-general-tracktik-widget', __FILE__, 'ClientsTestimonialsGeneral_Tracktik_Widget');