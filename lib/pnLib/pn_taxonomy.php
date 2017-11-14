<?php
/**
 * Create meta box for a taxonomy
 */
class PnTaxonomy {
 
    public $name = "";
    public $label = "";
    public $models = array();

    // Assigning the values

    public function __construct($name,  $createtax = false, $objects=array()) {
    	$this->name = $name;
        
        if($createtax){
            add_action( 'init', array( $this, 'createTaxonomies' ));
        }
        add_action( $this->name . '_edit_form_fields', array( $this, 'displayMetaBoxe' ), 10, 2 );
        add_action( 'edited_' . $this->name, array( $this, 'save_tax' ), 10, 2 );
    }    
    
    // Add model
    function set($name, $label, $type="text", $options=array()){
        $this->models[$name] = array("label" =>$label, "type" => $type, "options" => $options);
    }             
    
    // Display the meta boxes
    function displayMetaBoxe($tag){
        $t_id = $tag->term_id; // Get the ID of the term you're editing  
        
        foreach($this->models as $modelName => $model){
            $data = pn_get_model_raw_data("taxonomy", $modelName, $model, $t_id);
            pn_select_input_template($modelName, $model, $data);
        }
    }
    
    // Save the meta boxes
    function save_tax($id){

        foreach($this->models as $modelName => $model){
            if($model["type"] == "title"){
                continue;
            }
            
            // $name = $modelName . "_" . $id;
            if(isset($_POST[$modelName])){
                update_term_meta($id, $modelName, $_POST[$modelName]);
            }
        }

    }
  
}