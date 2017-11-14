<?php
/**
 * Template Name: Page Detail Paper - Case
 */
?>

<?php while (have_posts()) : the_post(); ?>

    <?php //get_template_part('templates/page', 'header'); ?>
    <?php //get_template_part('templates/content', 'page'); ?>
    <?php the_content(); ?>

    <section class="papers-cases-detail">
        <div class="container">
            <div class="row">
                <div class="article">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/test-article.jpg" width="305" height="305" alt="" class="img-responsive">
                    <ul class="share-list">
                        <li><a href="https://twitter.com/TrackTik" target="_blank"><span class="icon-twitter"></span></a></li>
                        <li><a href="https://www.facebook.com/Tracktikguardtours" target="_blank"><span class="icon-facebook"></span></a></li>
                        <li><a href="https://www.linkedin.com/company/staffr-integrated-solution" target="_blank"><span class="icon-linkedin2"></span></a></li>
                    </ul>
                    <h1 class="title">White paper #1 title amet, consectur adeipiscing elit</h1>
                    <p class="author">By Jane Doe, VP Sales</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque non facilisis turpis. Donec placerat dapibus fringilla. Donec ultricies sapien vitae auctor dignissim. In felis arcu, convallis ut varius nec, suscipit quis augue. Nam aliquam vitae nulla et convallis. In hac habitasse platea dictumst. Maecenas eu eleifend felis. Vivamus vehicula vitae nisl et hendrerit. Etiam ac maximus lorem. In hac habitasse platea dictumst. Nullam euismod id ex vel accumsan. Sed sem nisi, dapibus et posuere sed, feugiat vitae justo. Aliquam non imperdiet sem. Ut quis porta elit.</p>
                    <p>Fusce quis sem luctus, molestie velit vel, aliquam nisl. Mauris id lacinia erat. Sed lacinia tellus ac sem ullamcorper, et volutpat massa lacinia. Vestibulum mattis rutrum turpis at porttitor. Suspendisse venenatis risus mi, at fringilla nunc sagittis eget. Mauris ac felis vitae tellus luctus rhoncus sed ut tortor. Vivamus quis ornare nisi. Nunc consequat blandit felis eu pharetra. Quisque vulputate sed eros eu lacinia. Ut sed rutrum tortor, at laoreet ex.</p>
                </div>

                <div class="wrap-form">
                    <div class="form">
                        <?php
                            echo do_shortcode($pnPageProductInformation->get("form_shortcode"));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
<?php endwhile; ?>
