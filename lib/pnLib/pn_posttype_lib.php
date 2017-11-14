<?php
  
/**
 * 
 * Register a post Type
 * 
 * @param type $name the post type name
 * @param type $title the post type title
 * @param type $supports the support for the post type
 */  
function pn_create_post_type($name, $title, $supports){
    $labels_creat = array(
        'name'               => $title ,
        'singular_name'      => $title,
        'add_new'            => 'Ajouter',
        'add_new_item'       => 'Ajouter ',
        'edit_item'          => 'Modifier ',
        'new_item'           => 'Nouveau ',
        'all_items'          => 'Tout ',
        'view_item'          => 'Voir ',
        'search_items'       => 'Rechercher ',
        'not_found'          => 'Introuvable',
        'not_found_in_trash' => 'Aucun trouvé dans la corbeille',
        'parent_item_colon'  => '',
        'menu_name'          => $title
    );

    $args_creat = array(
        'labels'             => $labels_creat,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => $name ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => $supports
    );   

    register_post_type( $name, $args_creat );           
}


function pn_get_model_raw_data($type, $modelName, $model, $originalID=""){
    global $post;
    
    //GET DATA FROM NORMAL/CUSTOM POSTTYPE
    if($type == "posttype"){
        $id = "";
        //Get data depending on the language
        if(isset($model["options"]["allLang"])){
            $data = get_post_meta($originalID, $modelName, true);
            $id = $originalID;
        }else{
            $id = $post->ID;        
            $data = get_post_meta($post->ID, $modelName, true);                
        }          
    }
    else if($type == "option"){
        $name = $modelName;                   
        if(isset($model["options"]["multiLang"])){
            $name = $name ."_" . ICL_LANGUAGE_CODE;
        }            

        if(!is_array(get_option($name))){
            $data = stripcslashes(get_option($name));
        }else{
            $data = get_option($name);
        }
                
    }
    else if($type == "taxonomy"){
        $data = stripcslashes(get_term_meta($originalID, $modelName, true));
    }
             
                
    return $data;
}

/**
 * Select the good template to display inpput
 * @param type $modelName
 * @param type $model
 */
