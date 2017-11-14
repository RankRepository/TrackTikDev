<?php
/**
 * Template Name: Page Accueil
 */
?>

<?php while (have_posts()) : the_post(); ?>

  <?php //get_template_part('templates/page', 'header'); ?>
  <?php //get_template_part('templates/content', 'page'); ?>

    <section class="banner-video fit-screen">
        <video autoplay loop poster="<?php echo get_template_directory_uri(); ?>/assets/video/poster.jpg" id="bgvid" class="hidden-xs">
            <!-- <source src="<?php echo get_template_directory_uri(); ?>/assets/video/landing.ogv" type="video/ogv"> -->
            <source src="<?php echo get_template_directory_uri(); ?>/assets/video/video-banner.mp4" type="video/mp4">
        </video>
        <div class="visible-xs mobile-banner" style="background-image:url('https://unsplash.it/320/600?image=1075');"></div>
        <div class="outerCenter">
            <div class="middleCenter">
                <div class="innerCenter">
                    <h1>The leading security workforce management plateform.</h1>
                    <p> Powering the guarding and security operations of over 30,000 facilities, security firms and departments as well as mobile patrols in over 30 countries worldwide, TrackTik takes you beyond guard tour.</p>
                    <a href="" class="btn"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ui/get-a-demo-icon.svg" alt="">Get a demo</a>
                    <a href="" class="btn"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ui/watch-video-icon.svg" alt="">Watch video</a>
                </div>
            </div>
        </div>
    </section>
    
    <?php get_template_part('templates/layouts/tabbed'); ?>

    <?php get_template_part('templates/layouts/box-img-txt'); ?>

    <?php get_template_part('templates/layouts/icons-list'); ?>

    <?php get_template_part('templates/layouts/animated-screen'); ?>

    <?php //get_template_part('templates/layouts/blockquotes'); ?>
    
    <?php get_template_part('templates/layouts/three-col-stats'); ?>
    
<?php endwhile; ?>
