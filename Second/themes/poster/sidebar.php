            <div id="sidebar" class="col-md-3">
                <?php dynamic_sidebar('sidebar1');?>
                <!--
                <div class="box">
                    <div class="box-heading"><h2>近期公告</h2></div>
                    <div class="box-content">
                        <ul class="list">
                            <?php 
                                $postnun = 1;
                                if(have_posts()):while(have_posts()):the_post();
                                if($postnun >= 7) break;
                            ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>
                            <?php $postnun++; endwhile; else: ?>
                                <h1 style="border:1px solid #ccc; border-radius: 3px; padding: 50px; font-size: 20px; color: #f00; text-align: center; background: #fff;">客官太深了~~~ 已经没有更多的文章可以显示了</h1>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                -->
                <!-- .box -->
                <div class="box">
                    <div class="box-heading"><h2>文件下载</h2></div>
                    <div class="box-content">
                        <ul class="list">
                            <li><a href="">参赛邀请函</a></li>
                            <li><a href="">赛事日程表</a></li>
                            <li><a href="">比赛规则</a></li>
                        </ul>
                    </div>
                </div><!-- .box -->
                
                <div class="box">
                    <div class="box-content">
                        <a class="btn btn-md btn-success" style="display:block;" href=""><i class="ion ion-calendar"></i> 重要日程</a>
                    </div>
                </div>
                <div class="box">
                    <div class="box-heading"><h2>联系方式</h2></div>
                    <div class="box-content">
                        <ul>
                            <li>联系人: 孙大烈(副教授)</li>
                            <li>电话: 86413080</li>
                            <li>邮箱: sdl@hit.edu.cn</li>
                        </ul>
                    </div>
                </div>
                
            </div><!-- #sidebar -->