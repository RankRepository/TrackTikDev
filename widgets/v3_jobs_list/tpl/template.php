<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";

    $jobsCats = get_terms( array("taxonomy" => "job_category") );

?>

<section class="jobs-list" id="job-list">
    <a name="apply-now"></a>
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
    <div class="container">
        <div class="row row-centered">
            <p class="title"><?php echo ($instance["title"]); ?></p>

            <?php   foreach( $jobsCats as $cat ){    ?>

                <div class="col-sm-6 col-md-4 col-centered <?php echo $cat->slug; ?>">
                    <a href="<?php echo get_term_link($cat); ?>">
                        <div class="job-box">
                            <div class="outerCenter">
                                <div class="middleCenter">
                                    <div class="innerCenter">
                                        <p class="job-category"><?php echo $cat->name; ?></p>
                                        <?php 
                                        $it = explode("\n", $cat->description);
                                        ?>
                                        <p class="job-opening"><?php echo $it[0]."<br>".$it[1];  ?> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            <?php    }   ?>

        </div>
    </div>
</section>

<style></style>
