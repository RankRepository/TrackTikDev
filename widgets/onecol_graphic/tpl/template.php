<?php  //   wp-content/themes/tracktik/widgets/onecol_graphic/tpl/template.php   ?>
<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>

<section class="one-col-graphic">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2><?php echo $instance["title"]; ?></h2>
				<p><?php echo $instance["text"]; ?></p>
			</div>
		</div>
		<div class="row gridTable">
			<div class="col-sm-4">
				<p><?php echo $instance["text_left"]; ?></p>
            </div>
			<div class="col-sm-4 col-image">
				<img src="<?php echo pn_get_image_url($instance["image"]); ?>" alt="" class="img-animated">
				<div class="txt">
					<p class="txt-left"><?php echo $instance["image_text_left"]; ?></p>
					<p class="title"><?php echo $instance["image_text_center"]; ?></p>
					<p class="txt-right"><?php echo $instance["image_text_right"]; ?></p>
				</div>
			</div>
			<div class="col-sm-4">
				<p><?php echo $instance["text_right"]; ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<p><?php echo $instance["text_bottom"]; ?></p>
			</div>
		</div>
	</div>
</section>

