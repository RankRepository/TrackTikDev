<?php 
	$pnPostTypeWhitePaper = new PnPostType( "whitepaper", "White Papers");

    
    $pnPostTypeWhitePaper->set("extrait", "Extrait", "textarea");    
    $pnPostTypeWhitePaper->set("auteur", "Auteur", "text");    
    $pnPostTypeWhitePaper->set("image", "Image", "image");
	$pnPostTypeWhitePaper->set("pdf", "PDF", "pdf");
	$pnPostTypeWhitePaper->addTaxonomy("categorywhitepaper", "Category");

    $pnPostTypeWhitePaper->set("form_shortcode", "Shortcode du formulaire", "text");    

        
    $pnPostTypeWhitePaper->set("cta_tititle", "Call to Action", "title", array("bg-color"=>"gris1") );
    $pnPostTypeWhitePaper->set("cta_color", "Color", "colorpicker" , array("bg-color"=>"gris1") );
    $pnPostTypeWhitePaper->set("cta_background_color", "Background color", "colorpicker" , array("bg-color"=>"gris1") );
    $pnPostTypeWhitePaper->set("cta_title", "Title", "text" , array("bg-color"=>"gris1") );
    $pnPostTypeWhitePaper->set("cta_link", "Link (If empty, will open a Popup with content )", "text" , array("bg-color"=>"gris1") );
    $pnPostTypeWhitePaper->set("cta_link_blank", "Open link in blank", "checkbox" , array("bg-color"=>"gris1") );
    $pnPostTypeWhitePaper->set("cta_content", "Content", "editor" , array("bg-color"=>"gris1") );
    
?>