<?php

/**
 * Create meta box for a template page
 */
class PnPostType {
 
    public $name = "";
    public $title = "";
    private $support = array();
    private $options_menu = array();
    
    private $models = array();
    private $taxonomies = array();
    

    // Assigning the values
    public function __construct($n, $t) {
    	$this->name = $n;
    	$this->title = $t;
        $this->meta_title = "Informations de la page " . $this->name;

        if($n !== 'post' && $n !== 'product'){
            add_action( 'init', array( $this, 'createPostType' ));
        }
        add_action( 'init', array( $this, 'createTaxonomies' ));             
        add_action("add_meta_boxes", array( $this, 'addMetaBoxes' ));            
        add_action("save_post", array( $this, 'saveMetaBoxe' ));    
        add_action( 'wp_ajax_get_all_data_'.$n, array( $this, 'getAllDataByAjax' ) );
        add_action( 'wp_ajax_nopriv_get_all_data_'.$n, array( $this, 'getAllDataByAjax' ) );       
        add_action( 'wp_ajax_get_multiple_all_data_'.$n, array( $this, 'getAllDataByAjaxMultiple' ) );
        add_action( 'wp_ajax_nopriv_get_multiple_all_data_'.$n, array( $this, 'getAllDataByAjaxMultiple' ) );            
    }    
    
    // Register the post type
    function createPostType(){
        pn_create_post_type($this->name, $this->title, $this->support);        
    }
    
    // Register the post type
    function createTaxonomies(){
        foreach($this->taxonomies as $tax){
            pn_create_taxonomy($tax["name"], $tax["label"], $this->name);    
        }       
    }
        
    
    // Add model
    function support($s){
    	$this->support = $s;
    }    
    
    
    /**
     * 
     * Add a new taxonmy on the array to register
     * 
     * @param type $n  name
     * @param type $l   label
     */
    function addTaxonomy($n, $l){
    	$this->taxonomies[] = array("name" => $n, "label" => $l);
    }        
    
    // Add model
    function set($name, $label, $type="text", $options=array()){
        $this->models[$name] = array("label" =>$label, "type" => $type, "options" => $options);
    }

    // Add basic meta boxe
    function addMetaBoxes(){
        $id = "metaPostType" . $this->name;
        $titre = $this->meta_title;
        
        add_meta_box($id, $titre, array( $this, 'displayMetaBoxe' ), $this->name);
    }    
    
    // Display the meta boxes
    function displayMetaBoxe(){
        global $post;      
        $originalID = pn_find_original_id($this->name);      
     
        ?>    
        <table class='tableMeta' style='width:100%'>   
        <?php
        
        foreach($this->models as $modelName => $model){            
            $data = pn_get_model_raw_data("posttype", $modelName, $model, $originalID);            
            pn_select_input_template($modelName, $model, $data);                                     
        }
        
        ?>        
        </table>
         <input type="hidden" name="_safeWpMeta" value="0" />
        <?php          
    }
    
    // Save the meta boxes
    function saveMetaBoxe(){

        if(isset($_POST['post_type']) && $_POST['post_type'] == $this->name && isset($_POST["_safeWpMeta"])){          
            $id = $_POST['post_ID'];  
            
            foreach($this->models as $modelName => $model){
                                
                pn_select_save_method($id, $this->name, $modelName, $model);                                                
                
            }                     
                
        }          
        
    }
    
    /**
     * 
     * @return type Array of all Data
     */
    function getAllPosts(){
        $allPostsMeta = array();
        
        
        $allPosts = get_posts(array("post_type"=>$this->name, "posts_per_page"=>-1, "suppress_filters"=>false,	'orderby' => 'title','order' => 'ASC',));
        foreach($allPosts as $curPost){
            $originalID = icl_object_id( $curPost->ID, $this->name, true, "fr" );        
            
            $curPostData = array();
                        
            $curPostData["ID"] = $curPost->ID;
            $curPostData["title"] = $curPost->post_title;
            $curPostData["content"] = $curPost->post_content;
            
            foreach($this->models as $n => $model){            
                //Return one image
                if($this->models[$n]["type"] == "image"){
                    $imgID = get_post_meta($curPost->ID, $n , true); 
                    //$size = ($option != "") ? $option : "large";
                    $size = "large";
                    
                    
                    $curPostData[$n] = pn_get_image_url($imgID, $size);                               
                }
                //Return array of image
                else if($this->models[$n]["type"] == "gallery"){
                    $imgsIDs = get_post_meta($curPost->ID, $n , true); 
                    $imgsIDs = explode(",", $imgsIDs);
                    $imgsUrls = array();
                    $option="";     //to be completed
                    $size = ($option != "") ? $option : "large";

                    foreach($imgsIDs as $img){
                        $imgsUrls[] = pn_get_image_url($img, $size);
                    }

                    $curPostData[$n] = $imgsUrls;              
                    
                }
                else{
                    if(isset($this->models[$n]["options"]["allLang"])){
                        $curPostData[$n] = get_post_meta($originalID, $n , true);                                      
                    }else{
                        $curPostData[$n] = get_post_meta($curPost->ID, $n , true);                                      
                    }
                }                                  
            }            
            
            
            
            $allPostsMeta[] = (object) $curPostData;
        }
        
        return  $allPostsMeta;
       
    }
    
    
    /**
     * Return all meta data in json for ajax request
     */
    function getAllDataByAjax(){
        if(isset($_POST['id']) && is_numeric($_POST['id'])){
            $jsonData = array();
            $pnPost = get_post($_POST['id']);
            $jsonData["title"] = $pnPost->post_title;
            $jsonData["content"] = $pnPost->post_content;

            foreach($this->models as $modelName => $model){  
                //Save data depending on the language
                if(isset($model["options"]["allLang"])){
                    $id = icl_object_id( $_POST['id'], $this->name, true, "fr" );                           
                }else{
                    $id = $_POST['id'];                
                }                  
                $jsonData[$modelName] = pn_get_model_data($id, $modelName, $model);
            }        
            
            echo json_encode($jsonData);

        }
        die();
    }
  
