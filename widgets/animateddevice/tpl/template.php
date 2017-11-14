<section class="animated-device">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img class="device-scroll" src="<?php echo pn_get_image_url($instance["image"]); ?>" alt="Device">
            </div>
            <div class="col-sm-6">
				<?php echo $instance["content"]; ?>
            </div>
        </div>
    </div>
</section>