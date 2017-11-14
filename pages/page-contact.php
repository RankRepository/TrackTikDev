<?php
/**
 * Template Name: Page Contact
 */
?>

<?php 

$curLang =  "_" . ICL_LANGUAGE_CODE;

?>

<?php while (have_posts()) : the_post(); ?>

  <?php //get_template_part('templates/page', 'header'); ?>
  <?php //get_template_part('templates/content', 'page'); ?>
    <?php the_content(); ?>



    <section class="contact-form-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">     
                    <?php
                        echo do_shortcode($pnPageContact->get("form_shortcode"));
                    ?>
                </div>
                <div class="col-sm-4">
                    <h3><?php _e('Sales','tracktik') ?></h3>
                    <p><a href="tel:<?php echo get_option('tracktick_footer_col1_num_link_usa'. $curLang); ?>"><?php echo get_option('tracktick_footer_col1_num_usa'. $curLang); ?></a></p>
                    <p><a href="tel:<?php echo get_option('tracktick_footer_col1_num_link_can'. $curLang); ?>"><?php echo get_option('tracktick_footer_col1_num_can'. $curLang); ?></a></p>
                    <p><a href="tel:<?php echo get_option('tracktick_footer_col1_num_link_uk'. $curLang); ?>"><?php echo get_option('tracktick_footer_col1_num_uk'. $curLang); ?></a></p>
                    <p><a href="mailto:<?php echo get_option('tracktick_footer_col1_email_address'. $curLang); ?>"><?php echo get_option('tracktick_footer_col1_email_address'. $curLang); ?></a></p>
                    <br><br>

                    <h3><?php _e('Support','tracktik') ?></h3>
                    <p><a href="tel:<?php echo get_option('tracktick_footer_block_support_phone'. $curLang); ?>"><?php echo get_option('tracktick_footer_block_support_phone'. $curLang); ?></a></p>
                    <p><a href="mailto:<?php echo get_option('tracktick_footer_block_support_email'. $curLang); ?>"><?php echo get_option('tracktick_footer_block_support_email'. $curLang); ?></a></p>
                    <br>

                    <p><?php echo get_option('tracktick_footer_col1_countries'. $curLang); ?></p>
                    <p><a href="tel:<?php echo get_option('tracktick_footer_col1_countries_num1_link'. $curLang); ?>"> <?php echo get_option('tracktick_footer_col1_countries_num1'. $curLang); ?></a></p>
                    <p><a href="tel:<?php echo get_option('tracktick_footer_col1_countries_num2_link'. $curLang); ?>"><?php echo get_option('tracktick_footer_col1_countries_num2'. $curLang); ?></a></p>
                    <br>
                    <address>
                        <h3>Tracktik</h3>
                        <?php echo get_option('tracktick_footer_col1_address'. $curLang); ?><br>
                        <?php echo get_option('tracktick_footer_col1_address_city_province'. $curLang); ?><br>
                        <?php echo get_option('tracktick_footer_col1_address_country_postalcode'. $curLang); ?>
                    </address>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2795.615230236455!2d-73.5843549484764!3d45.51782367899907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc9266c49f85543%3A0xef88aeb9f6e8c30!2sTrackTik!5e0!3m2!1sfr!2sca!4v1475784894044" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    
    
<?php endwhile; ?>
