<?php
/**
 * Template Name: Page Blog
 */
?>

<?php while (have_posts()) : the_post(); ?>

    <?php //get_template_part('templates/page', 'header'); ?>
    <?php //get_template_part('templates/content', 'page'); ?>
    <?php the_content(); ?>

    <section class="template-ressources blog jobs-text-popup">
        <div class="popup-fixed">
        <noscript>
             <iframe src="https://go.pardot.com/l/150101/2017-02-15/b2yqg" width="100%" height="190" type="text/html" frameborder="0" allowTransparency="true" style="border: 0"></iframe>
            </noscript>
            <script type="text/javascript">
            // Reporting - New Site
             var form = 'https://go.pardot.com/l/150101/2017-02-15/b2yqg';
             var params = window.location.search;
             var thisScript = document.scripts[document.scripts.length - 1];
             var iframe = document.createElement('iframe');
             iframe.setAttribute('src', form + params);
             iframe.setAttribute('width', '100%');
             iframe.setAttribute('height', 190);
             iframe.setAttribute('type', 'text/html');
             iframe.setAttribute('frameborder', 0);
             iframe.setAttribute('allowTransparency', 'true');
             iframe.style.border = '0';
             thisScript.parentElement.replaceChild(iframe, thisScript);
        </script>
           
        </div>
        <div class="container">
            <div class="filter">
                <ul class="categories">
                    <li class="first"><a class="view view-all current" data-cat="view-all">View all</a></li>
                    <li class="topic-text">Or choose a topic</li>
                    <li>
                        <div class="select-style">
                            <select name="" id="selectCat">
                                <option value='0'><?php _e("All", "tracktik"); ?></option>                                
                                <?php                                
                                    $allCats = get_terms(array("taxonomy"=>"category"));
                                    if (is_array($allCats)) {
                                        foreach($allCats as $key => $cat){

                                            printf("<option value='%s'>%s</option>", $cat->term_id, $cat->name );
                                            
                                        }                                    
                                    }                                                                
                                ?>
                            </select>
                            <div class="line"></div>
                        </div>
                    </li>
                    <li class="search">
                        <form class="blog-search">
                          <input type="search" placeholder="Search" name="search" class="text-search">
                          <input type="submit" name="submit-search" class="submit-search" value="">
                        </form>
                    </li>
                </ul>
            </div>
            
            <div class="list-thumbnail">
                <?php                
                
                $blogues = get_posts( array("post_type"=>"post", "posts_per_page"=>100) );                                
                foreach( $blogues as $blogue) {
                    $post_thumbnail_id = get_post_thumbnail_id( $blogue->ID );   
                    $imageurl = pn_get_image_url($post_thumbnail_id, "500x500");
                    
                    $currentCat = "";
                    $currentCatID = "";
                    $cats = wp_get_object_terms( $blogue->ID,  'category' );
                    if (  is_array( $cats ) ) {
                        foreach( $cats as $term ) {
                            $currentCat = $term->name ; 
                            $currentCatID = $term->term_id;
                        }
                    }

                    $nom = get_post_meta( $blogue->ID, "auteur", true);
                    
                ?>
                        
                <div class="main-thumbnail art-thumbnail" data-cat="<?php echo $currentCatID; ?>" data-js="filter-news">
                    <div class="row">
                        <a href="<?php echo get_permalink($blogue->ID); ?>" class="wrapper-link">
                            <div class="col-sm-4 col-md-4 col-md-push-1 col-img">
                                <img src="<?php echo $imageurl; ?>" alt="" class="img-responsive">
                            </div>
                            <div class="col-sm-8 col-md-6 col-md-push-1">
                                <h2 class="title"><?php echo $blogue->post_title; ?></h2>
                                <div class="infos">
                                    <span class="author"><?php _e("By", "ctaq"); ?> <?php echo $nom; ?></span>
                                    <span class="date"><?php echo get_the_date("F j, Y", $blogue->ID); ?></span>
                                    <span class="category"><?php echo $currentCat; ?></span>
                                </div>
                                <p><?php echo $blogue->post_excerpt; ?></p>
                                <span class="btn"><?php _e("Read more", "tracktik"); ?></span>
                            </div>
                        </a>
                        <div class="ms-list">
                            <ul>
                                <li class="ms-text"><?php _e("Share on", "ctaq"); ?></li>
                                <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="twitter" data-link="<?php echo get_permalink($blogue->ID); ?>"><span class="icon-twitter"></span></a></li>
                                <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="facebook" data-link="<?php echo get_permalink($blogue->ID); ?>"><span class="icon-facebook"></span></a></li>
                                <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="linkedin" data-link="<?php echo get_permalink($blogue->ID); ?>"><span class="icon-linkedin2"></span></a></li>
                                <li class="ms-icon"><a href="" data-js="sm-sharer" data-sm-type="googleplus" data-link="<?php echo get_permalink($blogue->ID); ?>"><span class="icon-googlePlus"></span></a></li>
                                <li class="ms-icon">
                                    <a href="mailto:?Subject=Tracktik&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 <?php echo get_permalink($blogue->ID); ?>">
                                        <span class="icon-mail"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    
                        
                    </div>
                </div>
                        
                <?php                                       
                }                                
                ?>

            </div>
            
        </div>
    </section>


<?php endwhile; ?>

<script>

    var form = document.querySelector('form.blog-search');
    var input = document.querySelector('input.text-search');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        var search = input.value.toLowerCase();

        var posts = document.querySelectorAll(".list-thumbnail .main-thumbnail");

        if (!search) {
            for (i = 0; i < posts.length; i++) {  
                posts[i].style.display = "block";
            }
            return
        }

        for (i = 0; i < posts.length; i++) { 
            var title = posts[i].querySelector('h2').innerHTML.toLowerCase();
            var match = title.indexOf(search) > -1;
            posts[i].style.display = (match) ? "block" : "none";
        }

    });
 

</script>
