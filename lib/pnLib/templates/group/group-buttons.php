<div class="group-btns <?php echo ' ' . $button_options['class']; ?>">
    <button class="group-btn" type="button" data-js="<?php echo $button_options['data-js-add']; ?>"
            data-template="#<?php echo $button_options['id']; ?>"
            data-container="#<?php echo $containerID; ?>">
        <span class="glyphicon glyphicon-plus"></span>
        <span class="text">Ajouter un <?php echo $button_options['text']; ?></span>
    </button>

    <button class="group-btn" type="button" data-toggle-all="open"
            data-container="#<?php echo $containerID; ?>" data-type="<?php echo $button_options['class']; ?>">
        <span class="glyphicon glyphicon-resize-full"></span>
        <span class="text">Ouvrir tous les <?php echo $button_options['text']; ?>s</span>
    </button>

    <button class="group-btn" type="button" data-toggle-all="close"
            data-container="#<?php echo $containerID; ?>" data-type="<?php echo $button_options['class']; ?>">
        <span class="glyphicon glyphicon-resize-small"></span>
        <span class="text">Fermer tous les <?php echo $button_options['text']; ?>s</span>
    </button>
</div>