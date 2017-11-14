<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="two-col-txt">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
    <div class="container">
        <div class="row">
            
            <div class="col-sm-12">
                <?php $urlImg = wp_get_attachment_url($instance["icon"]); ?>
                <?php $title = $instance["title"]; ?>
                        
                <?php if (!empty($urlImg)) { ?>
                    <img src="<?php echo $urlImg; ?>" alt="" class="icon">
                <?php } ?>
                
                <?php if (!empty($title)) { ?>
                    <h2><?php echo $title; ?></h2>
                <?php } ?>
                
            </div>
            
            <div class="col-sm-6">
                <div class="inner">
                    <?php $urlImg = wp_get_attachment_url($instance["col1"]["icon"]); ?>

                    <?php if (!empty($urlImg)) { ?>
                        <img class="icon-txt" src="<?php echo $urlImg; ?>" alt="">
                    <?php } ?>

                    <h2><?php echo $instance["col1"]["title"]; ?></h2>
                    <?php echo $instance["col1"]["content"]; ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="inner">
                    <?php $urlImg2 = wp_get_attachment_url($instance["col2"]["icon"]); ?>

                    <?php if (!empty($urlImg2)) { ?>
                        <img class="icon-txt" src="<?php echo $urlImg2; ?>" alt="">
                    <?php } ?>

                    <h2><?php echo $instance["col2"]["title"]; ?></h2>
                    <?php echo $instance["col2"]["content"]; ?>
                </div>
            </div>
        </div>
    </div>
</section>