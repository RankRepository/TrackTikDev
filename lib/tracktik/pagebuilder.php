<?php
add_image_size( "500x500", 500, 500,  false );

add_image_size( "500x500c", 500, 500,  true );


global $nbButtonTrackingId;


function add_tracktik_pagebuilder_widget($folders){
    $folders[] = get_template_directory() . '/widgets/';
    return $folders;
}
add_filter('siteorigin_widgets_widget_folders', 'add_tracktik_pagebuilder_widget');


/* Autoriser les fichiers SVG */
function wpc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'wpc_mime_types');



add_theme_support( 'siteorigin-panels', array(
//	'margin-bottom' => 0,
	'padding-left' => 0,
	'padding-right' => 0,
	'responsive' => true,
) );


/*
 *  ADD COLOR FIELD ON 
 */
function custom_row_style_fields($fields) {
  $fields['overlay'] = array(
      'name'        => "Couleur du filtre",
      'type'        => 'color',
      'group'       => 'design',
      'description' => __('Overlay background color', 'siteorigin-panels'),
      'priority'    => 8,
  );

  return $fields;
}
add_filter( 'siteorigin_panels_widget_style_fields', 'custom_row_style_fields' );

/*
 * Return the OPTION to create a button
 */
function get_button_field(){
    return array(
        "type" => 'section',
        'hide' => true,        
        "label" => "Bouton",
        "fields" => array(
            "icon" => array(
                "type"=> "media",
                "label"=> "Icône",
                "library" => "image"
            )  ,
            "color" => array(
                "type"=> "color",
                "label"=> "Couleur texte"                            
            )  ,
            "backgroundcolor" => array(
                "type"=> "color",
                "label"=> "Couleur de fond"                            
            )         ,                     
            "title" => array(
                "type"=> "text",
                "label"=> "Titre "                            
            ),
            "link" => array(
                "type"=> "link",
                "label"=> "Lien (If empty, will open a Popup with content )"                            
            ),
            "blank" => array(
                "type"=> "checkbox",
                "label"=> "Open in new tab"                            
            ),            
            'call2action' => array(
               "type"=> "tinymce",
               'rows' => 2,                            
               'label' => "Call to action Popup Content"
            ) ,           

        )
    );
}


function display_button($info, $id="noID", $specialPopup = false){
    global $nbButtonTrackingId;
    $nbButtonTrackingId = is_array($nbButtonTrackingId) ? $nbButtonTrackingId : array();  
    $trackingInstance =1;
    
    if( empty($info["title"]) ){
        return;
    }
    
    $trackingID = str_replace("-", "", $id);
    $datatracking = $trackingID . "_" . $trackingInstance;
    
    if( in_array($datatracking, $nbButtonTrackingId) ){
        while (in_array($datatracking, $nbButtonTrackingId) )  {
            $trackingInstance++;
            $datatracking = $trackingID . "_" . $trackingInstance;        
        }      
        $nbButtonTrackingId[] = $datatracking;
        
    }else{
        $nbButtonTrackingId[] = $datatracking; 
    }

    
    
    // Check if Link 
    $onClick ="";
    $link = sow_esc_url($info["link"]); 
    if( empty($link) ){
        $onClick = ' onClick="return false;" ';   
    }
    
    // Check if Popup
    $attrModal = "";
    if( ! empty($info["call2action"]) ) { 
        $modalID = "popupModal" . rand(100, 999);
        $attrModal = ' data-toggle="modal" data-target="#'.$modalID.'" ';        
    }

    // Check if Blank
    $blank = "";
    if( ($info["blank"]) == 1) { 
        $blank = " target='_blank' ";
       
    }    


    
    
    $urlImg = wp_get_attachment_url($info["icon"]);
    $theColor =  $info["backgroundcolor"];
    $color = !empty($info["color"]) ? " color: " . $info["color"] . "; ": "" ;
    $bgcolor = !empty($info["backgroundcolor"]) ? " background-color: " . $info["backgroundcolor"] . "; " : "" ;
    $nomClasse = "hover" . rand(1111, 9999);
?>    

    <style type="text/css">
        .<?php echo  $nomClasse ;?>:hover{
            border: 2px solid <?php echo  $theColor ;?>!important;
            color: <?php echo  $theColor ;?>!important;
            background-color: transparent!important;
        }
    </style>

    <a href="<?php echo sow_esc_url($info["link"]); ?>" class="btn <?php echo  $nomClasse ;?>" data-tracking="<?php echo $datatracking; ?>" style="<?php echo $color . $bgcolor; ?>"  <?php echo $onClick . $attrModal . $blank; ?> >

        <?php if (!empty($urlImg)) { ?>
            <img src="<?php echo $urlImg; ?>" alt="">
        <?php } ?>

        <?php echo $info["title"]; ?>
    </a>


               
    <?php // POPUP NORMAL ?>
    <?php if( ! empty($info["call2action"]) &&  ! $specialPopup) {  ?>
    <!-- Modal -->
    <div class="modal fade modal-form" id="<?php echo $modalID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
             </div>            
            <?php echo ($info["call2action"]); ?>
            
        </div>
      </div>
    </div>

    <?php } else if( ! empty($info["call2action"]) &&   $specialPopup) {  ?>
    <?php // POPUP SPÉCIAL ?>

    <!-- Modal -->
    <div class="modal fade modal-banner-video bs-example-modal-lg" id="<?php echo $modalID; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>         
            <?php echo ($info["call2action"]); ?>
        </div>
      </div>
    </div>

    <?php } ?>

<?php
}




