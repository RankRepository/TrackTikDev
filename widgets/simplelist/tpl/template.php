<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="simple-list">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php $urlImg = wp_get_attachment_url($instance["icon"]); ?>
                        
                <?php if (!empty($urlImg)) { ?>
                    <img src="<?php echo $urlImg; ?>" alt="" class="icon">
                <?php } ?>
                
                <h2><?php echo $instance["title"]; ?></h2>

                <ul class="item-list <?php echo ($instance['colorList'] == 'black') ? 'black' : 'white'; ?>">
                    <!-- class black = couleur du texte et bullet white = liste blanche et icone blanc  -->
                <?php
                    foreach($instance["list"] as $i=>$item){
                        printf('<li class="col-sm-6">%s</li>' , $item["title"]);
                        if($i %2 !== 0){
                            echo '<div class="clearfix"></div>';
                        }
                    }
                ?>
                </ul>
            </div>
        </div>
    </div>
</section>