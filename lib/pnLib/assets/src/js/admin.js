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