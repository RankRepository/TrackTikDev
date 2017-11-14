<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="animated-screen">
        <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h2><?php echo $instance["content_title"]; ?></h2>
                    <p><?php echo $instance["content_text"]; ?></p>

                    <?php 
                        display_button($instance["btn"], $instance["panels_info"]["widget_id"]);    
                    ?>

                    
                </div>
                <div class="col-sm-6">
                    <img src="<?php echo pn_get_image_url($instance["anim_image1"]); ?>" class="screen1 anim-slide-down" alt="">
                    <img src="<?php echo pn_get_image_url($instance["anim_image2"]); ?>" class="screen2 anim-slide-down" alt="">
                    <img src="<?php echo pn_get_image_url($instance["anim_image3"]); ?>" class="screen3 anim-slide-down" alt="">
                </div>
            </div>
        </div>
    </section>