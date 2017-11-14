jQuery(document).ready(function($){
    

    if($('#in-product_cat-10')[0].checked === false){
        $('.tax-event').hide();
        $('.tax-product').show();
    }else{
        $('.tax-event').show();
        $('.tax-product').hide();
    }   
    
    //REMOVE BLOCK
    $("body").on("click", "#in-product_cat-10", function(e){

        if($(this)[0].checked === false){
            $('.tax-event').hide();
            $('.tax-product').show();
        }else{
            $('.tax-event').show();
            $('.tax-product').hide();
        }

    });
});