<?php get_header(); ?>

<div id="main">
    <div class="container">
        <div class="row">
            <div id="content" class="col-md-9">

                <?php get_template_part('part', 'slides');?>

                <div class="box">
                    <div class="box-heading"><h2>最新消息</h2></div>
                    <div class="box-content">
<?php if(have_posts()): ?>
    <ul class="entries">
        <?php while(have_posts()) : the_post(); ?>
<li><a href="<?php the_permalink();?>"><?php the_title();?> </a> <span class="date"><?php echo the_date('Y-m-d');?></span></li>
        <?php endwhile; ?>
    </ul>
<?php else: // no posts here?>
    <p>暂无消息</p>
<?php endif;?>         
                    </div>
                </div><!-- .box -->

                <div class="box">
                    <div class="box-content">
                        <article class="typo">
                        <h1>ACM国际大学生程序设计竞赛</h1>
                        <p>ACM国际大学生程序设计竞赛（ACM International Collegiate Programming Contest, 简称ACM-ICPC或ICPC）是由国际计算机界具有悠久历史的权威性组织(美国)计算机协会（Association for Computing Machinery,
                        简称ACM）主办的一项旨在展示大学生创新能力、团队精神和在压力下编写程序、分析和解决问题能力的年度竞赛。ACM国际大学生程序设计竞赛始于1970年，成形于1977年，并于 1996年由上海大学引入中国大陆，目前已发展成为最具影响力的大学生计算机竞赛。</p>

                        <p>ACM 国际大学生程序设计竞赛由各大洲区域赛(Regional Contests)和全球总决赛(World Finals)两个阶段组成。各大洲区域赛第一名自动获得参加全球总决赛的资格。各大洲区域赛一般安排在每年的9-12月举行, 全球总决赛安排在第二年的上半年举行。每所大学可以有多支队伍参加区域赛，但只能有一支队伍参加全球总决赛。</p>

                        <p>亚洲地区的高校可组队参加在亚洲的所有赛区的区域赛, 但每位参赛选手在一个年度内至多只能参加两个赛区的区域赛。2014年度亚洲区共设立了十八个赛站, 每个赛站的第一名将自动晋级全球总决赛。第39届ACM-ICPC全球总决赛将于2015年5月16日至21日在摩洛哥举行, 将有120多所参赛学校获得参加全球总决赛资格。</p>
                        </article>
                    </div>
                </div><!-- .box -->
            </div><!-- #content -->
            <div id="sidebar" class="col-md-3">
            <?php get_sidebar(); ?>
            </div><!-- #sidebar -->
        </div>
    </div><!-- .container -->
</div><!-- #main -->

<!--
<div class="container" style="margin-top:30px;">
    <ul class="sponsors">
        <li class="title">赞助商</li>
        <li><a href=""><img height="50" src="<?php echo get_template_directory_uri() ?>/static/img/logos/ibm.png" alt="" /></a></li>
    </ul>
</div>
-->


<?php get_footer(); ?>
