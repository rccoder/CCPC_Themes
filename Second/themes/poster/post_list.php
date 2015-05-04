                            <?php 
                                $postnun = 1;
                                if(have_posts()):while(have_posts()):the_post();
                            ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                <span class="date"><?php the_time('m月d日'); ?></span>
                            </li>
                            <?php $postnun++; endwhile; else: ?>
                                <h1 style="border:1px solid #ccc; border-radius: 3px; padding: 50px; font-size: 20px; color: #f00; text-align: center; background: #fff;">客官太深了~~~ 已经没有更多的文章可以显示了</h1>
                            <?php endif; ?> 
                            <?php
                              if((is_home() || is_front_page()) && $current_page == 1):
                            ?>
                            <li style="float:right"><a href="page/2">更多</a></li>
                            <?php endif; ?>