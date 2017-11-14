<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="template-ressources">
    <div class="container">
        <div class="list-small-thumbnail">
            <div class="row">
                <?php
                    foreach($instance["list"] as $i=>$item){
                        $color = !empty($item["btn"]["color"]) ? " color: " . $item["btn"]["color"] . "; ": "" ;
                        $bgcolor = !empty($item["btn"]["backgroundcolor"]) ? " background-color: " . $item["btn"]["backgroundcolor"] . "; " : "" ;
                ?>
                <div class="col-md-6 col-lg-5 col-lg-push-1 art-thumbnail small">
                    <div class="row">
                        <div class="col-sm-4 col-img">
                            <img src="<?php echo wp_get_attachment_url( $item["image"]); ?>" width="135" alt="" class="img-responsive">
                        </div>
                        <div class="col-sm-8">
                            <h2 class="title"><?php echo $item["title"]; ?></h2>
                            <a href="<?php echo wp_get_attachment_url( $item["pdf"]); ?>" class="btn" target="_blank" style="<?php echo $color . $bgcolor; ?>">
                                <?php _e('See the document','tracktik') ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</section>
