/*!
  jQuery wpcolorpicker plugin
  @name wpcolorpicker
  @author Phil BG
  @version 1
  @date 4/12/2014
  @category jQuery Plugin
  @copyright (c) 2014 no name
  @usage
*/
(function( $ ) {
 
    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {
        $('.color-field').wpColorPicker();
    });
     
})( jQuery ); 
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

/*!
  jQuery wpmediaimage plugin
  @name wpmediaimage
  @author Hugo Lach
  @version 1
  @date 4/12/2014
  @category jQuery Plugin
  @copyright (c) 2014 no name
  @usage 
*/
(function($){
    $.fn.wpmediaimage = function(update_id){
        return this.each(function() {
            var link = $( this );            

            var parentContainer = link.closest("[data-js='wp-media-container']");
            this.previewContainer = parentContainer.find("div.galerieImagesVariations");
            this.input = parentContainer.find("input");
                        
            $(this).attr("data-init-mediagal", "init");
                        
            //
            //FUNC THAT RETURN THE WP MEDIA GALLERY FRAME
            //
            this.frame= function(){
                if ( this._frame ) {
                    return this._frame;
                }
                //CREATE THE FRAME FOR UPLOADING
                    this._frame = wp.media({
                        id:         'my-frame',                
                      //  state:      'gallery-edit',
                        title:      wp.media.view.l10n.editGalleryTitle,                     
                        multiple:   false
                       // selection:  selection
                    });                                      
      
                //LOAD THE SELECTED IMAGE
                var leframe = this._frame;
                var me = this;                
                this._frame.on('open', function(){
                    var selection = leframe.state().get('selection');                    
                    var selected = me.input.val();
                    if (selected) {
                        selection.add(wp.media.attachment(selected));
                    }
                });                

                //SAVE THE GALLERY IDS ON INPUT FIELD AND SHOW TUMBNAILS
                this._frame.on( 'close',  function() {
                    var selection = leframe.state().get('selection');
                    
                    // no selection
                    if (!selection) {
                        return;
                    }
                    
                    // iterate through selected elements                    
                    selection.each(function(attachment) {
                        var url = attachment.attributes.url;                        
                        me.input.val(attachment.attributes.id);  
                        console.log(attachment);
                        console.log(me.input);
                        console.log(me.input.val());
                        try{
                            thumbUrl = attachment.attributes.sizes.thumbnail.url;                                                        
                        }catch(e){
                            thumbUrl = attachment.attributes.url;                              
                        }                        
                        
                        var fileExt = thumbUrl.split('.').pop();   
                        
                        if(fileExt == "pdf"){
                            me.previewContainer.html("<p>" + attachment.attributes.filename + "</p>");                                                              
                        }
                        else if(fileExt == "mp4"){
                            me.previewContainer.html("<img src='" + attachment.attributes.icon + "'><p>" + attachment.attributes.filename + "</p>");                                                              
                        }
                        else{
                            me.previewContainer.html("<img src='" + thumbUrl + "'>");    
                            //FOR WOOCOMERCE ALLOW BUTTON TO SAVE
                             me.previewContainer.closest( '.woocommerce_variation' ) .addClass( 'variation-needs-update' );                            
                            jQuery( 'button.cancel-variation-changes, button.save-variation-changes' ).removeAttr( 'disabled' );
                            jQuery( '#variable_product_options' ).trigger( 'woocommerce_variations_input_changed' );            
                        }
                        
                        
                    });                                        
                });        

                return this._frame;
            };
            

            link.bind("click.wpmediagallery", function(){
                this.frame().open();
            });                        
        });        
    };
} (jQuery));
//  END WORDPRES MEDIA UPLOADER IMAGE
//  


