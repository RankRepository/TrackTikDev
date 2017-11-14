
<section class="box-img-txt <?php echo ($instance["imgBottom"]) ? "imgToBottom" : "";?>" style="background-image:url('<?php echo pn_get_image_url($instance["background_image"]); ?>')">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
    <div class="container">
        <div class="row">
            <?php   if (($instance["order"]) == "txtimg") { ?>    
      
            <div class="col-xs-12 col-md-6 box wow fadeInLeft" data-wow-duration="1s">
                <div class="padding-left-content">
                    <h1><?php echo $instance["content_title"]; ?></h1>
                    <?php echo $instance["content_text"]; ?>
                    <?php 
                        display_button($instance["btn"], $instance["panels_info"]["widget_id"]);    
                    ?>                    
                </div>
            </div>              
            <div class="col-xs-12 col-md-6 box wow form fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <?php echo $instance["content_form"]; ?>
            </div>
          
            
            <?php   } else {   ?>
            
            <div class="col-xs-12 col-md-6 box wow fadeInLeft" data-wow-duration="1s">
                <?php echo $instance["content_form"]; ?>
            </div>
            <div class="col-xs-12 col-md-6 box wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="padding-left-content">
                    <h1><?php echo $instance["content_title"]; ?></h1>
                    <p><?php echo $instance["content_text"]; ?></p>
                    
                    <?php 
                        display_button($instance["btn"], $instance["panels_info"]["widget_id"]);    
                    ?>
                    
                </div>
            </div>            
            
            <?php   }   ?>
        </div>
    </div>
</section>

<style type="text/css">
    .widget_formtextbtn-tracktik-widget .panel-widget-style {
        height: 95vh;
        padding: 0!important;
        background-position: inherit!important;
        position: relative;
        top: 50%;

    }

    .widget_formtextbtn-tracktik-widget .panel-widget-style > div {
        position: relative;
        top: 50%;
        transform: translateY(-50%);
    }

    .widget_formtextbtn-tracktik-widget .panel-widget-style .container {
        padding-top: 75px;

    }

    .widget_formtextbtn-tracktik-widget .panel-widget-style .pardotform {
        min-height: auto!important;
    }

    .widget_formtextbtn-tracktik-widget .panel-widget-style .box-img-txt {
        padding: 0;
    }

    .widget_formtextbtn-tracktik-widget .panel-widget-style {
    }

    .widget_formtextbtn-tracktik-widget .panel-widget-style:after, 
    .widget_formtextbtn-tracktik-widget .panel-widget-style:before {
        -webkit-animation: bounce 2s infinite ease-in-out;
        content: '';
        display: block;
        position: absolute;
        bottom: 60px;
        left: 50%;
        margin-left: 8px;
        width: 4px;
        height: 20px;
        background-color: #fff;
        opacity: 1;
        transform: rotate(45deg);
        z-index: 900;
        border-top-left-radius: 2px;
        border-top-right-radius: 2px;
    }

    .widget_formtextbtn-tracktik-widget .panel-widget-style:after {
        transform: rotate(-45deg);
        margin-left: -4px;
    }

    .widget_formtextbtn-tracktik-widget .panel-widget-style h1 {
        font-size:40px;
        color: #ffffff;
        font-weight:100;
        line-height: 43px;
    }

    .widget_formtextbtn-tracktik-widget .panel-widget-style .box.form p {
        margin-bottom: 0!important;
    }

    .widget_formtextbtn-tracktik-widget .panel-widget-style .box ul {
        margin-bottom: 0!important;
    }

    @media (max-width: 991px) {

        .widget_formtextbtn-tracktik-widget .panel-widget-style {
            height: auto;
        }

        .widget_formtextbtn-tracktik-widget .panel-widget-style > div {
            top: 0;
            transform: inherit;
            padding-bottom: 60px;
        }
        

    }

    @media (max-width: 991px) and (min-width: 768px) {
        .widget_formtextbtn-tracktik-widget .panel-widget-style .box ul {
            margin-bottom: 50px!important;
        }
    }






    



</style>