function pn_select_input_template($modelName, $model, $data=""){

    $bgColor = isset($model["options"]["bg-color"]) ? $model["options"]["bg-color"] : "";
    $defaultSelectValue = isset($model["options"]["default"]) ? $model["options"]["default"] : "";
    $is_group_title = isset($model["options"]["group-title"]) ? 'js-is-group-title' : "";

    //Select the good template
    if($model['type'] == "text")
    {
        pn_display_meta_text($modelName, $data, $model["label"], $bgColor, $is_group_title);
    }
    else if($model['type'] == "textarea")
    {    
        pn_display_meta_textarea($modelName, $data,  $model["label"], $bgColor);
    }
    else if($model['type'] == "editor")
    {    
        pn_display_meta_editor($modelName, $data,  $model["label"], $bgColor);
    }    
    else if($model['type'] == "checkbox")
    {
        pn_display_meta_checkbox($modelName, $data, $model["label"], $bgColor);
    }        
    else if($model['type'] == "date")
    {
        pn_display_meta_date($modelName, $data, $model["label"], $bgColor);
    }    
    else if($model['type'] == "image")
    {   
        pn_display_meta_wp_one_image($modelName, $data,  $model["label"], $bgColor);
    }
    else if($model['type'] == "gallery")
    {   
        pn_display_meta_wp_gallery_image($modelName, $data,  $model["label"], $bgColor);    
    }            
    else if($model['type'] == "video")
    {   
        pn_display_meta_wp_one_video($modelName, $data,  $model["label"], $bgColor);    
    }  
    else if($model['type'] == "pdf")
    {   
        pn_display_meta_wp_one_pdf($modelName, $data,  $model["label"], $bgColor);    
    }      
    else if($model['type'] == "pdfs")
    {   
        pn_display_meta_wp_multi_pdf($modelName, $data,  $model["label"], $bgColor);    
    }      
    else if($model['type'] == "address")
    {   
        //pn_display_meta_googleaddress($modelName,  $model["label"],$data,  $bgColor);    
    }          
    else if($model['type'] == "select")
    {   
        pn_display_meta_select($modelName, $data, $model["label"],  $model["options"]["values"], $bgColor);    
    }
    else if($model['type'] == "select2")
    {   
        pn_display_meta_select2($modelName, $data, $model["label"],  $model["options"]["values"], $bgColor);    
    }
    else if($model['type'] == "select_taxonomy")
    {   
        pn_display_meta_select_taxonomy($modelName, $data, $model["label"], $model["options"]["taxonomy"], $defaultSelectValue, $bgColor);
    } 
    else if($model['type'] == "posttype_link")
    {   
        pn_display_meta_posttype_link($modelName, $data,  $model["label"], $model["options"]["posttype"], $bgColor);    
    }     
    else if($model['type'] == "multiple_posttype_link")
    {   
        pn_display_meta_multiple_posttype_link($modelName, $data,  $model["label"], $model["options"]["posttype"], $bgColor);    
    }
    else if($model['type'] == "multiple_posttype_link_tax")
    {   
        pn_display_meta_multiple_posttype_link_tax($modelName, $data,  $model["label"], $model["options"]["posttype"], $model["options"]["tax"], $model["options"]["terms"], $bgColor);    
    }
    else if($model['type'] == "multiple_taxonomy_link")
    {   
        pn_display_meta_multiple_taxonomy_link($modelName, $data,  $model["label"],$model["options"]["taxonomy"], $bgColor);    
    }
    else if($model['type'] == "title")
    {
        pn_display_title($model["label"], $model["options"]);
    }
    else if($model['type'] == "subtitle")
    {
        pn_display_subtitle($model["label"], $model["options"]);
    }
    else if($model['type'] == "group")
    {
        pn_display_group($modelName, $data, $model["label"], $model["options"], $bgColor);
    }    
    else if($model['type'] == "group_parent")
    {
        pn_display_group_parent($modelName, $data, $model["label"], $model["options"], $bgColor);
    }     
    else if($model['type'] == "colorpicker")
    {
        pn_display_colorpicker($modelName, $data, $model["label"], $bgColor);       
    }
    else if($model['type'] == "select_menu")
    {
        pn_display_meta_select_menu($modelName, $data, $model["label"], $bgColor);       
    }
    else if($model['type'] == "stream_video")
    {
        pn_display_meta_stream_video($modelName, $data, $model["label"], $bgColor);       
    }
}


/**
 * Return data depending on the model type
 * @param type $modelName
 * @param type $model
 * @param type $originalID
 */
function pn_get_model_data($id, $modelName, $model){
    
    //Return one image
    if($model["type"] == "image"){
        $imgID = get_post_meta($id, $modelName , true); 
        //$size = ($option != "") ? $option : "large";
        $size = "large"; 
        
        return pn_get_image_url($imgID, $size);
    }
    //Return array of image
    else if($model["type"] == "gallery"){
        $imgsIDs = get_post_meta($id, $modelName , true); 
        $imgsIDs = explode(",", $imgsIDs);
        $imgsUrls = array();
        //$size = ($option != "") ? $option : "large";
        $size = "large";
        
        foreach($imgsIDs as $img){
            $imgsUrls[] = pn_get_image_url($img, $size);
        }

        return $imgsUrls;
    } 
    else if($model["type"] == "address"){
        $namesPrefix = array("_infos", "_rue", "_ville", "_codepostal", "_lat", "_lng");
        $metas = array();
        foreach($namesPrefix as $prefix){
            $metas[$modelName.$prefix] = get_post_meta($id, $modelName.$prefix, true);         //Save data                          
        }            
        
        return     $metas;    
    }
    else if($model["type"] == "pdf"){
        $pdfID = get_post_meta($id, $modelName , true);  
        if(is_numeric($pdfID)){
            return wp_get_attachment_url($pdfID);            
        }else{
            return "";            
        }
        
    }
    else{
        return get_post_meta($id, $modelName , true);                
    }    

}


