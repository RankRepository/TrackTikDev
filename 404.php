<section class="banner-video fit-screen page-error">
    <video autoplay loop poster="<?php echo get_template_directory_uri(); ?>/assets/video/poster.jpg" id="bgvid" class="hidden-xs">
        <!-- <source src="<?php echo get_template_directory_uri(); ?>/assets/video/landing.ogv" type="video/ogv"> -->
        <source src="<?php echo get_template_directory_uri(); ?>/assets/video/video-banner.mp4" type="video/mp4">
    </video>
    <div class="visible-xs mobile-banner" style="background-image:url('https://unsplash.it/320/600?image=1075');"></div>
    <div class="outerCenter">
        <div class="middleCenter">
            <div class="innerCenter">
                <h1>Page not found.<br> Not sure where to go ?<br> Start from our <a href="<?php echo esc_url(home_url('/')); ?>">homepage</a>. </h1>
                <!-- <a class="btn" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/ui/icone-home.svg" alt="">Home // Accueil</a> -->
            </div>
        </div>
    </div>
</section>
