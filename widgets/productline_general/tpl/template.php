<?php 

$overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
$selected = isset($instance["selected"]) ? $instance["selected"] : "1";   

$productline1 = stripslashes_deep(get_option("tracktik_productline_1_" . ICL_LANGUAGE_CODE)); 
$productline2 = stripslashes_deep(get_option("tracktik_productline_2_" . ICL_LANGUAGE_CODE)); 
$productline3 = stripslashes_deep(get_option("tracktik_productline_3_" . ICL_LANGUAGE_CODE)); 

$list = array();
$title = $instance["title"];

if( $selected == "0" ){
    $listProd1 = isset( $productline1["lists"]) ?  $productline1["lists"] : array();
    $listProd2 = isset( $productline2["lists"]) ?  $productline2["lists"] : array();
    $listProd3 = isset( $productline3["lists"]) ?  $productline3["lists"] : array();
     
   $list2 = array_merge($listProd1, $listProd2);
   $list = array_merge($list2, $listProd3);
   
   
} else if( $selected == "1"  ){
    $list = isset( $productline1["lists"]) ?  $productline1["lists"] : array();
    $title = empty($title) ?  $productline1["title"] : $title;
    
} else if( $selected == "2"  ){
    $list = isset( $productline2["lists"]) ?  $productline2["lists"] : array();
    $title = empty($title) ?  $productline2["title"] : $title;
    
    
} else if( $selected == "3"  ){
    $list = isset( $productline3["lists"]) ?  $productline3["lists"] : array();
    $title = empty($title) ?  $productline3["title"] : $title;
    
    
}

?>

    
    
<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="icons-list">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
    <div class="container">

        <h2><?php echo $title; ?> </h2>
        <ul class="row center-block">
        <?php foreach( $list as  $item){ ?>
            <li class="col-xs-6 col-sm-4 col-md-3 item">
                <a href="<?php echo sow_esc_url($item["link"]); ?>" class="item-box">
                    <span class="image">
                        <img src="<?php echo wp_get_attachment_url( $item["icon"]); ?>" alt="">
                    </span>
                    <span class="title"><?php echo $item["title"]; ?></span>
                    <span class="text"><?php echo $item["text"]; ?></span>
                </a>
            </li>
        <?php }  ?>
        </ul>

    </div>
</section>    
    