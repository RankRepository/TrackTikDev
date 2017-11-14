<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="pdf-list">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                
                <h2><?php echo $instance["title"]; ?></h2>

                <?php  foreach($instance["list"] as $i=>$item){ ?>
                    <div>
                        <p class="title"><?php echo $item["title"]; ?></p>
                        <p ><?php echo $item["texte"]; ?></p>
                        
                        <?php   foreach($item["contenu"] as $con){ ?>
                            <p class="title"><?php echo $con["title"]; ?></p>
                            <p ><?php echo $con["texte"]; ?></p>                        
                        <?php   }   ?>
                            
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>