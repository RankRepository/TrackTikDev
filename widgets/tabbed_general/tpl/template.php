<?php 


$tabKeys = array("tab1", "tab2", "tab3");
$overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
$selected = isset($instance["selected"]) ? $instance["selected"] : "1";   
$tabsData = stripslashes_deep(get_option("tracktik_3tabs")); 

?>

<?php
    // Prit style for tab border color
    foreach($tabKeys as $i=>$key){
        if(empty($tabsData[$key]["content"]["btn"]["backgroundcolor"])) continue; 
     ?>
    <style type = "text/css" scoped>
        .tabbed .nav-tabs>li:nth-child(<?php echo ($i+1); ?>).active>a{
          border-bottom-color: <?php echo $tabsData[$key]["content"]["btn"]["backgroundcolor"]; ?>; 
        }
        .tabbed .nav-tabs>li:nth-child(<?php echo ($i+1); ?>)>a:hover {
          border-bottom-color: <?php echo $tabsData[$key]["content"]["btn"]["backgroundcolor"]; ?>; 
        }        
    </style>   
<?php } 
 ?>
    
    
    
<section class="tabbed">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
    <ul class="nav nav-tabs">
        <?php
            foreach($tabKeys as $i=>$key){

               // $borderC = !empty($tabsData[$key]["content"]["btn"]["backgroundcolor"]) ? " border-color: " . $tabsData[$key]["content"]["btn"]["backgroundcolor"] . ";" : "";
        ?>
        <li class="<?php echo (($i+1)==$selected) ? 'active' : ''; ?>">
            <a data-toggle="tab" href="#<?php echo $key; ?>" style="<?php //echo $borderC; ?>">
                <div class="row">
                    <div class="col-xs-4">
                        <img src="<?php echo wp_get_attachment_url($tabsData[$key]["header"]["icon_off"]); ?>" class="normal-state" alt="">
                        <img src="<?php echo wp_get_attachment_url($tabsData[$key]["header"]["icon"]); ?>" class="hover-state" alt="">
                    </div>
                    <div class="col-xs-8"><span><?php echo $tabsData[$key]["header"]["title"]; ?></span></div>
                </div>
            </a>
        </li>            
            
        <?php                                                        
            }        
        ?>

    </ul>

    <div class="tab-content">
        
        <?php
            foreach($tabKeys as $i=>$key){
        ?>
        
        <div id="<?php echo $key; ?>" class="tab-pane fade in <?php echo (($i+1)==$selected) ? 'active' : ''; ?>">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><?php echo $tabsData[$key]["content"]["content_title"]; ?></h2>
                        <p><?php echo $tabsData[$key]["content"]["content_text"]; ?></p>

                        <?php 
                            display_button($tabsData[$key]["content"]["btn"], $instance["panels_info"]["widget_id"]);    
                        ?>

                        
                    </div>
                    <div class="col-sm-6 right-bloc">
                        <div class="padding-left-content">
                            <ul>
                                <?php    
                                $inc = 0;                        
                                foreach( $tabsData[$key]["content"]["lists"] as  $item){
                                ?>       
                                <li class="wow fadeIn" data-wow-duration="1.5s" data-wow-delay="<?php echo $inc ?>s">
                                    <img src="<?php echo wp_get_attachment_url( $item["icon"]); ?>" alt="">
                                    
                                    <?php if(!empty($item["link"])){ ?> <a href="<?php echo sow_esc_url($item["link"]); ?>"> <?php } ?>                                   
                                        <?php echo $item["title"]; ?>
                                     <?php if(!empty($item["link"])){ ?>  </a> <?php } ?>  
                                </li>                                

                                <?php $inc+=0.2;                                                                                                               
                                }                                                                
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>           
            
        <?php                                                        
            }        
        ?>        
    </div>
</section>
    
    
    
    
    