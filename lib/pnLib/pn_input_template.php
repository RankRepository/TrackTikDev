<?php

/**
 * Display meta for a input text
 * @param type $name
 */
function pn_display_meta_text($name, $metas, $title, $trClass = "", $is_group_title = ""){
    ?>
    <tr class="<?php echo $trClass; ?> <?php echo $is_group_title; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <?php
            printf("<input id='%s' name='%s'  type='text' style='width:100%%' value='%s' />", $name, $name, htmlspecialchars($metas, ENT_QUOTES)  ); 
            ?>
        </td>
    </tr>
    <?php 
}



/**
 * Display meta for a input textarea
 * @param type $name
 */
function pn_display_meta_textarea($name, $metas, $title, $trClass = ""){
    ?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <?php
            printf("<textarea id='%s' name='%s'  style='width:100%%; height:100px;'  />%s</textarea>", $name, $name,  htmlspecialchars($metas, ENT_QUOTES)  ); 
            
            ?>
        </td>
    </tr>
    <?php 
}

/**
 * Display meta for a wp editor
 * @param type $name
 */
function pn_display_meta_editor($name, $metas, $title, $trClass = ""){
    ?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <?php
            wp_editor($metas, $name, array("editor_height"=>150));
            //printf("<textarea id='%s' name='%s'  style='width:100%%; height:100px;'  />%s</textarea>", $name, $name,  htmlspecialchars($metas, ENT_QUOTES)  ); 
            
            ?>
        </td>
    </tr>
    <?php 
}


/**
 * Display meta for a input text
 * @param type $name
 */
function pn_display_meta_date($name, $metas, $title, $trClass = ""){
    ?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <?php
            printf("<input id='%s' name='%s'  type='date' style='width:100%%' value='%s' />", $name, $name, htmlspecialchars($metas, ENT_QUOTES)  ); 
            ?>
        </td>
    </tr>
    <?php 
}



/**
 * Display meta for a input text
 * @param type $name
 */
function pn_display_meta_checkbox($name, $metas, $title, $trClass = ""){
    ?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <?php
            $selected = ($metas==1 || $metas=="on") ? " checked " : "";
            printf("<input id='%s' name='%s'  type='checkbox'  %s />", $name, $name, $selected  ); 
            ?>
        </td>
    </tr>
    <?php 
}



/**
 * Display control to add image with the wordpress image upload / work with image-upload.js
 * @param type $name
 * @param type $metas
 * @param type $title
 */
function pn_display_meta_wp_one_image($name, $metas, $title, $trClass = ""){
?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <div data-js="wp-media-container">
                <div id="imgPreview<?php echo $name; ?>" class='galerieImagesVariations'>
                  <?php
                  //LOAD AND SHOW THE THUMBNAIL
                  if(isset($metas)) {
                      if( get_post_mime_type( $metas) == "image/svg+xml"){
                          printf("<img src='%s' />", wp_get_attachment_url( $metas ));  
                      }else{
                          echo wp_get_attachment_image( $metas, 'thumbnail' ) . "&nbsp;&nbsp;";                                   

                      }
                  }
                  ?>
                </div>
                <input type="hidden" id="<?php echo $name; ?>" 
                       name="<?php echo $name; ?>" 
                       value="<?php echo $metas; ?>" />
                <p>
                  <a class="upload-and-attach-link-oneImage"  href="#">Changer l'image</a> 
                  <a class="upload-and-attach-link-del"  href="#">Enlever les images</a>                    
                </p>                 
            </div>            

        </td>
    </tr>       
<?php     
}





/**
 * Display control to add image gallery with the wordpress image upload / work with image-upload.js
 * @param type $name
 * @param type $metas
 * @param type $title
 */
