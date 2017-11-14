<?php
/**
 * Template Name: Page Solutions Mobile
 */
?>

<?php while (have_posts()) : the_post(); ?>

  <?php //get_template_part('templates/page', 'header'); ?>
  <?php //get_template_part('templates/content', 'page'); ?>

    <section class="banner fit-screen parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri(); ?>/assets/images/banners/banner-solutions-mobile.jpg">
        <div class="outerCenter">
            <div class="middleCenter">
                <div class="innerCenter">
                    <h1>Mobile + Suite</h1>
                    <p><span>Enhance your mobile operation with the right technology.</span><br>TrackTik Dispatch and Patrol modules, combined as the Mobile + Suite, provide efficiency and intelligence for your mobile operations</p>
                    <a href="" class="btn"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ui/get-a-demo-icon.svg" alt="">Get a demo</a>
                    <a href="" class="btn"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ui/watch-video-icon.svg" alt="">Watch video</a>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('templates/layouts/box-img-txt'); ?>

    <?php get_template_part('templates/layouts/simple-list'); ?>

    <?php get_template_part('templates/layouts/box-img-txt'); ?>
    
    <?php get_template_part('templates/layouts/animated-screen'); ?>

    <?php get_template_part('templates/layouts/box-img-txt'); ?>

    <?php get_template_part('templates/layouts/box-img-txt'); ?>

    <?php get_template_part('templates/layouts/one-col-txt'); ?>

<?php endwhile; ?>
