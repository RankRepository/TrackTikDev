<?php 
	$pnPostTypeArticle = new PnPostType( "post", "Article");

    $pnPostTypeArticle->set("auteur", "Auteur", "text");
    
    
    $pnPostTypeArticle->set("cta_tititle", "Call to Action", "title", array("bg-color"=>"gris1") );
    $pnPostTypeArticle->set("cta_color", "Color", "colorpicker" , array("bg-color"=>"gris1") );
    $pnPostTypeArticle->set("cta_background_color", "Background color", "colorpicker" , array("bg-color"=>"gris1") );
    $pnPostTypeArticle->set("cta_title", "Title", "text" , array("bg-color"=>"gris1") );
    $pnPostTypeArticle->set("cta_link", "Link (If empty, will open a Popup with content )", "text" , array("bg-color"=>"gris1") );
    $pnPostTypeArticle->set("cta_link_blank", "Open link in blank", "checkbox" , array("bg-color"=>"gris1") );
    $pnPostTypeArticle->set("cta_content", "Content", "editor" , array("bg-color"=>"gris1") );

    
?>