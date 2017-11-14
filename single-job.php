
<?php while (have_posts()) : the_post(); ?>

    <?php //get_template_part('templates/page', 'header'); ?>
    <?php //get_template_part('templates/content', 'page'); ?>

    <section class="banner fit-screen parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri(); ?>/assets/images/photo1.jpg" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/photo1.jpg)">
        <div class="outerCenter">
            <div class="middleCenter">
                <div class="innerCenter">
                    <h1><?php echo get_the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>


    <section class="wrapper-job">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 wrapper-job-infos">
                    <h2 class="job-name"><?php echo get_the_title(); ?></h2>
                    <p class="job-office"><?php echo get_post_meta(get_the_id(), "office", true); ?></p>
                    <span class="deco-line"></span>
                    <div class="job-desc">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <form id="formJob" class="form-job" action="">
                        <input type="hidden" name="action" value="tracktik_send_cv">
                        <input type="hidden" name="jobid" value="<?php echo get_the_id(); ?>">
                        <label for="">
                            <span class="form-text"><?php _e("Name", "tracktik"); ?>*</span>
                            <input class="form-input" name="name" data-required type="text">
                        </label>
                        <label for="">
                            <span class="form-text"><?php _e("Phone", "tracktik"); ?>*</span>
                            <input class="form-input" name="phone" data-required  type="text">
                        </label>
                        <label for="">
                            <span class="form-text"><?php _e("Email", "tracktik"); ?>*</span>
                            <input class="form-input" name="email" data-required  type="email">
                        </label>
                        <label for="">
                            <span class="form-text"><?php _e("Write a comment", "tracktik"); ?></span>
                            <textarea class="form-input" name="comment"   cols="30" rows="5"></textarea>
                        </label>
                        <label for="">
                            <span class="form-text"><?php _e("Add your C.V", "tracktik"); ?>*</span>
                            <div class="custom-file-upload">
                                <!--<label for="file">File: </label>-->
                                <input class="form-input" type="file" id="file" name="cvfile" data-required multiple />
                            </div>
                        </label>


                        <p class="txt-notification-empty-field"><?php _e("Please, fill in all fields", "tracktik"); ?></p>
                        <p class="txt-notification-cv-sent"><?php _e("Thank you", "tracktik"); ?></p>
                        <div class="txt-notification-cv-sending"><div class="wrapper-loader-ajax"></div></div>
                        <p class="txt-notification-cv-badtype"><?php _e("Please, send a PDF file of 5 MB and less ", "tracktik"); ?></p>
                        <label for="">
                            <button class="form-btn"><?php _e("Apply", "tracktik"); ?></button>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; ?>