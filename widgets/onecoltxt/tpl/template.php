<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="one-col-txt">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

				<?php 
					$imgIcon = wp_get_attachment_url($instance["icon"]);

					if (!empty($imgIcon)) {
				?>

					<img src="<?php echo wp_get_attachment_url($instance["icon"]); ?>" alt="">    

				<?php
					}
				?>

                
				
				<?php 
					$titleh2 = $instance["title"];

					if (!empty($titleh2)) {
				?>

					<h2><?php echo $instance["title"]; ?></h2>

				<?php
					}
				?>

				
				<?php echo $instance["content"]; ?>
                
                <?php 
                    display_button($instance["btn"], $instance["panels_info"]["widget_id"]);    
                ?>
                
			</div>
		</div>
	</div>
</section>