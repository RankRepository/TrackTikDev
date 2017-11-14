<?php
/**
 * Template Name: Page Product Information
 */
?>

<?php 

$curLang =  "_" . ICL_LANGUAGE_CODE;

?>

<?php while (have_posts()) : the_post(); ?>

    <?php //get_template_part('templates/page', 'header'); ?>
    <?php //get_template_part('templates/content', 'page'); ?>
    <?php the_content(); ?>


    <section class="template-ressources product-info" id="product-info-id" style="padding-bottom: 0;">
        <div class="container">
            <div class="list-small-thumbnail">
                <div class="row">                    
                <?php                
                $blogues = get_posts( array("post_type"=>"productinformation", "posts_per_page"=>20) );                                
                foreach( $blogues as $index => $blogue) {
                    $imageurl = pn_get_image_url_from_meta($blogue->ID, "image", "500x500");
                    
                    $currentCat = "";
                    $currentCatID = "";
                    $cats = wp_get_object_terms( $blogue->ID,  'categoryproduct' );
                    if (  is_array( $cats ) ) {
                        foreach( $cats as $term ) {
                            $currentCat = $term->name ; 
                            $currentCatID = $term->term_id;
                        }
                    }

                    $nom = get_post_meta( $blogue->ID, "auteur", true);
                    $lien_pdf = get_post_meta( $blogue->ID, "lien_pdf", true);
                    
                ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 art-thumbnail small">
                        <div class="row">
                            <div class="col-sm-4 col-img">
                                <img src="<?php echo $imageurl; ?>" width="135" alt="" class="img-responsive">
                            </div>
                            <div class="col-sm-8">
                                <h2 class="title"><?php echo $blogue->post_title; ?></h2>
                                <div class="infos">
                                    <span class="desc" style="display: none;"><?php _e("By", "ctaq"); ?> <?php echo $nom; ?></span>
                                </div>
                                <a href="<?php echo $lien_pdf; ?>" class="btn" >
                                    <?php _e('Download','tracktik') ?>
                                </a>
                            </div>
                        </div>
                    </div>                    
                    
                <?php   

                    if($index %2 == 1 ){
                        echo "<div class='line'></div>";
                    }

                    }                   
                ?>                    

                </div>
            </div>
        </div>
    </section>

    <style>
        .widget_onecoltxt-tracktik-widget {
            display: none;
        }

    </style>

    <script>
        var x = document.getElementsByClassName("widget_onecoltxt-tracktik-widget");
        document.getElementById("product-info-id").appendChild(x[0]);
        x[0].style.display = "block";


    </script>

    
<?php endwhile; ?>
