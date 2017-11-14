<table class="group-item js-group-item" <?php if ($is_parent) : ?>data-js="pn-group-parent"<?php endif; ?>>
    <?php
        $header_options = array(
            'class' => 'is-parent',
            'text' => 'Item'
        );
        include(locate_template('lib/pnlib/templates/group/group-header.php'));
    ?>

    <tr class="group-toggle-row">
        <td colspan="2">
            <div class="group-toggle-wrap is-closed is-parent" data-js="toggle-group-wrap">
                <table class="group-content">
                    <?php
                    if (isset($group) && is_array($group)) {
                        foreach($modelsParent as $model){                         //For each Field
                            $name = $modelName . "_" . $model["name"] . "[]";
                            $fieldData = isset($group[$model["name"]]) ? $group[$model["name"]] : "";
                            pn_select_input_template($name, $model, $fieldData);
                        }
                    } else {
                        foreach($modelsParent as $model){
                            $parentFieldName[] =  $model["name"];
                            $name = $modelName . "_" . $model["name"] . "[]";
                            pn_select_input_template($name, $model, "");
                        }
                    }
                   ?>

                    <?php if ($is_parent) : ?>
                        <tr>
                            <td style="width: 100px;"></td>
                            <td>
                                <div class="pn-group-children-container" data-js="pn-group-children-container">
                                    <?php
                                        //For each children
                                        if(isset($group["children"]) && count($group["children"])){
                                            foreach($group["children"] as $child){
                                                include(locate_template('lib/pnlib/templates/group/group-child.php'));
                                            }
                                        }
                                    ?>
                                </div>

                                <?php
                                    $button_options = array(
                                        'class' => 'is-child',
                                        'text' => 'sous-item',
                                        'data-js-add' => 'add-group-line-children',
                                        'id' => $templateIdChild
                                    );
                                    include(locate_template('lib/pnlib/templates/group/group-buttons.php'));
                                ?>

                            </td>
                        </tr>
                    <?php endif ?>
                </table>
            </div>
        </td>
    </tr>

</table>