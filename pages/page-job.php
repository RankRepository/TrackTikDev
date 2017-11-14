<?php
/**
 * Template Name: Page Job
 */
?>

<?php while (have_posts()) : the_post(); ?>

  <?php //get_template_part('templates/page', 'header'); ?>
  <?php //get_template_part('templates/content', 'page'); ?>

    <section class="banner fit-screen parallax-window" data-parallax="scroll" data-image-src="<?php echo get_template_directory_uri(); ?>/assets/images/banners/banner-whoneedstracktik.jpg">
        <div class="outerCenter">                        <p><strong>Lorem ipsum dolor sit amet</strong>, <em>consectetur adipiscing elit</em>. Donec feugiat in odio cursus malesuada. <a href="">Quisque consectetur turpis nunc, at facilisis neque faucibus vel</a>.</p>
            <p><strong>Lorem ipsum dolor sit amet</strong>, <em>consectetur adipiscing elit</em>. Donec feugiat in odio cursus malesuada. <a href="">Quisque consectetur turpis nunc, at facilisis neque faucibus vel</a>.</p>
            <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec feugiat in odio cursus malesuada. Quisque consectetur turpis nunc, at facilisis neque faucibus vel.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec feugiat in odio cursus malesuada. Quisque consectetur turpis nunc, at facilisis neque faucibus vel.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec feugiat in odio cursus malesuada. Quisque consectetur turpis nunc, at facilisis neque faucibus vel.</li>
            </ul>
            <p><strong>Lorem ipsum dolor sit amet</strong>, <em>consectetur adipiscing elit</em>. Donec feugiat in odio cursus malesuada. <a href="">Quisque consectetur turpis nunc, at facilisis neque faucibus vel</a>.</p>
            <ol>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec feugiat in odio cursus malesuada. Quisque consectetur turpis nunc, at facilisis neque faucibus vel.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec feugiat in odio cursus malesuada. Quisque consectetur turpis nunc, at facilisis neque faucibus vel.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec feugiat in odio cursus malesuada. Quisque consectetur turpis nunc, at facilisis neque faucibus vel.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec feugiat in odio cursus malesuada. Quisque consectetur turpis nunc, at facilisis neque faucibus vel.</li>
            </ol>
            <div class="middleCenter">
                <div class="innerCenter">
                    <h1>Nom de l'emploi</h1>
                </div>
            </div>
        </div>
    </section>

    
    <section class="wrapper-job">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6 wrapper-job-infos">
                    <h2 class="job-name">Backend Developper</h2>
                    <p class="job-office">Montréal office</p>
                    <span class="deco-line"></span>
                    <div class="job-desc">

                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <form class="form-job" action="">
                        <label for="">
                            <span class="form-text">Name*</span>
                            <input class="form-input" type="text">
                        </label>
                        <label for="">
                            <span class="form-text">Phone*</span>
                            <input class="form-input" type="text">
                        </label>
                        <label for="">
                            <span class="form-text">Email*</span>
                            <input class="form-input" type="text">
                        </label>
                        <label for="">
                            <span class="form-text">Write a comment</span>
                            <textarea class="form-input" name="" id="" cols="30" rows="5"></textarea>
                        </label>
                        <label for="">
                            <span class="form-text">Add your C.V*</span>
                            <div class="custom-file-upload">
                                <!--<label for="file">File: </label>--> 
                                <input class="form-input" type="file" id="file" name="myfiles[]" multiple />
                            </div>
                        </label>
                        <label for="">
                            <button class="form-btn">Send</button>
                        </label>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; ?>
