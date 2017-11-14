<tr class="<?php echo $trClass; ?>">
    <td style="width: 100px"><?php echo $title; ?>&nbsp;:</td>
    <td>
        <?php if ($is_parent) : ?>
            <div class="pn-group-container" id="<?php echo $containerID; ?>"
                 data-js="pn-group-container" 
                 data-name="<?php echo $modelName; ?>"
                 data-parent-model="<?php echo htmlentities(json_encode($parentFieldName), ENT_QUOTES); ?>"
                 data-child-model="<?php echo htmlentities(json_encode($childrenFieldName), ENT_QUOTES); ?>">
        <?php else: ?>
            <div class="pn-group-container" id="<?php echo $containerID; ?>">
        <?php endif; ?>

        <?php
            if(is_array($data) && count($data)) {
                foreach ($data as $group) {                                //Foreach Block
                    include(locate_template('lib/pnlib/templates/group/group.php'));
                }
            } else {
                echo $template;
            }
        ?>
        </div>

        <?php
            $button_options = array(
                'class' => 'is-parent',
                'text' => 'item',
                'data-js-add' => 'add-group-line',
                'id' => $templateId
            );
            include(locate_template('lib/pnlib/templates/group/group-buttons.php'));
        ?>

        <?php if ($is_parent) : ?>
            <input type="hidden" name="<?php echo $modelName; ?>" value="">
        <?php endif; ?>
    </td>
</tr>