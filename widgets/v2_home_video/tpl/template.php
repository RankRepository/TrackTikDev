<section class="banner-video fit-screen">
    <video autoplay loop poster="<?php echo wp_get_attachment_url( $instance["background_image"]); ?>" id="bgvid" class="hidden-xs">
        <!-- <source src="<?php echo get_template_directory_uri(); ?>/assets/video/landing.ogv" type="video/ogv"> -->
        <source src="<?php echo wp_get_attachment_url( $instance["video"]); ?>" type="video/mp4">
    </video>

    <div class="visible-xs mobile-banner" style="background-image:url('<?php echo wp_get_attachment_url( $instance["background_image"]); ?>');"></div>

    <div class="bloc-titles-content">
        <div class="outerCenter">
            <div class="middleCenter">
                <div class="innerCenter">
                    <h1 class="wow fadeIn" data-wow-delay="0.3s" data-wow-duration="2s"><?php echo $instance["content_title"]; ?></h1>
                    <p class="wow fadeIn" data-wow-delay="0.9s" data-wow-duration="2s"><?php echo $instance["content_text"]; ?></p>
                    <?php                             
                        echo "<div class='btn-content wow fadeInUp' data-wow-delay='0.9s'  data-wow-duration='1s'>";
                            display_button($instance["btn"], $instance["panels_info"]["widget_id"] );
                            display_button($instance["btn2"] , $instance["panels_info"]["widget_id"], true);
                        echo "</div>";
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</section>