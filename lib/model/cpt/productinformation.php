<?php 
	$pnPostTypeProductInformation = new PnPostType( "productinformation", "Product Information");

    
    
    $pnPostTypeProductInformation->set("auteur", "Auteur", "text");
    $pnPostTypeProductInformation->set("image", "Image", "image");
    $pnPostTypeProductInformation->set("lien_pdf", "Lien du PDF", "text");
	//$pnPostTypeProductInformation->set("pdf", "PDF", "pdf");
	$pnPostTypeProductInformation->addTaxonomy("categoryproduct", "Category");

?>