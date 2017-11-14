<?php
/**
 * Template Name: Page Video
 */
?>

<?php while (have_posts()) : the_post(); ?>

    <?php //get_template_part('templates/page', 'header'); ?>
    <?php //get_template_part('templates/content', 'page'); ?>
    <?php the_content(); ?>

    <section class="template-ressources videos">
        <div class="container">
            <?php

            $videos = get_posts(array("post_type" => "video", "posts_per_page"=>3));
            foreach($videos as $video){
                $youtube = get_post_meta($video->ID, "youtube", true);
                $image = pn_get_image_url_from_meta($video->ID, "image", "large");
            ?>

            <div class="main-thumbnail art-thumbnail">
                <div class="row">
                    <a href="<?php echo get_permalink( $video->ID ); ?>">
                        <div class="col-sm-4 col-md-4 col-md-push-1 col-img">
                            <img src="<?php echo $image; ?>" class="img-responsive" width="305" alt="">
                        </div>
                        <div class="col-sm-8 col-md-6 col-md-push-1">
                            <h3 class="title"><?php echo $video->post_title; ?></h3>
                            <div class="infos">
                                <span class="date"><?php echo get_the_date( "F j, Y", $video->ID ); ?></span>
                            </div>
                            <?php echo wpautop( $video->post_content, true ); ?>
                            

                            <!--
                            <div class="videoWrapper">
                                <iframe style="width: 100%; height: 100%; margin-top: 0;" width="560" height="349" src="https://www.youtube.com/embed/<?php echo $youtube; ?>?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>;
                            </div>

                            -->

                        </div>
                    </a>

                </div>
            </div>

            <?php   
            }
            ?>


            <div class="list-small-thumbnail fix-bootstrap">
                <h2 class="title-section"><?php echo $pnPageVideos->get("second_title"); ?></h2>
                <div class="row">
                    <?php

                    $videos = get_posts(array("post_type" => "video", "posts_per_page"=>800, "offset"=>3));
                    foreach($videos as $video){
                        $youtube = get_post_meta($video->ID, "youtube", true);
                        $image = pn_get_image_url_from_meta($video->ID, "image", "large");
                    ?>
                        <!-- ONE SMALL THUMBNAIL-->
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 art-thumbnail small">
                                <div class="row">
                                    <a href="<?php echo get_permalink( $video->ID ); ?>" class="wrapper-link">
                                        <div class="col-sm-4 col-img">
                                            <img src="<?php echo $image; ?>" width="135" height="135" alt="" class="img-responsive">
                                        </div>
                                        <div class="col-sm-8">
                                            <h3 class="title"><?php echo $video->post_title; ?></h3>
                                            <div class="infos">
                                                <span class="date"><?php echo get_the_date( "F j, Y", $video->ID ); ?></span>
                                            </div>
                                            <span class="btn"><?php _e("See video", "tracktik"); ?></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <!-- END ONE SMALL THUMBNAIL-->
                    <?php   
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
   
    
<?php endwhile; ?>

