//
//  FONCTION POUR FIELD GROUP DES METAS
//

jQuery(document).ready(function($){
  var $body = $('body');

  // Toggle behavior
  var $btn = $('.js-group-toggle-zone');
  if ($btn.length > 0) {
    $(document).on('click', '.js-group-toggle-zone', function() {
      var $this = $(this),
          $parent = $this.parents('.js-group-item:eq(0)'),
          $wrap = $parent.find('[data-js="toggle-group-wrap"]').first();

      // Parent
      $parent.toggleClass('is-closed');

      // Button
      $this.find('[data-js="toggle-group-btn"]').toggleClass('is-closed');

      // Content
      $wrap.toggleClass('is-closed');
    });
  }

  /**
   * Toggle all items from group
   * If buttons are for parent, only toggle parents
   * IF buttons are for childent, only toggle children d
   */
  $body.on('click', '[data-toggle-all]', function() {
    var $this = $(this),
        type = $(this).data('type'),
        $container = $($this.data('container')),
        $items = $container.find('[data-js="toggle-group-btn"].' + type + ', [data-js="toggle-group-wrap"].' + type);

    if ($this.data('toggle-all') === 'open') {
      $items.removeClass('is-closed');
    } else {
      $items.addClass('is-closed');
    }
  });

  // Init dragguable items
  $('.pn-group-container, .pn-group-children-container').sortable({
    handle: ".js-sortable-handle"
  });

  // Optionaly show title inside item header
  $itemTitlesRow = $('.js-is-group-title');
  $itemTitlesRow.each(function(index, el) {
    var $this = $(this),
        value = $this.find('input').val(),
        $title = $this.parents('.js-group-item:first').find('.js-header-item-title:first');

    if (value !== '') {
      $title.text(value);
    }
  });

  // Update title if text has changed inside input
  $body.on('change', '.js-is-group-title input', function() {
    var $this = $(this),
        value = $this.val(),
        $title = $this.parents('.js-group-item:first').find('.js-header-item-title:first');

    if (value !== '') {
      $title.text(value);
    } else {
      $title.text('');
    }
  });


  // ADD BLOCK
  $body.on('click', '[data-js="add-group-line"]', function(){
    var templateId = $(this).data('template');
    var containerId = $(this).data('container');

    // Open block on add
    $(containerId).append($(templateId).html().replace(new RegExp('is-closed', 'g'), ''));
  });
  
  // ADD BLOCK CHILDREN
  $body.on('click', '[data-js="add-group-line-children"]', function(){
    var templateId = $(this).data('template');
    var tableParent = $(this).closest('table');
    var childrenContainer = tableParent.find('[data-js="pn-group-children-container"]');
    //var templateId = $(this).data('template');

    $(templateId).find('.is-closed').removeClass('is-closed');

    // Open block on add
    childrenContainer.append($(templateId).html().replace(new RegExp('is-closed', 'g'), ''));
  });

  //Before saving, arrange the children data
  $('form#post, .js-option-form').submit(function(e){
    //e.preventDefault();
    
    //Check each Parent Group model type
    $('[data-js="pn-group-container"]').each(function(){
      
      var groupData = [];
      var parentModel = $(this).data('parent-model');
      var childModel = $(this).data('child-model');
      var modelName = $(this).data('name');
      
      //Check Each Parent Block
      $(this).find('[data-js="pn-group-parent"]').each(function(){
        var parentData = new Object();
        parentData.children = [];
        //Parse each current Parent Field
        for(var i=0; i<parentModel.length; i++){
          var inputName = modelName + '_' + parentModel[i] + '[]';
          var value = $(this).find('[name="' + inputName + '"]:eq(0)').val();

          parentData[parentModel[i]] = value;
        }
        
        //Check Each Child Block
        $(this).find('[data-js="pn-group-child"]').each(function(){
          var childData = new Object(); 
          for(var i=0; i<childModel.length; i++){
            var inputName = modelName + '_' + childModel[i] + '[]';
            var value = $(this).find('[name="' + inputName + '"]:eq(0)').val();

            childData[childModel[i]] = value;
          }
          parentData.children.push( childData);
        });

        groupData.push(parentData);
      });

      $('input[name="' + modelName + '"]').val(JSON.stringify(groupData));

    });
  });

  //REMOVE BLOCK
  $body.on('click', '[data-js="remove-group-line"]', function(){
    if(confirm('Voulez-vous vraiment supprimer cet élément?')){
      var tableParent = $(this).closest('table');
      tableParent.remove();
    }
  });
});