function pn_display_meta_wp_gallery_image($name, $data, $title, $trClass = ""){
?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <div data-js="wp-media-container">
                <div id="imgPreview<?php echo $name; ?>" class='galerieImagesVariations'>
                    <?php
                    //LOAD AND SHOW THE THUMBNAIL

                      $imgIds = explode(",", $data);
                      foreach($imgIds as $limg){
                        echo wp_get_attachment_image( $limg, 'thumbnail' ) . "&nbsp;&nbsp;";                
                      }               
                    ?>                   
                </div>
                <input type="hidden" id="<?php echo $name; ?>" 
                       name="<?php echo $name; ?>" 
                       value="<?php echo $data; ?>" />
                <p>
                  <a class="upload-and-attach-link"  href="#">Changer les images</a> 
                  <a class="upload-and-attach-link-del"  href="#">Enlever les images</a>                 
                </p>                
            </div>
        </td>
    </tr>       
<?php     
}

/**
 * Display control to add video with the wordpress image upload / work with image-upload.js
 * @param type $name
 * @param type $metas
 * @param type $title
 */
function pn_display_meta_wp_one_video($name, $data, $title, $trClass = ""){
?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <div data-js="wp-media-container">
                <div id="imgPreview<?php echo $name; ?>" class='galerieImagesVariations'>
                  <?php
                  //LOAD AND SHOW THE THUMBNAIL
                  if($data != "") {
                      echo get_the_title($data);
                      ?>
                    <br/><video width="100" height="80" >
                        <source src="<?php echo get_the_guid($data); ?>" type="<?php echo get_post_mime_type($data); ?>">
                    Your browser does not support the video tag.
                    </video>                      

                          <?php
                  }
                  else{
                      echo "Aucune vidéo";
                  }
                  ?>
                </div>
                <input type="hidden" id="<?php echo $name; ?>" 
                       name="<?php echo $name; ?>" 
                       value="<?php echo $data; ?>" />
                <p>
                  <a class="upload-and-attach-link-oneImage"  href="#">Changer la vidéo</a> 
                  <a class="upload-and-attach-link-del"  href="#">Enlever la vidéo</a>                 
                </p>                 
            </div>
        </td>
    </tr>       
<?php     
}


/**
 * Display control to add image with the wordpress image upload / work with image-upload.js
 * @param type $name
 * @param type $metas
 * @param type $title
 */
function pn_display_meta_wp_one_pdf($name, $data, $title, $trClass = ""){
?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <div data-js="wp-media-container">
                <div id="imgPreview<?php echo $name; ?>" class='galerieImagesVariations'>
                  <?php
                  //LOAD AND SHOW THE THUMBNAIL
                  if($data != "") {
                      echo get_the_title($data);
                  }
                  else{
                      echo "Aucun fichier";
                  }
                  ?>
                </div>
                <input type="hidden" id="<?php echo $name; ?>" 
                       name="<?php echo $name; ?>" 
                       value="<?php echo $data; ?>" />
                <p>
                  <a class="upload-and-attach-link-oneImage"  href="#">Changer le PDF</a> 
                  <a class="upload-and-attach-link-del" " href="#">Enlever le PDF</a>                 
                </p>                 
            </div>

        </td>
    </tr>       
<?php     
}


/**
 * Display control to add image with the wordpress image upload / work with image-upload.js
 * @param type $name
 * @param type $metas
 * @param type $title
 */
function pn_display_meta_wp_multi_pdf($name, $data, $title, $trClass = ""){
?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <div data-js="wp-media-container">
                <select name="<?php echo $name; ?>[]" multiple class='selectMultiple'>
                    <?php
                        //Get actual postype_link
                        if(is_array($data)){
                            foreach($data as $p){
                                $pdf = get_post($p);
                                printf("<option selected value='%s'>%s</option>", $p, basename($pdf->guid));                    
                            }                    
                        }

                        //Get other posts from posttype
                        $postsPDF = get_posts(array("post_type" => "attachment", "posts_per_page" => -1, "post_mime_type"=>"application/pdf",  "post__not_in"=>($data) ));
                        foreach($postsPDF as $pdf){
                            printf("<option value='%s'>%s</option>", $pdf->ID, basename($pdf->guid) );
                        }                    
                    ?>                   
                </select>            
            </div>                   
        </td>
    </tr>       
<?php     
}


