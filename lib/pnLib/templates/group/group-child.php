<table class="group-item is-child js-group-item" data-js="pn-group-child">
    <?php
        $header_options = array(
            'class' => 'is-child',
            'text' => 'Sous-item'
        );
        include(locate_template('lib/pnlib/templates/group/group-header.php'));
    ?>

    <tr class="group-toggle-row">
        <td colspan="2">
            <div class="group-toggle-wrap is-closed is-child" data-js="toggle-group-wrap">
                <table class="group-content is-child">
                    <?php
                    foreach($modelsChildren as $model){
                        $childrenFieldName[] =  $model["name"];
                        $name = $modelName . "_" . $model["name"] . "[]";
                        $fieldData = isset($child[$model["name"]]) ? $child[$model["name"]] : "";
                       
                        pn_select_input_template($name, $model, $fieldData);
                    }
                    ?>
                </table>
            </div>
        </td>
    </tr>
</table>