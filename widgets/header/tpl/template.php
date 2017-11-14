<section class="banner fit-screen">
    <div class="outerCenter">
        <div class="middleCenter">
            <div class="innerCenter">
                <h1 class="wow fadeIn" data-wow-delay="0.3s" data-wow-duration="2s"><?php echo $instance["title"]; ?></h1>

                <div class="wow fadeIn" data-wow-delay="0.9s" data-wow-duration="2s">
                    <?php echo $instance["content"]; ?>
                </div>

                <?php 
                    
                    echo "<div class='btn-content wow fadeInUp' style='display:inline-block;' data-wow-delay='0.9s'  data-wow-duration='1s'>";
                    display_button($instance["btn"], $instance["panels_info"]["widget_id"]) ;
                    echo "</div>";

                    echo "<div class='btn-content wow fadeInUp' style='display:inline-block;' data-wow-delay='0.9s'  data-wow-duration='1s'>";
                    display_button($instance["btn2"], $instance["panels_info"]["widget_id"]) ;
                    echo "</div>";

                ?>
            </div>
        </div>
    </div>
</section>