/**
 * Display meta for a google adderess input
 * @param type $name
 */
function pn_display_meta_googleaddress($name, $titre, $id, $trClass = ""){
    global $post;
    
    $namesPrefix = array("_infos", "_rue", "_ville", "_codepostal", "_lat", "_lng");
    $metas = array();
    foreach($namesPrefix as $prefix){
        $metas[$name.$prefix] = get_post_meta($id, $name.$prefix, true);         //Save data                          
    }       
    
    ?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $titre; ?>&nbsp;: </td>
        <td>
            <?php
            printf("Infos supplémentaires <input id='%s_infos' name='%s_infos'  type='text' style='width:100%%' value='%s' />", $name, $name, (isset($metas[$name."_infos"]) ? htmlspecialchars($metas[$name."_infos"], ENT_QUOTES) : "" )  ); 
            
            printf("# Civique & Rue <input id='%s_rue' name='%s_rue'  type='text' style='width:100%%' value='%s' />", $name, $name, (isset($metas[$name."_rue"]) ? htmlspecialchars($metas[$name."_rue"], ENT_QUOTES) : "" )  ); 
            printf("Ville & Province <input id='%s_ville' name='%s_ville'  type='text' style='width:100%%' value='%s' />", $name, $name, (isset($metas[$name."_ville"]) ? htmlspecialchars($metas[$name."_ville"], ENT_QUOTES) : "" )  ); 
            printf("Code postal <input id='%s_codepostal' name='%s_codepostal'  type='text' style='width:100%%' value='%s' />", $name, $name, (isset($metas[$name."_codepostal"]) ? htmlspecialchars($metas[$name."_codepostal"], ENT_QUOTES) : "" )  ); 

            printf("<input id='%s_lat' name='%s_lat' placeholder='Latitude' type='text' style='width:30%%' value='%s'  />", $name, $name, (isset($metas[$name."_lat"]) ? $metas[$name."_lat"] : "" ) ); 
            printf("<input id='%s_lng' name='%s_lng' placeholder='Longitude' type='text' style='width:30%%' value='%s' />", $name, $name, (isset($metas[$name."_lng"]) ? $metas[$name."_lng"] : "" ) ); 
            printf("&nbsp;&nbsp;<button id='btnTrouverLatLng' data-name='%s'>Trouver Lat & Lng</button>", $name); 
            
            ?>
        </td>
    </tr>
    <?php 
}





/**
 * Display meta for a select with specified values
 * @param type $name
 */
function pn_display_meta_select($name, $data, $title, $values, $trClass = ""){
    ?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <select name="<?php echo $name; ?>">
            <?php
            foreach($values as $value){
                $selected = ($value == $data) ? "selected" : "";
                printf("<option value='%s' %s>%s</option>", $value, $selected, $value);              
            }
            ?>                
            </select>
        </td>
    </tr>
    <?php 
}

/**
 * Display meta for a select with specified values
 * @param type $name
 */
function pn_display_meta_select2($name, $data, $title, $values, $trClass = ""){
    ?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <select name="<?php echo $name; ?>">
            <?php
            foreach($values as $value){
                $selected = ($value[0] == $data) ? "selected" : "";
                printf("<option value='%s' %s>%s</option>", $value[0], $selected, $value[1]);              
            }
            ?>                
            </select>
        </td>
    </tr>
    <?php 
}


/**
 * Display meta for a select with terms values
 * @param type $name
 */
