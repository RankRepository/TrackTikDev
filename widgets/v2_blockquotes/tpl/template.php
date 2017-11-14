<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>

<section class="blockquotes">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
    <h2><?php echo $instance["content_title"]; ?></h2>
    <div class="container">
        <div class="row">
            
            <?php for($i=1; $i<=3; $i++){ ?>
                
            <div class="col-sm-4">
                <h3><?php echo $instance["quote" . $i]["title"]; ?></h3>
                <p><?php echo $instance["quote" . $i]["text"]; ?></p>
                <p class="author"><?php echo $instance["quote" . $i]["source"]; ?></p>
                <img src="<?php echo pn_get_image_url($instance["quote" . $i]["icon"]); ?>" alt="">
            </div>            
            
            <?php } ?>
           
        </div>
    </div>
</section>