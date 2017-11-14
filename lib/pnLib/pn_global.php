<?php
/**
 * Create meta box for a template page
 */
class PnGlobal {
 
    public $models = array();

    // Assigning the values
    public function __construct() {
        $this->title = '';

        add_action('add_meta_boxes', array( $this, 'addMetaBoxe' ));
        add_action('save_post', array( $this, 'saveMetaBoxe' ));
    }

    // Register the meta box function
    function addMetaBoxe(){
        global $post;

        $id = 'metaPageGlobal';
        $title = $this->title;
        add_meta_box($id, $title, array( $this, 'displayMetaBoxe' ), 'page');
    }

    // Display the meta boxes
    function displayMetaBoxe() {
        global $post;

        echo "<table class='tableMeta' style='width:100%'>";

        foreach($this->models as $modelName => $model){
            $data = pn_get_model_raw_data("posttype", $modelName, $model, $post->id);
            pn_select_input_template($modelName, $model, $data);
        }

        echo "</table><input type='hidden' name='_safeWpMeta' value='0' />";
    }
    
    // Save the meta boxes
    function saveMetaBoxe() {
        if (isset($_POST['post_type']) && $_POST['post_type'] == 'page' && isset($_POST['_safeWpMeta'])) {
            $id = $_POST['post_ID'];

            foreach($this->models as $modelName => $model) {
                pn_select_save_method($id, 'page', $modelName, $model);
            }
        }
    }

    /**
     * Change meta boxe title text
     * @param [String] $text
     */
    function setTitle($text) {
        $this->title = $text;
    }

    // Add model
    function set($name, $label, $type='text', $options=array()){
        $this->models[$name] = array('label' =>$label, 'type' => $type, 'options' => $options);
    }
    
    // Get model
    function get($n, $option=''){
        //Si on est pas dans le tempalte page, on trouve le id 
        global $post;
        $id = $post->ID;
        if(get_post_meta($id, '_wp_page_template', true) !== $this->templateName){
            $id = pn_get_id_from_template($this->templateName);
        }

        if(isset($this->models[$n])){
            //Return one image
            if($this->models[$n]['type'] == 'image'){
                $imgID = get_post_meta($id, $n , true); 
                $size = ($option != '') ? $option : 'large';
                return pn_get_image_url($imgID, $size);
            }
            //Return array of image
            else if($this->models[$n]['type'] == 'gallery'){
                $imgsIDs = get_post_meta($id, $n , true); 
                $imgsIDs = explode(',', $imgsIDs);
                $imgsUrls = array();
                $size = ($option != '') ? $option : 'large';
                
                foreach($imgsIDs as $img){
                    $imgsUrls[] = pn_get_image_url($img, $size);
                }
                
                return $imgsUrls;
            }
            else if($this->models[$n]['type'] == 'pdf'){
                return wp_get_attachment_url(get_post_meta($id, $n , true)) ;
            }
            else{
                return get_post_meta($id, $n , true);
            }
        }else{
            return null;
        }
    }
  
}