function pn_display_meta_select_taxonomy($name, $data, $title, $taxonomy, $default, $trClass = ""){
    ?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <select name="<?php echo $name; ?>">
            <?php
                $terms = get_terms(array(
                    'taxonomy' => $taxonomy,
                    'hide_empty' => false
                ));

                if (!empty($default)) {
                    printf("<option value='%s' %s>%s</option>", '', 'selected', $default);
                }

                foreach($terms as $term){
                    $selected = ($term->term_id == $data) ? "selected" : "";
                    printf("<option value='%s' %s>%s</option>", $term->term_id, $selected, $term->name);
                }
            ?>
            </select>
        </td>
    </tr>
    <?php 
}



/**
 * Display meta for a select with specified values from a posttype
 * @param type $name
 */
function pn_display_meta_posttype_link($name, $data, $title, $posttype, $trClass = ""){    
    ?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <select name="<?php echo $name; ?>">
                <option value=""></option>
            <?php
                //Get actual postype_link
                $idFR = icl_object_id( $data, $posttype, true, "fr" );   
                $idCurLang = icl_object_id( $data, $posttype, true, ICL_LANGUAGE_CODE );               
                
                if(is_numeric($idFR)){
                    printf("<option selected value='%s'>%s</option>", $idFR, get_the_title($idCurLang));
                }
            
                //Get other posts from posttype
                $posts = get_posts(array("post_type" => $posttype, "posts_per_page" => -1, "suppress_filters" => 0, "post__not_in"=>array($data) ));
                foreach($posts as $p) {
                    $idFR = icl_object_id( $p->ID, $posttype, true, "fr" );   
                    if($idFR != $data){
                        printf("<option value='%s' >%s</option>", $idFR, $p->post_title);                                      
                    }
                }
            ?>
            </select>
        </td>
    </tr>
    <?php 
}



/**
 * Display meta for a select multiple with specified values from a posttype
 * @param type $name
 */
function pn_display_meta_multiple_posttype_link($name, $data, $title, $posttype, $trClass = ""){        
    ?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <select class='selectMultiple' multiple name="<?php echo $name; ?>[]">
                <option value=""></option>
            <?php
                //Get actual postype_link
                
                if(is_array($data)){
                    foreach($data as $p){
                        printf("<option selected value='%s'>%s</option>", $p, get_the_title($p));
                    }
                }

                //Get other posts from posttype
                $posts = get_posts(array("post_type" => $posttype, "posts_per_page" => -1, "suppress_filters" => 0, "post__not_in"=>($data) ));
                foreach($posts as $p) {
                    printf("<option value='%s' >%s</option>", $p->ID, $p->post_title);
                }
            ?>
            </select>
        </td>
    </tr>
    <?php 
}

/**
 * Display meta for a select multiple with specified values from a taxonomy
 * @param type $name
 */
function pn_display_meta_multiple_taxonomy_link($name, $data, $title, $taxonomy, $trClass = "") {
    ?> 
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <select class='selectMultiple' multiple name="<?php echo $name; ?>[]">
            <?php
                //Get actual postype_link
                
                if(is_array($data)){
                    foreach($data as $id){
                        $term = get_term($id, $taxonomy);
                        printf("<option selected value='%s'>%s</option>", $id, $term->name);
                    }
                }

                //Get other posts from posttype
                $terms = get_terms( array(
                    'taxonomy' => $taxonomy,
                    'hide_empty' => true,
                    'exclude' => $data
                ));

                foreach($terms as $item) {
                    printf("<option value='%s' >%s</option>", $item->term_id, $item->name);
                }
            ?>
            </select>
        </td>
    </tr>
    <?php 
}


/**
 * Display meta for a select multiple with specified values from a posttype
 * @param type $name
 */
