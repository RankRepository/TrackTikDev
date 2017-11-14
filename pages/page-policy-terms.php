<?php
/**
 * Template Name: Page policy - terms
 */
?>

<?php while (have_posts()) : the_post(); ?>

    <section class="template-ressources-detail template-content-text">
        <div class="container">
            <div class="row">
                <div class="article">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; ?>