/**
 * Save the meta data depending the model
 * @param type $id
 * @param type $modelName
 * @param type $model
 */
function pn_select_save_method($id, $posttype, $modelName, $model){
    //Save data depending on the language
    if ($posttype !== 'option') {
        if(isset($model["options"]["allLang"])){
            $id = pn_find_original_id($posttype);
        }else{
            $id = $_POST['post_ID'];
        }
    } else {
        $option_model_name = $modelName;

        if(isset($model["options"]["multiLang"])){
            $option_model_name = $modelName . "_" .ICL_LANGUAGE_CODE;
        }
    }


    //SAVE ADDRESS META
    if($model['type'] == "address"){

        $namesPrefix = array("_infos", "_rue", "_ville", "_codepostal", "_lat", "_lng");
        foreach($namesPrefix as $prefix){
            $data = isset($_POST[$modelName.$prefix]) ? $_POST[$modelName.$prefix] : "";

            //Save data
            if ($posttype !== 'option') {
                update_post_meta($id, $modelName.$prefix, $data);
            } else {
                update_option($option_model_name.$prefix, $data);
            }
        }
    }
    //Save Checkbox
    else if($model['type'] == "checkbox"){
        if(isset($_POST[$modelName])){
            if ($posttype !== 'option') {
                update_post_meta($id, $modelName, 1);
            } else {
                update_option($option_model_name, 1);
            }
        }else{
            if ($posttype !== 'option') {
                update_post_meta($id, $modelName, 0);
            } else {
                update_option($option_model_name, 0);
            }
        }
    }
    //Save Groupbox
    else if($model['type'] == "group"){
        
        if(isset($model["options"]["models"]) && is_array($model["options"]["models"])){
            $models = $model["options"]["models"];
            $arrayToSave = array();
            $nbBlock = 0;               //Nb of field's block  
            
            
            //Get NB ON Block
            if(isset($models[0])){
                $postName = $modelName . "_" . $models[0]["name"];
                $nbBlock = count($_POST[$postName]);
            }

            //Create formated array
            for($i=0; $i<$nbBlock; $i++){                                       //For each block
                $blockData = array();
                foreach($models as $model){                                     //For each field                    
                    $postName = $modelName . "_" . $model["name"];       
                    $fieldPostArray = ( isset($_POST[$postName][$i]) ) ? $_POST[$postName][$i] : "";   
                    $blockData[$model["name"]] = $fieldPostArray;
                }    
                $arrayToSave[] = $blockData;
            }

            if ($posttype !== 'option') {
                update_post_meta($id, $modelName, $arrayToSave);
            } else {
                update_option($option_model_name, $arrayToSave);
            }
        }
    }

    //Save Groupbox with paraent
    else if($model['type'] == "group_parent"){
        
        if(isset($model["options"]["children_models"]) && is_array($model["options"]["children_models"])){
            $models = $model["options"]["children_models"];
            $modelsChildren = $model["options"]["children_models"];
            $modelsParent = $model["options"]["parent_models"];            
            $arrayToSave = array();
            $nbBlock = 0;               //Nb of field's block  
            
           // print_r($_POST);
            if(isset( $_POST[$modelName])){
                $data = stripslashes($_POST[$modelName]);
                $dataArray = (array) ( json_decode(html_entity_decode($data)));
                //Parse to array
                for($i=0; $i<count($dataArray); $i++){
                    $dataArray[$i] =    (array) $dataArray[$i];
                    if( isset($dataArray[$i]["children"]) && is_array($dataArray[$i]["children"]) ){
                        for($j=0; $j<count($dataArray[$i]["children"]); $j++){
                            $dataArray[$i]["children"][$j] =    (array) $dataArray[$i]["children"][$j];
                        }
                    }
                }
                //Each Parent
            }

            if ($posttype !== 'option') {
                update_post_meta($id, $modelName, $dataArray);
            } else {
                update_option($option_model_name, $dataArray);
            }
        }
    }     
    //SAVE NORMAL META                
    else{
        $data = isset($_POST[$modelName]) ? $_POST[$modelName] : "";

        // Save data
        if ($posttype !== 'option') {
            update_post_meta($id, $modelName, $data);
        } else {
            update_option($option_model_name, $data);
        }
    }
}