/*!
  jQuery multi pdf
  @name wpmediaimage
  @author Hugo Lach
  @version 1
  @date 4/12/2014
  @category jQuery Plugin
  @copyright (c) 2014 no name
  @usage 
*/
(function($){
    $.fn.wpmultipdf = function(update_id){
        return this.each(function() {
            var link = $( this );            
            this.idDiv = link.attr("data-divImagesId");           //ID du div pour afficher les thumbnails
            this.idInput = link.attr("data-inputImagesId");       //ID de l'input hidden qui a les ID      
            this.leID  = jQuery(this.idInput).val();                 //Les IDs des photos            
                        
            //
            //FUNC THAT RETURN THE WP MEDIA GALLERY FRAME
            //
            this.frame= function(){
                if ( this._frame ) {
                    return this._frame;
                }
                //CREATE THE FRAME FOR UPLOADING
                    this._frame = wp.media({
                        id:         'my-frame',                
                      //  state:      'gallery-edit',
                        title:      wp.media.view.l10n.editGalleryTitle,                     
                        multiple:   false
                       // selection:  selection
                    });                                      
      
                //LOAD THE SELECTED IMAGE
                var leframe = this._frame;
                var me = this;                
                this._frame.on('open', function(){
                    var selection = leframe.state().get('selection');                    
                    var selected = jQuery(me.idInput).val();
                    if (selected) {
                        selection.add(wp.media.attachment(selected));
                    }
                });                

                //SAVE THE GALLERY IDS ON INPUT FIELD AND SHOW TUMBNAILS
                this._frame.on( 'close',  function() {
                    var selection = leframe.state().get('selection');
                    
                    // no selection
                    if (!selection) {
                        return;
                    }
                    
                    // iterate through selected elements                    
                    selection.each(function(attachment) {
                        var url = attachment.attributes.url;                        
                        //jQuery(me.idInput).val(attachment.attributes.id);  
                        //console.log(attachment);
                        try{
                            thumbUrl = attachment.attributes.sizes.thumbnail.url;                                                        
                        }catch(e){
                            thumbUrl = attachment.attributes.url;                              
                        }                        
                        
                        var fileExt = thumbUrl.split('.').pop();   
                        if(fileExt == "pdf"){
                            jQuery(me.idDiv).html("<p>" + attachment.attributes.filename + "</p>");                                                              
                        }else{
                            jQuery(me.idDiv).html("<img src='" + thumbUrl + "'>");                                  
                        }
                    });                                        
                });        

                return this._frame;
            };
            

            link.bind("click.wpmediagallery", function(){
                this.frame().open();
            });                        
        });        
    };
} (jQuery));
//  END WORDPRES MEDIA UPLOADER IMAGE
//  



/*!
  jQuery WPMEDIAGALLERY plugin
  @name jquery.WPMEDIAGALLERY.js
  @author Hugo Lach
  @version 1
  @date 4/12/2014
  @category jQuery Plugin
  @copyright (c) 2014 no name
  @usage must be used with these html-data -data-divImagesId  -data-inputImagesId -data-ids  
*/
(function($){
    $.fn.wpmediagallery = function(update_id){
        return this.each(function() {
            var link = $( this );            

            var parentContainer = link.closest("[data-js='wp-media-container']");
            this.previewContainer = parentContainer.find("div.galerieImagesVariations");
            this.input = parentContainer.find("input");                     
            this.lesids  = this.input.val();                 //Les IDs des photos            

            $(this).attr("data-init-mediagal", "init");
            
            //
            //FUNC THAT RETRIEVE AND LOAD THE IMAGE's SELECTION FOR GALLERY
            //
            this.selectImages = function(){
                var galleryShortcode = "[gallery ids='" + this.lesids + "']";
                var shortcode = wp.shortcode.next( 'gallery', galleryShortcode ),
                    defaultPostId = wp.media.gallery.defaults.id,
                    attachments, selection;


                // Bail if we didn't match the shortcode or all of the content.
                if ( ! shortcode ){
                    return;
                }
                // Ignore the rest of the match object.
                shortcode = shortcode.shortcode;

                if ( _.isUndefined( shortcode.get('id') ) && ! _.isUndefined( defaultPostId ) ){
                    shortcode.set( 'id', defaultPostId );
                }

                attachments = wp.media.gallery.attachments( shortcode );
                selection = new wp.media.model.Selection( attachments.models, {
                    props:    attachments.props.toJSON(),
                    multiple: true
                });

                selection.gallery = attachments.gallery;

                // Fetch the query's attachments, and then break ties from the
                // query to allow for sorting.
                selection.more().done( function() {
                    // Break ties with the query.
                    selection.props.set({ query: false });
                    selection.unmirror();
                    selection.props.unset('orderby');
                });

                return selection;                                
            };
            
            //
            //FUNC THAT RETURN THE WP MEDIA GALLERY FRAME
            //
            this.frame= function(){
                if ( this._frame ){
                    return this._frame;
                }
                //CREATE THE FRAME FOR UPLOADING
                var selection = this.selectImages();
               // console.log(selection);
                if(this.lesids.length === 0){                  
                    this._frame = wp.media({
                        
                        id:         'my-frame',                
                        frame:      'post',
                        state:      'gallery-edit',
                        title:      wp.media.view.l10n.editGalleryTitle,
                        editing:    true,
                        multiple:   true
                    });                      
                }else{
                    this._frame = wp.media({
                        id:         'my-frame',                
                        frame:      'post',
                        state:      'gallery-edit',
                        title:      wp.media.view.l10n.editGalleryTitle,
                        editing:    true,
                        multiple:   true,
                        selection:  selection
                    });                      
                }
      

                //SAVE THE GALLERY IDS ON INPUT FIELD AND SHOW TUMBNAILS
                var galthis = this;
                this._frame.on( 'update', 
                               function() {
                    var controller = galthis._frame.states.get('gallery-edit');
                    var library = controller.get('library');
                    // Need to get all the attachment ids/urls for gallery
                    var ids = library.pluck('id');
                    var thumbs = library.pluck('sizes');
                    var x, images = "";

                    for(x in thumbs){
                        if(typeof thumbs[x].thumbnail !== "undefined"){
                            images += "<img src='" + thumbs[x].thumbnail.url + "'>&nbsp;&nbsp;" ;
                        }else{
                            images += "<img src='" + thumbs[x].full.url + "'>&nbsp;&nbsp;" ;
                        }                        
                    }
                    galthis.previewContainer.html(images);    
                    //console.log(galthis.idDiv);
                    galthis.input.val(ids);            
                });        

                return this._frame;
            };
            

            link.bind("click.wpmediagallery", function(){
                this.frame().open();
                //wp.media.shibaMlibEditGallery.frame().open()                
            });            
            
        });        

    };
} (jQuery));
//  END WORDPRES MEDIA UPLOADER WITH GALLERY :D
//  
//  REF : http://shibashake.com/wordpress-theme/how-to-add-the-wordpress-3-5-media-manager-interface-part-2