function pn_display_meta_multiple_posttype_link_tax($name, $data, $title, $posttype, $tax, $terms, $trClass = ""){        
    ?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <select class='selectMultiple' multiple name="<?php echo $name; ?>[]">
                <option value=""></option>
            <?php
                //Get actual postype_link
                if(is_array($data)){
                    foreach($data as $p){
                        $idFR = icl_object_id( $p, $posttype, true, "fr" );   
                        $idCurLang = icl_object_id( $p, $posttype, true, ICL_LANGUAGE_CODE );               
                        
                        printf("<option selected value='%s'>%s</option>", $idFR, get_the_title($idCurLang));                    
                    }                    
                }
            
                //Get other posts from posttype
                $posts = get_posts(array(
                    "post_type" => $posttype, 
                    "posts_per_page" => -1, 
                    "suppress_filters" => 0, 
                    "post__not_in"=>($data),
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => $tax,
                            'field'    => 'slug',
                            'terms'    => $terms,
                            'operator' => 'IN'
                        ),
                    ),
                ));
                foreach($posts as $p) {
                    $idFR = icl_object_id( $p->ID, $posttype, true, "fr" );   
                    if( !in_array($idFR, $data)){
                        printf("<option value='%s' >%s</option>", $idFR, $p->post_title);                                      
                    }
                }
            ?>                
            </select>
        </td>
    </tr>
    <?php 
}



/**
 * Display meta for a input text
 * @param type $name
 */
function pn_display_meta_weektime($name, $metas, $title, $trClass = ""){
    ?>
    <tr class="weekTime  <?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?>&nbsp;: </td>
        <td>
            <label>Lundi : </label>
            <?php pn_display_meta_timeDebutFin($name."Lundi", $metas); ?><br/>
            
            <label>Mardi : </label>
            <?php pn_display_meta_timeDebutFin($name."Mardi", $metas);  ?><br/>
            
            <label>Mercredi : </label>
            <?php pn_display_meta_timeDebutFin($name."Mercredi", $metas); ?><br/>
            
            <label>Jeudi : </label>
            <?php pn_display_meta_timeDebutFin($name."Jeudi", $metas);  ?><br/>
            
            <label>Vendredi : </label>
            <?php pn_display_meta_timeDebutFin($name."Vendredi", $metas);  ?><br/>
            
            <label>Samedi : </label>
            <?php pn_display_meta_timeDebutFin($name."Samedi", $metas);  ?><br/>  
            
            <label>Dimanche : </label>
            <?php pn_display_meta_timeDebutFin($name."Dimanche", $metas); ?><br/>            
        </td>
    </tr>
    <?php 
}


function pn_display_meta_timeDebutFin($nameNday, $metas){
    pn_display_meta_time($nameNday . "Debut", $metas);
    pn_display_meta_time($nameNday . "Fin", $metas);
}

function pn_display_meta_time($nameNdayNtype, $metas){
    printf("<input id='%s' class='timepicker' name='%s' type='text' style='width:100px' value='%s' />", $nameNdayNtype, $nameNdayNtype, (isset($metas[$nameNdayNtype]) ? htmlspecialchars($metas[$nameNdayNtype], ENT_QUOTES) : "" )  );     
}


/**
 * Display only title
 * 
 */
function pn_display_title($text, $options) {
    printf("<tr><td colspan='2'><%s style='%s'>%s</%s></td></tr>",
            isset($options["element"]) ? $options["element"] : "h3",
            isset($options["style"]) ? $options["style"] : "",
            isset($options["html"]) ? $text : htmlentities($text),
            isset($options["element"]) ? $options["element"] : "h3"); 
}

/**
 * Display only sub title
 * 
 */
function pn_display_subtitle($text, $options) {
    printf("<tr class='pn-subtitle'><td colspan='2'><%s style='%s'>%s</%s></td></tr>",
            isset($options["element"]) ? $options["element"] : "h3",
            isset($options["style"]) ? $options["style"] : "",
            isset($options["html"]) ? $text : htmlentities($text),
            isset($options["element"]) ? $options["element"] : "h3");
}


/**
 * Display Group
 * 
 */
