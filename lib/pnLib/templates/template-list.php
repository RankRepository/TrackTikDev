<div class="wrap" style="margin-top: 30px;">
    <?php if ($this->templates['title']) : ?>
        <h1 style="margin-bottom: 30px;"><?php echo $this->templates['title']; ?></h1>
    <?php endif; ?>

    <div class="row">
        <?php foreach ($this->templates['list'] as $key => $value) : ?>
            <div class="<?php echo $this->templates['grid_class']; ?>">
                <a href="<?php echo get_template_directory_uri() . $value; ?>" style="text-decoration: none;" target="_blank">
                    <h2 style="margin-top: 0;"><?php echo $key; ?></h2>
                    <img src="<?php echo get_template_directory_uri() . $value; ?>">
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>