jQuery(document).ready(function($){
  //$( wp.media.shibaMlibEditGallery.init );
    $(".upload-and-attach-link-multiPDF").wpmultipdf();
    
    $("body").on("click", ".upload-and-attach-link", function(e){
        e.preventDefault();   
        if($(this).data("init-mediagal") == "init"){
        }else{
            $(".upload-and-attach-link").wpmediagallery();
            $(this).click();            
        }
    });
    
    $("body").on("click", ".upload-and-attach-link-oneImage", function(e){
        e.preventDefault();   
        if($(this).data("init-mediagal") == "init"){
        }else{
            $(".upload-and-attach-link-oneImage").wpmediaimage();
            $(this).click();            
        }
    });    
    
    
    $("body").on("click", ".upload-and-attach-link-del", function(e){    
        e.preventDefault();
 
        var parentContainer = $(this).closest("[data-js='wp-media-container']");
        var previewContainer = parentContainer.find("div.galerieImagesVariations");
        var input = parentContainer.find("input");

        input.val("");
        previewContainer.html("");       
    });    
    
    
    


});
/*
* MultiSelect v0.9.11
* Copyright (c) 2012 Louis Cuny
*
* This program is free software. It comes without any warranty, to
* the extent permitted by applicable law. You can redistribute it
* and/or modify it under the terms of the Do What The Fuck You Want
* To Public License, Version 2, as published by Sam Hocevar. See
* http://sam.zoy.org/wtfpl/COPYING for more details.
*/

