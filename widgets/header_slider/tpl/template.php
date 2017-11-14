<section class="header-slider banner">

    <div id="header-slider" class="carousel slide" data-ride="carousel" data-interval="5000">
        <!-- Indicators -->
        <ol class="carousel-indicators">

            <?php

            if( is_array($instance["slides"]) ){
                foreach( $instance["slides"] as $key => $item ){
                    $active =  ($key == 0) ? "active" : "";
                    ?>

                    <li data-target="#header-slider" data-slide-to="<?php echo $key; ?>" class="<?php echo $active; ?>"></li>


                    <?php

                }
            }

            ?>

        </ol>


        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">


            <?php

            if( is_array($instance["slides"]) ){
                foreach( $instance["slides"] as $key => $item ){
                    $active =  ($key == 0) ? "active" : "";
                    ?>

                    <div class="item <?php echo $active; ?>" style="background-image: url('<?php echo pn_get_image_url($item["image"], "large"); ?>');">
                        <div class="outerCenter">
                            <div class="middleCenter">
                                <div class="innerCenter">
                                <?php 
                                    global $post;
                                    $post_slug=$post->post_name;
                                    if ($post_slug == 'careers') :
                                ?>

                                    <h1 style="margin-bottom: 20px; text-transform: uppercase; font-weight: 700!important; font-size: 3rem;"><?php echo ($item["titre"]); ?></h1>

                                <?php else: ?>

                                    <p class="title"><?php echo ($item["titre"]); ?></p>

                                <?php endif; ?>

                                <?php ?>
                                    <p class="desc"><?php echo ($item["texte"]); ?></p>
                                    <?php 
                                        display_button($item["btn"], $item["panels_info"]["widget_id"]) ;
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php

                }
            }

            ?>

        </div>
        <!-- Controls -->
          <a class="left carousel-control" href="#header-slider" role="button" data-slide="prev">
            <img class="arrow-prev" src="<?php echo get_template_directory_uri();?>/assets/images/ui/arrow-simple-list-white.svg" alt="">
            
          </a>
          <a class="right carousel-control" href="#header-slider" role="button" data-slide="next">
            <img class="arrow-next" src="<?php echo get_template_directory_uri();?>/assets/images/ui/arrow-simple-list-white.svg" alt="">
            
          </a>
    </div>
</section>
