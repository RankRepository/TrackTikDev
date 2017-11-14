<?php
    $color = $instance["titlecolor"];
    $cssColor = ""; 
    if( !empty($color) ){
       $cssColor = " color: $color ; " ;
    }

?>

<section class="three-col-colorBox three-class-test" style="background-color: #eeeeee;">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <h2 style="<?php echo $cssColor; ?>"><?php echo $instance["title"]; ?></h2>
            </div>
            
            <?php
            for($i=1; $i<=3; $i++){
            ?>
            
            <div class="col-sm-4 box">
                <div class="inner js-equal-height" style="background-color: <?php echo $instance["col" . $i]["bgcolor"]; ?>">
                    <img src="<?php echo wp_get_attachment_url( $instance["col" . $i]["icon"] ); ?>" class="wow fadeInDown" alt="">
                    <p class="title"><?php echo $instance["col" . $i]["title"]; ?></p>
                    <p class="desc"><?php echo $instance["col" . $i]["text"]; ?></p>
                </div>
            </div>            
            
            
            <?php            
            }
            ?>            

        </div>
    </div>
</section>

<script>

    function heightsEqualizer(selector) {

        var elements = document.querySelectorAll(selector),
            max_height = 0,
            len = 0,
            i;
            
        if ( (elements) && (elements.length > 0) ) {
            len = elements.length;
        
            for (i = 0; i < len; i++) { // get max height
                elements[i].style.height = ''; // reset height attr
                if (elements[i].clientHeight > max_height) {
                    max_height = elements[i].clientHeight;
                }
            }

            for (i = 0; i < len; i++) { // set max height to all elements
                elements[i].style.height = max_height + 'px';
            }
        }
    }

    if (document.addEventListener) {
        document.addEventListener('DOMContentLoaded', function() {
            heightsEqualizer('.js-equal-height');
        });
        window.addEventListener('resize', function(){
            heightsEqualizer('.js-equal-height');
        });
    }

    heightsEqualizer('.js-equal-height');

</script>