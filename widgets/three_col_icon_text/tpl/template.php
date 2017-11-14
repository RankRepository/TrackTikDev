<section class="three-col-icon-text">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <h2><?php echo $instance["title"]; ?></h2>
            </div>
        </div>

        <!-- BOUCLE SUR LA ROW -->       
        <?php
        foreach($instance["rows"] as $row){
            
            echo '<div class="row">';
            
            for($i=1; $i<=3; $i++){
        ?>
            
            <div class="col-sm-4 box">
                <img src="<?php echo wp_get_attachment_url( $row["col" . $i]["icon"] ); ?>" alt="">
                <p class="title"><?php echo $row["col" . $i]["title"]; ?></p>
                <p class="desc"><?php echo $row["col" . $i]["text"]; ?></p>
                
                
                <?php 
                    display_button($row["col" . $i]["btn"], $instance["panels_info"]["widget_id"]);    
                ?>                
                
            </div>        
            
        <?php                                
            }
            echo '</div>';              
        }
        ?>               
        
    </div>
</section>