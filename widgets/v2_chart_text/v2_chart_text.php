<?php

/*
Widget Name: Tracktik V2 - Chart & Text
Description: A block containing a Chart and Text 
Author: Poudre Noire
Author URI: http://poudrenoire.ca
*/

if (!class_exists('V2_ChartText_Tracktik_Widget')) {

class V2_ChartText_Tracktik_Widget extends SiteOrigin_Widget {

    function __construct() {
        $models = array( 

                "title" => array(
                    "type"=> "text",
                    "label"=> "Titre "
                ),
                "text" => array(
                    "type"=> "tinymce",
                    'rows' => 10,
                    "label"=> "Texte"
                ),
            
                "chart_title" => array(
                    "type"=> "text",
                    "label"=> "Titre Graphique "
                ),   
            
                "chart_day1" => array(
                    "type"=> "text",
                    "label"=> "Graphique Jour 1 "
                ),
                "chart_day2" => array(
                    "type"=> "text",
                    "label"=> "Graphique Jour 2 "
                ), 
                "chart_day3" => array(
                    "type"=> "text",
                    "label"=> "Graphique Jour 3 "
                ), 
                "chart_day4" => array(
                    "type"=> "text",
                    "label"=> "Graphique Jour 4 "
                ), 
                "chart_day5" => array(
                    "type"=> "text",
                    "label"=> "Graphique Jour 5 "
                ),             
                "chart_day6" => array(
                    "type"=> "text",
                    "label"=> "Graphique Jour 6 "
                ), 
                "chart_day7" => array(
                    "type"=> "text",
                    "label"=> "Graphique Jour 7 "
                ),             
            
                "btn" => get_button_field()             
                
            );

        

        
        parent::__construct(
            'chart-text-tracktik-widget',                                        // The unique id for your widget.
            'Block with Chart and Text ',                                        // The name of the widget for display purposes.
                
            array(                                                              // The $widget_options array, which is passed through to WP_Widget.
                'description' => 'A block containing 2 column with Chart and Text',
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

siteorigin_widget_register('chart-text-tracktik-widget', __FILE__, 'V2_ChartText_Tracktik_Widget');