<?php


class PnField {
 
    public $name = true;
    public $label = true;
    public $type = true;
    public $options = true;

    // Assigning the values
    /**
     * 
     * @param type $name Name
     * @param type $label   Label   
     * @param type $type Type
     */
    public function __construct($name, $label, $type="text", $options=array()) {
    	$this->name = $name;
    	$this->label = $label;
    	$this->type = $type;
    	$this->options = $options;
        
    }
    
    
}

function pn_field_format($name, $label, $type="text", $options=array()){
    return array("name"=>$name, "label" =>$label, "type" => $type, "options" => $options);
   
}