<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";

    $generalJobUrl = "";
    $generalJobs = get_posts( array("post_type"=>"job", "meta_key"=>"general_job", "meta_value"=>"1") );
    foreach( $generalJobs as $genJob ){
        $generalJobUrl = get_permalink( $genJob->ID );
    }
?>



<section class="jobs-text-popup">
    <div class="popup-fixed">
        <p class="popup-fixed-title"><?php echo ($instance["popup_text"]); ?></p>
        <a href="#job-list" class="btn anchor"><?php echo ($instance["popup_btn1"]); ?></a>
        <a href="<?php echo $generalJobUrl; ?>" class="btn"><?php echo ($instance["popup_btn2"]); ?></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-images">
                <img class="img-full" src="<?php echo pn_get_image_url($instance["image1"]); ?>" alt="">
                <img class="img-half first" src="<?php echo pn_get_image_url($instance["image2"]); ?>" alt="">
                <img class="img-half" src="<?php echo pn_get_image_url($instance["image3"]); ?>" alt="">
            </div>
			<div class="col-sm-12 col-md-6 col-content">
				<div class="padding-left-content">
	                <p class="title"><?php echo ($instance["title"]); ?></p>
                    <?php
                    
                    if( is_array($instance["subtitles_texts"]) ){
                        foreach( $instance["subtitles_texts"] as $item ){
                            printf("<p class='subtitle'>%s</p>", $item["subtitle"]);
                            $text = nl2br($item["text"]);
                            printf("<p class='desc'>%s</p>", $text);
                        }
                    }
                                        
                    ?>                    
				</div>
            </div>
        </div>
    </div>
</section>