<?php while (have_posts()) : the_post(); ?>

    <?php //get_template_part('templates/page', 'header'); ?>
    <?php     
        $imageurl = pn_get_image_url_from_meta(get_the_id(),"image",  "large");
        $nom = get_post_meta( get_the_id(),  "auteur", true);
        $formShortcode = get_post_meta( get_the_id(),  "form_shortcode", true);
        
        
        // Call To Action
        $cta_title = get_post_meta( get_the_id(),  "cta_title", true);
        $cta_color = get_post_meta( get_the_id(),  "cta_color", true);
        $cta_color = !empty($cta_color) ? " color: " . $cta_color . "; ": "" ;
                
        $cta_background_color = get_post_meta( get_the_id(),  "cta_background_color", true);
        $cta_cssbackground_color = !empty($cta_background_color) ? " background-color: " . $cta_background_color . "; " : "" ;        

        $cta_link = get_post_meta( get_the_id(),  "cta_link", true);
        $cta_link_blank = get_post_meta( get_the_id(),  "cta_link_blank", true);
        $cta_content = get_post_meta( get_the_id(),  "cta_content", true);
        $cta_nomClasse = "hover" . rand(1111, 9999); 
        
        
        // Check if Link 
        $cta_onClick ="";
        $cta_attrModal = "";
        
        if( ! empty($cta_link) ){
            
        }
        else { 
            $cta_onClick = ' onClick="return false;" ';               
            $cta_modalID = "popupModal" . rand(100, 999);
            $cta_attrModal = ' data-toggle="modal" data-target="#'.$cta_modalID.'" ';        
        }      
        
        // Check if Blank
        $cta_blank = "";
        if( $cta_link_blank ) { 
            $cta_blank = " target='_blank' ";
        }        
        
        
    ?>

    <section class="template-ressources-detail">
        <div class="container">
            <div class="row">
                <div class="article">
                    <img src="<?php echo $imageurl; ?>" width="305" height="305" alt="" class="img-responsive">

                    <div class="ms-list">
                        <ul>
                            <li class="ms-text back"><a href="<?php echo pn_get_url_from_template("pages/page-whitepapers-studycases.php"); ?>">< <?php _e("Back", "tracktik"); ?></a></li>
                            <li class="ms-text"><?php _e("Share on", "tracktik"); ?></li>
                            <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="twitter" data-link="<?php echo get_permalink(); ?>"><span class="icon-twitter"></span></a></li>
                            <li class="ms-icon"><a href=""  data-js="sm-sharer" data-sm-type="facebook" data-link="<?php echo get_permalink(); ?>"><span class="icon-facebook"></span></a></li>
                            <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="linkedin" data-link="<?php echo get_permalink(); ?>"><span class="icon-linkedin2"></span></a></li>
                            <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="googleplus" data-link="<?php echo get_permalink(); ?>"><span class="icon-googlePlus"></span></a></li>
                            <li class="ms-icon"><a href="mailto:?Subject=Tracktik&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?php echo get_permalink(); ?>"><span class="icon-mail"></span></a></li>
                        </ul>
                    </div>

                    <h1 class="title"><?php echo get_the_title(); ?></h1>
                    <p class="author"><?php _e("By", "ctaq"); ?> <?php echo $nom; ?></p>
                    
                    <?php the_content(); ?>
                    
                    
                    
                    <div class="cta-container">
                    <?php if($cta_title) { ?>
                                                 
                        <style type="text/css">
                            .<?php echo  $cta_nomClasse ;?>:hover{
                                border: 2px solid <?php echo  $cta_background_color ;?>!important;
                                color: <?php echo  $cta_background_color ;?>!important;
                                background-color: transparent!important;
                            }
                        </style>

                        <a target="_blank" href="<?php echo $cta_link; ?>" class="btn <?php echo  $cta_nomClasse ;?>" data-tracking="<?php //echo $datatracking; ?>" 
                           style="<?php echo $cta_color . $cta_cssbackground_color; ?>"  <?php echo $cta_onClick . $cta_attrModal . $cta_blank; ?> >
                            <?php echo $cta_title; ?>
                        </a>     
                        
                        <?php if( ! empty($cta_content) && empty($cta_link)) {  ?>
                        <!-- Modal -->
                        <div class="modal fade modal-form" id="<?php echo $cta_modalID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 </div>            
                                <?php echo do_shortcode($cta_content); ?>

                            </div>
                          </div>
                        </div>
                        <?php } ?>                        
                        
                    <?php }  ?>
                    </div>                    
                    

                    <div class="ms-list">
                        <ul>
                            <li class="ms-text back"><a href="<?php echo pn_get_url_from_template("pages/page-whitepapers-studycases.php"); ?>">< <?php _e("Back", "tracktik"); ?></a></li>
                            <li class="ms-text"><?php _e("Share on", "tracktik"); ?></li>
                            <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="twitter" data-link="<?php echo get_permalink(); ?>"><span class="icon-twitter"></span></a></li>
                            <li class="ms-icon"><a href=""  data-js="sm-sharer" data-sm-type="facebook" data-link="<?php echo get_permalink(); ?>"><span class="icon-facebook"></span></a></li>
                            <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="linkedin" data-link="<?php echo get_permalink(); ?>"><span class="icon-linkedin2"></span></a></li>
                            <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="googleplus" data-link="<?php echo get_permalink(); ?>"><span class="icon-googlePlus"></span></a></li>
                            <li class="ms-icon"><a href="mailto:?Subject=Tracktik&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?php echo get_permalink(); ?>"><span class="icon-mail"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-push-2">
                    <?php
                        echo do_shortcode( $formShortcode );
                    ?>
                </div>
            </div>
        </div>
    </section>
    
    
<?php endwhile; ?>