!function ($) {

  "use strict";


 /* MULTISELECT CLASS DEFINITION
  * ====================== */

  var MultiSelect = function (element, options) {
    this.options = options;
    this.$element = $(element);
    this.$container = $('<div/>', { 'class': "ms-container" });
    this.$selectableContainer = $('<div/>', { 'class': 'ms-selectable' });
    this.$selectionContainer = $('<div/>', { 'class': 'ms-selection' });
    this.$selectableUl = $('<ul/>', { 'class': "ms-list", 'tabindex' : '-1' });
    this.$selectionUl = $('<ul/>', { 'class': "ms-list", 'tabindex' : '-1' });
    this.scrollTo = 0;
    this.elemsSelector = 'li:visible:not(.ms-optgroup-label,.ms-optgroup-container,.'+options.disabledClass+')';
  };

  MultiSelect.prototype = {
    constructor: MultiSelect,

    init: function(){
      var that = this,
          ms = this.$element;

      if (ms.next('.ms-container').length === 0){
        ms.css({ position: 'absolute', left: '-9999px' });
        ms.attr('id', ms.attr('id') ? ms.attr('id') : Math.ceil(Math.random()*1000)+'multiselect');
        this.$container.attr('id', 'ms-'+ms.attr('id'));
        this.$container.addClass(that.options.cssClass);
        ms.find('option').each(function(){
          that.generateLisFromOption(this);
        });

        this.$selectionUl.find('.ms-optgroup-label').hide();

        if (that.options.selectableHeader){
          that.$selectableContainer.append(that.options.selectableHeader);
        }
        that.$selectableContainer.append(that.$selectableUl);
        if (that.options.selectableFooter){
          that.$selectableContainer.append(that.options.selectableFooter);
        }

        if (that.options.selectionHeader){
          that.$selectionContainer.append(that.options.selectionHeader);
        }
        that.$selectionContainer.append(that.$selectionUl);
        if (that.options.selectionFooter){
          that.$selectionContainer.append(that.options.selectionFooter);
        }

        that.$container.append(that.$selectableContainer);
        that.$container.append(that.$selectionContainer);
        ms.after(that.$container);

        that.activeMouse(that.$selectableUl);
        that.activeKeyboard(that.$selectableUl);

        var action = that.options.dblClick ? 'dblclick' : 'click';

        that.$selectableUl.on(action, '.ms-elem-selectable', function(){
          that.select($(this).data('ms-value'));
        });
        that.$selectionUl.on(action, '.ms-elem-selection', function(){
          that.deselect($(this).data('ms-value'));
        });

        that.activeMouse(that.$selectionUl);
        that.activeKeyboard(that.$selectionUl);

        ms.on('focus', function(){
          that.$selectableUl.focus();
        })
      }

      var selectedValues = ms.find('option:selected').map(function(){ return $(this).val(); }).get();
      that.select(selectedValues, 'init');

      if (typeof that.options.afterInit === 'function') {
        that.options.afterInit.call(this, this.$container);
      }
    },

    'generateLisFromOption' : function(option, index, $container){
      var that = this,
          ms = that.$element,
          attributes = "",
          $option = $(option);

      for (var cpt = 0; cpt < option.attributes.length; cpt++){
        var attr = option.attributes[cpt];

        if(attr.name !== 'value' && attr.name !== 'disabled'){
          attributes += attr.name+'="'+attr.value+'" ';
        }
      }
      var selectableLi = $('<li data-value="'+$option.attr("value")+'"   '+attributes+'><span>'+that.escapeHTML($option.text())+'</span></li>'),
          selectedLi = selectableLi.clone(),
          value = $option.val(),
          elementId = that.sanitize(value);

      selectableLi
        .data('ms-value', value)
        .addClass('ms-elem-selectable')
        .attr('id', elementId+'-selectable');

      selectedLi
        .data('ms-value', value)
        .addClass('ms-elem-selection')
        .attr('id', elementId+'-selection')
        .hide();

      if ($option.prop('disabled') || ms.prop('disabled')){
        selectedLi.addClass(that.options.disabledClass);
        selectableLi.addClass(that.options.disabledClass);
      }

      var $optgroup = $option.parent('optgroup');

      if ($optgroup.length > 0){
        var optgroupLabel = $optgroup.attr('label'),
            optgroupId = that.sanitize(optgroupLabel),
            $selectableOptgroup = that.$selectableUl.find('#optgroup-selectable-'+optgroupId),
            $selectionOptgroup = that.$selectionUl.find('#optgroup-selection-'+optgroupId);

        if ($selectableOptgroup.length === 0){
          var optgroupContainerTpl = '<li class="ms-optgroup-container"></li>',
              optgroupTpl = '<ul class="ms-optgroup"><li class="ms-optgroup-label"><span>'+optgroupLabel+'</span></li></ul>';

          $selectableOptgroup = $(optgroupContainerTpl);
          $selectionOptgroup = $(optgroupContainerTpl);
          $selectableOptgroup.attr('id', 'optgroup-selectable-'+optgroupId);
          $selectionOptgroup.attr('id', 'optgroup-selection-'+optgroupId);
          $selectableOptgroup.append($(optgroupTpl));
          $selectionOptgroup.append($(optgroupTpl));
          if (that.options.selectableOptgroup){
            $selectableOptgroup.find('.ms-optgroup-label').on('click', function(){
              var values = $optgroup.children(':not(:selected, :disabled)').map(function(){ return $(this).val() }).get();
              that.select(values);
            });
            $selectionOptgroup.find('.ms-optgroup-label').on('click', function(){
              var values = $optgroup.children(':selected:not(:disabled)').map(function(){ return $(this).val() }).get();
              that.deselect(values);
            });
          }
          that.$selectableUl.append($selectableOptgroup);
          that.$selectionUl.append($selectionOptgroup);
        }
        index = index == undefined ? $selectableOptgroup.find('ul').children().length : index + 1;
        selectableLi.insertAt(index, $selectableOptgroup.children());
        selectedLi.insertAt(index, $selectionOptgroup.children());
      } else {
        index = index == undefined ? that.$selectableUl.children().length : index;

        selectableLi.insertAt(index, that.$selectableUl);
        selectedLi.insertAt(index, that.$selectionUl);
      }
    },

    'addOption' : function(options){
      var that = this;

      if (options.value) options = [options];
      $.each(options, function(index, option){
        if (option.value && that.$element.find("option[value='"+option.value+"']").length === 0){
          var $option = $('<option value="'+option.value+'">'+option.text+'</option>'),
              index = parseInt((typeof option.index === 'undefined' ? that.$element.children().length : option.index)),
              $container = option.nested == undefined ? that.$element : $("optgroup[label='"+option.nested+"']")

          $option.insertAt(index, $container);
          that.generateLisFromOption($option.get(0), index, option.nested);
        }
      })
    },

    'escapeHTML' : function(text){
      return $("<div>").text(text).html();
    },

    'activeKeyboard' : function($list){
      var that = this;

      $list.on('focus', function(){
        $(this).addClass('ms-focus');
      })
      .on('blur', function(){
        $(this).removeClass('ms-focus');
      })
      .on('keydown', function(e){
        switch (e.which) {
          case 40:
          case 38:
            e.preventDefault();
            e.stopPropagation();
            that.moveHighlight($(this), (e.which === 38) ? -1 : 1);
            return;
          case 37:
          case 39:
            e.preventDefault();
            e.stopPropagation();
            that.switchList($list);
            return;
          case 9:
            if(that.$element.is('[tabindex]')){
              e.preventDefault();
              var tabindex = parseInt(that.$element.attr('tabindex'), 10);
              tabindex = (e.shiftKey) ? tabindex-1 : tabindex+1;
              $('[tabindex="'+(tabindex)+'"]').focus();
              return;
            }else{
              if(e.shiftKey){
                that.$element.trigger('focus');
              }
            }
        }
        if($.inArray(e.which, that.options.keySelect) > -1){
          e.preventDefault();
          e.stopPropagation();
          that.selectHighlighted($list);
          return;
        }
      });
    },

    'moveHighlight': function($list, direction){
      var $elems = $list.find(this.elemsSelector),
          $currElem = $elems.filter('.ms-hover'),
          $nextElem = null,
          elemHeight = $elems.first().outerHeight(),
          containerHeight = $list.height(),
          containerSelector = '#'+this.$container.prop('id');

      $elems.removeClass('ms-hover');
      if (direction === 1){ // DOWN

        $nextElem = $currElem.nextAll(this.elemsSelector).first();
        if ($nextElem.length === 0){
          var $optgroupUl = $currElem.parent();

          if ($optgroupUl.hasClass('ms-optgroup')){
            var $optgroupLi = $optgroupUl.parent(),
                $nextOptgroupLi = $optgroupLi.next(':visible');

            if ($nextOptgroupLi.length > 0){
              $nextElem = $nextOptgroupLi.find(this.elemsSelector).first();
            } else {
              $nextElem = $elems.first();
            }
          } else {
            $nextElem = $elems.first();
          }
        }
      } else if (direction === -1){ // UP

        $nextElem = $currElem.prevAll(this.elemsSelector).first();
        if ($nextElem.length === 0){
          var $optgroupUl = $currElem.parent();

          if ($optgroupUl.hasClass('ms-optgroup')){
            var $optgroupLi = $optgroupUl.parent(),
                $prevOptgroupLi = $optgroupLi.prev(':visible');

            if ($prevOptgroupLi.length > 0){
              $nextElem = $prevOptgroupLi.find(this.elemsSelector).last();
            } else {
              $nextElem = $elems.last();
            }
          } else {
            $nextElem = $elems.last();
          }
        }
      }
      if ($nextElem.length > 0){
        $nextElem.addClass('ms-hover');
        var scrollTo = $list.scrollTop() + $nextElem.position().top - 
                       containerHeight / 2 + elemHeight / 2;

        $list.scrollTop(scrollTo);
      }
    },

    'selectHighlighted' : function($list){
      var $elems = $list.find(this.elemsSelector),
          $highlightedElem = $elems.filter('.ms-hover').first();

      if ($highlightedElem.length > 0){
        if ($list.parent().hasClass('ms-selectable')){
          this.select($highlightedElem.data('ms-value'));
        } else {
          this.deselect($highlightedElem.data('ms-value'));
        }
        $elems.removeClass('ms-hover');
      }
    },

    'switchList' : function($list){
      $list.blur();
      this.$container.find(this.elemsSelector).removeClass('ms-hover');
      if ($list.parent().hasClass('ms-selectable')){
        this.$selectionUl.focus();
      } else {
        this.$selectableUl.focus();
      }
    },

    'activeMouse' : function($list){
      var that = this;

      $('body').on('mouseenter', that.elemsSelector, function(){
        $(this).parents('.ms-container').find(that.elemsSelector).removeClass('ms-hover');
        $(this).addClass('ms-hover');
      });

      $('body').on('mouseleave', that.elemsSelector, function () {
          $(this).parents('.ms-container').find(that.elemsSelector).removeClass('ms-hover');;
      });
    },

    'refresh' : function() {
      this.destroy();
      this.$element.multiSelect(this.options);
    },

    'destroy' : function(){
      $("#ms-"+this.$element.attr("id")).remove();
      this.$element.css('position', '').css('left', '')
      this.$element.removeData('multiselect');
    },

    'select' : function(value, method){
      if (typeof value === 'string'){ value = [value]; }

      var that = this,
          ms = this.$element,
          msIds = $.map(value, function(val){ return(that.sanitize(val)); }),
          selectables = this.$selectableUl.find('#' + msIds.join('-selectable, #')+'-selectable').filter(':not(.'+that.options.disabledClass+')'),
          selections = this.$selectionUl.find('#' + msIds.join('-selection, #') + '-selection').filter(':not(.'+that.options.disabledClass+')'),
          options = ms.find('option:not(:disabled)').filter(function(){ return($.inArray(this.value, value) > -1); });

      if (method === 'init'){
        selectables = this.$selectableUl.find('#' + msIds.join('-selectable, #')+'-selectable'),
        selections = this.$selectionUl.find('#' + msIds.join('-selection, #') + '-selection');
      }

      if (selectables.length > 0){
        selectables.addClass('ms-selected').hide();
        selections.addClass('ms-selected').show();

        options.prop('selected', true);

        that.$container.find(that.elemsSelector).removeClass('ms-hover');

        var selectableOptgroups = that.$selectableUl.children('.ms-optgroup-container');
        if (selectableOptgroups.length > 0){
          selectableOptgroups.each(function(){
            var selectablesLi = $(this).find('.ms-elem-selectable');
            if (selectablesLi.length === selectablesLi.filter('.ms-selected').length){
              $(this).find('.ms-optgroup-label').hide();
            }
          });

          var selectionOptgroups = that.$selectionUl.children('.ms-optgroup-container');
          selectionOptgroups.each(function(){
            var selectionsLi = $(this).find('.ms-elem-selection');
            if (selectionsLi.filter('.ms-selected').length > 0){
              $(this).find('.ms-optgroup-label').show();
            }
          });
        } else {
          if (that.options.keepOrder && method !== 'init'){
            var selectionLiLast = that.$selectionUl.find('.ms-selected');
            if((selectionLiLast.length > 1) && (selectionLiLast.last().get(0) != selections.get(0))) {
              selections.insertAfter(selectionLiLast.last());
            }
          }
        }
        if (method !== 'init'){
          ms.trigger('change');
          if (typeof that.options.afterSelect === 'function') {
            that.options.afterSelect.call(this, value);
          }
        }
      }
    },

    'deselect' : function(value){
      if (typeof value === 'string'){ value = [value]; }

      var that = this,
          ms = this.$element,
          msIds = $.map(value, function(val){ return(that.sanitize(val)); }),
          selectables = this.$selectableUl.find('#' + msIds.join('-selectable, #')+'-selectable'),
          selections = this.$selectionUl.find('#' + msIds.join('-selection, #')+'-selection').filter('.ms-selected').filter(':not(.'+that.options.disabledClass+')'),
          options = ms.find('option').filter(function(){ return($.inArray(this.value, value) > -1); });

      if (selections.length > 0){
        selectables.removeClass('ms-selected').show();
        selections.removeClass('ms-selected').hide();
        options.prop('selected', false);

        that.$container.find(that.elemsSelector).removeClass('ms-hover');

        var selectableOptgroups = that.$selectableUl.children('.ms-optgroup-container');
        if (selectableOptgroups.length > 0){
          selectableOptgroups.each(function(){
            var selectablesLi = $(this).find('.ms-elem-selectable');
            if (selectablesLi.filter(':not(.ms-selected)').length > 0){
              $(this).find('.ms-optgroup-label').show();
            }
          });

          var selectionOptgroups = that.$selectionUl.children('.ms-optgroup-container');
          selectionOptgroups.each(function(){
            var selectionsLi = $(this).find('.ms-elem-selection');
            if (selectionsLi.filter('.ms-selected').length === 0){
              $(this).find('.ms-optgroup-label').hide();
            }
          });
        }
        ms.trigger('change');
        if (typeof that.options.afterDeselect === 'function') {
          that.options.afterDeselect.call(this, value);
        }
      }
    },

    'select_all' : function(){
      var ms = this.$element,
          values = ms.val();

      ms.find('option:not(":disabled")').prop('selected', true);
      this.$selectableUl.find('.ms-elem-selectable').filter(':not(.'+this.options.disabledClass+')').addClass('ms-selected').hide();
      this.$selectionUl.find('.ms-optgroup-label').show();
      this.$selectableUl.find('.ms-optgroup-label').hide();
      this.$selectionUl.find('.ms-elem-selection').filter(':not(.'+this.options.disabledClass+')').addClass('ms-selected').show();
      this.$selectionUl.focus();
      ms.trigger('change');
      if (typeof this.options.afterSelect === 'function') {
        var selectedValues = $.grep(ms.val(), function(item){
          return $.inArray(item, values) < 0;
        });
        this.options.afterSelect.call(this, selectedValues);
      }
    },

    'deselect_all' : function(){
      var ms = this.$element,
          values = ms.val();

      ms.find('option').prop('selected', false);
      this.$selectableUl.find('.ms-elem-selectable').removeClass('ms-selected').show();
      this.$selectionUl.find('.ms-optgroup-label').hide();
      this.$selectableUl.find('.ms-optgroup-label').show();
      this.$selectionUl.find('.ms-elem-selection').removeClass('ms-selected').hide();
      this.$selectableUl.focus();
      ms.trigger('change');
      if (typeof this.options.afterDeselect === 'function') {
        this.options.afterDeselect.call(this, values);
      }
    },

    sanitize: function(value){
      var hash = 0, i, character;
      if (value.length == 0) return hash;
      var ls = 0;
      for (i = 0, ls = value.length; i < ls; i++) {
        character  = value.charCodeAt(i);
        hash  = ((hash<<5)-hash)+character;
        hash |= 0; // Convert to 32bit integer
      }
      return hash;
    }
  };

  /* MULTISELECT PLUGIN DEFINITION
   * ======================= */

  $.fn.multiSelect = function () {
    var option = arguments[0],
        args = arguments;

    return this.each(function () {
      var $this = $(this),
          data = $this.data('multiselect'),
          options = $.extend({}, $.fn.multiSelect.defaults, $this.data(), typeof option === 'object' && option);

      if (!data){ $this.data('multiselect', (data = new MultiSelect(this, options))); }

      if (typeof option === 'string'){
        data[option](args[1]);
      } else {
        data.init();
      }
    });
  };

  $.fn.multiSelect.defaults = {
    keySelect: [32],
    selectableOptgroup: false,
    disabledClass : 'disabled',
    dblClick : false,
    keepOrder: false,
    cssClass: ''
  };

  $.fn.multiSelect.Constructor = MultiSelect;

  $.fn.insertAt = function(index, $parent) {
    return this.each(function() {
      if (index === 0) {
        $parent.prepend(this);
      } else {
        $parent.children().eq(index - 1).after(this);
      }
    });
}

}(window.jQuery);

