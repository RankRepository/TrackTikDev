<?php
/**
 * Template Name: Page who needs tracktik
 */
?>

<?php while (have_posts()) : the_post(); ?>

  <?php //get_template_part('templates/page', 'header'); ?>
  <?php //get_template_part('templates/content', 'page'); ?>

    <section class="banner fit-screen parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri(); ?>/assets/images/banners/banner-whoneedstracktik.jpg">
        <div class="outerCenter">
            <div class="middleCenter">
                <div class="innerCenter">
                    <h1>Who needs TrackTik?</h1>
                    <p>Powering the guarding and security operations of over 30,000 facilities, security firms and departments as well as mobile patrols worldwide, Tracktik takes you beyond guard tour.</p>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('templates/layouts/icons-description'); ?>

    <?php get_template_part('templates/layouts/one-col-txt'); ?>

    <?php get_template_part('templates/layouts/people-list'); ?>

    <?php get_template_part('templates/layouts/blockquotes'); ?>


<?php endwhile; ?>
