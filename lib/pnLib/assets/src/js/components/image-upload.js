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