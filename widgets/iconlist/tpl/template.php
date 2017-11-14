<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="icones-list">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2><?php echo $instance["content_title"]; ?></h2>
                <p><?php echo $instance["content_text"]; ?></p>
                <ul>
                <?php foreach( $instance["lists"] as  $item){ ?>
                <li>
                    <img src="<?php echo wp_get_attachment_url( $item["icon"]); ?>" alt=""><?php echo $item["title"]; ?>
                </li>                                
                <?php }  ?>
                </ul>
            </div>
        </div>
    </div>
</section>