<?php while (have_posts()) : the_post(); ?>

    <?php //get_template_part('templates/page', 'header'); ?>
    <?php     
        $imageurl = pn_get_image_url_from_meta(get_the_id(),"image",  "large");
        $nom = get_post_meta( get_the_id(),  "auteur", true);
    ?>

    <section class="template-ressources-detail">
        <div class="container">
            <div class="row">
                <div class="article">
                    <img src="<?php echo $imageurl; ?>" width="305" height="305" alt="" class="img-responsive">

                    <div class="ms-list">
                        <ul>
                            <li class="ms-text back"><a href="<?php echo pn_get_url_from_template("pages/page-product-information.php"); ?>">< <?php _e("Back", "tracktik"); ?></a></li>
                            <li class="ms-text"><?php _e("Share on", "tracktik"); ?></li>
                            <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="twitter" data-link="<?php echo get_permalink(); ?>"><span class="icon-twitter"></span></a></li>
                            <li class="ms-icon"><a href=""  data-js="sm-sharer" data-sm-type="facebook" data-link="<?php echo get_permalink(); ?>"><span class="icon-facebook"></span></a></li>
                            <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="linkedin" data-link="<?php echo get_permalink(); ?>"><span class="icon-linkedin2"></span></a></li>
                            <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="googleplus" data-link="<?php echo get_permalink(); ?>"><span class="icon-googlePlus"></span></a></li>
                            <li class="ms-icon"><a href="mailto:?Subject=Tracktik&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?php echo get_permalink(); ?>"><span class="icon-mail"></span></a></li>
                        </ul>
                    </div>

                    <h1 class="title"><?php echo get_the_title(); ?></h1>
                    <!-- p class="author"><?php _e("By", "ctaq"); ?> <?php echo $nom; ?></p -->
                    
                    <?php the_content(); ?>

                    <div class="ms-list">
                        <ul>
                            <li class="ms-text back"><a href="<?php echo pn_get_url_from_template("pages/page-product-information.php"); ?>">< <?php _e("Back", "tracktik"); ?></a></li>
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