jQuery(document).ready(function($){
    //Drag and Drop to sort
    var dragging, placeholders = $();  
    $.fn.sortable2=function(e){var t=String(e);e=$.extend({connectWith:false},e);return this.each(function(){if(/^enable|disable|destroy$/.test(t)){var n=$(this).children($(this).data("items")).attr("draggable",t=="enable");if(t=="destroy"){n.add(this).removeData("connectWith items").off("dragstart.h5s dragend.h5s selectstart.h5s dragover.h5s dragenter.h5s drop.h5s")}return}var r,i,n=$(this).children(e.items);var s=$("<"+(/^ul|ol$/i.test(this.tagName)?"li":"div")+' class="sortable-placeholder">');n.find(e.handle).mousedown(function(){r=true}).mouseup(function(){r=false});$(this).data("items",e.items);placeholders=placeholders.add(s);if(e.connectWith){$(e.connectWith).add(this).data("connectWith",e.connectWith)}n.attr("draggable","true").on("dragstart.h5s",function(t){if(e.handle&&!r){return false}r=false;var n=t.originalEvent.dataTransfer;n.effectAllowed="move";n.setData("Text","dummy");i=(dragging=$(this)).addClass("sortable-dragging").index()}).on("dragend.h5s",function(){if(!dragging){return}dragging.removeClass("sortable-dragging").show();placeholders.detach();if(i!=dragging.index()){dragging.parent().trigger("sortupdate",{item:dragging.parent()})}dragging=null}).not("a[href], img").on("selectstart.h5s",function(){this.dragDrop&&this.dragDrop();return false}).end().add([this,s]).on("dragover.h5s dragenter.h5s drop.h5s",function(t){if(!n.is(dragging)&&e.connectWith!==$(dragging).parent().data("connectWith")){return true}if(t.type=="drop"){t.stopPropagation();placeholders.filter(":visible").after(dragging);dragging.trigger("dragend.h5s");return false}t.preventDefault();t.originalEvent.dataTransfer.dropEffect="move";if(n.is(this)){if(e.forcePlaceholderSize){s.height(dragging.outerHeight())}dragging.hide();$(this)[s.index()<$(this).index()?"after":"before"](s);placeholders.not(s).detach()}else if(!placeholders.is(this)&&!$(this).children(e.items).length){placeholders.detach();$(this).append(s)}return false})})}
  
    //Init multiselect
    $('select.selectMultiple').multiSelect( {
      keepOrder:true,
      selectableHeader: "<div class='custom-header'>Disponible</div>",
      selectionHeader: "<div class='custom-header'>Sélectionné</div>",
       afterSelect: function(){
         $( ".ms-selection ul.ms-list" ).trigger('sortupdate');
        },
       afterDeselect: function(){
        // console.log("dese");
        }
      }
    );
    
    //SAVE THE ORDERED LIST
    $( ".ms-selection ul.ms-list" ).sortable2().bind('sortupdate', function(e, param) {
      var liList = $(this);
      var selectID = $(liList).parent().parent();
      selectID = $(selectID).attr("id").replace("ms-", "");
      console.log($("#"+selectID).val());
      var newVal = [];
      //Check each LI
      $(liList).children("li").each(function(){
        //IF NOT DISPLAY NONE
        if($(this).css("display") !== "none"){
          //console.log($(this).data("value"));   
          newVal.push($(this).data("value").toString());
        }
      });
      //Check each NEW VAL
      for(i=(newVal.length-1); i>=0; i--){
        //find option
        var option = $("#"+selectID).find("option[value="+newVal[i]+"]").remove();
        $("#"+selectID).prepend(option);
      }
      
      console.log($("#"+selectID).val());
      //Triggered when the user stopped sorting and the DOM position has changed.
    });
    


    geocoder = new google.maps.Geocoder();
    
    // Trouve lat et lng
    $("#btnTrouverLatLng").click(function(e){
        e.preventDefault();
        var prefix = $(this).data("name");
        var rue = $("#" + prefix + "_rue").val();
        var ville = $("#" + prefix + "_ville").val();
        var codepostal = $("#" + prefix + "_codepostal").val();
        var adresse = rue + " " + ville + " " + codepostal;
        
        trouverLatLng(adresse, prefix);
    });
    

    function trouverLatLng(adresse, prefix){
        geocoder.geocode( { 'address': adresse}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {                      //IF CODE POSTAL IS VALID
                //console.log(results[0].geometry.location);
                var codepostalpointe = results[0].geometry.location;
                //console.log(codepostalpointe.lat() + " et " + codepostalpointe.lng());
                $("#" + prefix + "_lat").val(codepostalpointe.lat());
                $("#" + prefix + "_lng").val(codepostalpointe.lng());
            }
        });
    }
});
//# sourceMappingURL=../maps/admin.js.map
