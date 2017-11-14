<?php // wp-content/themes/tracktik/widgets/clients_testimonials_general/tpl/template.php ?>

<section class="blockquotes">
    <p class="title"><?php echo get_option('tracktick_blockquotes_title_' . ICL_LANGUAGE_CODE); ?></p>
    
    <div class="owl-carousel-quotes owl-quotes">                
        <?php 
            $blockquotes = get_posts(array("orderby"=>"rand", "post_type"=>"blockquotes", "posts_per_page"=> -1, "suppress_filters"=>false));
            foreach($blockquotes as $key => $blockquote){
        ?>

            <div >
                <h3><?php echo $blockquote->post_title; ?></h3>
                <p class="quote"><?php echo get_post_meta($blockquote->ID,'blockquote',true); ?></p>
                
                <div class="quote-footer ">
                    <div class=" quote-left">
                        <a href="<?php echo get_post_meta($blockquote->ID, 'website_url',true); ?>" target="_blank">
                            <img src="<?php echo pn_get_image_url_from_meta($blockquote->ID, 'logo'); ?>" alt="">
                        </a>                            
                    </div>                        
                    
                    <div class=" quote-right">
                        <p class="author"><?php echo get_post_meta($blockquote->ID,'author',true); ?><br/> <?php echo get_post_meta($blockquote->ID,'fonction',true); ?></p>                            
                    </div>
                </div>

            </div>

        <?php } ?>  
    </div>
</section>