/*
 * 
 * 3 TABS FOR THE BLOCK ON WEBSITE
 *  
 */
add_action("admin_menu", 'add3TabMenuPage');
function add3TabMenuPage(){
    add_menu_page( "Product Line", "Product Line", 'manage_options', 'add3TabMenuPage_option_page', "displayMetaBoxe3Tabs", 'dashicons-admin-generic', 5 );            
}

function displayMetaBoxe3Tabs(){
    //require_once(ABSPATH . 'wp-admin/includes/widgets.php');
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $actual_link = $protocol."$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";    
    
    if(isset($_POST["submitTab"])){
        $data = isset($_POST["widgets"]["productline_1"]) ? $_POST["widgets"]["productline_1"] : array();                
        update_option("tracktik_productline_1_" . ICL_LANGUAGE_CODE, $data);
        
        $data = isset($_POST["widgets"]["productline_2"]) ? $_POST["widgets"]["productline_2"] : array();                
        update_option("tracktik_productline_2_" . ICL_LANGUAGE_CODE, $data);
        
        $data = isset($_POST["widgets"]["productline_3"]) ? $_POST["widgets"]["productline_3"] : array();                
        update_option("tracktik_productline_3_" . ICL_LANGUAGE_CODE, $data);
    }
?>
    
    <form  action="<?php echo $actual_link; ?>" method="POST">
<?php
    $args= array (
            array (
            "widget_id" => "tabbed-tracktik-widget-3",
            "widget_name" => "Block with 3 tabs",
            "_display" => "template",
            "_temp_id" => "tabbed-tracktik-widget-__i__",
            "_multi_num" => 4,
            "_add" => "multi",
            "before_widget" => "<div id='widget-7_tabbed-tracktik-widget-__i__' class='widget'>",
            "after_widget" => "</div>",
            "before_title" => "%BEG_OF_TITLE%",
            "after_title" => "%END_OF_TITLE%"
        )
        ,
        Array
        (
            "number" => 3
        )
    );
    
    
    $widget = "V2_IconList_Tracktik_Widget";

    printf("<h2>Product Line  - Guarding Suite</h2>");    
    $instance = stripslashes_deep(get_option("tracktik_productline_1_" . ICL_LANGUAGE_CODE)); 
    $instance = is_array($instance) ? $instance : array();            
	$form = siteorigin_panels_render_form( $widget, $instance, false, "productline_1");
	$form = apply_filters('siteorigin_panels_ajax_widget_form', $form, $widget, $instance);
	echo $form;
    
    
    
    printf("<h2>Product Line  - Mobile Suite</h2>");
    $instance = stripslashes_deep(get_option("tracktik_productline_2_" . ICL_LANGUAGE_CODE)); 
    $instance = is_array($instance) ? $instance : array();       
	$form = siteorigin_panels_render_form( $widget, $instance, false, "productline_2");
	$form = apply_filters('siteorigin_panels_ajax_widget_form', $form, $widget, $instance);    
	echo $form;
    
    printf("<h2>Product Line  - Back Office Management Suite</h2>");
    $instance = stripslashes_deep(get_option("tracktik_productline_3_" . ICL_LANGUAGE_CODE)); 
    $instance = is_array($instance) ? $instance : array();        
	$form = siteorigin_panels_render_form( $widget, $instance, false, "productline_3");
	$form = apply_filters('siteorigin_panels_ajax_widget_form', $form, $widget, $instance);    
	echo $form;    
    
    ?>
        <style type="text/css">
            html .siteorigin-widget-preview, .siteorigin-panels-help-link{
                display:none !important;
            }
        </style>
        <input type="submit" name="submitTab" class="button" value="Save">
    </form>
<?php    
}



//
//  ADD FILTER For get page with lang
//
add_filter("siteorigin_widgets_search_posts_results", "pn_siteorigin_widgets_search_posts_results");
function pn_siteorigin_widgets_search_posts_results($data){
    if(is_array($data)){
        foreach($data as &$p){
            $id = $p["ID"];
            $info = (wpml_get_language_information(null, $id));
            $lang = isset($info["language_code"]) ? $info["language_code"] : "";
            $p["post_title"] = $p["post_title"] . " ($lang)"; 

        }
        
    }
    
    return $data;
}