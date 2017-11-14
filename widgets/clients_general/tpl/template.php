<?php // wp-content/themes/tracktik/widgets/clients_general/tpl/template.php ?>
<div class="footer-clients">
    <p class="title"><?php echo get_option('tracktick_general_clients_title_'  . ICL_LANGUAGE_CODE); ?></p>
    <div class="container">
        <div class="row">
            <?php 
                $customers = get_posts(array("post_type"=>"customers", "posts_per_page"=> -1, "suppress_filters"=>false));

                foreach($customers as $key => $customer){

             ?>

             <div class="col-xs-6 col-sm-3 col-logo">
                <?php 
                    $websiteUrl = get_post_meta($customer->ID, 'website_url',true);
                    if (!empty($websiteUrl)) {
                ?>

                    <img src="<?php echo pn_get_image_url_from_meta($customer->ID, 'logo'); ?>" alt="" class="img-responsive">

                <?php
                    } else {
                ?>
                    <img src="<?php echo pn_get_image_url_from_meta($customer->ID, 'logo'); ?>" alt="" class="img-responsive">
                <?php } ?>

             </div>

             <?php } ?>
         </div>
     </div>
</div>