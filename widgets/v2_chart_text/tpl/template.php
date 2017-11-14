<?php //  wp-content/themes/tracktik/widgets/v2_chart_text/tpl/template.php      ?>
<?php 
    $overlay = isset($instance["panels_info"]["style"]["overlay"]) ? $instance["panels_info"]["style"]["overlay"] : "";   
?>
<section class="box-img-txt chart-text">
    <div class="overlay" style="background-color:<?php echo $overlay; ?>"></div>
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-md-6 box wow fadeInLeft" data-wow-duration="1s">
                <div class="chart" id="chart-box" style="">
                    <canvas id="tracktikChart" width="560" height="320"></canvas>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 box wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="padding-left-content">

                    <h2><?php echo $instance["title"]; ?></h2>
                    <?php echo $instance["text"]; ?>

                    <?php 
                        display_button($instance["btn"], $instance["panels_info"]["widget_id"]);    
                    ?>                    
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    var tkChartTitle = "<?php echo $instance["chart_title"]; ?>";    
    var tkChartDays = ["<?php echo $instance["chart_day1"]; ?>",
    "<?php echo $instance["chart_day2"]; ?>",
    "<?php echo $instance["chart_day3"]; ?>",
    "<?php echo $instance["chart_day4"]; ?>",
    "<?php echo $instance["chart_day5"]; ?>",
    "<?php echo $instance["chart_day6"]; ?>",
    "<?php echo $instance["chart_day7"]; ?>"];

</script>