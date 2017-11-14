    <div class="footer-clients">
        <p class="title"><?php _e('Our clients','tracktik') ?>:</p>
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