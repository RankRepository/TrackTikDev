<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="slider-3d">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            	<p class="title"><?php echo ($instance["title"]); ?></p>
            	<div class="slider center">

                    <?php

                    if( is_array($instance["slides"]) ){
                        foreach( $instance["slides"] as $item ){

                            ?>

                            <div>
                                <div class="one-slide">
                                    <img class="c-img" src="<?php echo pn_get_image_url($item["image"], "medium"); ?>" alt="">
                                    <p class="c-title"><?php echo ($item["titre"]); ?></p>
                                    <p class="c-desc"><?php echo ($item["texte"]); ?></p>
                                </div>
                            </div>

                            <?php

                        }
                    }

                    ?>

				</div>
            </div>
        </div>
    </div>
</section>

