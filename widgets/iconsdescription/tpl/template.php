<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="icons-description">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2><?php echo $instance["title"]; ?></h2>
			</div>
		</div>

		<!-- boucle sur les row -->
        
        <?php  
        $inc = 0;                  
        foreach($instance["list"] as $index=>$person){
        ?>

		<div class="row one-description wow fadeIn" data-wow-duration="1.5s" data-wow-delay="<?php echo $inc ?>s">
			<div class="col-sm-2">
                <img src="<?php echo pn_get_image_url($person["icon"]); ?>" >
			</div>
			<div class="col-sm-10">
				<h3><?php echo $person["title"]; ?></h3>
				<p><?php echo $person["text"]; ?></p>
			</div>
		</div>           

        <?php  
        $inc += 0.2;                                          
        }                                
        ?>          
        

	</div>
</section>