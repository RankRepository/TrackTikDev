<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="icons-list">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
    <div class="container center-block">
        <div class="row">
            <div class="col-sm-12">
                <h2><?php echo $instance["title"]; ?> </h2>
                <ul class="row">
                <?php foreach( $instance["lists"] as  $item){ ?>
                    <li class="col-xs-6 col-sm-4 col-md-3 item">
                        <a href="<?php echo sow_esc_url($item["link"]); ?>" class="item-box">
                            <span class="image">
                                <img src="<?php echo wp_get_attachment_url( $item["icon"]); ?>" alt="">
                            </span>
                            <span class="title"><?php echo $item["title"]; ?></span>
                            <span class="text"><?php echo $item["text"]; ?></span>
                        </a>
                    </li>
                <?php }  ?>
                </ul>
            </div>
        </div>
    </div>
</section>