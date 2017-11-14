<?php

global $wp_query;

?>

<?php 
    $cat = single_cat_title('', false);

    if ($cat == "Sales") {
        $img  = "/assets/images/job_categories/header_sales.jpg";
    } elseif ($cat == "Administration") {
        $img  = "/assets/images/job_categories/header_admin.jpg";
    } elseif ($cat == "Customer Success") {
        $img  = "/assets/images/job_categories/header_customer_success.jpg";
    } elseif ($cat == "Development") {
        $img  = "/assets/images/job_categories/header_dev.jpg";
    } elseif ($cat == "Marketing") {
        $img  = "/assets/images/job_categories/header_marketing.jpg";
    } else {
        $img  = "/assets/images/job_categories/header_product.jpg";
    }
    $bg = get_template_directory_uri().$img; 
?>

<section class="banner fit-screen parallax-window" data-parallax="scroll" data-image-src="<?=$bg;?>" style="background-image: url(<?=$bg;?>);">
    <div class="outerCenter">
        <div class="middleCenter">
            <div class="innerCenter">
                <?php $description = category_description(); ?>
                <h1 class="wow fadeIn" data-wow-delay="0.3s" data-wow-duration="2s"><?php single_term_title(''); ?><?php echo $description; ?></h1> 
            </div>
        </div>
    </div>
</section>
<section class="jobs-list">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
    <div class="container">
        <div class="row row-centered">   
            <?php while (have_posts()) : the_post(); ?>

                <div class="col-sm-6 col-md-4 col-centered">
                    <a class="job-link" href="<?php echo get_permalink(); ?>">
                        <div class="job-box the-job-box">
                            <div class="outerCenter">
                                <div class="middleCenter">
                                    <div class="innerCenter">
                                        <p class="job-category"><?php echo get_the_title(); ?></p>
                                        <p class="job-opening"><?php echo get_post_meta(get_the_id(), "office", true); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="deco-hover"></div>
                    </a>
                </div>

            <?php endwhile; ?>

        </div>
    </div>
</section>
      
