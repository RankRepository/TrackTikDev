<tr class="group-header <?php echo $header_options['class']; ?>">
    <td class="js-group-toggle-zone" colspan="2">
        <span class="glyphicon glyphicon-sort js-sortable-handle"></span><?php echo $header_options['text']; ?>
        <span class="header-item-title js-header-item-title"></span>
        <div class="group-btn-wrap">
            <button class="glyphicon glyphicon-menu-up group-header-btn btn-minus is-closed <?php echo $header_options['class']; ?>" data-js="toggle-group-btn" type="button"></button>
            <button class="glyphicon glyphicon-trash group-header-btn btn-remove" data-js="remove-group-line" type="button"></button>
        </div>
    </td>
</tr>