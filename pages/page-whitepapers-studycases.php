<?php
/**
 * Template Name: Page White papers & Case Studys
 */
?>

<?php while (have_posts()) : the_post(); ?>

    <?php //get_template_part('templates/page', 'header'); ?>
    <?php //get_template_part('templates/content', 'page'); ?>
    <?php the_content(); ?>

    <section class="template-ressources">
        <div class="container">
            <div class="filter">
                <ul class="categories">
                    <li class="first"><a class="view view-all current" data-js="filterpaper" data-cat="0"><?php _e("View all", "tracktik"); ?></a></li>
                    
                    <?php                                
                        $allCats = get_terms(array("taxonomy"=>"categorywhitepaper"));
                        if (is_array($allCats)) {
                            foreach($allCats as $key => $cat){
                                printf('<li><a class="view" data-js="filterpaper" data-cat="%s">%s</a></li>', $cat->term_id, $cat->name );
                            }                                    
                        }                                                                
                    ?>                    
                    
                </ul>
            </div>
            
            <div class="list-thumbnail">

            <?php

            $whitepapers = get_posts(array("post_type" => "whitepaper", "posts_per_page"=>3));
            foreach($whitepapers as $whitepaper){
                $image = pn_get_image_url_from_meta($whitepaper->ID, "image", "large");
                $nom = get_post_meta( $whitepaper->ID, "auteur", true);                
                $extrait = get_post_meta( $whitepaper->ID, "extrait", true);                
                
                $currentCat = "";
                $currentCatID = "";
                $cats = wp_get_object_terms( $whitepaper->ID,  'categorywhitepaper' );
                if (  is_array( $cats ) ) {
                    foreach( $cats as $term ) {
                        $currentCat = $term->name ; 
                        $currentCatID = $term->term_id;
                    }
                }                
                
            ?>

                <div class="main-thumbnail art-thumbnail" data-js="whitepaper" data-cat="<?php echo $currentCatID;  ?>">
                    <div class="row">
                        <a href="<?php echo get_permalink($whitepaper->ID); ?>" class="wrapper-link">
                            <div class="col-sm-4 col-md-4 col-md-push-1 col-img">
                                <img src="<?php echo $image; ?>" width="305" height="305" alt="" class="img-responsive">
                            </div>
                            <div class="col-sm-8 col-md-6 col-md-push-1">
                                <h2 class="title"><?php echo $whitepaper->post_title ; ?></h2>
                                <div class="infos">
                                    <span class="author"><?php _e("By", "ctaq"); ?> <?php echo $nom; ?></span>
                                    <span class="category"><?php echo $currentCat; ?></span>
                                </div>
                                
                                <p><?php echo $extrait;  ?></p>
                                <span class="btn"><?php _e("Read more", "tracktik"); ?></span>

                                <!-- <a href="<?php echo get_permalink($whitepaper->ID); ?>" class="btn"><?php _e("Read more", "tracktik"); ?></a> -->
                            </div>
                        </a>
                    </div>
                </div>

            <?php   
            }
            ?>
                
                

            <!-- ONE THUMBNAIL-->

            <!-- END ONE THUMBNAIL-->

            </div>

            <div class="list-small-thumbnail fix-bootstrap">
                <div class="row">
                  
                <?php

                $whitepapers = get_posts(array("post_type" => "whitepaper", "posts_per_page"=>-1));
                foreach($whitepapers as $whitepaper){
                    $image = pn_get_image_url_from_meta($whitepaper->ID, "image", "large");
                    $nom = get_post_meta( $whitepaper->ID, "auteur", true);                

                    $currentCat = "";
                    $currentCatID = "";
                    $cats = wp_get_object_terms( $whitepaper->ID,  'categorywhitepaper' );
                    if (  is_array( $cats ) ) {
                        foreach( $cats as $term ) {
                            $currentCat = $term->name ; 
                            $currentCatID = $term->term_id;
                        }
                    }                

                ?>
                    
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 art-thumbnail small" data-js="whitepaper" data-cat="<?php echo $currentCatID;  ?>">
                        <div class="row">
                            <a href="<?php echo get_permalink($whitepaper->ID); ?>" class="wrapper-link">
                                <div class="col-sm-4 col-img">
                                    <img src="<?php echo $image; ?>" width="135" height="135" alt="" class="img-responsive">
                                </div>
                                <div class="col-sm-8">
                                    <h2 class="title"><?php echo $whitepaper->post_title; ?></h2>
                                    <div class="infos">
                                        <span class="author"><?php _e("By", "ctaq"); ?> <?php echo $nom; ?></span>
                                        <span class="category"><?php echo $currentCat; ?></span>
                                    </div>
                                    <span class="btn"><?php _e("Read more", "tracktik"); ?></span>
                                </div>
                            </a>
                        </div>
                    </div>                    
                    
                <?php            
                }            
                ?>

                </div>
            </div>
        </div>
    </section>
    
<?php endwhile; ?>