function pn_display_group($modelName, $data, $title, $options, $trClass="") {
    
    if(isset($options["models"]) && is_array($options["models"])){
        $modelsParent = $options["models"];
        
        $containerID = 'group-container-' . $modelName;
        $templateId = $modelName . "Template";

        $is_parent = false;

        //PRINT EMPTY TEMPLATE FOR REUSE
        ?>
        <script id="<?php echo $templateId; ?>" type="pn-template">
            <?php
                ob_start();
                include(locate_template('lib/pnlib/templates/group/group.php'));
                $template = ob_get_clean();
                echo $template;
            ?>
        </script>

        <?php include(locate_template('lib/pnlib/templates/group/group-field.php')); ?>

        <?php
    }
}

/**
 * Display Group with parent
 * 
 */
function pn_display_group_parent($modelName, $data, $title, $options, $trClass = "") {
    
    if(isset($options["children_models"]) && is_array($options["children_models"]) && isset($options["parent_models"]) && is_array($options["parent_models"]) ){
        $modelsParent = $options["parent_models"];
        $modelsChildren = $options["children_models"];
        $parentFieldName = array();
        $childrenFieldName = array();
        
        $containerID = 'group-container-' . $modelName;
        $templateId = $modelName . "Template";
        $templateIdChild = $modelName . "Template_children";

        $is_parent = true;

        //PRINT TEMPLATE FOR REUSE
        ?>
        <!-- PARENT  HTML TEMPLATE -->
        <script id="<?php echo $templateId; ?>" type="pn-template">
            <?php
                ob_start();
                include(locate_template('lib/pnlib/templates/group/group.php'));
                $template = ob_get_clean();
                echo $template;
            ?>
        </script>

        <!-- CHILDREN HTML TEMPLATE -->
        <script id="<?php echo $templateIdChild; ?>" type="pn-template">
            <?php
                ob_start();
                include(locate_template('lib/pnlib/templates/group/group-child.php'));
                $templateChildren = ob_get_clean();
                echo $templateChildren;
            ?>
        </script>

        <?php include(locate_template('lib/pnlib/templates/group/group-field.php')); ?>

        <?php
    }
}
/**
 * Display a colorpicker
 * 
 */
function pn_display_colorpicker($name, $metas, $title, $trClass = "") {
    ?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width: 100px'><?php echo $title; ?> : </td>
        <td>
            <?php
             printf("<input id='%s' name='%s' class='color-field'  type='text' style='width:100%%' value='%s' />", $name, $name, htmlspecialchars($metas, ENT_QUOTES)  );
            ?>
        </td>
    </tr>
    <?php
}

/**
 * Display meta for a select with specified values
 * @param type $name
 */
function pn_display_meta_select_menu($name, $data, $title, $trClass = ""){
    $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) );
    ?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width:200px'><?php echo $title; ?> : </td>
        <td>
            <select name="<?php echo $name; ?>">
            <option value='' selected>Choisir un menu</option>
            <?php
            foreach($menus as $menu){
                $selected = ($menu->term_id == $data) ? "selected" : "";
                printf("<option value='%s' %s>%s</option>", $menu->term_id, $selected, $menu->name);
            }
            ?>
            </select>
        </td>
    </tr>
    <?php 
}


/**
 * Display meta for a youtube video
 * @param type $name
 */
function pn_display_meta_stream_video($name, $metas, $title, $trClass = ""){
    ?>
    <tr class="<?php echo $trClass; ?>">
        <td style='width:200px'><?php echo $title; ?> : </td>
        <td>
            <?php
            printf("<input id='%s' name='%s'  type='text' style='width:100%%' value='%s' />", $name, $name, htmlspecialchars($metas, ENT_QUOTES)  );

            $url = htmlspecialchars($metas, ENT_QUOTES);
            parse_str( parse_url( $url, PHP_URL_QUERY ), $parameters );

            if( isset($parameters['v']) ){
            ?>
            <br>
            <iframe width="420" height="315" src="https://www.youtube.com/embed/<?php echo $parameters['v']; ?>"></iframe>
            <?php } ?>
        </td>
    </tr>
    <?php 
}


