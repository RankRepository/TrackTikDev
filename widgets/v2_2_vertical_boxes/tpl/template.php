<section class="animated-device-home vertical-boxes">
    <div class="overlay"></div>
    <div class="container">
        <div class="row animated-device-content">
            <div class="col-sm-4 col-img wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="<?php echo pn_get_image_url( $instance["block1"]["image"] ); ?>" alt="Device" class="img-responsive">
            </div>
            <div class="col-sm-8 col-sm-push-4 col-text">
                <h2><?php echo $instance["block1"]["title"]; ?></h2>
                <p><?php echo $instance["block1"]["text"]; ?></p>
                <ul>
                    <?php foreach( $instance["block1"]["lists"] as  $item){ ?>                    
                        <li class="item">
                            <img src="<?php echo pn_get_image_url( $item["icon"] ); ?>" alt="">
                            <span><?php echo $item["title"]; ?></span>
                        </li>
                    <?php }  ?>                    
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="animated-screen vertical-boxes">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2><?php echo $instance["block2"]["title"]; ?></h2>
                <p><?php echo $instance["block2"]["text"]; ?></p>

                <?php 
                    display_button($instance["block2"]["btn"], $instance["panels_info"]["widget_id"]);    
                ?>

                
            </div>
            <div class="col-sm-6">
                <img src="<?php echo pn_get_image_url($instance["block2"]["image1"]); ?>" class="screen1 anim-slide-down" alt="">
                <img src="<?php echo pn_get_image_url($instance["block2"]["image2"]); ?>" class="screen2 anim-slide-down" alt="">
                <img src="<?php echo pn_get_image_url($instance["block2"]["image3"]); ?>" class="screen3 anim-slide-down" alt="">
            </div>
        </div>
    </div>
</section>