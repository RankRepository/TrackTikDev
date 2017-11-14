<?php
/**
 * Template Name: Page Dispatch
 */
?>

<?php while (have_posts()) : the_post(); ?>

  <?php //get_template_part('templates/page', 'header'); ?>
  <?php //get_template_part('templates/content', 'page'); ?>


    <section class="banner fit-screen parallax-window" data-parallax="scroll" data-image-src="https://unsplash.it/g/1920/1080?image=1076">
        <div class="outerCenter">
            <div class="middleCenter">
                <div class="innerCenter">
                    <h1>Dispatch</h1>
                    <a href="" class="btn">Always on time</a>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('templates/layouts/animated-device'); ?>
    
    <?php get_template_part('templates/layouts/box-img-txt'); ?>

    <?php get_template_part('templates/layouts/two-col-txt'); ?>

    <?php get_template_part('templates/layouts/one-col-txt'); ?>

    <?php get_template_part('templates/layouts/blockquotes'); ?>

    <?php get_template_part('templates/layouts/one-col-graphic'); ?>
    
    
<?php endwhile; ?>