/**
 * Create a taxonomy for a posttype
 * @param type $name
 * @param type $title
 * @param type $posttype
 */
function pn_create_taxonomy($name, $title, $posttype){
	register_taxonomy($name, $posttype,
		array(
			'label' => $title,
			'rewrite' => array( 'slug' => $name ),
			'hierarchical' => true,
		)
	);    
}

/**
 * 
 * Return one string of the taxonomie
 * @param type $id  post ID
 * @param type $tax     taxonomy name
 */
function pn_get_first_taxonomie($id, $tax){
    $terms = wp_get_object_terms($id, $tax) ;
    $theme = array();
    if(!empty($terms) && !is_wp_error($terms)){
        foreach($terms as $term){
            $theme["name"] = $term->name;
            $theme["ID"] = $term->term_id;            
        }
    }  
    
    return (object) $theme;
}


/**
 * Return img's url
 * @param type $tableau  tableau avec meta
 * @param type $index   index du tableu avec id de laimge
 * @return string
 */
function pn_get_image_url($data, $size = "full"){
    if(is_numeric($data)){
        $url = wp_get_attachment_image_src($data, $size);
        return $url[0];  
    }      else{
        return "";
    } 
}


/**
 * Return img's url from post meta or term meta name
 * @param type $tableau  tableau avec meta
 * @param type $index   index du tableu avec id de laimge
 * @return string
 */
function pn_get_image_url_from_meta($id, $name, $size = "full", $term_meta = false){
    if ($term_meta) {
        $imgID = get_term_meta($id, $name, true);
    } else {
        $imgID = get_post_meta($id, $name, true);
    }

    return pn_get_image_url($imgID, $size);
}

/**
 * Return img's alt text
 * @param type $tableau  tableau avec meta
 * @param type $index   index du tableu avec id de l'image
 * @return string
 */
function pn_get_image_alt($data){
    if(is_numeric($data)){
        return get_post_meta($data, '_wp_attachment_image_alt', true);
    } else {
        return "Error : ID is non numeric";
    }
}


/**
 * Return img's alt text from post meta or term meta name
 * @param type $tableau  tableau avec meta
 * @param type $index   index du tableu avec id de l'image
 * @return string
 */
function pn_get_image_alt_from_meta($id, $name, $term_meta = false){
    if ($term_meta) {
        $imgID = get_term_meta($id, $name, true);
    } else {
        $imgID = get_post_meta($id, $name, true);
    }

    return pn_get_image_alt($imgID);
}



/**
 * Return pdf's url from post meta name
 * @param type $tableau  tableau avec meta
 * @param type $index   index du tableu avec id de laimge
 * @return string
 */
function pn_get_pdf_url_from_meta($id, $name, $term_meta = false){
    if ($term_meta) {
        $pdfID = get_term_meta($id, $name,true);
    } else {
        $pdfID = get_post_meta($id, $name,true);
    }
    
    if (is_numeric($pdfID)) {
        return wp_get_attachment_url($pdfID);
    } else {
        return "";
    }
}

/**
 * Return img's url
 * @param type $tableau  tableau avec meta
 * @param type $index   index du tableu avec id de laimge
 * @return string
 */
