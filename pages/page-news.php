<?php
/**
 * Template Name: Page newsroom
 */
?>

<?php while (have_posts()) : the_post(); ?>

    <?php //get_template_part('templates/page', 'header'); ?>
    <?php //get_template_part('templates/content', 'page'); ?>
    <?php the_content(); ?>

    <section class="news">
        <div class="container">
            <div class="row">
                <?php
                
                $news = get_posts(array("post_type" => "newsroom", "posts_per_page"=>-1));
                foreach($news as $new){
                    $link = get_post_meta($new->ID, "link", true);
                    $image = pn_get_image_url_from_meta($new->ID, "image", "large");
                ?>
                        
                        
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 single-news">
                            <img src="<?php echo $image; ?>" alt="">
                            <h3><?php echo $new->post_title; ?></h3>
                            <?php echo wpautop( $new->post_content, true ); ?>
                            
                            <?php if( !empty($link)){ ?>
                            <a href="<?php echo $link; ?>" target="_blank" class="btn"><?php _e('Read more','tracktik') ?></a>
                            <?php } ?>
                            
                        </div>                
                        
                <?php
                }
                ?>
            </div>
        </div>
    </section>


<?php endwhile; ?>
