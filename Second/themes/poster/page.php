<?php get_header(); ?>

<div id="main">
    <div class="container">
        <div class="row">
            <div id="content" class="col-md-9">
            <?php if(have_posts()): while(have_posts()) : the_post(); ?>

                <?php get_template_part('content', get_post_type());?>

            <?php endwhile; endif; ?>
            </div><!-- #content -->
            <div id="sidebar" class="col-md-3">
                <?php get_sidebar();?>
            </div><!-- #sidebar -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>