function pn_get_image_url_from_array($tableau, $index, $size = "full"){
    if(isset($tableau[$index]) && is_numeric($tableau[$index])){
        $url = wp_get_attachment_image_src($tableau[$index], $size);
        return $url[0];  
    }      else{
        return "";
    }  
}

/**
 * Return img's url
 * @param type $tableau  tableau avec meta
 * @param type $index   index du tableu avec id de laimge
 * @return string
 */
function pn_get_image_url_from_array_5p3($tableau, $index){
    if(isset($tableau[$index]) && is_numeric($tableau[$index])){
        $url = wp_get_attachment_image_src($tableau[$index], array(500,300));
        return $url[0];  
    }      else{
        return "";
    }  
}

/**
 * Get apage url from the teamplte name
 * @param type $template
 * @return type
 */
function pn_get_url_from_template($template){
    $url = "";
    $pages = get_pages(array('meta_key' => '_wp_page_template', 'meta_value' => $template ));
    foreach($pages as $page){
        $url = get_permalink($page->ID);
    }      
    return $url;
}

/**
 * Get apage url from the teamplte name
 * @param type $template
 * @return type
 */
function pn_get_id_from_template($template){
    $id = "";
    $pages = get_pages(array('meta_key' => '_wp_page_template', 'meta_value' => $template ));
    foreach($pages as $page){
        $id = $page->ID;
    }      
    return $id;
}


/**
 * Return a safe string from an array
 * @param type $name name of the index
 * @param type $array the array that contain data
 */
function pn_safe_echo($array, $name){
    echo isset($array[$name]) ? $array[$name] : "";   
}

/**
 * 
 * Find the original ID from post that share same meta
 * @param type $posttype_name the post type name
 */
function pn_find_original_id($posttype_name){
    global $wpdb;
    global $post;
    $original_id = "";
    
    //Get the original ID    
    if ( isset($_GET["trid"]) ) {
        $original_id = $wpdb->get_var( "SELECT element_id FROM {$wpdb->prefix}icl_translations WHERE language_code='fr' AND trid={$_GET["trid"]}" );  
        //SI AUCUN POST EN FRANCAIS
        if($original_id == ""){
            $original_id = $wpdb->get_var( "SELECT element_id FROM {$wpdb->prefix}icl_translations WHERE  trid={$_GET["trid"]}" ); 
        }
    } else{
        if (function_exists('icl_object_id')) {
            $original_id = icl_object_id( $post->ID, $posttype_name, true, "fr" );       

        }
    }    
    
    return $original_id;
}



/*
 * Remove accent from a string
 */
function sanitizeFilename($f) {
 // a combination of various methods
 // we don't want to convert html entities, or do any url encoding
 // we want to retain the "essence" of the original file name, if possible
 // char replace table found at:
 // http://www.php.net/manual/en/function.strtr.php#98669
 $replace_chars = array(
     'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
     'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
     'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
     'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
     'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
     'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
     'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f'
 );
 $f = strtr($f, $replace_chars);
 // convert & to "and", @ to "at", and # to "number"
 $f = preg_replace(array('/[\&]/', '/[\@]/', '/[\#]/'), array('-and-', '-at-', '-number-'), $f);
 $f = preg_replace('/[^(\x20-\x7F)]*/','', $f); // removes any special chars we missed
 $f = str_replace(' ', '-', $f); // convert space to hyphen 
 $f = str_replace('\'', '', $f); // removes apostrophes
 $f = preg_replace('/[^\w\-\.]+/', '', $f); // remove non-word chars (leaving hyphens and periods)
 $f = preg_replace('/[\-]+/', '-', $f); // converts groups of hyphens into one
 return strtolower($f);
}

/**
 * Allow to upload svg
 */
add_filter('upload_mimes', 'custom_upload_mimes_svg');
function custom_upload_mimes_svg ( $existing_mimes=array() ) {
	$existing_mimes['svg'] = 'image/svg+xml';
        // call the modified list of extensions

	return $existing_mimes;
}
