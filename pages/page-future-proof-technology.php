<?php
/**
 * Template Name: Page future proof technology
 */
?>

<?php while (have_posts()) : the_post(); ?>

  <?php //get_template_part('templates/page', 'header'); ?>
  <?php //get_template_part('templates/content', 'page'); ?>

    <section class="banner fit-screen parallax-window" data-parallax="scroll" data-image-src="https://unsplash.it/g/1920/1080?image=1075">
        <div class="outerCenter">
            <div class="middleCenter">
                <div class="innerCenter">
                    <h1>Technology is scary. We're not.</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat, error neque, recusandae expedita similique provident sit quibusdam fugit nulla saepe. Exercitationem nisi, sit libero voluptates dolorum nam officiis quos quae!</p>
                    <a href="" class="btn blue">Find out what we can do for you today</a>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('templates/layouts/simple-list'); ?> 

    <?php get_template_part('templates/layouts/simple-list'); ?>

    <?php get_template_part('templates/layouts/partners'); ?>

    <?php get_template_part('templates/layouts/one-col-txt'); ?>

    <?php get_template_part('templates/layouts/blockquotes'); ?>
    
<?php endwhile; ?>
