<?php get_header(); ?>
				<div class="box">
                    <div class="box-content">
                    	<?php if(have_posts()):while(have_posts()):the_post(); ?>
                        <article class="typo">
                        <h1><?php the_title(); ?></h1>
                         	<?php the_content(); ?>
                        </article>
                        <?php endwhile; endif; ?>
                    </div>
                </div><!-- .box -->
			</div><!-- #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>