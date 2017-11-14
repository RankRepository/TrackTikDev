<section class="three-col-colorBox " style="background-color: #fff;">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <h2 class="wow fadeInDown"><?php echo $instance["title"]; ?></h2>
            </div>
            
            <?php
            for($i=1; $i<=6; $i++){
            ?>
            <div class="col-sm-4 box box-stats wow fadeIn" data-wow-duration="0.5s" data-wow-delay="<?php echo($i/6); ?>s">
                <div class="inner" style="background-color: <?php echo $instance["col" . $i]["bgcolor"]; ?>">
                    <p class="txt"><?php echo $instance["col" . $i]["text"]; ?></p>
                    <p class="number"><?php echo $instance["col" . $i]["stat"]; ?></p>
                </div>
            </div>                
            <?php            
            }
            ?>
            
        </div>
    </div>
</section>
