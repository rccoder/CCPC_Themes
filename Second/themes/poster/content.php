<div class="box">
    <div class="box-content">
        <article class="typo">
            <?php if (is_single() || is_page()):?>
            <h1><?php the_title();?></h1>
            <?php else: ?>
            <h3><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
            <?php endif;?>
            <div class="entry"><?php the_content(); ?></div>
        </article>
    </div>
    <div class="box-content grey lower split compact">
        <p class="meta"><i class="ion ion-clock"></i> <?php the_date('Y-m-d'); ?></p>
    </div>
</div>