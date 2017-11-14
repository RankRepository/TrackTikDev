<?php

/*
Widget Name: Tracktik Tabbed Blocks (General for all pages)
Description: A block containing a tab menu and content (General for all pages)
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/



class TabbedGeneral_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array();
        $models["selected"] =  array(
            'type' => 'select',
            'label' => "Selected tab (See '3 tabs' Menu to edit content)",
            'default' => '1',
            'options' => array(
                1 => 1,
                2 => 2,
                3 =>3
            )
        );

        
        parent::__construct(
            'tabbed-general-tracktik-widget',                                           // The unique id for your widget.
            'Block with 3 tabs (General for all pages)',                                                     // The name of the widget for display purposes.
                
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

siteorigin_widget_register('tabbed-general-tracktik-widget', __FILE__, 'TabbedGeneral_Tracktik_Widget');