<?php while (have_posts()) : the_post(); ?>

    <?php //get_template_part('templates/page', 'header'); ?>
    <?php 
                $youtube = get_post_meta( get_the_ID() , "youtube", true);
                $image = pn_get_image_url_from_meta( get_the_ID(), "image", "large");
    ?>

    <section class="template-ressources-detail">
        <div class="container">
            <div class="row">
                <div class="article">
                    <img src="<?php echo $image; ?>" width="305" height="305" alt="" class="img-responsive">

                    <div class="ms-list">
                        <ul>
                            <li class="ms-text back"><a href="videos">< Back</a></li>
                            <li class="ms-text"><?php _e("Share on", "tracktik"); ?></li>
                            <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="twitter" data-link="<?php echo get_permalink(); ?>"><span class="icon-twitter"></span></a></li>
                            <li class="ms-icon"><a href=""  data-js="sm-sharer" data-sm-type="facebook" data-link="<?php echo get_permalink(); ?>"><span class="icon-facebook"></span></a></li>
                            <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="linkedin" data-link="<?php echo get_permalink(); ?>"><span class="icon-linkedin2"></span></a></li>
                            <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="googleplus" data-link="<?php echo get_permalink(); ?>"><span class="icon-googlePlus"></span></a></li>
                            <li class="ms-icon"><a href="mailto:?Subject=Tracktik&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?php echo get_permalink(); ?>"><span class="icon-mail"></span></a></li>
                        </ul>
                    </div>

                    <h1 class="title"><?php echo get_the_title(); ?></h1>
                    
                    
                    <div class="videoWrapper">
                        <!-- Copy & Pasted from YouTube -->
                        <iframe width="560" height="349" src="https://www.youtube.com/embed/<?php echo $youtube; ?>?rel=0&hd=1&autoplay=1" frameborder="0" allowfullscreen></iframe>;
                    </div>   
                    <p>&nbsp;</p>
                    
                    <?php the_content(); ?>
                    

                    <div class="ms-list">
                        <ul>
                            <li class="ms-text back"><a href="videos">< Back</a></li>
                            <li class="ms-text"><?php _e("Share on", "tracktik"); ?></li>
                            <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="twitter" data-link="<?php echo get_permalink(); ?>"><span class="icon-twitter"></span></a></li>
                            <li class="ms-icon"><a href=""  data-js="sm-sharer" data-sm-type="facebook" data-link="<?php echo get_permalink(); ?>"><span class="icon-facebook"></span></a></li>
                            <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="linkedin" data-link="<?php echo get_permalink(); ?>"><span class="icon-linkedin2"></span></a></li>
                            <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="googleplus" data-link="<?php echo get_permalink(); ?>"><span class="icon-googlePlus"></span></a></li>
                            <li class="ms-icon"><a href="mailto:?Subject=Tracktik&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?php echo get_permalink(); ?>"><span class="icon-mail"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
<?php endwhile; ?>