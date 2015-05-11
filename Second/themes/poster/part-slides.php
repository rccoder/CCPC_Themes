<?php
$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;
$slides_query = new WP_Query(array(
    'post_type' => 'poster_slide',
    'paged'     => $paged
));
?>
<?php if($slides_query->have_posts()): ?>
<div class="box">
    <div id="album" class="carousel slide" data-ride="carousel">
    
        <ol class="carousel-indicators">
        <?php $ctr = 0; while($slides_query->have_posts()): $slides_query->the_post(); ?>
            <li data-target="album" class="active" data-slide-to="<?php echo $ctr++; ?>"></li>
        <?php endwhile; $slides_query->rewind_posts(); ?>
        </ol><!-- .carousel-indicators -->

        <div class="carousel-inner" role="listbox">
        <?php $ctr = 0; while($slides_query->have_posts()): $slides_query->the_post(); ?>
            <div class="item <?php echo $ctr++ == 0 ? 'active' : '' ?>">
                <?php if(has_post_thumbnail()){
                    the_post_thumbnail('-poster-featured-slide');
                }?>
                <div class="carousel-caption">
                    <h3><?php the_title() ?></h3>
                    <p><?php the_excerpt() ?></p>
                </div>
            </div>
        <?php endwhile; ?>
        </div><!-- .carousel-inner -->

        <a class="left carousel-control" href="#album" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="right carousel-control" href="#album" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        </a>
    </div><!-- #album.carousel -->

   
</div>
<?php endif; ?>