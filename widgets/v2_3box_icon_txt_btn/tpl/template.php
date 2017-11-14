<section class="three-col-icon-text-home">
    <div class="container">
        <div class="row wrapper-boxes">

           <?php
           if( is_array($instance["rows"]) ){
               $delay =0;
               foreach( $instance["rows"] as $key=>$col ){
                   if( $key == "so_field_container_state" ){ continue; }
           ?>
            
            <div class="col-sm-4 wrapper-box wow fadeInUp" data-wow-duration="1s" data-wow-delay="<?php echo $delay; ?>s">
                <div class="box">
                    <img src="<?php echo wp_get_attachment_url($col["icon"]); ?>" alt=""> 
                    <p class="title"><?php echo  $col["title"]; ?></p>
                    <p class="desc"><?php echo  $col["text"]; ?></p>                    
                    <?php 
                        display_button($col["btn"], $instance["panels_info"]["widget_id"]);    
                    ?>
                </div>
            </div>            
            
           <?php     
                    $delay += 0.3;
               }
           }           
           ?>

        </div>      
    </div>
</section>