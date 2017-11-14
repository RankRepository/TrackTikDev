<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>

<section class="three-col-icon">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
    
    <div class="container">
        <div class="row">
            <h2><?php echo $instance["title"]; ?></h2>
            <div class="col-sm-4 box">
                <img src="<?php echo wp_get_attachment_url($instance["col1"]["icon"]); ?>" alt="">
                <p>
                    <?php echo $instance["col1"]["title"]; ?>
                    <span><?php echo $instance["col1"]["subtitle"]; ?></span>   
                </p>
            </div>
            <div class="col-sm-4 box">
                <img src="<?php echo wp_get_attachment_url($instance["col2"]["icon"]); ?>" alt="">
                <p>
                    <?php echo $instance["col2"]["title"]; ?>
                    <span><?php echo $instance["col2"]["subtitle"]; ?></span>   
                </p>
            </div>
            <div class="col-sm-4 box">
                <img src="<?php echo wp_get_attachment_url($instance["col3"]["icon"]); ?>" alt="">
                <p>
                    <?php echo $instance["col3"]["title"]; ?>
                    <span><?php echo $instance["col3"]["subtitle"]; ?></span>   
                </p>
            </div>
        </div>
    </div>
</section>

<style>
    .three-col-icon .row .box p { color: #111b43!important; font-weight: 700!important; }
    .three-col-icon .row .box p a { font-weight: 100; } 
    .three-col-icon .row .box p span {  font-weight: 100; display: block; font-size: 12px; margin-top: 5px; }
    .three-col-icon .row .box p span strong { display: block; }
</style>