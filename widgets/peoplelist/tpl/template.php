<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="people-list">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<h2><?php echo $instance["title"]; ?></h2>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<ul class="nav nav-tabs">

                
                <?php                
                foreach($instance["list"] as $index=>$person){
                ?>
                     
		        <li class="col-xs-6 col-sm-4 col-md-2 col-lg-2 <?php echo ($index == 0) ? "active" : ""; ?>">
                    <a data-toggle="tab" href="#tabPeople<?php echo $index; ?>">
		            	<div class="circle">
                            <img src="<?php echo pn_get_image_url($person["image"]); ?>" alt="">
		            	</div>
		            	<p><?php echo $person["name"]; ?></p>
		            </a>
		        </li>                
                     
                <?php                                        
                }                                
                ?>

		    </ul>
		</div>
	</div>

    <div id="container-tab-description" class="tab-content">
        
        <?php                
        foreach($instance["list"] as $index=>$person){
        ?>

        <div id="tabPeople<?php echo $index; ?>" class="tab-pane in <?php echo ($index == 0) ? "active" : ""; ?>">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <?php echo $person["content"]; ?>                        
                    </div>
                </div>
            </div>
        </div>              

        <?php                                        
        }                                
        ?>        

    </div>
</section>