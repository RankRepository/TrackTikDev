<?php // wp-content/themes/tracktik/widgets/clients_testimonials_general/tpl/template.php ?>

<section class="blockquotes clients-logos">

	<p class="title"><?php echo $instance["title"]; ?></p>   
    <div class="owl-carousel-quotes owl-clients-logo">                
        <?php 
            foreach( $instance["slides"] as $key => $item ){

        ?>

            <div class="clients-logos-listing">
                <?php echo ($item["content"]); ?></h1>
            </div>

        <?php } ?>  
    </div>
</section>

<style>

	.blockquotes.clients-logos {
		background: #ffffff;
		padding: 50px 0;

	}

	.blockquotes.clients-logos p.title {
		padding-bottom: 0;
	}

	.blockquotes.clients-logos .owl-carousel-quotes {
		padding-top: 0;
	}

	.blockquotes.clients-logos img {
		display: inline-block;
		margin: 0 48px;
	}

	.blockquotes.clients-logos .clients-logos-listing {
		max-width: 1000px;
		margin: 0 auto;
	}

</style>