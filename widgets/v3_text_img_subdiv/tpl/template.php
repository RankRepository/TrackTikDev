<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="text-img-subdiv">
    <div class="container-box">
        <div class="flip-container vertical" ontouchstart="this.classList.toggle('flip');">
            <div class="flipper">
                <div class="front">
                    <!-- front content -->
                    <!-- two boxes / img / text -->
                    <div class="container-two-box">

                        <?php  if( $instance["order"] == "txtimg" ){  ?>

                            <div class="box box-colored">
                                <div class="outerCenter">
                                    <div class="middleCenter">
                                        <div class="innerCenter">
                                            <p class="title"><?php echo ($instance["title"]); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box box-image" style="background-image: url('<?php echo pn_get_image_url($instance["image"]); ?>')">
                                <!-- <img class="bg-image" src="<?php echo pn_get_image_url($instance["image"]); ?>" alt=""> -->
                                <img class="icon-more" src="<?php echo get_template_directory_uri(); ?>/assets/images/ui/icon-more.svg" alt="">
                            </div>

                        <?php   } else { ?>
                        
                            <div class="box box-image" style="background-image: url('<?php echo pn_get_image_url($instance["image"]); ?>')">
                                <!-- <img class="bg-image" src="<?php echo pn_get_image_url($instance["image"]); ?>" alt=""> -->
                                <img class="icon-more" src="<?php echo get_template_directory_uri(); ?>/assets/images/ui/icon-more.svg" alt="">
                            </div>
                            <div class="box box-colored">
                                <div class="outerCenter">
                                    <div class="middleCenter">
                                        <div class="innerCenter">
                                            <p class="title"><?php echo ($instance["title"]); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php  }    ?>


                    </div>

                </div>
                <div class="back">
                    <!-- back content -->
                    <!-- one row / text -->
                    <div class="container-one-row">
                        <div class="outerCenter">
                            <div class="middleCenter">
                                <div class="innerCenter">
                                
                                    <p class="subdiv-title"><?php echo ($instance["title"]); ?></p>
                                    <span class="subdiv-close"></span>

                                    <div class="container-subdiv">
                                        
                                        <?php for($i=1; $i<=4; $i++){ ?>

                                            <?php
                                                if( ($instance["col" . $i]["title"] == "") && ($instance["col" . $i]["text"] == "") ){
                                                    continue;
                                                }
                                            ?>
                                            
                                        <div class="subdiv-box">
                                            <p class="subdiv-subtitle"><?php echo ($instance["col" . $i]["title"]); ?></p>
                                            <p class="subdiv-desc"><?php echo ($instance["col" . $i]["text"]); ?> </p>
                                        </div>
                                        
                                        <?php }  ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


       
        

    </div>
</section>