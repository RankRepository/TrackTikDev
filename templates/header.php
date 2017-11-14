<?php 

$curLang =  "_" . ICL_LANGUAGE_CODE;

?>

<header class="header">

<!-- 
***************
Première partie
***************
-->
<div class="header-contact">

    <!-- <a href="javascript:;"><?php _e('Contact Us','tracktik') ?></a> -->
    <a class="top-menu-link" href="<?php echo pn_get_url_from_template("pages/page-contact.php"); ?>"><?php _e('Contact Us','tracktik') ?></a>
    <a href="tel:1-888-454-5606" style="margin-left: 0;">1 (888) 454-5606</a>
    <a class="top-menu-link" href="<?php echo substr(get_page_link(308), 0, -1)."#support"; ?>"><?php _e('Support','tracktik') ?>
    </a>
    <a href="tel:1-888-670-9782" style="margin-left: 0;">1 (888) 670-9782</a>
    <ul class="share-list">
        <li><a href="https://www.facebook.com/Tracktikguardtours" target="_blank"><span class="icon-facebook"></span></a></li>
        <li><a href="https://twitter.com/TrackTik" target="_blank"><span class="icon-twitter"></span></a></li>
        <li><a href="https://www.youtube.com/channel/UC9AgMG8Z_hkL9KMMMeE1lTg" target="_blank"><span class="icon-youtube"></span></a></li>
        <li><a href="https://www.linkedin.com/company/staffr-integrated-solution" target="_blank"><span class="icon-linkedin2"></span></a></li>
    </ul>
    <?php
        $languages = icl_get_languages('skip_missing=0&orderby=code');
        if( is_array($languages) ){
            foreach($languages as $lang=>$item){
                if( $lang == ICL_LANGUAGE_CODE ){
                    continue;
                }
                printf("<a href='%s' class='lang'>%s</a>", $item["url"], strtoupper($item["code"]) );                    
            }
        }                              
    ?>
            
</div>


<div class="header-main clearDiv">

    <a href="<?php echo esc_url(home_url('/')); ?>">
        <img class="header-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/ui/logo_black.svg" alt="TrackTik">
    </a>        
    
    <nav> 
    <?php
        global $post;
        $post_slug=$post->post_name;

        if ($post_slug == 'home-b') {                
            wp_nav_menu( array(
                'menu'           => 'Menu 2 - Anglais', // Do not fall back to first non-empty menu.
                'theme_location' => '__no_such_location',
                'fallback_cb'    => false, // Do not fall back to wp_page_menu()
                'menu_class' => '' 
            )); 
        } else {
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => '' ]);
            endif;
        }

    ?> 
    </nav>  
</div>

<div id="dl-menu" class="dl-menuwrapper">

    <a class="header-phone-mobile" href="tel:<?php echo get_option('tracktick_mobile_header_sales_phone'. $curLang); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ui/iconphone.svg" alt="Call us!">
    </a>


    
    <a class="header-logo-mobile" href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ui/logo_black.svg" alt="TrackTik">
    </a>
    <button class="dl-trigger">Open Menu</button>
    <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'dl-menu' ]);
        endif;
    ?>  

    <?php

        if ($post_slug == 'home-2') {                
            wp_nav_menu( array(
                'menu'           => 'Menu 2 - Anglais', // Do not fall back to first non-empty menu.
                'theme_location' => '__no_such_location',
                'fallback_cb'    => false, // Do not fall back to wp_page_menu()
                'menu_class' => 'dl-menu' 
            )); 
        } else {
            if (has_nav_menu('primary_navigation')) :
              wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'dl-menu' ]);
            endif;
        }

    ?>                          
</div>

</header>


<div class="modal fade modal-form" id="modalFormGeneral" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     </div>            
    <?php echo do_shortcode(stripslashes(get_option("tracktik_general_form". $curLang))); ?>

    </div>
  </div>
</div>

