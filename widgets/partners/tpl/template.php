<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="partners">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<h2><?php  echo $instance["title"]; ?></h2>
				<p><?php  echo $instance["text"]; ?></p>

				<ul>
                    <?php                
                    foreach($instance["list"] as $index=>$person){
                    ?>    
					<li>
                        <img src="<?php echo pn_get_image_url($person["image"]); ?>" alt="">
					</li>                    

                    <?php
                    }                                
                    ?> 
                </ul>
			</div>
		</div>
	</div>
</section>

<style type="text/css">
.widget_partners-tracktik-widget .client-logo-padding .partners ul li {
	margin-bottom: 0px;
	margin-top: -40px;
}
</style>
