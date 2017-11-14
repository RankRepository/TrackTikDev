<?php
/**
 * Create meta box for a template page
 */
class PnOption {
 
    public $name = "";
    public $label = "";
    public $models = array();
    public $idmenu = "";
    public $templates = array();

    // Assigning the values
    /**
     * 
     * @param type $n name for id
     * @param type $l label to display
     */
    public function __construct($n, $l, $i=5) {
        $this->title = '';
    	$this->name = $n;
    	$this->label = $l;
    	$this->idmenu = $i;

        // Templates list
        $this->templates = array();
        
        add_action("admin_menu", array( $this, 'addMenuPage' ));
    }
    
    // Register the meta box function
    function addMenuPage(){
        add_menu_page( $this->name, $this->label, 'manage_options', $this->name.'_option_page', array($this, "displayMetaBoxe"), 'dashicons-admin-generic', $this->idmenu );        
    }
    
    // Add model
    function set($name, $label, $type="text", $options=array()){
        $this->models[$name] = array("label" =>$label, "type" => $type, "options" => $options);
    }             
    
    // Display the meta boxes
    function displayMetaBoxe(){
        if(isset($_POST["pnOptionSubmit"])){
            $this->saveMetaBoxe();
        }
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $actual_link = $protocol."$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        ?>
        <div class="wrap">
            <?php if ($this->title) : ?>
                <h1 style="margin-bottom: 30px;"><?php echo $this->title; ?></h1>
            <?php endif; ?>
            <form class="js-option-form" action="<?php echo $actual_link; ?>" method="POST">

                <table class='tableMeta' style='width: 100%; margin-bottom: 30px;'>
                <?php
                
                foreach($this->models as $modelName => $model){
                    $data = pn_get_model_raw_data("option", $modelName, $model);
                    pn_select_input_template($modelName, $model, $data);
                }

                ?>
                </table>
                <input class="button-primary" type="submit" name="pnOptionSubmit" value="Enregistrer">
            </form>
             <input type="hidden" name="_safeWpMeta" value="0" />
        </div>

        <!-- Templates list -->
        <?php if (!empty($this->templates['list'])) {
            include(locate_template('lib/pnlib/templates/template-list.php'));
        }
    }
    
    // Save the meta boxes
    function saveMetaBoxe(){
        foreach($this->models as $modelName => $model){
            if($model["type"] == "title"){
                continue;
            }

            pn_select_save_method(null, 'option', $modelName, $model);
        }
    }

    /**
     * Change meta boxe title text
     * @param [String] $text [description]
     */
    function setTitle($text) {
        $this->title = $text;
    }

    /**
     * Save template information for use when meta box is displayed
     * @param [String] $title
     * @param [Array] $array
     */
    function setTemplateList($title = '', $list = array(), $grid_class = 'col-sm-3') {
        $this->templates['list'] = $list;
        $this->templates['title'] = $title;
        $this->templates['grid_class'] = $grid_class;
    }

}