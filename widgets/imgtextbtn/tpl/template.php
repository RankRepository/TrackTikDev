<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="box-img-txt <?php echo ($instance["imgBottom"]) ? "imgToBottom" : "";?>" style="background-image:url('<?php echo pn_get_image_url($instance["background_image"]); ?>')">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
    <div class="container">
        <div class="row">
            <?php   if (($instance["order"]) == "txtimg") { ?>    
      
            <div class="col-xs-12 col-md-6 box wow fadeInLeft" data-wow-duration="1s">
                <div class="padding-left-content">
                    
                    <?php 
                        global $post;
                        $post_slug=$post->post_name;
                        if ($post_slug == 'home' || $post_slug == 'homepage') :
                    ?>

                        <h1 style="margin-bottom: 30px; font-size: initial; font-weight: 100;"><?php echo $instance["content_title"]; ?></h1>

                    <?php else: ?>

                        <h2><?php echo $instance["content_title"]; ?></h2>

                    <?php endif; ?>

                    <?php echo $instance["content_text"]; ?>
                    
                    <?php 
                        display_button($instance["btn"], $instance["panels_info"]["widget_id"]);    
                    ?>                    
                </div>
            </div>              
            <div class="col-xs-12 col-md-6 box wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="placeholder"><img class="content-img" src="<?php echo pn_get_image_url($instance["content_image"]); ?>" alt=""></div>
                <img class="content-img content-img-mobile" src="<?php echo pn_get_image_url($instance["content_image_mobile"]); ?>" alt="">
            </div>
          
            
            <?php   } else {   ?>
            
            <div class="col-xs-12 col-md-6 box wow fadeInLeft" data-wow-duration="1s">
                <div class="placeholder"><img class="content-img" src="<?php echo pn_get_image_url($instance["content_image"]); ?>" alt=""></div>
                <img class="content-img content-img-mobile" src="<?php echo pn_get_image_url($instance["content_image_mobile"]); ?>" alt="">
            </div>
            <div class="col-xs-12 col-md-6 box wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="padding-left-content">
                    <h2><?php echo $instance["content_title"]; ?></h2>
                    <p><?php echo $instance["content_text"]; ?></p>
                    
                    <?php 
                        display_button($instance["btn"], $instance["panels_info"]["widget_id"]);    
                    ?>
                    
                </div>
            </div>            
            
            <?php   }   ?>
        </div>
    </div>
</section>

<style type="text/css">

    .box-img-txt .content-img-mobile,
    .imac-placeholder .box-img-txt .content-img-mobile {
        display: none;
    }

    @media (max-width: 767px) {
        .imac-placeholder .box-img-txt .content-img-mobile {
            display: block;
        }
    }

    .imac-placeholder .box-img-txt .placeholder {
        background:url('<?php echo get_template_directory_uri(); ?>/assets/images/imac_placeholder.png') center center no-repeat;
        background-size: cover;
        min-height: 377px;
        box-sizing: border-box;
        padding: 32px 86px;
    }

    .imac-placeholder .box-img-txt .placeholder img { 
        max-height: 218px; 
    }

    @media (max-width: 1200px) {
        .imac-placeholder .box-img-txt .placeholder {
            min-height: 377px;
            padding: 50px 59px;
        }

        .imac-placeholder .box-img-txt .placeholder img { 
            max-height: 192px; 
        }
    }

    @media (max-width: 992px) {
        .imac-placeholder .box-img-txt .placeholder {
            min-height: 442px;
            padding: 24px 116px;
        }

        .imac-placeholder .box-img-txt .placeholder img { 
            max-height: 270px; 
        }
    }

    @media (max-width: 767px) {
        .imac-placeholder .box-img-txt .placeholder {
            display: none;
        }
    }
    



</style>