    /**
     * Return all meta data in json for ajax request for multiple post IDS
     */
    function getAllDataByAjaxMultiple(){
        if(isset($_POST['ids']) && is_array($_POST['ids'])){
            
            $jsonAllPostsData = array();            
            
            foreach($_POST['ids'] as $id){
                if(is_numeric($id)){

                    $jsonData = array();            
                    
                    $pnPost = get_post($id);
                    $jsonData["title"] = $pnPost->post_title;
                    $jsonData["content"] = $pnPost->post_content;

                    foreach($this->models as $modelName => $model){  
                        //Save data depending on the language
                        if(isset($model["options"]["allLang"])){
                            $id = icl_object_id( $id, $this->name, true, "fr" );                           
                        }else{
                            $id = $id;                
                        }                  
                        $jsonData[$modelName] = pn_get_model_data($id, $modelName, $model);
                    }                                                                 
                }                
                $jsonAllPostsData[] =     $jsonData;            
            }        
            
            echo json_encode($jsonAllPostsData);            
            
        }        
        
        die();
    }

    /**
     * Change meta boxe title text
     * @param [String] $text [description]
     */
    function setTitle($text) {
        $this->meta_title = $text;
    }



    /**
     * Add custom post type options to menu
     */
    function addCustomOptions($options_menu) {
        $this->options_menu = $options_menu;

        if ($this->options_menu['label']) {
            $this->options_menu['models'] = array();

            add_action('admin_menu', array($this, 'addCustomOptionsMenu'));
        }
    }

    function addCustomOptionsMenu() {
        add_submenu_page('edit.php?post_type=' . $this->name, $this->name, $this->options_menu['label'], 'manage_options', $this->name . '_options', array($this, "displayOptionsMetaBox"));
    }

    /**
     * Display custom post type options meta box
     */
    function displayOptionsMetaBox(){
        if (isset($_POST["pnOptionSubmit"])) {
            $this->saveOptionsMetaBox();
        }

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $actual_link = $protocol."$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        ?>

        <div class="wrap">
            <?php if ($this->options_menu['title']) : ?>
                <h1 style="margin-bottom: 30px;"><?php echo $this->options_menu['title']; ?></h1>
            <?php endif; ?>
            <form action="<?php echo $actual_link; ?>" method="POST">
                <table class='tableMeta' style='width:100%; margin-bottom: 30px;'>
                    <?php

                    foreach($this->options_menu['models'] as $modelName => $model){
                        $data = pn_get_model_raw_data("option", $modelName, $model);
                        pn_select_input_template($modelName, $model, $data);
                    }

                    ?>
                </table>
                <input class="button-primary" type="submit" name="pnOptionSubmit" value="Enregistrer">
            </form>
            <input type="hidden" name="_safeWpMeta" value="0" />
        </div>
        <?php
    }

    /**
     * Save custom post type options meta box
     */
    function saveOptionsMetaBox() {
        foreach($this->options_menu['models'] as $modelName => $model) {
            if ($model["type"] == "title") {
                continue;
            }

            $name = $modelName;
            if (isset($model["options"]["multiLang"])) {
                $name = $name . "_" .ICL_LANGUAGE_CODE;
            }
            $data = isset($_POST[$modelName]) ? $_POST[$modelName] : "";

            update_option($name, $data);
        }
    }

    function setCustomOptions($name, $label, $type="text", $options=array()){
        $this->options_menu['models'][$this->name . '_' . $name] = array('label' =>$label, 'type' => $type, 'options' => $options);
    }
}

?>