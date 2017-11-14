<?php 
	$pnPostTypeBlockquotes = new PnPostType( "blockquotes", "Citations");

	$pnPostTypeBlockquotes->set("blockquote", "Citation ", "text");

	$pnPostTypeBlockquotes->set("author", "Auteur ", "text");
	$pnPostTypeBlockquotes->set("fonction", "Fonction ", "text");

	$pnPostTypeBlockquotes->set("logo", "Logo", "image");
	$pnPostTypeBlockquotes->set("website_url", "Lien du logo", "text");

?>