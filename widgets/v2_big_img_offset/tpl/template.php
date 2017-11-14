<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="box-img-txt-home <?php echo ($instance["imgBottom"]) ? "imgToBottom" : "";?>" style="background-image:url('<?php echo pn_get_image_url($instance["background_image"]); ?>')">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
    <div class="container">
        <div class="row">
                  
            <div class="box box-img">
                <img src="<?php echo pn_get_image_url( $instance["image"] ); ?>" alt="" class="img-responsive">

            </div>
            <div class="box box-text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                <h2><?php echo $instance["content_title"]; ?></h2>
                <p><?php echo $instance["content_text"]; ?></p>
                
                <?php 
                    display_button($instance["btn"], $instance["panels_info"]["widget_id"]);    
                ?>
            </div>            
            
        </div>
    </div>
</section>