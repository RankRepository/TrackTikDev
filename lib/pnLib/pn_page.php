<?php
/**
 * Create meta box for a template page
 */
class PnPage {
 
    public $name = "";
    public $templateName = "";
    public $functionName = "";
    public $models = array();
    public $haveEditor = true;

    // Assigning the values
    public function __construct($n, $t, $f="") {
    	$this->name = $n;
    	$this->templateName = $t;
        $this->functionName = $f;
        $this->title = "Informations de la page " . $this->name;
        
        
        add_action("add_meta_boxes", array( $this, 'addMetaBoxe' ));  
        add_action("save_post", array( $this, 'saveMetaBoxe' ));   
        add_action("admin_head", array( $this, 'init_specification' ));        
        
    }    
    
    //Remove Wordpress's Editor
    public function removeEditor(){
        $this->haveEditor = false;        
    }
    
    //Fonction spécifique au init de Wordpress
    function init_specification(){
        global $post;
        if(!is_object($post)){
           return; 
        }
        
        $template_file = get_post_meta($post->ID,'_wp_page_template',TRUE);
        if ($template_file == $this->templateName) {
            if(!$this->haveEditor){
                remove_post_type_support('page', 'editor');            
            }
        }                   
    }
    
    // Register the meta box function
    function addMetaBoxe(){
        global $post;
        $template_file = get_post_meta($post->ID,'_wp_page_template',TRUE);
        if ($template_file == $this->templateName) {
            $id = "metaPage" . $this->name;
            $title = $this->title;
            add_meta_box($id, $title, array( $this, 'displayMetaBoxe' ), "page");
        }            
    }
    
    
    // Add model
    function set($name, $label, $type="text", $options=array()){
        $this->models[$name] = array("label" =>$label, "type" => $type, "options" => $options);
    }    
    
    // Get model
    function get($n, $option=""){
        //Si on est pas dans le tempalte page, on trouve le id 
        global $post;
        $id = $post->ID;
        if(get_post_meta($id, "_wp_page_template", true) !== $this->templateName){
            $id = pn_get_id_from_template($this->templateName);
        }

        if(isset($this->models[$n])){
            //Return one image
            if($this->models[$n]["type"] == "image"){
                $imgID = get_post_meta($id, $n , true); 
                $size = ($option != "") ? $option : "large";
                return pn_get_image_url($imgID, $size);
            }
            //Return array of image
            else if($this->models[$n]["type"] == "gallery"){
                $imgsIDs = get_post_meta($id, $n , true); 
                $imgsIDs = explode(",", $imgsIDs);
                $imgsUrls = array();
                $size = ($option != "") ? $option : "large";
                
                foreach($imgsIDs as $img){
                    $imgsUrls[] = pn_get_image_url($img, $size);
                }
                
                return $imgsUrls;
            }
            else if($this->models[$n]["type"] == "pdf"){
                return wp_get_attachment_url(get_post_meta($id, $n , true)) ;                

            }
            else{
                return get_post_meta($id, $n , true);                
            }
        }else{
            return null;
        }
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

        if(isset($_POST['post_type']) && $_POST['post_type'] == 'page' && isset($_POST["_safeWpMeta"])){          

            $template_file = get_post_meta($_POST['post_ID'],'_wp_page_template',TRUE);
            if ($template_file == $this->templateName) {
                $id = $_POST['post_ID'];  
                                
                foreach($this->models as $modelName => $model){
                    pn_select_save_method($id, "page", $modelName, $model);                
                }                     
                
            }                  
        }          
        
    }

    /**
     * Change meta boxe title text
     * @param [String] $text [description]
     */
    function setTitle($text) {
        $this->title = $text;
    }
  
}