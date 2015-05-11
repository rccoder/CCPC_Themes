<?php
/*
Template Name: 文章列表页
*/

get_header(); ?>

<div id="main">
    <div class="container">
        <div class="row">
            <div id="content" class="col-md-9">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'posts_per_page' => 10,
                'paged' => $paged
            );

            query_posts($args);
            ?>

            <?php if(have_posts()): while(have_posts()) : the_post(); ?>

                <?php get_template_part('excerpt', get_post_type());?>
                
            <?php endwhile; endif; ?>

                <div class="box">
                <?php PosterTheme::paginavi(); ?>
                </div>
            </div><!-- #content -->
            <div id="sidebar" class="col-md-3">
                <?php get_sidebar();?>
            </div><!-- #sidebar -->
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- #main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>